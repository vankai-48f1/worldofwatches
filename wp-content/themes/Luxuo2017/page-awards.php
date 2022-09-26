<?php
/*
 * Template Name: Awards
 */

get_header(); ?>

<section id="primary" class="page-content">
    <div id="content" role="main" class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="award_wrapper">
                                <div class="award_heading">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/image_christofle.jpg">
                                </div>

                                <div class="meta_content">

                                    <?php if (have_posts() ) : ?>
                                        <?php while ( have_posts() ) : the_post(); ?>
                                            <div class="description"><?php the_content(); ?></div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>

                                    <div class="row award_title">
                                        <div class="col-md-6">
                                            <p><?php echo get_field('boat_and_builder_categories'); ?></p>
                                        </div>
                                        <div class="col-md-5 col-md-offset-1">
                                            <p><?php echo get_field('other_categories'); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row award_main_sponsor">
                                    <div class="col-md-3 col-sm-6 organizer">
                                        <p>Organizer:</p>

                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img_yacht_style.jpg">
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <p>Awards Sponsor:</p>

                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img_christofle.jpg">
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <p>Awards Venue Sponsor:</p>

                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img_phuket_boat_lagoon.jpg">
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <p>Organized During:</p>

                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img_phuket_rendezvous.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
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
