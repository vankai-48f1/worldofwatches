<?php
$slider_tag_name = get_field('slider_tag_name');

$query = new WP_Query(
    array(
      'post_status'   => 'publish',
      'posts_per_page' => 5,
      'post_status' => 'publish',
      'tag' => $slider_tag_name
    )
);

if ( $query->have_posts() ) :
    ?>
    <div class="row category-featured-wrapper">
        <div class="col-md-10 col-md-offset-2">
            <div class="row">
                <div class="col-md-10">
                    <div id="owl carousel-owl-container">
                        <div id="category-owl" class="owl-carousel">

    <?php
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
    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
endif;

//WP Resetter
wp_reset_postdata();
wp_reset_query(); ?>