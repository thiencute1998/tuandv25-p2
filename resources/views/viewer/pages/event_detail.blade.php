@extends('viewer.layouts.master')
@section('meta')
    <meta property="og:title" content="Giáo phận Bắc Ninh"/>
    <meta property="og:description" content=""/>
    <meta property="og:url" content="https://giaophanbacninh.org/"/>
    <meta property="og:site_name" content="Giáo phận Bắc Ninh"/>
@endsection
@section('main-content')
    <div class="content background-this">
        <input type="hidden" class="em-post-slug" value="{{$event->slug}}">

        <div xmlns:v="http://rdf.data-vocabulary.org/#" id="crumbs"><span typeof="v:Breadcrumb"><a rel="v:url"
                                                                                                   property="v:title"
                                                                                                   class="crumbs-home"
                                                                                                   href="{{route('index')}}">Home</a></span>
                <span class="delimiter">/</span> <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title"
                                                                                href="{{route('events')}}">Event</a></span>
            <span class="delimiter">/</span> <span class="current">{{$event->name}}</span></div>

        <article
            class="post-listing post-47177 post type-post status-publish format-standard has-post-thumbnail hentry category-giao-hoi-hoan-cau category-gia-dinh-bac-ninh-hoa-ky category-uncategorized"
            id="the-post">

            <div class="post-inner">

                <h1 class="name post-title entry-title" itemprop="itemReviewed" itemscope=""
                    itemtype="http://schema.org/Thing"><span itemprop="name">{{$event->name}}</span></h1>

{{--                <p class="post-meta">--}}

{{--                        <span class="post-meta-author"><i class="fa fa-user"></i><a--}}
{{--                                href="https://giaophanbacninh.org/author/tomavavi/" title="">{{$event->author}} </a></span>--}}

{{--                    <span class="tie-date"><i class="fa fa-clock-o"></i>5 Tháng Bảy, 2022</span>--}}

{{--                    <span class="post-comments"><i class="fa fa-comments"></i><a--}}
{{--                            href="#">Leave a comment</a></span>--}}

{{--                    <span class="post-views"><i class="fa fa-eye"></i>{{$event->views}} Views</span>--}}

{{--                </p>--}}

                <div class="clear"></div>


                <div class="entry">
                    {!! $event->content !!}
                </div><!-- .entry /-->


{{--                <span style="display:none" class="updated">2022-07-05</span>--}}


{{--                <div style="display:none" class="vcard author" itemprop="author" itemscope=""--}}
{{--                     itemtype="http://schema.org/Person"><strong class="fn" itemprop="name"><a--}}
{{--                            href="https://giaophanbacninh.org/author/tomavavi/" title="Đăng bởi nguyen"--}}
{{--                            rel="author">nguyen</a></strong></div>--}}


