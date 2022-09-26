<?php
/**
 * The template for displaying Author Archive pages
 *
 * Used to display archive-type pages for posts by an author.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
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

    <h1 class="category-page-title">&nbsp;</h1>

    <?php get_template_part('ad-zones/leaderboard');?>

    <?php
    $current_page = get_queried_object();
    $category_id = 0;
    $author_id = get_the_author_meta( 'ID' );

    $query = new WP_Query(
        array(
            'author' => $author_id,
            'post_status'   => 'publish',
            'posts_per_page' => 6,
            'meta_query'	=> array(
                'relation'		=> 'AND',
                array(
                    'key'	 	=> 'contributor',
                    'value'	  	=> "",
                    'compare' 	=> 'NOT',
                ),
            ),
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
                            <div class="category-name">
                                Latest posts by <strong><?php echo get_the_author();?></strong>
                            </div>
                            <div class="category-articles-container">
                                <?php
                                if ( $query->have_posts() ) :
                                    while ( $query->have_posts() ) : $query->the_post();

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

                            <?php if( $query->found_posts > 6 ){ ?>
                                <div class="view-more-articles" id="category-load-more" data-author="<?php echo $author_id; ?>" data-category="<?php echo $category_id; ?>" data-layout="1" data-container="category-articles-container">View More Articles</div>
                            <?php } ?>
                        </div>
                        <div class="category-sidebar-container">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php get_footer(); ?>
