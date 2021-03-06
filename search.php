<?php 
/********************************
search.php
用来显示搜索结果的页面。
几乎与博客页一样,除了不能用query_posts()以外.
在HTML表单中使用(搜索)的方法:
- <form>的action应该提交给网站主页
- <input>的name应为"s"
示例:
<form action="<?php bloginfo('home'); ?>" method="get">
    <input type="text" name='s'>
    <button type="button">搜索</button>
</form>
获取方法:
1. get_query_var('s'); //这个是专门为WP_Query()准备的获取方法,自定义表单值获取不到.预定有s等
2. $_GET['name'] 或 $_POST['name'], 用于获取get方法或post方法的表单值.
********************************/
 ?>
<?php get_header(); ?>

            <section id="blog-full-width">
                <div class="container">
                    <div class="row">

<?php
    $sidebar = $_GET['sidebar'];
    if (!$sidebar) $sidebar = $_POST['sidebar'];
    get_template_part($sidebar);
 ?>

                            <!-- Start 博客列表 -->
                            <div class="col-md-8">
<?php 
// =========Start Loop==============
while (have_posts()): the_post();
// =========Start Loop============
?>
								<article class="wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">
                                    <div class="blog-post-image">
                                        <img class="img-responsive" src="<?php the_field('thumbnail'); ?>" alt="" />
                                    </div>
                                    <div class="blog-content">
                                        <h2 class="blogpost-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        <div class="blog-meta">
                                            <?php the_time('Y/m/d'); ?>
                                            by <?php the_author(); ?>
                                            <?php the_tags('标签：',',','') ?>
                                        </div>
                                        <p><?php the_excerpt(); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="btn btn-dafault btn-details">继续阅读</a>
                                    </div>
                                </article>
<?php 
// =========End Loop=======
endwhile;
// =========End Loop=======
?>
                            </div>
                            <!-- End 博客列表 -->
                        </div>
                    </section>

<?php get_footer(); ?>