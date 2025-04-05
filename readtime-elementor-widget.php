<?php
/*
Plugin Name: ReadTime Elementor Widget
Description: Adds a customizable Elementor widget for read time, read aloud, and share article functionality.
Version: 1.0
Author: Adalberto H. Vega
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include the widget class
require_once plugin_dir_path(__FILE__) . 'includes/class-readtime-widget.php';

// Register the widget
function register_readtime_elementor_widget($widgets_manager) {
    require_once plugin_dir_path(__FILE__) . 'includes/class-readtime-widget.php';
    $widgets_manager->register(new \ReadTime_Elementor_Widget());
}
add_action('elementor/widgets/register', 'register_readtime_elementor_widget');

// Enqueue styles and scripts
function readtime_enqueue_scripts() {
    wp_enqueue_style('readtime-widget-style', plugin_dir_url(__FILE__) . 'assets/css/style.css');
    wp_enqueue_script('readtime-widget-script', plugin_dir_url(__FILE__) . 'assets/js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'readtime_enqueue_scripts');