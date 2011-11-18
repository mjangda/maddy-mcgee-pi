<?php while( have_posts() ) : the_post(); ?>

	<h2 class="mm-title mm-title-post"><?php the_title(); ?></h2>
	<?php get_template_part( 'meta', 'post' ); ?>
	
	<div class="mm-content-post">
		<?php the_content(); ?>
	</div>
	
	<?php get_template_part( 'meta', 'post-tags' ); ?>
	
	<?php comments_template( '', true ); ?>

<?php endwhile; ?>