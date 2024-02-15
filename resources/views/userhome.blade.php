@extends("layouts.userheadfoot")

@section("page-content")

<main>
  <br><br>
  <div class="user-info">
    <h1>Welcome, {{$user->name}}</h1>
    <br>
    <p><strong>Your ID : </strong>{{$user->email}}</p>
    <br>
    <p><strong>Your Balance : </strong>{{$user->balance}} INR</p>
  </div>
</main>

@endsection