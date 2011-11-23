<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php bloginfo('name'); ?> &raquo; <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://use.typekit.com/gvh2skr.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <![endif]-->
    <?php
    // Support for threaded comments
    if ( is_singular() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );

    wp_head();
    ?>
</head>

<body <?php body_class(); ?>>
    <div id="mm-page">
	<header id="mm-header">
	    <section class="mm-ad mm-ad-header">
	    </section>
	    <hgroup id="mm-logo">
		<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<h2><a href="<?php echo home_url(); ?>"><?php bloginfo( 'description' ); ?></a></h2>
	    </hgroup>
	    <nav class="mm-menu mm-menu-header">
		<ul>
		<?php foreach( MaddyMcGee::get_header_menu_items() as $menu_item_key => $menu_item ) : ?>
		    <li class="mm-menu-item mm-menu-header-item mm-menu-header-item-<?php echo $menu_item_key; ?>">
			<a href="<?php echo home_url( $menu_item_key != 'home' ? $menu_item_key : '' ); ?>" class="<?php echo is_page( $menu_item_key ) ? 'mm-active' : ''; ?>">
			    <?php echo $menu_item['text'];?>
			    <?php if( isset( $menu_item['subtext'] ) ) : ?>
				<span><?php echo $menu_item['subtext']; ?></span>
			    <?php endif; ?>
			</a>
		    </li>
		<?php endforeach; ?>
		</ul>
	    </nav>
	</header>
