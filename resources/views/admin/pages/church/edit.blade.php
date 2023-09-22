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
                                <form id="product-form" name="product-form" action="{{ route('admin-church-update', ['id'=> $church->id]) }}" method="POST">
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
                                    <input type="hidden" id="link_id" value="{{$church->id}}">
                                    <div class="row form-group justify-content-between">
                                        <div>
                                            <h4 class="header-title product-add-title">Sửa nhà thờ</h4>
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
                                            <input type="text" name="province" class="form-control" required value="{{$church->province}}">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="services" class="col-form-label">Tên huyện</label>
                                            <input type="text" name="district" class="form-control" required value="{{$church->district}}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="services" class="col-form-label">Tên xã</label>
                                            <input type="text" name="commune" class="form-control" required value="{{$church->commune}}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="services" class="col-form-label">Thôn</label>
                                            <input type="text" name="village" class="form-control" required value="{{$church->village}}">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="services" class="col-form-label">Giáo xứ</label>
                                            <input type="text" name="parish" class="form-control" required value="{{$church->parish}}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-10">
                                            <label for="services" class="col-form-label">Liên kết Google Map</label>
{{--                                            <input type="text" name="linkgmap" class="form-control" required value="{{$church->linkgmap}}">--}}
                                            <textarea  class="form-control" name="linkgmap" type="text" rows="3">{{$church->linkgmap}}</textarea>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="services" class="col-form-label">Trạng thái</label>
                                            <select class="form-control link-status" name="status" data-value="{{ $church->status }}">
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

            let status = $('.link-status').data('value');
            $('.link-status').val(status);
        });
    </script>
@endsection


