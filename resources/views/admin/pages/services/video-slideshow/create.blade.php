@extends('admin.layouts.master')
@section('admin-css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .files-upload {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        .product-videos {
            position: relative;
            margin-left: 15px;
            margin-right: 15px;
        }
        .product-video {
            width: 200px;
        }
    </style>

@endsection
@section('main-content-inner')
    <div class="card-header filter-with" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <div class="mb-0 ml-1">
            <a href="{{route('video-slideshow')}}">List Video SlideShow</a>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="row">
                    <!-- Textual inputs start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <form id="product-form" name="product-form" action="{{ route('video-slideshow-store') }}" method="POST" enctype="multipart/form-data" class="border-0">
                                    @csrf
                                    @if (session('add-success'))
                                        <h5 class="product-message mb-2 text-success">{{ session('add-success') }}</h5>
                                    @endif
                                    <h4 class="header-title product-add-title">Add Video Slideshow</h4>
                                    <input type="hidden" id="product-id">
                                    <div class="form-group">
                                        <label for="product-name" class="col-form-label">Name</label>
                                        <input class="form-control" name="name" type="text" value="{{ old('name') }}" id="product-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="services" class="col-form-label">Status</label>
                                        <select class="custom-select" name="status">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Nonactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="product-name" class="col-form-label">Tag (SEO)</label>
                                        <input class="form-control" name="tag" type="text" value="{{ old('tag') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="product-name" class="col-form-label">Key word (SEO)</label>
                                        <input class="form-control" name="keyword" type="text" value="{{ old('keyword') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="product-name" class="col-form-label">Description (SEO)</label>
                                        <input class="form-control" name="description_seo" type="text" value="{{ old('description_seo') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="product-description" class="col-form-label">Content</label>
                                        <textarea class="form-control" name="description" type="text" id="description">
                                        </textarea>
                                    </div>
                                    <div class="videos-collection">
                                        <label for="" class="col-form-label">Link videos & image</label>
                                        <div class="row">
                                            <div class="form-group product-videos d-flex">
                                                <div>
                                                    <input class="product-video form-control mb-2" name="videos[]" type="text" placeholder="Link video" required>
                                                    <div class="mb-3 mr-2 image-item" style="position: relative">
                                                        <input type="file" class="files-upload" name="files[]" required>
                                                        <img width="200px" height="150px" class="product-img">
                                                    </div>
                                                </div>
                                                <div style="margin: auto;">
                                                    <button type="button" class="btn remove-video" title="Remove link & image">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="button" class="btn add-videos" title="Add video & image">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{route('video-slideshow-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 600
        });

        $(document).ready(function(){
            $('.product-message').delay(5000).fadeOut();

            $(document).on('click', '.add-videos', function() {
                $('.product-videos').last().after(
                    '<div class="form-group product-videos d-flex">' +
                    '<div>' +
                    '<input class="product-video form-control mb-2" name="videos[]" type="text" placeholder="Link video" required>' +
                    '<div class="mb-3 mr-2 image-item" style="position: relative">' +
                    '<input type="file" class="files-upload" name="files[]" required>' +
                    '<img width="200px" height="150px" class="product-img">' +
                    '</div>' +
                    '</div>' +
                    '<div style="margin: auto;">' +
                    '<button type="button" class="btn remove-video" title="Remove link & image">' +
                    '<i class="fa fa-trash"></i>' +
                    '</button>' +
                    '</div>' +
                    '</div>'
                )
            })

            $(document).on('change', '.files-upload', function() {
                let vm = this;
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        $(vm).next().attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            $(document).on('click', '.remove-video', function() {
                $(this).closest('.product-videos').remove()
            })
        })
    </script>
@endsection
