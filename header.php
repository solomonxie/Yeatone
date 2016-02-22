<!DOCTYPE html>
<html class="no-js">
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/assets/images/favicon.png">
        <title><?php if (is_front_page()) the_title(); else wp_title(''); ?> - <?php bloginfo('name'); ?></title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Template CSS Files
        ================================================== -->
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" />
        <!-- Here we have wp head addins' -->
        <?php wp_head(); ?>
    </head>
    <body>
        <!--
        ==================================================
        Header Section Start
        ================================================== -->
        <header id="top-bar" class="navbar-fixed-top animated-header">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->
                    <!-- logo -->
                    <div class="navbar-brand">
                        <a href="<?php bloginfo('url'); ?>/" >
                            <img src="<?php the_field('logo', '46'); ?>" alt="logo">
                        </a>
                    </div>
                    <!-- /logo -->
                </div>
                <!-- main menu -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <div class="main-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="<?php the_permalink(46); ?>" ><?php echo get_the_title(46); ?></a>
                            </li> <!-- 首页 -->
                            <li><a href="<?php the_permalink(195); ?>"><?php echo get_the_title(195); ?></a></li> <!-- 户外活动 -->
                            <li><a href="<?php the_permalink(95); ?>"><?php echo get_the_title(95); ?></a></li> <!-- 私人定制 -->
                            <li><a href="<?php the_permalink(174); ?>"><?php echo get_the_title(174); ?></a></li> <!-- 户外装备 -->
                            <li><a href="<?php the_permalink(65); ?>"><?php echo get_the_title(65); ?></a></li> <!-- 博客 -->
                            <li><a href="<?php the_permalink(118); ?>"><?php echo get_the_title(118); ?></a></li> <!-- 关于我们 -->
                            <!-- <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">层叠菜单<span class="caret"></span></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a href="#">菜单</a></li>
                                        <li><a href="#">菜单</a></li>
                                    </ul>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </nav>
                <!-- /main nav -->
            </div>
        </header>

<?php if ( !is_front_page() ) get_template_part('part-global-banner'); ?>