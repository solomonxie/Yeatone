<?php 
/*========================================
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
            'rewrite' => array('slug' => 'outfit-category'),
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
            'rewrite' => array('slug' => 'outdoor-category'),
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
        )
    );
}
add_action('init', 'yeatone_custom_post_type_outdoor'); //把这个动作(函数）挂到钩子上被自动运行

function yeatone_custom_post_type_service() {
    // 注册[私人定制]类型
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
            'rewrite' => array('slug' => 'service-category'),
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
        )
    );
}
add_action('init', 'yeatone_custom_post_type_service'); //把这个动作(函数）挂到钩子上被自动运行


/*>>>>>>>>>>>>>>End of File>>>>>>>>>>>>>>>>>*/
?>