<form role="form" action="{{route('post-edit-nhanvien',$nhanvien->id)}}" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="sr-only" for="contact-name">Name</label>
        <input type="text" name="name" value="{{$nhanvien->name}}" class="form-control" id="inputEditName">
    </div>
    <div class="form-group">
        <label class="sr-only" for="contact-phone">Phone</label>
        <input type="text" name="phone" value="{{$nhanvien->phone}}" class="form-control" id="inputEditPhone">
    </div>
    <div class="form-group">
        <label class="sr-only" for="contact-email">Email</label>
        <input type="text" name="email" value="{{$nhanvien->email}}" class="form-control" id="inputEditEmail">
    </div>
    <div class="form-group">
        <label class="sr-only" for="contact-address">Address</label>
        <input type="text" name="address" value="{{$nhanvien->address}}" class="form-control" id="inputEditAddress">
    </div>
    <div class="form-group">
        <label class="sr-only" for="contact-message">Thủ tục quản lý</label>
        <input name="id_mathutuc" value="{{$nhanvien->id_mathutuc}}" class="contact-message form-control" id="inputEditIdMathutuc">
    </div>
    <button type="submit" class="btn btn-warning" id="buttonSaveEdit">Save</button>
    {{csrf_field()}}
</form>