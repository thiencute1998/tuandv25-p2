@extends('admin.layouts.master')
@section('admin-css')
    <style type="text/css">
        .product-remove{
            cursor: pointer;
            color: darkred;
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
                                <h5 class="product-message mb-2 text-success">{{ session('delete-success') }}</h5>
                            @endif
                            <h4 class="header-title">List Video Slideshow</h4>
                        </div>
                        <div>
                            <a class="btn btn-primary" href="{{ route('video-slideshow-create') }}">
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
                                    <th>Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td style="vertical-align: middle">{{$product->name}}</th>
                                        <td style="vertical-align: middle;">
                                            @if($product->status)
                                                <span class="text-success">Active</span>
                                            @else
                                                <span class="text-danger">Nonactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('video-slideshow-edit', ['id'=> $product->id]) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="product-remove" href="{{ route('video-slideshow-delete', ['id'=> $product->id]) }}"
                                               onclick="return confirm('Are you sure to delete product : {{ $product->name }} ?' )"
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
                        {{ $products->onEachSide(1)->links() }}
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
        $('.product-message').delay(5000).fadeOut();
    })
</script>
@endsection
