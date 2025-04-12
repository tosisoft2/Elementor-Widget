<?php
/**
 * Plugin Name: Elementor List Widget
 * Description: List widget for Elementor.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-list-widget
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register List Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_list_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/list-widget.php' );
    require_once( __DIR__ . '/widgets/history-widget.php' ); // Add another widget file

    $widgets_manager->register( new \Elementor_List_Widget() );
    $widgets_manager->register( new \Creative_History_Widget() ); // Register second widget

}
add_action( 'elementor/widgets/register', 'register_list_widget' );


function creative_history_enqueue_assets() {
    // Enqueue CSS
    wp_enqueue_style(
        'creative-history-style',
        plugins_url('assets/css/style.css', __FILE__)
    );

    // Enqueue JavaScript
    wp_enqueue_script(
        'creative-history-script',
        plugins_url('assets/js/script.js', __FILE__),
        array(),  // No dependencies (since it's vanilla JS)
        false,
        true  // Load in footer for better performance
    );
}
add_action('wp_enqueue_scripts', 'creative_history_enqueue_assets');


