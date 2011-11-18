<div <?php post_class( 'mm-comic-excerpt' ); ?>>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
		<?php the_post_thumbnail( 'comic-medium' ); ?>
	</a>
	<?php get_template_part( 'meta', 'comic' ); ?>
	<div class="mm-excerpt-comic">
		<?php the_excerpt(); ?>
	</div>
</div>