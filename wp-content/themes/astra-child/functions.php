<?php
/**
 * Astra Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child
 * @since 1.0.0
 */

/**
 * Enqueue styles
 */
function child_enqueue_styles() {
	wp_enqueue_style( 'astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), '1.0.0', 'all' );
}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

/**
 * Enqueue custom scripts
 */
function child_enqueue_scripts() {
    wp_enqueue_script( 'trident-custom-js', get_stylesheet_directory_uri() . '/js/custom-scripts.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_scripts' );
