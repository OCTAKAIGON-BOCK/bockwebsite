<?php
/**
 * Theme functions and definitions
 *
 * @package Fluxa
 */

/**
 * After setup theme hook
 */
function fluxa_theme_setup(){
    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'fluxa' );	
}
add_action( 'after_setup_theme', 'fluxa_theme_setup' );

/**
 * Load assets.
 */

function fluxa_theme_css() {
	wp_enqueue_style( 'fluxa-parent-theme-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'fluxa_theme_css', 99);

/**
 * Import Options From Parent Theme
 *
 */
function fluxa_parent_theme_options() {
	$atua_mods = get_option( 'theme_mods_atua' );
	if ( ! empty( $atua_mods ) ) {
		foreach ( $atua_mods as $atua_mod_k => $atua_mod_v ) {
			set_theme_mod( $atua_mod_k, $atua_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'fluxa_parent_theme_options' );

require get_stylesheet_directory() . '/theme-functions/controls/class-customize.php';

/**
 * Page header
 *
 */
function fluxa_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'fluxa_custom_header_args', array(
		'default-text-color' => 'ffffff',
		'width'              => 1920,
		'height'             => 200,
		'flex-height'        => true,
		'flex-width'         => true,
		'wp-head-callback'   => 'atua_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'fluxa_custom_header_setup' );