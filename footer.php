		<!--
        ==================================================
        Call To Action Section Start
        ================================================== -->
        <section id="call-to-action">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">你觉得怎么样 ?</h1>
                            <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis,</br>possimus commodi, fugiat magnam temporibus vero magni recusandae? Dolore, maxime praesentium.</p>
                            <a href="<?php bloginfo('url'); ?>/contactus/" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">联系我们吧</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>

        <!--
        ==================================================
        Footer Section Start
        ================================================== -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-footer col-md-3 col-xs-6">
                        <h3>我们近期的视频</h3>
                        <div class="portfolio-item">
                            <div class="portfolio-image">
                                <a href="page-portfolio-item.html"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images-default/video.jpg" alt="Project Name"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-footer col-md-3 col-xs-6">
                        <h3>导航</h3>
                        <ul class="no-list-style footer-navigate-section">
                            <li><a href="<?php the_permalink(118); ?>"><?php echo get_the_title(118); ?></a></li> <!-- 关于我们 -->
                            <li><a href="<?php the_permalink(65); ?>"><?php echo get_the_title(65); ?></a></li> <!-- 博客 -->
                            <li><a href="<?php the_permalink(195); ?>"><?php echo get_the_title(195); ?></a></li> <!-- 户外活动 -->
                            <li><a href="<?php the_permalink(95); ?>"><?php echo get_the_title(95); ?></a></li> <!-- 私人定制 -->
                            <li><a href="<?php the_permalink(174); ?>"><?php echo get_the_title(174); ?></a></li> <!-- 户外装备 -->
                            <li><a href="#">热门问答</a></li>
                        </ul>
                    </div>
                    
                    <div class="col-footer col-md-4 col-xs-6">
                        <h3>联系我们</h3>
                        <p class="contact-us-details">
                            <b>地址:</b> 北京市海淀区中关村三街101号3单元2楼2010室<br/>
                            <b>电话:</b> +44 123 654321<br/>
                            <b>传真:</b> +44 123 654321<br/>
                            <b>邮箱:</b> <a href="mailto:getintoutch@qq.com">getintoutch@qq.com</a>
                        </p>
                    </div>
                    <div class="col-footer col-md-2 col-xs-6">
                        <h3>与我们交流</h3>
                        <ul class="footer-stay-connected no-list-style">
                            <li><a href="#" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images-default/social-twitter.png);"></a></li>
                            <li><a href="#" style="margin-left: 7px;width: 100px;height: 100px; background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images-default/wechat-qrcode.png);"></a></li>
                            <li><a href="#" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images-default/social-facebook.png);"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-copyright">&copy; 2016 意动户外. All rights reserved.</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //. END of footer -->
                
        <!-- Template Javascript Files
        ================================================== -->
        <!-- modernizr js -->
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/vendor/modernizr-2.6.2.min.js"></script>
        <!-- jquery -->
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.min.js"></script>
        <!-- owl carouserl js -->
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
        <!-- bootstrap js -->
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
        <script> $(function () {$('[data-toggle="popover"]').popover() }) </script>
        <!-- wow js -->
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/wow.min.js"></script>
        <!-- slider js -->
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/slider.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.fancybox.js"></script>
        <!-- template main js -->
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/main.js"></script>
    </body>
</html>