<?php 
/********************************
page-customize.php
其实是原page-services.php,
但是自从注册services为自定义文章类型并注册了自定义分类法后,
url中services这个名称就会被自动跳转到archive.php变成存档了.
所以必须另起名字.
********************************/
 ?>
 <?php get_header(); ?>

<?php get_template_part('part-pricing-table'); ?>

<?php get_template_part('part-pricing-list'); ?>

<?php the_content(); ?>

<?php get_footer(); ?>