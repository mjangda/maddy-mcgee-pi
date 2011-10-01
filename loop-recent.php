<?php $recent_posts = new WP_Query( array( 'post_type' => 'post' ) ); ?>
<?php if ( $recent_posts->have_posts() ) : ?>
	
	<h2 class="mm-header-section"><?php _e( 'Updates' ); ?></h2>
	
	<?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
		<?php get_template_part( 'content', 'post-excerpt' ); ?>
	<?php endwhile; ?>
	
<?php endif; ?>
<?php wp_reset_postdata(); ?>