@extends('admin.layouts.master')
@section('admin-css')
    <style type="text/css">
        .product-remove{
            cursor: pointer;
            color: darkred;
        }
        .td-img{
            display: block;
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
                                    <h5 class="work-message mb-2 text-success">{{ session('delete-success') }}</h5>
                                @endif
                                <h4 class="header-title">Danh sách liên kết</h4>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="{{route('admin-link-create')}}">
                                    <i class="ti-plus"></i><span>Thêm liên kết</span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Liên kết</th>
                                        <th>Trạng thái</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($links as $link)
                                        <tr>
                                            <td style="vertical-align: middle;">
                                                <a href="{{$link->link}}" target="_blank">{{$link->name}}</a>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if($link->status)
                                                    <span class="text-success">Hoạt động</span>
                                                @else
                                                    <span class="text-danger">Không hoạt động</span>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="{{ route('admin-link-edit', ['id'=> $link->id]) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="product-remove" href="{{ route('admin-link-delete', ['id'=> $link->id]) }}"
                                                   onclick="return confirm('Bạn có muốn xóa liên kết ?' )"
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
                            {{ $links->onEachSide(1)->links() }}
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
            $('.work-message').delay(5000).fadeOut();
        })
    </script>
@endsection
