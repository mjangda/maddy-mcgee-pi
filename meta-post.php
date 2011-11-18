<div class="mm-meta mm-meta-post">
	<span class="mm-meta-post-info mm-meta-post-datetime">Posted
		<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php esc_attr( get_the_time() ); ?>" rel="bookmark"><time class="mm-date-post" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" pubdate><?php echo esc_html( get_the_date() ); ?></time></a>
	</span>
	
	<span class="mm-meta-post-info mm-meta-post-author"> by 
		<span class="author vcard">
			<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo sprintf( esc_attr__( 'View all posts by %s', 'twentyeleven' ), get_the_author() ); ?>" rel="author"><?php echo esc_html( get_the_author() ); ?></a>
		</span>
	</span>
	
	<?php
	if ( is_single() ) :
		// Stolen from Twenty Ten
		// Retrieves tag list of current post, separated by commas.
		$tag_list = get_the_tag_list( '', ', ' );
		if ( $tag_list ) {
			$posted_in = __( 'in %1$s and tagged %2$s' );
		} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
			$posted_in = __( 'in %1$s' );
		} else {
			$posted_in = '';
		}
		?>
		<span class="mm-meta-post-info mm-meta-post-author">
		<?php
		printf(
			$posted_in,
			get_the_category_list( ', ' ),
			$tag_list
		);
	endif;
	?>
	</span>
</div>