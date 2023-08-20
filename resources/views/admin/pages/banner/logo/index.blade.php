@extends('admin.layouts.master')
@section('admin-css')
    <style type="text/css">
        .product-remove{
            cursor: pointer;
            color: darkred;
        }
        .td-img{
            max-width: 325px;
            max-height: 158px;
            overflow: hidden;
            margin: auto;
        }
    </style>
@endsection
@section('main-content-inner')
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <!-- basic table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row form-group justify-content-between">
                            <div >
                                @if (session('delete-success'))
                                    <h5 class="logo-message mb-2 text-success">{{ session('delete-success') }}</h5>
                                @endif
                                <h4 class="header-title">List Photo Editing</h4>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="{{route('logos-create')}}">
                                    <i class="ti-plus"></i><span>Add</span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Logo</th>
                                        <th>Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($logos as $logo)
                                        <tr>
                                            <td style="vertical-align: middle;">{{$logo->name}}</td>
                                            <td>
                                                <div class="td-img">
                                                    <img class="logo-img" width="325" height="158"
                                                         src=" {{asset('upload/admin/banner/logo/' . $logo->file_name)}}" alt="">
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if($logo->status)
                                                    <span class="text-success">Active</span>
                                                @else
                                                    <span class="text-danger">Nonactive</span>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="{{ route('logos-edit', ['id'=> $logo->id]) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="product-remove" href="{{ route('logos-delete', ['id'=> $logo->id]) }}"
                                                   onclick="return confirm('Are you sure to delete logo {{ $logo->name }}?' )"
                                                >
                                                    <i class="ti-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row" style="justify-content: flex-end;">
                            {{ $logos->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- basic table end -->
        </div>
    </div>
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.logo-message').delay(5000).fadeOut();
        })
    </script>
@endsection
