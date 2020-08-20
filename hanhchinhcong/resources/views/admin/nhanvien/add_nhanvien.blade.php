<form role="form" action="{{route('post-add-nhanvien')}}" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label class="sr-only" for="contact-name">Name</label>
        <input type="text" name="name" placeholder="Name..." class="form-control" id="inputName">
    </div>
    <div class="form-group">
        <label class="sr-only" for="contact-phone">Phone</label>
        <input type="text" name="phone" placeholder="phone..." class="form-control" id="inputPhone">
    </div>
    <div class="form-group">
        <label class="sr-only" for="contact-email">Email</label>
        <input type="text" name="email" placeholder="Email..." class="form-control" id="inputEmail">
    </div>
    <div class="form-group">
        <label class="sr-only" for="contact-address">Address</label>
        <input type="text" name="address" placeholder="Address..." class="form-control" id="inputAddress">
    </div>
    <div class="form-group">
        <label class="sr-only" for="contact-message">Thủ tục quản lý</label>
        <textarea name="id_mathutuc" placeholder="Thủ tục quản lý (điền số)..." class="contact-message form-control" id="textareaIDMathutuc"></textarea>
    </div>
    <div class="form-group">
        <label class="sr-only" for="contact-name">Username</label>
        <input type="text" name="username" placeholder="Username..." class="form-control" id="inputUsername">
    </div>
    <div class="form-group">
        <label class="sr-only" for="contact-name">Password</label>
        <input type="text" name="password" placeholder="Password..." class="form-control" id="inputPassword">
    </div>
    <button type="submit" class="btn btn-warning" id="buttonSaveAdd">Save</button>
    {{csrf_field()}}
</form>

