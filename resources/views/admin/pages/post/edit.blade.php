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
                                <form id="product-form" name="product-form" action="{{ route('admin-post-update', ['id'=> $post->id]) }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @if (session('add-success'))
                                        <h5 class="action-message mb-2 text-success">{{ session('add-success') }}</h5>
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
                                    <h4 class="header-title product-add-title">Sua bài viết</h4>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Tên(*)</label>
                                            <input type="text" class="form-control" name="name" placeholder="Nhập tên bài viết" required value="{{$post->name}}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="services" class="col-form-label">Trạng thái</label>
                                            <select class="form-control item-status" name="status" data-value="{{ $post->status }}">
                                                <option value="1" selected>Hoạt động</option>
                                                <option value="0">Không hoạt động</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="services" class="col-form-label">Hình ảnh</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Danh mục</label>
                                            <select id="category-link" class="category-link form-control" name="category_id" multiple>
                                                @if($post->category_id)
                                                    <option value="{{$post->category_id}}">{{$post->category->name}}</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Tag</label>
                                            <select id="tag-link" class="tag-link form-control" name="tags[]" multiple>
                                                @if($post->tags)
                                                    @foreach($post->tags as $tag)
                                                        <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="product-content" class="col-form-label">Content</label>
                                            <textarea class="form-control" name="content" type="text" id="content">
                                                {{$post->content}}
                                            </textarea>
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
    {{--    <script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>--}}
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
            integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script type="text/javascript">
        ClassicEditor
            .create( document.querySelector( '#content' ), {
                ckfinder: {
                    uploadUrl: "{{route('admin-post-ckeditor-upload', ['_token' => csrf_token() ])}}"
                }
            } )
            .then( editor => {
                editor.ui.view.editable.element.style.height = '500px';
            } )
            .catch( error => {
                console.error( error );
            } );

        $(document).ready(function() {
            $('.action-message').delay(5000).fadeOut();

            let status = $('.item-status').data('value');
            $('.item-status').val(status);

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
        });
    </script>
@endsection


