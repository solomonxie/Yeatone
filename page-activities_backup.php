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
<?php 
// =========Start Loop==============
query_posts( 'post_type=outdoors&posts_per_page=5&paged='.get_query_var('paged') );
    while (have_posts()): the_post();
// =========Start Loop============
?>
                    <div class="row">
                        <div class="col-md-12">
                            <article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
                                <div class="blog-post-image">
                                    <img class="img-responsive" src="<?php the_field('thumbnail'); ?>" alt="" />
                                </div>
                                <div class="blog-content">
                                    <h2 class="blogpost-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="blog-meta">
                                        <span>时间：<?php the_time('Y-m-d'); ?></span>
                                        <span>领队：<?php the_field('leader'); ?></span>
                                        <span>地点：<?php the_field('location'); ?></span>
                                        <?php the_tags('', ','); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-dafault btn-details">查看活动详细</a>
                                </div>
                            </article>
                        </div>
                    </div>
<?php 
// ==========End Loop======
    endwhile; 
// ==========End Loop======
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
    wp_reset_query(); 
?>                            
                </div>
            </section>

<?php get_footer(); ?>