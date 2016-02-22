<?php 
/********************************
page-blog.php
用来显示博客文章列表的页面。
被调用前提：
- 无所谓wp后台静态页面设置中是否设置了“文章列表页”，这个是与之独立的。
- "页面"中必须有对应的博客页面，且url为此page-$.php中的$。
- 但是wp后台静态页面，一定不能指定为本url为文章列表页，否则就冲突了。
另外：
wp后台默认的"文章列表页"中，是无法正常调用各种自定义栏目的，诸多限制。
所以独立出来一个页面是很方便的。
********************************/
 ?>
<?php get_header(); ?>

            <section id="blog-full-width">
                <div class="container">
                    <div class="row">
<?php get_template_part('sidebar-left-blog'); ?>
                            <!-- Start 博客列表 -->
                            <div class="col-md-8">
<?php 
// =========Start Loop==============
// global $paged;
$paged = get_query_var('paged');
query_posts('post_type=post&posts_per_page=5&paged='.$paged );
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
                                            <?php the_time('Y/m/d'); ?>
                                            by <?php the_author(); ?>
                                            <?php the_tags('标签：',',','') ?>
                                        </div>
                                        <p><?php the_excerpt(); ?></p>
                                        <a target="_blank" href="<?php the_permalink(); ?>" class="btn btn-dafault btn-details">继续阅读</a>
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

                            </div> <!-- End 博客列表 -->
                        </div>
                    </section>

<?php get_footer(); ?>