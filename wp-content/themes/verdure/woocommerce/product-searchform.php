<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="screen-reader-text"><?php esc_html_e('Search for:', 'verdure'); ?></label>
    <div class="input-holder clearfix">
        <input type="search" class="search-field" placeholder="<?php echo esc_attr__('Search Products...', 'verdure'); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr__('Search for:', 'verdure'); ?>"/>
	    <button type="submit" class="mkdf-woo-search-widget-button">
            <svg class="mkdf-search-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 width="20px" height="18.8px" viewBox="0 0 20.025 18.846" enable-background="new 0 0 20.025 18.846" xml:space="preserve">
                <path fill="currentColor" d="M19.681,17.752l-4.93-4.158c1.141-1.387,1.828-3.162,1.828-5.094c0-4.426-3.6-8.025-8.024-8.025
                c-4.424,0-8.024,3.599-8.024,8.025c0,4.424,3.601,8.023,8.024,8.023c2.223,0,4.237-0.908,5.69-2.373l4.951,4.176L19.681,17.752z
                 M8.555,15.774c-4.012,0-7.274-3.264-7.274-7.273c0-4.012,3.265-7.276,7.274-7.276c4.01,0,7.274,3.263,7.274,7.274
                C15.829,12.51,12.565,15.774,8.555,15.774z"/>
            </svg>
        </button>
        <input type="hidden" name="post_type" value="product"/>
    </div>
</form>