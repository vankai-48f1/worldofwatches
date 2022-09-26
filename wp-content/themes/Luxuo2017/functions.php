<?php
//add_filter('show_admin_bar', '__return_false');
/**
 * Twenty Twelve functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see https://codex.wordpress.org/Theme_Development and
 * https://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
    $content_width = 625;

/**
 * Twenty Twelve setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_setup() {
    /*
     * Makes Twenty Twelve available for translation.
     *
     * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentytwelve
     * If you're building a theme based on Twenty Twelve, use a find and replace
     * to change 'twentytwelve' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'twentytwelve' );

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    // This theme supports a variety of post formats.
    add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );

    /*
     * This theme supports custom background color and image,
     * and here we also set up the default background color.
     */
    add_theme_support( 'custom-background', array(
        'default-color' => 'e6e6e6',
    ) );

    // This theme uses a custom image size for featured images, displayed on "standard" posts.
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

    // Indicate widget sidebars can use selective refresh in the Customizer.
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'twentytwelve_setup' );

/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Return the Google font stylesheet URL if available.
 *
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Twelve 1.2
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentytwelve_get_font_url() {
    $font_url = '';

    /* translators: If there are characters in your language that are not supported
     * by Open Sans, translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentytwelve' ) ) {
        $subsets = 'latin,latin-ext';

        /* translators: To add an additional Open Sans character subset specific to your language,
         * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
         */
        $subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'twentytwelve' );

        if ( 'cyrillic' == $subset )
            $subsets .= ',cyrillic,cyrillic-ext';
        elseif ( 'greek' == $subset )
            $subsets .= ',greek,greek-ext';
        elseif ( 'vietnamese' == $subset )
            $subsets .= ',vietnamese';

        $query_args = array(
            'family' => 'Open+Sans:400italic,700italic,400,700',
            'subset' => $subsets,
        );
        $font_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return $font_url;
}

function lxscripts() {
    /* wp_enqueue_style( 'style', get_stylesheet_uri()); */

    if($_SERVER['SERVER_NAME'] == 'luxuo.localhost' || $_SERVER['HTTP_HOST'] == 'dev.luxuo.com' || $_SERVER['HTTP_HOST'] == 'localhost:8080' || $_SERVER['HTTP_HOST'] == 'localhost:80') {
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, null);
        wp_enqueue_style('owl', get_template_directory_uri() . '/css/owl.carousel.css', false, null);
        wp_enqueue_style('theme', get_template_directory_uri() . '/css/theme.css', null, false);
        wp_enqueue_script('jquery');
        wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), null);
        wp_enqueue_script('owljs', get_template_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ), null);
        wp_enqueue_script('jquery.clever-infinite-scroll', get_template_directory_uri() . '/js/jquery.clever-infinite-scroll.js', array( 'jquery' ), null);
        wp_enqueue_script('bootstrapscript', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), null);
    } else {
        wp_enqueue_style( 'style', get_template_directory_uri() . '/dist/all.min.css', null, false, null);
        //wp_enqueue_script( 'all-scripts', get_template_directory_uri() . '/dist/all.min.js', false, null);
        wp_enqueue_script( 'all-scripts', get_template_directory_uri() . '/dist/all.min.js', null, false);
    }
}

add_action( 'wp_enqueue_scripts', 'lxscripts' );

function styles_version($styles) {
    $styles->default_version = filemtime(get_stylesheet_directory() . '/dist/all.min.css'); //'2018190402'; //'2017021704';
}

add_action('wp_default_styles', 'styles_version');
add_action('wp_default_scripts', 'styles_version');

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Twelve 2.2
 *
 * @param array   $urls          URLs to print for resource hints.
 * @param string  $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function twentytwelve_resource_hints( $urls, $relation_type ) {
    if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
        if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '>=' ) ) {
            $urls[] = array(
                'href' => 'https://fonts.gstatic.com',
                'crossorigin',
            );
        } else {
            $urls[] = 'https://fonts.gstatic.com';
        }
    }

    return $urls;
}
add_filter( 'wp_resource_hints', 'twentytwelve_resource_hints', 10, 2 );

