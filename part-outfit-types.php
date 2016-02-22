        <!-- 
        ================================================== 
            Works Section Start
        ================================================== -->
        <section class="works service-page">
            <div class="container">
                <h2 class="subtitle text-center wow fadeInUp animated" data-wow-delay=".3s" data-wow-duration="500ms">我们提供的户外装备</h2>
                <!-- <p class="subtitle-des text-center wow fadeInUp animated" data-wow-delay=".5s" data-wow-duration="500ms"> 我们主要提供如下几种装备类型: </p> -->
                <div class="row">
<?php 
// ====Start outfit-category loop====
foreach (get_object_taxonomies('outfits', 'names') as $tx):
    $n = 0;
    foreach (get_terms($tx) as $t):
        //通过acf插件设置的分类图片并获取,获取方法唯一区别是第2参数为term类型.
        $cat_slug = $t->slug;
        $tax_img = get_field('taxonomy-image', $t);
// ====Start outfit-category loop====
 ?>
                    <!-- Start a portfolio -->
                    <div class="col-sm-3">
                         <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
                            <div class="img-wrapper">
                                <img src="<?php echo $tax_img; ?>" class="img-responsive" alt="this is a title" >
                                <div class="overlay">
                                    <div class="buttons">
                                        <a rel="gallery" class="fancybox" href="<?php echo $tax_img; ?>">幻灯片</a>        
                                        <a target="_blank" href="<?php echo '/'.$tx.'/'.$cat_slug.'/'; ?>">查看详细</a>
                                    </div>
                                </div>
                            </div>
                            <figcaption>
                                <h4> <a href="#"> <?php echo $t->name; ?> </a> </h4>
                                <p> <?php echo $t->description; ?> </p>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- End a portfolio -->
<?php 
// ====End Outfit-category loop====
endforeach; break; endforeach;
// ====End Outfit-category loop====
 ?>
                </div>
            </div>
        </section>