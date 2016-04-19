<?php get_header(); ?>

<section>
	<div class="site-width">
		<h1>Search For: <?php echo get_search_query(); ?></h1>
		<div class="third">
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
	?>
	
		
			
				<div class="card">
					<div class="card-top">
						<a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" alt=""></a>
					</div>
					<div class="card-bottom">
						<div>
							<p class="card-meta"><?php echo get_the_category()[0]->name; ?></p>
							<p>
								<a href="<?php the_permalink(); ?>">
									<?php if (strlen($post->post_title) > 55) {
			                          echo substr(the_title($before = '', $after = '', FALSE), 0, 55) . '...'; }
			                            else {
			                          the_title();
			                            }
			                      	?>
								</a>
							</p>
						</div>
					</div>
				</div>
		
	<?php
		}
	} else {
		?>
		<p>archive.php returned nothing</p>
	<?php }
	?>
		</div>
	</div>
</section>


<?php get_footer(); ?>