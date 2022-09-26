<?php get_header(); ?>

<?php
  $args = array('category_name' => 'Homepage Slider','posts_per_page' => '10','post_status' => 'publish');
  $the_query = new WP_Query($args);
?>

<div class="row">
  <div class="col-md-12">
    <div id="owl" class="homepage-owl-container">
      <div id="hompage-owl" class="owl-carousel">
        <?php if ( $the_query->have_posts() ) : ?>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <?php
              $post_id = get_the_ID();
              $banner_image = get_field("banner_image",$post_id);
              $thumbnail_title = get_field("thumbnail_title",$post_id);
              $categories = wp_get_post_categories($post_id,array('exclude'=>$exclude_categories));
            ?>
            <div class="item">
              <a href="<?php echo get_permalink();?>">
                <img src="<?php echo $banner_image['url']; ?>" />
              </a>
              <div class="carousel-description">
                <div class="">
                  <div class="cat-title"><?php echo get_cat_name( $categories[0] ) ?></div>
                  <h2>
                    <a href="<?php echo get_permalink();?>">
                      <?php
                      if($thumbnail_title == ""){
                        the_title();
                      }else{
                        echo $thumbnail_title;
                      }
                      ?>
                    </a>
                  </h2>
                  <div class="carousel-excerpt hidden-xs">
                    <?php the_excerpt();?>
                  </div>
                </div>
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

<!-- EDITOR'S PICKS -->
<div class="row each-category-wrapper">
      <div class="each-category-section home-edpicks">
        <hr>
        <h3 class="section-title">EDITOR'S PICKS</h3>

        <?php
          $args = array('category_name' => "Editor's Picks", 'posts_per_page' => '4','post_status' => 'publish');
          $the_query = new WP_Query($args);
          $i = 0;
        ?>

        <div class="row each-tile-wrapper editors-picks-container">
            <?php
            if ($the_query->have_posts()):
              while ($the_query->have_posts()): $the_query->the_post();
                $i++;
                $categories = wp_get_post_categories(get_the_ID(), array('exclude'=>$exclude_categories));
                $thumbnail_title = get_field("thumbnail_title", get_the_ID());
                $title = $thumbnail_title == "" ? get_the_title() : $thumbnail_title;
            ?>

                <div class="home-edpicks-post">
                  <a href="<?= get_permalink(); ?>" data-url="<?= get_permalink(); ?>">
                    <?= get_the_post_thumbnail(get_the_ID(), 'six-five-small'); ?>
                  </a>
                  <div class="white-overlay">
                    <a href="<?= get_permalink(); ?>">
                      <div class="summary">
                        <h3><?= $title; ?></h3>
                        <div><?= get_the_date('M d, Y'); ?> / <?= get_cat_name($categories[0]); ?></div>
                      </div>
                    </a>
                  </div>
                </div>

                <?php if ($i == 2): ?>
                <div class="ads-space-sidebar-top zone-mpu">
                  <?php get_template_part('ad-zones/mpu1'); ?>
                </div>
                <?php endif ?>

                <?php if ($i == 4): ?>
                <div class="ads-space-sidebar-bottom zone-mpu">
                  <?php get_template_part('ad-zones/mpu2'); ?>
                </div>
                <?php endif ?>

            <?php
              endwhile;
              wp_reset_postdata();
            endif;
            wp_reset_query();
            ?>
        </div>
      </div>
</div>
<!-- EDITOR'S PICKS END -->

<?php get_template_part('ad-zones/leaderboard');?>

<hr class="section-devider">

<div class="row each-category-wrapper">
  <div class="col-md-10 col-md-offset-2">
    <div class="row">
      <div class="col-md-10 each-category-section">
        <hr>
        <h3 class="section-title">STYLE</h3>
        <div class="row each-tile-wrapper style-container">
          <?php
            $style_id = 11797; //style
            $args = array('cat' => $style_id, 'posts_per_page' => '4', 'post_status' => 'publish');
            $the_query = new WP_Query( $args );
          ?>
          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
              <?php
                $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories,'child_of'=>$style_id));
                $thumbnail_title = get_field("thumbnail_title",get_the_ID());
              ?>
              <div class="col-md-6 col-xs-12 col-sm-6 each-article">
                <a href="<?php echo get_permalink();?>" data-url="<?php echo get_permalink();?>" class="take-me">    
                  <?php echo get_the_post_thumbnail(get_the_ID(), array(600, 500)); ?>
                </a>
                <div class="white-overlay-bigger">
                  <a href="<?php echo get_permalink();?>">
                    <div class="summary summary-bigger">
                      <h3>
                        <?php
                          if($thumbnail_title == ""){
                            the_title();
                          }else{
                            echo $thumbnail_title;
                          }
                          ?>
                      </h3>
                      <div><?php echo get_the_date('M d, Y');?> / <?php echo get_cat_name( $categories[0] ) ?></div>
                    </div>
                  </a>
                </div>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
          <?php wp_reset_query(); ?>
        </div>

        <div class="view-more-articles" id="style-load-more" data-category="<?php echo $style_id; ?>" data-layout="2" data-container="style-container">View More Articles</div>
      </div>
    </div>
  </div>
