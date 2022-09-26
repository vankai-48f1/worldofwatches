<?php
/**
 * Slider Template
 */
?>

<?php add_action('wp_footer', function () { ?>
<?php }, 100); ?>

<?php
$args = array(
  'post_type' => 'sliders',
  'name' => 'watchwow',
  'posts_per_page' => 1
);
$sliders = get_posts($args);

if ($sliders && count($sliders) > 0):
?>

<div class="row category-featured-wrapper">
  <div class="col-md-10 col-md-offset-2">
    <div class="row">
      <div class="col-md-10">
        <div id="owl carousel-owl-container">
          <div id="category-owl" class="owl-carousel">

          <?php
          $post = $sliders[0];
          setup_postdata($post);
          $original_post = $post;
          $show_descriptions = get_field('show_slide_descriptions');

          while (have_rows('slider_slides')): the_row();
            $slide_info = '';
            $slide_image = null;
            $slide_url = null;
            $show_info = false;
            $post_excerpt = null;

            if (get_row_layout() == 'link_to_post') {
              $post_relation = get_sub_field('link_to_post_post')[0];
              $post = $post_relation;
              setup_postdata($post);

              // image
              $custom_image = get_sub_field('link_to_post_custom_image');

              if (!empty($custom_image)) {
                $slide_image = '<img src="' . $custom_image['sizes']['six-five-medium'] . '">';
              } else {
                $slide_image = get_the_post_thumbnail($post->ID, 'six-five-medium');
              }

              $slide_url = get_the_permalink();

              // titles
              $custom_title = get_sub_field('link_to_post_custom_title');
              $title = !empty($custom_title) ? $custom_title : get_the_title();
              $slide_info = !empty($title) ? $title : null;
              $post_excerpt = get_the_excerpt();

              $show_info = !empty($slide_info);

              // reset global $post to the parent slider post otherwise other layouts can't be found
              wp_reset_postdata();
              $post = $original_post;
            }
            elseif (get_row_layout() == 'upload_image') {
              // image
              $image_field = get_sub_field('upload_image_image');
              $image_url = $image_field['sizes']['six-five-medium'];
              $slide_image = "<img src='$image_url'>";
              $slide_url = get_sub_field('upload_image_link_url');

              // title
              $custom_title = get_sub_field('upload_image_custom_title');
              $slide_info .= !empty($custom_title) ? $custom_title : null;

              $show_info = !empty($slide_info);
            }
          ?>

              <div class="item row">
                <div class="col-md-8 col-sm-8">
                  <a href="<?= $slide_url; ?>" class="take-me" data-url="<?= $slide_url; ?>">
                    <?= $slide_image; ?>
                  </a>
                </div>

                <div class="col-md-4 col-sm-4">
                  <div class="category-owl-description">
                    <hr>
                    <div class="featured-title hidden-xs">Featured</div>

                    <h2>
                      <a href="<?= $slide_url; ?>">
                        <?= $slide_info; ?>
                      </a>
                    </h2>

                    <?php if (!is_null($post_excerpt)): ?>

                    <div class="carousel-excerpt hidden-xs">
                      <?= $post_excerpt; ?>
                    </div>

                    <?php endif; ?>

                    <div class="hidden-xs"><a href="<?= $slide_url; ?>" class="read_more">Read More</a></div>
                  </div>
                </div>
              </div><!-- .item.row -->

          <?php
          endwhile;
          wp_reset_postdata();
          ?>

          </div><!-- #category-owl -->
        </div><!-- #owl -->
      </div>
    </div>
  </div>
</div>

<?php
endif;
?>

