<?php if( ( is_home() && ! is_paged() ) || is_singular( ComicManager::comic_post_type ) ) : ?>
	<?php if( have_posts() ) : ?>
		<?php the_post(); // we're only showing one comic ?>
		<?php get_template_part( 'content', 'comic' ); ?>
	<?php else : ?>
		Not found :(
	<?php endif; ?>
<?php endif; ?>