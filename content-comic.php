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
	
	<nav class="mm-comic-series-nav">
		<span class="mm-comic-series-nav-link prev">&nbsp;<!--<a href="#" rel="previous">Previous Case</a>--></span>
		<span class="mm-comic-series-nav-link first"><?php echo ComicManager::get_first_comic_link( 'Back to the beginning' ); ?></span>
		<span class="mm-comic-series-nav-link next">&nbsp;<!--<a href="#" rel="next">Next Case</a>--></span>
	</nav>
	<?php
	// TODO: click should go to next comic (need caching in next link function)
	?>
</div>