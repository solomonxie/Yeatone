		<!--
        ==================================================
        Call To Action Section Start
        ================================================== -->
        <section id="call-to-action">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms"><?php the_field('footer-banner-title', '46'); ?></h1>
                            <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">
                                <?php the_field('footer-banner-content', '46'); ?>
                            </p>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms" data-toggle="modal" data-target="#contact"><?php the_field('footer-banner-link-text', '46'); ?></button>
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
                    <!-- Video Colum -->
                    <div class="col-footer col-md-3 col-xs-6">
                        <h3>我们近期的视频</h3>
                        <div class="portfolio-item">
                            <div class="portfolio-image">
                                <a href="<?php the_field('footer-video-link', '46'); ?>"><img src="<?php the_field('footer-video-thumbnail', '46'); ?>" alt="Footer Video"></a>
                            </div>
                        </div>
                    </div> <!-- //Video Colum -->
                    <!-- Foot Navigation Colum -->
                    <div class="col-footer col-md-3 col-xs-6">
                        <h3>导航</h3>
                        <ul class="no-list-style footer-navigate-section">
                            <li><a href="<?php the_permalink(118); ?>"><?php echo get_the_title(118); ?></a></li> <!-- 关于我们 -->
                            <li><a href="<?php the_permalink(65); ?>"><?php echo get_the_title(65); ?></a></li> <!-- 博客 -->
                            <li><a href="<?php the_permalink(195); ?>"><?php echo get_the_title(195); ?></a></li> <!-- 户外活动 -->
                            <li><a href="<?php the_permalink(95); ?>"><?php echo get_the_title(95); ?></a></li> <!-- 私人定制 -->
                            <li><a href="<?php the_permalink(174); ?>"><?php echo get_the_title(174); ?></a></li> <!-- 户外装备 -->
                            <!-- <li><a href="#">热门问答</a></li> -->
                        </ul>
                    </div> <!-- //Foot Navigation Colum -->
                    <!-- Contact info -->
                    <div class="col-footer col-md-4 col-xs-6">
                        <h3>联系我们</h3>
                        <p class="contact-us-details">
                            <b>地址:</b> <?php the_field('contactus-address', '62'); ?><br/>
                            <b>电话:</b> <?php the_field('contactus-phone', '62'); ?><br/>
                            <b>传真:</b> <?php the_field('contactus-fax', '62'); ?><br/>
                            <b>邮箱:</b> <?php the_field('contactus-email', '62'); ?>
                        </p>
                    </div> <!-- //Contact info -->
                    <!-- Stay connected colum -->
                    <div class="col-footer col-md-2 col-xs-6">
                        <h3>与我们交流</h3>
                        <ul class="footer-stay-connected no-list-style">
                            <!-- <li><a href="#" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images-default/social-google.png);"></a></li> -->
                            <li><h5>关注微信公众平台</h5><img style="height: 100px; width: 100px;" src="<?php the_field('wechat-qrcode', '62'); ?>" alt="Wechat QRCode"></li>
                        </ul>
                    </div>
                </div> <!-- //Stay connected colum -->
                <!-- Copyright -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-copyright"><?php the_field('footer-copyright', '46'); ?></div>
                    </div>
                </div> <!-- //Copyright -->
            </div>
        </div>
        <!-- //. END of footer -->

        <!-- Modal: Contact -->
        <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">联系我们</h4>
              </div>
              <div class="modal-body">
                <?php the_field('contactus-form', '62'); ?>
              </div>
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-primary">提交</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
              </div> -->
            </div>
          </div>
        </div> <!-- //Modal: Contact -->
                
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

        <!-- mPurpose  -->
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/mPurpose/jquery.sequence-min.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/mPurpose/main-menu.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/mPurpose/template.js"></script>
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/mPurpose/jquery.bxslider.js"></script>
    </body>
</html>