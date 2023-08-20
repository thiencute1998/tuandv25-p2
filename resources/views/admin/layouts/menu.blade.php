<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <h4><a href="{{route('admin-index')}}" class="text-white">Admin</a></h4>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active">
                        <a href="#" aria-expanded="true"><i class="ti-dashboard"></i><span>Introduce</span></a>
                    </li>
                    <li>
                        <a href="admin/banners" aria-expanded="true"><i class="ti-dashboard"></i><span>Banners</span></a>
                        <ul class="collapse">
                            <li><a href="{{route('logos')}}">Logo</a></li>
                            <li><a href="{{route('slides')}}">Slides</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('admin-category')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý danh mục</span></a>
                    </li>
                    <li>
                        <a href="{{route('admin-tag')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý tag</span></a>
                    </li>
                    <li>
                        <a href="{{route('admin-post')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý bài viết</span></a>
                    </li>
                    <li>
                        <a href="{{route('admin-calendar')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý lịch phụng vụ</span></a>
                    </li>
                    <li>
                        <a href="admin/banners" aria-expanded="true"><i class="ti-dashboard"></i><span>Admin</span></a>
                        <ul class="collapse">
                            <li class="active"><a href="{{route('configs')}}">Config</a></li>
                            <li><a href="{{route('users')}}">Users</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
