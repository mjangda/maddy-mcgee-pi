<?php while( have_posts() ) : the_post(); ?>
	<div <?php post_class( 'mm-page' ); ?>>
		<h2><?php the_title(); ?></h2>
		<div class="mm-content-post">
			<?php the_content(); ?>
		</div>
	
		<?php get_template_part( 'content', 'page-' . $post->post_name ); ?>
	</div>
<?php endwhile; ?>