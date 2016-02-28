<?php 
/********************************
taxonomy-outdoor-category.php
显示分类文章列表的页面。
********************************/
 ?>
 <?php get_header(); ?>

<!-- 
        ================================================== 
            Service Page Section  Start
        ================================================== -->
        <div class="section">
            <div class="container">
<?php 
// =========Start posts loop==============
    // query_posts('post_type=outfits&posts_per_page=8&outfit-category='.$t->slug);
    if (have_posts()):
        while (have_posts()): the_post();
// =========Start posts loop============
?>
                <div class="row service-wrapper-row">
                    <div class="col-sm-4">
                        <div class="service-image">
                            <a target="_blank" rel="gallery" class="fancybox" href="<?php the_permalink(); ?>"> <img src="<?php the_field('thumbnail'); ?>" alt="Service Name"> </a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h3> <a target="_blank" rel="gallery" class="fancybox" href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h3>
                        <p> 简介:<?php the_excerpt(); ?> </p>
                        <a target="_blank" href="<?php the_field('order-link'); ?>" class="btn btn-primary">购买</a> 或 
                        <a target="_blank" href="<?php the_permalink(); ?>" class="">查看详细</a>
                    </div>
                </div>
<?php 
// ==========End pasts loop======
        endwhile; 
// ==========End posts loop======
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
endif; //wp_reset_query(); 
// =======End Query=========
 ?>
            </div>
        </div>

<?php if(function_exists('wpdx_paging_nav')) wpdx_paging_nav(); ?>

<?php get_footer(); ?>