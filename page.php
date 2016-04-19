<?php get_header(); ?>

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		//
?>

<div class="site-width">
	<h1><?php the_title(); ?></h1>
</div>




<?php
	}
}
?>

<?php get_footer(); ?>