/**
 * Filter TinyMCE CSS path to include Google Fonts.
 *
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @uses twentytwelve_get_font_url() To get the Google Font stylesheet URL.
 *
 * @since Twenty Twelve 1.2
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string Filtered CSS path.
 */
function twentytwelve_mce_css( $mce_css ) {
    $font_url = twentytwelve_get_font_url();

    if ( empty( $font_url ) )
        return $mce_css;

    if ( ! empty( $mce_css ) )
        $mce_css .= ',';

    $mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

    return $mce_css;
}
add_filter( 'mce_css', 'twentytwelve_mce_css' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Twenty Twelve 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function twentytwelve_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    if( is_author() )
        return $title;

    // Add the site name.
    //$title .= get_bloginfo( 'name', 'display' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );


    return $title.'LUXUO';
}
add_filter( 'wp_title', 'twentytwelve_wp_title', 10, 2 );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_page_menu_args( $args ) {
    if ( ! isset( $args['show_home'] ) )
        $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'twentytwelve' ),
        'id' => 'sidebar-1',
        'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
    register_sidebar( array(
        'name' => __( 'Top Header', 'twentytwelve' ),
        'id' => 'top-header',
        'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
    register_sidebar( array(
        'name' => __( 'Top Header 2', 'twentytwelve' ),
        'id' => 'top-header-2',
        'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
   
    register_sidebar( array(
        'name' => __( 'Right Banner Home', 'twentytwelve' ),
        'id' => 'right-banner-home',
        'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
    register_sidebar( array(
        'name' => __( 'Center Banner Home', 'twentytwelve' ),
        'id' => 'center-banner-home',
        'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    

    register_sidebar( array(
        'name' => __( 'First Front Page Widget Area', 'twentytwelve' ),
        'id' => 'sidebar-2',
        'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    register_sidebar( array(
        'name' => __( 'Second Front Page Widget Area', 'twentytwelve' ),
        'id' => 'sidebar-3',
        'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
    register_sidebar( array(
        'name' => __( 'Right Banner Detail', 'twentytwelve' ),
        'id' => 'right-banner-detail',
        'description' => __( 'Right banner in detail', 'twentytwelve' ),
        'before_widget' => '<div id="%1$s" class="banner %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );    
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );

if ( ! function_exists( 'twentytwelve_content_nav' ) ) :
    /**
     * Displays navigation to next/previous pages when applicable.
     *
     * @since Twenty Twelve 1.0
     */
    function twentytwelve_content_nav( $html_id ) {
        global $wp_query;

        if ( $wp_query->max_num_pages > 1 ) : ?>
            <nav id="<?php echo esc_attr( $html_id ); ?>" class="navigation" role="navigation">
                <h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
                <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?></div>
                <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
            </nav><!-- .navigation -->
        <?php endif;
    }
endif;

if ( ! function_exists( 'twentytwelve_comment' ) ) :
    /**
     * Template for comments and pingbacks.
     *
     * To override this walker in a child theme without modifying the comments template
     * simply create your own twentytwelve_comment(), and that function will be used instead.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     *
     * @since Twenty Twelve 1.0
     */
    function twentytwelve_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case 'pingback' :
            case 'trackback' :
                // Display trackbacks differently than normal comments.
                ?>
                <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                <p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
                <?php
                break;
            default :
                // Proceed with normal comments.
                global $post;
                ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comment">
                    <header class="comment-meta comment-author vcard">
                        <?php
                        echo get_avatar( $comment, 44 );
                        printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
                            get_comment_author_link(),
                            // If current post author is also comment author, make it known visually.
                            ( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
                        );
                        printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                            esc_url( get_comment_link( $comment->comment_ID ) ),
                            get_comment_time( 'c' ),
                            /* translators: 1: date, 2: time */
                            sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
                        );
                        ?>
                    </header><!-- .comment-meta -->

                    <?php if ( '0' == $comment->comment_approved ) : ?>
                        <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
                    <?php endif; ?>

                    <section class="comment-content comment">
                        <?php comment_text(); ?>
                        <?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
                    </section><!-- .comment-content -->

                    <div class="reply">
                        <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </div><!-- .reply -->
                </article><!-- #comment-## -->
                <?php
                break;
        endswitch; // end comment_type check
    }
endif;

if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
    /**
     * Set up post entry meta.
     *
     * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
     *
     * Create your own twentytwelve_entry_meta() to override in a child theme.
     *
     * @since Twenty Twelve 1.0
     */
    function twentytwelve_entry_meta() {
        // Translators: used between list items, there is a space after the comma.
        $categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

        // Translators: used between list items, there is a space after the comma.
        $tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

        $date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
            esc_url( get_permalink() ),
            esc_attr( get_the_time() ),
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() )
        );

        $author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
            get_the_author()
        );

        // Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
        if ( $tag_list ) {
            $utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
        } elseif ( $categories_list ) {
            $utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
        } else {
            $utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
        }

        printf(
            $utility_text,
            $categories_list,
            $tag_list,
            $date,
            $author
        );
    }
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array $classes Existing class values.
 * @return array Filtered class values.
 */
function twentytwelve_body_class( $classes ) {
    $background_color = get_background_color();
    $background_image = get_background_image();

    if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
        $classes[] = 'full-width';

    if ( is_page_template( 'page-templates/front-page.php' ) ) {
        $classes[] = 'template-front-page';
        if ( has_post_thumbnail() )
            $classes[] = 'has-post-thumbnail';
        if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
            $classes[] = 'two-sidebars';
    }

    if ( empty( $background_image ) ) {
        if ( empty( $background_color ) )
            $classes[] = 'custom-background-empty';
        elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
            $classes[] = 'custom-background-white';
    }

    // Enable custom font class only if the font CSS is queued to load.
    if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
        $classes[] = 'custom-font-enabled';

    if ( ! is_multi_author() )
        $classes[] = 'single-author';

    return $classes;
}
add_filter( 'body_class', 'twentytwelve_body_class' );

/**
 * Adjust content width in certain contexts.
 *
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_width() {
    if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
        global $content_width;
        $content_width = 960;
    }
}
add_action( 'template_redirect', 'twentytwelve_content_width' );

/**
 * Register postMessage support.
 *
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Twelve 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function twentytwelve_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector' => '.site-title > a',
            'container_inclusive' => false,
            'render_callback' => 'twentytwelve_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector' => '.site-description',
            'container_inclusive' => false,
            'render_callback' => 'twentytwelve_customize_partial_blogdescription',
        ) );
    }
}
add_action( 'customize_register', 'twentytwelve_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Twenty Twelve 2.0
 * @see twentytwelve_customize_register()
 *
 * @return void
 */
function twentytwelve_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Twenty Twelve 2.0
 * @see twentytwelve_customize_register()
 *
 * @return void
 */
function twentytwelve_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_customize_preview_js() {
    wp_enqueue_script( 'twentytwelve-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20141120', true );
}
add_action( 'customize_preview_init', 'twentytwelve_customize_preview_js' );


/**
 *
 */
add_image_size('six-five-small',   300, 250, true);
add_image_size('six-five-medium',   660, 550, true);
add_image_size('six-five-large',  930, 775, true);




// $editors_pick = get_category_by_slug( 'news' )->cat_ID;
$homepage_slider = get_category_by_slug('homepage-slider')->cat_ID;
//$the_lux_list_featured = get_category_by_slug( 'the-lux-list-featured' )->cat_ID;
//$culture_featured = get_category_by_slug('culture-featured')->cat_ID;
//$properties_featured = get_category_by_slug('properties-featured')->cat_ID;
//$style = get_category_by_slug( 'hightlight' )->cat_ID;
$culture = get_category_by_slug( 'feature' )->cat_ID;
//$motoring = get_category_by_slug( 'hobbie-leisure' )->cat_ID;
$properties = get_category_by_slug( 'local-market' )->cat_ID;
//$lifestyle = get_category_by_slug( 'the-talks' )->cat_ID;
$the_lux_list = get_category_by_slug( 'wow-network' )->cat_ID;
$most_expensive = get_category_by_slug( 'most-expensive' )->cat_ID;
//$luxury_trands = get_category_by_slug( 'luxury-trends' )->cat_ID;
$luxuo = get_category_by_slug( 'luxuo' )->cat_ID;
$rolex = get_category_by_slug( 'rolex' )->cat_ID;
$cartier = get_category_by_slug( 'cartier' )->cat_ID;
$omega = get_category_by_slug( 'omega' )->cat_ID;
$patek_phillipe = get_category_by_slug( 'patek-philippe' )->cat_ID;
$speake_marin = get_category_by_slug( 'speake-marin' )->cat_ID;
$chopard = get_category_by_slug( 'chopard' )->cat_ID;
$the_talks = get_category_by_slug('the-talks')->cat_ID;

$exclude_categories = array($homepage_slider,$most_expensive, $luxuo, $rolex, $cartier, $omega, $patek_phillipe, $speake_marin, $chopard);

//$exclude_categories_for_home = array($editors_pick,$homepage_slider,$style,$culture,$motoring,$properties,$lifestyle,$the_lux_list,$most_expensive,$luxury_trands, $luxuo, $rolex, $cartier, $omega, $patek_phillipe, $speake_marin, $chopard, $the_talks);

if (!function_exists('luxuo_more_post_ajax')) {
    function luxuo_more_post_ajax(){
        global $exclude_categories;
        $layout     = (isset($_POST['layout'])) ? $_POST['layout'] : 3;
        $cat     = (isset($_POST['cat'])) ? $_POST['cat'] : 0;
        $offset  = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
        $cat = stripslashes($cat);
        $exclude = (isset($_POST['exclude'])) ? $_POST['exclude'] : 0;
        $author_id = (isset($_POST['author'])) ? $_POST['author'] : 0;

        if( !empty($author_id) ){
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => ($layout * 2),
                'author' => $author_id,
                'offset' => $offset,
                'post_status' => 'publish',
                'meta_query'	=> array(
                    'relation'		=> 'AND',
                    array(
                        'key'	 	=> 'contributor',
                        'value'	  	=> "",
                        'compare' 	=> 'NOT',
                    ),
                ),
            );
        }else {
            if (!is_numeric($cat)) {
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => ($layout * 2),
                    'offset' => $offset,
                    'post_status' => 'publish',
                    'tag' => $cat,
                );
            } else {
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => ($layout * 2),
                    'cat' => $cat,
                    'offset' => $offset,
                    'post_status' => 'publish',
                    'category__not_in' => $exclude
                );
            }
        }

        if($layout == 1){
            $args['posts_per_page'] = 12;
        }

        $out = '';
        $loop = new WP_Query($args);

        //layout for category page
        if($layout == 1){
            if ($loop -> have_posts()) :
                while ($loop -> have_posts()) :
                    $loop -> the_post();
                    $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories));
                    $thumbnail_title = get_field("thumbnail_title",get_the_ID());
                    if($thumbnail_title == ""){
                        $show_title = get_the_title();
                    }else{
                        $show_title = $thumbnail_title;
                    }
                    $out .= '<div class="row each-category-article each-article">';
                    $out .= ' <div class="col-md-5 col-sm-5">';
                    $out .=  generate_post_thumbnail(get_the_ID(), 'six-five-medium', 2);
                    $out .= ' </div>';
                    $out .= ' <div class = "col-md-7 col-sm-7">';
                    $out .= '   <h3> <a href="'.esc_url( get_permalink() ).'"> '.$show_title.'</a></h3>';
                    $out .= '   <div class="date_author">'.get_the_date('M d, Y').' / '.get_cat_name( $categories[0] ).'</div>';
                    $out .= '   <div>'.get_the_excerpt().'</div>';
                    $out .= ' </div>';
                    $out .= '</div>';
                    $out .= '<hr class="separator">';
                endwhile;
            endif;
        }else{
            $col = 'col-md-4 col-sm-4';
            if($layout == 2){
                $col = 'col-md-6 col-sm-6';
            }

            if ($loop -> have_posts()) :
                while ($loop -> have_posts()) :
                    $loop -> the_post();
                    $image = generate_post_thumbnail(get_the_ID(), 'six-five-medium', 2); //get_the_post_thumbnail(get_the_ID(),'six-five-medium');
                    if($cat == "the lux list" || $cat == "Editor's Picks"){
                        $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories));
                    }else{
                        $categories = wp_get_post_categories(get_the_ID(),array('exclude'=>$exclude_categories,'child_of'=>get_category_by_slug( $cat )->term_id));
                    }
                    $thumbnail_title = "";
                    $thumbnail_title = get_field("thumbnail_title",get_the_ID());

                    if($thumbnail_title == ""){
                        $show_title = get_the_title();
                    }else{
                        $show_title = $thumbnail_title;
                    }

                    $overlay = '<div class="white-overlay">';
                    $summary = 'summary';
                    if($layout == 2){
                        $overlay = '<div class="white-overlay-bigger">';
                        $summary .=' summary-bigger';
                    }
                    $out .='<div class="'.$col.' col-xs-12 each-article">';
                    $out .= $image;
                    $out .= $overlay;
                    $out .= '<a href="'.esc_url( get_permalink() ).'">';
                    $out .= '<div class = "'.$summary.'">';
                    $out .= '<h3>'.$show_title.'</h3>';
                    $out .= '<div>'.get_the_date('M d, Y').' / '.get_cat_name($categories[0]).'</div>';
                    $out .= '</div>';
                    $out .= '</a>';
                    $out .= '</div></div>';
                endwhile;
            endif;
        }

        wp_reset_postdata();

        wp_die($out);
    }
}

