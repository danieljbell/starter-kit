<?php get_header(); 


global $wp_query;
$modifications = array();
if( !empty( $_GET['catname'] ) ) {
	$modifications['category_name'] = $_GET['catname'];
}

$args = array_merge( 
	$wp_query->query_vars, 
	$modifications 
);

query_posts( $args );

?>


<section>
	<div class="site-width">
		<div class="half">
			<h1><?php single_cat_title(); ?></h1>			
		</div>
		<div class="third">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
		<div class="card">
			<div class="card-top">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" alt="<?php the_title(); ?>" ></a>
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
	<?php endwhile; ?>
	<?php endif; ?>

		</div>
		<?php wpbeginner_numeric_posts_nav(); ?>
		<style>
		@media screen and (min-width: 480px) and (max-width: 767px) {
			.third .card:last-of-type {
				display: none;
			}
		}
		</style>
		<?php if ( is_paged() ) : ?>
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
		<?php else : ?>
		<?php endif; ?>
	</div>
</section>


<?php get_footer(); ?>
