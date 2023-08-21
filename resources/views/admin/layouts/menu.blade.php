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
                    <li class="{{Request::path() == 'admin' ? 'active' : ''}}">
                        <a href="#" aria-expanded="true"><i class="ti-dashboard"></i><span>Trang chủ</span></a>
                    </li>
                    <li class="{{str_contains(Request::path(), 'admin/banner') ? 'active' : ''}}">
                        <a href="{{route('admin-banner')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý banner</span></a>
                    </li>
{{--                    <li>--}}
{{--                        <a href="{{route('admin-slide')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý slide</span></a>--}}
{{--                    </li>--}}
                    <li class="{{str_contains(Request::path(), 'admin/category') ? 'active' : ''}}">
                        <a href="{{route('admin-category')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý danh mục</span></a>
                    </li>
                    <li class="{{str_contains(Request::path(), 'admin/tag') ? 'active' : ''}}">
                        <a href="{{route('admin-tag')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý tag</span></a>
                    </li>
                    <li class="{{str_contains(Request::path(), 'admin/post') ? 'active' : ''}}">
                        <a href="{{route('admin-post')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý bài viết</span></a>
                    </li>
                    <li class="{{str_contains(Request::path(), 'admin/calendar') ? 'active' : ''}}">
                        <a href="{{route('admin-calendar')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý lịch phụng vụ</span></a>
                    </li>
                    <li class="{{str_contains(Request::path(), 'admin/link') ? 'active' : ''}}">
                        <a href="{{route('admin-link')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản lý liên kết website</span></a>
                    </li>
                    <li class="{{str_contains(Request::path(), 'admin/manage') ? 'active' : ''}}">
                        <a href="admin/banners" aria-expanded="true"><i class="ti-dashboard"></i><span>Quản trị</span></a>
                        <ul class="collapse">
                            <li ><a href="{{route('configs')}}">Cấu hình</a></li>
                            <li class="{{str_contains(Request::path(), 'admin/manage/users') ? 'active' : ''}}"><a href="{{route('users')}}">Người dùng</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
