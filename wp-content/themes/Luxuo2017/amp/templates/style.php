<?php
// Get content width
$content_max_width       = absint( $this->get( 'content_max_width' ) );

// Get template colors
$theme_color             = $this->get_customizer_setting( 'theme_color' );
$text_color              = $this->get_customizer_setting( 'text_color' );
$muted_text_color        = $this->get_customizer_setting( 'muted_text_color' );
$border_color            = $this->get_customizer_setting( 'border_color' );
$link_color              = $this->get_customizer_setting( 'link_color' );
$header_background_color = $this->get_customizer_setting( 'header_background_color' );
$header_color            = $this->get_customizer_setting( 'header_color' );
?>
/* Generic WP styling */

.alignright {
	float: right;
}

.alignleft {
	float: left;
}

.aligncenter {
	display: block;
	margin-left: auto;
	margin-right: auto;
}

.amp-wp-enforced-sizes {
	/** Our sizes fallback is 100vw, and we have a padding on the container; the max-width here prevents the element from overflowing. **/
	max-width: 100%;
	margin: 0 auto;
}

.amp-wp-unknown-size img {
	/** Worst case scenario when we can't figure out dimensions for an image. **/
	/** Force the image into a box of fixed dimensions and use object-fit to scale. **/
	object-fit: contain;
}

/* Template Styles */

.amp-wp-content,
.amp-wp-title-bar div {
	<?php if ( $content_max_width > 0 ) : ?>
	margin: 0 auto;
	max-width: <?php echo sprintf( '%dpx', $content_max_width ); ?>;
	<?php endif; ?>
}

html {
	background: <?php echo sanitize_hex_color( $header_background_color ); ?>;
}

body {
	background: <?php echo sanitize_hex_color( $theme_color ); ?>;
	color: <?php echo sanitize_hex_color( $text_color ); ?>;
	font-family: 'Merriweather', 'Times New Roman', Times, Serif;
	font-weight: 300;
	line-height: 1.75em;
}

p,
ol,
ul,
figure {
	margin: 0 0 1em;
	padding: 0;
}

a,
a:visited {
	color: <?php echo sanitize_hex_color( $link_color ); ?>;
}

a:hover,
a:active,
a:focus {
	color: <?php echo sanitize_hex_color( $text_color ); ?>;
}

/* Quotes */

blockquote {
	color: <?php echo sanitize_hex_color( $text_color ); ?>;
	background: rgba(127,127,127,.125);
	border-left: 2px solid <?php echo sanitize_hex_color( $link_color ); ?>;
	margin: 8px 0 24px 0;
	padding: 16px;
}

blockquote p:last-child {
	margin-bottom: 0;
}

/* UI Fonts */

.amp-wp-meta,
.amp-wp-header div,
.amp-wp-title,
.wp-caption-text,
.amp-wp-tax-category,
.amp-wp-tax-tag,
.amp-wp-comments-link,
.amp-wp-footer p,
.back-to-top {
	font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
}

/* Header */

.amp-wp-header {
	background-color: <?php echo sanitize_hex_color( $header_background_color ); ?>;
    display: inline-block;
    width: 100%;
}

.amp-wp-header > div {
	color: <?php echo sanitize_hex_color( $header_color ); ?>;
	font-size: 1em;
	font-weight: 400;
	margin: 0 auto;
	max-width: calc(840px - 32px);
    padding: 15px 16px 7px 16px;
	position: relative;
	<!--padding: .875em 16px;-->
}

.amp-wp-header a {
	color: <?php echo sanitize_hex_color( $header_color ); ?>;
	text-decoration: none;
}

/* Site Icon */

.amp-wp-header .amp-wp-site-icon {
	/** site icon is 32px **/
	/*
    background-color: <?php echo sanitize_hex_color( $header_color ); ?>;
	border: 1px solid <?php echo sanitize_hex_color(  $header_color ); ?>;
	border-radius: 50%;
	position: absolute;
	right: 18px;
	top: 10px;
    */
}

/* Article */

.amp-wp-article {
	color: <?php echo sanitize_hex_color( $text_color ); ?>;
	font-weight: 400;
	margin: 1.5em auto;
	max-width: 840px;
	overflow-wrap: break-word;
	word-wrap: break-word;
}

/* Article Header */

.amp-wp-article-header {
	align-items: center;
	align-content: stretch;
	display: flex;
	flex-wrap: wrap;
	justify-content: space-between;
	margin: 1.5em 16px 1.5em;
}

.amp-wp-title {
	color: #111;
	display: block;
	flex: 1 0 100%;
	font-weight: 900;
	margin: 0 0 .625em;
	width: 100%;
    font: normal 35px/38px "PT Serif",serif;
}

/* Article Meta */

.amp-wp-meta {
	color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;
	display: inline-block;
	flex: 2 1 50%;
	font-size: .875em;
	line-height: 1.5em;
	margin: 0;
	padding: 0;
}

.amp-wp-article-header .amp-wp-meta:last-of-type {
	text-align: right;
}

