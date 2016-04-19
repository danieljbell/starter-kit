<?php 
/*
Template Name: Video View
*/



get_header(); ?>

<section>
	<div class="site-width">
		<div class="half">
			<h1><?php the_title(); ?></h1>
			<p class="text-right">Video Length - <?php the_field('video_length'); ?> min.</p>
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
		<div class="two-third-md">
			<div><?php the_content(); ?></div>	
			<div><?php get_sidebar('video'); ?></div>
		</div>
	</div>
</section>
<div class="post-hero">
<div class="post-blur-outer" style="background-image: url(
			<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		);"></div></div>

<?php get_footer(); ?>