</div>

<hr class="section-devider">

<div class="row each-category-wrapper">
  <div class="col-md-10 col-md-offset-2">
    <div class="row">
      <div class="col-md-10 each-category-section">
        <hr>
        <h3 class="section-title">CULTURE</h3>
        <?php
          $culture_id = 11798; //culture
          $culture_featured_id = 11805; //Culture Featured
          $args = array('cat' => $culture_featured_id, 'posts_per_page' => '1','post_status' => 'publish');
          $the_query = new WP_Query( $args );
        ?>
        <div class="row each-tile-wrapper">
          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
              <?php
                $post_id = get_the_ID();
                $banner_image = get_field("banner_image",$post_id);
                $thumbnail_title = get_field("thumbnail_title",$post_id);
                $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories,'child_of'=>$culture_id));
              ?>
              <div class="col-md-12 each-article big-article">
                <a href="<?php echo get_permalink();?>">
                  <img src="<?php echo generate_new_filename($banner_image); ?>" width="980">
                </a>
                <div class="black-overlay">
                  <div class="black-summary">
                    <div><?php echo get_the_date('M d, Y');?> / <?php echo get_cat_name( $categories[0] ) ?></div>
                    <a href="<?php echo get_permalink();?>" class="no-underline">
                      <h3>
                        <?php
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

        <div class="row each-tile-wrapper culture-container">
          <?php
            $args = array('cat' => $culture_id,'category__not_in'=>$culture_featured,'posts_per_page' => '3','post_status' => 'publish');
            $the_query = new WP_Query( $args );
          ?>
          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
              <?php
                $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories,'child_of'=>$culture_id));
                $thumbnail_title = "";
                $thumbnail_title = get_field("thumbnail_title",get_the_ID());
              ?>
              <div class="col-md-4 col-sm-4 col-xs-12 each-article">
                <a href="<?php echo get_permalink();?>" class="no-underline take-me" data-url="<?php echo get_permalink();?>">
                  <?php echo get_the_post_thumbnail(get_the_ID(), 'six-five-small'); ?>
                </a>
                <div class="white-overlay">
                  <a href="<?php echo get_permalink();?>">
                    <div class="summary">
                      <h3>
                        <?php
                        if($thumbnail_title == ""){
                          the_title();
                        }else{
                          echo $thumbnail_title;
                        }
                        ?>
                      </h3>
                      <div><?php echo get_the_date('M d, Y');?> / <?php echo get_cat_name( $categories[0] ) ?></div>
                    </div>
                  </a>
                </div>
              </div>
              <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
          <?php wp_reset_query(); ?>
        </div>

        <div class="view-more-articles" id="culture-load-more" data-category="<?php echo $culture_id; ?>" data-exclude-category="<?php echo $culture_featured;?>" data-layout="3" data-container="culture-container">View More Articles</div>
      </div>
    </div>
  </div>
</div>

<div class="mid-newsletter-wrapper">
  <div class="row">
    <div class="col-md-10 text-center col-md-offset-2">
      <div class="row">
        <div class="col-md-10">
          <?php echo mailchimpSF_signup_form(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row each-category-wrapper">
  <div class="col-md-10 col-md-offset-2">
    <div class="row">
      <div class="col-md-10 each-category-section">
        <hr>
        <h3 class="section-title">MOTORING</h3>
        <div class="row each-tile-wrapper motoring-container">
          <?php
            $motoring_id = 11799; //Motoring
            $args = array('cat' => $motoring_id, 'posts_per_page' => '4','post_status' => 'publish');
            $the_query = new WP_Query( $args );
          ?>
          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
              <?php
                $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories,'child_of'=>$motoring_id));
              ?>
              <div class="col-md-6 col-xs-12 col-sm-6 each-article">
                <a href="<?php echo get_permalink();?>" data-url="<?php echo get_permalink();?>" class="take-me">
                  <?php echo get_the_post_thumbnail(get_the_ID(), array(600, 500)); ?>
                </a>
                <div class="white-overlay-bigger">
                  <a href="<?php echo get_permalink();?>">
                    <div class="summary summary-bigger">
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
                      <div><?php echo get_the_date('M d, Y');?> / <?php echo get_cat_name( $categories[0] ) ?></div>
                    </div>
                  </a>
                </div>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
          <?php wp_reset_query(); ?>
        </div>

        <div class="view-more-articles" id="motoring-load-more" data-category="<?php echo $motoring_id; ?>" data-layout="2" data-container="motoring-container">View More Articles</div>
      </div>
    </div>
  </div>
