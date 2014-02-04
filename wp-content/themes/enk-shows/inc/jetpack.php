<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package ENK Shows
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function enk_shows_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'enk_shows_jetpack_setup' );
