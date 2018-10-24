<div class="mkdf-fullscreen-search-holder">
	<a <?php verdure_mikado_class_attribute( $search_close_icon_class ); ?> href="javascript:void(0)">
		<?php echo verdure_mikado_get_search_close_icon_html(); ?>
	</a>
	<div class="mkdf-fullscreen-search-table">
		<div class="mkdf-fullscreen-search-cell">
			<div class="mkdf-fullscreen-search-inner">
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="mkdf-fullscreen-search-form" method="get">
					<div class="mkdf-form-holder">
						<div class="mkdf-form-holder-inner">
							<div class="mkdf-field-holder">
								<input type="text" placeholder="<?php esc_attr_e( 'Search for...', 'verdure' ); ?>" name="s" class="mkdf-search-field" autocomplete="off"/>
							</div>
							<button type="submit" <?php verdure_mikado_class_attribute( $search_submit_icon_class ); ?>>
								<?php echo verdure_mikado_get_search_icon_html(); ?>
							</button>
							<div class="mkdf-line"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>