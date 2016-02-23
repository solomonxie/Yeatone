<?php 
/*自定义登录页面Logo*/
function custom_login_logo() {
    // $url = get_bloginfo('template_directory').'/assets/images-default/login-logo.png';
    $url = get_field('login-logo','46');
    echo '<style type="text/css"> h1 a { background-image:url('.$url.')!important; } </style>';
}
add_action('login_head', 'custom_login_logo');

/*>>>>>>>>>>>>>>End of File>>>>>>>>>>>>>>>>>*/
 ?>