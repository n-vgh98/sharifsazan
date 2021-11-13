<aside class="main-sidebar direction">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-right info">
                <p>آکادمی آنلاین روکسو</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="جستجو...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            {{-- <li class="header">دسترسی</li> --}}
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>کاربران</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ route('admin.users') }}"><i class="fa fa-circle-o"></i>لیست
                            همه کاربران</a></li>
                    <li class="active"><a href="{{ route('admin.normal.users') }}"><i
                                class="fa fa-circle-o"></i>لیست
                            کاربران عادی</a></li>
                    <li class="active"><a href="{{ route('admin.writer.users') }}"><i
                                class="fa fa-circle-o"></i>لیست
                            کاربران نویسنده</a></li>
                    <li class="active"><a href="{{ route('admin.admin.users') }}"><i
                                class="fa fa-circle-o"></i>لیست
                            ادمین ها</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>تماس با ما</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ route('admin.users') }}"><i class="fa fa-circle-o"></i>پیام
                            های دریافت شده</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
