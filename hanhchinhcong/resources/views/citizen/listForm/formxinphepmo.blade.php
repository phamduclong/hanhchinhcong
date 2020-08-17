@extends('citizen.layout.app')
@section('content')
<h2>Form Xin Phép Mở</h2>
<form autocomplete="off" method="POST" action="{{route('post-hoso',$idThutuc)}}">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Họ Và Tên</label>
      <input type="text" class="form-control" placeholder="Họ tên" name="namecitizen">
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
      <label>Lý Do Nộp</label>
      <input type="text" class="form-control" placeholder="Lý do nộp" name="reason">
    </div>
    
    <div class="form-group col-md-6">
      <label>File Đính kèm</label>
      <input type="file" class="form-control" name="file">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Nộp</button>
  {{csrf_field()}}
</form>
@endsection