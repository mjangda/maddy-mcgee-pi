<div <?php post_class( 'mm-character' ) ?>>
	<?php // TODO: link to all comics ?>
	<div class="mm-image-character"><?php the_post_thumbnail( 'full' ); ?></div>
	<h3 class="mm-title mm-title-character"><?php the_title(); ?></h3>
	<div class="mm-content-character">
		<?php the_content(); ?>
	</div>
</div>