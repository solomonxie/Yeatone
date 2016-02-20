<?php 
/********************************
活动单页的模板。
此模板被调用的前提：
- 注册自定义文章类型时，注册名称必须和这个single-$中的$一致。
注意：
- 如果不生效，则在后台的"固定链接"设置中如下操作：先选默认链接类型，保存。再选文章名链接类型，保存。完成。
********************************/
?>

<?php get_header(); ?>

<?php 
// =========Start Loading==============
    if (have_posts()): the_post();
// =========Start Loading============
?>

            <section class="single-post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="post-img">
                                <img class="img-responsive" alt="Featured image of this post" src="<?php the_field('thumbnail'); ?>">
                            </div>
                            <!-- Start Post -->
                            <div class="post-content">
                                <p>
                                    <span>时间：<?php the_time('Y-m-d'); ?></span>
                                    <span>领队：<?php the_field('leader'); ?></span>
                                    <span>地点：<?php the_field('location'); ?></span>
                                    <span><?php the_tags('', ','); ?></span>
                                </p>
                                <?php the_content(); ?>
                            </div>
                            <!-- End Post -->
                            <ul class="social-share">
                                <h4>分享这篇文章</h4>
                                <li> <a href="#" class="Facebook"> <i class="ion-social-facebook"></i> </a> </li>
                                <li> <a href="#" class="Twitter"> <i class="ion-social-twitter"></i> </a> </li>
                                <li> <a href="#" class="Linkedin"> <i class="ion-social-linkedin"></i> </a> </li>
                                <li> <a href="#" class="Google Plus"> <i class="ion-social-googleplus"></i> </a> </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

<?php 
// ==========End Loading======
    endif;
// ==========End Loading======
?>

<?php get_footer(); ?>