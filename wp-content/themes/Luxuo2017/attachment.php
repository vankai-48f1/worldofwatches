<?php
/**
 * The template for displaying image attachments
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div class="single-article-page">
    <div class="single-article-wrapper">
        <div style="margin-bottom: 35px">
            <?php get_template_part('ad-zones/leaderboard');?>
        </div>

        <div id="article-post-content">
            <div class="content-wrapper">
                <!-- START of Infinite Scroll Content -->
                <div class="row ">
                    <div class="col-md-10 col-xs-12 col-md-offset-2">
                        <div class="row">
                            <div class="col-md-10 col-xs-12 single-article-container">
                                <div class="row">
                                    <div class="col-md-8 col-sm-8">
                                        <div>
                                            <h2><?php the_title(); ?></h2>

                                            <div class="the-content">
                                                <?php
                                                $attachment_size = apply_filters( 'twentytwelve_attachment_size', array( 960, 960 ) );
                                                echo wp_get_attachment_image( $post->ID, $attachment_size );
                                                ?>
                                            </div>

                                            <?php if ( ! empty( $post->post_excerpt ) ) : ?>
                                                <div class="entry-caption">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="entry-description">
                                                <?php the_content(); ?>
                                                <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
                                            </div><!-- .entry-description -->
                                        </div>
                                    </div>
                                    <?php get_sidebar();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END of Infinite Scroll Content -->

                <?php
                /*  Un-comment for infinite scrolling
                ?>
                <!-- Next Article -->
                <div class="row">
                    <div class="col-md-10 col-xs-12 col-md-offset-2">
                        <div class="row">
                            <div class="col-md-10 col-xs-12 single-article-container">
                                <div class="row">
                                    <div class="col-md-8 col-xs-12">
                                        <?php
                                        $next_post = get_previous_post();
                                        if (!empty( $next_post )): ?>
                                            <?php
                                            $categories = wp_get_post_categories($next_post->ID,array('exclude'=>$exclude_categories));
                                            ?>
                                            <a href="<?php echo get_permalink( $next_post->ID ); ?>" id="next-article"><h3 class="load-article">Load Next Article.</h3></a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4 col-xs-12"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Next Article -->
                */
                ?>

                <div class="row ads-space-5">
                    <div class="col-md-12">
                        <?php get_template_part('ad-zones/billboard-2') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Next Article Indicator -->
    <div class="row">
        <div class="col-md-10 col-xs-12 col-md-offset-2">
            <div class="row">
                <div class="col-md-10 col-xs-12 single-article-container">
                    <!--Infinite Scrolling Treshold-->
                    <div id="billboard-treshold">&nbsp;</div>

                    <div class="row">
                        <div class="col-md-8 col-xs-12" id="article_loading_indicator"></div>
                        <div class="col-md-4 col-xs-12"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Next Article -->
</div>

<?php get_footer(); ?>
