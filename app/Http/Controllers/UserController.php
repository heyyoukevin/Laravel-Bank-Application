<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reguser;
use App\Models\statement;

use Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function registerpage()
    {
        return view('registerpage');
    }



    public function loginpage()
    {
        return view('loginpage');
    }



    public function register(Request $request)
    {
        $this->validate($request,[
            
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\reguser,email',            
            'pass' => 'required|min:5',
        ]);

        $getname=request('name');
        $getemail=request('email');        
        $getpass=request('pass');
       
       
        $user=new reguser();
        $user->name=$getname;
        $user->email=$getemail;        
        $user->pass=$getpass;
                
        $user->save();
        return view('loginpage');
    }



    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'pass' => 'required',

        ]);

        $user = reguser::where([['email',$request->email],['pass',$request->pass]])->first();

        if($user)
        {
            $request->session()->put('email', $user->email);
            $request->session()->put('userid',$user->id);
            return redirect('/userhome');
        }
        else
        {
            return back()->with('fail','Invalid Credentials ! ! !');
        }

    }



    public function logout()
    {
        if(session()->has('email') && session()->has('userid'))
        {
            session()->pull('email');
            session()->pull('userid');
            return redirect('/loginpage');
        }
    }



    public function userhome()
    {
        $id=session()->get('userid');
        $user=reguser::where('id',$id)->first();
        return view('userhome',compact('user'));
    }



    public function userdeposit()
    {
        return view('userdeposit');
    }



    public function deposit(Request $request)
    {
        $id=session()->get('userid');
        $data=reguser::find($id);
        $newbalance=$data->balance + $request->input('depamnt');
        $updating=DB::table('regusers')->where('id',$id)->update([
            'balance'=>$newbalance,
        ]);

        $getuserid=$id;
        $gettype="Credit";
        $getdetails="Deposit";        
        $getactivityamnt=$request->input('depamnt');
        $getpresentbalance=$newbalance;
       
       
        $user=new statement();
        $user->userid=$getuserid;
        $user->type= $gettype;        
        $user->details=$getdetails;
        $user->activityamnt=$getactivityamnt;
        $user->presentbalance=$getpresentbalance;
                
        $user->save();

        return redirect('/userdeposit');
    }



    public function userwithdraw()
    {
        return view('userwithdraw');
    }



    public function withdraw(Request $request)
    {
        $id=session()->get('userid');
        $data=reguser::find($id);
        $newbalance=$data->balance - $request->input('withamnt');

        if($request->input('withamnt') <= $data->balance)
        {            
            $updating=DB::table('regusers')->where('id',$id)->update([
            'balance'=>$newbalance,
            ]);
        }
        else
        {
            return back()->with('fail','Insufficient Balance ! ! !');
        }

        $getuserid=$id;
        $gettype="Debit";
        $getdetails="Withdraw";        
        $getactivityamnt=$request->input('withamnt');
        $getpresentbalance=$newbalance;
       
       
        $user=new statement();
        $user->userid=$getuserid;
        $user->type= $gettype;        
        $user->details=$getdetails;
        $user->activityamnt=$getactivityamnt;
        $user->presentbalance=$getpresentbalance;
                
        $user->save();

        return redirect('/userwithdraw');
    }



    public function usertransfer()
    {
        return view('usertransfer');
    }



    public function transfer(Request $request)
    {
        $fid=session()->get('userid');
        $femail=session()->get('email');
        $fdata=reguser::find($fid);

        $temail=$request->input('email');
        $tid=reguser::where('email',$temail)->pluck('id')->first();
        $tdata=reguser::find($tid);

        if (reguser::where('email', $temail)->exists())
        {
            if($request->input('transamnt') <= $fdata->balance)
            {
                $fnewbalance=$fdata->balance - $request->input('transamnt');
                $tnewbalance=$tdata->balance + $request->input('transamnt');

                $updating=DB::table('regusers')->where('id',$fid)->update(['balance'=>$fnewbalance,]);
                $updating=DB::table('regusers')->where('id',$tid)->update(['balance'=>$tnewbalance,]);
            }
            else
            {
                return back()->with('firstfail','Insufficient Balance ! ! !');
            }

            $fgetuserid=$fid;
            $fgettype="Debit";
            $fgetdetails='Transfer to '.$temail;        
            $fgetactivityamnt=$request->input('transamnt');
            $fgetpresentbalance=$fnewbalance;
       
       
            $fuser=new statement();
            $fuser->userid=$fgetuserid;
            $fuser->type= $fgettype;        
            $fuser->details=$fgetdetails;
            $fuser->activityamnt=$fgetactivityamnt;
            $fuser->presentbalance=$fgetpresentbalance;
                
            $fuser->save();

            $tgetuserid=$tid;
            $tgettype="Credit";
            $tgetdetails='Transfer from '.$femail;        
            $tgetactivityamnt=$request->input('transamnt');
            $tgetpresentbalance=$tnewbalance;
       
       
            $tuser=new statement();
            $tuser->userid=$tgetuserid;
            $tuser->type= $tgettype;        
            $tuser->details=$tgetdetails;
            $tuser->activityamnt=$tgetactivityamnt;
            $tuser->presentbalance=$tgetpresentbalance;
                
            $tuser->save();
        }
        else
        {
            return back()->with('secondfail','User dont exists ! ! !');
        }        

        return redirect('/usertransfer');
    }



    public function userstatement()
    {
        $id=session()->get('userid');
        $user=statement::where('userid',$id)->get();
        return view('userstatement',compact('user'));
    }

    public function getData()
    {
        $statement = statement::all();
        return response()->json(['statement'=>$statement], 200);
    }

    public function getShow($id)
    {
        $statement = statement::find($id);
        if($statement)
        {
            return response()->json(['statement'=>$statement], 200);            
        }
        else
        {
            return response()->json(['message'=>'NO RECORDS FOUND'], 404);
        }
    }
}
