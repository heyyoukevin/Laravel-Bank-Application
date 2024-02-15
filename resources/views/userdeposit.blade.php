@extends("layouts.userheadfoot")

@section("page-content")
      
<main>
    <br><br>
    <h2>DEPOSIT MONEY</h2>
    <form action="/deposit" method="post">

        {{ csrf_field() }}

	    <label for="depamnt"><strong>Deposit Amount</strong></label>
        <input type="depamnt" id="depamnt" name="depamnt" value="{{old('depamnt')}}" placeholder="Enter amount" required>
        <br><br>
        <button type="submit">DEPOSIT</button>
    </form>    
</main>

@endsection