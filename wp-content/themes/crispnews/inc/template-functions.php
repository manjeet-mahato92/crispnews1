<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Crisp_News
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function crispnews_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'crispnews_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function crispnews_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'crispnews_pingback_header' );

/** post formats */
$post_formats = array('aside', 'image', 'gallery', 'video', 'audio', 'link', 'quote', 'status');
add_theme_support('post-formats', $post_formats);


   // Function to handle the thumbnail request
   function get_the_post_thumbnail_src($img)
   {
	 return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
   }
   function gazeta_social_buttons($content)
   {
	 global $post;
	 if (is_singular() || is_home()) {

	   // Get current page URL 
	   $sb_url = urlencode(get_permalink());

	   // Get current page title
	   $sb_title = str_replace(' ', '%20', get_the_title());

	   // Get Post Thumbnail for pinterest
	   $sb_thumb = get_the_post_thumbnail_src(get_the_post_thumbnail());

	   // Construct sharing URL without using any script
	   $twitterURL = 'https://twitter.com/intent/tweet?text=' . $sb_title . '&amp;url=' . $sb_url . '&amp;via=wpvkp';
	   $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $sb_url;
	   // $bufferURL = 'https://bufferapp.com/add?url=' . $sb_url . '&amp;text=' . $sb_title;
	   $whatsappURL = 'whatsapp://send?text=' . $sb_title . ' ' . $sb_url;
	   $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $sb_url . '&amp;title=' . $sb_title;

	   if (!empty($sb_thumb)) {
		 $pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $sb_url . '&amp;media=' . $sb_thumb[0] . '&amp;description=' . $sb_title;
	   } else {
		 $pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $sb_url . '&amp;description=' . $sb_title;
	   }


	   // Add sharing button at the end of page/page content
	   $content .= '<div class="social-box"><div class="social-btn">';
	   $content .= '<a class="col-2 sbtn s-twitter" href="' . $twitterURL . '" target="_blank" rel="nofollow"><span><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
	   <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
	 </svg> </span></a>';
	   $content .= '<a class="col-2 sbtn s-facebook" href="' . $facebookURL . '" target="_blank" rel="nofollow"><span><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
	   <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
	 </svg> </span></a>';
	   $content .= '<a class="col-2 sbtn s-whatsapp" href="' . $whatsappURL . '" target="_blank" rel="nofollow"><span><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
	   <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
	 </svg></span></a>';

	   $content .= '<a class="col-2 sbtn s-linkedin" href="' . $linkedInURL . '" target="_blank" rel="nofollow"><span><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
	   <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
	 </svg></span></a>';
	   // $content .= '<a class="col-2 sbtn s-buffer" href="' . $bufferURL . '" target="_blank" rel="nofollow"><span>Buffer</span></a>';
	   $content .= '</div></div>';

	   return $content;
	 } else {
	   // if not a post/page then don't include sharing button
	   return $content;
	 }
   };
   // Enable the_content if you want to automatically show social buttons below your post.

   add_filter('the_content', 'gazeta_social_buttons');

   // This will create a wordpress shortcode [social].
   // Please it in any widget and social buttons appear their.
   // You will need to enabled shortcode execution in widgets.
   add_shortcode('social', 'gazeta_social_buttons');


   // Responsive Embeds

   add_filter('the_content', function($content) {
	return str_replace(array("<iframe", "</iframe>"), array('<div class="iframe-container"><iframe', "</iframe></div>"), $content);
});

add_filter('embed_oembed_html', function ($html, $url, $attr, $post_id) {
	if(strpos($html, 'youtube.com') !== false || strpos($html, 'youtu.be') !== false){
  		return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
	} else {
	 return $html;
	}
}, 10, 4);


add_filter('embed_oembed_html', function($code) {
  return str_replace('<iframe', '<iframe class="embed-responsive-item" ', $code);
});


// You May Like POsts
function you_may_like_shortcode()
{

	ob_start();
?>

	<div class="you-may-like rounded small">
		<div class="widget-name">
			<h4 class="fs-4 fw-600 mb-3">You May Like</h4>
			<div class="border-foot"></div>
		</div>
		<div class="hot-posts you-may-like-columns">
			<?php
			$recent_posts = wp_get_recent_posts(array(
				'numberposts' => 2, // Number of recent posts thumbnails to display
				'post_status' => 'publish' // Show only the published posts
			));
			foreach ($recent_posts as $post_item) : ?>
				<article class="list-group-item list-group-item-action small rounded article-list">
					<div class="row align-items-center d-flex">
						<div class="col align-middle">
							<figure>
								<a href="<?php echo get_permalink($post_item['ID']) ?>">
									<?php
									if (has_post_thumbnail($post_item['ID'])) { ?>
										<?php echo get_the_post_thumbnail($post_item['ID'], 'thumbnail', ['class' => 'img-fluid rounded']); ?>
									<?php  } else { ?>
										<img class="img-fluid rounded" src="<?php echo get_template_directory_uri(); ?>/assets/default-image-drp-thumb.jpg" alt="<?php echo get_the_title(); ?>" />
									<?php }
									?>
								</a>
								<div class="news-type-box sidebar-icon">
									<?php if (has_post_format('video', $post_item['ID'])) {
										echo '<span class="post-type"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-camera-video" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z"/>
			  </svg> </span>';
									} else {
										echo '<span class="post-type"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-newspaper" viewBox="0 0 16 16">
					<path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"></path>
					<path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"></path>
				</svg></span>';
									} ?>

								</div>
							</figure>
						</div>
						<div class="col-8 align-middle">
							<p> <?php $categories = get_the_category($post_item['ID']);
								if (!empty($categories)) {
									echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
								} ?></p>
							<h3>
								<a href="<?php echo get_permalink($post_item['ID']) ?>" target="_blank">
									<?php echo $post_item['post_title'] ?>
								</a>
							</h3>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
<?php
	return ob_get_clean();
}

add_shortcode('you-may-like-posts', 'you_may_like_shortcode');

// Content in Article
add_filter('the_content', 'prefix_insert_post_ads');

function prefix_insert_post_ads($content)
{

	$ad_code = '<div>[you-may-like-posts]</div>';

	if (is_single() && !is_admin()) {
		return prefix_insert_after_paragraph($ad_code, 5, $content);
	}

	return $content;
}

// Parent Function that makes the magic happen

function prefix_insert_after_paragraph($insertion, $paragraph_id, $content)
{
	$closing_p = '</p>';
	$paragraphs = explode($closing_p, $content);
	foreach ($paragraphs as $index => $paragraph) {

		if (trim($paragraph)) {
			$paragraphs[$index] .= $closing_p;
		}

		if ($paragraph_id == $index + 1) {
			$paragraphs[$index] .= $insertion;
		}
	}

	return implode('', $paragraphs);
}

?>

 