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
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row form-group justify-content-between">
                            <div >
                                @if (session('delete-success'))
                                    <h5 class="work-message mb-2 text-success">{{ session('delete-success') }}</h5>
                                @endif
                                <h4 class="header-title">Danh sách Video</h4>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="{{route('admin-video-create')}}">
                                    <i class="ti-plus"></i><span>Thêm Video</span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Tên Video</th>
{{--                                        <th scope="col">Hình ảnh</th>--}}
                                        <th scope="col">Link</th>
                                        <th>Số lượt xem</th>
                                        <th>Trạng thái</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($videos as $video)
                                        <tr>
                                            <td class="text-left">
                                                {{$video->name}}
                                            </td>
{{--                                            <td class="text-left">--}}
{{--                                                <div class="td-img">--}}
{{--                                                    @if($video->image)--}}
{{--                                                    <img class="work-img" width="" height="100"--}}
{{--                                                         src="{{asset('upload/admin/video/image/' . $video->image)}}" alt="">--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
                                            <td>
                                                {{$video->link}}
                                            </td>
                                            <td>
                                                {{$video->view_count}}
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if($video->status==1)
                                                    <span class="text-success">Hoạt động</span>
                                                @elseif($post->status==2)
                                                    <span class="text-success" style="color: #28a745">Nổi bật</span>
                                                @else
                                                    <span class="text-danger">Không hoạt động</span>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="{{ route('admin-video-edit', ['id'=> $video->id]) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="product-remove" href="{{ route('admin-video-delete', ['id'=> $video->id]) }}"
                                                   onclick="return confirm('Bạn có muốn xóa Video?' )"
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
                            {{ $videos->onEachSide(1)->links() }}
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
