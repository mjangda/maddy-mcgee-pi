<?php $recent_posts = new WP_Query( array( 'post_type' => 'post', 'paged' => get_query_var( 'paged' ) ) ); ?>
<?php if ( $recent_posts->have_posts() ) : ?>
	
	<h2 class="mm-header-section"><?php _e( 'Updates' ); ?></h2>
	
	<?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
		<?php get_template_part( 'content', 'post-excerpt' ); ?>
	<?php endwhile; ?>
	
	<?php next_posts_link( '&laquo; Older Updates' ); ?>
	<?php previous_posts_link( 'Newer Updates &raquo;' ); ?>
	
<?php endif; ?>
<?php wp_reset_postdata(); ?>