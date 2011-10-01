<div id="mm-comic">
	prev comic
	next comic
	
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
	
	click should go to next comic
</div>