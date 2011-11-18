<?php
// Stolen from Twenty Ten
// Retrieves tag list of current post, separated by commas.
$tag_list = get_the_tag_list( '', ', ' );
if ( $tag_list ) {
	$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
	$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
} else {
	$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
}
?>
<div class="mm-meta mm-meta-post mm-meta-post-tags">
	<?php
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
	?>
</div>