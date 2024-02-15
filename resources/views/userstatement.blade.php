@extends("layouts.userheadfoot")

@section("page-content")

<main>
<br><br>
<div>
<h2>STATEMENT OF ACCOUNT</h2>

<table style="font-family:verdana;color:black(251, 255, 251);"class="table">

<tr>
     <th>SI.NO</th>
     <th>DATE AND TIME</th>
     <th>AMOUNT</th>
     <th>TYPE</th>
     <th>DETAILS</th>
     <th>BALANCE</th>
</tr>

@foreach($user as $userf)

<tr>
     <td>{{$loop->iteration}}</td>
     <td>{{$userf->created_at}}</td>
     <td>{{$userf->activityamnt}}</td>
     <td>{{$userf->type}}</td>
     <td>{{$userf->details}}</td>
     <td>{{$userf->presentbalance}}</td>
          
</tr>
 
@endforeach

</table>
</div>
</main>

@endsection