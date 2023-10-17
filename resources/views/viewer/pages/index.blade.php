@extends('viewer.layouts.master')
@section('meta')
    <meta property="og:title" content="Giáo phận Bắc Ninh"/>
    <meta property="og:description" content=""/>
    <meta property="og:url" content="https://giaophanbacninh.org/"/>
    <meta property="og:site_name" content="Giáo phận Bắc Ninh"/>
@endsection
@section('main-content')
    <div class="content">
        <script src="{{ asset('assets/viewer/js/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/viewer/js/jssor.slider.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                var jssor_1_SlideshowTransitions = [
                    { $Duration: 800, x: 0, $During: { $Left: [0, 0] }, $Easing: { $Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 },
                ];
                var jssor_1_options = {
                    $AutoPlay: 1,
                    $Cols: 1,
                    $Align: 0,
                    $SlideshowOptions: {
                        $Class: $JssorSlideshowRunner$,
                        $Transitions: jssor_1_SlideshowTransitions,
                        $TransitionsOrder: 1
                    },
                    $BulletNavigatorOptions: {
                        $Class: $JssorBulletNavigator$
                    },
                    $ThumbnailNavigatorOptions: {
                        $Class: $JssorThumbnailNavigator$,
                        $Cols: 6,
                        $Orientation: 2,
                        $Align: 156
                    }
                };
                var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
                /*#region responsive code begin*/
                var MAX_WIDTH = 980;
                function ScaleSlider() {
                    var containerElement = jssor_1_slider.$Elmt.parentNode;
                    var containerWidth = containerElement.clientWidth;

                    if (containerWidth) {

                        var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                        jssor_1_slider.$ScaleWidth(expectedWidth);
                    }
                    else {
                        window.setTimeout(ScaleSlider, 30);
                    }
                }
                ScaleSlider();
                $(window).bind("load", ScaleSlider);
                $(window).bind("resize", ScaleSlider);
                $(window).bind("orientationchange", ScaleSlider);
                /*#endregion responsive code end*/
                // $('.img-slider').css("height", "auto");
            });
        </script>
        <link rel='stylesheet' href="{{ asset('assets/viewer/style/jssor.slider.css') }}" type='text/css' media='all' />
        <div id="jssor_1" style="position: relative; margin: 0px auto; top: 0px; left: 0px; width: 748px; height: 290.041px; overflow: hidden; visibility: visible;" data-jssor-slider="1">
            <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-009-spin" style="position: absolute; top: 0px; left: 0px; width: 660px; height: 390px; text-align: center; background-color: rgba(0, 0, 0, 0.7); display: none;">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg">
            </div>
            <div data-u="slides" style="cursor: default; position: absolute; top: 0px; right: 0px; width: 510px; height: 300px; overflow: hidden;">
                @foreach($slideHome as $slide)
                    @if($slide->image)
                <div>
                    <img class="img-slider" data-u="image" src="{{asset("upload/admin/post/image/" . $slide->image)}}" style="width: 660px; height: auto; top: 0px; left: 0px; position: absolute; display: block; z-index: 1" border="0">
                    <div data-u="thumb" style="display: none;">
                            <img data-u="thumb" class="i" src="{{asset("upload/admin/post/image/" . $slide->image)}}">
                        <span class="ti" style=""><a href="{{route('get-post', ['post'=> $slide->slug])}}" >{{$slide->name}}</a></span>
                    </div>
                </div>
                    @endif
                @endforeach
            </div>
            <!-- Thumbnail Navigator -->
            <div data-u="thumbnavigator" class="jssort121" style="position: absolute; display: block; top: 0px; left: 0px !important; width: 280px !important; height: 290.041px;" data-autocenter="2" data-scale-left="0.75" >
                <div data-u="slides" style="position: absolute; overflow: hidden; width: 320px; height: 380px; left: 0px; top: 0px; z-index: 0;">
                    <div data-u="prototype" class="p" style="width: 239px; height: 60px; left: 0px; top: 0px; " data-jssor-button="1">
                        <div data-u="thumbnailtemplate" class="t"></div>
                    </div>
                </div>
            </div>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb111" style="position: absolute;display: block;right: 9.15918px; bottom: 9.15918px;width: 139.784px;height: 20.9676px" data-scale="0.5" data-scale-ratio="0.8736505629383232">
                <div data-u="prototype" class="i" style="width: 24px; height: 24px; font-size: 12px; line-height: 24px; position: absolute; left: 0px; top: 0px;" data-jssor-button="1">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;">
                        <circle class="b" cx="8000" cy="8000" r="3000"></circle>
                    </svg>
                    <NumberTemplate></NumberTemplate>
                </div>

            </div>
        </div>
        <div class="clear"></div>

        <?php $liTab = 1 ?>
        <?php $liTabMobile = 1 ?>
        <?php $idTab = 1 ?>
        @foreach($homes as $home)
        @if(count($home->categories) == 1)
                <section class="cat-box list-box tie-cat-13" style="margin-top: 25px;">
                    <div class="cat-box-title">
                        @foreach($home->categories as $category)
                            <h2><a href="{{route('get-post', ['post'=> $category->slug])}}" style="color: #258101">{{$category->name}}</a></h2>
                        @endforeach
{{--                        <div class="stripe-line"></div>--}}
                    </div>
                    <div class="cat-box-content">
                        <ul>
                            @foreach($home->categories as $category)
                                @foreach($category->posts as $keyPost=> $post)
                                    @if($keyPost < 5)
                                        @if($keyPost == 0)
                                            <li class="first-news">

                                                <div class="post-thumbnail em-list-img">
                                                    <a href="{{route('get-post', ['post'=> $post->slug])}}"
                                                       rel="bookmark">
                                                        <img width="310" height="165" alt="" loading="lazy"
                                                             data-src="{{asset("upload/admin/post/image/" . $post->image)}}"
                                                             class="attachment-tie-medium size-tie-medium wp-post-image lazyload"
                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>
                                                        <noscript><img width="310" height="165"
                                                                       src="{{asset("upload/admin/post/image/" . $post->image)}}"
                                                                       class="attachment-tie-medium size-tie-medium wp-post-image"
                                                                       alt="" loading="lazy"/></noscript>
                                                        <span class="fa overlay-icon"></span>
                                                    </a>
                                                </div><!-- post-thumbnail /-->

                                                <h2 class="post-box-title"><a
                                                        href="{{route('get-post', ['post'=> $post->slug])}}"
                                                        rel="bookmark">{{$post->name}}</a></h2>
                                                <p class="post-meta">

                                                </p>

                                                <div class="entry em-read-more-3 ">
                                                    <p>{{strip_tags($post->content)}}</p>
                                                </div>
                                            </li><!-- .first-news -->
                                        @else
                                            <li class="other-news">

                                                <div class="post-thumbnail em-side-img">
                                                    <a href="{{route('get-post', ['post'=> $post->slug])}}"
                                                       rel="bookmark"><img width="110" height="75" alt="" loading="lazy"
                                                                           data-src="{{asset("upload/admin/post/image/" . $post->image)}}"
                                                                           class="attachment-tie-small size-tie-small wp-post-image lazyload"
                                                                           src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>
                                                        <noscript><img width="110" height="75"
                                                                       src="{{asset("upload/admin/post/image/" . $post->image)}}"
                                                                       class="attachment-tie-small size-tie-small wp-post-image"
                                                                       alt="" loading="lazy"/></noscript>
                                                        <span class="fa overlay-icon"></span></a>
                                                </div><!-- post-thumbnail /-->

                                                <h3 class="post-box-title"><a
                                                        href="{{route('get-post', ['post'=> $post->slug])}}"
                                                        rel="bookmark">{{$post->name}}</a></h3>

                                                <p class="post-meta">
                                                </p>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                        <div class="clear"></div>

                    </div><!-- .cat-box-content /-->
                </section><!-- List Box -->
            @else
                <div class="cat-box-content clear cat-box">
                    <div class="cat-tabs-title">
                        <h2> {{$home->name}}</h2>
                    </div>
                    <div class="cat-tabs-header">
                        <ul>
                        @foreach($home->categories as $keyCate=> $category)
                                <li><a href="{{"#catab" . $liTab}}">{{$category->name}}</a></li>
                                    <?php $liTab ++ ?>
                        @endforeach
                        </ul>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a href="javascript:;" class="clickable" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                @foreach($home->categories as $keyCate=> $category)
                                    <li><a href="{{"#catab" . $liTabMobile}}">{{$category->name}}</a></li>
                                    <?php $liTabMobile ++ ?>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @foreach($home->categories as $keyCate=> $category)
                        <div id="{{"catab" . $idTab}}" class="cat-tabs-wrap cat-tabs-wrap1">

                            <ul>
                                @foreach($category->posts as $keyPost=> $post)
                                    @if($keyPost < 5)
                                        @if($keyPost == 0)
                                            <li class="first-news">
                                                <div class="post-thumbnail em-list-img">
                                                    <a href="{{route('get-post', ['post'=> $post->slug])}}"
                                                       rel="bookmark">
                                                        <img width="310" height="165" alt="" loading="lazy"
                                                             data-src="{{asset("upload/admin/post/image/" . $post->image)}}"
                                                             class="attachment-tie-medium size-tie-medium wp-post-image lazyload"
                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>
                                                        <noscript><img width="310" height="165"
                                                                       src="{{asset("upload/admin/post/image/" . $post->image)}}"
                                                                       class="attachment-tie-medium size-tie-medium wp-post-image"
                                                                       alt="" loading="lazy"/></noscript>
                                                        <span class="fa overlay-icon"></span>
                                                    </a>
                                                </div><!-- post-thumbnail /-->

                                                <h2 class="post-box-title"><a
                                                        href="{{route('get-post', ['post'=> $post->slug])}}"
                                                        rel="bookmark">{{$post->name}}</a></h2>

                                                <p class="post-meta">
                                                </p>


                                                <div class="entry em-read-more-3">
                                                    <p>{{strip_tags($post->content)}}</p>
    {{--                                                <a class="more-link"--}}
    {{--                                                   href="{{route('get-post', ['post'=> $post->slug])}}">Read More--}}
    {{--                                                    &raquo;</a>--}}
                                                </div>
                                            </li><!-- .first-news -->
                                        @else
                                            <li>
                                                <div class="post-thumbnail em-side-img">
                                                    <a href="{{route('get-post', ['post'=> $post->slug])}}"
                                                       rel="bookmark"><img width="110" height="75"
                                                                           alt="" loading="lazy"
                                                                           data-src="{{asset("upload/admin/post/image/" . $post->image)}}"
                                                                           class="attachment-tie-small size-tie-small wp-post-image lazyload"
                                                                           src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>
                                                        <noscript><img width="110" height="75"
                                                                       alt="" loading="lazy"
                                                                       data-src="{{asset("upload/admin/post/image/" . $post->image)}}"
                                                                       class="attachment-tie-small size-tie-small wp-post-image lazyload"
                                                                       src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>
                                                            <noscript><img width="110" height="75"
                                                                           src="{{asset("upload/admin/post/image/" . $post->image)}}"
                                                                           class="attachment-tie-small size-tie-small wp-post-image"
                                                                           alt=""
                                                                           loading="lazy"/></noscript>
                                                        </noscript>
                                                        <span class="fa overlay-icon"></span></a>
                                                </div><!-- post-thumbnail /-->

                                                <h3 class="post-box-title"><a
                                                        href="{{route('get-post', ['post'=> $post->slug])}}"
                                                        rel="bookmark">{{$post->name}}</a></h3>

                                                <p class="post-meta">

                                                </p>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <?php $idTab++ ?>
                    @endforeach
                </div><!-- #cats-tabs-box /-->
            @endif
        @endforeach

