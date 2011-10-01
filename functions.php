<?php

require_once( dirname( __FILE__ ) . '/includes/ComicManager.php' );
require_once( dirname( __FILE__ ) . '/includes/previous-and-next-post-in-same-taxonomy.php' );

class MaddyMcGee {

	var $comic_manager;

	function __construct() {
		$this->comic_manager = new ComicManager;
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		
		add_action( 'after_setup_theme', array( $this, 'after_setup_theme' ) );
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
		
		add_action( 'wp_head', array( $this, 'wp_head' ) );
		add_action( 'wp_footer', array( $this, 'wp_footer' ) );
		
	}

	function init() {
		
	}
	
	function admin_init() {
	}
    
	function get_header_menu_items() {
		return $menu = array(
			'home' => array(
			    'text' => 'Home',
			),
			'about' => array(
			    'text' => 'Dossiers',
			    'subtext' => '(About)',
			),
			'archives' => array(
			    'text' => 'Case Files',
			    'subtext' => '(Archives)',
			),
			'links' => array(
			    'text' => 'References',
			    'subtext' => '(Links)',
			),
			'etc' => array(
			    'text' => 'Evidence',
			    'subtext' => '(Etc.)',
			),
			'contact' => array(
			    'text' => 'Contact',
			    'subtext' => '(Email)',
			),
		);
	}
	
	function after_setup_theme() {
		// Thumbnails rule!
		add_theme_support( 'post-thumbnails' );
		
		// Add default posts and comments RSS feed links to <head>.
		add_theme_support( 'automatic-feed-links' );
		
		// Add support for custom backgrounds
		add_custom_background();
		
		register_sidebar( array(
			'name' => __( 'Main Sidebar', 'twentyeleven' ),
			'id' => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
	}
	
	function wp_head() {
	}
	
	function wp_footer() {
	}
	
	function widgets_init() {
	}
	
	/*
	function get_quote_character( $post_id = 0 ) {
		$post_id = self::get_post_id( $post_id );
		return self::get_synced_post( $post_id, self::character_taxonomy );
	}
	
	function get_quote_episode( $post_id = 0 ) {
		$post_id = self::get_post_id( $post_id );
		return self::get_synced_post( $post_id, self::episode_taxonomy );
	}
	
	function get_synced_post( $post_id, $taxonomy ) {
		$terms = wp_get_object_terms( $post_id, $taxonomy, array( 'fields' => 'ids' ) );
		
		if( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			$post = x_get_synced_post( (int)$terms[0], $taxonomy );
			wp_reset_postdata();
			return $post;
		}
		return false;
	}
	*/
}

function mmg() {
	
}

$mmg = new MaddyMcGee;
