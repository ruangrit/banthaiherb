<?php
namespace VerdureCore\CPT\Shortcodes\BlogList;

use VerdureCore\Lib;

class BlogList implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_blog_list';
		
		add_action('vc_before_init', array($this,'vcMap'));
		
		//Category filter
		add_filter( 'vc_autocomplete_mkdf_blog_list_category_callback', array( &$this, 'blogCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Category render
		add_filter( 'vc_autocomplete_mkdf_blog_list_category_render', array( &$this, 'blogCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map(
			array(
				'name'                      => esc_html__( 'Mikado Blog List', 'verdure' ),
				'base'                      => $this->base,
				'icon'                      => 'icon-wpb-blog-list extended-custom-icon',
				'category'                  => esc_html__( 'by VERDURE', 'verdure' ),
				'allowed_container_element' => 'vc_row',
				'params'                    => array(
					array(
						'type'        => 'dropdown',
						'param_name'  => 'type',
						'heading'     => esc_html__( 'Type', 'verdure' ),
						'value'       => array(
							esc_html__( 'Standard', 'verdure' ) => 'standard',
							esc_html__( 'Boxed', 'verdure' )    => 'boxed',
							esc_html__( 'Masonry', 'verdure' )  => 'masonry',
							esc_html__( 'Simple', 'verdure' )   => 'simple',
							esc_html__( 'Minimal', 'verdure' )  => 'minimal'
						),
						'save_always' => true
					),
					array(
						'type'       => 'textfield',
						'param_name' => 'number_of_posts',
						'heading'    => esc_html__( 'Number of Posts', 'verdure' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'number_of_columns',
						'heading'    => esc_html__( 'Number of Columns', 'verdure' ),
						'value'      => array(
							esc_html__( 'One', 'verdure' )   => '1',
							esc_html__( 'Two', 'verdure' )   => '2',
							esc_html__( 'Three', 'verdure' ) => '3',
							esc_html__( 'Four', 'verdure' )  => '4',
							esc_html__( 'Five', 'verdure' )  => '5'
						),
						'dependency' => array( 'element' => 'type', 'value' => array( 'standard', 'boxed', 'masonry' ) )
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'space_between_items',
						'heading'     => esc_html__( 'Space Between Items', 'verdure' ),
						'value'       => array_flip( verdure_mikado_get_space_between_items_array() ),
						'save_always' => true,
						'dependency'  => array( 'element' => 'type', 'value'   => array( 'standard', 'boxed', 'masonry' ) )
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'orderby',
						'heading'     => esc_html__( 'Order By', 'verdure' ),
						'value'       => array_flip( verdure_mikado_get_query_order_by_array() ),
						'save_always' => true
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'order',
						'heading'     => esc_html__( 'Order', 'verdure' ),
						'value'       => array_flip( verdure_mikado_get_query_order_array() ),
						'save_always' => true
					),
					array(
						'type'        => 'autocomplete',
						'param_name'  => 'category',
						'heading'     => esc_html__( 'Category', 'verdure' ),
						'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'verdure' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'image_size',
						'heading'    => esc_html__( 'Image Size', 'verdure' ),
						'value'      => array(
							esc_html__( 'Original', 'verdure' )  => 'full',
							esc_html__( 'Square', 'verdure' )    => 'verdure_mikado_square',
							esc_html__( 'Landscape', 'verdure' ) => 'verdure_mikado_landscape',
							esc_html__( 'Portrait', 'verdure' )  => 'verdure_mikado_portrait',
							esc_html__( 'Thumbnail', 'verdure' ) => 'thumbnail',
							esc_html__( 'Medium', 'verdure' )    => 'medium',
							esc_html__( 'Large', 'verdure' )     => 'large'
						),
						'save_always' => true,
						'dependency'  => Array( 'element' => 'type', 'value' => array( 'standard', 'boxed', 'masonry' ) )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'title_tag',
						'heading'    => esc_html__( 'Title Tag', 'verdure' ),
						'value'      => array_flip( verdure_mikado_get_title_tag( true ) ),
						'group'      => esc_html__( 'Post Info', 'verdure' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'title_transform',
						'heading'    => esc_html__( 'Title Text Transform', 'verdure' ),
						'value'      => array_flip( verdure_mikado_get_text_transform_array( true ) ),
						'group'      => esc_html__( 'Post Info', 'verdure' )
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'excerpt_length',
						'heading'     => esc_html__( 'Text Length', 'verdure' ),
						'description' => esc_html__( 'Number of characters', 'verdure' ),
						'dependency'  => Array( 'element' => 'type', 'value'   => array( 'standard', 'boxed', 'masonry', 'simple' ) ),
						'group'       => esc_html__( 'Post Info', 'verdure' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_image',
						'heading'    => esc_html__( 'Enable Post Info Image', 'verdure' ),
						'value'      => array_flip( verdure_mikado_get_yes_no_select_array( false, true ) ),
						'dependency' => Array( 'element' => 'type', 'value'   => array( 'standard', 'boxed', 'masonry' ) ),
						'group'      => esc_html__( 'Post Info', 'verdure' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_image_zoom',
						'heading'    => esc_html__( 'Enable Image Zoom', 'verdure' ),
						'value'      => array_flip( verdure_mikado_get_yes_no_select_array( false, false ) ),
						'dependency' => Array( 'element' => 'post_info_image', 'value'   => array( 'yes' ) ),
						'group'      => esc_html__( 'Post Info', 'verdure' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_image_shader',
						'heading'    => esc_html__( 'Enable Image Shader', 'verdure' ),
						'value'      => array_flip( verdure_mikado_get_yes_no_select_array( false, false ) ),
						'dependency' => Array( 'element' => 'post_info_image', 'value'   => array( 'yes' ) ),
						'group'      => esc_html__( 'Post Info', 'verdure' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_section',
						'heading'    => esc_html__( 'Enable Post Info Section', 'verdure' ),
						'value'      => array_flip( verdure_mikado_get_yes_no_select_array( false, true ) ),
						'dependency' => Array( 'element' => 'type', 'value'   => array( 'standard', 'boxed', 'masonry' ) ),
						'group'      => esc_html__( 'Post Info', 'verdure' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_author',
						'heading'    => esc_html__( 'Enable Post Info Author', 'verdure' ),
						'value'      => array_flip( verdure_mikado_get_yes_no_select_array( false, false ) ),
						'dependency' => Array( 'element' => 'post_info_section', 'value' => array( 'yes' ) ),
						'group'      => esc_html__( 'Post Info', 'verdure' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_date_position',
						'heading'    => esc_html__( 'Date Position', 'verdure' ),
						'value'      => array(
							esc_html__('Default', 'verdure') => '',
							esc_html__('On Image','verdure') => 'on-image',
						),
						'dependency' => Array( 'element' => 'type', 'value' => array( 'standard', 'masonry' ) ),
						'description'=> esc_html__('This option will take effect only if date is enabled and featured image is set','verdure'),
						'group'      => esc_html__( 'Post Info', 'verdure' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_date',
						'heading'    => esc_html__( 'Enable Post Info Date', 'verdure' ),
						'value'      => array_flip( verdure_mikado_get_yes_no_select_array( false, true ) ),
						'dependency' => Array( 'element' => 'post_info_section', 'value' => array( 'yes' ) ),
						'group'      => esc_html__( 'Post Info', 'verdure' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_category',
						'heading'    => esc_html__( 'Enable Post Info Category', 'verdure' ),
						'value'      => array_flip( verdure_mikado_get_yes_no_select_array( false, false ) ),
						'dependency' => Array( 'element' => 'post_info_section', 'value' => array( 'yes' ) ),
						'group'      => esc_html__( 'Post Info', 'verdure' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_comments',
						'heading'    => esc_html__( 'Enable Post Info Comments', 'verdure' ),
						'value'      => array_flip( verdure_mikado_get_yes_no_select_array( false ) ),
						'dependency' => Array( 'element' => 'post_info_section', 'value' => array( 'yes' ) ),
						'group'      => esc_html__( 'Post Info', 'verdure' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_like',
						'heading'    => esc_html__( 'Enable Post Info Like', 'verdure' ),
						'value'      => array_flip( verdure_mikado_get_yes_no_select_array( false ) ),
						'dependency' => Array( 'element' => 'post_info_section', 'value' => array( 'yes' ) ),
						'group'      => esc_html__( 'Post Info', 'verdure' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_share',
						'heading'    => esc_html__( 'Enable Post Info Share', 'verdure' ),
						'value'      => array_flip( verdure_mikado_get_yes_no_select_array( false ) ),
						'dependency' => Array( 'element' => 'post_info_section', 'value' => array( 'yes' ) ),
						'group'      => esc_html__( 'Post Info', 'verdure' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'pagination_type',
						'heading'    => esc_html__( 'Pagination Type', 'verdure' ),
						'value'      => array(
							esc_html__( 'None', 'verdure' )            => 'no-pagination',
							esc_html__( 'Standard', 'verdure' )        => 'standard-shortcodes',
							esc_html__( 'Load More', 'verdure' )       => 'load-more',
							esc_html__( 'Infinite Scroll', 'verdure' ) => 'infinite-scroll'
						),
						'group'      => esc_html__( 'Additional Features', 'verdure' )
					)
				)
			)
		);
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'type'                  => 'standard',
			'number_of_posts'       => '-1',
			'number_of_columns'     => '3',
			'space_between_items'   => 'normal',
			'category'              => '',
			'orderby'               => 'title',
			'order'                 => 'ASC',
			'image_size'            => 'full',
			'title_tag'             => 'h5',
			'title_transform'       => '',
			'excerpt_length'        => '40',
			'post_info_section'     => 'yes',
			'post_info_image'       => 'yes',
			'post_info_image_zoom'  => 'no',
			'post_info_image_shader'=> 'no',
			'post_info_author'      => 'no',
			'post_info_date_position'=> '',
			'post_info_date'        => 'yes',
			'post_info_category'    => 'no',
			'post_info_comments'    => 'no',
			'post_info_like'        => 'no',
			'post_info_share'       => 'no',
			'pagination_type'       => 'no-pagination'
		);
		$params       = shortcode_atts( $default_atts, $atts );
		
		$queryArray             = $this->generateQueryArray( $params );
		$query_result           = new \WP_Query( $queryArray );
		$params['query_result'] = $query_result;
		
		$params['holder_data']    = $this->getHolderData( $params );
		$params['holder_classes'] = $this->getHolderClasses( $params, $default_atts );
        $params['info_class']     = $this->getInfoClass( $params );
		$params['module']         = 'list';
		
		$params['max_num_pages'] = $query_result->max_num_pages;
		$params['paged']         = isset( $query_result->query['paged'] ) ? $query_result->query['paged'] : 1;
		
		$params['this_object'] = $this;
		
		ob_start();
		
		verdure_mikado_get_module_template_part( 'shortcodes/blog-list/holder', 'blog', $params['type'], $params );
		
		$html = ob_get_contents();
		
		ob_end_clean();
		
		return $html;
	}
	
	public function getHolderClasses( $params, $default_atts ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['type'] ) ? 'mkdf-bl-' . $params['type'] : 'mkdf-bl-' . $default_atts['type'];
		$holderClasses[] = $this->getColumnNumberClass( $params['number_of_columns'] );
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'mkdf-' . $params['space_between_items'] . '-space' : 'mkdf-' . $default_atts['space_between_items'] . '-space';
		$holderClasses[] = ! empty( $params['pagination_type'] ) ? 'mkdf-bl-pag-' . $params['pagination_type'] : 'mkdf-bl-pag-' . $default_atts['pagination_type'];
		$holderClasses[] = ( $params['post_info_image_zoom'] == 'yes') ? 'mkdf-bl-image-zoom' : '';
		$holderClasses[] = ( $params['post_info_image_shader'] == 'yes') ? 'mkdf-bl-image-shader' : '';
		$holderClasses[] = ( $params['post_info_date_position'] == 'on-image') ? 'mkdf-bl-date-on-image' : '';

		return implode( ' ', $holderClasses );
	}
    
    public function getInfoClass( $params ) {
        $info_class = '';
        
        
        if (($params['post_info_date_position'] == 'on-image' || $params['post_info_date'] == 'no') && $params['post_info_category'] == 'no' && $params['post_info_author'] == 'no' && $params['post_info_comments'] == 'no' && $params['post_info_like'] == 'no') {
            $info_class=' bli-info-empty';
        }
        
        return $info_class;
	}
    
	public function getColumnNumberClass( $params ) {
		switch ( $params ) {
			case 1:
				$classes = 'mkdf-bl-one-column';
				break;
			case 2:
				$classes = 'mkdf-bl-two-columns';
				break;
			case 3:
				$classes = 'mkdf-bl-three-columns';
				break;
			case 4:
				$classes = 'mkdf-bl-four-columns';
				break;
			case 5:
				$classes = 'mkdf-bl-five-columns';
				break;
			default:
				$classes = 'mkdf-bl-three-columns';
				break;
		}
		
		return $classes;
	}
	
	public function getHolderData( $params ) {
		$dataString = '';
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
		
		$query_result = $params['query_result'];
		
		$params['max_num_pages'] = $query_result->max_num_pages;
		
		if ( ! empty( $paged ) ) {
			$params['next-page'] = $paged + 1;
		}
		
		foreach ( $params as $key => $value ) {
			if ( $key !== 'query_result' && $value !== '' ) {
				$new_key = str_replace( '_', '-', $key );
				
				$dataString .= ' data-' . $new_key . '=' . esc_attr( str_replace( ' ', '', $value ) );
			}
		}
		
		return $dataString;
	}
	
	public function generateQueryArray( $params ) {
		$queryArray = array(
			'post_status'    => 'publish',
			'post_type'      => 'post',
			'orderby'        => $params['orderby'],
			'order'          => $params['order'],
			'posts_per_page' => $params['number_of_posts'],
			'post__not_in'   => get_option( 'sticky_posts' )
		);
		
		if ( ! empty( $params['category'] ) ) {
			$queryArray['category_name'] = $params['category'];
		}
		
		if ( ! empty( $params['next_page'] ) ) {
			$queryArray['paged'] = $params['next_page'];
		} else {
			$query_array['paged'] = 1;
		}
		
		return $queryArray;
	}
	
	public function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_transform'];
		}
		
		return implode( ';', $styles );
	}

	/**
	 * Filter blog categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function blogCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos       = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );
		
		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['category_title'] ) > 0 ) ? esc_html__( 'Category', 'verdure' ) . ': ' . $value['category_title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
	}
	
	/**
	 * Find blog category by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function blogCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$category = get_term_by( 'slug', $query, 'category' );
			if ( is_object( $category ) ) {
				
				$category_slug = $category->slug;
				$category_title = $category->name;
				
				$category_title_display = '';
				if ( ! empty( $category_title ) ) {
					$category_title_display = esc_html__( 'Category', 'verdure' ) . ': ' . $category_title;
				}
				
				$data          = array();
				$data['value'] = $category_slug;
				$data['label'] = $category_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}
}