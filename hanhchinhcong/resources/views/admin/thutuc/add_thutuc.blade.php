@extends('admin.layout.app')

@section('content')
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
                        <h3 class="box-title">Thêm Thủ Tục</h3>
                    </div>
                    <div class="box-body">
                        <!-- /.box-header -->
                        <div class="div">
                            
                        </div>
                        <form role="form" action="{{route('post-add-thutuc')}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="sr-only" for="contact-name">Name</label>
                                <input type="text" name="namethutuc" placeholder="Tên Thủ Tục" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="contact-name">Mức Độ</label>
                                <input type="text" name="mucdo" placeholder="Mức Độ" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="contact-name">Id Mã Lĩnh Vực</label>
                                <input type="text" name="id_malinhvuc" placeholder="Id Mã Lĩnh Vực" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="contact-name">Link Form</label>
                                <input type="text" name="linkform" placeholder="Link Form" class="form-control">
                            </div>

                            <div id="thongbaoloi"></div>
                            
                            <button type="submit" class="btn btn-warning" id="buttonSaveAdd">Save</button>
                            {{csrf_field()}}
                        </form>
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






