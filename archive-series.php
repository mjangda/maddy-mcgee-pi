<?php
$series_term = get_queried_object();
$series_post = MaddyMcGee::get_series_post_from_term( $series_term );

if ( ! $series_post )
	return;
// Hack-a-hack hack because setup_postdata is stupid
$tmp_post = $post;
$post = $series_post;
setup_postdata( $series_post );
?>

<?php get_template_part( 'content', 'series' ); ?>

<?php
// Hack-a-hack hack because setup_postdata is stupid
$post = $tmp_post;
wp_reset_postdata();
?>

<?php get_template_part( 'loop', 'comic' ); ?>