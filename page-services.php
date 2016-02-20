<?php 
/********************************
page-services.php

********************************/
 ?>
 <?php get_header(); ?>

        <!-- 
        ================================================== 
            Service Page Section  Start
        ================================================== -->
        <!-- <section id="service-page" class="pages service-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="block">
                            <h2 class="subtitle wow fadeInUp animated" data-wow-delay=".3s" data-wow-duration="500ms"><?php the_field('service_intro_title'); ?></h2>
                            <p class="subtitle-des wow fadeInUp animated" data-wow-delay=".5s" data-wow-duration="500ms"><?php the_field('service_intro_subtitle'); ?></p>
                            <div class="row service-parts">
                                <div class="col-md-6">
                                    <div class="block wow fadeInUp animated" data-wow-duration="400ms" data-wow-delay="600ms">
                                        <i class="<?php the_field('service_icon_code_1'); ?>"></i>
                                        <h4><?php the_field('service_item_title_1'); ?></h4>
                                        <p><?php the_field('service_item_content_1'); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="block wow fadeInUp animated" data-wow-duration="400ms" data-wow-delay="800ms">
                                        <i class="<?php the_field('service_icon_code_2'); ?>"></i>
                                        <h4><?php the_field('service_item_title_2'); ?></h4>
                                        <p><?php the_field('service_item_content_2'); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="block wow fadeInUp animated" data-wow-duration="400ms" data-wow-delay="1s">
                                        <i class="<?php the_field('service_icon_code_3'); ?>"></i>
                                        <h4><?php the_field('service_item_title_3'); ?></h4>
                                        <p><?php the_field('service_item_content_3'); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="block wow fadeInUp animated" data-wow-duration="400ms" data-wow-delay="1.1s">
                                        <i class="<?php the_field('service_icon_code_4'); ?>"></i>
                                        <h4><?php the_field('service_item_title_4'); ?></h4>
                                        <p><?php the_field('service_item_content_4'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="block">
                            <img class="img-responsive" src="<?php the_field('team_photo'); ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

<?php get_template_part('part-pricing-table'); ?>

<?php get_template_part('part-pricing-list'); ?>

<?php the_content(); ?>

<?php get_footer(); ?>