{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng Ký</title>

    <link href="{{asset('asset2/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body> --}}
@extends('citizen.layout.app')
@section('content')
<div class="container">
<hr>





<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	
<form autocomplete="off" method="POST" action="{{route('handle-dangky')}}">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Họ Và Tên</label>
      <input type="text" class="form-control" placeholder="Họ tên" name="name">
    </div>
    <div class="form-group col-md-6">
      <label>Số Điện Thoại</label>
      <input type="text" class="form-control" placeholder="Số điện thoại" name="phone">
    </div>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" placeholder="Email" name="email">
  </div>
  <div class="form-group">
    <label>Địa Chỉ</label>
    <input type="text" class="form-control" placeholder="Địa chỉ" name="address">
  </div>
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
  
  <button type="submit" class="btn btn-primary">Tạo Tài Khoản</button>
  <button class="btn btn-danger"><a href="{{route('dangnhap')}}" style="color:white">Đăng Nhập</a></button>
  {{csrf_field()}}
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->
@endsection   
{{-- </body>
</html> --}}




