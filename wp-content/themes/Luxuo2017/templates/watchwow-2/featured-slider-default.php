<?php
$current_page = get_queried_object();
$category     = $current_page->cat_ID;
$query = new WP_Query(
    array(
      'cat' => $category,
      'post_status'   => 'publish',
      'posts_per_page' => 5,
      'post_status' => 'publish'
    )
);

if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : 
        $query->the_post();
        $categories = wp_get_post_categories(
            get_the_ID(), array('exclude'=>$exclude_categories)
        );
    ?>
    <div class="item row">
      <div class="col-md-8 col-sm-8">
        <a href="<?php echo get_permalink();?>" class="take-me" data-url="<?php echo get_permalink();?>">
          <?php echo get_the_post_thumbnail(get_the_ID(),'six-five-medium');?>
        </a>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="category-owl-description">
          <hr>
          <div class="featured-title hidden-xs">Featured</div>
          <h2>
            <a href="<?php echo get_permalink();?>">
              <?php
                $thumbnail_title = get_field("thumbnail_title",get_the_ID());
                if($thumbnail_title == ""){
                  the_title();
                }else{
                  echo $thumbnail_title;
                }
              ?>
            </a>
          </h2>
          <div class="date_author"><?php echo get_the_date('M d, Y');?> / <?php echo get_cat_name( $categories[0] ) ?></div>
          <div class="carousel-excerpt hidden-xs">
            <?php the_excerpt();?>
          </div>
          <div class="hidden-xs"><a href="<?php echo get_permalink();?>" class="read_more">Read More</a></div>
        </div>
      </div>
    </div>
  <?php 
    endwhile;
endif;

//WP Resetter
wp_reset_postdata();
wp_reset_query(); ?>