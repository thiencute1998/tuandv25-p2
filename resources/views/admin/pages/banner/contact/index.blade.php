@extends('admin.layouts.master')
@section('admin-css')
    <style type="text/css">
        .product-remove{
            cursor: pointer;
            color: darkred;
        }
        .td-img{
            max-width: 125px;
            max-height: 200px;
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
                                    <h5 class="contact-message mb-2 text-success">{{ session('delete-success') }}</h5>
                                @endif
                                <h4 class="header-title">List Contact Banner</h4>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="{{route('contacts-create')}}">
                                    <i class="ti-plus"></i><span>Add</span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Link</th>
                                        <th scope="col">Contact image</th>
                                        <th>Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td style="vertical-align: middle">{{$contact->link}}</td>
                                            <td >
                                                <div class="td-img">
                                                    <img class="contact-img" width="325" height="158"
                                                         src=" {{asset('upload/admin/banner/contact/' . $contact->file_name)}}" alt="">
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if($contact->status)
                                                    <span class="text-success">Active</span>
                                                @else
                                                    <span class="text-danger">Nonactive</span>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="{{ route('contacts-edit', ['id'=> $contact->id]) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="product-remove" href="{{ route('contacts-delete', ['id'=> $contact->id]) }}"
                                                   onclick="return confirm('Are you sure to delete?' )"
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
                            {{ $contacts->onEachSide(1)->links() }}
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
            $('.contact-message').delay(5000).fadeOut();
        })
    </script>
@endsection
