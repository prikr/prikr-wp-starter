<?php
/*
 *  Author: Jasper van Doorn
 *  Theme functions
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Disable features*/
// if ( !is_admin() ) wp_deregister_script('jquery');

// // Disable rss features
function prikr_disable_feed() {
  wp_die( __('No feed available, please visit our <a href="'. get_bloginfo('url') .'">website</a>!') );
}
add_action('do_feed', 'prikr_disable_feed', 1);
add_action('do_feed_rdf', 'prikr_disable_feed', 1);
add_action('do_feed_rss', 'prikr_disable_feed', 1);
add_action('do_feed_rss2', 'prikr_disable_feed', 1);
add_action('do_feed_atom', 'prikr_disable_feed', 1);
add_action('do_feed_rss2_comments', 'prikr_disable_feed', 1);
add_action('do_feed_atom_comments', 'prikr_disable_feed', 1);
 
// Remove feed link from header
remove_action( 'wp_head', 'feed_links_extra', 3 ); //Extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // General feeds: Post and Comment Feed

// Disable json api
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

// Remove the Link header for the WP REST API
// [link] => <http://www.example.com/wp-json/>; rel="https://api.w.org/"
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );

// Remove script and style versions
function pu_remove_script_version( $src ){
    return remove_query_arg( 'ver', $src );
}
add_filter( 'script_loader_src', 'pu_remove_script_version' );
add_filter( 'style_loader_src', 'pu_remove_script_version' );

/* Use theme images */
function theme_img($img) {
  if ( $img ) {
      echo get_template_directory_uri() . '/dist/img/' . $img;
  }
}

/* Get theme images */
function get_theme_img($img) {
  if ( $img ) return get_template_directory_uri() . '/dist/img/' . $img;
  return;
}

// Get featured image of post
//get attachment meta
if ( !function_exists('wp_get_attachment') ) {
  function wp_get_attachment( $attachment_id, $size )
  {
      $attachment = get_post( $attachment_id );
      $image_src = wp_get_attachment_image_src( $attachment_id, $size );
      if (is_array($image_src)) :
        $src = $image_src[0] ?? '';
        $width = $image_src[1] ?? '';
        $height = $image_src[2] ?? '';
      else :
        return false;
      endif;
      return array(
          'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
          'src' => $src,
          'title' => $attachment->post_title,
          'width' => $width,
          'height' => $height,
          'caption' => $attachment->post_excerpt,
          'description' => $attachment->post_content,
          'href' => get_permalink( $attachment->ID ),
      );
  }
}


// Clean up header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

// Disable emojis
function disable_wp_emojicons() {
    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  }
add_action( 'init', 'disable_wp_emojicons' );

function smartwp_remove_wp_block_library_css(){
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
  wp_deregister_script( 'wp-embed' );
  wp_deregister_script( 'jquery' );
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

// Remove admin bar
add_filter('show_admin_bar', '__return_false');

// Remove generator tag
remove_action('wp_head', 'wp_generator');
remove_action( 'wp_head', array($sitepress, 'meta_generator_tag' ) );

add_filter( 'query_vars', function( $vars ){
    $vars[] = 'post_parent';
    return $vars;
});
 
// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
	remove_menu_page( 'edit-comments.php' );
}

// Removes from post and pages
add_action( 'init', 'remove_comment_support', 100 );
function remove_comment_support() {
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'page', 'comments' );
}

// Removes from admin bar
function mytheme_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

// Add support for featured images
add_theme_support( 'post-thumbnails' );

// Custom image sizes
function image_size_setup() {
  add_image_size( 'small', 500 );
  add_image_size( 'medium', 800 );
  add_image_size( 'normal', 1100 );
  add_image_size( 'large', 1400 );
}
add_action( 'after_setup_theme', 'image_size_setup' );

function restrict_upload_mimes() {
  if (current_user_can( 'administrator') && !defined('ALLOW_UNFILTERED_UPLOADS')){
      define('ALLOW_UNFILTERED_UPLOADS', true);
  }
}
add_action( 'admin_init', 'restrict_upload_mimes', 1 );

// Allow svg in upload
function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $new_filetypes['svg'] = 'image/svg+xmlns';
  $new_filetypes['woff'] = 'application/x-font-woff';
  $new_filetypes['woff2'] = 'application/x-font-woff2';
  $new_filetypes['ttf'] = 'application/x-font-ttf';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

function svg_meta_data($data, $id){

    $attachment = get_post($id); // Filter makes sure that the post is an attachment
    $mime_type = $attachment->post_mime_type; // The attachment mime_type

    //If the attachment is an svg

    if($mime_type == 'image/svg+xml'){

        //If the svg metadata are empty or the width is empty or the height is empty
        //then get the attributes from xml.

        if(empty($data) || empty($data['width']) || empty($data['height'])){

            $xml = simplexml_load_file(wp_get_attachment_url($id));
            $attr = $xml->attributes();
            $viewbox = explode(' ', $attr->viewBox);
            $data['width'] = isset($attr->width) && preg_match('/\d+/', $attr->width, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[2] : null);
            $data['height'] = isset($attr->height) && preg_match('/\d+/', $attr->height, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[3] : null);
        }

    }

    return $data;

}

add_filter('wp_update_attachment_metadata', 'svg_meta_data', 10, 2);

if (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
  ini_set( 'error_log', MY_THEME_DIR . '/debug.txt' );
}

