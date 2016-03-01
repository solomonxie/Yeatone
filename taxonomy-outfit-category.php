<?php 
/********************************
taxonomy-outdoor-category.php
显示分类文章列表的页面。
********************************/
 ?>
 <?php get_header(); ?>

             <section id="blog-full-width">
                <div class="container-fluid">
                    <div class="row">
<?php get_template_part('sidebar-left-outfits'); ?>
                    <!-- Start 博客列表 -->
                    <div class="col-md-8">
<?php 
// =========Start posts loop==============
    query_posts('post_type=outfits&posts_per_page=20&paged='.get_query_var('paged').'&outfit-category='.get_query_var('outfit-category'));
    if (have_posts()):
        $n = 0; $item_per_row = 4;
        while (have_posts()): the_post(); $n+=1;
// =========Start posts loop============
?>
<?php if ($n==1) {echo '<div class="row">';} ?>
                        <!-- Single Item -->
                        <div class="col-sm-3 col-xs-12">
                            <figure class="wow fadeInLeft portfolio-item">
                                <div class="img-wrapper">
                                    <a target="_blank" href="<?php the_permalink(); ?>"><img src="<?php the_field('thumbnail'); ?>" class="img-responsive" alt="this is a title" ></a>
                                </div>
                                <figcaption>
                                    <h4> <a target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?> </a> </h4>
                                </figcaption>
                            </figure>
                        </div>
                        <!-- //Single Item -->
<?php if ($n==$item_per_row) {echo '</div> <!-- //row -->'; $n=0;} ?>
<?php 
// ==========End pasts loop======
        endwhile; 
// ==========End posts loop======
 ?>
                     </div>

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
                    </div> <!-- //row -->
                </div>
            </section>

<?php if(function_exists('wpdx_paging_nav')) wpdx_paging_nav(); ?>

<?php get_footer(); ?>