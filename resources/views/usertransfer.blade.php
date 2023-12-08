@extends("layouts.userheadfoot")

@section("page-content")

<main>
    <br><br>
    <h2>TRANSFER MONEY</h2>
    <form action="/transfer" method="post">

        {{ csrf_field() }}

        @if(Session::get('firstfail'))
            <div class="alert alert-danger">
            <br>
            <h2>{{Session::get('firstfail')}}</h2>
            <br>
            </div>
        @endif

        @if(Session::get('secondfail'))
            <div class="alert alert-danger">
            <br>
            <h2>{{Session::get('secondfail')}}</h2>
            <br>
            </div>
        @endif

        <label for="email"><strong>Email Address</strong></label>
        <input type="email" id="email" name="email" value="{{old('email')}}" placeholder="Enter Email Id" required>	    
        <label for="transamnt"><strong>Transfer Amount</strong></label>
        <input type="transamnt" id="transamnt" name="transamnt" value="{{old('transamnt')}}" placeholder="Enter amount" required>       
        <br><br>
        <button type="submit">TRANSFER</button>
    </form>    
</main>

@endsection