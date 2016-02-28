<?php 

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
// echo get_category_link('6'); //获取文章分类链接 
// //另一种方法获取文章分类下的文章数量,参数直接从后台url中复制就可以了
// echo count( get_posts('outfit-category=outfit-hiking&post_type=outfits') ); 
// //输出分类数量 --失败
// echo count( get_the_category() ); 

/**********************************************
	自定义文章类型(Custom Post Type)的分类信息
 **********************************************/
// //===输出某分类法下的所有自定义分类名/别名/文章数/描述/链接===
// $terms = get_terms('outfit-category');
// foreach ($terms as $t) { 
// 	echo '父级分类:'.$t->term_id  .' | ';
// 	echo '父级分类:'.$t->name  .' | ';
// 	echo '父级分类:'.$t->slug .' | '; 
// 	echo '父级分类:'.$t->parent.' | ';
// 	echo '父级分类:'.$t->count .' | '; 
// 	echo '父级分类:'.$t->description .' | '; 
// 	echo '父级分类:'.get_term_link($t, 'outfit-category') .' | '; 
// }

// ===用get_category()获取更多分类信息===
$terms = get_terms('outfit-category');
foreach ($terms as $t) {
	// get_category()虽然也是获得一个term, 但是含更多信息
	$cat = get_category($t->term_id);
	echo '当前分类:'.$cat->term_id.' | ';
	echo '父级分类:'.$cat->parent.' | ';
	echo '分类名称:'.$cat->name.' | ';
	echo '分裂法:'.$cat->taxonomy.' | ';
	echo '文章数量:'.$cat->count.' | '; //分类下posts数量
	echo '<br>';
}

// //===分别循环读取某文章类型某分类法下的所有文章===
// $terms = get_terms('outfit-category');
// foreach ($terms as $t):
// 	echo $t->name .'<br>';
// 	echo $t->description .'<br>';
// 	query_posts('post_type=outfits&outfit-category='.$t->slug);
// 	while (have_posts()): the_post();
// 		the_title();
// 	endwhile; wp_reset_query(); 
// 	echo '<hr>';
// endforeach;

// //输出指定文章分类下的所有分类法的别名
// foreach (get_object_taxonomies('outfits', 'names') as $obj) { echo $obj .'<br>'; }
// //获取某条件的文章
// $posts = get_posts('outfit-category=outfit-hiking&post_type=outfits'); //自定义分类法
// echo count($posts) .'<br>'; //输出某条件下的分类数量
// //根据条件循环输出文章信息 (注意:括号里不能直接引用get_posts(),否则不能正常显示.)
// foreach ($posts as $po) { the_post(); the_permalink() .'<br>'; }

/*********************************************
	获取近期文章
 *********************************************/
// //获取默认文章类型中的最近文章
// foreach (wp_get_recent_posts() as $po):
// 	echo get_the_title($po['ID']) .'<br>';
// endforeach;
// //更多条件的获取某文章类型中的最近文章
// $posts = wp_get_recent_posts( array(
// 	'numberposts' => 10,
//     'post_type' => 'outfits',
//     'orderby' => 'post_date',
//     'offset' => 0,
//     'category' => 0,
//     'order' => 'DESC',
//     'suppress_filters' => true,
//     'post_status' => 'publish',
//     // 'include' => none,
//     // 'exclude' => none,
//     // 'meta_key' => none,
//     // 'meta_value' => none,
// ) );
// foreach ($posts as $po):
// 	echo get_the_title($po['ID']) .'<br>';
// 	echo get_the_time('Y/m/d',$po['ID']) .'<br>';
// 	echo the_permalink($po['ID']) .'<br>';
// endforeach;


/*********************************
	配合WP-PageNavi插件实现分页导航
	使用方法:在页面have_posts()循环之后,
	在wp_reset_query()或wp_reset_postdata()之前,
	调用wp_pagenavi()函数,根据query方法不同,这个函数的参数也不同.
 *********************************/
// //---默认方法:诸多不灵活---
// echo get_previous_posts_link('Last');
// echo get_next_posts_link('Next');

