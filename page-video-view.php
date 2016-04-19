<?php if( current_user_can('administrator') ) : ?>
<?php edit_post_link(__('Edit This Page')); ?>
<?php endif; ?>

<?php 
/*
Template Name: Video View
*/

get_header(); ?>

<section style="background: #333; color: #fff;">
	<div class="site-width">
		<div class="half">
			<h1><?php the_title(); ?></h1>
			<p style="position: absolute; right: 0; bottom: 0;">Video Length - <?php the_field('video_length'); ?> min.</p>
		</div>
		<hr class="mar-b">
		<div class="video-outer">
			<div class="video-inner">
				<iframe src="<?php the_field('iframe_url'); ?>" frameborder="0" width="100%" height="100%"></iframe>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="site-width">
		<?php the_content(); ?>
	</div>
</section>

<?php get_footer(); ?>