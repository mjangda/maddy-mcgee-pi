<div <?php post_class( 'mm-post-excerpt' ); ?>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php get_template_part( 'meta', 'post' ); ?>
	<div class="mm-excerpt-post">
		<?php the_excerpt(); ?>
	</div>
</div>