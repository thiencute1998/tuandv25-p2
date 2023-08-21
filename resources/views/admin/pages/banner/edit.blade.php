@extends('admin.layouts.master')

@section('main-content-inner')
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="row">
                    <!-- Textual inputs start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <form id="product-form" name="product-form" action="{{ route('admin-banner-update', ['id'=> $banner->id]) }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @if (session('edit-success'))
                                        <h5 class="action-message mb-2 text-success">{{ session('edit-success') }}</h5>
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
                                    <input type="hidden" id="banner_id" value="{{$banner->id}}">
                                    <h4 class="header-title product-add-title">Sửa banner</h4>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Hinh anh</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Trạng thái</label>
                                            <select class="form-control banner-status" name="status" data-value="{{ $banner->status }}">
                                                <option value="1">Hoạt động</option>
                                                <option value="0">Không hoạt động</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Sửa</button>
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

            let status = $('.banner-status').data('value');
            $('.banner-status').val(status);
        });
    </script>
@endsection