{{--        <section class="cat-box list-box tie-cat-184">--}}
{{--            <div class="cat-box-title">--}}
{{--                <h2><a href="#" style="color: #258101">Video</a></h2>--}}
{{--                <div class="stripe-line"></div>--}}
{{--            </div>--}}
{{--            <div class="cat-box-content">--}}
{{--                <ul>--}}
{{--                    @foreach($videos as $key=> $video)--}}
{{--                        <?php--}}
{{--                            $linkImg = explode("=", $video->link);--}}
{{--                            if (!isset($linkImg[1])) {--}}
{{--                                $linkImg = explode("/", $video->link);--}}
{{--                            }--}}
{{--                            $srcImg = end($linkImg);--}}
{{--                            ?>--}}
{{--                        @if($key < 4)--}}
{{--                            @if($key == 0)--}}
{{--                                <li class="first-news">--}}
{{--                                <div class="post-thumbnail em-list-img">--}}
{{--                                    <a href="{{route('get-video', ['video'=> $video->slug])}}" rel="bookmark">--}}
{{--                                        <img width="310" height="165" alt="" loading="lazy"--}}
{{--                                             data-src="https://img.youtube.com/vi/{{$srcImg}}/0.jpg"--}}
{{--                                             class="attachment-tie-medium size-tie-medium wp-post-image lazyload"--}}
{{--                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>--}}
{{--                                        <noscript><img width="310" height="165"--}}
{{--                                                       src="https://img.youtube.com/vi/{{$srcImg}}/0.jpg"--}}
{{--                                                       class="attachment-tie-medium size-tie-medium wp-post-image" alt=""--}}
{{--                                                       loading="lazy"/></noscript>--}}
{{--                                        <span class="fa overlay-icon"></span>--}}
{{--                                    </a>--}}
{{--                                </div><!-- post-thumbnail /-->--}}
{{--                                <h2 class="post-box-title"><a href="{{route('get-video', ['video'=> $video->slug])}}" rel="bookmark">{{$video->name}}</a></h2>--}}
{{--                                <p class="post-meta"></p>--}}
{{--                                <div class="entry">--}}
{{--                                    <p></p>--}}
{{--    --}}{{--                                <a class="more-link" href="{{route('get-video', ['video'=> $video->slug])}}">Read More--}}
{{--    --}}{{--                                    &raquo;</a>--}}
{{--                                </div>--}}
{{--                            </li><!-- .first-news -->--}}
{{--                            @else--}}
{{--                            <li class="other-news">--}}

