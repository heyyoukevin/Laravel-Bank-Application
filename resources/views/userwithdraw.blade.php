@extends("layouts.userheadfoot")

@section("page-content")

<main>
    <br><br>
    <h2>WITHDRAW MONEY</h2>
    <form action="/withdraw" method="post">
        
        {{ csrf_field() }}

        @if(Session::get('fail'))
            <div class="alert alert-danger">
            <br>
            <h2>{{Session::get('fail')}}</h2>
            <br>
            </div>
        @endif
	
	    <label for="withamnt"><strong>Withdraw Amount</strong></label>
        <input type="withamnt" id="withamnt" name="withamnt" value="{{old('withamnt')}}" placeholder="Enter amount" required>
        <br><br>        
        <button type="submit">WITHDRAW</button>
    </form>    
</main>

@endsection