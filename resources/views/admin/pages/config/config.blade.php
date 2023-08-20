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
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <form id="user-form" name="user-form" action="{{ route('configs-update') }}" method="POST">
                                    @csrf
                                    @if (session('edit-success'))
                                        <h5 class="config-message mb-2 text-success">{{ session('edit-success') }}</h5>
                                    @endif
                                    <h4 class="header-title user-add-title">Statistics</h4>
                                    <div class="form-group">
                                        <label class="col-form-label">Website name</label>
                                        <input class="form-control" name="name" type="text" value="{{ $config->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Description</label>
                                        <textarea class="form-control" name="description" type="text">
                                            {{ $config->description }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Keyword search</label>
                                        <input class="form-control" name="keyword" type="text" value="{{ $config->keyword }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Code google analytics</label>
                                        <textarea class="form-control" name="code_google" type="text" value="{{ $config->code_google }}">
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Code facebook analytics</label>
                                        <textarea class="form-control" name="code_facebook" type="text" value="{{ $config->code_facebook }}">
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Email admin</label>
                                        <input class="form-control" name="email_admin" type="text" value="{{ $config->email_admin }}" >
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Hotline 1</label>
                                        <input class="form-control" name="hotline_1" type="text" value="{{ $config->hotline_1 }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Hotline 2</label>
                                        <input class="form-control" name="hotline_2" type="text" value="{{ $config->hotline_2 }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Skype</label>
                                        <input class="form-control" name="skype" type="text" value="{{ $config->skype }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Facebook</label>
                                        <input class="form-control" name="facebook" type="text" value="{{ $config->facebook }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Facebook page</label>
                                        <input class="form-control" name="facebook_page" type="text" value="{{ $config->facebook_page }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Twitter</label>
                                        <input class="form-control" name="twitter" type="text" value="{{ $config->twitter }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Youtube</label>
                                        <input class="form-control" name="youtube" type="text" value="{{ $config->youtube }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Instagram</label>
                                        <input class="form-control" name="instagram" type="text" value="{{ $config->instagram }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Whatsapp</label>
                                        <input class="form-control" name="whatsapp" type="text" value="{{ $config->whatsapp }}">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.config-message').delay(5000).fadeOut();
        })
    </script>
@endsection
