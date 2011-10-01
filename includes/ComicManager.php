<?php

require( dirname( __FILE__ ) . '/term-to-post_type-sync.class.php' );

/*

Custom Post Type
* Comic
** taxonomies: comic series
** supports: title, content, thumbnail, revisions
* Character

Taxonomy
* Comic Series
* Character (sync to character)

*/

class ComicManager {
	
	const comic_post_type = 'p-comic';
	
	const character_post_type = 'p-character';
	const character_taxonomy = 't-character';
	const series_post_type = 'p-series';
	const series_taxonomy = 't-series';
	
    
	function __construct() {
		add_action( 'init', array( $this, 'init' ) );
		
		add_action( 'parse_query', array( $this, 'parse_query' ) );
		
		// Add image sizes
		// TODO: should probably be filterable
		add_image_size( 'comic-full', 880, 2000 );
		add_image_size( 'comic-medium', 440, 1000 );
		add_image_size( 'comic-thumb', 100, 100, true );
		
		add_image_size( 'character-thumb-large', 100, 100, true );
		add_image_size( 'character-thumb-small', 50, 50, true );
	}
    
	function init() {
		register_post_type( self::comic_post_type, array(
			'labels' => array(
				'name' => _x( 'Comic', 'post type general name' ),
				'singular_name' => _x( 'Comic', 'post type singular name' ),
				'add_new' => _x( 'Add New', 'comic' ),
				'add_new_item' => __( 'Add New Comic' ),
				'edit_item' => __( 'Edit Comic' ),
				'new_item' => __( 'New Comic' ),
				'view_item' => __( 'View Comic' ),
				'search_items' => __( 'Search Comics' ),
				'not_found' =>  __( 'No Comics Found' ),
				'not_found_in_trash' => __( 'No Comics found in Trash' ), 
				'parent_item_colon' => '',
				'menu_name' => 'Comics'
			),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'show_in_menu' => true, 
			'query_var' => true,
			'rewrite' => array( 'slug' => 'comic' ),
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'comments' ),
		) );
		
		register_post_type( self::character_post_type, array(
			'labels' => array(
				'name' => _x( 'Character', 'post type general name' ),
				'singular_name' => _x( 'Character', 'post type singular name' ),
				'add_new' => _x( 'Add New', 'quote' ),
				'add_new_item' => __( 'Add New Character' ),
				'edit_item' => __( 'Edit Character' ),
				'new_item' => __( 'New Character' ),
				'view_item' => __( 'View Character' ),
				'search_items' => __( 'Search Characters' ),
				'not_found' =>  __( 'No Characters Found' ),
				'not_found_in_trash' => __( 'No Characters found in Trash' ), 
				'parent_item_colon' => '',
				'menu_name' => 'Characters'
			),
			'public' => true,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'show_ui' => true, 
			'show_in_menu' => true, 
			'query_var' => false,
			'rewrite' => false,
			'capability_type' => 'post',
			'has_archive' => false, 
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		) );
		
		register_taxonomy( self::character_taxonomy, self::comic_post_type, array(
			'hierarchical' => false,
			'label' => 'Character',
			'show_ui' => true,
			'query_var' => true, // TODO: false
			'rewrite' => array( 'slug' => 'character' ),
		) );
		
		register_post_type( self::series_post_type, array(
			'labels' => array(
				'name' => _x( 'Series', 'post type general name' ),
				'singular_name' => _x( 'Series', 'post type singular name' ),
				'add_new' => _x( 'Add New', 'series' ),
				'add_new_item' => __( 'Add New Series' ),
				'edit_item' => __( 'Edit Series' ),
				'new_item' => __( 'New Series' ),
				'view_item' => __( 'View Series' ),
				'search_items' => __( 'Search Series' ),
				'not_found' =>  __( 'No Series Found' ),
				'not_found_in_trash' => __( 'No Series found in Trash' ), 
				'parent_item_colon' => '',
				'menu_name' => 'Series'
			),
			'public' => true,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'show_ui' => true, 
			'show_in_menu' => true, 
			'query_var' => false,
			'rewrite' => false,
			'capability_type' => 'post',
			'has_archive' => false, 
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		) );
		
		register_taxonomy( self::series_taxonomy, self::comic_post_type ,array(
			'hierarchical' => false,
			'label' => 'Series',
			'show_ui' => true,
			'query_var' => true, // TODO: false
			'rewrite' => array( 'slug' => 'series' ),
		) );
		
		// Tax-Post Type Sync
		// Set up sync for post_type and taxonomy
		x_register_sync( self::character_post_type, self::character_taxonomy );
		x_register_sync( self::series_post_type, self::series_taxonomy );
		
	}
	
	function parse_query( $query ) {
		global $wp_the_query;
		// Check if we're dealing with the main query
		if( $query === $wp_the_query ) {
			if( is_home() && ! is_paged() ) {
				// homepage main query should only pull one comic
				$query->set( 'posts_per_page', 1 );
				$query->set( 'post_type', self::comic_post_type );
			} elseif( is_tax( self::series_taxonomy ) ) {
				// series should be displayed reverse chronological
				$query->set( 'order', 'ASC' );
			}
		}
	}
    
	// get next comic
	
	// get previous comic
	
	// get all comics in series
	
	// get series
	
	// get characters
	
	// get comics with character
	
	// 
    
}