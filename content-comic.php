<?php
$next_comic = ComicManager::get_next_comic();
$next_comic_url = ComicManager::get_comic_url( $next_comic );
?>

<a name="comic"></a>
<div id="mm-comic" <?php post_class(); ?>>
	<nav class="mm-nav-comic">
		<?php
		echo ComicManager::get_previous_comic_link( '&laquo;' );
		echo ComicManager::get_next_comic_link( '&raquo;' );
		?>
	</nav>
	
	<div class="mm-image-comic">
		<?php if ( $next_comic_url ) : ?>
		<a href="<?php echo esc_url( $next_comic_url ); ?>" title="<?php echo esc_attr( sprintf( __( 'View next comic: %s' ), $next_comic->post_title ) ); ?>">
		<?php endif; ?>
		<?php the_post_thumbnail( 'full', array( 'title' => '' ) ); ?>
		<?php if ( $next_comic_url ) : ?>
		</a>
		<?php endif; ?>
	</div>
	<div class="mm-content-comic">
		<?php the_content(); ?>
	</div>

	<?php get_template_part( 'meta', 'comic' ); ?>
<?php /*
	<div>
	<nav class="mm-comic-series-nav">
		<span class="mm-comic-series-nav-link previous"><!--<a href="#" rel="previous">Previous Case</a>--></span>
		<span class="mm-comic-series-nav-link next"><!--<a href="#" rel="next">Next Case</a>--></span>
	</nav>
	</div>

*/ ?>
	
	<div>
	<nav class="mm-nav-comic">
		<?php
		echo ComicManager::get_previous_comic_link( '&laquo;' );
		?><span class="mm-comic-series-nav-link first"><?php echo ComicManager::get_first_comic_link( 'Back to the beginning' ); ?></span><?php
		echo ComicManager::get_next_comic_link( '&raquo;' );
		?>
	</nav>
	</div>
</div>

<!-- Project Wonderful Ad Box Code -->
<div style="text-align:center;border-bottom: 1px dotted #C4C3D5;margin:5px auto;"><div style="display:inline-block;" id="pw_adbox_65747_6_0"></div></div>
<!-- End Project Wonderful Ad Box Code -->