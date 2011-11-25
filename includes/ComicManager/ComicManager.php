<?php

require( dirname( __FILE__ ) . '/includes/taxonomy-to-post_type-sync/taxonomy-to-post_type-sync.php' );
// TODO: plugin needs caching
require_once( dirname( __FILE__ ) . '/includes/previous-and-next-post-in-same-taxonomy.php' );

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
		add_image_size( 'comic-medium', 500, 1000 );
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
			'hierarchical' => true,
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
			'hierarchical' => true,
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
	function get_next_comic() {
		if( function_exists( 'be_get_adjacent_post' ) )
			return be_get_adjacent_post( true, '', false, self::series_taxonomy );
		else
			return get_adjacent_post( false, '', false );
	}
	
	// get previous comic
	function get_previous_comic() {
		if( function_exists( 'be_get_adjacent_post' ) )
			return be_get_adjacent_post( true, '', true, self::series_taxonomy );
		else
			return get_adjacent_post( false, '', true );
	}
	
	function get_first_comic() {
		if( function_exists( 'be_get_boundary_post' ) )
			return be_get_boundary_post( true, '', true, self::series_taxonomy );
		else
			return get_boundary_post( true, '', true );
	}
	
	function get_last_comic() {
		if( function_exists( 'be_get_boundary_post' ) )
			return be_get_boundary_post( true, '', false, self::series_taxonomy );
		else
			return get_boundary_post( true, '', false );
	}
	
	function get_next_comic_link( $text = 'Next', $attributes = array() ) {
		$comic = self::get_next_comic();
		$attributes['rel'] = 'next';
		return self::get_comic_link( $comic, $text, $attributes );
	}
	function get_previous_comic_link( $text = 'Previous', $attributes = array() ) {
		$comic = self::get_previous_comic();
		$attributes['rel'] = 'previous';
		return self::get_comic_link( $comic, $text, $attributes );
	}
	function get_first_comic_link( $text = 'First', $attributes = array() ) {
		$comic = self::get_first_comic();
		$attributes['rel'] = 'first';
		return self::get_comic_link( $comic, $text, $attributes );
	}
	function get_last_comic_link( $text = 'Latest', $attributes = array() ) {
		$comic = self::get_last_comic();
		$attributes['rel'] = 'last';
		return self::get_comic_link( $comic, $text, $attributes );
	}
	
	function get_comic_link( $comic, $text, $attributes ) {
		$link = '';
		if( $comic && isset( $comic->ID ) ) {
			$attribute_string = '';
			foreach( (array) $attributes as $attribute_name => $attribute_value ) {
				$attribute_string .= sprintf( '%s="%s"', sanitize_key( $attribute_name ), esc_attr( $attribute_value ) );
			}
			$url = self::get_comic_url( $comic->ID );
			$link = sprintf( '<a href="%s" %s>%s</a>', $url, $attribute_string, $text );
		}
		return $link;
	}

	function get_comic_url( $comic_id ) {
		if ( ! $comic_id )
			return false;
		return apply_filters( 'comic_link_permalink', get_permalink( $comic_id ) );
	}

	// get series
	function get_all_series() {
		return self::get_objects( self::series_post_type );
	}
	
	// get characters
	function get_all_characters() {
		return self::get_all_objects( self::character_post_type );
	}
	function get_all_characters_query() {
		return self::get_all_objects_query( self::character_post_type );
	}
	
	function get_all_objects_query( $object_type ) {
		$cache_key = 'comicmanager-objects-' . $object_type . '-query';
		$objects_query = wp_cache_get( $cache_key );
		
		if( $objects_query === false ) {
			$objects_query = new WP_Query( array(
				'posts_per_page' => -1,
				'post_type' => $object_type,
			) );
			wp_cache_set( $cache_key, $objects_query );
		}
		return $objects_query;
	}
	
	function get_all_objects( $object_type ) {
		$query = self::get_all_objects_query( $object_type );
		if( is_a( $query, 'WP_Query' ) )
			return $query->posts;
		return array();
	}

	function get_character_post_from_term( $term ) {
		return ComicManager::get_synced_post_from_term( $term, ComicManager::character_taxonomy );
	}

	function get_series_post_from_term( $term ) {
		return ComicManager::get_synced_post_from_term( $term, ComicManager::series_taxonomy );
	}

	function get_synced_post_from_term( $term, $taxonomy ) {
		if ( function_exists( 'x_get_synced_post' ) ) {
			$post = x_get_synced_post( $term, $taxonomy );
			wp_reset_postdata();
			return $post;
		}
		return false;
	}
	
}