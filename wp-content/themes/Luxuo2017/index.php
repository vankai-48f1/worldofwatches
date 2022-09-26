<?php 
if (!defined('ABSPATH')) exit;
get_header(); ?>

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

<!-- BEGIN NEWS -->
<div class="row each-category-wrapper">
      <div class="each-category-section home-edpicks">
        <hr>
        <h3 class="section-title"><?php echo get_cat_name(11797) ?></h3>

        <?php
          $args = array('category_name' => "News", 'posts_per_page' => '6','post_status' => 'publish');
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

                

                

            <?php
              endwhile;
              wp_reset_postdata();
            endif;
            wp_reset_query();
            ?>
        </div>
      </div>
</div>
<!-- END NEWS -->
<hr class="section-devider">
<div id="ads-space-leaderboard-custom">
    <?php dynamic_sidebar('center-banner-home'); ?>
</div>
<?php //get_template_part('ad-zones/leaderboard');?>
<hr class="section-devider">

<!--BEGIN HIGHLIGHTS-->
<?php include (TEMPLATEPATH . '/templates/common/highlights.php'); ?>
<!-- END HIGHLIGHTS -->
<hr class="section-devider">

<!--BEGIN VINTAGES-->
<?php include (TEMPLATEPATH . '/templates/common/vintages.php'); ?>
<!-- END VINTAGES -->


<!-- <div class="mid-newsletter-wrapper">
  <div class="row">
    <div class="col-md-10 text-center col-md-offset-2">
      <div class="row">
        <div class="col-md-10">
          <?php //echo mailchimpSF_signup_form(); ?>
        </div>
      </div>
    </div>
  </div>
</div>-->

<hr class="section-devider">

<!-- BEGIN MARKETS-->
<?php include (TEMPLATEPATH . '/templates/common/markets.php'); ?>
<!-- End MARKETS -->
<hr class="section-devider">
<?php //get_template_part('ad-zones/billboard-2') ?>
<!-- BEGIN THE TALKS-->
<?php include (TEMPLATEPATH . '/templates/common/the-talks.php'); ?>
<!-- END THE TALKS -->
<hr class="section-devider">
<!-- BEGIN Features -->
<?php include (TEMPLATEPATH . '/templates/common/features.php'); ?>
<!-- END Features -->

<hr class="section-devider">

<!-- BEGIN WoW Lab-->
<?php include (TEMPLATEPATH . '/templates/common/wow-lab.php'); ?>
<!-- END WoW Lab -->
<hr class="section-devider">

<?php include (TEMPLATEPATH . '/templates/common/wow-network.php'); ?>



<?php get_footer(); ?>
