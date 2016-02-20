<?php 
/******************************************************************
    从functions.php移植过来,作为插件使用,即可适应各种主题.
    全面掌控wp的各项功能（包括注册插件、改dashboard等也在这里）
    依赖插件列表:
    1. Advanced Custom Fields (!!! 自定义字段功能,每个页面都靠它定制)
    2. All-in-One WP Migration (一键站点迁移,巨好用)
    3. Formidable (自定义表单功能, 功能齐全, 非常方便)
    4. WP Admin UI Customize (自定义后台界面,极其强大)
    5. WPFront User Role Editor (用户权限管理)
    6. Duplicate Post (文章及各种自定义文章的克隆功能)
    7. QQWorld Speed for China (必备, 前台后台页面加速)
    8. WP-PostViews (文章浏览数统计功能)

    如果想把这些功能变为插件使用,请用下面文字:
    Plugin Name: Yeatone - Custrom functions
    Plugin URI: http://yeatone.cn
    Description: 
    Version: 1.0
    Author: Solomon Xie
    Author URI: http://solomonxie.xyz/blog/wordpress/plugins

*******************************************************************/

/*
    ================================================
      Advanced Custom Field (ACF)插件的前端使用方法
    ================================================
    the_field()用来显示字段值, get_field()用来返回字段值.两者的参数是一模一样的.
    the_field($field_id [,$post_id])
    $field_id为在acf后台中,该字段的名称(即id).
    如果the_field()函数用于have_posts()主循环中,则无需指定$post_id.
    但是如果想随时随地获取某一特定页面中的自定义字段,则需要制定post_id.
    这个id在打开该页面的编辑页面时,url中有显示.
    例子:
    <img src="<?php the_field('logo', '46'); ?>">
    这样就可以获取到id为46的页面中的logo地址了
*/

/*
    ================================================================================
      在Admin中向文章、页面开启主题的支持性功能（缩略图、自定义背景、自定义导航等）
      主题支持性功能是内置的无需我们单独开发，只要我们声明，wp就会自动添加上去。
    ================================================================================
*/
add_theme_support( 'post-thumbnails', array('post', 'page', 'outfits', 'outdoors') ); // 为各种文章类型开启特色图像功能
add_theme_support( 'menus' ); //为主题添加菜单订制功能

/*
    ===========================================
      关闭用户登录后每个页面顶部的Adminbar菜单
    ===========================================
*/
remove_action('init', '_wp_admin_bar_init');

/*
    ===========================================
      自定义登录页面Logo
    ===========================================
*/
function custom_login_logo() {
    // $url = get_bloginfo('template_directory').'/assets/images-default/login-logo.png';
    $url = get_field('login-logo','46');
    echo '<style type="text/css"> h1 a { background-image:url('.$url.')!important; } </style>';
}
add_action('login_head', 'custom_login_logo');

/*
    ========================================
      注册各种新的文章类型和对应功能
    ========================================
*/
function yeatone_custom_post_type_outfit() {
    // 注册[装备商城]类型
    register_post_type('outfits', array(
        'labels' => array( // 后台管理的各项显示名称。只管显示，不影响各处调用，随便改。
            'name' => '户外装备',
            'singular_name' => '装备二级分类',
            'add_new' => '添加二级分类',
            'all_items' => '所有二级分类',
            'add_new_item' => '添加二级分类',
            'edit_item' => '编辑',
            'new_item' => '新项目',
            'view_item' => '浏览装备',
            'search_item' =>    '搜索',
            'not_found' =>  '未找到',
            'not_found_in_trash' => '垃圾箱中未找到',
            'parent_item_colon' => '父级'
        ),
        'public' => true,
        'has_archive' => true,
        'publicity_queryable' => true,
        'query_var' =>  true,
        'rewrite' => true,
        'show_ui' => true,
        'capability_type' => 'post', //是文章还是页面
        'hierarchical' => false, //是否有层级
        'supports' => array( // 必须是suports,少了"s"截然不同！
            // 为自定义文章类型添加各种内置功能
            'title',    //标题
            'author',   //作者
            'excerpt',  //摘要
            'editor',   //编辑者
            'thumbnail',//缩略图（特色图片）
            'revisions',//编辑历史
            'custom-fields' //自定义栏目
        ),
        // 'taxonomies' => array('category', 'post_tag'),
        // 'menu_position'  => 5, //如果不写这个菜单位置 那就默认添加到最后
        'exclude_from_search' => false //是否可以被搜索到
    ) ); //在Admin主菜单中注册这个新项目
    //为自定义文章类型注册分类
    register_taxonomy(
        'outfit-category', //此分类的注册名
        array('outfits'), //在哪个文章类型上注册
        array(
            'hierarchical' => true,
            'labels' => array(
                'menu_name' => '装备一级分类',
                'name' => '装备一级分类',
                'singular_name' => 'outfit-cat',
                'search_items' =>  '搜索',
                'popular_items' => '热门',
                'all_items' => '所有',
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => '编辑',
                'update_item' => '更新',
                'add_new_item' => '添加',
                'new_item_name' => '名称',
                'separate_items_with_commas' => '按逗号分开',
                'add_or_remove_items' => '添加或删除',
                'choose_from_most_used' => '从经常使用的类型中选择'
            ),
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'outfit-category')
        )
    );
}
add_action('init', 'yeatone_custom_post_type_outfit'); //把这个动作(函数）挂到钩子上被自动运行

