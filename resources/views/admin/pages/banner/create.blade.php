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
                                <form id="product-form" name="product-form" action="{{ route('admin-banner-store') }}" enctype="multipart/form-data" method="POST">
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
                                            <h4 class="header-title product-add-title">Thêm banner</h4>
                                        </div>
                                        <div>
                                            <a class="btn btn-primary" href="{{route('admin-banner')}}">
                                                <i class="ti-list"></i><span>Danh sách</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Tên(*)</label>
                                            <input type="text" class="form-control" name="name" placeholder="Nhập tên" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Hinh anh</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="services" class="col-form-label">Loại ảnh</label>
                                            <select class="form-control" name="type">
                                                <option value="0" selected>Chọn loại ảnh</option>
                                                <option value="1">Banner</option>
                                                <option value="2">Slide</option>
                                                <option value="3">Menu Right</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="services" class="col-form-label">Trạng thái</label>
                                            <select class="form-control" name="status">
                                                <option value="1" selected>Hoạt động</option>
                                                <option value="0">Không hoạt động</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Link</label>
                                            <input type="text" name="link" class="form-control">
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


