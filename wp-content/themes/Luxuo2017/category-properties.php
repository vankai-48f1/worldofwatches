<?php
/**
 * Template Name: Category Temeplate
 *
 */

get_header(); ?>


<section id="primary" class="">

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
    ?>

    <h1 class="category-page-title"><?php echo single_cat_title('',false);?></h1>

    <div class="row category-featured-wrapper">
        <div class="col-md-10 col-md-offset-2">
            <div class="row">
                <div class="col-md-10">
                    <div id="owl carousel-owl-container">
                        <div id="category-owl" class="owl-carousel">
                            <?php if ( $query->have_posts() ) : ?>
                                <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                                    <?php
                                    $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories));
                                    ?>
                                    <div class="item row">
                                        <div class="col-md-8 col-sm-8">
                                            <?php echo generate_post_thumbnail(get_the_ID(), 'six-five-medium', 2); ?>
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
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                            <?php //wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part('ad-zones/leaderboard');?>

    <?php
    $current_page = get_queried_object();
    $category     = $current_page->cat_ID;
    $category_id  = $category;

    $query = new WP_Query(
        array(
            'cat' => $category,
            'post_status'   => 'publish',
            'posts_per_page' => 6,
            'post_status' => 'publish'
        )
    );

    ?>

    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="row">
                <div class="col-md-10 category-container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 left-side">
                            <hr class="beside-title">
                            <div class="category-name">Latest</div>
                            <div class="category-articles-container">
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
                                                <?php echo generate_post_thumbnail(get_the_ID(), 'six-five-small', 1); ?>
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

                            <div class="view-more-articles" id="category-load-more" data-category="<?php echo $category_id; ?>" data-layout="1" data-container="category-articles-container">View More Articles</div>
                        </div>
                        <div class="category-sidebar-container">
                            <?php get_template_part('templates/properties/sidebar'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
