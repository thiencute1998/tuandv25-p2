@extends('admin.layouts.master')
@section('admin-css')
    <style>
        /* Tab Links */
        .tabs{
            display:flex;
        }
        .tablinks {
            border: none;
            outline: none;
            cursor: pointer;
            width: 100%;
            padding: 1rem;
            font-size: 13px;
            text-transform: uppercase;
            font-weight:600;
            transition: 0.2s ease;
        }
        .tablinks:hover{
            background:blue;
            color:#fff;
        }
        /* Tab active */
        .tablinks.active {
            background:blue;
            color:#fff;
        }

        /* tab content */
        .tabcontent {
            display: none;
        }
        /* Text*/
        .tabcontent p {
            color: #333;
            font-size: 16px;
        }
        /* tab content active */
        .tabcontent.active {
            display: block;
        }
    </style>

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
                                <form id="user-form" name="user-form" action="{{ route('admin-about-update') }}" method="POST">
                                    @csrf
                                    @if (session('edit-success'))
                                        <h5 class="config-message mb-2 text-success">{{ session('edit-success') }}</h5>
                                @endif
                                <!-- Tab links -->
                                <div class="tabs">
                                    <label class="tablinks active" data-electronic="allproducts">Giới thiệu</label>
                                    <label class="tablinks" data-electronic="Microcontrollers">Liên hệ</label>
                                    <label class="tablinks" data-electronic="module">Bản đồ</label>
                                </div>

                                <!-- Tab content -->
                                <div class="wrapper_tabcontent">
                                    <div id="allproducts" class="tabcontent active">
                                        <div class="form-group">
                                            <label class="col-form-label">Giới thiệu</label>
                                            <textarea id="gioithieu" class="form-control" name="gioithieu" type="text">
                                            {{ $about->gioithieu }}
                                        </textarea>
                                        </div>
                                    </div>

                                    <div id="Microcontrollers" class="tabcontent">
                                        <div class="form-group">
                                            <label class="col-form-label">Liên hệ</label>
                                            <textarea id="lienhe" class="form-control" name="lienhe" type="text">
                                            {{ $about->lienhe }}
                                        </textarea>
                                        </div>
                                    </div>

                                    <div id="module" class="tabcontent">
                                        <div class="form-group">
                                            <label class="col-form-label">Bản đồ</label>
                                            <textarea id="bando" class="form-control" name="bando" type="text" >
                                            {{ $about->bando }}
                                        </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />
    <script type="text/javascript" src="{{ asset('richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src='{{ asset('richtexteditor/plugins/all_plugins.js') }}'></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var editor1 = new RichTextEditor("#gioithieu");
            var editor2 = new RichTextEditor("#lienhe");
            var editor3 = new RichTextEditor("#bando");
            $('.config-message').delay(5000).fadeOut();
        })
        var tabLinks = document.querySelectorAll(".tablinks");
        var tabContent =document.querySelectorAll(".tabcontent");

        tabLinks.forEach(function(el) {
            el.addEventListener("click", openTabs);
        });

        function openTabs(el) {
            var btn = el.currentTarget; // lắng nghe sự kiện và hiển thị các element
            var electronic = btn.dataset.electronic; // lấy giá trị trong data-electronic

            tabContent.forEach(function(el) {
                el.classList.remove("active");
            }); //lặp qua các tab content để remove class active

            tabLinks.forEach(function(el) {
                el.classList.remove("active");
            }); //lặp qua các tab links để remove class active

            document.querySelector("#" + electronic).classList.add("active");
            // trả về phần tử đầu tiên có id="" được add class active

            btn.classList.add("active");
            // các button mà chúng ta click vào sẽ được add class active
        }
    </script>
@endsection