add_action('wp_ajax_nopriv_luxuo_more_post_ajax', 'luxuo_more_post_ajax');
add_action('wp_ajax_luxuo_more_post_ajax', 'luxuo_more_post_ajax');

/*
ACF
*/
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

/******** WOW / AR Pages *********/
function add_mag_page_query_vars($vars){
    $vars[] = 'mag-page-tag';
    return $vars;
}

add_filter('query_vars', 'add_mag_page_query_vars');


/******** Custom Post Types *********/
$post_types = [
    'lib/custom-post-types/slider.php',
];

foreach ($post_types as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);

/******** Generic Functions *********/
function pre_data($str){
    echo '<xmp>';
    print_r($str);
    echo '</xmp>';
}

function get_acf_image($arr, $size = 'medium'){
    if(!empty($arr)){
        return $arr['sizes'][$size];
    }

    return "Unknown";
}

function generate_new_filename($arr){
    if(!empty($arr) && is_array($arr)){
        $old_image_url = $arr['url'];
        $old_file_name = $arr['filename'];
        $file_name = explode('.', $arr['filename']);
        $last_index = count($file_name) - 1;
        $extension = $file_name[$last_index];
        $new_file_name = str_replace(".".$extension, "", $old_file_name)."-930x355.".$extension;
        $new_image_url = str_replace($old_file_name, $new_file_name, $old_image_url);

        return $new_image_url;
    }
}


