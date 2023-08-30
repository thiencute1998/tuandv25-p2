<footer id="theme-footer">
    <div id="footer-widget-area" class="footer-3c">

        <div id="footer-first" class="footer-widgets-box">
            <div class="footer-widget-top" style="text-transform: uppercase"><h4>Giáo Phận Bắc Ninh</h4></div>
            <p style="margin-top: 10px;"> <img src="{{asset("assets/viewer/style/images/cropped-icon-270x270.png")}}" width="200px;"></p>
        </div>


        <div id="footer-second1" class="footer-widgets-box">
            <div id="text-8" class="footer-widget widget_text">
                <div class="footer-widget-top"><h4>LIÊN HỆ</h4></div>
                <div class="footer-widget-container">
                    <div class="textwidget">
                        @if($contactWebsite)
                            {!! $contactWebsite->lienhe !!}
                        @endif
                    </div>
                </div>
            </div><!-- .widget /-->
        </div>
        <div id="footer-third1" class="footer-widgets-box">
            <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                <div class="footer-widget-top"><h4>NHẬN BẢN TIN</h4></div>
                <div class="form">
                    <div class="input-group">
                        <input id="register_email" type="email" class="form-control" placeholder="Nhập email nhận tin">
                        <span class="input-group-btn">
                            <button class="btn green" type="button" onclick="registerEmail();">Đăng ký</button>
                        </span>
                    </div>
                    <p style="padding-top: 10px;"><small>Chúng tôi sẽ gửi bài viết mới và Lời Chúa qua email của bạn.</small></p>
                </div>
            </div>
        </div>
{{--        <div id="footer-third" class="footer-widgets-box">--}}
{{--            <div id="custom_html-4" class="widget_text footer-widget widget_custom_html">--}}
{{--                <div class="footer-widget-top"><h4>Đăng ký kênh youtube</h4></div>--}}
{{--                <div class="footer-widget-container">--}}
{{--                    <div class="textwidget custom-html-widget">--}}
{{--                        <script src="https://apis.google.com/js/platform.js"></script>--}}

{{--                        <div class="g-ytsubscribe" data-channelid="UCUptnRy9DiV5brpsyJQFORg" data-layout="default"--}}
{{--                             data-count="default"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div><!-- .widget /-->--}}
{{--            <div id="text-9" class="footer-widget widget_text">--}}
{{--                <div class="footer-widget-top"><h4>Liên kết websites</h4></div>--}}
{{--                <div class="footer-widget-container">--}}
{{--                    <div class="textwidget">--}}
{{--                        @foreach($linkWebsites as $link)--}}
{{--                            <p><a href="{{$link->link}}" target="_blank"--}}
{{--                                                  rel="noopener">{{$link->name}}</a></p>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div><!-- .widget /-->--}}

{{--        </div><!-- #third .widget-area -->--}}


    </div><!-- #footer-widget-area -->
    <div class="clear"></div>
</footer><!-- .Footer /-->
<style type="text/css">
    .fluid-width-video-wrapper {
        padding-top: 10% !important;
    }
</style>
