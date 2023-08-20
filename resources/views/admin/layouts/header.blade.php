<!-- header area start -->
<div class="header-area">
    <div class="row align-items-center">
        <!-- nav and search button -->
        <div class="col-sm-6 clearfix">
            <div class="nav-btn pull-left">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="breadcrumbs-area clearfix">
{{--                <h4 class="page-title pull-left">Dashboard</h4>--}}
{{--                <ul class="breadcrumbs pull-left">--}}
{{--                    <li><a href="">Home</a></li>--}}
{{--                    <li><span>Dashboard</span></li>--}}
{{--                </ul>--}}
            </div>
        </div>
        <!-- profile info & task notification -->
        <div class="col-md-6 col-sm-6 text-center">
            <div class="user-profile pull-right mr-1">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ $userLogin ? $userLogin->name : "" }} <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('edit-password')}}">Change password</a>
                    <a class="dropdown-item" href="{{route('logout-auth')}}">Log Out</a>
                </div>
            </div>
{{--            <div class="user-profile pull-right mr-3">--}}
{{--                <h4 class="user-name"><a href="{{route('index')}}" target="_blank" style="color: #fff">Home Page</a></h4>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
<!-- header area end -->
