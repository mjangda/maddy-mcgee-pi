<?php
$next_comic = ComicManager::get_next_comic();
$next_comic_url = ComicManager::get_comic_url( $next_comic );
?>

<a name="comic"></a>
<div id="mm-comic" <?php post_class(); ?>>
	<nav class="mm-nav-comic">
		<?php
		echo ComicManager::get_previous_comic_link( '&laquo;' );
		echo ComicManager::get_next_comic_link( '&raquo;' );
		?>
	</nav>
	
	<div class="mm-image-comic">
		<?php if ( $next_comic_url ) : ?>
		<a href="<?php echo esc_url( $next_comic_url ); ?>" title="<?php echo esc_attr( sprintf( __( 'View next comic: %s' ), $next_comic->post_title ) ); ?>">
		<?php endif; ?>
		<?php the_post_thumbnail( 'full', array( 'title' => '' ) ); ?>
		<?php if ( $next_comic_url ) : ?>
		</a>
		<?php endif; ?>
	</div>
	<div class="mm-content-comic">
		<?php the_content(); ?>
	</div>

	<?php get_template_part( 'meta', 'comic' ); ?>
<?php /*
	<div>
	<nav class="mm-comic-series-nav">
		<span class="mm-comic-series-nav-link previous"><!--<a href="#" rel="previous">Previous Case</a>--></span>
		<span class="mm-comic-series-nav-link next"><!--<a href="#" rel="next">Next Case</a>--></span>
	</nav>
	</div>

*/ ?>
	
	<div>
	<nav class="mm-nav-comic">
		<?php
		echo ComicManager::get_previous_comic_link( '&laquo;' );
		?><span class="mm-comic-series-nav-link first"><?php echo ComicManager::get_first_comic_link( 'Back to the beginning' ); ?></span><?php
		echo ComicManager::get_next_comic_link( '&raquo;' );
		?>
	</nav>
	</div>
</div>

<!-- Project Wonderful Ad Box Code -->
<div id="pw_adbox_66155_5_0"></div>
<script type="text/javascript"></script>
<noscript><map name="admap66155" id="admap66155"><area href="http://www.projectwonderful.com/out_nojs.php?r=0&c=0&id=66155&type=5" shape="rect" coords="0,0,728,90" title="" alt="" target="_blank" /></map>
<table cellpadding="0" cellspacing="0" style="width:728px;border-style:none;background-color:#504E64;"><tr><td><img src="http://www.projectwonderful.com/nojs.php?id=66155&type=5" style="width:728px;height:90px;border-style:none;" usemap="#admap66155" alt="" /></td></tr><tr><td style="background-color:#504E64;" colspan="1"><center><a style="font-size:10px;color:#C4C3D5;text-decoration:none;line-height:1.2;font-weight:bold;font-family:Tahoma, verdana,arial,helvetica,sans-serif;text-transform: none;letter-spacing:normal;text-shadow:none;white-space:normal;word-spacing:normal;" href="http://www.projectwonderful.com/advertisehere.php?id=66155&type=5" target="_blank">Ads by Project Wonderful!  Your ad here, right now: $0</a></center></td></tr></table>
</noscript>
<!-- End Project Wonderful Ad Box Code -->