.amp-wp-article-header .amp-wp-meta:first-of-type {
	text-align: left;
}

.amp-wp-byline amp-img,
.amp-wp-byline .amp-wp-author {
	display: inline-block;
	vertical-align: middle;
    font: normal 12px 'Open Sans',sans-serif;
    color: #707070;
}

.amp-wp-byline amp-img {
	border: 1px solid <?php echo sanitize_hex_color( $link_color ); ?>;
	border-radius: 50%;
	position: relative;
	margin-right: 6px;
}

.amp-wp-posted-on {
	text-align: right;
}

/* Featured image */

.amp-wp-article-featured-image {
	margin: 0 0 1em;
}
.amp-wp-article-featured-image amp-img {
	margin: 0 auto;
}
.amp-wp-article-featured-image.wp-caption .wp-caption-text {
	margin: 0 18px;
}

/* Article Content */

.amp-wp-article-content {
	margin: 0 16px;
}

.amp-wp-article-content p{
    color: #555;
    font: normal 14px "Open Sans",sans-serif;
    letter-spacing: 0;
    line-height: 1.8;
}

.amp-wp-article-content p a{
    color: #a4832b;
    text-decoration: underline;
}

.amp-wp-article-content ul,
.amp-wp-article-content ol {
	margin-left: 1em;
}

.amp-wp-article-content amp-img {
	margin: 0 auto;
}

.amp-wp-article-content amp-img.alignright {
	margin: 0 0 1em 16px;
}

.amp-wp-article-content amp-img.alignleft {
	margin: 0 16px 1em 0;
}

/* Captions */

.wp-caption {
	padding: 0;
}

.wp-caption.alignleft {
	margin-right: 16px;
}

.wp-caption.alignright {
	margin-left: 16px;
}

.wp-caption .wp-caption-text {
	color: #555;
    font-family: "Open Sans",sans-serif;
    font-size: 12px;
    font-style: italic;
    padding: 20px 0 0 50px;
}

.wp-caption .wp-caption-text::before{
    border-top: 1px solid #a4832b;
    content: "";
    display: block;
    left: -50px;
    position: relative;
    top: 10px;
    width: 35px;
}

/* AMP Media */

amp-carousel {
	background: <?php echo sanitize_hex_color( $border_color ); ?>;
	/*margin: 0 -16px 1.5em;*/
    margin-bottom: 16px;
}
amp-iframe,
amp-youtube,
amp-instagram,
amp-vine {
	background: <?php echo sanitize_hex_color( $border_color ); ?>;
	margin: 0 -16px 1.5em;
}

.amp-wp-article-content amp-carousel amp-img {
	border: none;
}

amp-carousel > amp-img > img {
	/*object-fit: contain;*/
}

.amp-wp-iframe-placeholder {
	background: <?php echo sanitize_hex_color( $border_color ); ?> url( <?php echo esc_url( $this->get( 'placeholder_image_url' ) ); ?> ) no-repeat center 40%;
	background-size: 48px 48px;
	min-height: 48px;
}

/* Article Footer Meta */

.amp-wp-article-footer .amp-wp-meta {
	display: block;
}

.amp-wp-article-footer .amp-wp-tax-category{
    text-align: center;
    margin-bottom: 35px;
}

.amp-wp-tax-category,
.amp-wp-tax-tag {
	color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;
	font-size: .875em;
	line-height: 1.5em;
	margin: 1.5em 16px;
}

.amp-wp-tax-category a,
.amp-wp-tax-tag a{
    color: #a4832b;
    text-decoration: underline;
}

.amp-wp-comments-link {
	color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;
	font-size: .875em;
	line-height: 1.5em;
	text-align: center;
	margin: 2.25em 0 1.5em;
}

.amp-wp-comments-link a {
	border-style: solid;
	border-color: <?php echo sanitize_hex_color( $border_color ); ?>;
	border-width: 1px 1px 2px;
	border-radius: 4px;
	background-color: transparent;
	color: <?php echo sanitize_hex_color( $link_color ); ?>;
	cursor: pointer;
	display: block;
	font-size: 14px;
	font-weight: 600;
	line-height: 18px;
	margin: 0 auto;
	max-width: 200px;
	padding: 11px 16px;
	text-decoration: none;
	width: 50%;
	-webkit-transition: background-color 0.2s ease;
			transition: background-color 0.2s ease;
}

/* AMP Footer */

.amp-wp-footer {
	border-top: 1px solid <?php echo sanitize_hex_color( $border_color ); ?>;
	margin: calc(1.5em - 1px) 0 0;
    background: #111;
    padding: 0px 16px;
}

.amp-wp-footer > div {
	margin: 0 auto;
	max-width: calc(840px - 32px);
	padding: 20px 0;
	position: relative;
}

.amp-wp-footer .copyright {
    color: #777;
    font: normal 12px "Source Sans Pro",sans-serif;
    float: left;
    margin-top: -7px;
}

.amp-wp-footer .menu-terms-and-conditions-container{
    float: right;
    width: 50%;
}

