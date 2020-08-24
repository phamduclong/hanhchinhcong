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
                        <h3 class="box-title">Báo Cáo Thủ Tục</h3>
                    </div>
                    <div class="box-header">
                    <button class="btn btn-success"><a href="{{route('export-report')}}" style="color: white">Export Exel</a></button>
                    </div>
                    <div class="box-body">
                        <!-- /.box-header -->

                        <h2>Hồ Sơ Tiếp Nhận</h2>
                        
                        <table id="data_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="bg-primary">STT</th>
                                <th class="bg-primary" width="300px">Tên thủ tục</th>
                                <th class="bg-primary">Số hồ sơ tiếp nhận</th>
                                {{-- <th class="bg-primary">Số hồ sơ đã giải quyết</th>
                                <th class="bg-primary">Số hồ sơ đang giải quyết</th> --}}
                            </tr>
                            </thead>
                            <tbody id="show_data">
                                @foreach($thutuc as $tt)
                                <tr>
                                    <td>{{$tt->STT}}</td>
                                    <td>{{$tt->tenthutuc}}</td>
                                    <td>{{$tt->sohosotiepnhan}}</td>
                                    {{-- <td></td>
                                    <td></td> --}}
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br>

                        <h2>Hồ Sơ Đã Giải Quyết</h2>

                        <table id="data_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="bg-primary">STT</th>
                                <th class="bg-primary" width="300px">Tên thủ tục</th>
                                <th class="bg-primary">Số hồ sơ đã giải quyết</th>
                                {{-- <th class="bg-primary">Số hồ sơ đã giải quyết</th>
                                <th class="bg-primary">Số hồ sơ đang giải quyết</th> --}}
                            </tr>
                            </thead>
                            <tbody id="show_data">
                                @foreach($thutuc1 as $tt1)
                                <tr>
                                    <td>{{$tt1->STT}}</td>
                                    <td>{{$tt1->tenthutuc}}</td>
                                    <td>{{$tt1->sohosodagiaiquyet}}</td>
                                    {{-- <td></td>
                                    <td></td> --}}
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br>

                        <h2>Hồ Sơ Đang Giải Quyết</h2>
                        <table id="data_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="bg-primary">STT</th>
                                <th class="bg-primary" width="300px">Tên thủ tục</th>
                                <th class="bg-primary">Số hồ sơ đang giải quyết</th>
                                {{-- <th class="bg-primary">Số hồ sơ đã giải quyết</th>
                                <th class="bg-primary">Số hồ sơ đang giải quyết</th> --}}
                            </tr>
                            </thead>
                            <tbody id="show_data">
                                @foreach($thutuc2 as $tt2)
                                <tr>
                                    <td>{{$tt2->STT}}</td>
                                    <td>{{$tt2->tenthutuc}}</td>
                                    <td>{{$tt2->sohosodanggiaiquyet}}</td>
                                    {{-- <td></td>
                                    <td></td> --}}
                                    
                                </tr>
                                @endforeach
                            </tbody>
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
    
