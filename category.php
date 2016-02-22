<<<<<<< HEAD
<?php 
/********************************
category.php
用来显示分类文章列表的页面。
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

=======
<?php 
/********************************
category.php
用来显示分类文章列表的页面。
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

>>>>>>> 9fbecb7e949ecfe8f0a71fe8a64ec1a79d36ccdc
<?php get_footer(); ?>