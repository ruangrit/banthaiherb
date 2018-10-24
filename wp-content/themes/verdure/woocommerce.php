<?php
/*
Template Name: WooCommerce
*/
?>
<?php
$mkdf_sidebar_layout = verdure_mikado_sidebar_layout();

get_header();
verdure_mikado_get_title();
get_template_part( 'slider' );
do_action('verdure_mikado_before_main_content');

//WooCommerce content
if ( ! is_singular( 'product' ) ) { ?>
	<div class="mkdf-container">
		<div class="mkdf-container-inner clearfix">
			<div class="mkdf-grid-row mkdf-grid-large-gutter">
				<div <?php echo verdure_mikado_get_content_sidebar_class(); ?>>
					<?php verdure_mikado_woocommerce_content(); ?>
				</div>
				<?php if ( $mkdf_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo verdure_mikado_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="mkdf-container">
		<div class="mkdf-container-inner clearfix">
			<?php verdure_mikado_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>