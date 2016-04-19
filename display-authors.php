<?php
/*
Template Name: Display Authors
*/

// Get all users order by amount of posts
$allUsers = get_users('order=ASC');

$users = array();

// Remove subscribers from the list as they won't write any articles
foreach($allUsers as $currentUser)
{
	if(!in_array( 'subscriber', $currentUser->roles ))
	{
		$users[] = $currentUser;
	}
}



?>

<?php get_header(); ?>

<section>
	<div class="site-width">
		<div class="fourth">
			<?php foreach($users as $user) { ?>
				<figure class="card">
					<div class="card-top">
						<a href="<?php echo get_author_posts_url( $user->ID ); ?>">
							<img src="<?php echo get_cupp_meta($user->ID); ?>" alt="<?php echo $user->display_name; ?>">
						</a>
					</div>
					<div class="card-bottom">
						<div>
							<p class="card-meta"><?php echo $user->job_title; ?></p>
							<p><a href="<?php echo get_author_posts_url( $user->ID ); ?>"><?php echo $user->display_name; ?></a></p>
						</div>
					</div>
				</figure>
			<?php	} ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>