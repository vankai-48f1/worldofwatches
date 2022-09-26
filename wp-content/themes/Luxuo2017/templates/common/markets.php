<div class="row each-category-wrapper" style="margin-bottom: 0px;">
  <div class="col-md-10 col-md-offset-2">
    <div class="row">
      <div class="col-md-10 each-category-section">
        <hr>
        <h3 class="section-title"><?php echo get_cat_name(11800) ?></h3>
        <?php
          $wow_id = 11800; //Properties
          $first_wow_id = '';
          // $property_featured_id = 11807; //Properties Featured
          $args = array('cat' => $wow_id, 'posts_per_page'=>'1', 'post_status'=>'publish', 'orderby'=>'date', 'order'=>'DESC');
          $the_query = new WP_Query( $args );
        ?>
        <div class="row each-tile-wrapper">
          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
              <?php
                $post_id = get_the_ID();
                $first_wow_id = $post_id;
                $banner_image = get_field("banner_image",$post_id);
                $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories,'child_of'=>$wow_id));
              ?>
              <div class="col-md-12 each-article big-article">
                <a href="<?php echo get_permalink();?>">
                  <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'six-five-large'); ?>" width="980" class="img-responsive">
                </a>
                <div class="black-overlay">
                  <div class="black-summary">
                    <div><?php echo get_the_date('M d, Y');?> / <?php echo get_cat_name( $categories[0] ) ?></div>
                    <a href="<?php echo get_permalink();?>" class="no-underline">
                      <h3>
                        <?php
                        $thumbnail_title = get_field("thumbnail_title",get_the_ID());
                        if($thumbnail_title == ""){
                          the_title();
                        }else{
                          echo $thumbnail_title;
                        }
                        ?>
                      </h3>
                    </a>
                    <a href="<?php echo get_permalink();?>">Read More</a>
                  </div>
                </div>
                <div class="visible-xs black-summary-mobile">
                  <a href="<?php echo get_permalink();?>" class="no-underline">
                    <h3>
                      <?php
                        $thumbnail_title = get_field("thumbnail_title",get_the_ID());
                        if($thumbnail_title == ""){
                          the_title();
                        }else{
                          echo $thumbnail_title;
                        }
                        ?>
                    </h3>
                  </a>
                  <div><?php echo get_the_date('M d, Y');?> / <?php echo get_cat_name( $categories[0] ) ?></div>
                </div>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
          <?php wp_reset_query(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-10 col-md-offset-2">
    <div class="row">
      <div class="col-md-10 category-container">
        <div class="row">
          <div class="col-md-8 col-sm-8 left-side"  style="margin-bottom: 40px;">
              
            <div class="category-articles-container">
                <?php
                  $wownetwork_id = 11800; //The Lux List
                  $the_lux_list_featured_id = ''; //The Lux List Featured
                  $args = array('cat' => $wownetwork_id,'post__not_in'=>array($first_wow_id), 'posts_per_page' => '4','post_status' => 'publish');
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
            <a class="view-more-articles-home" href="/local-market">View More Articles</a>
          </div>
          <div class="col-md-4 col-sm-4 ads-space-sidebar-top zone-mpu">
            <?php dynamic_sidebar('right-banner-home'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
