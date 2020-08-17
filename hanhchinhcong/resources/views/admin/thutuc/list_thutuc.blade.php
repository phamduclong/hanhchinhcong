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
                        <h3 class="box-title">Danh sách thủ tục</h3>
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
                                @if(Session::get('typeAdmin') == 'Admin')
                                <div class="col-xs-2">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <a class="form-control btn btn-success" data-toggle="modal" href="{{route('add-thutuc')}}">Thêm mới</a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <table id="data_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="bg-primary">ID</th>
                                <th class="bg-primary" width="300px">Tên thủ tục</th>
                                <!--                                    <th class="bg-primary">Chức vụ</th>-->
                                <th class="bg-primary">Id Mã thủ tục</th>
                                <th class="bg-primary">Mức độ</th>
                                <th class="bg-primary">Id Mã lĩnh vực</th>
                                @if(Session::get('typeAdmin') == 'Admin')
                                <th class="bg-primary">Hành động</th>
                                @endif
                            </tr>
                            </thead>
                            @foreach($thutuc as $tt)
                            <tbody id="show_data">
                                <tr>
                                    <td>{{$tt->id}}</td>
                                    <td>{{$tt->namethutuc}}</td>
                                    <td>{{$tt->id_mathutuc}}</td>
                                    <td>{{$tt->mucdo}}</td>
                                    <td>{{$tt->id_malinhvuc}}</td>
                                    @if(Session::get('typeAdmin') == 'Admin')
                                    <td>
                                        <button class="btn btn-action label label-danger" style="margin-right: 5px">
                                            <a href="{{route('delete-thutuc',$tt->id)}}" style="color: white">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </button>
                                        <button class="btn btn-action label label-success">
                                            <a href="{{route('edit-thutuc',$tt->id)}}" style="color: white">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </button>
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
    
