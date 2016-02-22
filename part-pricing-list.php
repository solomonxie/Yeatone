        <!-- 详细价目表 -->
        <div class="section" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images-default/mPurpose-background.png);">
            <div class="container">
            <h2 class="subtitle text-left wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s"><?php the_field('pricing-list-title'); ?></h2>
                <div class="row">
                    <!-- Open Vacancies List -->
                    <div class="col-md-8">
                        <table class="jobs-list">
                            <tr class="wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">
                                <th>定制类型</th>
                                <th>项目特点</th>
                                <th>价格</th>
                            </tr>
<?php 
// ***********开始循环***************
$orderby = ''; //按什么排序?
query_posts('post_type=services&posts_per_page=4&orderby='.$orderby);
if (have_posts()):
    $anime_delay = 0.7;
    while (have_posts()): the_post();
        $anime_delay += 0.3;
// ***********开始循环***************
?>
                            <tr class="wow fadeInDown" data-wow-duration="500ms" data-wow-delay="<?php echo $anime_delay; ?>s">
                                <!-- Position -->
                                <td class="job-position">
                                    <a target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="label label-danger"><?php the_field('service-ribbon-title'); ?></span>
                                </td>
                                <!-- Location -->
                                <td class="job-location">
                                    <div class="job-country">United Kingdom</div>
                                    <div class="job-city">London</div>
                                </td>
                                <!-- Job Type -->
                                <td class="job-type hidden-phone"><?php echo get_field('service-price') .' '. get_field('service-price-unit'); ?></td>
                            </tr>
<?php 
// **********结束循环***********
    endwhile; endif; wp_reset_query();
// **********结束循环***********
?>
                        </table>
                    </div>
                    <!-- End Open Vacancies List -->
                    <!-- Sidebar -->
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="2.3s">
                        <div class="join-us-promo">
                            <!-- Quote -->
                            <div class="join-us-bubble">
                                <blockquote>
                                    <?php the_field('pop-box-content'); ?>
                                </blockquote>
                                <div class="sprite arrow-speech-bubble"></div>
                            </div>
                            <!-- Team Member Photo -->
                            <div class="author-photo">
                                <img src="<?php the_field('pop-box-img'); ?>" alt="Name Surname">
                            </div>
                        </div>
                    </div>
                    <!-- End Sidebar -->
                </div>
            </div>
        </div>
        <!-- End 详细节目表 -->