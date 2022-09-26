<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">

			<article id="post-0" class="post error404 no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'SORRY!' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'The page you requested for cannot be found. Maybe our search tool can help?' ); ?></p>
					<div id="search-container" class="search404">
            <div class="row">
              <div class="col-md-10 col-md-offset-2">
                <div class="row">
                  <div class="col-md-10">
                    <form method="get" class="search-form search-form-404" action="<?php echo esc_url(home_url('/')); ?>">
                      <input type="search" name="s" id="search-box" placeholder="Type to search" value="<?php echo get_search_query(); ?>"/>
                      <div class="clear-icon search-btn-icon">
                        <svg version="1.1" id="Layer_1" x="0px" y="0px" class="search-icon" style="margin-left: -2px;"
                           width="22px" height="22px" viewBox="0 0 512 512" xml:space="preserve">
                        <path d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3
                          c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2
                          c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2
                          c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z"/>
                        </svg>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-2"></div>
                </div>
              </div>
            </div>
          </div>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
