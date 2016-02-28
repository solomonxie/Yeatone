<?php 
/********************************
taxonomy-outdoor-category.php
显示分类文章列表的页面。
********************************/
 ?>
 <?php get_header(); ?>

            <!--
            ==================================================
            Activities Section Start
            ================================================== -->
            <section id="works" class="works">
                <div class="container">
                    <div class="section-heading">
                        <p class="wow fadeInDown" data-wow-delay=".5s"> <?php echo $cat_dcri; ?> </p>
                    </div>
                    <div class="row">
<?php 
// =========Start posts loop==============
    // query_posts('post_type=outfits&posts_per_page=8&outfit-category='.$t->slug);
    if (have_posts()):
        while (have_posts()): the_post();
// =========Start posts loop============
?>
                        <!-- Start an activity -->
                        <div class="col-sm-4 col-xs-12">
                            <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
                                <div class="img-wrapper">
                                    <img src="<?php the_field('thumbnail'); ?>" class="img-responsive" alt="this is a title" >
                                    <div class="overlay">
                                        <div class="buttons">
                                            <a rel="gallery" class="fancybox" href="<?php the_field('thumbnail'); ?>">看大图</a>
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
// ==========End posts loop======
        endwhile; 
// ==========End posts loop======
 ?>
                    </div>
                    <!-- End of row -->
<?php 
    // ---Start 输出分页导航---
    if (function_exists('wp_bs_pagination')) { 
        wp_bs_pagination(); //网上摘抄函数做的插件,专为Bootstrap样式.
    } else if (function_exists('wp_pagenavi')){
        wp_pagenavi(); //WP-PageNavi插件
    } else {
        next_posts_link('&laquo; 上一页'); echo '&nbsp;';
        previous_posts_link('下一页 &raquo;');
    }
    // ---End 输出分页导航---
// =======End Query=========
    endif; wp_reset_query(); 
// =======End Query=========
?>
                </div>
            </section> <!-- End of Activities -->

<?php if(function_exists('wpdx_paging_nav')) wpdx_paging_nav(); ?>

<?php get_footer(); ?>