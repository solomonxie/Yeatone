<?php 
/********************************
活动列表模板。
此模板被调用的前提：在我写的自定义文章类型插件中有详细写。
注意：
- 在archive-$.php中，query_posts()函数中，是不能用posts_per_paper参数的，否则获取不到。
- page-$.php绝对不要与post_type同名，否则会与archive-$.php严重冲突。
  这也就意味着，在page页面中，固定链接需要另外用一个名字。
********************************/
 ?>
<?php get_header(); ?>

            <section id="blog-full-width">
                <div class="container">
                    <div class="row">
<?php get_template_part('sidebar-left-outdoors'); ?>
                            <!-- Start 活动列表 -->
                            <div class="col-md-8">
<?php 
// =========Start Loop==============
$paged = get_query_var('paged');
query_posts('post_type=outdoors&posts_per_page=5&paged='.$paged );
if (have_posts()):
    while (have_posts()): the_post();
// =========Start Loop============
?>
                                <article class="wow fadeInDown">
                                    <div class="blog-post-image">
                                        <img class="img-responsive" src="<?php the_field('thumbnail'); ?>" alt="" />
                                    </div>
                                    <div class="blog-content">
                                        <h2 class="blogpost-title">
                                        <a target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        <div class="blog-meta">
                                            起始日期 : <?php echo get_field('date-start') .' 至 '. get_field('date-end'); ?>
                                            <?php the_tags('标签：',',','') ?>
                                        </div>
                                        <p><?php the_excerpt(); ?></p>
                                        <a target="_blank" href="<?php the_permalink(); ?>" class="btn btn-dafault btn-details">详细了解</a>
                                    </div>
                                </article>
<?php 
// =========End Loop=======
    endwhile; 
// =========End Loop=======
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

                            </div> <!-- End 活动列表 -->
                        </div>
                    </section>

<?php get_footer(); ?>