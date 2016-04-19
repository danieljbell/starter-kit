<?php

/*
==========================================
ADDS POST THUMBNAILS
==========================================
*/
add_theme_support( 'post-thumbnails' );


/*
==========================================
CREATING ADMIN NAV MENUS
==========================================
*/
register_nav_menus( array(
		'products' => __( 'Products' ),
		'partners' => __( 'Partners' ),
		'resources' => __( 'Resources' ),
		'company' => __( 'Company' )
) );


/*
==========================================
REMOVE EXTRA <p> TAGS FROM CONTENT
==========================================
*/
// remove_filter ('the_content', 'wpautop');


/*
==========================================
MINIFIES HTML
==========================================
*/

// class WP_HTML_Compression
// {
// 	// Settings
// 	protected $compress_css = true;
// 	protected $compress_js = true;
// 	protected $info_comment = true;
// 	protected $remove_comments = true;

// 	// Variables
// 	protected $html;
// 	public function __construct($html)
// 	{
// 		if (!empty($html))
// 		{
// 			$this->parseHTML($html);
// 		}
// 	}
// 	public function __toString()
// 	{
// 		return $this->html;
// 	}
// 	protected function bottomComment($raw, $compressed)
// 	{
// 		$raw = strlen($raw);
// 		$compressed = strlen($compressed);

// 		$savings = ($raw-$compressed) / $raw * 100;

// 		$savings = round($savings, 2);

// 		return '<!--HTML compressed, size saved '.$savings.'%. From '.$raw.' bytes, now '.$compressed.' bytes-->';
// 	}
// 	protected function minifyHTML($html)
// 	{
// 		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
// 		preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
// 		$overriding = false;
// 		$raw_tag = false;
// 		// Variable reused for output
// 		$html = '';
// 		foreach ($matches as $token)
// 		{
// 			$tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;

// 			$content = $token[0];

// 			if (is_null($tag))
// 			{
// 				if ( !empty($token['script']) )
// 				{
// 					$strip = $this->compress_js;
// 				}
// 				else if ( !empty($token['style']) )
// 				{
// 					$strip = $this->compress_css;
// 				}
// 				else if ($content == '<!--wp-html-compression no compression-->')
// 				{
// 					$overriding = !$overriding;

// 					// Don't print the comment
// 					continue;
// 				}
// 				else if ($this->remove_comments)
// 				{
// 					if (!$overriding && $raw_tag != 'textarea')
// 					{
// 						// Remove any HTML comments, except MSIE conditional comments
// 						$content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
// 					}
// 				}
// 			}
// 			else
// 			{
// 				if ($tag == 'pre' || $tag == 'textarea')
// 				{
// 					$raw_tag = $tag;
// 				}
// 				else if ($tag == '/pre' || $tag == '/textarea')
// 				{
// 					$raw_tag = false;
// 				}
// 				else
// 				{
// 					if ($raw_tag || $overriding)
// 					{
// 						$strip = false;
// 					}
// 					else
// 					{
// 						$strip = true;

// 						// Remove any empty attributes, except:
// 						// action, alt, content, src
// 						$content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);

// 						// Remove any space before the end of self-closing XHTML tags
// 						// JavaScript excluded
// 						$content = str_replace(' />', '/>', $content);
// 					}
// 				}
// 			}

// 			if ($strip)
// 			{
// 				$content = $this->removeWhiteSpace($content);
// 			}

// 			$html .= $content;
// 		}

// 		return $html;
// 	}

// 	public function parseHTML($html)
// 	{
// 		$this->html = $this->minifyHTML($html);

// 		if ($this->info_comment)
// 		{
// 			$this->html .= "\n" . $this->bottomComment($html, $this->html);
// 		}
// 	}

// 	protected function removeWhiteSpace($str)
// 	{
// 		$str = str_replace("\t", ' ', $str);
// 		$str = str_replace("\n",  '', $str);
// 		$str = str_replace("\r",  '', $str);

// 		while (stristr($str, '  '))
// 		{
// 			$str = str_replace('  ', ' ', $str);
// 		}

// 		return $str;
// 	}
// }

