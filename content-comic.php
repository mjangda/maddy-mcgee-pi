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
	
	<nav class="mm-comic-series-nav">
		<span class="mm-comic-series-nav-link previous"><!--<a href="#" rel="previous">Previous Case</a>--></span>
		<span class="mm-comic-series-nav-link first"><?php echo ComicManager::get_first_comic_link( 'Back to the beginning' ); ?></span>
		<span class="mm-comic-series-nav-link next"><!--<a href="#" rel="next">Next Case</a>--></span>
	</nav>
	
	<div>
	<nav class="mm-nav-comic">
		<?php
		echo ComicManager::get_previous_comic_link( '&laquo;' );
		echo ComicManager::get_next_comic_link( '&raquo;' );
		?>
	</nav>
	</div>
</div>