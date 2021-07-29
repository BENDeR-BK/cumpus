<?php
/**
 * campus enqueue scripts
 *
 * @package campus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'campus_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function campus_scripts() {
 
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		// Styles
		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/assets/css/main.min.css' );
		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/assets/css/style.min.css' );
		// $css_version = $theme_version . '.' . filemtime( get_template_directory() . '/assets/css/mainw.min.css' );
		// wp_enqueue_style( 'sd-map', 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.5.1/leaflet.css', array(), $css_version );
		wp_enqueue_style( 'sd-styles', get_template_directory_uri() . '/assets/css/style.min.css', array(), $css_version );
		wp_enqueue_style( 'sd-stylesw', get_template_directory_uri() . '/assets/css/mainw.min.css', array(), $css_version );
		wp_enqueue_style( 'sd-style', get_template_directory_uri() . '/assets/css/main.min.css', array(), $css_version );
		
		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/assets/js/main.js' );
		

		// wp_enqueue_script( 'ca-custom', get_template_directory_uri() . '/assets/js/swiper.min.js', array('ca-libs'), $js_version, true );
		wp_enqueue_script( 'nm-swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', array(), $js_version, true );
		wp_enqueue_script( 'nm-main', get_template_directory_uri() . '/assets/js/main.js', array(), $js_version, true );


		wp_localize_script( 'nm-main', '$nm_js', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		));

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'campus_scripts' );