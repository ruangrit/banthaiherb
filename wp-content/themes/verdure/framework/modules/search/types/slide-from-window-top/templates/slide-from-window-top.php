<?php ?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="mkdf-search-slide-window-top" method="get">
	<?php if ( $search_in_grid ) { ?>
	<div class="mkdf-grid">
	<?php } ?>
		<div class="mkdf-search-form-inner">
			<span <?php verdure_mikado_class_attribute( $search_submit_icon_class ); ?>>
				<?php echo verdure_mikado_get_search_icon_html(); ?>
			</span>
			<input type="text" placeholder="<?php esc_attr_e( 'Search', 'verdure' ); ?>" name="s" class="mkdf-swt-search-field" autocomplete="off"/>
			<a <?php verdure_mikado_class_attribute( $search_close_icon_class ); ?> href="#">
				<?php echo verdure_mikado_get_search_close_icon_html(); ?>
			</a>
		</div>
	<?php if ( $search_in_grid ) { ?>
	</div>
	<?php } ?>
</form>