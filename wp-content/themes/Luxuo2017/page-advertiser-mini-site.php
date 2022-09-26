<?php
/**
 * Template Name: Page - Advertiser Mini Site
 *
 */

get_header(); 
?>

<section id="primary" class="lx_fixed_sidebar">

    <div class="container-fluid mag-page-wrap mag-page-wrap--watchwow mag-page-wrap--home">
        <header class='mag-page-header'>
            <h1 class="category-page-title"><?php echo the_title(); ?></h1>
        </header>
    </div>

    <!--START SLIDER-->
    <?php get_template_part('templates/mini-site/featured-slider'); ?>
    <!--END SLIDER-->

    <!--START AD LEADERBOARD-->
    <?php get_template_part('templates/mini-site/ads/leaderboard-custom'); ?>
    <!--START AD LEADERBOARD-->
    
    <div class="row">
      <div class="col-md-10 col-md-offset-2">
        <div class="row">
          <div class="col-md-10 category-container">
            <div class="row">
              <div class="col-md-8 col-sm-8 left-side">
                <hr class="beside-title">
                <div class="category-name">Latest</div>
                <div class="category-articles-container">
                  <?php
                    $latest_content_tag_name = get_field('latest_content_tag_name');
                    
                    $query = new WP_Query(
                        array(
                            'post_status'   => 'publish',
                            'posts_per_page' => 8,
                            'post_status' => 'publish',
                            'tag' => $latest_content_tag_name,
                        )
                    );
                    ?>        
                  <?php if ( $query->have_posts() ) : ?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                      <?php
                        if($current_page->slug != "the-lux-list"){
                          $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories,'child_of'=>get_category_by_slug( $current_page->slug )->term_id));
                        }else{
                          $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories));
                        }
                        //if it's the subcategory
                        if(empty($categories)){
                          $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories));
                        }

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
                          <div class="date_author"><?php echo get_the_date('M d, Y');?> / <?php echo get_cat_name( $categories[0] ) ?></div>
                          <div><?php echo the_excerpt();?></div>
                        </div>
                      </div>
                      <hr class="separator">
                    <?php endwhile; ?>


                  <?php else: ?>
                    <p>Sorry, no posts matched your criteria.</p>
                  <?php endif; ?>
                </div>
                <?php wp_reset_query(); ?>  

                  <?php if($query->max_num_pages > 1){ ?>
                    <div class="view-more-articles" id="category-load-more" data-category="<?php echo $latest_content_tag_name; ?>" data-layout="1" data-container="category-articles-container">View More Articles</div>
                  <?php } ?>
              </div>
              <?php get_template_part('templates/mini-site/sidebar'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<?php get_footer(); ?>