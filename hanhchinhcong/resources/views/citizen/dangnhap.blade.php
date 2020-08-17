{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng Nhập</title>

    <link href="{{asset('asset2/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body> --}}
@extends('citizen.layout.app')
@section('content')
<div class="container">
<hr>





<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Login</h4>
	
<form autocomplete="off" method="POST" action="{{route('handle-dangnhap')}}">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Username</label>
      <input type="text" class="form-control" placeholder="Username" name="username">
    </div>
    <div class="form-group col-md-6">
      <label>Password</label>
      <input type="password" class="form-control" placeholder="Password" name="password">
    </div>
  </div>
  @if(isset($message))
    <div style="color: red">{{$message}}</div>
  @endif
  <button type="submit" class="btn btn-danger">Đăng Nhập</button>
  {{csrf_field()}}
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->
@endsection
    
{{-- </body>
</html> --}}




