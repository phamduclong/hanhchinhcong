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
                        <h3 class="box-title">Danh sách công dân</h3>
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
                                {{-- <div class="col-xs-2">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <a class="form-control btn btn-success" data-toggle="modal" href="#modal_add_employee">Thêm mới</a>
                                    </div>
                                </div> --}}
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
                                @if(Session::get('typeAdmin') == 'Admin')
                                    <th class="bg-primary">Hành động</th>
                                    <th class="bg-primary">Block</th>
                                @endif
                            </tr>
                            </thead>
                            @foreach($congdan as $citizen)
                            <tbody id="show_data">
                                <tr>
                                    <td>{{$citizen->id}}</td>
                                    <td>{{$citizen->name}}</td>
                                    <td>{{$citizen->phone}}</td>
                                    <td>{{$citizen->address}}</td>
                                    @if(Session::get('typeAdmin') == 'Admin')
                                        <td>
                                            <button class="btn btn-action label label-danger" style="margin-right: 5px">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <button class="btn btn-action label label-success">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <form action="{{route('post-block-congdan',$citizen->id)}}" method="post" enctype="multipart/form-data">
                                                <select name="block">                                       
                                                        <option value="Yes" <?php echo $citizen->block=='Yes'?' selected ':'' ?>>Yes</option>
                                                        <option value="No" <?php echo $citizen->block=='No'?' selected ':'' ?>>No</option>
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
                            {{$congdan->links()}}
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
    
