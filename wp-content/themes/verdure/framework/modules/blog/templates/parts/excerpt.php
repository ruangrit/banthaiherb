<?php
if ( post_password_required() ) {
	echo get_the_password_form();
} else {
	$excerpt_length = isset( $params['excerpt_length'] ) ? $params['excerpt_length'] : '';
	$excerpt        = verdure_mikado_excerpt( $excerpt_length );

	$link_page_exists = apply_filters( 'verdure_mikado_filter_single_link_pages', '' );

	if ( ! empty( $excerpt ) && empty( $link_page_exists ) ) { ?>
        <div class="mkdf-post-excerpt-holder">
            <p itemprop="description" class="mkdf-post-excerpt">
				<?php echo wp_kses_post( $excerpt ); ?>
            </p>
        </div>
	<?php }
} ?>