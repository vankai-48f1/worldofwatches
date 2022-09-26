<!doctype html>
<html amp <?php echo AMP_HTML_Utils::build_attributes_string( $this->get( 'html_tag_attributes' ) ); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    
    <link rel="apple-touch-icon" sizes="57x57" href="//cdn.luxuo.com/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="//cdn.luxuo.com/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="//cdn.luxuo.com/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="//cdn.luxuo.com/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="//cdn.luxuo.com/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="//cdn.luxuo.com/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="//cdn.luxuo.com/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="//cdn.luxuo.com/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="//cdn.luxuo.com/wp-content/themes/Luxuo2017/images/favicons/apple-touch-icon-180x180.png">
    <link rel="shortcut icon" type="image/png" href="//cdn.luxuo.com/wp-content/themes/Luxuo2017/images/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="shortcut icon" type="image/png" href="//cdn.luxuo.com/wp-content/themes/Luxuo2017/images/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="shortcut icon" type="image/png" href="//cdn.luxuo.com/wp-content/themes/Luxuo2017/images/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="shortcut icon" type="image/png" href="//cdn.luxuo.com/wp-content/themes/Luxuo2017/images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="//cdn.luxuo.com/wp-content/themes/Luxuo2017/images/favicons/manifest.json">
    <link rel="mask-icon" href="//cdn.luxuo.com/wp-content/themes/Luxuo2017/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="//cdn.luxuo.com/wp-content/themes/Luxuo2017/images/favicons/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
	<?php do_action( 'amp_post_template_head', $this ); ?>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Serif|Open+Sans|Unica+One">
    <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
    <script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
    <script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
    
	<style amp-custom>
		<?php require "style.php"; ?>
        
		<?php do_action( 'amp_post_template_css', $this ); ?>
	</style>
</head>
    
    <?php
    global $post;
    
    $sponsored_article = get_field("sponsored_article", get_the_ID());
    $luxuo_post = '"'.$post->post_name.'"';
    $section_targeting = '"post"';
    $cats = wp_get_post_categories($post->ID, array('fields' => 'all'));
    foreach ($cats as $i => $cat) {
        $section_targeting .= sprintf(', "%s"', $cat->slug);
    }
    ?>
    
<body class="<?php echo esc_attr( $this->get( 'body_class' ) ); ?>">
    <?php if($sponsored_article != "Yes") { ?>
        <div class="adzone_area">
            <!--Billboard 1--->
            <amp-ad width="468"
                height="50"
                type="doubleclick"
                data-slot="/32360441/luxuo-billboard-1"
                json='{"targeting":{ "luxuo_section" : [<?php echo $section_targeting; ?>], "luxuo_post" : [<?php echo $luxuo_post; ?>] } }'>
            </amp-ad>
        </div>
    <?php } ?>
    
    <?php require "header-bar.php"; ?>

    <article class="amp-wp-article">

        <header class="amp-wp-article-header">
            <h1 class="amp-wp-title">
                <?php echo wp_kses_data( $this->get( 'post_title' ) ); ?>
            </h1>
            
            <?php require "meta-author.php"; ?>
            
        </header>
        
        <div class="social_media">
            <!--<amp-social-share type="facebook"
            data-param-app_id="254325784911610" width="30" height="30"></amp-social-share>-->
            <amp-social-share type="twitter" width="30" height="30"></amp-social-share>
            <amp-social-share type="pinterest" width="30" height="30"></amp-social-share>
            <amp-social-share type="linkedin" width="30" height="30"></amp-social-share>
            <amp-social-share type="email" width="30" height="30"></amp-social-share>
        </div>
        
        <?php if($sponsored_article != "Yes") { ?>
            <div class="adzone_area">
                <!--Leaderboard--->
                <amp-ad width="300"
                    height="250"
                    type="doubleclick"
                    data-slot="/32360441/luxuo-leaderboard"
                    json='{"targeting":{ "luxuo_section" : [<?php echo $section_targeting; ?>], "luxuo_post" : <?php echo $luxuo_post; ?> } }'>
                </amp-ad>
            </div>
        <?php } ?>

        <div class="amp-wp-article-content">
            <?php echo $this->get( 'post_amp_content' ); // amphtml content; no kses ?>
        </div>
        
        <ul class="pager mobile_pager">
            <?php
            $prev_post = get_previous_post();
            $pager_post_id = $prev_post->ID;
            $custom_title = get_field('display_title', $pager_post_id);
            $title = !empty($custom_title) ? $custom_title : $prev_post->post_title;

            if (!empty( $prev_post )): ?>
                <li class="previous">
                    <a href="<?php echo get_permalink($pager_post_id); ?>" title="<?php echo 'Previous article is '.$title; ?>" alt="<?php echo 'Previous article is '.$title; ?>">
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
                    <a href="<?php echo get_permalink($pager_post_id); ?>" title="<?php echo 'Next article is '.$title; ?>" alt="<?php echo 'Next article is '.$title; ?>">
                        Next <span aria-hidden="true">&rarr;</span>
                    </a>
                </li>
            <?php endif ?>
        </ul>
        
        <?php if($sponsored_article != "Yes") { ?>
            <div class="adzone_area">

                <!--MPU 1--->
                <amp-ad width="300"
                    height="250"
                    type="doubleclick"
                    data-slot="/32360441/luxuo-mpu1"
                    json='{"targeting":{ "luxuo_section" : [<?php echo $section_targeting; ?>], "luxuo_post" : <?php echo $luxuo_post; ?> } }'>
                </amp-ad>

                <!--MPU 2--->
                <amp-ad width="300"
                    height="250"
                    type="doubleclick"
                    data-slot="/32360441/luxuo-mpu2"
                    json='{"targeting":{ "luxuo_section" : [<?php echo $section_targeting; ?>], "luxuo_post" : <?php echo $luxuo_post; ?> } }'>
                </amp-ad>
            </div>
        <?php } ?>


        <footer class="amp-wp-article-footer">
            <?php require "meta-taxonomy.php"; ?>
        </footer>

        <?php if($sponsored_article != "Yes") { ?>
            <div class="adzone_area">
                <!--Billboard 1--->
                <amp-ad width="468"
                    height="50"
                    type="doubleclick"
                    data-slot="/32360441/luxuo-billboard-2">
                </amp-ad>
            </div>
        <?php } ?>
    </article>

    <?php require "footer.php"; ?>

<?php do_action( 'amp_post_template_footer', $this ); ?>

</body>
</html>
