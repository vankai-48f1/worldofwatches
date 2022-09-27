<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    
    
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <link rel="apple-touch-icon" sizes="57x57" href="https://worldofwatches.vn/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://worldofwatches.vn/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://worldofwatches.vn/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://worldofwatches.vn/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://worldofwatches.vn/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://worldofwatches.vn/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://worldofwatches.vn/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://worldofwatches.vn/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://worldofwatches.vn/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-180x180.png">
    <link rel="shortcut icon" type="image/png" href="https://worldofwatches.vn/wp-content/themes/Luxuo2017/images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="shortcut icon" type="image/png" href="https://worldofwatches.vn/wp-content/themes/Luxuo2017/images/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="shortcut icon" type="image/png" href="https://worldofwatches.vn/wp-content/themes/Luxuo2017/images/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="shortcut icon" type="image/png" href="https://worldofwatches.vn/wp-content/themes/Luxuo2017/images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="https://worldofwatches.vn/wp-content/themes/Luxuo2017/images/favicons/manifest.json">
    <link rel="mask-icon" href="https://worldofwatches.vn/wp-content/themes/Luxuo2017/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="https://worldofwatches.vn/wp-content/themes/Luxuo2017/images/favicons/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/axxx.js" async="true"></script>
    
    <?php wp_head(); ?>
    <script type="text/javascript" class="teads" src="//a.teads.tv/page/114077/tag" async="true"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132337945-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-132337945-1');
    </script>
    
    <script>
        window._wp_rp_wp_ajax_url = "<?php echo admin_url("admin-ajax.php")?>";
    </script>
    <?php //get_template_part('ad-zones/gpt'); ?>
</head>

<!-- Url wp admin ajax -->
<input type="hidden" name="luxuo_wp_admin_ajax" value="<?php echo admin_url("admin-ajax.php")?>">

<body <?php body_class(); ?>>
<!-- Google Tag Manager Old-->
<!-- <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-58LW48" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NWX8L3G"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="banner" style="text-align: center;">
<?php


$site_name = get_bloginfo( 'name' );
$site_description = get_bloginfo( 'description' );

// hide ads on search page and sponsored article
$sponsored_article = "No";

if(is_single()) {
    $sponsored_article = get_field("sponsored_article", get_the_ID());
}

