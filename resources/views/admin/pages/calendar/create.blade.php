@extends('admin.layouts.master')
@section('admin-css')
    <link href=
              'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'>
    <style>
        .ui-datepicker {
            width: 20em;
        }
        h1{
            color:green;
        }
    </style>
@endsection
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
                                <form id="product-form" name="product-form" action="{{ route('admin-calendar-store') }}" enctype="multipart/form-data" method="POST">
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
                                            <h4 class="header-title product-add-title">Thêm lịch phụng vụ</h4>
                                        </div>
                                        <div>
                                            <a class="btn btn-primary" href="{{route('admin-calendar')}}">
                                                <i class="ti-plus"></i><span>Danh sách</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-8">
                                            <label for="services" class="col-form-label">Tên(*)</label>
                                            <input type="text" class="form-control" name="name" placeholder="Nhập tên lịch phụng vụ" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Trạng thái</label>
                                            <select class="form-control" name="status">
                                                <option value="1" selected>Hoạt động</option>
                                                <option value="2">Nổi bật</option>
                                                <option value="0">Không hoạt động</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Ngày</label>
                                            <input type="text" id="my-date" name="d_date" class="form-control" placeholder="Ngày">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Địa chỉ</label>
                                            <input type="text" class="form-control" name="address" placeholder="Địa chỉ">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Hinh ảnh</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="product-content" class="col-form-label">Nội dung</label>
                                            <textarea class="form-control" name="content" type="text" id="content">
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Title</label>
                                            <input type="text" class="form-control" name="title" placeholder="Nhập title" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Keywords</label>
                                            <textarea rows="3" cols="200" type="text" class="form-control" name="keywords" placeholder="Nhập keywords" required ></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Description</label>
                                            <textarea rows="3" cols="200" type="text" class="form-control" name="description" placeholder="Nhập description" required ></textarea>
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
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>--}}
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script src=
                "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" defer>
    </script>
    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />
    <script type="text/javascript" src="{{ asset('richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src='{{ asset('richtexteditor/plugins/all_plugins.js') }}'></script>
    <script type="text/javascript">
        var editor = new RichTextEditor("#content");
        {{--ClassicEditor--}}
        {{--    .create( document.querySelector( '#content' ), {--}}
        {{--        ckfinder: {--}}
        {{--            uploadUrl: "{{route('admin-calendar-ckeditor-upload', ['_token' => csrf_token() ])}}"--}}
        {{--        }--}}
        {{--    } )--}}
        {{--    .then( editor => {--}}
        {{--        editor.ui.view.editable.element.style.height = '500px';--}}
        {{--    } )--}}
        {{--    .catch( error => {--}}
        {{--        console.error( error );--}}
        {{--    } );--}}

        $(document).ready(function() {
            $('.action-message').delay(5000).fadeOut();

            $( "#my-date" ).datepicker({
            });
        });
    </script>
@endsection


