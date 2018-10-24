<?php

namespace VerdureCore\CPT\Shortcodes\ProductList;

use VerdureCore\Lib;

class ProductList implements Lib\ShortcodeInterface
{
	private $base;

	function __construct()
	{
		$this->base = 'mkdf_product_list';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase()
	{
		return $this->base;
	}

	public function vcMap()
	{
		if (function_exists('vc_map')) {
			vc_map(
				array(
					'name' => esc_html__('Mikado Product List', 'verdure'),
					'base' => $this->base,
					'icon' => 'icon-wpb-product-list extended-custom-icon',
					'category' => esc_html__('by VERDURE', 'verdure'),
					'allowed_container_element' => 'vc_row',
					'params' => array(
						array(
							'type' => 'dropdown',
							'param_name' => 'type',
							'heading' => esc_html__('Type', 'verdure'),
							'value' => array(
								esc_html__('Standard', 'verdure') => 'standard',
								esc_html__('Masonry', 'verdure') => 'masonry'
							),
							'admin_label' => true
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'info_position',
							'heading' => esc_html__('Product Info Position', 'verdure'),
							'value' => array(
								esc_html__('Info On Image Hover', 'verdure') => 'info-on-image',
								esc_html__('Info Below Image', 'verdure') => 'info-below-image'
							),
							'save_always' => true
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'circle_frame',
							'heading' => esc_html__('Frame Image in Circle', 'verdure'),
							'description' => 'Product images will be cropped inside circles',
							'value' => array_flip(verdure_mikado_get_yes_no_select_array(false, false)),
							'dependency' => array('element' => 'info_position', 'value' => array('info-below-image'))
						),
						array(
							'type' => 'textfield',
							'param_name' => 'number_of_posts',
							'heading' => esc_html__('Number of Products', 'verdure')
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'number_of_columns',
							'heading' => esc_html__('Number of Columns', 'verdure'),
							'value' => array(
								esc_html__('One', 'verdure') => '1',
								esc_html__('Two', 'verdure') => '2',
								esc_html__('Three', 'verdure') => '3',
								esc_html__('Four', 'verdure') => '4',
								esc_html__('Five', 'verdure') => '5',
								esc_html__('Six', 'verdure') => '6'
							),
							'save_always' => true
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'space_between_items',
							'heading' => esc_html__('Space Between Items', 'verdure'),
							'value' => array_flip(verdure_mikado_get_space_between_items_array(false, false, true, true)),
							'save_always' => true
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'orderby',
							'heading' => esc_html__('Order By', 'verdure'),
							'value' => array_flip(verdure_mikado_get_query_order_by_array(false, array('on-sale' => esc_html__('On Sale', 'verdure')))),
							'save_always' => true
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'order',
							'heading' => esc_html__('Order', 'verdure'),
							'value' => array_flip(verdure_mikado_get_query_order_array()),
							'save_always' => true
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'taxonomy_to_display',
							'heading' => esc_html__('Choose Sorting Taxonomy', 'verdure'),
							'value' => array(
								esc_html__('Category', 'verdure') => 'category',
								esc_html__('Tag', 'verdure') => 'tag',
								esc_html__('Id', 'verdure') => 'id'
							),
							'save_always' => true,
							'description' => esc_html__('If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'verdure')
						),
						array(
							'type' => 'textfield',
							'param_name' => 'taxonomy_values',
							'heading' => esc_html__('Enter Taxonomy Values', 'verdure'),
							'description' => esc_html__('Separate values (category slugs, tags, or post IDs) with a comma', 'verdure')
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'image_size',
							'heading' => esc_html__('Image Proportions', 'verdure'),
							'value' => array(
								esc_html__('Default', 'verdure') => '',
								esc_html__('Original', 'verdure') => 'full',
								esc_html__('Square', 'verdure') => 'square',
								esc_html__('Landscape', 'verdure') => 'landscape',
								esc_html__('Portrait', 'verdure') => 'portrait',
								esc_html__('Medium', 'verdure') => 'medium',
								esc_html__('Large', 'verdure') => 'large',
								esc_html__('Shop Single', 'verdure') => 'woocommerce_single',
								esc_html__('Shop Thumbnail', 'verdure') => 'woocommerce_thumbnail'
							),
							'save_always' => true
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'display_title',
							'heading' => esc_html__('Display Title', 'verdure'),
							'value' => array_flip(verdure_mikado_get_yes_no_select_array(false, true)),
							'group' => esc_html__('Product Info', 'verdure')
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'product_info_skin',
							'heading' => esc_html__('Product Info Skin', 'verdure'),
							'value' => array(
								esc_html__('Default', 'verdure') => 'default',
								esc_html__('Light', 'verdure') => 'light',
								esc_html__('Dark', 'verdure') => 'dark'
							),
							'dependency' => array('element' => 'info_position', 'value' => array('info-on-image')),
							'group' => esc_html__('Product Info Style', 'verdure')
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'title_tag',
							'heading' => esc_html__('Title Tag', 'verdure'),
							'value' => array_flip(verdure_mikado_get_title_tag(true)),
							'dependency' => array('element' => 'display_title', 'value' => array('yes')),
							'group' => esc_html__('Product Info Style', 'verdure')
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'title_transform',
							'heading' => esc_html__('Title Text Transform', 'verdure'),
							'value' => array_flip(verdure_mikado_get_text_transform_array(true)),
							'dependency' => array('element' => 'display_title', 'value' => array('yes')),
							'group' => esc_html__('Product Info Style', 'verdure')
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'display_category',
							'heading' => esc_html__('Display Category', 'verdure'),
							'value' => array_flip(verdure_mikado_get_yes_no_select_array(false)),
							'group' => esc_html__('Product Info', 'verdure')
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'display_rating',
							'heading' => esc_html__('Display Rating', 'verdure'),
							'value' => array_flip(verdure_mikado_get_yes_no_select_array(false, true)),
							'save_always' => true,
							'group' => esc_html__('Product Info', 'verdure')
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'display_price',
							'heading' => esc_html__('Display Price', 'verdure'),
							'value' => array_flip(verdure_mikado_get_yes_no_select_array(false, true)),
							'group' => esc_html__('Product Info', 'verdure')
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'display_button',
							'heading' => esc_html__('Display Button', 'verdure'),
							'value' => array_flip(verdure_mikado_get_yes_no_select_array(false, true)),
							'group' => esc_html__('Product Info', 'verdure')
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'button_skin',
							'heading' => esc_html__('Button Skin', 'verdure'),
							'value' => array(
								esc_html__('Default', 'verdure') => 'default',
								esc_html__('Light', 'verdure') => 'light',
								esc_html__('Dark', 'verdure') => 'dark'
							),
							'dependency' => array('element' => 'display_button', 'value' => array('yes')),
							'group' => esc_html__('Product Info Style', 'verdure')
						),
						array(
							'type' => 'colorpicker',
							'param_name' => 'shader_background_color',
							'heading' => esc_html__('Shader Background Color', 'verdure'),
							'group' => esc_html__('Product Info Style', 'verdure')
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'info_bottom_text_align',
							'heading' => esc_html__('Product Info Text Alignment', 'verdure'),
							'value' => array(
								esc_html__('Default', 'verdure') => '',
								esc_html__('Left', 'verdure') => 'left',
								esc_html__('Center', 'verdure') => 'center',
								esc_html__('Right', 'verdure') => 'right'
							),
							'dependency' => array('element' => 'info_position', 'value' => array('info-below-image')),
							'group' => esc_html__('Product Info Style', 'verdure')
						),
						array(
							'type' => 'textfield',
							'param_name' => 'info_bottom_margin',
							'heading' => esc_html__('Product Info Bottom Margin (px)', 'verdure'),
							'dependency' => array('element' => 'info_position', 'value' => array('info-below-image')),
							'group' => esc_html__('Product Info Style', 'verdure')
						)
					)
				)
			);
		}
	}

	public function render($atts, $content = null)
	{
		$default_atts = array(
			'type' => 'standard',
			'info_position' => 'info-on-image',
			'circle_frame' => 'no',
			'number_of_posts' => '8',
			'number_of_columns' => '4',
			'space_between_items' => 'huge',
			'orderby' => 'date',
			'order' => 'ASC',
			'taxonomy_to_display' => 'category',
			'taxonomy_values' => '',
			'image_size' => 'full',
			'display_title' => 'yes',
			'product_info_skin' => '',
			'title_tag' => 'h4',
			'title_transform' => '',
			'display_category' => 'no',
			'display_rating' => '',
			'display_price' => 'yes',
			'display_button' => 'yes',
			'button_skin' => 'default',
			'shader_background_color' => '',
			'info_bottom_text_align' => '',
			'info_bottom_margin' => ''
		);
		$params = shortcode_atts($default_atts, $atts);

		$params['class_name'] = 'pli';
		$params['type'] = !empty($params['type']) ? $params['type'] : $default_atts['type'];
		$params['info_position'] = !empty($params['info_position']) ? $params['info_position'] : $default_atts['info_position'];
		$params['circle_frame'] = !empty($params['circle_frame']) ? $params['circle_frame'] : $default_atts['circle_frame'];
		$params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $default_atts['title_tag'];
		$params['layout_classes'] = $this->getLayoutClasses($params);

		$additional_params = array();
		$additional_params['holder_classes'] = $this->getHolderClasses($params, $default_atts);

		$queryArray = $this->generateProductQueryArray($params);
		$query_result = new \WP_Query($queryArray);
		$additional_params['query_result'] = $query_result;

		$params['this_object'] = $this;

		$html = verdure_mikado_get_woo_shortcode_module_template_part('templates/product-list', 'product-list', $params['type'], $params, $additional_params);

		return $html;
	}

	private function getHolderClasses($params, $default_atts)
	{
		$holderClasses = array();
		$holderClasses[] = !empty($params['type']) ? 'mkdf-' . $params['type'] . '-layout' : 'mkdf-' . $default_atts['type'] . '-layout';
		$holderClasses[] = !empty($params['space_between_items']) ? 'mkdf-' . $params['space_between_items'] . '-space' : 'mkdf-' . $default_atts['space_between_items'] . '-space';
		$holderClasses[] = $this->getColumnNumberClass($params);
		$holderClasses[] = !empty($params['info_position']) ? 'mkdf-' . $params['info_position'] : 'mkdf-' . $default_atts['info_position'];
		$holderClasses[] = !empty($params['product_info_skin']) ? 'mkdf-product-info-' . $params['product_info_skin'] : '';

		return implode(' ', $holderClasses);
	}

	private function getLayoutClasses($params)
	{
		$layoutClasses = array();
		//change to true if hover is changed to from bottom
		$btn_from_bottom = false;
		$btn_position_class = '';

		if ($params['info_position'] == 'info-below-image' && $btn_from_bottom) {
			$btn_position_class = 'mkdf-pli-button-from-bottom';
		} else {
			$btn_position_class = 'mkdf-pli-hover-overlay';
		}

		$layoutClasses[] = $btn_position_class;

		return implode(' ', $layoutClasses);
	}

	private function getColumnNumberClass($params)
	{
		$columnsNumber = '';
		$columns = $params['number_of_columns'];

		switch ($columns) {
			case 1:
				$columnsNumber = 'mkdf-one-column';
				break;
			case 2:
				$columnsNumber = 'mkdf-two-columns';
				break;
			case 3:
				$columnsNumber = 'mkdf-three-columns';
				break;
			case 4:
				$columnsNumber = 'mkdf-four-columns';
				break;
			case 5:
				$columnsNumber = 'mkdf-five-columns';
				break;
			case 6:
				$columnsNumber = 'mkdf-six-columns';
				break;
			default:
				$columnsNumber = 'mkdf-four-columns';
				break;
		}

		return $columnsNumber;
	}

	private function generateProductQueryArray($params)
	{
		$queryArray = array(
			'post_status' => 'publish',
			'post_type' => 'product',
			'ignore_sticky_posts' => 1,
			'posts_per_page' => $params['number_of_posts'],
			'orderby' => $params['orderby'],
			'order' => $params['order']
		);

		if ($params['orderby'] === 'on-sale') {
			$queryArray['no_found_rows'] = 1;
			$queryArray['post__in'] = array_merge(array(0), wc_get_product_ids_on_sale());
		}

		if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category') {
			$queryArray['product_cat'] = $params['taxonomy_values'];
		}

		if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag') {
			$queryArray['product_tag'] = $params['taxonomy_values'];
		}

		if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id') {
			$idArray = $params['taxonomy_values'];
			$ids = explode(',', $idArray);
			$queryArray['post__in'] = $ids;
		}

