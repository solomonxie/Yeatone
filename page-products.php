<?php 
/********************************
产品列表模板。
此模板被调用的前提：在我写的自定义文章类型插件中有详细写。
注意：
- 在archive-$.php中，query_posts()函数中，是不能用posts_per_paper参数的，否则获取不到。
- page-$.php绝对不要与post_type同名，否则会与archive-$.php严重冲突。
  这也就意味着，在page页面中，固定链接需要另外用一个名字。

多重查询(Multiple query_posts)的使用方法：
- query_post()的参数最简单的方法就是，直接到后台打开相应的界面，复制url中的相应参数
  如想要某种自定义文章类型的某种分类的文章，
  那么url中就会有如"post_type_outfits&category_name=ski"这样的。直接复制过来就能查到了。
- 如果是手动指定页面读取哪几个分类，那么category_name参数来指定很方便
  但是如果需要自动获取的话，那么用cat=[分类ID]这样的会比较合适。
  分类ID其实就是后台url中的tag_ID，虽然tag_ID在这里也能当为查询条件，但是结果确实得不到想要的。
********************************/
 ?>
 <?php get_header(); ?>

            <div class="section" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images-default/mPurpose-background.png);">
                <div class="container">
                    <div class="section-heading">
                        <h1 class="title wow fadeInDown" data-wow-delay=".3s"> <?php echo $cat_name ?> </h1>
                        <p class="wow fadeInDown" data-wow-delay=".5s"> <?php echo $cat_dcri; ?> </p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="products-slider">
                                <!-- Products Slider Item -->
                                <div class="shop-item">
                                    <!-- Product Image -->
                                    <div class="image"> <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images-default/product1.jpg" alt="Product Name"></a> </div>
                                    <!-- Product Title -->
                                    <div class="title"> <h5 style="text-align: center;">Lorem ipsum dolor</a></div>
                                    <!-- Buy Button -->
                                    <div class="actions"> <a href="page-product-details.html" class="btn btn-primary">购买</a> </div>
                                </div> <!-- //Products Slider Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
















<?php 
// =========Start category loop==============
$terms = get_terms('outfit-category');
$cat_count = ''; // 默认显示所有
// $cat_count = get_field('sub-category-count');
foreach ($terms as $t):
    $cat_name = $t->name;
    $cat_slug = $t->slug;
    $cat_dcri = $t->description;
    $cat_link = get_term_link($t, 'outfit-category');
// =========Start category loop============
?>
            <!--
            ==================================================
            Activities Section Start
            ================================================== -->
            <section id="works" class="works">
                <div class="container">
                    <div class="section-heading">
                        <h1 class="title wow fadeInDown" data-wow-delay=".3s">
                            <a href="<?php echo $cat_link; ?>"><?php echo $cat_name ?></a><a href="<?php echo $cat_link; ?>" type="button" class="btn btn-default btn-xs"><i class="ion-ios-home"></i></a> <!-- 显示更多按钮(转向此类产品的分类页) -->
                        </h1>
                        <p class="wow fadeInDown" data-wow-delay=".5s">
                            <?php echo $cat_dcri; ?>
                        </p>
                        <p class="text-center"></p>
                    </div>
                    <div class="row">
    <?php 
    // =========Start sub-posts loop==============
        query_posts('post_type=outfits&posts_per_page='.$cat_count.'&outfit-category='.$cat_slug);
        if (have_posts()):
            while (have_posts()): the_post();
                $thumbnail = get_field('thumbnail');
                if ($thumbnail == '') $thumbnail = '';
    // =========Start sub-posts loop============
    ?>
                        <!-- Start an activity -->
                        <div class="col-sm-4 col-xs-12">
                            <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
                                <div class="img-wrapper">
                                    <img style="max-height: 210px;" src="<?php echo $thumbnail; ?>" class="img-responsive" alt="portfolio" >
                                    <div class="overlay">
                                        <div class="buttons">
                                            <a rel="gallery" class="fancybox" href="<?php echo $thumbnail; ?>">看大图</a>
                                            <a href="<?php the_permalink(); ?>">查看详细</a>
                                        </div>
                                    </div>
                                </div>
                                <figcaption>
	                                <h4> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h4>
	                                <!-- <p> <?php the_excerpt(); ?> </p> -->
                                </figcaption>
                            </figure>
                        </div>
                        <!-- End an activity -->
    <?php 
    // ==========End sub-posts loop======
            endwhile; 
    // ==========End sub-posts loop======
     ?>
                    </div>
                    <!-- End of row -->
    <?php 
        
        // ---End 输出分页导航---
    // =======End Query=========
        endif; wp_reset_query(); 
    // =======End Query=========
    ?>
                </div>
            </section> <!-- End of Activities -->

<?php 
// ==========End category loop======
endforeach;
// ==========End category loop======
?>

<?php if(function_exists('wpdx_paging_nav')) wpdx_paging_nav(); ?>

<?php get_footer(); ?>