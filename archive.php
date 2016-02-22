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
    while (have_posts()): the_post();
// =========Start Loop============
?>
                    <div class="row">
                        <div class="col-md-12">
                            <article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
                                <div class="blog-post-image">
                                    <a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php the_field('thumbnail'); ?>" alt="" /></a>
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
                                    <a href="<?php the_permalink(); ?>" class="btn btn-dafault btn-details">查看详细</a>
                                </div>
                            </article>
                        </div>
                    </div>
<?php 
// ==========End Loop======
    endwhile; wp_reset_query(); 
// ==========End Loop======
?>                            
                </div>
            </section>

<?php get_footer(); ?>