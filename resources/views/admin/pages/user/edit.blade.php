@extends('admin.layouts.master')
@section('admin-css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .clone-images {
            display: none;
        }
    </style>

@endsection
@section('main-content-inner')
    <div class="card-header filter-with" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <div class="mb-0 ml-1">
            <a href="{{route('users')}}">List User</a>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="row">
                    <!-- Textual inputs start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <form id="user-form" name="user-form" action="{{ route('users-update', ['id'=> $user->id]) }}" method="POST">
                                    @csrf
                                    @if (session('edit-success'))
                                        <h5 class="user-message mb-2 text-success">{{ session('edit-success') }}</h5>
                                    @endif
                                    <h4 class="header-title user-edit-title">Edit user</h4>
                                    <input type="hidden" id="user-id">
                                    <div class="form-group">
                                        <label for="user-name" class="col-form-label">Name</label>
                                        <input class="form-control" name="name" type="text" value="{{ $user->name }}" id="user-name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="user-description" class="col-form-label">Email</label>
                                        <input class="form-control" name="email" type="text" value="{{ $user->email }}" id="user-description" required >
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
            $('.user-message').delay(5000).fadeOut();
        })
    </script>
@endsection
