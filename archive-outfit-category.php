<?php 
/********************************
category-outfits.php
显示分类文章列表的页面。
********************************/
 ?>
 <?php get_header(); ?>

<?php 
// =========Start category loop==============
// $terms = get_terms('outfit-category');
// foreach ($terms as $t):
//     $cat_name = $t->name;
//     $cat_dcri = $t->description;
//     $cat_link = get_term_link($t, 'outfit-category');
// =========Start category loop============
?>
            <!--
            ==================================================
            Activities Section Start
            ================================================== -->
            <section id="works" class="works">
                <div class="container">
                    <div class="section-heading">
                        <h1 class="title wow fadeInDown" data-wow-delay=".3s">
                            <a href="<?php echo $cat_link; ?>"><?php echo $cat_name ?></a><a href="<?php echo $cat_link; ?>" type="button" class="btn btn-default btn-xs"><i class="ion-ios-home"></i></a> <!-- 显示更多按钮(转向此类产品的分类页) -->
                        </h1>
                        <p class="wow fadeInDown" data-wow-delay=".5s">
                            <?php echo $cat_dcri; ?>
                        </p>
                        <p class="text-center"></p>
                    </div>
                    <div class="row">
    <?php 
    // =========Start sub-posts loop==============
        // query_posts('post_type=outfits&posts_per_page=8&outfit-category='.$t->slug);
        if (have_posts()):
            while (have_posts()): the_post();
    // =========Start sub-posts loop============
    ?>
                        <!-- Start an activity -->
                        <div class="col-sm-4 col-xs-12">
                            <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
                                <div class="img-wrapper">
                                    <img src="<?php the_field('outfit_thumbnail'); ?>" class="img-responsive" alt="this is a title" >
                                    <div class="overlay">
                                        <div class="buttons">
                                            <a rel="gallery" class="fancybox" href="<?php the_field('outfit_thumbnail'); ?>">看大图</a>
                                            <a target="_blank" href="<?php the_permalink(); ?>">查看详细</a>
                                        </div>
                                    </div>
                                </div>
                                <figcaption>
                                    <h4> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h4>
                                    <!-- <p> <?php the_excerpt(); ?> </p> -->
                                </figcaption>
                            </figure>
                        </div>
                        <!-- End an activity -->
    <?php 
    // ==========End sub-posts loop======
            endwhile; 
    // ==========End sub-posts loop======
     ?>
                    </div>
                    <!-- End of row -->
    <?php 
        
        // ---End 输出分页导航---
    // =======End Query=========
        endif; wp_reset_query(); 
    // =======End Query=========
    ?>
                </div>
            </section> <!-- End of Activities -->

<?php 
// ==========End category loop======
// endforeach;
// ==========End category loop======
?>

<?php if(function_exists('wpdx_paging_nav')) wpdx_paging_nav(); ?>

<?php get_footer(); ?>