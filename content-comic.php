<div id="mm-comic">
	<nav class="mm-comic-nav">
		<?php
		if( function_exists( 'be_previous_post_link' ) )
			be_previous_post_link( '%link', '&laquo;', true, '', ComicManager::series_taxonomy );
		else
			previous_post_link( '%link', '&laquo;' );
		
		if( function_exists( 'be_next_post_link' ) )
			be_next_post_link( '%link', '&raquo;', true, '', ComicManager::series_taxonomy );
		else
			next_post_link( '%link', '&raquo;' );
		?>
	</nav>
	
	<div class="mm-comic-image">
		<?php the_post_thumbnail( 'full' ); ?>
	</div>
	<div class="mm-comic-content">
		<?php the_content(); ?>
		Posted on <a href="<?php the_permalink(); ?>"><?php echo sprintf( '%1$s at %2$s', get_the_date(), get_the_time() ); ?></a>
		Series: <?php the_terms( 0, ComicManager::series_taxonomy ); ?>
		Featuring: <?php the_terms( 0, ComicManager::character_taxonomy ); ?>
	</div>
	
	next case
	
	first comic
	
	prev case
	
	click should go to next comic (need caching in next link function)
</div>