@extends('admin.layouts.master')
@section('admin-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
          integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
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
{{--    <div class="card-header filter-with" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
{{--        <div class="mb-0 ml-1">--}}
{{--            Filter with--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- page title area start -->
    <div class="page-title-area collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="row align-items-center" style="padding: 1.6rem 0;">
            <div class="col-md-12 col-sm-10">
                <div class="search-box pull-left w-100">
                    <form action="{{ route('admin-post') }}" method="GET" >
                        <div class="row form-group justify-content-between">
                            <div class="col-md-4">
                            <span> Tên: </span>
                            <input type="text" name="search" placeholder="Search..." value="{{ request()->input('search') }}">
                            </div>
                            <div class="col-md-4">
                            <span> Danh mục: </span>
                            <select id="category-link" class="category-link form-control" name="category_id" multiple>
                            </select>
                            </div>
                            <div class="col-md-3">
                                <span> Trạng thái: </span>
                                <select class="form-control" name="status">
                                    <option value="">Chọn trạng thái</option>
                                    <option value="1">Hoạt động</option>
                                    <option value="2">Nổi bật</option>
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
                                <h4 class="header-title">Danh sách bài viết</h4>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="{{route('admin-post-create')}}">
                                    <i class="ti-plus"></i><span>Thêm bài viết</span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Tên bài viết</th>
                                        <th scope="col">Danh mục</th>
                                        <th scope="col">Tag</th>
                                        <th>Trạng thái</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td class="text-left">
                                                {{$post->name}}
                                            </td>
                                            <td class="text-left">
                                                {{$post->category ? $post->category->name : ""}}
                                            </td>
                                            <td class="text-left">
                                                @if($post->tags)
                                                    @foreach($post->tags as $tag)
                                                        <div>
                                                            {{$tag->name}}
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if($post->status==1)
                                                    <span class="text-success">Hoạt động</span>
                                                @elseif($post->status==2)
                                                    <span class="text-success">Nổi bật</span>
                                                @else
                                                    <span class="text-danger" style="color: #28a745">Không hoạt động</span>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="{{ route('admin-post-edit', ['id'=> $post->id]) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="product-remove" href="{{ route('admin-post-delete', ['id'=> $post->id]) }}"
                                                   onclick="return confirm('Bạn có muốn xóa bài viết?' )"
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
                            {{ $posts->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- basic table end -->
        </div>
    </div>
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.work-message').delay(5000).fadeOut();
            $('#category-link').select2({
                multiple: false,
                allowClear: true,
                placeholder: "Chọn danh muc",
                ajax: {
                    url: "{{route('admin-category-get-parent')}}",
                    type: 'post',
                    delay: 250,
                    dataType: 'json',
                    data: function(params) {
                        return {
                            name: params.term,
                            "_token":"{{csrf_token()}}"
                        }
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                }
                            })
                        }
                    }
                }
            });

            $('#tag-link').select2({
                multiple: true,
                allowClear: true,
                placeholder: "Chọn tag",
                ajax: {
                    url: "{{route('admin-tag-get-all')}}",
                    type: 'post',
                    delay: 250,
                    dataType: 'json',
                    data: function(params) {
                        return {
                            name: params.term,
                            "_token":"{{csrf_token()}}"
                        }
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                }
                            })
                        }
                    }
                }
            });
        })
    </script>
@endsection
