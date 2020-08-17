@extends('admin.layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blank page
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('homeadmin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            {{-- <li><a href="#">Examples</a></li> --}}
            <li class="active">
                <a href="{{route('logout')}}">
                    Logout
                </a>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách nhân viên</h3>
                        @if(isset($tukhoa))
                            <h4>Từ Khóa : <span style="color: red">{{$tukhoa}}</span></h4>
                        @endif
                    </div>
                    <div class="box-body">
                        <!-- /.box-header -->
                        <div class="div">
                            <div class="row">
                                <form action="{{route('search-nhanvien')}}" method="post" enctype="multipart/form-data">
                                    <div class="col-xs-4">
                                        <div class="form-group">
                                            <label>Tìm theo tên nhân viên</label>
                                            <input name="name" value="" class="form-control" placeholder="Nhập tên">
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <label>Chức vụ</label>
                                            <select name="type" id="show_job" class="form-control">
                                                <option value="" selected="selected">Chọn chức vụ</option>
                                                <option value="Admin">Admin</option>
                                                <option value="NoAdmin">NoAdmin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-2">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <input class="form-control btn btn-primary" type="submit" value="Tìm kiếm">
                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                </form>
                                @if(Session::get('typeAdmin') == 'Admin')
                                <div class="col-xs-2">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        {{-- <a class="form-control btn btn-success" data-toggle="modal" href="#modal_add_employee">Thêm mới</a> --}}
                                             {{-- <a class="form-control btn btn-success" data-toggle="modal" href="{{route('add-nhanvien')}}">Thêm mới</a> --}}
                                             {{-- <button type="button" class="form-control btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg" id="buttonAdd">Thêm mới</button> --}}
                                             <button type="button" class="form-control btn btn-success" data-toggle="modal"  id="buttonAdd">Thêm mới</button>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <table id="data_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="bg-primary">ID</th>
                                <th class="bg-primary" width="300px">Họ tên</th>
                                <!--                                    <th class="bg-primary">Chức vụ</th>-->
                                <th class="bg-primary">Số điện thoại</th>
                                <th class="bg-primary" width="300px">Địa chỉ</th>
                                <th class="bg-primary">Thủ tục quản lý</th>
                                @if(Session::get('typeAdmin') == 'Admin')
                                <th class="bg-primary">Hành động</th>
                                <th class="bg-primary">Block</th>
                                @endif
                            </tr>
                            </thead>
                            @foreach($nhanvien as $staff)
                            <tbody id="show_data">
                                <tr>
                                    <td>{{$staff->id}}</td>
                                    <td>{{$staff->name}}</td>
                                    <td>{{$staff->phone}}</td>
                                    <td>{{$staff->address}}</td>
                                    <td>{{$staff->id_mathutuc}}</td>
                                    @if(Session::get('typeAdmin') == 'Admin')
                                    <td>
                                        <button class="btn btn-action label label-danger buttonDelete" style="margin-right: 5px" point="{{$staff->id}}">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        <!-- Modal delete nhân viên-->
                                        <div class="modal fade" id="{{'modalDelete'.$staff->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Thông Báo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="{{'modal-body-delete'.$staff->id}}">
                                                Bạn Muốn Xóa Nhân Viên {{$staff->name}} ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                                <button type="button" class="btn btn-primary">
                                                    <a href="{{route('delete-nhanvien',$staff->id)}}" style="color:white">
                                                    Có
                                                    </a>
                                                </button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>



                                        {{-- <form action="{{route('edit-nhanvien',$staff->id)}}" method="post" enctype="multipart/form-data"> --}}
                                            <button class="btn btn-action label label-success buttonEdit" type="submit" id="{{$staff->id}}">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            {{-- {{csrf_field()}}
                                        </form> --}}


                                        <!-- Large modal edit nhân viên -->
                                        <div class="modal fade bd-example-modal-lg" id="{{'modalEdit'.$staff->id}}">
                                        <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Sửa Nhân Viên</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="{{'modal-body'.$staff->id}}">
                                            {{$staff->id}}
                                        </div>

                                        <!-- Modal footer -->
                                        {{-- <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div> --}}

                                        </div>
                                        </div>
                                        </div>
                                        <!-- /.Large modal -->
                                    </td>
                                    <td>
                                        <form action="{{route('post-block-nhanvien',$staff->id)}}" method="post" enctype="multipart/form-data">
                                            <select name="block">                                       
                                                    <option value="Yes" <?php echo $staff->block=='Yes'?' selected ':'' ?>>Yes</option>
                                                    <option value="No" <?php echo $staff->block=='No'?' selected ':'' ?>>No</option>
                                            </select>
                                            {{csrf_field()}}
                                            <button class="btn btn-action label label-warning" type="submit">
                                                Save
                                            </button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix" id="paginate_div">
                        <ul class="pagination pull-right">
                            {{-- {{$nhanvien->links()}} --}}
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Large modal add nhân viên -->
<div class="modal fade bd-example-modal-lg" id="modalAdd">
<div class="modal-dialog modal-lg">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
    <h4 class="modal-title">Thêm Nhân Viên</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">
    Modal body..
    
</div>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<!-- Modal footer -->
{{-- <div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div> --}}

</div>
</div>
</div>
<!-- /.Large modal -->


<!-- Modal thông báo validate-->
<div class="modal fade" id="modalThongbao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông Báo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body-thongbao">
        Thông Báo
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
    </div>
    </div>
</div>
</div>





<script type="text/javascript">
$(document).ready(function() {
    $('#buttonAdd').click(function() {
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { 
         $('.modal-body').html(this.responseText);
         $('#modalAdd').modal('show');

         $('#buttonSaveAdd').click(function(event){

            var name = $('#inputName').val();
            var phone = $('#inputPhone').val();
            var email = $('#inputEmail').val();
            var address = $('#inputAddress').val();
            var id_mathutuc = $('#textareaIDMathutuc').val();

            if(name == '' || phone == '' || email == '' || address == '' || id_mathutuc == ''){
                event.preventDefault();
                
                var thongbao = "Bạn không được để trống : "+"<br>"
                if(name == ""){
                    thongbao = thongbao + "Trường : Name"+"<br>";
                }
                if(phone == ""){
                    thongbao = thongbao + "Trường : Phone"+"<br>";
                }
                if(email == ""){
                    thongbao = thongbao + "Trường : Email"+"<br>";
                }
                if(address == ""){
                    thongbao = thongbao + "Trường : Address"+"<br>";
                }
                if(id_mathutuc == ""){
                    thongbao = thongbao + "Trường : Id Mã thủ tục"+"<br>";
                }
                $('.modal-body-thongbao').html(thongbao);
                $('#modalThongbao').modal('show');
            }

             
            
    });
        }
        };
        xhttp.open("GET", "http://localhost/Project_hanhchinh/hanhchinhcong/public/admin/add-nhanvien", true);
        xhttp.send();   
    });  
    
    
    $('.buttonEdit').click(function(){
        var id = $(this).attr('id');
        // console.log(id);
        //  $('#modalEdit'+id).modal("show");
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { 
         $('.modal-body'+id).html(this.responseText);
         $('#modalEdit'+id).modal("show");


         $('#buttonSaveEdit').click(function(event){

            var name = $('#inputEditName').val();
            var phone = $('#inputEditPhone').val();
            var email = $('#inputEditEmail').val();
            var address = $('#inputEditAddress').val();
            var id_mathutuc = $('#inputEditIdMathutuc').val();

            if(name == '' || phone == '' || email == '' || address == '' || id_mathutuc == ''){
                event.preventDefault();
                
                var thongbao = "Bạn không được để trống : "+"<br>"
                if(name == ""){
                    thongbao = thongbao + "Trường : Name"+"<br>";
                }
                if(phone == ""){
                    thongbao = thongbao + "Trường : Phone"+"<br>";
                }
                if(email == ""){
                    thongbao = thongbao + "Trường : Email"+"<br>";
                }
                if(address == ""){
                    thongbao = thongbao + "Trường : Address"+"<br>";
                }
                if(id_mathutuc == ""){
                    thongbao = thongbao + "Trường : Id Mã thủ tục"+"<br>";
                }
                $('.modal-body-thongbao').html(thongbao);
                $('#modalThongbao').modal('show');
            }

             
            
    });
         
        }
        };
        xhttp.open("GET", "http://localhost/Project_hanhchinh/hanhchinhcong/public/admin/edit-nhanvien/"+id, true);
        xhttp.send();   
    });

    $('.buttonDelete').click(function(){
        var id = $(this).attr('point');
        // console.log(id);
        $('#modalDelete'+id).modal('show');

        // xhttp = new XMLHttpRequest();
        // xhttp.onreadystatechange = function() {
        // if (this.readyState == 4 && this.status == 200) { 
        //  $('.modal-body-delete'+id).html(this.responseText);
        //  $('#modalEdit'+id).modal("show");
        // }
        // };
        // xhttp.open("GET", "http://localhost/Project_hanhchinh/hanhchinhcong/public/admin/edit-nhanvien/"+id, true);
        // xhttp.send();   
    });

    
});

</script>
@endsection
    
