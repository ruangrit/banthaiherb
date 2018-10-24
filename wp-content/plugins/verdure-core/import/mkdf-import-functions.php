<?php

if ( ! function_exists( 'verdure_core_import_object' ) ) {
	function verdure_core_import_object() {
		$verdure_core_import_object = new VerdureCoreImport();
	}
	
	add_action( 'init', 'verdure_core_import_object' );
}

if ( ! function_exists( 'verdure_core_data_import' ) ) {
	function verdure_core_data_import() {
		$importObject = VerdureCoreImport::getInstance();
		
		if ( $_POST['import_attachments'] == 1 ) {
			$importObject->attachments = true;
		} else {
			$importObject->attachments = false;
		}
		
		$folder = "verdure/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_content( $folder . $_POST['xml'] );
		
		die();
	}
	
	add_action( 'wp_ajax_verdure_core_data_import', 'verdure_core_data_import' );
}

if ( ! function_exists( 'verdure_core_widgets_import' ) ) {
	function verdure_core_widgets_import() {
		$importObject = VerdureCoreImport::getInstance();
		
		$folder = "verdure/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_widgets( $folder . 'widgets.txt', $folder . 'custom_sidebars.txt' );
		
		die();
	}
	
	add_action( 'wp_ajax_verdure_core_widgets_import', 'verdure_core_widgets_import' );
}

if ( ! function_exists( 'verdure_core_options_import' ) ) {
	function verdure_core_options_import() {
		$importObject = VerdureCoreImport::getInstance();
		
		$folder = "verdure/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_options( $folder . 'options.txt' );
		
		die();
	}
	
	add_action( 'wp_ajax_verdure_core_options_import', 'verdure_core_options_import' );
}

if ( ! function_exists( 'verdure_core_other_import' ) ) {
	function verdure_core_other_import() {
		$importObject = VerdureCoreImport::getInstance();
		
		$folder = "verdure/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_options( $folder . 'options.txt' );
		$importObject->import_widgets( $folder . 'widgets.txt', $folder . 'custom_sidebars.txt' );
		$importObject->import_menus( $folder . 'menus.txt' );
		$importObject->import_settings_pages( $folder . 'settingpages.txt' );

		$importObject->mkdf_update_meta_fields_after_import($folder);
		$importObject->mkdf_update_options_after_import($folder);

		if ( verdure_core_is_revolution_slider_installed() ) {
			$importObject->rev_slider_import( $folder );
		}
		
		die();
	}
	
	add_action( 'wp_ajax_verdure_core_other_import', 'verdure_core_other_import' );
}