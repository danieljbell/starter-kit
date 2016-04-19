<?php 
/*
Template Name: Video Listing
*/

get_header();

$postid = get_the_ID();

$query = new WP_Query( array( 
	'post_type' => 'page',
	'post_parent' => $postid 
) );
?>


<div class="site-width">
	<section>
		<h1><?php the_title(); ?></h1>
		<div class="third">
		<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>	
		<figure class="card video-thumb">
			<div class="card-top">
				<a href="<?php the_permalink(); ?>">
					<?php echo get_the_post_thumbnail( $post_id, '' ); ?>
				</a>
			</div>
			<div class="card-bottom">
				<div>
					<p class="card-meta">Category</p>
					<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
				</div>
			</div>
		</figure>
		<?php endwhile; ?>
		<?php endif; ?>
		</div>
	</section>
</div>

<?php get_footer(); ?>