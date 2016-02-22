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

<?php 
// ==========End Loading======
    endif;
// ==========End Loading======
?>

<?php get_footer(); ?>