/*
|--------------------------------------------------------------------------
|Mini Site
|--------------------------------------------------------------------------
*/
/**
 * Remove the slug from published post permalinks. Only affect our custom post type, though.
 */
/*function lx_remove_cpt_slug( $post_link, $post, $leavename ) {

    if ( 'advertiser' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'lx_remove_cpt_slug', 10, 3 );*/

/**
 * Have WordPress match postname to any of our public post types (post, page, race)
 * All of our public post types can have /post-name/ as the slug, so they better be unique across all posts
 * By default, core only accounts for posts and pages where the slug is /post-name/
 */
/*function lx_parse_request_trick( $query ) {

    // Only noop the main query
    if ( ! $query->is_main_query() )
        return;

    // Only noop our very specific rewrite rule match
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'advertiser' ) );
    }
}
add_action( 'pre_get_posts', 'lx_parse_request_trick' );*/


/*
|--------------------------------------------------------------------------
| Override single template for AMP plugin
|--------------------------------------------------------------------------
*/
function dbawp_amp_set_custom_template( $file, $type, $post ) {
    if ( 'single' === $type ) {
        $file = dirname( __FILE__ ) . '/amp/templates/single.php';
    }

    return $file;
}

//add_filter( 'amp_post_template_file', 'dbawp_amp_set_custom_template', 10, 3 );
/*
|--------------------------------------------------------------------------
| Let's load our AMP template for single post only if AMP Plugin is enabled
| and visitor using mobile
|--------------------------------------------------------------------------
*/

