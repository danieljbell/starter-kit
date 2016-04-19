<?php get_header(); ?>

<div class="site-width">
<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
?>

<ul>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
</ul>
	
<?php
	}
} else {
	?>
	<p>index.php returned nothing</p>
<?php }
?>

</div>


<?php get_footer(); ?>
