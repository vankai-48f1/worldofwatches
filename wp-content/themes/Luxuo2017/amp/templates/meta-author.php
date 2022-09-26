<?php $post_author = $this->get( 'post_author' ); ?>
<?php if ( $post_author ) : ?>
	<div class="amp-wp-meta amp-wp-byline">
		<span class="amp-wp-author author vcard">
            <?php echo esc_attr( date( 'M d, Y', $this->get( 'post_publish_timestamp' ) ) ); ?> |
            <?php echo esc_html( $post_author->display_name ); ?>
        </span>
	</div>
<?php endif; ?>
