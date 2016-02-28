        <!-- 
        ================================================== 
            Global Page Section Start
        ================================================== -->
        <section class="global-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h2><?php wp_title(''); ?></h2>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="<?php bloginfo('url'); ?>">
                                        <i class="ion-ios-home"></i>
                                        首页
                                    </a>
                                </li>
                                <!-- <li class="active"></li> -->
                                <?php the_path(); ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>   
        </section><!--/#Page header-->