{{--                                <div class="post-thumbnail em-side-img">--}}
{{--                                    <a href="{{route('get-video', ['video'=> $video->slug])}}" rel="bookmark"><img--}}
{{--                                            width="110" height="75" alt="" loading="lazy"--}}
{{--                                            data-src="https://img.youtube.com/vi/{{$srcImg}}/0.jpg"--}}
{{--                                            class="attachment-tie-small size-tie-small wp-post-image lazyload"--}}
{{--                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>--}}
{{--                                        <noscript><img width="110" height="75"--}}
{{--                                                       src="https://img.youtube.com/vi/{{$srcImg}}/0.jpg"--}}
{{--                                                       class="attachment-tie-small size-tie-small wp-post-image" alt=""--}}
{{--                                                       loading="lazy"/></noscript>--}}
{{--                                        <span class="fa overlay-icon"></span></a>--}}
{{--                                </div><!-- post-thumbnail /-->--}}

{{--                                <h3 class="post-box-title"><a href="{{route('get-video', ['video'=> $video->slug])}}"--}}
{{--                                                              rel="bookmark">{{$video->name}}</a></h3>--}}
{{--                                <p class="post-meta"></p>--}}
{{--                            </li>--}}
{{--                            @endif--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--                <div class="clear"></div>--}}
{{--            </div><!-- .cat-box-content /-->--}}
{{--        </section><!-- List Box -->--}}

    </div><!-- .content /-->
@endsection