// function wp_html_compression_finish($html)
// {
// 	return new WP_HTML_Compression($html);
// }

// function wp_html_compression_start()
// {
// 	ob_start('wp_html_compression_finish');
// }
// add_action('get_header', 'wp_html_compression_start');


/*
==========================================
HIDE ADMIN BAR
==========================================
*/
add_filter('show_admin_bar', '__return_false');


/*
==========================================
REMOVE WP EMOJICONS
==========================================
*/
function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );


/*
==========================================
CUSTOM WIDGETS
==========================================
*/
function widgets_init() {
	register_sidebar( array(
		'name' => 'Logo Block',
		'id' => 'logo_block',
		'before_widget'  => '<section class="company-logo-container"><div id="owl" class="owl-carousel">',
		'after_widget'  => '</div></section>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));	
}

add_action( 'widgets_init', 'widgets_init' );


/*
==========================================
LOGOUT REDIRECT TO HOMEPAGE
==========================================
*/
// add_filter('logout_url', create_function(false, "return '" .  wp_logout_url(get_option("home")) . "';"));  


// add_action( 'init', 'blockusers_init' );
// 	function blockusers_init() {
// 		if ( is_admin() && ! current_user_can( 'administrator' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
// 			wp_redirect( home_url() 
// 		);
// 		exit;
// 	}
// }

/*
==========================================
ADD SOCIAL PROFILES + JOB TITLE TO USERS
==========================================
*/
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) { ?>
<h3><?php _e("Other Meta Data", "blank"); ?></h3>

<table class="form-table">
	<tr>
		<th>
			<label for="twitter"><?php _e("@Twitter Handle"); ?></label>
		</th>
		<td>
			<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description"><?php _e("Please enter your twitter handle."); ?></span>
		</td>
	</tr>
	<tr>
		<th>
			<label for="linkedin"><?php _e("LinkedIn Profile"); ?></label>
		</th>
		<td>
			<input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description"><?php _e("Please enter your linkedin profile."); ?></span>
		</td>
	</tr>
	<tr>
		<th><label for="Job Title"><?php _e("Job Title"); ?></label></th>
		<td>
			<input type="text" name="job_title" id="job_title" value="<?php echo esc_attr( get_the_author_meta( 'job_title', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description"><?php _e("Please enter your job title."); ?></span>
		</td>
	</tr>
</table>
<?php }

add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {

if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

update_user_meta( $user_id, 'address', $_POST['address'] );
update_user_meta( $user_id, 'city', $_POST['city'] );
update_user_meta( $user_id, 'province', $_POST['province'] );
update_user_meta( $user_id, 'postalcode', $_POST['postalcode'] );
update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
update_user_meta( $user_id, 'job_title', $_POST['job_title'] );
}


/*
==========================================
ADD FANCY PAGINATION TO PAGED PAGES
==========================================
*/
function wpbeginner_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}


/**
 * workaround_broken_wp_rewrite_rule.php
 *
 * Plugin Name: Workaround Broken WP Rewrite Rule
 * Description: Fixes pagination for /cat-slug/page/2 style URLs
 * Author: _timk
 */
function workaround_broken_wp_rewrite_rule($query_vars)
{
  if (@$query_vars["name"] == "page") {
    $qv = array();
    $qv["paged"] = str_replace("/", "", $query_vars["page"]);
    $qv["category_name"] = $query_vars["category_name"];

    return $qv;
  }

  return $query_vars;
}

add_filter('request', 'workaround_broken_wp_rewrite_rule');


/*
==============================
DEFAULT THUMBNAIL IMAGE
==============================
*/ 
function wpse55748_filter_post_thumbnail_html( $html ) {
    // If there is no post thumbnail,
    // Return a default image
    if ( '' == $html ) {
        return '<img src="//unsplash.it/350/233?random" id="post-thumbnail" />';
    }
    // Else, return the post thumbnail
    return $html;
}
add_filter( 'post_thumbnail_html', 'wpse55748_filter_post_thumbnail_html' );



/*
==========================================
REMOVE INLINE WIDTH + HEIGHT FROM IMAGES
==========================================
*/ 
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}