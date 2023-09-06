<header id="theme-header" class="theme-header">

    {{--    <div id="top-nav" class="top-nav">--}}
    {{--        <div class="container">--}}
    {{--            <div class="top-menu">--}}
    {{--                <ul id="menu-linh-muc-da-qua-doi" class="menu">--}}
    {{--                    <li id="menu-item-51422"--}}
    {{--                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-51422"><a--}}
    {{--                            href="https://giaophanbacninh.org/tim-nha-tho-gan-day/">Tìm nhà thờ gần đây</a></li>--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--            <div class="search-block">--}}
    {{--                <form method="get" id="searchform-header" action="https://giaophanbacninh.org/">--}}
    {{--                    <button class="search-button" type="submit" value="Search"><i class="fa fa-search"></i></button>--}}
    {{--                    <input class="search-live" type="text" id="s-header" name="s" title="Search" value="Search"--}}
    {{--                           onfocus="if (this.value == 'Search') {this.value = '';}"--}}
    {{--                           onblur="if (this.value == '') {this.value = 'Search';}"/>--}}
    {{--                </form>--}}
    {{--            </div><!-- .search-block /-->--}}
    {{--            <div class="social-icons">--}}
    {{--                <a class="ttip-none" title="Rss" href="https://giaophanbacninh.org/feed/" target="_blank"><i--}}
    {{--                        class="fa fa-rss"></i></a>--}}
    {{--            </div>--}}
    {{--        </div><!-- .container /-->--}}
    {{--    </div><!-- .top-menu /-->--}}


    <div class="header-content" style="padding:0px; position: relative;">
        <div class="search-block" style="position: absolute; right: 50px; bottom: 22px;">

            <button class="search-button" type="submit" value="Search"><i class="fa fa-search"></i></button>
            <input class="search-live" type="text" id="s-header" name="search" title="Tìm kiếm" value="Tìm kiếm..."
                   onfocus="if (this.value == 'Tìm kiếm...') {this.value = '';}"
                   onblur="if (this.value == '') {this.value = 'Tìm kiếm...';}"/>
            <div id="live-search_sb" class="live-search_sb"
                 style="position: absolute; width: 315px; z-index: 9999; top: 32px;">
                <div class="live-search_sb_cont">
                    <div class="live-search_sb_top"></div>
                    <div id="live-search_results" style="width:100%">
                        <div id="live-search_val">
                            <ul class="live-search_main">
                                <li class="live-search_header">Bài viết</li>
                                <li>
                                    <div class="live-search_result_container">
                                        <ul class="em-search-post">
                                        </ul>
                                    </div>
                                </li>
                                <li class="live-search_lnk live-search_more"><a href="#">View
                                        All Results</a></li>
                                <li class="live-search_lnk live-search_no">No Result</li>
                            </ul>
                        </div>
                        <div id="live-search_more"></div>
                    </div>
                    <div class="live-search_sb_bottom"></div>
                </div>
            </div>

        </div><!-- .search-block /-->
        <a id="slide-out-open" class="slide-out-open" href="#"><span></span></a>

        <div class="logo" style=" /*margin-top:15px; margin-bottom:15px;*/">
            <h1><a title="Giáo phận Bắc Ninh" href="{{route('index')}}">
                    <img width="1120px" alt="Giáo phận Bắc Ninh"
                         data-src="{{$bannerWebsite ? asset("upload/admin/banner/image/" . $bannerWebsite->image) : ""}}"
                         class="lazyload"
                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>
                    <noscript><img width="1120px"
                                   src="{{$bannerWebsite ? asset("upload/admin/banner/image/" . $bannerWebsite->image) : ""}}"
                                   alt="Giáo phận Bắc Ninh"/></noscript>
                    <strong>Giáo phận Bắc Ninh </strong>
                </a>
            </h1>
        </div><!-- .logo /-->
        <div class="clear"></div>

    </div>
    <nav id="main-nav" class="fixed-enabled">
        <div class="container">


            <div class="main-menu">
                <ul id="menu-main" class="menu">
                    <li id="menu-item-68"
                        class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-68">
                        <a href="{{route('index')}}">Trang chủ</a></li>
                    @foreach($cates1 as $cate1)
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-48128">
                            <a href="{{$cate1->link ?  : route('get-post', ['post'=> $cate1->slug])}}">{{$cate1->name}}</a>
                            <ul class="sub-menu menu-sub-content">
                                @foreach($cates2 as $cate2)
                                    @if($cate1->id == $cate2->parent_id)
                                        <li
                                                <?php $detail = 1; ?>
                                        @foreach($cates3 as $cate3)
                                            @if($cate2->id == $cate3->parent_id)
                                                    <?php $detail = 0; ?>
                                                @break
                                            @endif
                                        @endforeach

                                        class="{{$detail == 0 ? "menu-item-has-children" : "" }} menu-item menu-item-type-taxonomy menu-item-object-category  menu-item-22">
                                            <a href="{{$cate2->link ?  : route('get-post', ['post'=> $cate2->slug])}}">{{$cate2->name}}</a>
                                            @if($detail == 0)
                                                <ul class="sub-menu menu-sub-content">
                                                    @foreach($cates3 as $cate3)
                                                        @if($cate2->id == $cate3->parent_id)
                                                                <?php $detail = 0; ?>
                                                            <li
                                                                class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-48095">
                                                                <a href="{{$cate3->link ?  : route('get-post', ['post'=> $cate3->slug])}}">{{$cate3->name}}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>                    <!--
										<a href="https://giaophanbacninh.org/?tierand=1" class="random-article ttip" title="Random Article"><i class="fa fa-random"></i></a>
					-->


        </div>
    </nav><!-- .main-nav /-->
</header><!-- #header /-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#live-search_sb').css('display', 'none');

        function debounce(func, delay) {
            let timeout;

            return function executedFunc(...args) {
                if (timeout) {
                    clearTimeout(timeout);
                }

                timeout = setTimeout(() => {
                    func(...args);
                    timeout = null;
                }, delay);
            };
        }

        $(document).on('input', '.search-live', debounce(function() {
            // Will only execute 300ms after the last keypress.
            $('.em-search-post').empty();
            $('.live-search_more').css('display', 'none');
            $('.live-search_no').css('display', 'none');
            if ($('.search-live').val()) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{route('search-post')}}",
                    type: "post",
                    data: {
                        post: $('.search-live').val()
                    },
                    success: function(data){
                        if (data.length) {
                            $('#live-search_sb').css('display', 'block');
                            $('.live-search_more').css('display', 'block');
                            let url = '{{ route("search-all-post", ":id") }}';
                            url = url.replace(':id', $('.search-live').val());
                            $('.live-search_more').find('a').attr('href', url);
                            data.forEach(value=> {
                                let html = '<li result-type="object" index-type="post" index-array="0" index="0" ' +
                                    'class="live-search_lnk live-search_item live-search_selected">' +
                                    '<a href="' + value.slug_path + '">' +
                                    '<div class="post-thumbnail"><img src="' + value.image_path + '" width="150" height="150" alt=""></div>' +
                                    '<span class="live-search_text">' + value.name +'</span>' +
                                    '<p class="post-meta"><span class="post-meta-author"><i class="fa fa-user"></i> ' + (value.author ? value.author : "") + '</span> ' +
                                    '<span class="tie-date"><i class="fa fa-clock-o"></i> ' + value.fullDate + '</span>' +
                                    '</p></a></li>';
                                $('.em-search-post').append(html);

                            })
                        } else {
                            $('.live-search_no').css('display', 'block');
                        }
                    }
                })

            }
        }, 300));
    })
</script>
