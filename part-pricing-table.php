        <!-- Pricing Table -->
        <div class="section">
            <div class="container">
                <h2 class="subtitle text-left wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s"><?php the_field('pricing-table-title', '95') ?></h2>
                <div class="row">
                    <!-- Pricing Plans Wrapper -->
                    <div class="pricing-wrapper col-md-12">
<?php 
// ***********开始循环***************
$orderby = ''; //按什么排序?
query_posts('post_type=services&posts_per_page=4&orderby='.$orderby);
if (have_posts()):
    $anime_delay = 0.6;
    while (have_posts()): the_post();
        $anime_delay += 0.3;
        $price_type = get_field('is-promote');
// ***********开始循环***************
?>
                        <!-- Pricing Plan -->
                        <div class="pricing-plan <?php echo $price_type; ?> wow fadeInDown" data-wow-duration="500ms" data-wow-delay="<?php echo $anime_delay; ?>s">
                            <?php if (get_field('service-ribbon-title')): ?>
                            <!-- Pricing Plan Ribbon -->
                            <div class="ribbon-wrapper">
                                <div class="price-ribbon <?php the_field('service-ribbon-color'); ?>"><?php the_field('service-ribbon-title'); ?></div>
                            </div>
                            <?php endif; ?>
                            <h2 class="pricing-plan-title"><?php the_title(); ?></h2>
                            <!-- <p class="pricing-plan-price"><?php the_field('service-price'); ?><span><?php the_field('service-price-unit') ?></span></p> -->
                            <img class="img-responsive" src="<?php the_field('service-img'); ?>">
                            <!-- Pricing Plan Features -->
                            <ul class="pricing-plan-features"> <?php the_field('service-excerpt') ?> </ul>
                            <a target="_blank" href="<?php the_permalink(); ?>" class="btn btn-primary"><?php the_field('service-btn-title') ?></a>
                        </div>
                        <!-- End Pricing Plan -->
<?php 
// **********结束循环***********
    endwhile; endif; wp_reset_query();
// **********结束循环***********
?>
                    </div>
                    <!-- End Pricing Plans Wrapper -->
                </div>
            </div>
        </div>
        <!-- End Pricing Table -->