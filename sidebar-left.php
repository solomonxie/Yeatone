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
<h1><?php //echo get_the_ID(); ?></h1>

                        <!-- Start Sidebar -->
                        <div class="col-md-4">
                            <div class="sidebar">
                                <div class="search widget">
                                    <form action="<?php bloginfo('url'); ?>" method="get" class="searchform" role="search">
                                        <div class="input-group">
                                            <input type="text" name='s' class="form-control" placeholder="搜索文章...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"> <i class="ion-search"></i> </button>
                                            </span>
                                            </div><!-- /input-group -->
                                        </form>
                                    </div>
                                    <div class="author widget">
                                        <img class="img-responsive" src="<?php the_field('left_editor_bg', get_the_ID()); ?>">
                                        <div class="author-body text-center">
                                            <div class="author-img">
                                                <img src="<?php the_field('left_editor_photo', get_the_ID()); ?>">
                                            </div>
                                            <div class="author-bio">
                                                <h3><?php the_field('left_editor_name', get_the_ID()); ?></h3>
                                                <p><?php the_field('left_editor_intro', get_the_ID()); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="categories widget">
                                        <h3 class="widget-head">分类</h3>
                                        <ul>
<?php 
// ====Start categories loop====
// $tx = get_object_taxonomies('post', 'names')[0];
foreach (get_object_taxonomies(get_field('post_type'), 'names') as $tx):
    foreach (get_terms($tx) as $t):
        $link = get_term_link($t, 'post');
        $cat = $t->name;
        $count = $t->count;
// ====Start categories loop====
 ?>
                                            <li>
                                                <a href="<?php echo $link; ?>"><?php echo $cat; ?></a> <span class="badge"><?php echo $count; ?></span>
                                            </li>
<?php 
// ====End categories loop====
endforeach; break; endforeach;
// ====End categories loop====
 ?>
                                        </ul>
                                    </div> <!-- End categories -->
                                    <!-- Start Recent Posts -->
                                    <div class="recent-post widget">
                                        <h3>近期发表</h3>
                                        <ul>
<?php 
// ====Start rencent posts loop====
foreach (wp_get_recent_posts( array('post_type'=>get_field('post_type')) ) as $po):
    $link = get_the_permalink($po['ID']);
    $title = get_the_title($po['ID']);
    $time = get_the_time('Y/m/d', $po['ID']);
// ====Start rencent posts loop====
 ?>
                                            <li>
                                                <a href="<?php echo $link; ?>"><?php echo $title; ?></a> <br>
                                                <time><?php echo $time; ?></time>
                                            </li>
<?php 
// ====End rencent posts loop====
endforeach;
// ====End rencent posts loop====
 ?>
                                        </ul>
                                    </div> <!-- End Recent Posts -->
                                </div>
                            </div>
                            <!-- End Sidebar -->