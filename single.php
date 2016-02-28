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
                        </div>
                        <!-- Social Share -->
                        <div class="col-md-12">
                            <h4>分享:</h4>
                            <!-- JiaThis Button BEGIN -->
                            <div class="jiathis_style_32x32">
                                <a class="jiathis_button_weixin"></a>
                                <a class="jiathis_button_tsina"></a>
                                <a class="jiathis_button_tqq"></a>
                                <a class="jiathis_button_qzone"></a>
                                <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
                                <!-- <a class="jiathis_counter_style"></a> -->
                            </div>
                            <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
                            <!-- JiaThis Button END -->
                        </div> <!-- //Social Share -->
                    </div>
                </div>
            </section>

<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>
