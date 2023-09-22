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
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row form-group justify-content-between">
                            <div >
                                @if (session('delete-success'))
                                    <h5 class="work-message mb-2 text-success">{{ session('delete-success') }}</h5>
                                @endif
                                <h4 class="header-title">Danh sách nhà thờ</h4>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="{{route('admin-church-create')}}">
                                    <i class="ti-plus"></i><span>Thêm nhà thờ</span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Tỉnh</th>
                                        <th scope="col">Huyện</th>
                                        <th scope="col">Xã</th>
                                        <th scope="col">Thôn</th>
                                        <th scope="col">Giáo xứ</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($churchs as $church)
                                        <tr>
                                            <td class="text-left" style="vertical-align: middle;">
                                                {{$church->province}}
                                            </td>
                                            <td class="text-left" style="vertical-align: middle;">
                                                {{$church->district}}
                                            </td>
                                            <td class="text-left" style="vertical-align: middle;">
                                                {{$church->commune}}
                                            </td>
                                            <td class="text-left" style="vertical-align: middle;">
                                                {{$church->village}}
                                            </td>
                                            <td class="text-left" style="vertical-align: middle;">
                                                {{$church->parish}}
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if($church->status)
                                                    <span class="text-success">Hoạt động</span>
                                                @else
                                                    <span class="text-danger">Không hoạt động</span>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="{{ route('admin-church-edit', ['id'=> $church->id]) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="product-remove" href="{{ route('admin-church-delete', ['id'=> $church->id]) }}"
                                                   onclick="return confirm('Bạn có muốn xóa tin ?' )"
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
                            {{ $churchs->onEachSide(1)->links() }}
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
