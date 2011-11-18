<div class="mm-meta-comic">
	<span class="mm-meta-comic-info mm-meta-comic-date">
		Posted:
		<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php esc_attr( get_the_time() ); ?>" rel="bookmark"><time class="mm-date-comic" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" pubdate><?php echo esc_html( get_the_date() ); ?></time></a>
	</span>
	<span class="mm-meta-comic-info mm-meta-comic-series">
		Series: <?php the_terms( 0, ComicManager::series_taxonomy ); ?>
	</span>
	<span class="mm-meta-comic-info mm-meta-comic-characters">
		Featuring: <?php the_terms( 0, ComicManager::character_taxonomy ); ?>
	</span>
</div>