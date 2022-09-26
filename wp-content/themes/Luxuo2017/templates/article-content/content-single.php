<?php
/**
 * The Template for displaying all single posts
 *
 */

get_header(); ?>

<?php
$postUrl = urlencode(get_permalink());
$postTitle = str_replace( ' ', '%20', get_the_title());
$postThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$postUrl;
$twitterURL = 'https://twitter.com/intent/tweet?text='.$postTitle.'&amp;url='.$postUrl.'&amp;via=Crunchify';
$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$postUrl.'&amp;media='.$postThumbnail[0].'&amp;description='.$postTitle;
$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$postUrl.'&amp;title='.$postTitle;
$whatsappURL = 'whatsapp://send?text='.$postTitle . ' ' . $postUrl;
$mailURL = 'mailto:?subject='.$postTitle.'&body='.$postUrl;

$sponsored_article = get_field("sponsored_article",get_the_ID());
?>

    <div class="single-article-page">
        <div class="single-article-wrapper">
            <?php
            if($sponsored_article != "Yes"){ ?>
                <div style="margin-bottom: 35px">
                    <?php get_template_part('ad-zones/leaderboard');?>
                </div>
                <?php
            }else if($sponsored_article == "Yes"){
                get_template_part('ad-zones/leaderboard-custom');
            }
            ?>

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
                                                <hr class="beside-title">
                                                <?php
                                                $category_id = "";
                                                $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories));
                                                if(!empty($categories)){
                                                    $c_id = array();
                                                    foreach($categories as $kk => $vv){
                                                        $c_id[] = $vv;
                                                    }

                                                    $category_id = implode($c_id, ',');

                                                    $parent = get_category($categories[0])->parent;
                                                    $category = '';
                                                    if(isset($parent) && $parent != 0){
                                                        $category .= get_the_category_by_ID($parent);
                                                        $category .= " / ";
                                                    }
                                                    $category .= get_the_category_by_ID($categories[0]);
                                                    $video_post = get_field("video_post",get_the_ID());
                                                }

                                                $author = get_the_author();
                                                $contributor = get_field("contributor",get_the_ID());

                                                if($contributor != ""){
                                                    $author = $contributor;
                                                }
                                                ?>
                                                <div class="single-article-categories"><?php echo $category; ?></div>
                                                <h2><?php echo the_title();?></h2>
                                                <div class="the-excerpt">
                                                    <?php
                                                        // Fetch post content
                                                            $content = get_post_field( 'post_content', get_the_ID() );
                                                            
                                                            // Get content parts
                                                            $content_parts = get_extended( $content );
                                                            
                                                            // Output part before <!--more--> tag
                                                            echo $content_parts['main'];
                                                                                                                ?>
                                                </div>
                                                <div class="the-author">
                                                    <?php echo get_the_date('M d, Y');?> | By <?php echo $author;?>
                                                    <?php
                                                    /* Uncomment this if you want author name to be clickable
                                                    | By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><?php echo $author;?></a>
                                                    */
                                                    ?>

                                                </div>
                                                <div class="share-btn-container">
                                                    <ul>
                                                        <li class="hidden-xs">SHARE</li>
                                                        <li>
                                                            <a class="share-link share-facebook" href="<?php echo $facebookURL; ?>" target="_blank">
                                                                <svg version="1.1" id="Layer_1" class="black-fb" x="0px" y="0px" width="20px" height="20px"
                                                                     viewBox="0 0 155.5 144" xml:space="preserve">
                                              <path fill="#3b5998" id="fb" d="M38.9,68.1h14.4v75.4h31V68.1h19.3l5.3-22.8H84.3v-8.5c-1.6-6.3,2.2-12.8,8.5-14.5c1.6-0.4,3.3-0.5,5-0.2
                                                c4.8,0.5,9.3,2.4,13.2,5.3L116.6,6c-8-3-16.3-4.9-24.8-5.5c-7.9-0.2-15.8,1.2-23.2,4.2c-5.3,2.7-9.5,7-12,12.4
                                                c-2.5,6.1-3.7,12.6-3.3,19.2v9H38.9L38.9,68.1L38.9,68.1z"/>
                                              </svg>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="share-link share-twitter" href="<?php echo $twitterURL; ?>" target="_blank">
                                                                <svg version="1.1" id="Layer_1" x="0px" y="0px" class="black-twitter" width="20px" height="20px"
                                                                     viewBox="0 0 155.5 144" xml:space="preserve">
                                              <path fill="#55acee" id="Vector_Logo" d="M155.5,24.3c-6.6,2.7-13.6,4.5-20.7,5.3c7.3-5.3,12.7-12.7,15.5-21.2c-6.1,3.7-13.4,9.2-20.7,10.6
                                                c-5.4-6.5-13.4-10.4-21.9-10.6C90,8.5,77.7,22.5,77.7,40.2c-0.3,3.5-0.3,7.1,0,10.6c-26.5-1.3-51.6-17.7-67.3-37.1
                                                C7.3,18.5,5.5,24,5.2,29.6c0.5,10.8,6.3,20.8,15.5,26.5c-5,0.2-10-0.8-14.5-3v0.4c0,15.5,10.3,31.4,24.8,34.3
                                                c-3.4,0.4-6.9,0.4-10.3,0c-1.7,0.2-3.5,0.2-5.2,0c4.8,12.9,17.3,21.4,31.1,21.2c-11.2,8.5-25,13-39,12.5c-2.6-0.5-5.1-1.1-7.6-1.9
                                                c14.4,9.9,31.4,15.4,48.9,15.9c58.6,0,90.7-48.9,90.7-91.3c0-1.4,0-2.8-0.1-4.2C145.8,35.9,151.2,30.5,155.5,24.3z"/>
                                              </svg>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="share-link share-pinterest" href="<?php echo $pinterestURL; ?>" target="_blank">
                                                                <svg version="1.1" id="Layer_1" x="0px" y="0px" class="black-pinterest"
                                                                     width="20px" height="20px" viewBox="0 0 512 512" xml:space="preserve">
                                              <g>
                                                  <path fill="#cb2027" d="M256,32C132.3,32,32,132.3,32,256c0,91.7,55.2,170.5,134.1,205.2c-0.6-15.6-0.1-34.4,3.9-51.4
                                                  c4.3-18.2,28.8-122.1,28.8-122.1s-7.2-14.3-7.2-35.4c0-33.2,19.2-58,43.2-58c20.4,0,30.2,15.3,30.2,33.6
                                                  c0,20.5-13.1,51.1-19.8,79.5c-5.6,23.8,11.9,43.1,35.4,43.1c42.4,0,71-54.5,71-119.1c0-49.1-33.1-85.8-93.2-85.8
                                                  c-67.9,0-110.3,50.7-110.3,107.3c0,19.5,5.8,33.3,14.8,43.9c4.1,4.9,4.7,6.9,3.2,12.5c-1.1,4.1-3.5,14-4.6,18
                                                  c-1.5,5.7-6.1,7.7-11.2,5.6c-31.3-12.8-45.9-47-45.9-85.6c0-63.6,53.7-139.9,160.1-139.9c85.5,0,141.8,61.9,141.8,128.3
                                                  c0,87.9-48.9,153.5-120.9,153.5c-24.2,0-46.9-13.1-54.7-27.9c0,0-13,51.6-15.8,61.6c-4.7,17.3-14,34.5-22.5,48
                                                  c20.1,5.9,41.4,9.2,63.5,9.2c123.7,0,224-100.3,224-224C480,132.3,379.7,32,256,32z"/>
                                              </g>
                                              </svg>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="share-link share-linkedin" href="<?php echo $linkedInURL; ?>" target="_blank">
                                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                     width="20px" height="20px" viewBox="0 0 155.5 144" style="enable-background:new 0 0 155.5 144;" xml:space="preserve">
                                              <g>
                                                  <g>
                                                      <g>
                                                          <path fill="#007aaa" d="M133.3,0H10.6C4.8,0,0,4.6,0,10.4v123.2c0,5.7,4.8,10.4,10.6,10.4h122.7c5.9,0,10.7-4.7,10.7-10.4V10.4
                                                      C144,4.6,139.2,0,133.3,0z M42.7,122.7H21.3V54h21.4V122.7z M32,44.6c-6.8,0-12.4-5.5-12.4-12.4c0-6.8,5.5-12.4,12.4-12.4
                                                      c6.8,0,12.4,5.5,12.4,12.4C44.4,39,38.9,44.6,32,44.6z M122.7,122.7h-21.3V89.3c0-8-0.1-18.2-11.1-18.2
                                                      c-11.1,0-12.8,8.7-12.8,17.6v34H56.1V54h20.5v9.4h0.3c2.9-5.4,9.8-11.1,20.2-11.1c21.6,0,25.6,14.2,25.6,32.7V122.7z"/>
                                                      </g>
                                                  </g>
                                                  <g>
                                                      <polygon points="147.5,119.1 148.7,119.1 148.7,122.7 149.3,122.7 149.3,119.1 150.5,119.1 150.5,118.5 147.5,118.5    "/>
                                                      <polygon points="154.6,118.5 153.3,121.6 152.1,118.5 151.2,118.5 151.2,122.7 151.8,122.7 151.8,119.5 153.1,122.7 153.5,122.7
                                                    154.8,119.5 154.8,122.7 155.5,122.7 155.5,118.5     "/>
                                                  </g>
                                              </g>
                                              </svg>

                                                            </a>
                                                        </li>
                                                        <li class="whatsapp-li">
                                                            <a class="share-link share-whatsapp" href="<?php echo $whatsappURL; ?>" target="_blank">
                                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                     width="20px" height="20px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                              <style type="text/css">
                                                  .st0-whatsapp{fill:#EDEDED;}
                                                  .st1{fill:#55CD6C;}
                                                  .st2{fill:#FEFEFE;}
                                              </style>
                                                                    <path class="st0-whatsapp" d="M0,512l35.3-128C12.4,344.3,0,300.1,0,254.2C0,114.8,114.8,0,255.1,0S512,114.8,512,254.2S395.5,512,255.1,512
                                                c-44.1,0-86.5-14.1-124.5-35.3L0,512z"/>
                                                                    <path class="st1" d="M137.7,430.8l7.9,4.4c32.7,20.3,70.6,32.7,110.3,32.7c115.6,0,211.9-96.2,211.9-213.6S371.6,44.1,255.1,44.1
                                                s-211,93.6-211,210.1c0,40.6,11.5,80.3,32.7,113.9l5.3,7.9l-20.3,74.2L137.7,430.8z"/>
                                                                    <path class="st2" d="M187.1,135.9l-16.8-0.9c-5.3,0-10.6,1.8-14.1,5.3c-7.9,7.1-21.2,20.3-24.7,38c-6.2,26.5,3.5,58.3,26.5,90
                                                s67.1,83,144.8,105c24.7,7.1,44.1,2.6,60-7.1c12.4-7.9,20.3-20.3,23-33.5l2.6-12.4c0.9-3.5-0.9-7.9-4.4-9.7l-55.6-25.6
                                                c-3.5-1.8-7.9-0.9-10.6,2.6L295.7,316c-1.8,1.8-4.4,2.6-7.1,1.8c-15-5.3-65.3-26.5-92.7-79.4c-0.9-2.6-0.9-5.3,0.9-7.1l21.2-23.8
                                                c1.8-2.6,2.6-6.2,1.8-8.8l-25.6-57.4C193.3,138.6,190.7,135.9,187.1,135.9"/>
                                              </svg>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="share-link share-mail" href="<?php echo $mailURL; ?>" target="_blank">
                                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                     width="20px" height="20px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                              <g>
                                                  <path fill="#a4832b" d="M67,148.7c11,5.8,163.8,89.1,169.5,92.1c5.7,3,11.5,4.4,20.5,4.4c9,0,14.8-1.4,20.5-4.4c5.7-3,158.5-86.3,169.5-92.1
                                                  c4.1-2.1,11-5.9,12.5-10.2c2.6-7.6-0.2-10.5-11.3-10.5H257H65.8c-11.1,0-13.9,3-11.3,10.5C56,142.9,62.9,146.6,67,148.7z"/>
                                                  <path fill="#a4832b" d="M455.7,153.2c-8.2,4.2-81.8,56.6-130.5,88.1l82.2,92.5c2,2,2.9,4.4,1.8,5.6c-1.2,1.1-3.8,0.5-5.9-1.4l-98.6-83.2
                                                  c-14.9,9.6-25.4,16.2-27.2,17.2c-7.7,3.9-13.1,4.4-20.5,4.4c-7.4,0-12.8-0.5-20.5-4.4c-1.9-1-12.3-7.6-27.2-17.2l-98.6,83.2
                                                  c-2,2-4.7,2.6-5.9,1.4c-1.2-1.1-0.3-3.6,1.7-5.6l82.1-92.5c-48.7-31.5-123.1-83.9-131.3-88.1c-8.8-4.5-9.3,0.8-9.3,4.9
                                                  c0,4.1,0,205,0,205c0,9.3,13.7,20.9,23.5,20.9H257h185.5c9.8,0,21.5-11.7,21.5-20.9c0,0,0-201,0-205
                                                  C464,153.9,464.6,148.7,455.7,153.2z"/>
                                              </g>
                                              </svg>

                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="the-content">
                                                    <?php if($video_post == "Yes"){?>
                                                        <div class="video-container">
                                                            <div>
                                                                <?php echo do_shortcode('[featured-video-plus]');?>
                                                            </div>
                                                        </div>
                                                    <?php }else{?>
                                                        <?php
                                                        if(strtotime(get_the_date()) <= strtotime("January 16 2017")){?>
                                                            <div class="featured-image-container">
                                                                <div>
                                                                    <?php //echo get_the_post_thumbnail(get_the_ID(), 'six-five-medium'); ?>
                                                                </div>
                                                            </div>
                                                        <?php }
                                                    }
                                                    ?>
                                                    <?php the_content( null, true ); ?>

                                                    <div data-da="<?php echo $category_id; ?>">
                                                      <?php
                                                    //   if ( shortcode_exists( 'luxify-search-bar' ) ) {
                                                    //       echo do_shortcode('[luxify-search-bar hide_cats="true"]');
                                                    //   }

                                                    //   if ( shortcode_exists( 'luxify-listings' ) ) {
                                                    //       echo do_shortcode('[luxify-listings query="" categories="' . $category_id . '" size="4" orderby="latest" title="Luxify listings"]');
                                                    //   }
                                                      ?>
                                                    </div>
                                                </div>

                                                <?php if($sponsored_article == "Yes"){ ?>
                                                    <!--<hr>-->
                                                <?php } ?>

                                                <hr class="separator">

                                                <div class="page_navigation">
                                                    <nav aria-label="...">
                                                        <div class="desktop_pager">
                                                            <ul class="pager">
                                                                <?php
                                                                $prev_post = get_previous_post();
                                                                $pager_post_id = $prev_post->ID;
                                                                $custom_title = get_field('display_title', $pager_post_id);
                                                                $title = !empty($custom_title) ? $custom_title : $prev_post->post_title;
                                                                ?>

                                                                <li class="previous">
                                                                    <?php if (!empty( $prev_post )): ?>
                                                                        <a href="<?php echo get_permalink($pager_post_id); ?>" title="<?php echo 'Previous article : '.$title; ?>" alt="<?php echo 'Previous article : '.$title; ?>">
                                                                            <div class="media">
                                                                                <div class="media_content">
                                                                                    <?php echo get_article_image($pager_post_id); ?>
                                                                                </div>
                                                                            </div>
                                                                            <span aria-hidden="true">&larr;</span> <?php echo $title; ?>
                                                                        </a>
                                                                    <?php endif ?>
                                                                </li>

                                                                <?php
                                                                $prev_post = get_next_post();

                                                                $pager_post_id = $prev_post->ID;
                                                                $custom_title = get_field('display_title', $pager_post_id);
                                                                $title = !empty($custom_title) ? $custom_title : $prev_post->post_title;
                                                                ?>
                                                                <li class="next">
                                                                    <?php if (!empty( $prev_post )): ?>
                                                                        <a href="<?php echo get_permalink($pager_post_id); ?>" title="<?php echo 'Next article : '.$title; ?>" alt="<?php echo 'Next article : '.$title; ?>">
                                                                            <div class="media">
                                                                                <div class="media_content">
                                                                                    <?php echo get_article_image($pager_post_id); ?>
                                                                                </div>
                                                                            </div>

                                                                            <?php echo $title; ?> <span aria-hidden="true">&rarr;</span>
                                                                        </a>
                                                                    <?php endif ?>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <ul class="pager mobile_pager">
                                                            <?php
                                                            $prev_post = get_previous_post();
                                                            $pager_post_id = $prev_post->ID;
                                                            $custom_title = get_field('display_title', $pager_post_id);
                                                            $title = !empty($custom_title) ? $custom_title : $prev_post->post_title;

                                                            if (!empty( $prev_post )): ?>
                                                                <li class="previous">
                                                                    <a href="<?php echo get_permalink($pager_post_id); ?>" title="<?php echo 'Previous article : '.$title; ?>" alt="<?php echo 'Previous article : '.$title; ?>">
                                                                        <span aria-hidden="true">&larr;</span> Previous
                                                                    </a>
                                                                </li>
                                                            <?php endif ?>
                                                            <?php
                                                            $prev_post = get_next_post();
                                                            $pager_post_id = $prev_post->ID;
                                                            $custom_title = get_field('display_title', $pager_post_id);
                                                            $title = !empty($custom_title) ? $custom_title : $prev_post->post_title;

                                                            if (!empty( $prev_post )): ?>
                                                                <li class="next">
                                                                    <a href="<?php echo get_permalink($pager_post_id); ?>" title="<?php echo 'Next article : '.$title; ?>" alt="<?php echo 'Next article : '.$title; ?>">
                                                                        Next <span aria-hidden="true">&rarr;</span>
                                                                    </a>
                                                                </li>
                                                            <?php endif ?>
                                                        </ul>
                                                    </nav>
                                                </div>
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

                    <?php
                    if($sponsored_article == "Yes"){
                        ?>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="row">
                                    <div class="col-md-10 single-article-container">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <?php get_template_part('ad-zones/leaderboard-custom'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="row ads-space-5">
                            <div class="col-md-12">
                                <?php get_template_part('ad-zones/billboard-2') ?>
                            </div>
                        </div>
                    <?php }?>
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

        <?php
        /*
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
        */
        ?>

        <?php
        /*
        if($sponsored_article == "Yes"){
            ?>
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="row">
                        <div class="col-md-10 single-article-container">
                            <div class="row">
                                <div class="col-md-8">
                                    <?php get_template_part('ad-zones/leaderboard-custom'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }else{
            ?>
            <div class="row ads-space-5">
                <div class="col-md-12">
                    <?php get_template_part('ad-zones/billboard-2') ?>
                </div>
            </div>
        <?php }
        */
        ?>


        <div class="row recommened-wrapper hidden-xs">
            <div class="col-md-10 col-md-offset-2">
                <div class="row">
                    <div class="col-md-10 each-category-section">
                        <hr>
                        <h3 class="section-title recommended-title">RECOMMENDED FOR YOU</h3>
                        <div class="row each-tile-wrapper lifestyle-container">
                            <?php //wp_related_posts()?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>