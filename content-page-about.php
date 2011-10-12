<h2>Characters</h2>
<?php // TODO: Move to shortcode ?>

<p>While the three all have their own origins, Maddy, Dick and Nico all met during their years at New York University at some point. After graduating together Maddy suggested they should start a private investigation group and occasionally travel around the world, helping clients with cases involving missing persons and internet-based crimes.
What concept can be more bizarre than that? Well, there's the fact that Maddy's friends agreed to join her without question.</p>

<div class="mm-characters">
	<?php $characters_query = MaddyMcGee::i()->get_characters_query(); ?>
	
	<?php while( $characters_query->have_posts() ) : $characters_query->the_post(); ?>
		<div class="mm-character-single">
			<?php // TODO: link to all comics ?>
			<div class="mm-character-image"><?php the_post_thumbnail( 'full' ); ?></div>
			<h3 class="mm-character-title"><?php the_title(); ?></h3>
			<div class="mm-character-content">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; ?>
	
	<?php wp_reset_postdata(); ?>
</div>