		return $queryArray;
	}

	public function getItemClasses($params)
	{
		$itemClasses = array();

		$image_size_meta = get_post_meta(get_the_ID(), 'mkdf_product_featured_image_size', true);

		if (!empty($image_size_meta)) {
			$itemClasses[] = 'mkdf-woo-fixed-masonry mkdf-masonry-size-' . $image_size_meta;
		}

		if ($params['circle_frame'] == 'yes') {
			$itemClasses[] = 'mkdf-circle-frame';
		}

		return implode(' ', $itemClasses);
	}

	public function getTitleStyles($params)
	{
		$styles = array();

		if (!empty($params['title_transform'])) {
			$styles[] = 'text-transform: ' . $params['title_transform'];
		}

		return implode(';', $styles);
	}

	public function getShaderStyles($params)
	{
		$styles = array();

		if (!empty($params['shader_background_color'])) {
			$styles[] = 'background-color: ' . $params['shader_background_color'];
		}

		return implode(';', $styles);
	}

	public function getTextWrapperStyles($params)
	{
		$styles = array();

		if (!empty($params['info_bottom_text_align'])) {
			$styles[] = 'text-align: ' . $params['info_bottom_text_align'];
		}

		if ($params['info_bottom_margin'] !== '') {
			$styles[] = 'margin-bottom: ' . verdure_mikado_filter_px($params['info_bottom_margin']) . 'px';
		}

		return implode(';', $styles);
	}
}