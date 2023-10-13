@extends('admin.layouts.master')
@section('main-content-inner')
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="row">
                    <!-- Textual inputs start -->
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <form id="product-form" name="product-form" action="{{ route('admin-church-store') }}"  method="POST">
                                    @csrf
                                    @if (session('add-success'))
                                        <h5 class="action-message mb-2 text-success">{{ session('add-success') }}</h5>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="row form-group justify-content-between">
                                        <div>
                                            <h4 class="header-title product-add-title">Thêm nhà thờ</h4>
                                        </div>
                                        <div>
                                            <a class="btn btn-primary" href="{{route('admin-church')}}">
                                                <i class="ti-list"></i><span>Danh sách</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-2">
                                            <label for="services" class="col-form-label">Tên tỉnh</label>
                                            <input type="text" name="province" class="form-control" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="services" class="col-form-label">Tên huyện</label>
                                            <input type="text" name="district" class="form-control" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="services" class="col-form-label">Tên xã</label>
                                            <input type="text" name="commune" class="form-control" >
                                        </div>
                                        <div class="col-md-3">
                                            <label for="services" class="col-form-label">Thôn</label>
                                            <input type="text" name="village" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="services" class="col-form-label">Giáo xứ</label>
                                            <input type="text" name="parish" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Địa chỉ</label>
                                            <input type="text" name="address" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-10">
                                            <label for="services" class="col-form-label">Liên kết Google Map</label>
{{--                                            <input type="text" name="linkgmap" class="form-control" required>--}}
                                            <textarea  class="form-control" name="linkgmap" type="text" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="services" class="col-form-label">Trạng thái</label>
                                            <select class="form-control" name="status">
                                                <option value="1" selected>Hoạt động</option>
                                                <option value="0">Không hoạt động</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Thêm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.action-message').delay(5000).fadeOut();
        });
    </script>
@endsection


