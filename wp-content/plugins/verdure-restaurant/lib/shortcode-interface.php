<?php
namespace VerdureRestaurant\Lib;

/**
 * Interface ShortcodeInterface
 * @package VerdureRestaurant\Lib
 */
interface ShortcodeInterface {
    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase();

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     * @return string
     */
    public function render($atts, $content = null);


}