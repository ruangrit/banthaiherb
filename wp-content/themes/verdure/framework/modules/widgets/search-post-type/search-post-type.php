<?php

class VerdureMikadoSearchPostType extends VerdureMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_search_post_type',
			esc_html__( 'Mikado Search Post Type', 'verdure' ),
			array( 'description' => esc_html__( 'Select post type that you want to be searched for', 'verdure' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$post_types = apply_filters( 'verdure_mikado_search_post_type_widget_params_post_type', array( 'post' => esc_html__( 'Post', 'verdure' ) ) );
		
		$this->params = array(
			array(
				'type'        => 'dropdown',
				'name'        => 'post_type',
				'title'       => esc_html__( 'Post Type', 'verdure' ),
				'description' => esc_html__( 'Choose post type that you want to be searched for', 'verdure' ),
				'options'     => $post_types
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$search_type_class = 'mkdf-search-post-type';
		$post_type         = $instance['post_type'];
		?>
		
		<div class="widget mkdf-search-post-type-widget">
			<div data-post-type="<?php echo esc_attr( $post_type ); ?>" <?php verdure_mikado_class_attribute( $search_type_class ); ?>>
				<input class="mkdf-post-type-search-field" value="" placeholder="<?php esc_attr_e( 'Search here', 'verdure' ) ?>">
                <svg class="mkdf-search-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="20px" height="18.8px" viewBox="0 0 20.025 18.846" enable-background="new 0 0 20.025 18.846" xml:space="preserve">
                    <path fill="currentColor" d="M19.681,17.752l-4.93-4.158c1.141-1.387,1.828-3.162,1.828-5.094c0-4.426-3.6-8.025-8.024-8.025
                    c-4.424,0-8.024,3.599-8.024,8.025c0,4.424,3.601,8.023,8.024,8.023c2.223,0,4.237-0.908,5.69-2.373l4.951,4.176L19.681,17.752z
                     M8.555,15.774c-4.012,0-7.274-3.264-7.274-7.273c0-4.012,3.265-7.276,7.274-7.276c4.01,0,7.274,3.263,7.274,7.274
                    C15.829,12.51,12.565,15.774,8.555,15.774z"/>
                </svg>
				<i class="mkdf-search-loading fa fa-spinner fa-spin mkdf-hidden" aria-hidden="true"></i>
			</div>
			<div class="mkdf-post-type-search-results"></div>
		</div>
	<?php }
}