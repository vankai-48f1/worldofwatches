<div class="row">
  <div class="col-md-10 col-md-offset-2">
    <div class="row">
      <div class="col-md-10 category-container">
        <div class="row">
          <div class="col-md-8 col-sm-8 left-side"  style="margin-bottom: 40px;">
              <div class="each-category-section">
                <hr>
                <h3 class="section-title"><?php echo get_cat_name(11801) ?></h3>
            </div>
            <div class="category-articles-container">
                <?php
                  $wownetwork_id = 11801; //The Lux List
                  $the_lux_list_featured_id = ''; //The Lux List Featured
                  $args = array('cat' => $wownetwork_id, 'posts_per_page' => '5','post_status' => 'publish');
                  $the_query = new WP_Query( $args );
                  
                ?>
                <?php if ( $the_query->have_posts() ) : ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
                            <?php
                            $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories,'child_of'=>$wownetwork_id));
                            $thumbnail_title = get_field("thumbnail_title",get_the_ID());
                            ?>
                  <div class="row each-category-article each-article">
                    <div class="col-md-5 col-sm-5">
                      <a href="<?php the_permalink() ?>" class="take-me" data-url="<?php echo get_permalink();?>" >
                        <?php echo get_the_post_thumbnail(get_the_ID(),'six-five-medium');?>
                      </a>
                    </div>
                    <div class="col-md-7 col-sm-7">
                      <h3>
                        <a href="<?php the_permalink() ?>" >
                          <?php
                            $thumbnail_title = get_field("thumbnail_title",get_the_ID());
                            if($thumbnail_title == ""){
                              the_title();
                            }else{
                              echo $thumbnail_title;
                            }
                          ?>
                        </a>
                      </h3>
                      <div class="date_author"><?php echo get_the_date('M d, Y');?> / <?php echo get_cat_name( $wownetwork_id ) ?></div>
                      <div><?php echo the_excerpt();?></div>
                    </div>
                  </div>
                  <hr class="separator">
               
                    <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
             
            </div>
            <a class="view-more-articles-home" href="/hobbie-leissure">View More Articles</a>
          </div>
          <div class="col-md-4 col-sm-4 ads-space-sidebar-top zone-mpu">
            <?php dynamic_sidebar('right-banner-home'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
