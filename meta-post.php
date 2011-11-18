<div class="mm-meta mm-meta-post">
	<span class="mm-meta-post-info mm-meta-post-datetime">Posted </span>
	<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php esc_attr( get_the_time() ); ?>" rel="bookmark"><time class="mm-date-post" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" pubdate><?php echo esc_html( get_the_date() ); ?></time></a>
	
	<span class="mm-meta-post-info mm-meta-post-author"> by 
		<span class="author vcard">
			<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo sprintf( esc_attr__( 'View all posts by %s', 'twentyeleven' ), get_the_author() ); ?>" rel="author">
				<?php echo esc_html( get_the_author() ); ?>
			</a>
		</span>
	</span>
</div>