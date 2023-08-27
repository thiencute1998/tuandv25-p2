@extends('admin.layouts.master')
@section('admin-css')
    <style>

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

                                <form id="user-form" name="user-form" action="{{ route('admin-about-update') }}" method="POST">
                                    @csrf
                                    @if (session('edit-success'))
                                        <h5 class="config-message mb-2 text-success">{{ session('edit-success') }}</h5>
                                    @endif
                                    <div class="form-group">
                                        <label class="col-form-label">Giới thiệu</label>
                                        <textarea id="gioithieu" class="form-control" name="gioithieu" type="text">
                                            {{ $about->gioithieu }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Liên hệ</label>
                                        <textarea id="lienhe" class="form-control" name="lienhe" type="text">
                                            {{ $about->lienhe }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Bản đồ</label>
                                        <textarea id="bando" class="form-control" name="bando" type="text" >
                                            {{ $about->bando }}
                                        </textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />
    <script type="text/javascript" src="{{ asset('richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src='{{ asset('richtexteditor/plugins/all_plugins.js') }}'></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var editor1 = new RichTextEditor("#gioithieu");
            var editor2 = new RichTextEditor("#lienhe");
            var editor3 = new RichTextEditor("#bando");
            $('.config-message').delay(5000).fadeOut();
        })
    </script>
@endsection
