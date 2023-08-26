@extends('admin.layouts.master')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
          integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@section('main-content-inner')
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="row">
                    <!-- Textual inputs start -->
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <form id="product-form" name="product-form" action="{{ route('admin-tabhome-update', ['id'=> $tabhome->id]) }}" method="POST">
                                    @csrf
                                    @if (session('edit-success'))
                                        <h5 class="action-message mb-2 text-success">{{ session('edit-success') }}</h5>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <input type="hidden" id="tag_id" value="{{$tabhome->id}}">
                                    <div class="row form-group justify-content-between">
                                        <div>
                                            <h4 class="header-title product-add-title">Sửa danh mục</h4>
                                        </div>
                                        <div>
                                            <a class="btn btn-primary" href="{{route('admin-tabhome')}}">
                                                <i class="ti-plus"></i><span>Danh sách</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Tên (*)</label>
                                            <input type="text" class="form-control" name="name" placeholder="Nhập tên menu" value="{{$tabhome->name}}" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="services" class="col-form-label">Thứ tự</label>
                                            <input type="text" class="form-control" name="order" placeholder="Nhập thứ tự" value="{{$tabhome->order}}" >
                                        </div>
                                        <div class="col-md-3">
                                            <label for="services" class="col-form-label">Trạng thái</label>
                                            <select class="form-control tag-status" name="status" data-value="{{ $tabhome->status }}">
                                                <option value="1">Hoạt động</option>
                                                <option value="0">Không hoạt động</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Tên danh mục</label>
                                            <select id="category-link" class="category-link form-control" name="tabhome[]" multiple>
                                                @if($tabhome->categories)
                                                    @foreach($tabhome->categories as $tag)
                                                        <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Sửa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
            integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.action-message').delay(5000).fadeOut();

            let status = $('.tag-status').data('value');
            $('.tag-status').val(status);

            $('#category-link').select2({
                multiple: true,
                allowClear: true,
                placeholder: "Chọn danh mục",
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
        });
    </script>
@endsection


