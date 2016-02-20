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
			<section class="portfolio-single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portfolio-single-img">
                                <img class="img-responsive" alt="" src="<?php the_field('thumbnail'); ?>">
                            </div>
                            <div class="portfolio-content">
                                <?php the_content(); ?>
                            </div>
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