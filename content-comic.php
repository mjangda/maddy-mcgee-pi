<a name="comic"></a>
<div id="mm-comic">
	<nav class="mm-comic-nav">
		<?php
		echo ComicManager::get_previous_comic_link( '&laquo;' );
		echo ComicManager::get_next_comic_link( '&raquo;' );
		
		?>
	</nav>
	
	<div class="mm-comic-image">
		<?php the_post_thumbnail( 'full' ); ?>
	</div>
	<div class="mm-comic-content">
		<?php the_content(); ?>
	</div>
	<div class="mm-comic-meta">
		<span class="mm-comic-meta-info mm-comic-meta-date">
			Posted: <a href="<?php the_permalink(); ?>"><?php echo sprintf( '%1$s at %2$s', get_the_date(), get_the_time() ); ?></a>
		</span>
		<span class="mm-comic-meta-info mm-comic-meta-series">
			Series: <?php the_terms( 0, ComicManager::series_taxonomy ); ?>
		</span>
		<span class="mm-comic-meta-info mm-comic-meta-characters">
			Featuring: <?php the_terms( 0, ComicManager::character_taxonomy ); ?>
		</span>
	</div>
	
	<div class="mm-comic-series-nav">
		<a href="#" rel="previous">Previous Case</a>
		<a href="#" rel="first">Back to the beginning</a>
		<a href="#" rel="next">Next Case</a>
	</div>
	<?php
	// click should go to next comic (need caching in next link function)
	?>
</div>