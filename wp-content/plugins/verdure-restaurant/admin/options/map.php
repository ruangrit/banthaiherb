<?php

if(verdure_restaurant_theme_installed()) {
	if(!function_exists('verdure_restaurant_options_map')) {
		/**
		 * Adds admin page for OpenTable integration
		 */
		function verdure_restaurant_options_map() {
			verdure_mikado_add_admin_page(array(
				'title' => esc_html__('Restaurant', 'verdure-restaurant'),
				'slug'  => '_restaurant',
				'icon'  => 'fa fa-cutlery'
			));

			//#Working Hours panel
			$panel_working_hours = verdure_mikado_add_admin_panel(array(
				'page'  => '_restaurant',
				'name'  => 'panel_working_hours',
				'title' => esc_html__('Working Hours', 'verdure-restaurant')
			));

			$monday_group = verdure_mikado_add_admin_group(array(
				'name'        => 'monday_group',
				'title'       => esc_html__('Monday', 'verdure-restaurant'),
				'parent'      => $panel_working_hours,
				'description' => esc_html__('Working hours for Monday', 'verdure-restaurant')
			));

			$monday_row = verdure_mikado_add_admin_row(array(
				'name'   => 'monday_row',
				'parent' => $monday_group
			));

			verdure_mikado_add_admin_field(array(
				'name'   => 'wh_monday_from',
				'type'   => 'textsimple',
				'label'  => esc_html__('From', 'verdure-restaurant'),
				'parent' => $monday_row
			));

			verdure_mikado_add_admin_field(array(
				'name'   => 'wh_monday_to',
				'type'   => 'textsimple',
				'label'  => esc_html__('To', 'verdure-restaurant'),
				'parent' => $monday_row
			));

			$tuesday_group = verdure_mikado_add_admin_group(array(
				'name'        => 'tuesday_group',
				'title'       => esc_html__('Tuesday', 'verdure-restaurant'),
				'parent'      => $panel_working_hours,
				'description' => esc_html__('Working hours for Tuesday', 'verdure-restaurant')
			));

			$tuesday_row = verdure_mikado_add_admin_row(array(
				'name'   => 'tuesday_row',
				'parent' => $tuesday_group
			));

			verdure_mikado_add_admin_field(array(
				'name'   => 'wh_tuesday_from',
				'type'   => 'textsimple',
				'label'  => esc_html__('From', 'verdure-restaurant'),
				'parent' => $tuesday_row
			));

			verdure_mikado_add_admin_field(array(
				'name'   => 'wh_tuesday_to',
				'type'   => 'textsimple',
				'label'  => esc_html__('To', 'verdure-restaurant'),
				'parent' => $tuesday_row
			));

			$wednesday_group = verdure_mikado_add_admin_group(array(
				'name'        => 'wednesday_group',
				'title'       => esc_html__('Wednesday', 'verdure-restaurant'),
				'parent'      => $panel_working_hours,
				'description' => esc_html__('Working hours for Wednesday', 'verdure-restaurant')
			));

			$wednesday_row = verdure_mikado_add_admin_row(array(
				'name'   => 'wednesday_row',
				'parent' => $wednesday_group
			));

			verdure_mikado_add_admin_field(array(
				'name'   => 'wh_wednesday_from',
				'type'   => 'textsimple',
				'label'  => esc_html__('From', 'verdure-restaurant'),
				'parent' => $wednesday_row
			));

			verdure_mikado_add_admin_field(array(
				'name'   => 'wh_wednesday_to',
				'type'   => 'textsimple',
				'label'  => esc_html__('To', 'verdure-restaurant'),
				'parent' => $wednesday_row
			));

			$thursday_group = verdure_mikado_add_admin_group(array(
				'name'        => 'thursday_group',
				'title'       => esc_html__('Thursday', 'verdure-restaurant'),
				'parent'      => $panel_working_hours,
				'description' => 'Working hours for Thursday'
			));

			$thursday_row = verdure_mikado_add_admin_row(array(
				'name'   => 'thursday_row',
				'parent' => $thursday_group
			));

			verdure_mikado_add_admin_field(array(
				'name'   => 'wh_thursday_from',
				'type'   => 'textsimple',
				'label'  => esc_html__('From', 'verdure-restaurant'),
				'parent' => $thursday_row
			));

			verdure_mikado_add_admin_field(array(
				'name'   => 'wh_thursday_to',
				'type'   => 'textsimple',
				'label'  => esc_html__('To', 'verdure-restaurant'),
				'parent' => $thursday_row
			));

			$friday_group = verdure_mikado_add_admin_group(array(
				'name'        => 'friday_group',
				'title'       => esc_html__('Friday', 'verdure-restaurant'),
				'parent'      => $panel_working_hours,
				'description' => esc_html__('Working hours for Friday', 'verdure-restaurant')
			));

			$friday_row = verdure_mikado_add_admin_row(array(
				'name'   => 'friday_row',
				'parent' => $friday_group
			));

			verdure_mikado_add_admin_field(array(
				'name'   => 'wh_friday_from',
				'type'   => 'textsimple',
				'label'  => esc_html__('From', 'verdure-restaurant'),
				'parent' => $friday_row
			));

			verdure_mikado_add_admin_field(array(
				'name'   => 'wh_friday_to',
				'type'   => 'textsimple',
				'label'  => esc_html__('To', 'verdure-restaurant'),
				'parent' => $friday_row
			));

			$saturday_group = verdure_mikado_add_admin_group(array(
				'name'        => 'saturday_group',
				'title'       => esc_html__('Saturday', 'verdure-restaurant'),
				'parent'      => $panel_working_hours,
				'description' => esc_html__('Working hours for Saturday', 'verdure-restaurant')
			));

			$saturday_row = verdure_mikado_add_admin_row(array(
				'name'   => 'saturday_row',
				'parent' => $saturday_group
			));

			verdure_mikado_add_admin_field(array(
				'name'   => 'wh_saturday_from',
				'type'   => 'textsimple',
				'label'  => esc_html__('From', 'verdure-restaurant'),
				'parent' => $saturday_row
			));

			verdure_mikado_add_admin_field(array(
				'name'   => 'wh_saturday_to',
				'type'   => 'textsimple',
				'label'  => esc_html__('To', 'verdure-restaurant'),
				'parent' => $saturday_row
			));

			$sunday_group = verdure_mikado_add_admin_group(array(
				'name'        => 'sunday_group',
				'title'       => esc_html__('Sunday', 'verdure-restaurant'),
				'parent'      => $panel_working_hours,
				'description' => esc_html__('Working hours for Sunday', 'verdure-restaurant')
			));

			$sunday_row = verdure_mikado_add_admin_row(array(
				'name'   => 'sunday_row',
				'parent' => $sunday_group
			));

			verdure_mikado_add_admin_field(array(
				'name'   => 'wh_sunday_from',
				'type'   => 'textsimple',
				'label'  => esc_html__('From', 'verdure-restaurant'),
				'parent' => $sunday_row
			));

			verdure_mikado_add_admin_field(array(
				'name'   => 'wh_sunday_to',
				'type'   => 'textsimple',
				'label'  => esc_html__('To', 'verdure-restaurant'),
				'parent' => $sunday_row
			));
		}

		add_action('verdure_mikado_options_map', 'verdure_restaurant_options_map', 71); //one after elements
	}
}