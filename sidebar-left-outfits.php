<?php 
/***********************************************
    sidebar-left.php
    作为单篇博客的左边栏。
    侧边栏虽小,但有许多比较小而复杂的东西需要做.
    下面是我查阅文献和测试的笔记.
 ***********************************************/

/**********************************************
    普通文章/页面的分类信息
 **********************************************/
// //输出某自定义类型的文章数量
// echo '本博客共有'.wp_count_posts('outfits')->publish.'文章已发布';
// //输出所有普通分类法下所有分类
// foreach (get_terms('category') as $t) { echo $t->name .'<br>'; } 
// //获取某条件的文章
// $posts = get_posts('post_type=outfits&cat=6'); //默认分类法的文章分类
// echo count($posts) .'<br>'; //输出某条件下的分类数量
// //根据条件循环输出文章信息 (注意:括号里不能直接引用get_posts(),否则不能正常显示.)
// foreach ($posts as $po) { the_post(); the_permalink() .'<br>'; }
// //获取分类基本信息
// echo get_cat_name('6'); //根据分类ID获取分类"显示名"
// echo get_cat_ID('极限运动'); //根据分类"显示名"(而不是别名)获取分类ID
// echo get_category('6')->slug; //根据分类ID获取分类的"别名"
// echo get_category_by_slug('exsport')->name; //根据分类"别名"获取分类对象(包括name,ID等)
// echo get_category('6')->count; //获取文章分类下的文章数量
// //另一种方法获取文章分类下的文章数量,参数直接从后台url中复制就可以了
// echo count( get_posts('outfit-category=outfit-hiking&post_type=outfits') ); 
// //输出分类数量 --失败
// echo count( get_the_category() ); 

/**********************************************
    自定义文章类型(Custom Post Type)的分类信息
 **********************************************/
// //输出某分类法下的所有自定义分类名
// foreach (get_terms('outfit-category') as $t) { echo $t->name .'<br>'; }
// //输出某分类法下的所有自定义分类下的文章数
// foreach (get_terms('outfit-category') as $t) { echo $t->count .'<br>'; } 
// //输出某分类法下的所有自定义分类的链接
// foreach (get_terms('outfit-category') as $t) { echo get_term_link($t, 'outfit-category') .'<br>'; } 
// //输出指定文章分类(page/post/custom_post_type)下的所有分类法的别名
// foreach (get_object_taxonomies('outfits', 'names') as $obj) { echo $obj .'<br>'; }
// //获取某条件的文章
// $posts = get_posts('outfit-category=outfit-hiking&post_type=outfits'); //自定义分类法
// echo count($posts) .'<br>'; //输出某条件下的分类数量
// //根据条件循环输出文章信息 (注意:括号里不能直接引用get_posts(),否则不能正常显示.)
// foreach ($posts as $po) { the_post(); the_permalink() .'<br>'; } 
?>
<?php 
    // $post_type = get_field('post_type'); //利用ACF插件获取当前文章类型
    $post_type = 'outfits'; //手动指定当前文章类型
?>

<h1><?php //echo get_the_ID(); ?></h1>

                        <!-- Start Sidebar -->
                        <div class="col-md-3">
                            <div class="sidebar" style="padding-top: 0;">
                                <!-- <div class="categories widget">
                                    <h3 class="widget-head">分类</h3>
                                    <ul>
                                        <li>helloworldhello<span class="badge">10</span></li>
                                    </ul>
                                </div> -->
                                <div class="sidebar-offcanvas">
                        
                                  <div class="list-group">
                                    <!-- <a href="#" class="list-group-item active">Link</a>
                                    <a href="#" class="list-group-item">Link</a> -->
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
    if (count($sub_terms) > 0 and $t->parent == '0'): // 只读取一级分类
        echo '<a href="#" class="list-group-item active">'. $cat_name .'</a>';
        foreach ($sub_terms as $sub_id):
            $st = get_term_by('id', $sub_id, $tax);
            if ($st->parent == $cat_id): //只读取二级分类
                $st_link = get_term_link($st, $tax);
                echo '<a href="#" class="list-group-item">'. $st->name .' <span class="badge">'.$st->count.'</span></a>';
            endif;
        endforeach;
    endif;
endforeach;
?>
                                  </div>
                                </div><!--/.sidebar-offcanvas-->
                                <!-- Sharing QRCode -->
                                <div class="widget text-center">
                                    <h3>微信扫一扫</h3>
                                    <img class="img-responsive" src="<?php the_field('wechat-qrcode', '62'); ?>" alt="">
                                </div> <!-- //Sharing QRCode -->
                            </div>
                        </div>
                        <!-- End Sidebar -->