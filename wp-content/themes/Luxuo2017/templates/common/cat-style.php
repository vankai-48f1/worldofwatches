<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 5/28/2018
 * Time: 12:07 PM
 */
?>

<div class="row each-category-wrapper cat-layout-2">
    <div class="col-md-10 col-md-offset-2">
        <div class="row">
            <div class="col-md-10 each-category-section">
                <hr>
                <h3 class="section-title">STYLE</h3>
                <div class="row each-tile-wrapper style-container">
                    <?php
                    $style_id = 11797; //style
                    $args = array('cat' => $style_id, 'posts_per_page' => '4', 'post_status' => 'publish');
                    $the_query = new WP_Query( $args );
                    ?>
                    <?php if ( $the_query->have_posts() ) : ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
                            <?php
                            $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories,'child_of'=>$style_id));
                            $thumbnail_title = get_field("thumbnail_title",get_the_ID());
                            ?>
                            <div class="col-md-6 col-xs-12 col-sm-6 each-article">
                                <?php echo generate_post_thumbnail(get_the_ID(), array(600, 500), 2); ?>

                                <div class="white-overlay-bigger">
                                    <a href="<?php echo get_permalink();?>">
                                        <div class="summary summary-bigger">
                                            <h3>
                                                <?php
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
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>

                <div class="view-more-articles" id="style-load-more" data-category="<?php echo $style_id; ?>" data-layout="2" data-container="style-container">View More Articles</div>
            </div>
        </div>
    </div>
</div>
