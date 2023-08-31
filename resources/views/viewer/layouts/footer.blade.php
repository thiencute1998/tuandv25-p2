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
        </div><!-- #second .widget-area -->


        <div id="footer-third" class="footer-widgets-box">
            <div id="custom_html-4" class="widget_text footer-widget widget_custom_html">
                <div class="footer-widget-top"><h4>Đăng ký kênh youtube</h4></div>
                <div class="footer-widget-container">
                    <div class="textwidget custom-html-widget">
                        <script src="https://apis.google.com/js/platform.js"></script>

                        <div class="g-ytsubscribe" data-channelid="UCUptnRy9DiV5brpsyJQFORg" data-layout="default"
                             data-count="default"></div>
                    </div>
                </div>
            </div>
            <div id="custom_html-5" class="widget_text footer-widget widget_custom_html" style="margin-top: 10px;">
                <div class="footer-widget-top"><h4>Nhận bản tin</h4></div>
                <div class="footer-widget-container">
                    <div style="display: flex">
                        <input class="email-input" type="text" placeholder="Nhập email nhận tin" style="border-radius: inherit; height: 39px;">
                        <span>
                            <button type="button" class="btn em-sign-up" style="padding: 10px;     color: #FFF;
    background-color: #32c5d2;
    border-color: #32c5d2;">Đăng ký</button>
                        </span>
                    </div>
                </div>
            </div>
            <!-- .widget /-->
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

        </div><!-- #third .widget-area -->


    </div><!-- #footer-widget-area -->
    <div class="clear"></div>
    <div id="emailModal" class="em pixelbones em-calendar-preview em-modal em-cal-date-content">
        <div class="em-modal-popup">
            <header>
                <a class="em-close-modal"></a><!-- close modal -->
                <div class="em-modal-title">
                    ĐĂNG KÝ NHẬN TIN
                </div>
            </header>
            <div>
                <div class="em-item-info">
                    <div class="em-item-email">
                        <div class="em-item">
                            <span class="em-address">Đăng ký nhận tin <b>thành công</b>.</span>
                        </div>
                        <div class="em-item" style="margin-top: 10px;">
                            <span class="em-address">Chúng tôi sẽ gửi bài viết mới nhất và Lời chúa hằng ngày qua email của bạn.</span>
                        </div>
                    </div>
                </div>
            </div><!-- content -->
        </div><!-- modal -->
    </div>
</footer><!-- .Footer /-->
<style type="text/css">
    .fluid-width-video-wrapper {
        padding-top: 10% !important;
    }
    .em-item-email {
        padding: 15px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $('.em-sign-up').on('click', function() {
            let email = $('.email-input').val();
            if (email) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('sign-up-email')}}",
                    type: "post",
                    data: {
                        email: $('.email-input').val()
                    },
                    success: function(res){
                        $('#emailModal').addClass('active');
                        var emailPopup = $('.em-modal-popup');
                        $(emailPopup[1]).addClass('active');
                    }
                })
            }

        })
    })
</script>
