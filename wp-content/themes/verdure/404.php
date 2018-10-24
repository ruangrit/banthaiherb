<?php get_header();
$verdure_mikado_404_padding_top = verdure_mikado_get_title_content_padding();

$verdure_mikado_404_top_style = '';
if ($verdure_mikado_404_padding_top !== '') {
	$verdure_mikado_404_top_style .= 'padding-top:'. $verdure_mikado_404_padding_top.'px';
}

?>
				<div class="mkdf-page-not-found" <?php verdure_mikado_inline_style($verdure_mikado_404_top_style);?>>
					<?php
					$mkdf_title_image_404 = verdure_mikado_options()->getOptionValue( '404_page_title_image' );
					$mkdf_title_404       = verdure_mikado_options()->getOptionValue( '404_title' );
					$mkdf_subtitle_404    = verdure_mikado_options()->getOptionValue( '404_subtitle' );
					$mkdf_text_404        = verdure_mikado_options()->getOptionValue( '404_text' );
					$mkdf_search_form_skin= verdure_mikado_options()->getOptionValue( '404_search_form_skin' );
					
					if ( ! empty( $mkdf_title_image_404 ) ) { ?>
						<div class="mkdf-404-title-image">
							<img src="<?php echo esc_url( $mkdf_title_image_404 ); ?>" alt="<?php esc_attr_e( '404 Title Image', 'verdure' ); ?>" />
						</div>
					<?php } ?>
					
					<h1 class="mkdf-404-title">
						<?php if ( ! empty( $mkdf_title_404 ) ) {
							echo esc_html( $mkdf_title_404 );
						} else {
							esc_html_e( '404', 'verdure' );
						} ?>
					</h1>
					
					<h3 class="mkdf-404-subtitle">
						<?php if ( ! empty( $mkdf_subtitle_404 ) ) {
							echo esc_html( $mkdf_subtitle_404 );
						} else {
							esc_html_e( 'Page not found', 'verdure' );
						} ?>
					</h3>
					
					<p class="mkdf-404-text">
						<?php if ( ! empty( $mkdf_text_404 ) ) {
							echo esc_html( $mkdf_text_404 );
						} else {
							esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'verdure' );
						} ?>
					</p>

					<?php
					$mkdf_form_class = 'mkdf-404-form';

					if ($mkdf_search_form_skin == 'light-style') {
						$mkdf_form_class .= ' mkdf-404-form-light';
					}
					?>

					<div <?php verdure_mikado_class_attribute($mkdf_form_class);?>>
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>