<?php 
/**********************************
single.php
单独文章模板。显示单独的一篇文章时被调用。
对于这个以及其他的请求模板，如果模板不存在会使用 index.php。
注意区分，它用来显示“文章”，而不是“页面”。文章和页面是wp的两种截然不同的内容类型。
***********************************/
 ?>
<?php get_header(); ?>
<?php while (have_posts()): the_post(); ?>

            <section class="single-post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="post-img">
                                <img class="img-responsive" alt="Featured image of this post" src="<?php the_field('thumbnail'); ?>">
                            </div>
                            <!-- Start Post -->
                            <div class="post-content">
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

<?php endwhile; wp_reset_query(); ?>
<?php get_footer(); ?>