if(!is_search()) { ?>
    <!--<?php if($sponsored_article != "Yes") { ?>-->
    
     <?php $irandom = mt_rand(0, 1); 
        if ($irandom == 0){
      ?>
    
    <?php dynamic_sidebar('top-header'); ?>
    <?php } else{  ?>
    <?php dynamic_sidebar('top-header-2'); ?>
    <?php } ?>

    <?php } ?>
<?php } ?>
</div>
<div id="menu_outer_wrapper">
    <div class="menu_inner_wrapper">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" id="mobile-menu-btn" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mobile-menu" aria-expanded="false">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <h1 style="margin-top:0px;">
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo  $site_name.' - '.$site_description; ?>" alt="<?php echo  $site_name.' - '.$site_description; ?>>">
                            <img src="<?php echo get_template_directory_uri();?>/images/logo.png" title="<?php echo  $site_name.' - '.$site_description; ?>" class="img-responsive logo" alt="<?php echo  $site_name.' - '.$site_description; ?>>">
                        </a>
                    </h1>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="hidden-xs hidden-sm desktop-nav-wrapper">

                    <div class="menu-social-container navbar-right">
                        <a href="https://www.facebook.com/luxuo" target="_blank">
                            <svg version="1.1" id="Layer_1" class="black-fb" x="0px" y="0px"
                                 viewBox="0 0 155.5 144" xml:space="preserve">
                    <path id="fb" d="M38.9,68.1h14.4v75.4h31V68.1h19.3l5.3-22.8H84.3v-8.5c-1.6-6.3,2.2-12.8,8.5-14.5c1.6-0.4,3.3-0.5,5-0.2
                      c4.8,0.5,9.3,2.4,13.2,5.3L116.6,6c-8-3-16.3-4.9-24.8-5.5c-7.9-0.2-15.8,1.2-23.2,4.2c-5.3,2.7-9.5,7-12,12.4
                      c-2.5,6.1-3.7,12.6-3.3,19.2v9H38.9L38.9,68.1L38.9,68.1z"/>
                    </svg>
                        </a>
                        <a href="https://www.instagram.com/luxuo" target="_blank">
                            <svg version="1.1" id="Layer_1" x="0px" y="0px" class="black-instagram" style="margin-left: -4px;"
                                 viewBox="0 0 155.5 144" xml:space="preserve">
                    <g>
                        <path class="st0" d="M77.7,13c19.2,0,21.5,0.1,29.1,0.4c7,0.3,10.8,1.5,13.4,2.5c3.4,1.3,5.8,2.9,8.3,5.4c2.5,2.5,4.1,4.9,5.4,8.3
                        c1,2.5,2.2,6.3,2.5,13.4c0.3,7.6,0.4,9.9,0.4,29.1s-0.1,21.5-0.4,29.1c-0.3,7-1.5,10.8-2.5,13.4c-1.3,3.4-2.9,5.8-5.4,8.3
                        c-2.5,2.5-4.9,4.1-8.3,5.4c-2.5,1-6.3,2.2-13.4,2.5c-7.6,0.3-9.9,0.4-29.1,0.4s-21.5-0.1-29.1-0.4c-7-0.3-10.8-1.5-13.4-2.5
                        c-3.4-1.3-5.8-2.9-8.3-5.4c-2.5-2.5-4.1-4.9-5.4-8.3c-1-2.5-2.2-6.3-2.5-13.4c-0.3-7.6-0.4-9.9-0.4-29.1s0.1-21.5,0.4-29.1
                        c0.3-7,1.5-10.8,2.5-13.4c1.3-3.4,2.9-5.8,5.4-8.3c2.5-2.5,4.9-4.1,8.3-5.4c2.5-1,6.3-2.2,13.4-2.5C56.2,13.1,58.5,13,77.7,13
                         M77.7,0c-19.5,0-22,0.1-29.7,0.4C40.4,0.8,35.2,2,30.6,3.8c-4.7,1.8-8.7,4.3-12.7,8.3c-4,4-6.5,8-8.3,12.7
                        c-1.8,4.6-3,9.8-3.3,17.5C5.8,50,5.8,52.5,5.8,72c0,19.5,0.1,22,0.4,29.7c0.3,7.7,1.6,12.9,3.3,17.5c1.8,4.7,4.3,8.7,8.3,12.7
                        c4,4,8,6.5,12.7,8.3c4.6,1.8,9.8,3,17.5,3.3c7.7,0.4,10.1,0.4,29.7,0.4s22-0.1,29.7-0.4c7.7-0.3,12.9-1.6,17.5-3.3
                        c4.7-1.8,8.7-4.3,12.7-8.3c4-4,6.5-8,8.3-12.7c1.8-4.6,3-9.8,3.3-17.5c0.4-7.7,0.4-10.1,0.4-29.7s-0.1-22-0.4-29.7
                        c-0.3-7.7-1.6-12.9-3.3-17.5c-1.8-4.7-4.3-8.7-8.3-12.7c-4-4-8-6.5-12.7-8.3c-4.6-1.8-9.8-3-17.5-3.3C99.7,0.1,97.3,0,77.7,0
                        L77.7,0z"/>
                        <path class="st0" d="M77.7,35c-20.4,0-37,16.5-37,37s16.5,37,37,37s37-16.5,37-37S98.1,35,77.7,35z M77.7,96c-13.2,0-24-10.7-24-24
                        s10.7-24,24-24s24,10.7,24,24S91,96,77.7,96z"/>
                        <circle class="st0" cx="116.1" cy="33.6" r="8.6"/>
                    </g>
                    </svg>
                        </a>
                        <a href="https://www.twitter.com/luxuo" target="_blank">
                            <svg version="1.1" id="Layer_1" x="0px" y="0px" class="black-twitter"
                                 viewBox="0 0 155.5 144" xml:space="preserve">
                    <path id="Vector_Logo" d="M155.5,24.3c-6.6,2.7-13.6,4.5-20.7,5.3c7.3-5.3,12.7-12.7,15.5-21.2c-6.1,3.7-13.4,9.2-20.7,10.6
                      c-5.4-6.5-13.4-10.4-21.9-10.6C90,8.5,77.7,22.5,77.7,40.2c-0.3,3.5-0.3,7.1,0,10.6c-26.5-1.3-51.6-17.7-67.3-37.1
                      C7.3,18.5,5.5,24,5.2,29.6c0.5,10.8,6.3,20.8,15.5,26.5c-5,0.2-10-0.8-14.5-3v0.4c0,15.5,10.3,31.4,24.8,34.3
                      c-3.4,0.4-6.9,0.4-10.3,0c-1.7,0.2-3.5,0.2-5.2,0c4.8,12.9,17.3,21.4,31.1,21.2c-11.2,8.5-25,13-39,12.5c-2.6-0.5-5.1-1.1-7.6-1.9
                      c14.4,9.9,31.4,15.4,48.9,15.9c58.6,0,90.7-48.9,90.7-91.3c0-1.4,0-2.8-0.1-4.2C145.8,35.9,151.2,30.5,155.5,24.3z"/>
                    </svg>

                        </a>
                        <a href="https://www.pinterest.com/luxuo" target="_blank">
                            <svg version="1.1" id="Layer_1" x="0px" y="0px" class="black-pinterest"
                                 width="512px" height="512px" viewBox="0 0 512 512" xml:space="preserve">
                    <g>
                        <path d="M256,32C132.3,32,32,132.3,32,256c0,91.7,55.2,170.5,134.1,205.2c-0.6-15.6-0.1-34.4,3.9-51.4
                        c4.3-18.2,28.8-122.1,28.8-122.1s-7.2-14.3-7.2-35.4c0-33.2,19.2-58,43.2-58c20.4,0,30.2,15.3,30.2,33.6
                        c0,20.5-13.1,51.1-19.8,79.5c-5.6,23.8,11.9,43.1,35.4,43.1c42.4,0,71-54.5,71-119.1c0-49.1-33.1-85.8-93.2-85.8
                        c-67.9,0-110.3,50.7-110.3,107.3c0,19.5,5.8,33.3,14.8,43.9c4.1,4.9,4.7,6.9,3.2,12.5c-1.1,4.1-3.5,14-4.6,18
                        c-1.5,5.7-6.1,7.7-11.2,5.6c-31.3-12.8-45.9-47-45.9-85.6c0-63.6,53.7-139.9,160.1-139.9c85.5,0,141.8,61.9,141.8,128.3
                        c0,87.9-48.9,153.5-120.9,153.5c-24.2,0-46.9-13.1-54.7-27.9c0,0-13,51.6-15.8,61.6c-4.7,17.3-14,34.5-22.5,48
                        c20.1,5.9,41.4,9.2,63.5,9.2c123.7,0,224-100.3,224-224C480,132.3,379.7,32,256,32z"/>
                    </g>
                    </svg>
                        </a>
                        <a href="" class="search-btn">
                            <svg version="1.1" id="Layer_1" x="0px" y="0px" class="search-icon" style="margin-left: -2px;"
                                 width="512px" height="512px" viewBox="0 0 512 512" xml:space="preserve">
                    <path d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3
                      c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2
                      c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2
                      c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z"/>
                    </svg>
                        </a>
                    </div>

                    <?php
                    $current_url="//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                    $values = parse_url($current_url);
                    $paths = explode('/',$values['path']);

                    global $exclude_categories;
                    global $exclude_categories_for_home;
                    ?>
                    <ul class="nav navbar-nav navbar-right menu-bar">
                        
                        <?php
                        global $style;
                        $categories = get_categories(array('exclude'=>$exclude_categories,'parent'=>0,'orderby'=>'description','order'=>'ASC'));
                        ?>
                        <?php foreach ($categories as $category) { ?>
                            <?php
                            if($category->cat_ID >= $style){
                                $args = array('child_of' => $category->cat_ID,'hide_empty' => FALSE,'orderby'=>'id','order'=>'ASC','exclude'=>$exclude_categories);
                                $sub_categories = get_categories($args);

                                if(count($sub_categories) > 0){
                                    ?>
                                    <li class="cat-menu-list <?php echo ($paths[1]==$category->slug)?'active-menu':'' ;?>">
                                        <a href="javascript:void(0)" id="<?php echo $category->slug;?>"><?php echo $category->name;?></a>
                                        <div class="expend-menu">
                                            <div class="pull-right" id="close-menu">[CLOSE]</div>
                                            <div class="sub-menu-wrapper">
                                                <div class="row">
                                                    <div class="col-md-10 col-md-offset-2">
                                                        <div class="row">
                                                            <div class="col-md-2 sub-categories-wrapper">
                                                                <h3 class="text-uppercase"><a href="<?php get_site_url(); ?>/<?php echo $category->slug;?>"><?php echo $category->name;?></a></h3>
                                                                <!-- <ul class="sub-cates">
                                                                    <?php
                                                                    $unpublish_cat = 0;
                                                                    foreach ($sub_categories as $sub_category) {
                                                                        if($unpublish_cat==$sub_category->term_id){
                                                                            continue;
                                                                        }

                                                                        if( strtolower($sub_category->name) == 'finance'){
                                                                            continue;
                                                                        }
                                                                        ?>
                                                                        <li><a href="<?php echo get_term_link($sub_category); ?>"><?php echo $sub_category->name;?></a></li>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </ul> -->
                                                            </div>
                                                            <div class="col-md-8 sub-categories-preview">
                                                                <h3>LATEST IN <?php echo strtoupper($category->name);?></h3>
                                                                <div class="row">
                                                                    <?php
                                                                    $args = array('category_name' => $category->name,'posts_per_page' => '3', 'category__not_in' => $unpublish_cat);
                                                                    $the_query = new WP_Query( $args );
                                                                    ?>
                                                                    <?php if ( $the_query->have_posts() ) : ?>
                                                                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++;?>
                                                                            <?php
                                                                            $show_categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories,'child_of'=>$category->cat_ID));
                                                                            ?>
                                                                            <div class="col-md-4 each-menu-grid">
                                                                                <a href="<?php echo get_permalink();?>" class="take-me" data-url="<?php echo get_permalink();?>">
                                                                                    <?php echo get_the_post_thumbnail(get_the_ID(), array(240,200)); ?>
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
                                                                                    <div><?php echo get_cat_name( $show_categories[0] ); ?></div>
                                                                                </a>
                                                                            </div>
                                                                        <?php endwhile; ?>
                                                                        <?php wp_reset_postdata(); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php }else{?>
                                    <li class="cat-menu-list <?php echo ($paths[1]==$category->slug)?'active-menu':'' ;?>">
                                        <a href="<?php get_site_url(); ?>/<?php echo $category->slug;?>" id="<?php echo $category->slug;?>"><?php echo $category->name;?></a>
                                    </li>
                                <?php }?>
                            <?php }?>

                        <?php }?>
                    </ul>
                </div><!-- /.navbar-collapse -->

                <div id="search-container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right" id="close-search">[CLOSE]</div>
                                </div>
                                <div class="col-md-10">
                                    <form method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                                        <input type="search" name="s" id="search-box" placeholder="Type to search" value="<?php echo get_search_query(); ?>"/>
                                        <div class="clear-icon">
                                            <svg version="1.1" id="Layer_1"  x="0px" y="0px"
                                                 width="30px" height="30px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                              <g id="Icon_5_">
                                  <g>
                                      <polygon points="405,136.798 375.202,107 256,226.202 136.798,107 107,136.798 226.202,256 107,375.202 136.798,405 256,285.798
                                    375.202,405 405,375.202 285.798,256     "/>
                                  </g>
                              </g>
                            </svg>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->

            <div id="mobile-menu" class="navbar-collapse collapse">
                <div class="menu-header-menu-container">
                    <form method="get" class="mobile-search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="search" name="s" id="search-box" placeholder="Search" value="<?php echo get_search_query(); ?>"/>
                    </form>

                    <ul id="menu-header-menu" class="nav navbar-nav">
                       

                        <?php
                        foreach ($categories as $category) {
                            if($category->cat_ID >= $style){
                                $args = array('child_of' => $category->cat_ID,'hide_empty' => FALSE,'orderby'=>'id','order'=>'ASC','exclude'=>$exclude_categories);
                                $sub_categories = get_categories($args);
                                $classes  = 'menu-item menu-item-type-taxonomy menu-item-object-category';
                                if(count($sub_categories) > 0){
                                    $classes .= ' menu-item-has-children ';
                                }
                        ?>
                                <?php if(count($sub_categories) > 0){?>
                                    <li class="<?php echo $classes;?> dropdown <?php echo ($paths[1]==$category->slug || $paths[2]==$category->slug)?'active-menu':'' ;?>">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <?php echo $category->name;?> <span class="caret"></span>
                                        </a>
                                        <ul class="sub-menu dropdown-menu">
                                            <li><a href="<?php get_site_url(); ?>/<?php echo $category->slug;?>"> VIEW ALL </a></li>
                                            <?php foreach ($sub_categories as $key => $subcategory) { ?>
                                                <li><a href="<?php get_site_url(); ?>/category/<?php echo $category->slug;?>/<?php echo $subcategory->slug;?>"><?php echo $subcategory->name;?></a></li>
                                            <?php }?>
                                        </ul>
                                    </li>
                                <?php }else{?>
                                    <li class="<?php echo $classes;?> <?php echo ($paths[1]==$category->slug)?'active-menu':'' ;?>">
                                        <a href="<?php get_site_url(); ?>/<?php echo $category->slug;?>"><?php echo $category->name;?></a>
                                    </li>
                                <?php
                                }
                            }
                        }
                        ?>
                    </ul>

                    <?php
                    $advertisers_menu = wp_nav_menu( array(
                        'menu'           => 'Advertiser Menu', // Do not fall back to first non-empty menu.
                        'menu_class'     => 'sub-menu dropdown-menu',
                        'theme_location' => '__no_such_location',
                        'container'      => '',
                        'menu_id'        => '',
                        'echo'           => false,
                    ) );

                    if(!empty($advertisers_menu)){
                        ?>
                        <ul id="menu-header-menu" class="nav navbar-nav">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Advertisers <span class="caret"></span>
                                </a>
                                <?php echo $advertisers_menu; ?>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <div id="advertiser_menu_wrapper" class="hidden-xs hidden-sm">
            <div class="container-fluid">
                <?php
                wp_nav_menu( array(
                    'menu'           => 'Advertiser Menu', // Do not fall back to first non-empty menu.
                    'theme_location' => '__no_such_location',
                ) );
                ?>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid no-lr-padding">


    <div id="main">
