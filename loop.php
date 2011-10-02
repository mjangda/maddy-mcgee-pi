<?php if ( have_posts() ) : ?>
	
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', 'post-excerpt' ); ?>
	<?php endwhile; ?>
	
	<?php previous_posts_link(); ?>
	<?php next_posts_link(); ?>
	
<?php endif; ?>
<?php wp_reset_postdata(); ?>