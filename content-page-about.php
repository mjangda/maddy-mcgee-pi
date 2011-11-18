<h2>Characters</h2>
<?php // TODO: Move to shortcode ?>

<p>While the three all have their own origins, Maddy, Dick and Nico all met during their years at New York University at some point. After graduating together Maddy suggested they should start a private investigation group and occasionally travel around the world, helping clients with cases involving missing persons and internet-based crimes.
What concept can be more bizarre than that? Well, there's the fact that Maddy's friends agreed to join her without question.</p>

<div class="mm-characters">
	<?php $characters_query = ComicManager::get_all_characters_query(); ?>
	
	<?php while( $characters_query->have_posts() ) : $characters_query->the_post(); ?>
		<?php get_template_part( 'content', 'character' ); ?>
	<?php endwhile; ?>
	
	<?php wp_reset_postdata(); ?>
</div>