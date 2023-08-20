@extends('admin.layouts.master')
@section('admin-css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.3/dropzone.min.css"
          integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('main-content-inner')
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <!-- basic table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        Upload file here
                    </div>
                    <div class="card-body">
                        <div id="dZUpload" class="dropzone">
                            <div class="dz-default dz-message"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- basic table end -->
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.3/dropzone.min.js" integrity="sha512-L47BqLPr0M0lidKzXCJ85j56toelWAHk13G+uhjrzPy8RoVF3Jd+R04w0XaroXWwXgc1p/EjMdO2YOrdQxeUYw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        $("#dZUpload").dropzone({
            url: "upload-file",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            addRemoveLinks: true,
            success: function (file, response) {
                let imgName = response;
                // file.previewElement.classList.add("dz-success");
                $(file.previewElement).addClass("dz-success");
                $(file.previewElement).attr("data-name", imgName);
            },
            error: function (file, response) {
                // file.previewElement.classList.add("dz-error");
            },
            removedfile: function(file) {
                let name = $(file.previewElement).attr("data-name");
                $.ajax({
                    type: 'POST',
                    url: 'remove-file',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {name: name},
                    sucess: function(data){
                        console.log('success: ' + data);
                    }
                });
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }
        });
    </script>
@endsection
