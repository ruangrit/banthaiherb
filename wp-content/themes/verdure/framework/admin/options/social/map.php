<?php

if ( ! function_exists( 'verdure_mikado_social_options_map' ) ) {
	function verdure_mikado_social_options_map() {

	    $page = '_social_page';
		
		verdure_mikado_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__( 'Social Networks', 'verdure' ),
				'icon'  => 'fa fa-share-alt'
			)
		);
		
		/**
		 * Enable Social Share
		 */
		$panel_social_share = verdure_mikado_add_admin_panel(
			array(
				'page'  => '_social_page',
				'name'  => 'panel_social_share',
				'title' => esc_html__( 'Enable Social Share', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Social Share', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will allow social share on networks of your choice', 'verdure' ),
				'parent'        => $panel_social_share
			)
		);
		
		$panel_show_social_share_on = verdure_mikado_add_admin_panel(
			array(
				'page'            => '_social_page',
				'name'            => 'panel_show_social_share_on',
				'title'           => esc_html__( 'Show Social Share On', 'verdure' ),
				'dependency' => array(
					'show' => array(
						'enable_social_share'  => 'yes'
					)
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_post',
				'default_value' => 'no',
				'label'         => esc_html__( 'Posts', 'verdure' ),
				'description'   => esc_html__( 'Show Social Share on Blog Posts', 'verdure' ),
				'parent'        => $panel_show_social_share_on
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_page',
				'default_value' => 'no',
				'label'         => esc_html__( 'Pages', 'verdure' ),
				'description'   => esc_html__( 'Show Social Share on Pages', 'verdure' ),
				'parent'        => $panel_show_social_share_on
			)
		);

        /**
         * Action for embedding social share option for custom post types
         */
		do_action('verdure_mikado_post_types_social_share', $panel_show_social_share_on);
		
		/**
		 * Social Share Networks
		 */
		$panel_social_networks = verdure_mikado_add_admin_panel(
			array(
				'page'            => '_social_page',
				'name'            => 'panel_social_networks',
				'title'           => esc_html__( 'Social Networks', 'verdure' ),
				'dependency' => array(
					'hide' => array(
						'enable_social_share'  => 'no'
					)
				)
			)
		);
		
		/**
		 * Facebook
		 */
		verdure_mikado_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'facebook_title',
				'title'  => esc_html__( 'Share on Facebook', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_facebook_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Facebook', 'verdure' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_facebook_share_container = verdure_mikado_add_admin_container(
			array(
				'name'            => 'enable_facebook_share_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_facebook_share'  => 'yes'
					)
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'facebook_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'verdure' ),
				'parent'        => $enable_facebook_share_container
			)
		);
		
		/**
		 * Twitter
		 */
		verdure_mikado_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'twitter_title',
				'title'  => esc_html__( 'Share on Twitter', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_twitter_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Twitter', 'verdure' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_twitter_share_container = verdure_mikado_add_admin_container(
			array(
				'name'            => 'enable_twitter_share_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_twitter_share'  => 'yes'
					)
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'twitter_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'verdure' ),
				'parent'        => $enable_twitter_share_container
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'twitter_via',
				'default_value' => '',
				'label'         => esc_html__( 'Via', 'verdure' ),
				'parent'        => $enable_twitter_share_container
			)
		);
		
		/**
		 * Google Plus
		 */
		verdure_mikado_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'google_plus_title',
				'title'  => esc_html__( 'Share on Google Plus', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_google_plus_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Google Plus', 'verdure' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_google_plus_container = verdure_mikado_add_admin_container(
			array(
				'name'            => 'enable_google_plus_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_google_plus_share'  => 'yes'
					)
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'google_plus_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'verdure' ),
				'parent'        => $enable_google_plus_container
			)
		);
		
		/**
		 * Linked In
		 */
		verdure_mikado_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'linkedin_title',
				'title'  => esc_html__( 'Share on LinkedIn', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_linkedin_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via LinkedIn', 'verdure' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_linkedin_container = verdure_mikado_add_admin_container(
			array(
				'name'            => 'enable_linkedin_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_linkedin_share'  => 'yes'
					)
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'linkedin_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'verdure' ),
				'parent'        => $enable_linkedin_container
			)
		);
		
		/**
		 * Tumblr
		 */
		verdure_mikado_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'tumblr_title',
				'title'  => esc_html__( 'Share on Tumblr', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_tumblr_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Tumblr', 'verdure' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_tumblr_container = verdure_mikado_add_admin_container(
			array(
				'name'            => 'enable_tumblr_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_tumblr_share'  => 'yes'
					)
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'tumblr_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'verdure' ),
				'parent'        => $enable_tumblr_container
			)
		);
		
		/**
		 * Pinterest
		 */
		verdure_mikado_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'pinterest_title',
				'title'  => esc_html__( 'Share on Pinterest', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_pinterest_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Pinterest', 'verdure' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_pinterest_container = verdure_mikado_add_admin_container(
			array(
				'name'            => 'enable_pinterest_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_pinterest_share'  => 'yes'
					)
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'pinterest_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'verdure' ),
				'parent'        => $enable_pinterest_container
			)
		);
		
		/**
		 * VK
		 */
		verdure_mikado_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'vk_title',
				'title'  => esc_html__( 'Share on VK', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_vk_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via VK', 'verdure' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_vk_container = verdure_mikado_add_admin_container(
			array(
				'name'            => 'enable_vk_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_vk_share'  => 'yes'
					)
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'vk_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'verdure' ),
				'parent'        => $enable_vk_container
			)
		);
		
		if ( defined( 'VERDURE_TWITTER_FEED_VERSION' ) ) {
			$twitter_panel = verdure_mikado_add_admin_panel(
				array(
					'title' => esc_html__( 'Twitter', 'verdure' ),
					'name'  => 'panel_twitter',
					'page'  => '_social_page'
				)
			);
			
			verdure_mikado_add_admin_twitter_button(
				array(
					'name'   => 'twitter_button',
					'parent' => $twitter_panel
				)
			);
		}
		
		if ( defined( 'VERDURE_INSTAGRAM_FEED_VERSION' ) ) {
			$instagram_panel = verdure_mikado_add_admin_panel(
				array(
					'title' => esc_html__( 'Instagram', 'verdure' ),
					'name'  => 'panel_instagram',
					'page'  => '_social_page'
				)
			);
			
			verdure_mikado_add_admin_instagram_button(
				array(
					'name'   => 'instagram_button',
					'parent' => $instagram_panel
				)
			);
		}
		
		/**
		 * Open Graph
		 */
		$panel_open_graph = verdure_mikado_add_admin_panel(
			array(
				'page'  => '_social_page',
				'name'  => 'panel_open_graph',
				'title' => esc_html__( 'Open Graph', 'verdure' ),
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_open_graph',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Open Graph', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will allow usage of Open Graph protocol on your site', 'verdure' ),
				'parent'        => $panel_open_graph
			)
		);
		
		$enable_open_graph_container = verdure_mikado_add_admin_container(
			array(
				'name'            => 'enable_open_graph_container',
				'parent'          => $panel_open_graph,
				'dependency' => array(
					'show' => array(
						'enable_open_graph'  => 'yes'
					)
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'open_graph_image',
				'default_value' => MIKADO_ASSETS_ROOT . '/img/open_graph.jpg',
				'label'         => esc_html__( 'Default Share Image', 'verdure' ),
				'parent'        => $enable_open_graph_container,
				'description'   => esc_html__( 'Used when featured image is not set. Make sure that image is at least 1200 x 630 pixels, up to 8MB in size', 'verdure' ),
			)
		);

        /**
         * Action for embedding social share option for custom post types
         */
        do_action('verdure_mikado_social_options', $page);
	}
	
	add_action( 'verdure_mikado_options_map', 'verdure_mikado_social_options_map', 18 );
}