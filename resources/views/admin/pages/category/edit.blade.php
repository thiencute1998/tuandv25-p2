@extends('admin.layouts.master')

@section('admin-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
          integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('main-content-inner')
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="row">
                    <!-- Textual inputs start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <form id="product-form" name="product-form" action="{{ route('admin-category-update', ['id'=> $category->id]) }}" method="POST">
                                    @csrf
                                    @if (session('edit-success'))
                                        <h5 class="action-message mb-2 text-success">{{ session('edit-success') }}</h5>
                                    @endif
                                    <input type="hidden" id="category_id" value="{{$category->id}}">
                                    <h4 class="header-title product-add-title">Sửa danh mục</h4>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Tên (*)</label>
                                            <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục" value="{{$category->name}}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Danh mục cha</label>
                                            <select id="category-parent" class="category-parent form-control" name="parent_id" multiple data-value="{{ $category->parent_id }}">
                                                @if($category->parent_id)
                                                    <option value="{{$parent->id}}">{{$parent->name}}</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Link</label>
                                            <input type="text" class="form-control" name="link" placeholder="Nhập link hoặc tag bài viết" value="{{$category->link}}" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Trạng thái</label>
                                            <select class="form-control category-status" name="status" data-value="{{ $category->status }}">
                                                <option value="1">Hoạt động</option>
                                                <option value="0">Không hoạt động</option>
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

            let status = $('.category-status').data('value');
            $('.category-status').val(status);

            let parent = $('#category-parent').data('value')

            $("#category-parent").select2().val(parent).trigger("change");

            $('#category-parent').select2({
                multiple: false,
                allowClear: true,
                placeholder: "Chọn danh mục cha",
                ajax: {
                    url: "{{route('admin-category-get-parent')}}",
                    type: 'post',
                    delay: 250,
                    dataType: 'json',
                    data: function(params) {
                        return {
                            self_id: $('#category_id').val(),
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