// //===query_posts()方法:使用简单,但副作用多===
// query_posts('post_type=post&posts_per_page=1&paged='.get_query_var('paged'));
// while (have_posts()):
// 	the_post();
// 	the_title();
// endwhile;
// echo "<hr>";
// // //wp_pagenavi(); //WP-PageNavi插件
// wp_bs_pagination(); //网上摘抄函数做的插件,专为Bootstrap样式.
// wp_reset_query();
// //引入分页的样式:需要在style.css中引用或直接描述.
// echo '<link rel="stylesheet" href="'.get_bloginfo('stylesheet_url').'" />'

// //===WP_Query()方法,使用起来稍麻烦一点,但副作用少===
// //和query_posts()不同的地方是,1.$args不能用字符串了, 2.have_posts()和the_post()需要加指定, 3.结束循环需要用wp_reset_postdata()
// $q = new WP_Query( array(
// 	'post_type' => 'post', 
// 	'paged' => get_query_var('paged'), //当前页码
// ) );
// while ($q -> have_posts()):
// 	$q -> the_post();
// 	the_title();
// endwhile;
// echo "<hr>";
// wp_pagenavi(array(
// 	'query' => $q, //带查询参数的array()或直接WP_Query对象的实例
// 	// 'type' => 'multipart' //分页类型:列表页的分页 --->不能用
// ));
// wp_reset_postdata();
// // 引入分页的样式:需要在style.css中引用或直接描述.
// echo '<link rel="stylesheet" href="'.get_bloginfo('stylesheet_url').'" />'

// $po = get_post('46', ARRAY_A);
// echo $po['post_title']


// ====使用ACF插件 获取任意页的任意自定义栏目====
// echo get_field('ion-icon', '239');

 ?>

<?php 
	// 获取所有自定义导航菜单项(这里是无层级的)
	// $menu_items = wp_get_nav_menu_items( 'main_nav' );
	// foreach ( (array) $menu_items as $key => $menu_item ) {
	//     echo $menu_item->title;
	//     echo $menu_item->url;
	// }

	/*//sample
	$menu_name = 'main_nav';
	// if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$locations = get_nav_menu_locations();
		echo count($locations);
		echo isset( $locations[ $menu_name ] );
	    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
	    $menu_items = wp_get_nav_menu_items($menu->term_id);
	    $menu_list = '<ul id="menu-' . $menu_name . '">';
	    foreach ( (array) $menu_items as $key => $menu_item ) {
	        $title = $menu_item->title;
	        $url = $menu_item->url;
	        $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
	    }
	    $menu_list .= '</ul>';
	// } else {
	//     $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
	// }
	// $menu_list now ready to output*/
 ?>

<?php 
 		// 获取某用户的自定义字段
 		// 用法:第二个参数为user_$, 其中$为用户id,在url中可以看到.没有显示的,肯定就是1.
 		// the_field('photo', 'user_1'); 

 		/*// 用WP_User_Query()循环读取所有用户资料
		$uquery = new WP_User_Query('orderby=id');
		$users = $uquery -> get_results();
		if (!empty($users)) {
		     echo '<ul>';
		     foreach ($users as $u) {
		     	$uid = $u->ID;
		     	$info = get_userdata($uid);
		     	$email = $info->user_email;
		     	echo $uid .'<br>';
		     	echo $email .'<br>';
		     	echo get_field('photo', 'user_'.$uid) .'<br>';
		     }
		     echo '</ul>';
		} else {
		     echo 'No results';
		}*/

		/*// 用get_users()循环读取所有用户资料
		$users = get_users('orderby=id');
		foreach ($users as $u):
			// echo $u->display_name .'<br>';
			// echo $u->nickname .'<br>';
			echo $u->first_name .'<br>';
		endforeach;*/

		// 用ACF插件的用户类型选项,获取所选用户
		// 该方法,返回的是1个或多个WP_User()类型的对象
		// 获取单个用户(用于field type为单项时)
		// echo get_field('user')['display_name'];
		// 获取多个用户(用于field type为多选时)
?>

 <?php
 	/*$posts = get_posts('post_type=services');
 	foreach ($posts as $po): the_post();
 		$pid = $po->ID;
 		echo the_title() .'<br>';
 		echo get_field('service-ribbon-color') .'<br>';
	endforeach;*/
?>