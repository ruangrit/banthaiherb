<<?php echo esc_attr( $title_tag ); ?> class="mkdf-custom-font-holder <?php echo esc_attr( $holder_classes ); ?>" <?php verdure_mikado_inline_style( $holder_styles ); ?> <?php echo verdure_mikado_get_inline_attrs( $holder_data ); ?>>
	<?php echo wp_kses_post( $title ); ?>
</<?php echo esc_attr( $title_tag ); ?>>