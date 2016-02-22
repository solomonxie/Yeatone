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
            <div class="section" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images-default/mPurpose-background.png);">
                <div class="container">
                    <div class="section-heading">
                        <h1 class="title wow fadeInDown" data-wow-delay=".3s">
                            <!-- <a href="<?php echo $cat_link; ?>"><?php echo $cat_name ?></a> -->
                            <?php echo $cat_name ?>
                        </h1>
                        <p class="wow fadeInDown" data-wow-delay=".5s"> <?php echo $cat_dcri; ?> </p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="products-slider">
<?php 
// =========Start sub-posts loop==============
    query_posts('post_type=outfits&posts_per_page='.$cat_count.'&outfit-category='.$cat_slug);
    while (have_posts()): the_post();
        $thumbnail = get_field('thumbnail');
        if ($thumbnail == '') $thumbnail = '';
// =========Start sub-posts loop============
?>
                                <!-- Products Slider Item -->
                                <div class="shop-item">
                                    <!-- Product Image -->
                                    <div class="image"> <a target="_blank" href="<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images-default/product1.jpg" alt="Product Name"></a> </div>
                                    <!-- Product Title -->
                                    <div class="title"> <h5 style="text-align: center;"><?php the_title(); ?></h5></div>
                                    <!-- Buy Button -->
                                    <!-- <div class="actions"> <a href="<?php the_permalink(); ?>" class="btn btn-primary">购买</a> </div> -->
                                </div> <!-- //Products Slider Item -->
<?php 
// ==========End sub-posts loop======
        endwhile; wp_reset_query(); 
// ==========End sub-posts loop======
 ?>
                            </div> <!-- //Slider -->
                        </div>
                    </div> <!-- //row -->
                </div> <!-- //Container -->
            </div> <!-- //Section -->
<?php 
// ==========End category loop======
endforeach;
// ==========End category loop======
?>            

<?php get_footer(); ?>