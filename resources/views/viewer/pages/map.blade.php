@extends('viewer.layouts.master_full_width')
@section('meta')
    <meta property="og:title" content="Giáo phận Bắc Ninh"/>
    <meta property="og:description" content=""/>
    <meta property="og:url" content="https://giaophanbacninh.org/"/>
    <meta property="og:site_name" content="Giáo phận Bắc Ninh"/>
@endsection
@section('main-content')
    <div class="content post-cover">


        {{--        <div xmlns:v="http://rdf.data-vocabulary.org/#" id="crumbs"><span typeof="v:Breadcrumb"><a rel="v:url"--}}
        {{--                                                                                                   property="v:title"--}}
        {{--                                                                                                   class="crumbs-home"--}}
        {{--                                                                                                   href="https://giaophanbacninh.org">Home</a></span>--}}
        {{--            <span class="delimiter">/</span> <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title"--}}
        {{--                                                                            href="https://giaophanbacninh.org/category/gp-bac-ninh/">Giới thiệu GP</a></span>--}}
        {{--            <span class="delimiter">/</span> <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title"--}}
        {{--                                                                            href="https://giaophanbacninh.org/category/gp-bac-ninh/giao-hat-giao-xu/">Giáo hạt-Giáo xứ</a></span>--}}
        {{--            <span class="delimiter">/</span> <span class="current">Danh sách giáo hạt – xứ họ</span>--}}
        {{--        </div>--}}


        <article
            class="post-listing post-39811 post type-post status-publish format-standard has-post-thumbnail hentry category-giao-hat-giao-xu"
            id="the-post">


            <div class="post-inner">


                {{--                <h1 class="name post-title entry-title" itemprop="itemReviewed" itemscope=""--}}
                {{--                    itemtype="http://schema.org/Thing"><span itemprop="name">Danh sách giáo hạt – xứ họ</span></h1>--}}


                {{--                <p class="post-meta">--}}


                {{--                    <span class="post-meta-author"><i class="fa fa-user"></i><a--}}
                {{--                            href="https://giaophanbacninh.org/author/admingdbn/" title="">admingdbn </a></span>--}}


                {{--                    <span class="tie-date"><i class="fa fa-clock-o"></i>24 Tháng Bảy, 2019</span>--}}


                {{--                    <span class="post-cats"><i class="fa fa-folder"></i><a--}}
                {{--                            href="https://giaophanbacninh.org/category/gp-bac-ninh/giao-hat-giao-xu/"--}}
                {{--                            rel="category tag">Giáo hạt-Giáo xứ</a></span>--}}


                {{--                    <span class="post-comments"><i class="fa fa-comments"></i><a--}}
                {{--                            href="https://giaophanbacninh.org/danh-sach-giao-hat-xu-ho/#respond">Leave a comment</a></span>--}}


                {{--                    <span class="post-views"><i class="fa fa-eye"></i>9,290 Views</span>--}}

                {{--                </p>--}}

                <div class="clear"></div>


                <div class="entry">
                    @if($map)
                        {!! $map->bando !!}
                    @endif
                </div><!-- .entry /-->


                <span style="display:none" class="updated">2019-07-24</span>


                <div style="display:none" class="vcard author" itemprop="author" itemscope=""
                     itemtype="http://schema.org/Person"><strong class="fn" itemprop="name"><a
                            href="https://giaophanbacninh.org/author/admingdbn/" title="Đăng bởi admingdbn"
                            rel="author">admingdbn</a></strong></div>


                <div class="share-post">

                    <span class="share-text">Share</span>


                    <ul class="flat-social">


                        <li><a href="http://www.facebook.com/sharer.php?u=https://giaophanbacninh.org/?p=39811"
                               class="social-facebook" rel="external" target="_blank"><i class="fa fa-facebook"></i>
                                <span>Facebook</span></a></li>


                        <li>
                            <a href="https://twitter.com/intent/tweet?text=Danh+s%C3%A1ch+gi%C3%A1o+h%E1%BA%A1t+%E2%80%93+x%E1%BB%A9+h%E1%BB%8D&amp;url=https://giaophanbacninh.org/?p=39811"
                               class="social-twitter" rel="external" target="_blank"><i class="fa fa-twitter"></i>
                                <span>Twitter</span></a></li>


                        <li>
                            <a href="https://plusone.google.com/_/+1/confirm?hl=en&amp;url=https://giaophanbacninh.org/?p=39811&amp;name=Danh+s%C3%A1ch+gi%C3%A1o+h%E1%BA%A1t+%E2%80%93+x%E1%BB%A9+h%E1%BB%8D"
                               class="social-google-plus" rel="external" target="_blank"><i
                                    class="fa fa-google-plus"></i> <span>Google +</span></a></li>


                        <li>
                            <a href="http://www.stumbleupon.com/submit?url=https://giaophanbacninh.org/?p=39811&amp;title=Danh+s%C3%A1ch+gi%C3%A1o+h%E1%BA%A1t+%E2%80%93+x%E1%BB%A9+h%E1%BB%8D"
                               class="social-stumble" rel="external" target="_blank"><i class="fa fa-stumbleupon"></i>
                                <span>Stumbleupon</span></a></li>


                        <li>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://giaophanbacninh.org/?p=39811&amp;title=Danh+s%C3%A1ch+gi%C3%A1o+h%E1%BA%A1t+%E2%80%93+x%E1%BB%A9+h%E1%BB%8D"
                               class="social-linkedin" rel="external" target="_blank"><i class="fa fa-linkedin"></i>
                                <span>LinkedIn</span></a></li>


                        <li>
                            <a href="http://pinterest.com/pin/create/button/?url=https://giaophanbacninh.org/?p=39811&amp;description=Danh+s%C3%A1ch+gi%C3%A1o+h%E1%BA%A1t+%E2%80%93+x%E1%BB%A9+h%E1%BB%8D&amp;media=https://giaophanbacninh.org/wp-content/uploads/2020/07/giaohatbacgiang-660x330.jpg"
                               class="social-pinterest" rel="external" target="_blank"><i class="fa fa-pinterest"></i>
                                <span>Pinterest</span></a></li>


                    </ul>


                    <div class="clear"></div>

                </div> <!-- .share-post -->
                <div class="clear"></div>

            </div><!-- .post-inner -->

        </article><!-- .post-listing -->


        <section id="author-box">

{{--            <div class="block-head">--}}

{{--                <h3>About admingdbn </h3>--}}
{{--                <div class="stripe-line"></div>--}}

{{--            </div>--}}

            <div class="post-listing">


                <div class="author-bio">

                    <div class="author-avatar">


                    </div><!-- #author-avatar -->


                    <div class="author-description">


                    </div><!-- #author-description -->


                    <div class="author-social flat-social">


                    </div>


                    <div class="clear"></div>

                </div>


            </div>

        </section><!-- #author-box -->


{{--        <div class="post-navigation">--}}

{{--            <div class="post-previous"><a--}}
{{--                    href="https://giaophanbacninh.org/thanh-vinh-dap-ca-chua-nhat-17-thuong-nien-2/" rel="prev"><span>Previous</span>--}}
{{--                    Thánh vịnh đáp ca Chúa nhật 17 thường niên</a></div>--}}

{{--            <div class="post-next"><a href="https://giaophanbacninh.org/ban-do-giao-hat-bac-giang/" rel="next"><span>Next</span>--}}
{{--                    Bản đồ giáo hạt Bắc Giang</a></div>--}}

{{--        </div><!-- .post-navigation -->--}}


        <div id="comments">


            <div class="clear"></div>


        </div><!-- #comments -->


    </div>
@endsection
