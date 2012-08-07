<?php get_header(); ?>
<?php get_template_part( 'loop', 'comic-feature' ); ?>

<div id="mm-content">
  <div id="mm-entries">
		<div class="mm-comments">
      <?php comments_template( '', true ); ?>
	  </div>
	</div>
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>