function yeatone_custom_post_type_outdoor() {
    // 注册[户外活动]类型
    register_post_type('outdoors', array(
        'labels' => array(
            'name' => '户外活动',
            'singular_name' => 'outdoor',
            'add_new' => '添加项目',
            'all_items' => '所有项目',
            'add_new_item' => '添加',
            'edit_item' => '编辑',
            'new_item' => '新项目',
            'view_item' => '浏览',
            'search_item' =>    '搜索',
            'not_found' =>  '未找到',
            'not_found_in_trash' => '垃圾箱中未找到',
            'parent_item_colon' => '父级'
        ),
        'public' => true,
        'has_archive' => true,
        'publicity_queryable' => true,
        'query_var' =>  true,
        'rewrite' => true,
        'show_ui' => true,
        'capability_type' => 'post', //是文章还是页面
        'hierarchical' => false, //是否有层级
        'supports' => array( // 必须是suports,少了"s"截然不同！
            // 为自定义文章类型添加各种内置功能
            'title',    //标题
            'author',   //作者
            'excerpt',  //摘要
            'editor',   //编辑者
            'thumbnail',//缩略图（特色图片）
            'revisions',//编辑历史
            'custom-fields' //自定义栏目
        ),
        // 'taxonomies' => array('category', 'post_tag'),
        // 'menu_position'  => 5, //如果不写这个菜单位置 那就默认添加到最后
        'exclude_from_search' => false //是否可以被搜索到
    ) ); //在Admin主菜单中注册这个新项目
    //为自定义文章类型注册分类
    register_taxonomy(
        'outdoor-category', //此分类的注册名
        array('outdoors'), //在哪个文章类型上注册
        array(
            'hierarchical' => true,
            'labels' => array(
                'menu_name' => '分类',
                'name' => '分类',
                'singular_name' => 'outdoor-cat',
                'search_items' =>  '搜索',
                'popular_items' => '热门',
                'all_items' => '所有',
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => '编辑',
                'update_item' => '更新',
                'add_new_item' => '添加',
                'new_item_name' => '名称',
                'separate_items_with_commas' => '按逗号分开',
                'add_or_remove_items' => '添加或删除',
                'choose_from_most_used' => '从经常使用的类型中选择'
            ),
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'outdoor-category')
        )
    );
}
add_action('init', 'yeatone_custom_post_type_outdoor'); //把这个动作(函数）挂到钩子上被自动运行

function yeatone_custom_post_type_service() {
    // 注册[户外活动]类型
    register_post_type('services', array(
        'labels' => array(
            'name' => '私人定制',
            'singular_name' => 'service',
            'add_new' => '添加项目',
            'all_items' => '所有项目',
            'add_new_item' => '添加项目',
            'edit_item' => '编辑',
            'new_item' => '新项目',
            'view_item' => '浏览',
            'search_item' =>    '搜索',
            'not_found' =>  '未找到',
            'not_found_in_trash' => '垃圾箱中未找到',
            'parent_item_colon' => '父级'
        ),
        'public' => true,
        'has_archive' => true,
        'publicity_queryable' => true,
        'query_var' =>  true,
        'rewrite' => true,
        'show_ui' => true,
        'capability_type' => 'post', //是文章还是页面
        'hierarchical' => false, //是否有层级
        'supports' => array( // 必须是suports,少了"s"截然不同！
            // 为自定义文章类型添加各种内置功能
            'title',    //标题
            'author',   //作者
            'excerpt',  //摘要
            'editor',   //编辑者
            'thumbnail',//缩略图（特色图片）
            'revisions',//编辑历史
            'custom-fields' //自定义栏目
        ),
        // 'taxonomies' => array('category', 'post_tag'),
        // 'menu_position'  => 5, //如果不写这个菜单位置 那就默认添加到最后
        'exclude_from_search' => false //是否可以被搜索到
    ) ); //在Admin主菜单中注册这个新项目
    //为自定义文章类型注册分类
    register_taxonomy(
        'service-category', //此分类的注册名
        array('services'), //在哪个文章类型上注册
        array(
            'hierarchical' => true,
            'labels' => array(
                'menu_name' => '分类',
                'name' => '分类',
                'singular_name' => 'service-cat',
                'search_items' =>  '搜索',
                'popular_items' => '热门',
                'all_items' => '所有',
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => '编辑',
                'update_item' => '更新',
                'add_new_item' => '添加',
                'new_item_name' => '名称',
                'separate_items_with_commas' => '按逗号分开',
                'add_or_remove_items' => '添加或删除',
                'choose_from_most_used' => '从经常使用的类型中选择'
            ),
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'outdoor-category')
        )
    );
}
add_action('init', 'yeatone_custom_post_type_service'); //把这个动作(函数）挂到钩子上被自动运行


