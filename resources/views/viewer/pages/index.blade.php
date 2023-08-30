@extends('viewer.layouts.master')
@section('meta')
    <meta property="og:title" content="Giáo phận Bắc Ninh"/>
    <meta property="og:description" content=""/>
    <meta property="og:url" content="https://giaophanbacninh.org/"/>
    <meta property="og:site_name" content="Giáo phận Bắc Ninh"/>
@endsection
@section('main-content')
    <div class="content">
        <link rel='stylesheet' href="{{ asset('assets/viewer/style/pgwslider.css') }}" type='text/css' media='all' />
        <div class="flexslider">
            <ul class="pgwSlider">
                @foreach($slideWebsites as $slide)
                    <li>
                        <a href="{{$slide->link}}">
                            <img width="660" height="330" alt="{{$slide->name}}" loading="lazy"
                                 src="{{asset("upload/admin/banner/image/" . $slide->image)}}"/>
                            <span>{{$slide->name}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="clear"></div>
        </div>
        <script type='text/javascript' src="{{ asset('assets/viewer/js/pgwslider.js') }}" ></script>
        <script>
            $(document).ready(function() {
                $('.pgwSlider').pgwSlider();
            });
        </script>

        <?php $liTab = 1 ?>
        <?php $idTab = 1 ?>
        @foreach($homes as $home)
        @if(count($home->categories) == 1)
                <section class="cat-box list-box tie-cat-13">
                    <div class="cat-box-title">
                        @foreach($home->categories as $category)
                            <h2><a href="{{route('get-post', ['post'=> $category->slug])}}" style="color: #258101">{{$category->name}}</a></h2>
                        @endforeach
                        <div class="stripe-line"></div>
                    </div>
                    <div class="cat-box-content">
                        <ul>
                            @foreach($home->categories as $category)
                                @foreach($category->posts as $keyPost=> $post)
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

                                            <div class="entry">
                                                <p>{{substr(strip_tags($post->content), 0, 50)}} &hellip;</p>
                                                <a class="more-link"
                                                   href="{{route('get-post', ['post'=> $post->slug])}}">Read
                                                    More &raquo;</a>
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
                    @foreach($home->categories as $keyCate=> $category)
                        <div id="{{"catab" . $idTab}}" class="cat-tabs-wrap cat-tabs-wrap1">

                            <ul>
                                @foreach($category->posts as $keyPost=> $post)
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


                                            <div class="entry">
                                                <p>{{substr(strip_tags($post->content), 0, 50)}} &hellip;</p>
                                                <a class="more-link"
                                                   href="{{route('get-post', ['post'=> $post->slug])}}">Read More
                                                    &raquo;</a>
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
                                @endforeach
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <?php $idTab++ ?>
                    @endforeach
                </div><!-- #cats-tabs-box /-->
            @endif
        @endforeach

        <section class="cat-box list-box tie-cat-184">
            <div class="cat-box-title">
                <h2><a href="#" style="color: #258101">Video</a></h2>
                <div class="stripe-line"></div>
            </div>
            <div class="cat-box-content">

                <ul>
                    @foreach($videos as $key=> $video)
                        <?php
                            $linkImg = explode("=", $video->link);
                            if (!isset($linkImg[1])) {
                                $linkImg = explode("/", $video->link);
                            }
                            $srcImg = end($linkImg);
                            ?>
                        @if($key == 0)
                            <li class="first-news">

                            <div class="post-thumbnail em-list-img">
                                <a href="{{route('get-video', ['video'=> $video->slug])}}" rel="bookmark">
                                    <img width="310" height="165" alt="" loading="lazy"
                                         data-src="https://img.youtube.com/vi/{{$srcImg}}/0.jpg"
                                         class="attachment-tie-medium size-tie-medium wp-post-image lazyload"
                                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>
                                    <noscript><img width="310" height="165"
                                                   src="https://img.youtube.com/vi/{{$srcImg}}/0.jpg"
                                                   class="attachment-tie-medium size-tie-medium wp-post-image" alt=""
                                                   loading="lazy"/></noscript>
                                    <span class="fa overlay-icon"></span>
                                </a>
                            </div><!-- post-thumbnail /-->

                            <h2 class="post-box-title"><a href="{{route('get-video', ['video'=> $video->slug])}}" rel="bookmark">{{$video->name}}</a></h2>


                            <p class="post-meta">


                            </p>


                            <div class="entry">
                                <p></p>
                                <a class="more-link" href="{{route('get-video', ['video'=> $video->slug])}}">Read More
                                    &raquo;</a>
                            </div>
                        </li><!-- .first-news -->
                        @else
                        <li class="other-news">

                            <div class="post-thumbnail em-side-img">
                                <a href="{{route('get-video', ['video'=> $video->slug])}}" rel="bookmark"><img
                                        width="110" height="75" alt="" loading="lazy"
                                        data-src="https://img.youtube.com/vi/{{$srcImg}}/0.jpg"
                                        class="attachment-tie-small size-tie-small wp-post-image lazyload"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>
                                    <noscript><img width="110" height="75"
                                                   src="https://img.youtube.com/vi/{{$srcImg}}/0.jpg"
                                                   class="attachment-tie-small size-tie-small wp-post-image" alt=""
                                                   loading="lazy"/></noscript>
                                    <span class="fa overlay-icon"></span></a>
                            </div><!-- post-thumbnail /-->

                            <h3 class="post-box-title"><a href="{{route('get-video', ['video'=> $video->slug])}}"
                                                          rel="bookmark">{{$video->name}}</a></h3>

                            <p class="post-meta">


                            </p>

                        </li>
                        @endif
                    @endforeach
                </ul>
                <div class="clear"></div>

            </div><!-- .cat-box-content /-->
        </section><!-- List Box -->

    </div><!-- .content /-->
@endsection
