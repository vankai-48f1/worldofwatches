<div class="col-xs-12 col-sm-4 col-md-4 sidebar-container">
    <iframe src="http://www.asia-rendezvousyachting.com/embed-selection.php" width="100%" height="650" style="margin-bottom: 20px"></iframe>

    <?php
    if(is_single()){
        $sponsored_article = get_field("sponsored_article",get_the_ID());
    }
    ?>

    <?php
    if($sponsored_article == "Yes"):
        get_template_part('ad-zones/mpu1-custom');
        get_template_part('ad-zones/mpu2-custom');
    else:
    ?>
        <div class="sidebar-ads-container">
            <?php get_template_part('ad-zones/mpu1'); ?>
        </div>

        <div class="sidebar-ads-container">
            <?php get_template_part('ad-zones/mpu2'); ?>
        </div>
    <?php endif; ?>

    <div id="ad_slot_separator">&nbsp;</div>

    <div class="sidebar-newsletter-container">
        <?php echo mailchimpSF_signup_form(); ?>
    </div>

    <div class="sidebar-editors-picks">
        <div class="title">EDITOR'S PICKS</div>
        <?php
        $args = array('category_name' => "Editor's Picks",'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => '4','post_status' => 'publish');
        $the_query = new WP_Query( $args );
        ?>
        <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
                <?php $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories));?>
                <div class="sidebar-each-article row">
                    <div class="col-md-6 col-sm-6 col-xs-5">
                        <a href="<?php echo get_permalink();?>" class="take-me" data-url="<?php echo get_permalink();?>">
                            <?php echo get_the_post_thumbnail(get_the_ID(),'six-five-medium');?>
                        </a>
                    </div>
                    <a href="<?php echo get_permalink();?>">
                        <div class="col-md-6 col-sm-6 col-xs-7 sidebar-article-title">
                            <div>
                                <?php
                                $thumbnail_title = get_field("thumbnail_title",get_the_ID());
                                if($thumbnail_title == ""){
                                    the_title();
                                }else{
                                    echo $thumbnail_title;
                                }
                                ?>
                            </div>
                            <div class="sidebar-category"><?php echo get_cat_name($categories[1]);?></div>
                        </div>

                    </a>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>
</div>
