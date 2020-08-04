<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('asset1/images/avatar.png')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Trường</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li><a href="{{route('admin_list_nhanvien')}}"><i class="fa fa-th"></i> <span>Danh sách nhân viên</span></a></li>
                <li><a href="{{route('admin_list_congdan')}}"><i class="fa fa-th"></i> <span>Danh sách công dân</span></a></li>
                <li><a href="{{route('admin_list_linhvuc')}}"><i class="fa fa-th"></i> <span>Danh sách lĩnh vực</span></a></li>
                <li><a href="{{route('admin_list_thutuc')}}"><i class="fa fa-th"></i> <span>Danh sách thủ tục</span></a></li>
                <li><a href="{{route('admin_list_hoso')}}"><i class="fa fa-th"></i> <span>Danh sách hồ sơ</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>