/**
* Add async or defer attributes to script enqueues
* @author Mike Kormendy
* @param  String  $tag     The original enqueued <script src="...> tag
* @param  String  $handle  The registered unique name of the script
* @return String  $tag     The modified <script async|defer src="...> tag
*/
// only on the front-end
if(!is_admin()) {
  function add_asyncdefer_attribute($tag, $handle) {
      // if the unique handle/name of the registered script has 'async' in it
      if (strpos($handle, 'async') !== false) {
          // return the tag with the async attribute
          return str_replace( '<script ', '<script async ', $tag );
      }
      // if the unique handle/name of the registered script has 'defer' in it
      else if (strpos($handle, 'defer') !== false) {
          // return the tag with the defer attribute
          return str_replace( '<script ', '<script defer ', $tag );
      }
      // otherwise skip
      else {
          return $tag;
      }
  }
  add_filter('script_loader_tag', 'add_asyncdefer_attribute', 10, 2);
}

//* Adding DNS Prefetching 
function prikr_dns_prefetch() { 
  echo '<meta https-equiv="x-dns-prefetch-control" content="on"> 
        <link rel="dns-prefetch" href="//fonts.googleapis.com" />
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        '; 
} 
add_action('wp_head', 'prikr_dns_prefetch', 0);

function html5_video($atts, $content = null) {
	extract(shortcode_atts(array(
		"src" => '',
		"width" => '',
		"height" => ''
	), $atts));
	return '<div class="embed-responsive embed-responsive-16by9"><video src="'.$src.'" width="'.$width.'" height="'.$height.'" class="embed-responsive-item content_video" controls autobuffer></div>';
}
add_shortcode('video', 'html5_video');

function prikr_favicon() {
  echo '<link rel="shortcut icon" href="'. MY_THEME_DIR_URI . '/favicons/favicon.ico" >';
  echo '<link rel="apple-touch-icon-precomposed" sizes="57x57" href="'. MY_THEME_DIR_URI . '/favicons/apple-touch-icon-57x57.png" />';
  echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'. MY_THEME_DIR_URI . '/favicons/apple-touch-icon-114x114.png" />';
  echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="'. MY_THEME_DIR_URI . '/favicons/apple-touch-icon-72x72.png" />';
  echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="'. MY_THEME_DIR_URI . '/favicons/apple-touch-icon-144x144.png" />';
  echo '<link rel="apple-touch-icon-precomposed" sizes="60x60" href="'. MY_THEME_DIR_URI . '/favicons/apple-touch-icon-60x60.png" />';
  echo '<link rel="apple-touch-icon-precomposed" sizes="120x120" href="'. MY_THEME_DIR_URI . '/favicons/apple-touch-icon-120x120.png" />';
  echo '<link rel="apple-touch-icon-precomposed" sizes="76x76" href="'. MY_THEME_DIR_URI . '/favicons/apple-touch-icon-76x76.png" />';
  echo '<link rel="apple-touch-icon-precomposed" sizes="152x152" href="'. MY_THEME_DIR_URI . '/favicons/apple-touch-icon-152x152.png" />';
  echo '<link rel="icon" type="image/png" href="'. MY_THEME_DIR_URI . '/favicons/favicon-196x196.png" sizes="196x196" />';
  echo '<link rel="icon" type="image/png" href="'. MY_THEME_DIR_URI . '/favicons/favicon-96x96.png" sizes="96x96" />';
  echo '<link rel="icon" type="image/png" href="'. MY_THEME_DIR_URI . '/favicons/favicon-32x32.png" sizes="32x32" />';
  echo '<link rel="icon" type="image/png" href="'. MY_THEME_DIR_URI . '/favicons/favicon-16x16.png" sizes="16x16" />';
  echo '<link rel="icon" type="image/png" href="'. MY_THEME_DIR_URI . '/favicons/favicon-128.png" sizes="128x128" />';
  echo '<meta name="application-name" content="MvR Academy"/>';
  echo '<meta name="msapplication-TileColor" content="#5C2483" />';
  echo '<meta name="msapplication-TileImage" content="'. MY_THEME_DIR_URI . '/favicons/mstile-144x144.png" />';
  echo '<meta name="msapplication-square70x70logo" content="'. MY_THEME_DIR_URI . '/favicons/mstile-70x70.png" />';
  echo '<meta name="msapplication-square150x150logo" content="'. MY_THEME_DIR_URI . '/favicons/mstile-150x150.png" />';
  echo '<meta name="msapplication-wide310x150logo" content="'. MY_THEME_DIR_URI . '/favicons/mstile-310x150.png" />';
  echo '<meta name="msapplication-square310x310logo" content="'. MY_THEME_DIR_URI . '/favicons/mstile-310x310.png" />';
}
add_action('wp_head', 'prikr_favicon');

/**
 * Create an more advanced search method
 */
add_action( 'pre_get_posts', function( $q )
{
    if( $title = $q->get( '_meta_or_title' ) )
    {
        add_filter( 'get_meta_sql', function( $sql ) use ( $title )
        {
            global $wpdb;

            // Only run once:
            static $nr = 0; 
            if( 0 != $nr++ ) return $sql;

            // Modified WHERE
            $sql['where'] = sprintf(
                " AND ( %s OR %s ) ",
                $wpdb->prepare( "{$wpdb->posts}.post_title like '%%%s%%'", $title),
                mb_substr( $sql['where'], 5, mb_strlen( $sql['where'] ) )
            );

            return $sql;
        });
    }
});