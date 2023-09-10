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
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <form id="product-form" name="product-form" action="{{ route('admin-post-store') }}" enctype="multipart/form-data" method="POST">
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
                                    <div class="row form-group justify-content-between">
                                        <div>
                                    <h4 class="header-title product-add-title">Thêm bài viết</h4>
                                        </div>
                                        <div>
                                            <a class="btn btn-primary" href="{{route('admin-post')}}">
                                                <i class="ti-list"></i><span>Danh sách</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Tên(*)</label>
                                            <input type="text" class="form-control" name="name" placeholder="Nhập tên bài viết" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="services" class="col-form-label">Trạng thái</label>
                                            <select class="form-control" name="status">
                                                <option value="1" selected>Hoạt động</option>
                                                <option value="2">Nổi bật</option>
                                                <option value="0">Không hoạt động</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="services" class="col-form-label">Hinh anh</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Danh mục</label>
                                            <select id="category-link" class="category-link form-control" name="categories[]" multiple>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Tag</label>
                                            <select id="tag-link" class="tag-link form-control" name="tags[]" multiple>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="product-content" class="col-form-label">Nội dung</label>
                                            <textarea class="form-control" name="content" type="text" id="content">
                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Title</label>
                                            <input type="text" class="form-control" name="title" placeholder="Nhập title" >
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Keywords</label>
                                            <textarea rows="3" cols="200" type="text" class="form-control" name="keywords" placeholder="Nhập keywords" ></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Description</label>
                                            <textarea rows="3" cols="200" type="text" class="form-control" name="description" placeholder="Nhập description"  ></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Thêm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>--}}
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>--}}
{{--    <script type="text/javascript" src="{{ asset('plugins/ckeditor5-build-classic/ckeditor.js') }}"></script>--}}
{{--    <script type="text/javascript" src="{{ asset('plugins/ckfinder/ckfinder.js') }}"></script>--}}
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
            integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />
    <script type="text/javascript" src="{{ asset('richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src='{{ asset('richtexteditor/plugins/all_plugins.js') }}'></script>
    <script type="text/javascript">
        var editor = new RichTextEditor("#content");
        {{--ClassicEditor--}}
        {{--    .create( document.querySelector( '#content' ), {--}}
        {{--        ckfinder: {--}}
        {{--            uploadUrl: "{{route('admin-post-ckeditor-upload', ['_token' => csrf_token() ])}}"--}}
        {{--        },--}}
        {{--    } )--}}
        {{--    .then( editor => {--}}
        {{--        editor.ui.view.editable.element.style.height = '500px';--}}
        {{--    } )--}}
        {{--    .catch( error => {--}}
        {{--        console.error( error );--}}
        {{--    } );--}}
        // ClassicEditor.create(document.querySelector('#content'), {
        //     ckfinder: {
        //         // Upload the images to the server using the CKFinder QuickUpload command.
        //         uploadUrl: 'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
        //
        //         // Define the CKFinder configuration (if necessary).
        //         options: {
        //             resourceType: 'Images'
        //         }
        //     },
        //     toolbar: {
        //         items: [
        //             'undo',
        //             'redo',
        //             '|',
        //             'heading',
        //             '|',
        //             'bold',
        //             'italic',
        //             'underline',
        //             'strikethrough',
        //             'subscript',
        //             'superscript',
        //             'alignment',
        //             '|',
        //             'fontFamily',
        //             'fontSize',
        //             'fontColor',
        //             'fontBackgroundColor',
        //             'highlight',
        //             '|',
        //             'bulletedList',
        //             'numberedList',
        //             '|',
        //             'outdent',
        //             'indent',
        //             '|',
        //             'link',
        //             'imageInsert',
        //             'imageUpload',
        //             'blockQuote',
        //             'insertTable',
        //             'mediaEmbed',
        //             'code',
        //             'specialCharacters',
        //             '|',
        //             'CKFinder'
        //         ],
        //         shouldNotGroupWhenFull: true,
        //     },
        //     language: 'en',
        //     image: {
        //         toolbar: [
        //             'imageTextAlternative',
        //             'imageStyle:full',
        //             'imageStyle:side',
        //             'linkImage'
        //         ]
        //     },
        //     table: {
        //         contentToolbar: [
        //             'tableColumn',
        //             'tableRow',
        //             'mergeTableCells',
        //             'tableCellProperties',
        //             'tableProperties'
        //         ]
        //     },
        //     licenseKey: '',
        //
        //
        // })
        // .then(editor => {
        //     window.editor = editor;
        //
        //     CKFinder.setupCKEditor(editor);
        //     console.log( Array.from( editor.ui.componentFactory.names() ) );
        // })
        // .catch(error => {
        //
        //     console.error(error);
        // });
        $(document).ready(function() {
            $('.action-message').delay(5000).fadeOut();
            $("input[name='name']").keypress(function(evt) {
                var name = $("input[name='name']").val();
                $("input[name='title']").val(name);
            });
            $('#category-link').select2({
                multiple: true,
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


