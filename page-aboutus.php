<?php 
/********************************
page-aboutus.php
特定用来显示“关于我们”的内容。
@page-$??.php，其中??在这里是指在wp后台中，设置某一个页面的静态链接地址和别名为"??"时，
才会调用本页面。如果不在后台设置，这里是不生效的。
********************************/
 ?>
<?php get_header(); ?>

        <!-- 
        ================================================== 
            Company Description Section Start
        ================================================== -->
        <section class="company-description">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft" data-wow-delay=".3s" >
                        <img src="<?php the_field('banner_photo'); ?>" alt="" class="img-responsive">
                    </div>
                    <div class="col-md-6">
                        <div class="block">
                            <h3 class="subtitle wow fadeInUp" data-wow-delay=".3s" data-wow-duration="500ms"><?php the_field('banner_title', '118'); ?></h3>
                            <p  class="wow fadeInUp" data-wow-delay=".5s" data-wow-duration="500ms">
                                <?php the_field('banner_content', '118'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 
        ================================================== 
            Company Feature Section Start
        ================================================== -->
        <section class="about-feature clearfix">
            <div class="container-fluid">
                <div class="row">
                    <div class="block about-feature-1 wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">
                        <h2> <?php the_field('intro_title_1', '118'); ?> </h2>
                        <p> <?php the_field('intro_content_1', '118'); ?> </p>
                    </div>
                    <div class="block about-feature-2 wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">
                        <h2 class="item_title"> <?php the_field('intro_title_2', '118'); ?> </h2>
                        <p> <?php the_field('intro_content_1', '118'); ?> </p>
                    </div>
                    <div class="block about-feature-3 wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".7s">
                        <h2 class="item_title"> <?php the_field('intro_title_3', '118'); ?> </h2>
                        <p> <?php the_field('intro_content_3', '118'); ?> </p>
                    </div>
                </div>
            </div>
        </section>

<?php get_template_part('part-team'); ?>
<?php get_template_part('part-clients'); ?>
<?php get_footer(); ?>