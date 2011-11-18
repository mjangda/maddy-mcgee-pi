<?php if ( have_posts() ) : ?>
	
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', 'post-excerpt' ); ?>
	<?php endwhile; ?>
	
	<?php get_template_part( 'meta', 'nav-loop' ); ?>
	
<?php endif; ?>
<?php wp_reset_postdata(); ?>