<footer id="theme-footer">
    <div id="footer-widget-area" class="footer-3c">

        <div id="footer-first" class="footer-widgets-box">
            <div id="text-8" class="footer-widget widget_text">
                <div class="footer-widget-top"><h4>Liên hệ</h4></div>
                <div class="footer-widget-container">
                    <div class="textwidget">
                        @if($contactWebsite)
                            {!! $contactWebsite->lienhe !!}
                        @endif
                    </div>
                </div>
            </div><!-- .widget /-->        </div>

        <div id="footer-second" class="footer-widgets-box">
            <div id="facebook-widget-4" class="footer-widget facebook-widget">
                <div class="footer-widget-top"><h4>Kết nối </h4></div>
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
            <div id="custom_html-4" class="widget_text footer-widget widget_custom_html">
                <div class="footer-widget-top"><h4>Đăng ký kênh youtube</h4></div>
                <div class="footer-widget-container">
                    <div class="textwidget custom-html-widget">
                        <script src="https://apis.google.com/js/platform.js"></script>

                        <div class="g-ytsubscribe" data-channelid="UCUptnRy9DiV5brpsyJQFORg" data-layout="default"
                             data-count="default"></div>
                    </div>
                </div>
            </div><!-- .widget /-->        </div><!-- #second .widget-area -->


        <div id="footer-third" class="footer-widgets-box">
            <div id="text-9" class="footer-widget widget_text">
                <div class="footer-widget-top"><h4>Liên kết websites</h4></div>
                <div class="footer-widget-container">
                    <div class="textwidget">
                        @foreach($linkWebsites as $link)
                            <p><a href="{{$link->link}}" target="_blank"
                                                  rel="noopener">{{$link->name}}</a></p>
                        @endforeach
                    </div>
                </div>
            </div><!-- .widget /-->
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
            </div><!-- .widget /-->        </div><!-- #third .widget-area -->


    </div><!-- #footer-widget-area -->
    <div class="clear"></div>
</footer><!-- .Footer /-->
<style type="text/css">
    .fluid-width-video-wrapper {
        padding-top: 10% !important;
    }
</style>
