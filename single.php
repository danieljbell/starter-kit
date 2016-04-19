<?php if( current_user_can('administrator') ) : ?>
<?php edit_post_link(__('Edit This Post')); ?>
<?php endif; ?>

<?php get_header(); ?>

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		//
?>



<section>
	<div class="post-hero animated">
		<div class="post-blur-outer" style="background-image: url(
			<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		);"></div>
		<div class="site-width">
			<div class="two-third-md post-title">
				<h1><?php the_title(); ?></h1>
				<div class="post-sidebar">
					<p class="post-author">
						<?php echo get_avatar( $post->post_author, 65 ); ?>
						<?php echo get_the_author(); ?><span><?php echo get_the_date(); ?></span>
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="site-width">
		<div class="post-content">
			<div class="two-third-md">
				<div class="post-main">
					<?php echo get_the_post_thumbnail( $post_id, '', array( 'id' => 'post-thumbnail', 'class' => 'post-thumbnail' ) ); ?>
					<?php the_content(); ?>
					<div class="post-sharing">
						<h4>Share this Article:</h4>
						<a href="http://twitter.com/intent/tweet?url=<?php echo the_permalink(); ?>&text=<?php echo the_title(); ?>" target="_blank"><img src="http://gettinderbox.com/wp-content/uploads/2016/03/twitter.png" alt=""></a>
						<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_permalink(); ?>" target="_blank"><img src="http://gettinderbox.com/wp-content/uploads/2016/03/linkedin.png" alt=""></a>
						<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><img src="http://gettinderbox.com/wp-content/uploads/2016/03/Facebook.png" alt=""></a>
					</div>
					<div class="post-meta">
						<?php echo get_avatar( $post->post_author, 85 ); ?>
						<p>
							<a href="<?php echo get_author_posts_url($post->post_author); ?>">
								<strong><?php echo get_the_author(); ?></strong>
							</a>
							<em><?php echo the_author_meta('user_description'); ?></em>
							<?php if ( the_author_meta('twitter') === '') : ?>
							cool
							<?php else : ?>
							<br>
							Follow on: <a href="http://twitter.com/<?php echo the_author_meta('twitter'); ?>">@<?php echo the_author_meta('twitter'); ?></a>
							<?php endif; ?>
						</p>
					</div>
				</div>
				<aside class="post-sidebar"><?php get_sidebar(); ?></aside>
			</div>
		</div>
		<hr class="hide-md">
	</div>
</section>

<div class="not-slim">
	<div class="post-hero animated">
		<div class="post-blur-outer" style="background-image: url(
			<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		);"></div>
		<div class="site-width">
			<div class="two-third-md post-title">
				<h1><?php the_title(); ?></h1>
				<div class="post-sidebar">
					<p class="post-author">
						<?php echo get_avatar( $post->post_author, 65 ); ?>
						<?php echo get_the_author(); ?><span><?php echo get_the_date(); ?></span>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<section style="background-image: url(http://gettinderbox.com/wp-content/uploads/2016/02/pattern-bg.png); background-size: cover;">
	<div class="site-width related-articles">
		<h3 class="centered">You may also like...</h3>
		<?php $args = array(
			'posts_per_page' => 3,
			'post__not_in' => array($post->ID)
		); ?>
		<?php $my_query = new WP_Query( $args ); 
					if ( $my_query->have_posts()) :
		?>
			<div class="third">
		<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
				<article class="card">
					<div class="card-top">
						<a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" alt=""></a>
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
								<a href="<?php the_permalink(); ?>">
									<?php if (strlen($post->post_title) > 65) {
	                  echo substr(the_title($before = '', $after = '', FALSE), 0, 65) . '...'; }
	                    else {
	                  the_title();
	                    }
                  ?>
								</a>
							</p>
						</div>
					</div>
					</a>
				</article>
		<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</section>



<?php
	}
}
?>
<script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>
<?php get_footer(); ?>