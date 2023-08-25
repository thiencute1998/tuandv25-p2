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
    <div class="page-title-area collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="row align-items-center" style="padding: 1.6rem 0;">
            <div class="col-md-12 col-sm-10">
                <div class="search-box pull-left w-100">
                    <form action="{{ route('admin-category') }}" method="GET" >
                        <div class="row form-group justify-content-between">
                            <div class="col-md-4">
                                <span> Tên: </span>
                                <input type="text" name="search" placeholder="Search..." value="{{ request()->input('search') }}">
                            </div>
                            <div class="col-md-4">
                                <span> Cấp danh mục: </span>
                                <select class="form-control" name="level">
                                    <option value="">Chọn cấp</option>
                                    <option value="1">Cấp 1</option>
                                    <option value="2">Cấp 2</option>
                                    <option value="3">Cấp 3</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <span> Trạng thái: </span>
                                <select class="form-control" name="status">
                                    <option value="">Chọn trạng thái</option>
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Không hoạt động</option>
                                </select>
                            </div>
                            {{--                            <div class="col-md-4">--}}
                            {{--                            <span> Tags: </span>--}}
                            {{--                            <select id="tag-link" class="tag-link form-control" name="tag_id" multiple>--}}
                            {{--                            </select>--}}
                            {{--                           </div>--}}
                            <div class="col-md-1">
                                <span> &acute;<i class="ti-search"></i></span>
                                <button type="submit" class="btn btn-primary button-search">Tìm kiếm</button>
                            </div>
                        </div>
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
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row form-group justify-content-between">
                            <div >
                                @if (session('delete-success'))
                                    <h5 class="work-message mb-2 text-success">{{ session('delete-success') }}</h5>
                                @endif
                                <h4 class="header-title">Danh sách danh mục</h4>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="{{route('admin-category-create')}}">
                                    <i class="ti-plus"></i><span>Thêm danh mục</span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Tên danh mục</th>
                                        <th scope="col">Danh mục cha</th>
                                        <th scope="col">Cấp</th>
                                        <th scope="col">Thứ tự</th>
                                        <th>Trạng thái</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td class="text-left">
                                                {{$category->name}}
                                            </td>
                                            <td class="text-left">
                                                {{$category->parent_name}}
                                            </td>
                                            <td>
                                                {{$category->level}}
                                            </td>
                                            <td>
                                                {{$category->order}}
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if($category->status)
                                                    <span class="text-success">Hoạt động</span>
                                                @else
                                                    <span class="text-danger">Không hoạt động</span>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="{{ route('admin-category-edit', ['id'=> $category->id]) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="product-remove" href="{{ route('admin-category-delete', ['id'=> $category->id]) }}"
                                                   onclick="return confirm('Bạn có muốn xóa danh mục?' )"
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
                            {{ $categories->onEachSide(1)->links() }}
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
