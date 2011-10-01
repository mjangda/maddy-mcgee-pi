<?php get_header(); ?>

<?php get_template_part( 'loop', 'comic-feature' ); ?>

<div id="mm-content">
	<div id="mm-entries">
	
		<?php if( is_home() ) : ?>
			<?php get_template_part( 'loop', 'recent' ); ?>
		<?php endif; ?>
		
	</div>
	
	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>