</div>

<hr class="section-devider">

<div class="row each-category-wrapper">
  <div class="col-md-10 col-md-offset-2">
    <div class="row">
      <div class="col-md-10 each-category-section">
        <hr>
        <h3 class="section-title">PROPERTIES</h3>
        <?php
          $property_id = 11800; //Properties
          $property_featured_id = 11807; //Properties Featured
          $args = array('cat' => $property_featured_id, 'posts_per_page' => '1', 'post_status' => 'publish');
          $the_query = new WP_Query( $args );
        ?>
        <div class="row each-tile-wrapper">
          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
              <?php
                $post_id = get_the_ID();
                $banner_image = get_field("banner_image",$post_id);
                $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories,'child_of'=>$property_id));
              ?>
              <div class="col-md-12 each-article big-article">
                <a href="<?php echo get_permalink();?>">
                  <img src="<?php echo generate_new_filename($banner_image); ?>" width="980">
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

        <div class="row each-tile-wrapper properties-container">
          <?php
            $args = array('cat' => $property_id,'category__not_in'=>$properties_featured, 'posts_per_page' => '3','post_status' => 'publish');
            $the_query = new WP_Query( $args );
          ?>
          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
              <?php
                $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories,'child_of'=>$property_id));
              ?>
              <div class="col-md-4 col-sm-4 col-xs-12 each-article">
                <a href="<?php echo get_permalink();?>" class="no-underline take-me" data-url="<?php echo get_permalink();?>">
                  <?php echo get_the_post_thumbnail(get_the_ID(), 'six-five-small'); ?>
                </a>
                <div class="white-overlay">
                  <a href="<?php echo get_permalink();?>">
                    <div class="summary">
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
                      <div><?php echo get_the_date('M d, Y');?> / <?php echo get_cat_name( $categories[0] ) ?></div>
                    </div>
                  </a>
                </div>
              </div>
              <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
          <?php wp_reset_query(); ?>
        </div>

        <div class="view-more-articles" id="properties-load-more" data-category="<?php echo $property_id; ?>" data-exclude-category="<?php echo $properties_featured;?>" data-layout="3" data-container="properties-container">View More Articles</div>
      </div>
    </div>
  </div>
</div>

<?php get_template_part('ad-zones/billboard-2') ?>

<div class="row each-category-wrapper">
  <div class="col-md-10 col-md-offset-2">
    <div class="row">
      <div class="col-md-10 each-category-section">
        <hr>
        <h3 class="section-title">LIFESTYLE</h3>
        <div class="row each-tile-wrapper lifestyle-container">
          <?php
            $lifestyle_id = 11801; //Lifestyle
            $args = array('cat' => $lifestyle_id, 'posts_per_page' => '4','post_status' => 'publish');
            $the_query = new WP_Query( $args );
          ?>
          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
              <?php
                $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories,'child_of'=>$lifestyle_id));
              ?>
              <div class="col-md-6 col-xs-12 col-sm-6 each-article">
                <a href="<?php echo get_permalink();?>" data-url="<?php echo get_permalink();?>" class="take-me">
                  <?php echo get_the_post_thumbnail(get_the_ID(), array(600, 500)); ?>
                </a>
                <div class="white-overlay-bigger">
                  <a href="<?php echo get_permalink();?>">
                    <div class="summary summary-bigger">
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
                      <div><?php echo get_the_date('M d, Y');?> / <?php echo get_cat_name( $categories[0] ) ?></div>
                    </div>
                  </a>
                </div>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
          <?php wp_reset_query(); ?>
        </div>

        <div class="view-more-articles" id="lifestyle-load-more" data-category="<?php echo $lifestyle_id; ?>" data-layout="2" data-container="lifestyle-container">View More Articles</div>
      </div>
    </div>
  </div>
