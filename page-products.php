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
// =========Start top loop==============
$tax = 'outfit-category';
$terms = get_terms($tax);
$cat_count = ''; // 默认显示所有
// $cat_count = get_field('sub-category-count');
foreach ($terms as $t):
    $cat_id = $t->term_id;
    $cat_name = $t->name;
    $cat_slug = $t->slug;
    $cat_dcri = $t->description;
    $cat_link = get_term_link($t, $tax);
    // 查询此分类下的所有子级分类(包括二级,三级分类等等)
    $sub_terms  = get_term_children($t->term_id, $tax);
    // 只读取一级分类
    if (count($sub_terms) > 0 and $t->parent == '0'):
// =========Start top loop============
?>
            <div class="section" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images-default/mPurpose-background.png);">
                <div class="container">
                    <div class="section-heading">
                        <h1 class="title wow fadeInDown" data-wow-delay=".3s">
                            <!-- <a href="<?php echo $cat_link; ?>"><?php echo $cat_name ?></a> -->
                            <?php echo $cat_name; ?>
                        </h1>
                        <p class="wow fadeInDown" data-wow-delay=".5s"> <?php echo $cat_dcri; ?> </p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="products-slider">
<?php 
// =========Start sub loop==============
        // 只读取本一级分类中的二级分类
        foreach ($sub_terms as $sub_id):
            $st = get_term_by('id', $sub_id, $tax);
            if ($st->parent == $cat_id):
                $st_link = get_term_link($st, $tax);
                echo $st->name;
// =========Start sub loop============
?>
                                <!-- Products Slider Item -->
                                <div class="shop-item">
                                    <!-- Product Image -->
                                    <div class="image"> <a target="_blank" href="<?php echo $st_link; ?>"><img style="max-width: 260px; max-height: 160px;" src="<?php the_field('taxonomy-image', $st); ?>" alt="Thumbnail"></a> </div>
                                    <!-- Product Title -->
                                    <div class="title"> 
                                        <h5 style="text-align: center;"><?php echo $st->name; ?>
                                    </div>
                                    <!-- Buy Button -->
                                    <!-- <div class="actions"> <a href="<?php the_permalink(); ?>" class="btn btn-primary">购买</a> </div> -->
                                </div> <!-- //Products Slider Item -->
<?php 
// ==========End sub loop======
        endif; endforeach; // --结束子目录循环--
    endif;
// ==========End sub loop======
?>
                            </div> <!-- //Slider -->
                        </div>
                    </div> <!-- //row -->
                </div> <!-- //Container -->
            </div> <!-- //Section -->
<?php 
// ==========End top loop======
endforeach;
// ==========End top loop======
?>            

<?php get_footer(); ?>