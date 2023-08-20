@extends('admin.layouts.master')
@section('admin-css')
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
        <div class="col-md-6 col-sm-8">
            <div class="search-box pull-left">
                <form action="{{ route('service-introduce') }}" method="GET" >
                    <input type="text" name="search" placeholder="name..." value="{{ request()->input('search') }}">
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
                    <div class="row form-group justify-content-between">
                        <div >
                            @if (session('delete-success'))
                                <h5 class="service-message mb-2 text-success">{{ session('delete-success') }}</h5>
                            @endif
                            <h4 class="header-title">List Introduce</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="text-uppercase">
                                <tr>
                                    <th scope="col" style="width: 200px;">Name</th>
                                    <th scope="col" style="width: 300px;">Content</th>
                                    <th scope="col">Image</th>
                                    <th scope="col" style="width: 100px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td style="vertical-align: middle">{{$service->name}}</td>
                                        <td class="text-left">{{$service->content}}</td>
                                        <td>
                                            <div class="td-img">
                                                <img class="service-img" width="100px" height="80px"
                                                     src="{{asset('upload/admin/services/introduce/' . $service->file_name)}}" alt="">
                                            </div>
                                        </td>
                                        <td style="vertical-align: middle">
                                            <a href="{{ route('service-introduce-edit', ['id'=> $service->id]) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row" style="justify-content: flex-end;">
                        {{ $services->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- basic table end -->
    </div>
</div>
@endsection
