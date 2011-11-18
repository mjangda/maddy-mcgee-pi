<?php while( have_posts() ) : the_post(); ?>
	<div <?php post_class( 'mm-post' ) ?>>
		<h2 class="mm-title mm-title-post"><?php the_title(); ?></h2>
		
		<div class="mm-content-post">
			<?php the_content(); ?>
		</div>
		
		<?php get_template_part( 'meta', 'post' ); ?>
	</div>
	
	<div class="mm-comments">
		<?php comments_template( '', true ); ?>
	</div>

<?php endwhile; ?>