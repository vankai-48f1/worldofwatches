<?php
/**
 * Template Name: Search Temeplate
 *
 */

get_header(); ?>

<?php
global $wp_query;
?>
<div class="search-page-container">
    <div class="row search-form-container">
        <div class="col-md-10 col-md-offset-2">
            <div class="row">
                <div class="col-md-10">
                    <form method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="search" name="s" id="search-box" value="<?php echo the_search_query();?>">
                        <div class="search-box-icon">
                            <svg version="1.1" id="Layer_1" x="0px" y="0px"
                                 width="20px" height="20px" viewBox="0 0 512 512" xml:space="preserve">
              <path d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3
                c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2
                c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2
                c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z"/>
              </svg>
                        </div>
                        <div class="result-count"><?php echo ($wp_query->found_posts)>0 ? $wp_query->found_posts.' Results' :'';?></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section id="primary" class="search-content">
        <div id="content" role="main" class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="row">
                    <div class="col-md-10 search-result-container each-search-result">
                        <div class="row">
                            <?php if (have_posts() ) : ?>
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <?php
                                    $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories));
                                    ?>
                                    <div class="col-md-4 col-sm-4 col-xs-12 each-article">
                                        <a href="<?php echo get_permalink();?>" class="no-underline" class="take-me" data-url="<?php echo get_permalink();?>">
                                            <?php //echo get_the_post_thumbnail(get_the_ID(), 'six-five-medium');?>
                                            <?php echo get_the_post_thumbnail(get_the_ID(),'six-five-small');?>
                                            <div class="white-overlay">
                                                <a href="<?php echo get_permalink();?>" class="no-underline">
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
                                        </a>
                                    </div>
                                <?php endwhile; ?>
                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                    <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
                                        'next_text'          => __( 'Next page', 'twentyfifteen' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'twentyfifteen' ) . ' </span>',
                                    ) );
                                    ?>
                                </div>
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
</div>


<?php get_footer(); ?>