</div>

<hr class="section-devider">

<div class="row each-category-wrapper">
  <div class="col-md-10 col-md-offset-2">
    <div class="row">
      <div class="col-md-10 each-category-section">
        <hr>
        <h3 class="section-title">THE LUX LIST</h3>
        <?php
          $the_lux_list_id = 11802; //The Lux List
          $the_lux_list_featured_id = 11806; //The Lux List Featured
          $args = array('cat' => $the_lux_list_featured_id, 'posts_per_page' => '1','post_status' => 'publish');
          $the_query = new WP_Query( $args );
        ?>
        <div class="row each-tile-wrapper">
          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
              <?php
                $post_id = get_the_ID();
                $banner_image = get_field("banner_image",$post_id);
                $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories));
              ?>
              <div class="col-md-12 each-article big-article">
                <a href="<?php echo get_permalink();?>">
                    <img src="<?php echo generate_new_filename($banner_image); ?>" width="980">
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

        <div class="row each-tile-wrapper the-lux-list-container">
          <?php
            $args = array('cat' => $the_lux_list_id,'category__not_in'=>$the_lux_list_featured,'posts_per_page' => '3','post_status' => 'publish');
            $the_query = new WP_Query( $args );
          ?>
          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
              <?php
                $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories));
              ?>
              <div class="col-md-4 col-sm-4 col-xs-12 each-article">
                <a href="<?php echo get_permalink();?>" class="no-underline take-me" data-url="<?php echo get_permalink();?>">
                  <?php echo get_the_post_thumbnail(get_the_ID(), 'six-five-small'); ?>
                </a>
                <div class="white-overlay">
                  <a href="<?php echo get_permalink();?>">
                    <div class="summary">
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
                      <div><?php echo get_the_date('M d, Y');?> / <?php echo get_cat_name( $categories[0] ) ?></div>
                    </div>
                  </a>
                </div>
              </div>
              <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
          <?php wp_reset_query(); ?>
        </div>

        <div class="view-more-articles" id="the-lux-list-load-more" data-category="<?php echo $the_lux_list_id; ?>" data-exclude-category="<?php echo $the_lux_list_featured;?>" data-layout="3" data-container="the-lux-list-container">View More Articles</div>
      </div>
    </div>
  </div>
</div>

<?php
  $categories = get_categories(array('exclude'=>$exclude_categories_for_home,'parent'=>0,'orderby'=>'ID'));

  if(count($categories) > 0){
    foreach ($categories as $category) {
      if($category->cat_ID >= $style){
    ?>
        <hr class="section-devider">

        <div class="row each-category-wrapper">
          <div class="col-md-10 col-md-offset-2">
            <div class="row">
              <div class="col-md-10 each-category-section">
                <hr>
                <h3 class="section-title"><?php echo $category->name;?></h3>
                <div class="row each-tile-wrapper <?php echo $category->slug;?>-container">
                  <?php
                    $args = array('category_name' => $category->name,'posts_per_page' => '4','post_status' => 'publish');
                    $the_query = new WP_Query( $args );
                  ?>
                  <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
                      <?php
                        $show_categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories,'child_of'=>$category->cat_ID));
                        if(count($show_categories) == 0){
                          $show_categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories));
                        }
                      ?>
                      <div class="col-md-6 col-xs-12 col-sm-6 each-article">
                        <a href="<?php echo get_permalink();?>" data-url="<?php echo get_permalink();?>" class="take-me">
                          <?php echo get_the_post_thumbnail(get_the_ID(), 'six-five-medium'); ?>
                        </a>
                        <div class="white-overlay-bigger">
                          <a href="<?php echo get_permalink();?>">
                            <div class="summary summary-bigger">
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
                              <div><?php echo get_the_date('M d, Y');?> / <?php echo get_cat_name( $categories[0] ) ?></div>
                            </div>
                          </a>
                        </div>
                      </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                  <?php endif; ?>
                  <?php wp_reset_query(); ?>
                </div>

                <div class="view-more-articles" id="<?php echo $category->slug;?>-load-more" data-category="<?php echo $category->cat_ID; ?>" data-layout="2" data-container="<?php echo $category->slug;?>-container">View More Articles</div>
              </div>
            </div>
          </div>
        </div>

<?php
      }
      # code...
    }
  }
?>

<?php get_footer(); ?>
