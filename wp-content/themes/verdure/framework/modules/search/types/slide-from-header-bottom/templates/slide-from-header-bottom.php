<div class="mkdf-slide-from-header-bottom-holder">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
		<div class="mkdf-form-holder">
			<input type="text" placeholder="<?php esc_attr_e( 'Search', 'verdure' ); ?>" name="s" class="mkdf-search-field" autocomplete="off" />
			<button type="submit" <?php verdure_mikado_class_attribute( $search_submit_icon_class ); ?>>
				<?php echo verdure_mikado_get_search_icon_html(); ?>
			</button>
		</div>
	</form>
</div>