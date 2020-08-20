@extends('citizen.layout.app')
@section('content')
<h2>Form Xây Dựng</h2>
<form autocomplete="off" method="POST" action="{{route('post-hoso',$idThutuc)}}">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Họ Và Tên</label>
      <input type="text" class="form-control" placeholder="Họ tên" name="namecitizen" id="inputName">
    </div>
    <div class="form-group col-md-6">
      <label>Số Điện Thoại</label>
      <input type="text" class="form-control" placeholder="Số điện thoại" name="phone" id="inputPhone">
    </div>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" placeholder="Email" name="email" id="inputEmail">
  </div>
  <div class="form-group">
    <label>Địa Chỉ</label>
    <input type="text" class="form-control" placeholder="Địa chỉ" name="address" id="inputAddress">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Lý Do Nộp</label>
      <input type="text" class="form-control" placeholder="Lý do nộp" name="reason" id="inputReason">
    </div>
    
    <div class="form-group col-md-6">
      <label>File Đính kèm</label>
      <input type="file" class="form-control" name="file" id="inputFile">
    </div>
  </div>

  <div id="note" style="color: red"></div>
  
  <button type="submit" class="btn btn-primary" id="NOP">Nộp</button>
  {{csrf_field()}}
</form>


<script type="text/javascript">

$(document).ready(function(){
  $('#NOP').click(function(event){
    var name  = $('#inputName').val();
    var phone = $('#inputPhone').val();
    var email = $('#inputEmail').val();
    var address = $('#inputAddress').val();
    var reason = $('#inputReason').val();
    var file = $('#inputFile').val();
    if(name == "" ||phone == "" ||email == "" ||address == "" ||reason == "" ||file == "" ){
      event.preventDefault();
      $('#note').html('Không được dể trống bất kỳ trường nào');
    }

    
  });
});

</script>
@endsection