<style>
    .event-none {
        display: none !important;
    }

    .event-item {
        display: inherit !important;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">

<aside id="sidebar">
    <div class="theiaStickySidebar">
        <div id="media_image-13" class="widget widget_media_image">
{{--            <div class="widget-top"><h4></h4>--}}
{{--                <div class="stripe-line"></div>--}}
{{--            </div>--}}
            <div class="widget-container"><a
                    href="{{$tagRight ? $tagRight->link : "#"}}"><img
                        width="300" height="111" alt="" style="max-width: 100%; height: auto;"
                        data-srcset="https://giaophanbacninh.org/wp-content/uploads/2023/07/AddHGT-01-300x111.jpg 300w, https://giaophanbacninh.org/wp-content/uploads/2023/07/AddHGT-01-500x184.jpg 500w, https://giaophanbacninh.org/wp-content/uploads/2023/07/AddHGT-01-768x283.jpg 768w, https://giaophanbacninh.org/wp-content/uploads/2023/07/AddHGT-01.jpg 1281w"
                        data-src="https://giaophanbacninh.org/wp-content/uploads/2023/07/AddHGT-01-300x111.jpg"
                        data-sizes="(max-width: 300px) 100vw, 300px"
                        class="image wp-image-54212  attachment-medium size-medium lazyload"
                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>
                    <noscript><img width="300" height="111"
                                   src="https://giaophanbacninh.org/wp-content/uploads/2023/07/AddHGT-01-300x111.jpg"
                                   class="image wp-image-54212  attachment-medium size-medium" alt=""
                                   style="max-width: 100%; height: auto;"
                                   srcset="https://giaophanbacninh.org/wp-content/uploads/2023/07/AddHGT-01-300x111.jpg 300w, https://giaophanbacninh.org/wp-content/uploads/2023/07/AddHGT-01-500x184.jpg 500w, https://giaophanbacninh.org/wp-content/uploads/2023/07/AddHGT-01-768x283.jpg 768w, https://giaophanbacninh.org/wp-content/uploads/2023/07/AddHGT-01.jpg 1281w"
                                   sizes="(max-width: 300px) 100vw, 300px"/></noscript>
                </a></div>
        </div><!-- .widget /-->

        <div id="em_calendar-2" class="widget widget_em_calendar">
            <div class="widget-top"><h4>Lịch phụng vụ</h4>
{{--                <div class="stripe-line"></div>--}}
            </div>
            <div class="widget-container">
                <div id="calendar" class="calendar"></div>
            </div>
            <script type='text/javascript' src="{{ asset('assets/viewer/js/jquery.min.js') }}"
                    id='jquery-core-js'></script>
            <script type="text/javascript">
                var eventRoute = {
                    name: "{{ route('get-event') }}",
                    nameEvent: "{{ route('get-event-calendar', '/ccalendar') }}",
                }
            </script>
            <link rel='stylesheet' href="{{ asset('assets/viewer/style/calendar.css') }}" type='text/css' media='all'/>
{{--            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"--}}
{{--                    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="--}}
{{--                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
            <script type='text/javascript' src="{{ asset('assets/viewer/js/calendar.js') }}"></script>
        </div><!-- .widget /-->

        <div id="categort-posts-widget-2" class="widget categort-posts">
            <div class="tab-wrapper widget-container">
                <ul class="tab">
                    <li>
                        <a href="#tab-main-info">Tin mới</a>
                    </li>
                    <li>
                        <a href="#tab-image">Tin xem nhiều</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-item" id="tab-main-info">
                        <div class="">
                            <ul>
                                @foreach($postNew as $post)
                                <li>
                                    <div class="post-thumbnail em-news-img">
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
                                    <h3><a
                                            href="{{route('get-post', ['post'=> $post->slug])}}">{{$post->name}}</a></h3>

{{--                                    <span class="tie-date"><i class="fa fa-clock-o"></i>{{$post->dateDiff}} ago</span>--}}
                                </li>
                                @endforeach
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="tab-item" id="tab-image">
                        <div class="">
                            <ul>
                                @foreach($postTopView as $post)
                                    <li>
                                        <div class="post-thumbnail em-news-img">
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
                                        <h3><a
                                                href="{{route('get-post', ['post'=> $post->slug])}}">{{$post->name}}</a></h3>

{{--                                        <span class="tie-date"><i class="fa fa-clock-o"></i>{{$post->dateDiff}} ago</span>--}}
                                    </li>
                                @endforeach
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="widget-top"><h4>Tin mới </h4>--}}
{{--                <div class="stripe-line"></div>--}}
{{--            </div>--}}
{{--            <div class="widget-container">--}}
{{--                <ul>--}}
{{--                    @foreach($postNew as $post)--}}
{{--                    <li>--}}
{{--                        <div class="post-thumbnail em-news-img">--}}
{{--                            <a href="{{route('get-post', ['post'=> $post->slug])}}"--}}
{{--                               rel="bookmark"><img width="110" height="75" alt="" loading="lazy"--}}
{{--                                                   data-src="{{asset("upload/admin/post/image/" . $post->image)}}"--}}
{{--                                                   class="attachment-tie-small size-tie-small wp-post-image lazyload"--}}
{{--                                                   src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>--}}
{{--                                <noscript><img width="110" height="75"--}}
{{--                                               src="{{asset("upload/admin/post/image/" . $post->image)}}"--}}
{{--                                               class="attachment-tie-small size-tie-small wp-post-image"--}}
{{--                                               alt="" loading="lazy"/></noscript>--}}
{{--                                <span class="fa overlay-icon"></span></a>--}}
{{--                        </div><!-- post-thumbnail /-->--}}
{{--                        <h3><a--}}
{{--                                href="{{route('get-post', ['post'=> $post->slug])}}">{{$post->name}}</a></h3>--}}

{{--                        <span class="tie-date"><i class="fa fa-clock-o"></i>{{$post->dateDiff}} ago</span>--}}
{{--                    </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--                <div class="clear"></div>--}}
{{--            </div>--}}
        </div><!-- .widget /-->

        <div id="video-widget-10" class="widget video-widget">
{{--            <div class="widget-top"><h4>Tâm tình của Đức cha Cosma</h4>--}}
{{--                <div class="stripe-line"></div>--}}
{{--            </div>--}}
            <div class="widget-container">
                <iframe title="Tất cả là hồng ân | Đức cha Cosma Hoàng Văn Đạt" width="320" height="180"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen
                        data-src="https://www.youtube.com/embed/OCpPaom8VMc?feature=oembed"
                        class="lazyload"
                        src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="></iframe>
            </div>
        </div><!-- .widget /-->

        <div class="widget categort-posts">
            <div id="categort-posts-widget-3" class="widget categort-posts">
                <div class="widget-top"><h4>Thông Báo </h4>
{{--                    <div class="stripe-line"></div>--}}
                </div>
                <div class="widget-container">
                    <ul>
                        @foreach($postNotify as $post)
                        <li>
                            <div class="post-thumbnail em-news-img">
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
                            <h3><a
                                    href="{{route('get-post', ['post'=> $post->slug])}}">{{$post->name}}</a></h3>

{{--                            <span class="tie-date"><i class="fa fa-clock-o"></i>{{$post->dateDiff}} ago</span>--}}
                        </li>
                        @endforeach
                    </ul>
                    <div class="clear"></div>
                </div>
            </div><!-- .widget /-->
            <div id="text-html-widget-3" class="widget text-html">
                <div class="widget-top"><h4></h4>
{{--                    <div class="stripe-line"></div>--}}
                </div>
                <div class="widget-container">
                    <div><a href="{{route('get-map')}}"><img width="315"
                                                                            data-src="https://giaophanbacninh.org/wp-content/uploads/2023/01/BandoGPBN.jpg"
                                                                            class="tie-appear lazyload"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                            <noscript><img
                                    src="https://giaophanbacninh.org/wp-content/uploads/2023/01/BandoGPBN.jpg"
                                    width="315" class="tie-appear"></noscript>
                        </a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div><!-- .widget /-->
            <div id="media_image-9" class="widget widget_media_image">
                <div class="widget-top"><h4></h4>
{{--                    <div class="stripe-line"></div>--}}
                </div>
                <div class="widget-container"><a href="{{route('find-church')}}"><img
                            width="300" height="51" alt="" style="max-width: 100%; height: auto;"
                            data-srcset="https://giaophanbacninh.org/wp-content/uploads/2023/01/timnhatho-01-300x51.jpg 300w, https://giaophanbacninh.org/wp-content/uploads/2023/01/timnhatho-01-500x85.jpg 500w, https://giaophanbacninh.org/wp-content/uploads/2023/01/timnhatho-01.jpg 654w"
                            data-src="https://giaophanbacninh.org/wp-content/uploads/2023/01/timnhatho-01-300x51.jpg"
                            data-sizes="(max-width: 300px) 100vw, 300px"
                            class="image wp-image-51231  attachment-medium size-medium lazyload"
                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>
                        <noscript><img width="300" height="51"
                                       src="https://giaophanbacninh.org/wp-content/uploads/2023/01/timnhatho-01-300x51.jpg"
                                       class="image wp-image-51231  attachment-medium size-medium" alt=""
                                       style="max-width: 100%; height: auto;"
                                       srcset="https://giaophanbacninh.org/wp-content/uploads/2023/01/timnhatho-01-300x51.jpg 300w, https://giaophanbacninh.org/wp-content/uploads/2023/01/timnhatho-01-500x85.jpg 500w, https://giaophanbacninh.org/wp-content/uploads/2023/01/timnhatho-01.jpg 654w"
                                       sizes="(max-width: 300px) 100vw, 300px"/></noscript>
                    </a></div>
            </div><!-- .widget /-->
            <div id="text-9" class="footer-widget widget_text">
                <div class="footer-widget-top"><h4 style="color: #258101">Liên kết websites</h4></div>
                <div class="footer-widget-container">
                    <div class="textwidget linkw">
                        @foreach($linkWebsites as $link)
                            <p><a href="{{$link->link}}" target="_blank"
                                  rel="noopener">{{$link->name}}</a></p>
                        @endforeach
                    </div>
                </div>
            </div><!-- .widget /-->
            <div id="footer-second" class="footer-widgets-box">
                <div id="facebook-widget-4" class="footer-widget facebook-widget">
                    <div class="footer-widget-top"><h4 style="color: #258101">Kết nối </h4></div>
                    <div class="footer-widget-container">
                        <div class="facebook-box">
                            <iframe scrolling="no" frameborder="0"
                                    style="border:none; overflow:hidden; width:300px; height:250px;"
                                    allowTransparency="true"
                                    data-src="https://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/gpbacninh/?eid=ARCjSgUuTfExaFbPsWXrkPEnCJwi0tPRU1Sn8pJ6x0uH6b-TJ88VjShClPqyDDZ0gw197uYzqdn7ofYt&amp;width=300&amp;height=125&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false"
                                    class="lazyload"
                                    src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="></iframe>
                        </div>
                    </div>
                </div><!-- .widget /-->
            </div><!-- #second .widget-area -->
            <div id="text-4" class="footer-widget widget_text">
                {{--                <div class="footer-widget-top"><h4> </h4></div>--}}
                <div class="footer-widget-container">
                    <div class="textwidget"><a href="https://giaophanbacninh.org/v1" title="Website cũ"><img height="60"
                                                                                                             width="154"
                                                                                                             data-src="http://giaophanbacninh.org/wp-content/uploads/2013/05/banner_webcu.gif"
                                                                                                             class="lazyload"
                                                                                                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>
                            <noscript><img src="http://giaophanbacninh.org/wp-content/uploads/2013/05/banner_webcu.gif"
                                           height="60" width="154"/></noscript>
                        </a>


                    </div>
                </div>
            </div><!-- .widget /-->
        </div><!-- .theiaStickySidebar /-->
</aside><!-- #sidebar /-->
<div class="clear"></div>
<!-- Trigger/Open The Modal -->

<!-- The Modal -->
{{--<div id="myModal" class="modal">--}}

{{--    <!-- Modal content -->--}}
{{--    <div class="modal-content">--}}
{{--        <div class="modal-header">--}}
{{--            <span class="close">&times;</span>--}}
{{--            <h2>Modal Header</h2>--}}
{{--        </div>--}}
{{--        <div class="modal-body">--}}
{{--            <p>Some text in the Modal Body</p>--}}
{{--            <p>Some other text...</p>--}}
{{--        </div>--}}
{{--        <div class="modal-footer">--}}
{{--            <h3>Modal Footer</h3>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}

<div id="myModal" class="em pixelbones em-calendar-preview em-modal em-cal-date-content">
    <div class="em-modal-popup">
        <header>
            <a class="em-close-modal"></a><!-- close modal -->
            <div class="em-modal-title em-full-date">
                5 Tháng Tám, 2023
            </div>
        </header>
        <div class="em-modal-content em pixelbones em-calendar-preview em-list-widget em-events-widget">
            <div class="em-item em-event event-none" style="--default-border:#a8d144;">
                <div class="em-item-image" style="max-width:150px">

                    <img width="150" height="150" alt="Thứ Bảy tuần 17 Thường niên" loading="lazy"
                         data-src="https://giaophanbacninh.org/wp-content/uploads/2023/07/5thang8-150x150.jpeg"
                         class="attachment-150x150 size-150x150 wp-post-image lazyload em-img-data"
                         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="/>
                    <noscript><img width="150" height="150"
                                   src="https://giaophanbacninh.org/wp-content/uploads/2023/07/5thang8-150x150.jpeg"
                                   class="attachment-150x150 size-150x150 wp-post-image em-img"
                                   alt="" loading="lazy"/></noscript>


                </div>
                <div class="em-item-info">
                    <div class="em-item-name">
                        <a href="https://giaophanbacninh.org/events/thu-bay-tuan-17-thuong-nien/">
                            <span>Thứ Bảy tuần 17 Thường niên</span>
                        </a>
                    </div>
                    <div class="em-item-meta">
                        <div class="em-item-meta-line em-event-date em-event-meta-datetime">
                            <span class="em-icon em-icon-calendar"></span>
                            <span class="em-date">5 Th8 23</span>
                        </div>
                        <div class="em-item-meta-line em-event-location em-event-meta-location">
                            <span class="em-icon em-icon-location"></span>
                            <span class="em-address">Cung hiến thánh đường Đức Maria (Tr). Lv 25,1.8-17 ; Mt 14,1-12. (Lễ Đức Mẹ: Kh 21,1-5a ; Lc 11,27-28).</span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- content -->
    </div><!-- modal -->
</div>




