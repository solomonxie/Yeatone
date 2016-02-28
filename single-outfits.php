<?php 
/********************************
产品单页的模板。
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
        <div class="section">
            <div class="container">
                <div class="row">
                    <!-- Image Column -->
                    <div class="col-sm-6">
                        <div class="portfolio-item">
                            <div class="portfolio-image">
                                <a href="#"><img src="<?php the_field('thumbnail'); ?>" alt="Project Name"></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Image Column -->
                    <!-- Project Info Column -->
                    <div class="portfolio-item-description col-sm-6">
                        <h3>装备细节</h3>
                        <?php the_field('outfit-details'); ?>
                        <p><a target="_blank" href="<?php the_field('order-link'); ?>" class="btn btn-primary">前往购买</a></p>
                    </div>
                    <!-- End Project Info Column -->
                </div>
                <div class="row" style="margin-top: 50px; margin-left: 10px;">
                    <?php the_content(); ?>
                </div>
                <div class="row">
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
        </div>

<?php 
// ==========End Loading======
    endif;
// ==========End Loading======
?>

<?php get_footer(); ?>