<div class="<?php echo esc_attr( $blog_classes ) ?>" <?php echo esc_attr( $blog_data_params ) ?>>
	<div class="mkdf-blog-holder-inner">
		<?php
		if ( $blog_query->have_posts() ) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
			verdure_mikado_get_post_format_html( $blog_type );
		endwhile;
		else:
			verdure_mikado_get_module_template_part( 'templates/parts/no-posts', 'blog' );
		endif;
		
		wp_reset_postdata();
		?>
	</div>
	<div class="mkdf-blog-pagination-holder">
		<?php verdure_mikado_get_module_template_part( 'templates/parts/pagination/pagination', 'blog', '', $params ); ?>
	</div>
</div>