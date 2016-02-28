<?php 
/******************************************************************
    functions.php - 可以全面自定义使用本主题时站点的所有效果
    - 主题依赖插件列表:
    1. Advanced Custom Fields (!!! 自定义字段功能,每个页面都靠它定制)
    2. Formidable (自定义表单功能, 功能齐全, 非常方便)
    3. WP-PostViews (文章浏览数统计功能)
    - 站点功能插件列表:
    1. All-in-One WP Migration (一键站点迁移,巨好用)
    2. WP Admin UI Customize (自定义后台界面,极其强大)
    3. WPFront User Role Editor (用户权限管理)
    4. Duplicate Post (文章及各种自定义文章的克隆功能)
    5. QQWorld Speed for China (必备, 前台后台页面加速)
    6. Adminimize (用户权限管理, 更齐全更细致的管控)
*******************************************************************/

/*引用一系列大块儿代码(被分出去单成立文件了)*/
// include_once('inc/func_acf.php'); // 自定义ACF分组字段
include_once('inc/func_custom_post_types.php'); //自定义文章类型
include_once('inc/func_bootstrap_pagination.php'); // Bootstrap分页效果
include_once('inc/func_custom_text_editor.php'); // 自定义文字编辑器样式
include_once('inc/func_custom_login.php'); //自定义登录页面

/*在Admin中向文章、页面开启主题的支持性功能（缩略图、自定义背景、自定义导航等）
  主题支持性功能是内置的无需我们单独开发，只要我们声明，wp就会自动添加上去。*/
// - 为各种文章类型开启特色图像功能
add_theme_support( 'post-thumbnails', array('post', 'page', 'outfits', 'outdoors') ); 
// - 为主题添加菜单订制功能
add_theme_support( 'menus' ); 

/*关闭用户登录后每个页面顶部的Adminbar菜单*/
remove_action('init', '_wp_admin_bar_init');

/*自定义函数: 获取当前页面的路径*/
function the_path() {
    $title = '';
    // 获取页面
    if (is_page()) $title = '<li>'.get_the_title().'</li>';
    elseif (is_category()) $title = '<li>分类</li><li>'.get_the_category()[0]->cat_name.'</li>';
    elseif (is_tax()) $title = '<li>分类</li>';
    elseif (is_single()) {
        if (get_post_type()=='outdoors') {
            $title .= '<li><a href="'.get_permalink('195').'">户外活动</a></li><li>活动详情</li>';
        } elseif (get_post_type()=='outfits') {
            $title .= '<li><a href="'.get_permalink('174').'">户外装备</a></li><li>装备详情</li>';
        } elseif (get_post_type()=='services') {
            $title .= '<li><a href="'.get_permalink('95').'">私人定制</a></li><li>定制详情</li>';
        } else {
            $title .= '<li><a href="'.get_permalink('65').'">官方博客</a></li><li>文章详情</li>';
        }
    }
    echo $title;
    return
    $subs = '';
    if (is_archive()) $subs += ' / 存档';
    elseif (is_search()) $subs += ' / 搜索';
    elseif (is_category()) $subs += ' / 分类';
    if (is_post_type('outfits')) $subs += ' / 装备';
    echo $title .$subs;
}

/*>>>>>>>>>>>>>>End of File>>>>>>>>>>>>>>>>>*/
?>
