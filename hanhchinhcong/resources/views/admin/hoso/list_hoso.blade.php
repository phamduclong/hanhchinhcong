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
                        <h3 class="box-title">Danh sách Hồ sơ</h3>
                    </div>
                    <div class="box-body">
                        <!-- /.box-header -->
                        <div class="div">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input name="address" value="" class="form-control" placeholder="Nhập tiêu đề">
                                    </div>
                                </div>
                                {{-- <div class="col-xs-3">
                                    <div class="form-group">
                                        <label>Chức vụ</label>
                                        <select name="status" id="show_job" class="form-control"><option value="" selected="">Chọn chức vụ</option></select>
                                    </div>
                                </div> --}}
                                <div class="col-xs-2">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <input class="form-control btn btn-primary" type="submit" value="Tìm kiếm">
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <a class="form-control btn btn-success" data-toggle="modal" href="#modal_add_employee">Thêm mới</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="data_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="bg-primary">ID</th>
                                <th class="bg-primary" width="300px">Tên Người Nộp hồ sơ</th>
                                <!--                                    <th class="bg-primary">Chức vụ</th>-->
                                <th class="bg-primary">Số điện thoại</th>
                                <th class="bg-primary">Email</th>
                                <th class="bg-primary">Địa chỉ</th>
                                <th class="bg-primary">Lý do nộp</th>
                                <th class="bg-primary">File đính kèm</th>
                                <th class="bg-primary">Trạng Thái hồ sơ</th>
                                <th class="bg-primary">Id Mã thủ tục</th>
                                <th class="bg-primary">Id Hồ sơ</th>
                                <th class="bg-primary">Hành động</th>
                            </tr>
                            </thead>
                            @foreach($hoso as $hs)
                            <tbody id="show_data">
                                <tr>
                                    <td>{{$hs->id}}</td>
                                    <td>{{$hs->name}}</td>
                                    <td>{{$hs->phone}}</td>
                                    <td>{{$hs->email}}</td>
                                    <td>{{$hs->address}}</td>
                                    <td>{{$hs->reason}}</td>
                                    <td>{{$hs->file}}</td>
                                    <td>{{$hs->status}}</td>
                                    <td>{{$hs->id_mathutuc}}</td>
                                    <td>{{$hs->id_hoso}}</td>
                                    <td>
                                        <button class="btn btn-action label label-danger" style="margin-right: 5px">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <button class="btn btn-action label label-success">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix" id="paginate_div">
                        <ul class="pagination pull-right">
                            {{-- {{$congdan->links()}} --}}
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
@endsection
    
