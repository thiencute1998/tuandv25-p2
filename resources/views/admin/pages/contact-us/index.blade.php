@extends('admin.layouts.master')
@section('admin-css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style type="text/css">
        .service-remove{
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
    <div class="card-header filter-with" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <div class="mb-0 ml-1">
            Filter with
        </div>
    </div>
    <!-- page title area start -->
    <div class="page-title-area collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="row align-items-center" style="padding: 1.6rem 0;">
            <div class="col-12">
                <div class="search-box pull-left">
                    <form action="{{ route('admin-contact-us') }}" method="GET" >
                        <input class="mr-2 mb-2" type="text" name="name" placeholder="name..." value="{{ request()->input('name') }}">
                        <input type="text" name="email" placeholder="email..." value="{{ request()->input('email') }}">
                        <i class="ti-search"></i>
                        <button type="submit" class="btn btn-primary button-search">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-6 clearfix">

            </div>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <!-- basic table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin-contact-us-delete-files')}}" method="POST" onsubmit="return confirm('Are you sure to delete contacts ?' )">
                            @csrf
                            <div class="row form-group justify-content-between">
                                <div >
                                    @if (session('delete-success'))
                                        <h5 class="contact-us-message mb-2 text-success">{{ session('delete-success') }}</h5>
                                    @endif
                                    <h4 class="header-title">List Contact Us</h4>
                                </div>
                            </div>
                            <div class="row form-group">
                                <button class="btn btn-danger delete-all-contact">Delete</button>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th><input type="checkbox" class="check-all-contact"></th>
                                            <th class="text-left" scope="col" style="width: 200px;">Name</th>
                                            <th class="text-left" scope="col" style="width: 300px;">Email</th>
                                            <th class="text-left" scope="col" style="width: 300px;">Message</th>
                                            <th class="text-left" scope="col" >Link</th>
                                            <th scope="col" >File size</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contacts as $contact)
                                            @if($contact->is_submit)
                                            <tr>
                                                <td><input type="checkbox" name="contact-check[]" class="check-contact" value="{{$contact->id}}"></td>
                                                <td style="vertical-align: middle" class="text-left">{{$contact->name}}</td>
                                                <td style="vertical-align: middle" class="text-left">{{$contact->email}}</td>
                                                <td style="vertical-align: middle" class="text-left">{!! $contact->message !!}</td>
                                                <td style="vertical-align: middle" class="text-left"><a href="{{$contact->link}}" target="_blank">{{$contact->link}}</a></td>
                                                <td style="vertical-align: middle" >{{$contact->file_size}}MB</td>
                                                <td style="vertical-align: middle">{{$contact->created_at}}</td>
                                                <td style="vertical-align: middle">
                                                    @if ($contact->file)
                                                    <a title="Download file" href="{{asset('upload/viewer/contact_us/' . $contact->file_name)}}" download="{{$contact->file}}" class="mr-2">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                    @endif
                                                    <a style="color: darkred;" href="{{route('admin-contact-us-delete-file', ['id'=> $contact->id])}}"
                                                       onclick="return confirm('Are you sure to delete this file : {{ $contact->file }} ?' )"
                                                       title="Delete file">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row" style="justify-content: flex-end;">
                                {{ $contacts->onEachSide(1)->links() }}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- basic table end -->
        </div>
    </div>
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.contact-us-message').delay(5000).fadeOut();

            $('.check-all-contact').on('click', function() {
                $('.check-contact').prop('checked', $(this).is(":checked"));
            });

        })
    </script>
@endsection
