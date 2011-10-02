<?php get_header(); ?>

<?php get_template_part( 'loop', 'comic-feature' ); ?>

<div id="mm-content">
	<div id="mm-entries">
		<?php if( is_home() ) : ?>
			<?php get_template_part( 'loop', 'recent' ); ?>
		<?php elseif( is_tax( ComicManager::character_taxonomy ) ) : ?>
			<?php get_template_part( 'content', 'character' ); ?>
			<?php get_template_part( 'loop', 'comic' ); ?>
		<?php elseif( is_tax( ComicManager::series_taxonomy ) ) : ?>
			<?php get_template_part( 'content', 'series' ); ?>
			<?php get_template_part( 'loop', 'comic' ); ?>
		<?php elseif( is_single() ) : ?>
			<?php get_template_part( 'content', 'post' ); ?>
		<?php else : ?>
			<?php get_template_part( 'loop' ); ?>
		<?php endif; ?>
	</div>
	
	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>

<?php
/*

* Post styling
* Post meta
* Single Post
* Single Page
* Archives
* Archive Loops
* Back to Beginning
* Next / Prev Case
* Character Info
* Character List
* Series Info
* Series List

*/
?>