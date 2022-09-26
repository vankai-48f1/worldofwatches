<?php


get_header(); ?>

<section id="primary" class="page-content">
  <div id="content" role="main" class="row">
    <div class="col-md-10 col-md-offset-2">
      <div class="row">
        <div class="col-md-10">
          <div class="row">
            <?php if (have_posts() ) : ?>
              <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-md-12">
                  <h3><?php the_title();?></h3>
                  <div><?php the_content(); ?></div>
                </div>
              <?php endwhile; ?>
            <?php else: ?>
              <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                Sorry, no posts matched your criteria.
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="row ads-space-5 no-margin-bottom">
  <div class="col-md-12">
    <?php get_template_part('ad-zones/fullwidth-banner')?>
  </div>
</div>

<?php get_footer(); ?>