if( function_exists('amp_render') ){
    function add_amp_support(){
        if ( ! is_single() ) {
            return;
        }

        if ( wp_is_mobile() ) {
            amp_render();
        }
    }

    //add_action( 'template_redirect', 'add_amp_support' );
}


function get_article_image($id, $image_format = 'six-five-small'){
    return get_the_post_thumbnail($id,$image_format);
}

if(!function_exists('generate_post_thumbnail')) {
    function generate_post_thumbnail($post_id, $size = 'six-five-small', $image_size = 1){
        if (intval($post_id)) {
            $post_id = intval($post_id);
            $template_uri = get_template_directory_uri();
            $image = get_the_post_thumbnail($post_id, $size);

            if ( !empty($image) ) {
                if( !has_post_video($post_id) ){
                    $html = '<a href="' . get_permalink($post_id) . '" data-url="' . get_permalink($post_id) . '" class="no-underline take-me box-featured-image">';
                    $html .= $image;
                    $html .= '</a>';
                }else{
                    $html = $image;
                }

                return $html;
            }

            switch ($image_size) {
                //1 column x 1 row
                case 3:
                    $file_name = '600x500';

                    break;
                //2 columns x 1 row
                case 2:
                    $file_name = '600x500';

                    break;
                //3 columns x 1 row
                default:
                    $file_name = '300x250';

                    break;
            }

            $html = '<a href="' . get_permalink($post_id) . '" data-url="' . get_permalink($post_id) . '" class="no-underline take-me box-featured-image">';
                $html .= '<img src="' . $template_uri . '/images/no-image/no-image-' . $file_name . '.jpg" class="size-six-five-small wp-no-image">';
            $html .= '</a>';

            return $html;
        }

        return null;
    }
}

if( !function_exists('add_class_box_featured_image') ){
    function add_class_box_featured_image($post_id){
        return !has_post_video($post_id) ? "box-featured-image" : "";
    }
}

/*
 * API RELATED STUFF
 *
*/


//Add custom field to API response
function slider_get_post_meta($object, $field_name, $request){
    if( empty($object) ) { return null; }

    $banner_image = get_field("banner_image", $object['id']);

    if( !empty($banner_image) ){
        return array(
            'id' => $banner_image['id'],
            'media_details' => array(
                'url' => $banner_image['url'],
                'width' => $banner_image['width'],
                'height' => $banner_image['height']
            ),
        );
    }

    return null;
}

add_action('rest_api_init', function(){
    register_rest_field('post', 'banner_image',
        array(
            'get_callback' => 'slider_get_post_meta',
            'schema' => null
        )
    );
});