{{--                <div class="share-post">--}}
{{--                    <span class="share-text">Share</span>--}}
{{--                    <ul class="flat-social">--}}
{{--                        <li><a href="http://www.facebook.com/sharer.php?u=https://giaophanbacninh.org/?p=47177"--}}
{{--                               class="social-facebook" rel="external" target="_blank"><i class="fa fa-facebook"></i>--}}
{{--                                <span>Facebook</span></a></li>--}}
{{--                        <li>--}}
{{--                            <a href="https://twitter.com/intent/tweet?text=C%C3%B4ng+b%E1%BB%91+Logo+N%C4%83m+Th%C3%A1nh+2025&amp;url=https://giaophanbacninh.org/?p=47177"--}}
{{--                               class="social-twitter" rel="external" target="_blank"><i class="fa fa-twitter"></i>--}}
{{--                                <span>Twitter</span></a></li>--}}
{{--                        <li>--}}
{{--                            <a href="https://plusone.google.com/_/+1/confirm?hl=en&amp;url=https://giaophanbacninh.org/?p=47177&amp;name=C%C3%B4ng+b%E1%BB%91+Logo+N%C4%83m+Th%C3%A1nh+2025"--}}
{{--                               class="social-google-plus" rel="external" target="_blank"><i--}}
{{--                                    class="fa fa-google-plus"></i> <span>Google +</span></a></li>--}}
{{--                        <li>--}}
{{--                            <a href="http://www.stumbleupon.com/submit?url=https://giaophanbacninh.org/?p=47177&amp;title=C%C3%B4ng+b%E1%BB%91+Logo+N%C4%83m+Th%C3%A1nh+2025"--}}
{{--                               class="social-stumble" rel="external" target="_blank"><i--}}
{{--                                    class="fa fa-stumbleupon"></i> <span>Stumbleupon</span></a></li>--}}
{{--                        <li>--}}
{{--                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://giaophanbacninh.org/?p=47177&amp;title=C%C3%B4ng+b%E1%BB%91+Logo+N%C4%83m+Th%C3%A1nh+2025"--}}
{{--                               class="social-linkedin" rel="external" target="_blank"><i class="fa fa-linkedin"></i>--}}
{{--                                <span>LinkedIn</span></a></li>--}}
{{--                        <li>--}}
{{--                            <a href="http://pinterest.com/pin/create/button/?url=https://giaophanbacninh.org/?p=47177&amp;description=C%C3%B4ng+b%E1%BB%91+Logo+N%C4%83m+Th%C3%A1nh+2025&amp;media=https://giaophanbacninh.org/wp-content/uploads/2022/07/congbologonamthanh20251-660x330.jpeg"--}}
{{--                               class="social-pinterest" rel="external" target="_blank"><i--}}
{{--                                    class="fa fa-pinterest"></i> <span>Pinterest</span></a></li>--}}
{{--                    </ul>--}}


{{--                    <div class="clear"></div>--}}

{{--                </div> <!-- .share-post -->--}}
                <div class="clear"></div>

            </div><!-- .post-inner -->

        </article><!-- .post-listing -->


{{--        <section id="author-box">--}}

{{--            <div class="block-head">--}}

{{--                <h3>About nguyen </h3>--}}
{{--                <div class="stripe-line"></div>--}}

{{--            </div>--}}

{{--            <div class="post-listing">--}}


{{--                <div class="author-bio">--}}

{{--                    <div class="author-avatar">--}}


{{--                    </div><!-- #author-avatar -->--}}


{{--                    <div class="author-description">--}}


{{--                    </div><!-- #author-description -->--}}


{{--                    <div class="author-social flat-social">--}}


{{--                    </div>--}}


{{--                    <div class="clear"></div>--}}

{{--                </div>--}}


{{--            </div>--}}

{{--        </section><!-- #author-box -->--}}


        {{--            <div class="post-navigation">--}}

        {{--                <div class="post-previous"><a--}}
        {{--                        href="https://giaophanbacninh.org/thanh-le-ra-mat-doan-tntt-daminh-savio-minh-dan/"--}}
        {{--                        rel="prev"><span>Previous</span> Thánh lễ ra mắt đoàn TNTT Đaminh Savio Minh Dân</a></div>--}}

        {{--                <div class="post-next"><a--}}
        {{--                        href="https://giaophanbacninh.org/nha-thanh-phero-nguyen-van-tu-thong-bao-khoa-tim-hieu-va-tinh-tam-dinh-huong-mua-he-nam-2022/"--}}
        {{--                        rel="next"><span>Next</span> Nhà Thánh Phêrô Nguyễn Văn Tự: Thông báo khoá tìm hiểu và tĩnh tâm--}}
        {{--                        định hướng mùa hè năm 2022</a></div>--}}

        {{--            </div><!-- .post-navigation -->--}}


        <section id="related_posts" class=" background-this">

            <div class="block-head">

                <h3>Tin liên quan</h3>
{{--                <div class="stripe-line"></div>--}}

            </div>

            <div class="post-listing">

                @foreach ($eventRelated as $related)
                    <div class="related-item">

                        <div class="post-thumbnail tie-appear em-related-img">

                            <a href="{{route('get-post', ['post'=> $related->slug])}}">

                                <img width="310" height="165" alt=""
                                     data-src="{{asset("upload/admin/post/image/" . $related->image)}}"
                                     class="attachment-tie-medium size-tie-medium wp-post-image ls-is-cached lazyloaded tie-appear"
                                     src="{{asset("upload/admin/post/image/" . $related->image)}}">
                                <noscript><img width="310" height="165"
                                               src="{{asset("upload/admin/post/image/" . $related->image)}}"
                                               class="attachment-tie-medium size-tie-medium wp-post-image" alt=""/>
                                </noscript>
                                <span class="fa overlay-icon"></span>

                            </a>

                        </div><!-- post-thumbnail /-->

                        <h3>
                            <a href="{{route('get-post', ['post'=> $related->slug])}}"
                               rel="bookmark">{{$related->name}}</a>
                        </h3>

                        <p class="post-meta"><span class="tie-date"><i class="fa fa-clock-o"></i>1 ngày ago</span></p>

                    </div>
                @endforeach
                <div class="clear"></div>

            </div>

        </section>


        <section id="check-also-box" class="post-listing check-also-right">

            <a href="#" id="check-also-close"><i class="fa fa-close"></i></a>


            <div class="block-head">

                <h3>Check Also</h3>

            </div>


            <div class="check-also-post">


                <div class="post-thumbnail tie-appear">

                    <a href="https://giaophanbacninh.org/ruoc-kieu-va-thanh-le-mung-kinh-duc-me-hon-xac-len-troi-tai-la-vang/">

                        <img width="310" height="165" alt="" loading="lazy"
                             data-src="https://giaophanbacninh.org/wp-content/uploads/2023/08/16082023_ngay15_lavang_1-310x165.jpeg"
                             class="attachment-tie-medium size-tie-medium wp-post-image tie-appear lazyloaded"
                             src="https://giaophanbacninh.org/wp-content/uploads/2023/08/16082023_ngay15_lavang_1-310x165.jpeg">
                        <noscript><img width="310" height="165"
                                       src="https://giaophanbacninh.org/wp-content/uploads/2023/08/16082023_ngay15_lavang_1-310x165.jpeg"
                                       class="attachment-tie-medium size-tie-medium wp-post-image" alt=""
                                       loading="lazy"/></noscript>
                        <span class="fa overlay-icon"></span>

                    </a>

                </div><!-- post-thumbnail /-->


                <h2 class="post-title"><a
                        href="https://giaophanbacninh.org/ruoc-kieu-va-thanh-le-mung-kinh-duc-me-hon-xac-len-troi-tai-la-vang/"
                        rel="bookmark">Rước kiệu và Thánh lễ mừng kính Đức Mẹ Hồn Xác Lên Trời tại La Vang</a></h2>

                <p>“Qua cuộc rước kiệu này, chúng con muốn bày tỏ lòng yêu mến và tâm …</p>

            </div>


        </section>


        <div id="comments">


            <div class="clear"></div>


        </div><!-- #comments -->

    </div>
    <!-- .content -->
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('plus-view-event')}}",
            type: "post",
            data: {
                slug: $('.em-post-slug').val()
            },
            success: function(res){

            }
        })
    })
</script>
