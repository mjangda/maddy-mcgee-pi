<?php
$character_term = get_queried_object();
$character_post = MaddyMcGee::get_character_post_from_term( $character_term );

if ( ! $character_post )
	return;

// Hack-a-hack hack because setup_postdata is stupid
$tmp_post = $post;
$post = $character_post;
setup_postdata( $character_post );
?>

<?php get_template_part( 'content', 'character' ) ?>

<?php
// Hack-a-hack hack because setup_postdata is stupid
$post = $tmp_post;
wp_reset_postdata();
?>

<?php get_template_part( 'loop', 'comic' ); ?>