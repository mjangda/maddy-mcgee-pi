<?php get_header(); ?>

<?php get_template_part( 'loop', 'comic-feature' ); ?>

<div id="mm-content">
	<div id="mm-entries">
		<?php // Yes, this is crazy! Wanna fight about it? ?>
		<?php if( is_home() ) : ?>
			<?php get_template_part( 'loop', 'recent' ); ?>
		<?php elseif( is_tax( ComicManager::character_taxonomy ) ) : ?>
			<?php get_template_part( 'archive', 'character' ); ?>
		<?php elseif( is_tax( ComicManager::series_taxonomy ) ) : ?>
			<?php get_template_part( 'archive', 'series' ); ?>
		<?php elseif( is_single() ) : ?>
			<?php get_template_part( 'content', 'post' ); ?>
		<?php elseif( is_page() ) : ?>
			<?php get_template_part( 'content', 'page' ); ?>
		<?php elseif( is_404() ) : ?>
			<?php get_template_part( 'content', '404' ); ?>
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
* Post meta styling
* Single Post
* Single Page
* Archives (Series, Character, and Posts)
* Archive Loops (Series, Character, and Posts)
* Character Info
* Character List
* Series Info
* Series List

* Prev-Next plugin caching

* Next / Prev Case

*/
?>