/*
    ================================================================================
      增强默认文字编辑器功能
    ================================================================================
*/
function custum_fontfamily($initArray){
    $initArray['font_formats'] = "微软雅黑='微软雅黑';宋体='宋体';黑体='黑体';仿宋='仿宋';楷体='楷体';隶书='隶书';幼圆='幼圆';";
    return $initArray;
}
add_filter('tiny_mce_before_init', 'custum_fontfamily');
function enable_more_buttons($buttons) {
    $buttons[] = 'hr';
    $buttons[] = 'del';
    $buttons[] = 'sub';
    $buttons[] = 'sup';
    $buttons[] = 'cleanup';
    $buttons[] = 'wp_page';
    $buttons[] = 'anchor';
    $buttons[] = 'backcolor';
    $buttons[] = 'styleselect';
    $buttons[] = 'fontselect';
    $buttons[] = 'fontsizeselect';
    $buttons[] = 'media';
    return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons");

/*=====================================================================================
  =================================End of functions.php================================
  =====================================================================================*/

/**********************************
将Bootstrap分页功能引入到这里,方便管理.也可以单独出来作为插件.
Pl*** Name: wp_bs_pagination
Plugin URI: http://fellowtuts.com/wordpress/bootstrap-3-pagination-in-wordpress/
Description: Bootstrap 3 Pagination In WordPress
Usage:  In your archive files wherever you want to show pagination, call the function: 
        if (function_exists("wp_bs_pagination"))  {
            //wp_bs_pagination($the_query->max_num_pages);
            wp_bs_pagination();
        }
        The line #4 in the code above is an example to apply pagination if you are using custom query and if you wish to let pagination appear to its default position (not at center of the column), delete line number #41 and #73 from function. Now all is done! Check your WordPress website with Bootstrap theme to see Pagination live.

 **********************************/
function wp_bs_pagination($pages = '', $range = 4) {  
     $showitems = ($range * 2) + 1;  
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')  {
         global $wp_query; 
         $pages = $wp_query->max_num_pages;
         if(!$pages) {
             $pages = 1;
         }
     }   

     if(1 != $pages) {
        echo '<div class="text-center">'; 
        echo '<nav><ul class="pagination"><li class="disabled hidden-xs"><span><span aria-hidden="true">Page '.$paged.' of '.$pages.'</span></span></li>';
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
            echo "<li><a href='".get_pagenum_link(1)."' aria-label='First'>&laquo;<span class='hidden-xs'> First</span></a></li>";
         if($paged > 1 && $showitems < $pages) 
            echo "<li><a href='".get_pagenum_link($paged - 1)."' aria-label='Previous'>&lsaquo;<span class='hidden-xs'> Previous</span></a></li>";
         for ($i=1; $i <= $pages; $i++) {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                 echo ($paged == $i)? "<li class=\"active\"><span>".$i." <span class=\"sr-only\">(current)</span></span> </li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
             }
         }
         if ($paged < $pages && $showitems < $pages) 
            echo "<li><a href=\"".get_pagenum_link($paged + 1)."\"  aria-label='Next'><span class='hidden-xs'>Next </span>&rsaquo;</a></li>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
            echo "<li><a href='".get_pagenum_link($pages)."' aria-label='Last'><span class='hidden-xs'>Last </span>&raquo;</a></li>";
         echo "</ul></nav>";
         echo "</div>";
     }
}


/*====================================
  ========End of functions.php========
  ====================================*/
?>
