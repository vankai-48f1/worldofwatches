<?php get_header(); ?>

<div class='container-fluid mag-page-wrap mag-page-wrap--watchwow mag-page-wrap--home'>

  <?php get_template_part('templates/watchwow/header'); ?>

  <?php get_template_part('templates/watchwow/slider'); ?>

  <?php get_template_part('ad-zones/leaderboard');?>

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
              $args = array('posts_per_page' => 20, 'tag' => 'wow-news,wow-features');
              $posts = get_posts($args);
              foreach ($posts as $post): setup_postdata($post);
              ?>

                <div class="row each-category-article each-article">
                  <div class="col-md-5 col-sm-5">
                    <a href="<?php the_permalink() ?>" class="take-me" data-url="<?= get_permalink();?>" >
                      <?= get_the_post_thumbnail(get_the_ID(),'six-five-medium');?>
                    </a>
                  </div>

                  <div class="col-md-7 col-sm-7">
                    <h3>
                      <a href="<?php the_permalink() ?>" >
                        <?php
                          $thumbnail_title = get_field('thumbnail_title', get_the_ID());
                          echo $thumbnail_title == '' ? the_title() : $thumbnail_title;
                        ?>
                      </a>
                    </h3>
                    <div class="date_author"><?= get_the_date('M d, Y'); ?> / <?= get_cat_name($categories[0]); ?></div>
                    <div><?= the_excerpt(); ?></div>
                  </div>
                </div>

                <hr class="separator">

              <?php
              endforeach;
              wp_reset_postdata();
              ?>

              </div>
            </div>

            <?php get_template_part('templates/watchwow/sidebar'); ?>

          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php get_footer(); ?>

