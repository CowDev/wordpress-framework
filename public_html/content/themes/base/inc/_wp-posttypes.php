<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
* Creating a function to create our CPT
*/
/*
function custom_post_type() {

	$labels = array(
		'name'               => _x( 'Nieuws', 'Post Type General Name', 'bvdb' ),
		'singular_name'      => _x( 'Nieuwsbericht', 'Post Type Singular Name', 'bvdb' ),
		'menu_name'          => __( 'Nieuwsberichten', 'bvdb' ),
		'parent_item_colon'  => __( 'Nieuws', 'bvdb' ),
		'all_items'          => __( 'Alle nieuwsberichten', 'bvdb' ),
		'view_item'          => __( 'Bekijk nieuwsbericht', 'bvdb' ),
		'add_new_item'       => __( 'Nieuwe toevoegen', 'bvdb' ),
		'add_new'            => __( 'Nieuwe toevoegen', 'bvdb' ),
		'edit_item'          => __( 'Bewerk nieuwsbericht', 'bvdb' ),
		'update_item'        => __( 'Update nieuwsbericht', 'bvdb' ),
		'search_items'       => __( 'Zoek nieuwsbericht', 'bvdb' ),
		'not_found'          => __( 'Niet gevonden', 'bvdb' ),
		'not_found_in_trash' => __( 'Niet gevonden in prullenbak', 'bvdb' ),
	);

	$args = array(
		'label'               => __( 'nieuws', 'bvdb' ),
		'description'         => __( 'Nieuwsberichten', 'bvdb' ),
		'labels'              => $labels,
		'supports'            => array(
			'title',
			'editor',
			'excerpt',
			'author',
			'thumbnail',
			'revisions',
		),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	// Registering your Custom Post Type
	register_post_type( 'nieuws', $args );

	$labels = array(
		'name'               => _x( 'Agenda', 'Post Type General Name', 'bvdb' ),
		'singular_name'      => _x( 'Agendaitem', 'Post Type Singular Name', 'bvdb' ),
		'menu_name'          => __( 'Agenda', 'bvdb' ),
		'parent_item_colon'  => __( 'Agenda', 'bvdb' ),
		'all_items'          => __( 'Alle agendaitems', 'bvdb' ),
		'view_item'          => __( 'Bekijk agendaitem', 'bvdb' ),
		'add_new_item'       => __( 'Nieuwe toevoegen', 'bvdb' ),
		'add_new'            => __( 'Nieuwe toevoegen', 'bvdb' ),
		'edit_item'          => __( 'Bewerk agendaitem', 'bvdb' ),
		'update_item'        => __( 'Update agendaitem', 'bvdb' ),
		'search_items'       => __( 'Zoek agendaitem', 'bvdb' ),
		'not_found'          => __( 'Niet gevonden', 'bvdb' ),
		'not_found_in_trash' => __( 'Niet gevonden in prullenbak', 'bvdb' ),
	);

	$args = array(
		'label'               => __( 'agenda', 'bvdb' ),
		'description'         => __( 'Agendaitems', 'bvdb' ),
		'labels'              => $labels,
		'supports'            => array(
			'title',
			'editor',
			'excerpt',
			'author',
			'thumbnail',
			'revisions',
		),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	// Registering your Custom Post Type
	register_post_type( 'agenda', $args );

}

add_action( 'init', 'custom_post_type', 0 ); */