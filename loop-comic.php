<?php if( have_posts() ) : ?>
	<?php while( have_posts() ) : the_post(); ?>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
			<?php the_post_thumbnail( 'comic-medium' ); ?>
		</a>
		<?php the_excerpt(); ?>
	<?php endwhile; ?>
<?php endif; ?>