.amp-wp-footer .menu-terms-and-conditions-container ul{
    float: none;
    margin-bottom: 0;
    margin-top: -15px;
}

.amp-wp-footer .menu-terms-and-conditions-container li{
    display:inline-block;
    margin-right: 10px;
}

.amp-wp-footer .menu-terms-and-conditions-container li a{
    color: #a4832b;
    font: normal 12px "Source Sans Pro",sans-serif;
}

.amp-wp-footer h2 {
	font-size: 1em;
	line-height: 1.375em;
	margin: 0 0 .5em;
}

.amp-wp-footer p {
	color: <?php echo sanitize_hex_color( $muted_text_color ); ?>;
	font-size: .8em;
	line-height: 1.5em;
	margin: 0 85px 0 0;
}

.amp-wp-footer a {
	text-decoration: none;
}

.amp-wp-footer a:visited{
    color: #777;
}

.back-to-top {
    font-size: .8em;
    font-weight: 600;
    line-height: 2em;
    color: #777;
}

#sidebar{
    background: #111111
}

.mobile-search-form #search-box{
    margin: 0 5px 5px;
    width: 95%;
}

.logo_button{
    float: leftl;
    margin-top: -5px;
}

.menu_button{
    display: inline-block;
    height: 25px;
    width: 22px;
    background: transparent;
    border: none;
    float: right;
    margin-top: 1px;
    padding: 0px;
    cursor: pointer;
}

.menu_button span {
    height: 2px;
    width: 100%;
    background: #888;
    display: block;
    margin-bottom: 3px;
}

.menu_button span:last-of-type{
    margin-bottom: 0px;
}

#menu-header-menu .dropdown_menu_wrapper h4{
    text-transform: uppercase;
    font: bold 14px 'Unica One',cursive;
    background-color: transparent;
    color: #fff;
    border: none;
    border-bottom: 1px solid #fff;
    margin-bottom: 0;
    padding-top: 7px;
    padding-bottom: 10px;
}

#menu-header-menu .dropdown_menu_wrapper h4:hover{
    color: #555;
    background-color: #e7e7e7;
}

.menu-header-menu-container > ul:first-of-type {
    border-top: 1px solid #fff;
}

.menu-header-menu-container > ul:last-of-type h4{
    border-bottom: none;
}

#menu-header-menu li{
    text-align: center;
    list-style: none;
}

#menu-header-menu li a{
    text-transform: uppercase;
    font: bold 14px 'Unica One',cursive;
}

#menu-header-menu li a:hover{
    color: #a4832b
}

.navbar-nav{
    margin-bottom: 0px;
}

.caret {
    display: inline-block;
    width: 0;
    height: 0;
    margin-left: 2px;
    vertical-align: middle;
    border-top: 4px dashed;
    border-right: 4px solid transparent;
    border-left: 4px solid transparent;
}

.dropdown-menu{
    display: none;
}

.mobile_pager{
    text-align: center;
    margin: 30px 0px;
}

.mobile_pager li{
    display: inline-block;
    margin-right: 15px;
}

.mobile_pager li:last-of-type{
    margin-right: 0px;
}

.mobile_pager li a{
    text-decoration: none;
}

/*
|----------------------------------------------------------
| ADVERT
|----------------------------------------------------------
*/

.adzone_area {
	margin: 0 auto;
	max-width: calc(840px - 32px);
    text-align: center;
}

.adzone_area_inner{
    width: 100%;
    text-align: center;
}

.adzone_area .amp-notsupported{
    display: none;
}

/*
|----------------------------------------------------------
| SOCIAL MEDIA
|----------------------------------------------------------
*/
.social_media{
    margin: 10px auto;
	max-width: calc(840px - 32px);
    padding: 0px 16px;
}

.instagram_wrapper h3{
    color: #fff;
}

.menu-social-container{
    margin: 10px 0px;
}

.menu-social-container a svg {
    fill: #777;
    margin-right: 10px;
    width: 20px
}

/*
|----------------------------------------------------------
| MEDIA QUERY
|----------------------------------------------------------
*/

@media (max-width: 767px){
    .amp-wp-title{
        font: normal 1.5em/1.35em "PT Serif",serif;
        text-align: center;
    }

    .amp-wp-article-header .amp-wp-meta:first-of-type{
        text-align: center;
    }

    .social_media{
        text-align: center;
    }

    .amp-wp-article-content p{
        text-align: justify;
    }

    .amp-wp-article-footer .amp-wp-meta{
        text-align:center;
    }

    .amp-wp-footer{
        text-align: center;
    }
    
    .amp-wp-footer .copyright {
        float: none;
        text-align: center;
        margin-bottom: 20px;
    }

    .amp-wp-footer .menu-terms-and-conditions-container{
        float: none;
        text-align: center;
        width: 100%;
    }

    .amp-wp-footer .menu-terms-and-conditions-container ul{
        width: 100%;
    }

    .amp-wp-footer .menu-terms-and-conditions-container li{
        display: block;
    }
}

@media (min-width: 768px){
    .back-to-top {
        bottom: 8px;
        position: absolute;
        right: 16px;
    }
}