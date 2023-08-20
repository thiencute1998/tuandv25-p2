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
        .product-images {
            margin-left: 15px;
            margin-right: 15px;
        }
        .product-img{
            height: 150px;
        }
    </style>

@endsection
@section('main-content-inner')
    <div class="card-header filter-with" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <div class="mb-0 ml-1">
            <a href="{{route('photo-editing')}}">List Photo Editing</a>
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
                                <form id="product-form" name="product-form" action="{{ route('photo-editing-update', ['id'=> $product->id]) }}" method="POST" enctype="multipart/form-data" class="dropzone border-0">
                                    @csrf
                                    @if (session('edit-success'))
                                        <h5 class="product-message mb-2 text-success">{{ session('edit-success') }}</h5>
                                    @endif
                                    <h4 class="header-title product-add-title">Edit photo editing</h4>
                                    <input type="hidden" id="product-id">
                                    <div class="form-group">
                                        <label for="product-name" class="col-form-label">Name</label>
                                        <input class="form-control" name="name" type="text" value="{{ $product->name }}" id="product-name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="services" class="col-form-label">Status</label>
                                        <select class="custom-select product-status" name="status" data-value="{{ $product->status }}">
                                            <option value="1" >Active</option>
                                            <option value="0">Nonactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="product-name" class="col-form-label">Tag (SEO)</label>
                                        <input class="form-control" name="tag" type="text" value="{{ $product->tag }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="product-name" class="col-form-label">Key word (SEO)</label>
                                        <input class="form-control" name="keyword" type="text" value="{{ $product->keyword }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="product-name" class="col-form-label">Description (SEO)</label>
                                        <input class="form-control" name="description_seo" type="text" value="{{ $product->description_seo }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="product-description" class="col-form-label">Content</label>
                                        <textarea class="form-control" name="description" type="text" id="description" required >
                                            {{ $product->description }}
                                        </textarea>
                                    </div>
                                    <div class="images-collection">
                                        <input type="hidden" class="product-total-images" name="total_image" value="{{  $product->productImages ? $product->productImages->count() : 1 }}">
                                        <label for="" class="col-form-label">Images</label>
                                        <div class="form-group row">
                                            @if($product->productImages->count())
                                                @foreach($product->productImages as $key=> $image)
                                                <div class="form-group product-images mr-3">
                                                    <div class="d-flex">
                                                        <div class="mb-3 mr-2 image-item" style="position: relative">
                                                            <input type="hidden" class="image-hidden" name="file_start_hidden{{$key + 1}}" value="{{ $image->file_1 }}">
                                                            <input type="hidden" class="image-hidden" name="file_start_name_hidden{{$key + 1}}" value="{{ $image->file_name_1 }}">
                                                            <input type="file" title="before" class="files-upload" name="file_start{{$key + 1}}">
                                                            <img width="150px" height="150px" class="product-img" src="{{ asset('upload/admin/services/photo_editing/'. $image->file_name_1) }}">
                                                        </div>
                                                        <div class="mb-3 mr-2 image-item" style="position: relative">
                                                            <input type="hidden" class="image-hidden" name="file_end_hidden{{$key + 1}}" value="{{ $image->file_2 }}">
                                                            <input type="hidden" class="image-hidden" name="file_end_name_hidden{{$key + 1}}" value="{{ $image->file_name_2 }}">
                                                            <input type="file" title="after" class="files-upload" name="file_end{{$key + 1}}">
                                                            <img width="150px" height="150px" class="product-img" src="{{ asset('upload/admin/services/photo_editing/'. $image->file_name_2) }}">
                                                        </div>
                                                        <div class="zoomimages" style="align-self: center;">
                                                            <div class="dlmedium">
                                                                <button type="button" class="btn remove-images" title="Remove partner images">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @else
                                                <div class="form-group product-images mr-3">
                                                    <div class="d-flex">
                                                        <div class="mb-3 mr-2 image-item" style="position: relative">
                                                            <input type="file" title="before" class="files-upload" name="file_start1">
                                                            <img width="150px" height="150px" class="product-img">
                                                        </div>
                                                        <div class="mb-3 mr-2 image-item" style="position: relative">
                                                            <input type="file" title="after" class="files-upload" name="file_end1">
                                                            <img width="150px" height="150px" class="product-img">
                                                        </div>
                                                        <div class="zoomimages" style="align-self: center;">
                                                            <div class="dlmedium">
                                                                <button type="button" class="btn remove-images" title="Remove partner images">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="button" class="btn add-images" title="Add partner images">
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
            filebrowserUploadUrl: "{{route('photo-editing-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 600
        });

        $(document).ready(function(){
            $('.product-message').delay(5000).fadeOut();

            let status = $('.product-status').data('value');
            $('.product-status').val(status);

            $('#product-form').on('click', '.add-images', function() {
                let totalImage = $('.product-total-images').val();
                totalImage = Number(totalImage) + 1;
                if (!totalImage) {
                    totalImage = 1;
                }
                $('.product-total-images').val(totalImage);
                $('.product-images').last().after(
                    '<div class="form-group product-images mr-3">' +
                    '<div class="d-flex">'+
                    '<div class="mb-3 mr-2 image-item" style="position: relative">' +
                    '<input type="file" title="before" class="files-upload" name="file_start' + totalImage + '">' +
                    '<img width="150px" height="150px" class="product-img">' +
                    '</div>'+
                    '<div class="mb-3 mr-2 image-item" style="position: relative">'+
                    '<input type="file" title="after" class="files-upload" name="file_end' + totalImage + '">'+
                    '<img width="150px" height="150px" class="product-img">'+
                    '</div>'+
                    '<div class="zoomimages" style="align-self: center;">'+
                    '<div class="dlmedium">'+
                    '<button type="button" class="btn remove-images" title="Remove partner images">'+
                    '<i class="fa fa-trash"></i>'+
                    '</button>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'
                );
            });

            $(document).on('change', '.files-upload', function() {
                let vm = this;
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        $(vm).next().attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }

                // remove hidden input
                $(this).closest('.image-item').find('.image-hidden').remove();

            });

            $(document).on('click', '.remove-images', function(){
                if ($('.product-images')[1]) {
                    $(this).closest('.product-images').remove();
                }
            })
        })
    </script>
@endsection
