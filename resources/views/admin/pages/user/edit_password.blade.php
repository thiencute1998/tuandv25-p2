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
                                <form id="user-form" name="user-form" action="{{ route('update-password') }}" method="POST">
                                    @csrf
                                    <h4 class="header-title user-add-title">Change password</h4>
                                    <h6 class="user-message mb-2"></h6>
                                    <div class="form-group">
                                        <label class="col-form-label">Old password</label>
                                        <input class="form-control" name="password" type="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">New password</label>
                                        <input class="form-control" name="newPassword" type="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Confirm New password</label>
                                        <input class="form-control" name="confirmNewPassword" type="password" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update password</button>
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
            $('#user-form').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: '{{route('update-password')}}',
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function() {
                        $('.user-message').removeClass('text-danger');
                        $('.user-message').addClass('text-success');
                        $('.user-message').text("Update password successed !!!");
                    },
                    error: function(error) {
                        let errorMessage = "";
                        if (error.status === 422) {
                            if (error.responseJSON.error) {
                                let errors = error.responseJSON.error;
                                for(let key in errors) {
                                    errorMessage = errors[key];
                                }
                            }
                        } else {
                            errorMessage = "Error!!!"
                        }
                        $('.user-message').addClass('text-danger');
                        $('.user-message').removeClass('text-success');
                        $('.user-message').text(errorMessage);
                    }
                })
            })
        })
    </script>
@endsection
