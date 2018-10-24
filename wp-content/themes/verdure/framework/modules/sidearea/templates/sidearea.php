<section class="mkdf-side-menu">
	<div class="mkdf-close-side-menu-holder">
		<a <?php verdure_mikado_class_attribute( $side_area_close_icon_class ); ?> href="#">
			<?php echo verdure_mikado_get_side_area_close_icon_html(); ?>
		</a>
	</div>
	<?php if ( is_active_sidebar( 'sidearea' ) ) {
		dynamic_sidebar( 'sidearea' );
	} ?>
</section>