<?php 
/***************************
front-page.php
当这个文件存在时，无论wp后台怎么改变首页，都优先使用这个页面为首页
***************************/
 ?>
<?php get_header(); ?>
<?php 
    /*设定默认图片及文字*/
    $bg_img = get_field('bg_img');
    $corp_intro_img = get_field('corp_intro_img');
 ?>

		<!--
        ==================================================
        Slider Section Start
        ================================================== -->
        <section id="hero-area" style="background: url('<?php echo $bg_img; ?>') no-repeat 50%;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="block wow fadeInUp" data-wow-delay=".3s">
                            <!-- Slider -->
                            <section class="cd-intro">
                                <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s" >
                                <span><?php the_field('slider_title'); ?></span><br>
                                <span class="cd-words-wrapper">
                                    <b class="is-visible"><?php the_field('subtitle_1'); ?></b>
                                    <b><?php the_field('subtitle_2'); ?></b>
                                    <b><?php the_field('subtitle_3'); ?></b>
                                </span>
                                </h1>
                                </section> <!-- cd-intro -->
                                <!-- /.slider -->
                                <h2 class="wow fadeInUp animated" data-wow-delay=".6s" >
                                    <?php the_field('intro'); ?>
                                </h2>
                                <button class="btn-lines dark light wow fadeInUp animated btn btn-default btn-green" data-section="#works" data-wow-delay=".9s" data-toggle="modal" data-target="#contact"><?php the_field('banner_btn'); ?></button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section><!--/#main-slider-->
            <!--
            ==================================================
            Slider Section Start
            ================================================== -->
            <section id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="block wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="500ms">
                                <h2> <?php the_field('corp_intro_title'); ?> </h2>
                                <?php the_field('corp_intro_content'); ?>
                            </div>
                            
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="block wow fadeInRight" data-wow-delay=".3s" data-wow-duration="500ms">
                                <img src="<?php echo $corp_intro_img; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section> <!-- /#about -->
            <!--
            ==================================================
            Feature Section Start
            ================================================== -->
            <section id="feature">
                <div class="container">
                    <div class="section-heading">
                        <h1 class="title wow fadeInDown" data-wow-delay=".3s"><?php the_field('feature_title'); ?></h1>
                        <p class="wow fadeInDown" data-wow-delay=".5s">
                            <?php the_field('feature_intro'); ?>
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <i class="<?php the_field('feature_icon_code_1'); ?>"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php the_field('feature_title_1'); ?></h4>
                                    <p><?php the_field('feature_content_1'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="600ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <i class="<?php the_field('feature_icon_code_2'); ?>"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php the_field('feature_title_2'); ?></h4>
                                    <p><?php the_field('feature_content_2'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="900ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <i class="<?php the_field('feature_icon_code_3'); ?>"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php the_field('feature_title_3'); ?></h4>
                                    <p><?php the_field('feature_content_3'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> <!-- /#feature -->

<?php get_template_part('part-team'); ?>
<?php get_template_part('part-clients'); ?>
<?php //get_template_part('part-outfit-types'); ?>
<?php get_footer(); ?>