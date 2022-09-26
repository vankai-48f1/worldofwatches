<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 5/28/2018
 * Time: 12:07 PM
 */
?>

<div class="row each-category-wrapper cat-layout-3">
    <div class="col-md-10 col-md-offset-2">
        <div class="row">
            <div class="col-md-10 each-category-section">
                <hr>
                <h3 class="section-title">THE LUX LIST</h3>
                <?php
                $the_lux_list_id = 11802; //The Lux List
                $the_lux_list_featured_id = 11806; //The Lux List Featured
                $args = array('cat' => $the_lux_list_featured_id, 'posts_per_page' => '1','post_status' => 'publish');
                $the_query = new WP_Query( $args );
                ?>
                <div class="row each-tile-wrapper">
                    <?php if ( $the_query->have_posts() ) : ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
                            <?php
                            $post_id = get_the_ID();
                            $banner_image = get_field("banner_image",$post_id);
                            $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories));
                            ?>
                            <div class="col-md-12 each-article big-article">
                                <a href="<?php echo get_permalink();?>">
                                    <img src="<?php echo generate_new_filename($banner_image); ?>" width="980">
                                </a>
                                <div class="black-overlay">
                                    <div class="black-summary">
                                        <div><?php echo get_the_date('M d, Y');?> / <?php echo get_cat_name( $categories[0] ) ?></div>
                                        <a href="<?php echo get_permalink();?>" class="no-underline">
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
                                        </a>
                                        <a href="<?php echo get_permalink();?>">Read More</a>
                                    </div>
                                </div>
                                <div class="visible-xs black-summary-mobile">
                                    <a href="<?php echo get_permalink();?>" class="no-underline">
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
                                    </a>
                                    <div><?php echo get_the_date('M d, Y');?> / <?php echo get_cat_name( $categories[0] ) ?></div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>

                <div class="row each-tile-wrapper the-lux-list-container">
                    <?php
                    $args = array('cat' => $the_lux_list_id,'category__not_in'=>$the_lux_list_featured,'posts_per_page' => '3','post_status' => 'publish');
                    $the_query = new WP_Query( $args );
                    ?>
                    <?php if ( $the_query->have_posts() ) : ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
                            <?php
                            $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories));
                            ?>
                            <div class="col-md-4 col-sm-4 col-xs-12 each-article">
                                <?php echo generate_post_thumbnail(get_the_ID(), 'six-five-small', 1); ?>

                                <div class="white-overlay">
                                    <a href="<?php echo get_permalink();?>">
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
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>

                <div class="view-more-articles" id="the-lux-list-load-more" data-category="<?php echo $the_lux_list_id; ?>" data-exclude-category="<?php echo $the_lux_list_featured;?>" data-layout="3" data-container="the-lux-list-container">View More Articles</div>
            </div>
        </div>
    </div>
</div>
