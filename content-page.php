<?php while( have_posts() ) : the_post(); ?>
	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
	
	<?php get_template_part( 'content', 'page-' . $post->post_name ); ?>
<?php endwhile; ?>