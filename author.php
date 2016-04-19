<?php get_header(); ?>
<section>
	<div class="site-width">
		<div class="two-third-stack">
			<aside class="author-sidebar">
				<div class="author-sidebar-container">
					<div class="author-sidebar-container-meta">
						<img src="<?php echo get_cupp_meta($user->ID); ?>" alt="<?php echo $user->display_name; ?>" class="author-headshot">
						<h3><?php echo get_the_author(); ?></h3>
						<p class="job-title"><?php echo get_the_author_meta('job_title'); ?></p>
						<p>Articles written: <?php the_author_posts(); ?></p>
						<div class="post-sharing">
							<a href="http://twitter.com/<?php echo the_author_meta('twitter'); ?>"><img src="http://gettinderbox.com/wp-content/uploads/2016/03/twitter.png" alt=""></a>
							<a href="http://linkedin.com/<?php echo the_author_meta('linkedin'); ?>"><img src="http://gettinderbox.com/wp-content/uploads/2016/03/linkedin.png" alt=""></a>
							<a href="mailto:<?php echo get_the_author_meta('user_email', $user->ID); ?>"><img src="http://gettinderbox.com/wp-content/uploads/2016/03/email.png" alt=""></a>
						</div>
					</div>
					<div class="author-sidebar-container-description">
						<p><?php echo the_author_meta('user_description'); ?></p>
					</div>
				</div>
			</aside>
			<div>
				<div class="half">
				<?php 
				// $args = array(
				// 	'posts_per_page' => -1,
				// 	'post_author'    => 27
				// );

				// $new_query = new WP_Query( $args );


				if (have_posts()) : while (have_posts()) : the_post(); ?>	
					<article class="card">
						<div class="card-top">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
						<div class="card-bottom">
							<div>
								<p class="card-meta">
								<?php 
									$categories = get_the_category();
									if ( ! empty( $categories ) ) {
									    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
									}
								?>
								</p>
								<p>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php if (strlen($post->post_title) > 75) {
			                echo substr(the_title($before = '', $after = '', FALSE), 0, 75) . '...'; }
			                  else {
					                the_title();
			                  }
			            	?>
									</a>
								</p>
							</div>
						</div>
					</article>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
				<?php wpbeginner_numeric_posts_nav(); ?>
				<?php // if ( is_paged() ) : ?>
					<style>
					.navigation li:first-child,
					.navigation li:last-of-type {
					    display: block;
					    margin-top: 0; 
					}

					.navigation li:first-child a,
					.navigation li:last-of-type a {
					    width: 100%;
					    text-align: center;
					}

					.navigation li {
					    margin-bottom: 1rem;
					}
					@media screen and (min-width: 480px) {
				    .navigation li:first-child,
				    .navigation li:last-of-type {
				        display: inline-block;
				    }
				    .navigation li {
				        margin-bottom: 0;
				    }
					}
					</style>
					<?php // else : ?>
					<?php // endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>