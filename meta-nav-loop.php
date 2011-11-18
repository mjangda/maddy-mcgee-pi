<?php
$newer_posts_label = apply_filters( 'mm_newer_posts_label', 'Newer <span rel="arrow">&raquo;</span>' );
$older_posts_label = apply_filters( 'mm_older_posts_label', '<span rel="arrow">&laquo;</span> Older' );
?>

<div class="mm-nav-loop">
	<span class="mm-nav-loop-newer">
		<?php previous_posts_link( $newer_posts_label ); ?>
	</span>
	<span class="mm-nav-loop-older">
		<?php next_posts_link( $older_posts_label ); ?>
	</span>
</div>