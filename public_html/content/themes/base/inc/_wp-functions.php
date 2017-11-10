<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
* Register our sidebars and widgetized areas.
*
*/
function cowdev_widgets_init() {

	register_sidebar( array(
		'name'          => 'Bovenste footer',
		'id'            => 'topfooter',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Middelste footer',
		'id'            => 'midfooter',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer',
		'id'            => 'footer',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'cowdev_widgets_init' );

// Add image sizes
add_image_size( 'banner', 960, 500 );