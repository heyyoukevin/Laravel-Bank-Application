<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
Route::get('/logout',[UserController::class,'logout']);
Route::post('/deposit',[UserController::class,'deposit']);
Route::post('/withdraw',[UserController::class,'withdraw']);
Route::post('/transfer',[UserController::class,'transfer']);

Route::group(['middleware'=>['AuthCheck']],function()
{
Route::get('/',[UserController::class,'registerpage']);
Route::get('/loginpage',[UserController::class,'loginpage']);

Route::get('/userhome',[UserController::class,'userhome']);
Route::get('/userdeposit',[UserController::class,'userdeposit']);
Route::get('/userwithdraw',[UserController::class,'userwithdraw']);
Route::get('/usertransfer',[UserController::class,'usertransfer']);
Route::get('/userstatement',[UserController::class,'userstatement']);
});