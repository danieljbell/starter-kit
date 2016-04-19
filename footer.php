</div>

<section id="site-footer" style="height: 1000px;">
	<div class="site-width">
		<div class="half">
			<div><a href="<?php echo site_url(); ?>">logo</a></div>
			<div class="text-right">
				<p>&copy; <?php echo current_time('Y'); ?> TinderBox. All rights reserved.</p>
				<?php if( current_user_can('administrator') ) : ?>
				<p><a href="<?php echo site_url(); ?>/wp-admin">Admin</a></p>
				<?php else : ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php wp_footer(); ?>


<script src="<?php echo get_template_directory_uri(); ?>/js/dist/app.js"></script>

<?php if ( is_single() ) : ?>
	<script src="<?php echo get_template_directory_uri(); ?>/js/dist/single.js"></script>
<?php endif; ?>

</body>
</html>
