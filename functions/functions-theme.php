<?php
/*
 *  Author: Jasper van Doorn
 *  Theme functions
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Echo theme image
 * @param $img
 */
function theme_img($img) {
  if ( $img ) {
      echo get_template_directory_uri() . '/dist/img/' . $img;
  }
}

/**
 * Return theme image
 * @param $img
 * @return String
 */
function get_theme_img($img) {
  if ( $img ) return get_template_directory_uri() . '/dist/img/' . $img;
  return;
}

/**
 * Get the WordPress attachment 
 * @return Array
 */
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

function html5_video($atts, $content = null) {
	extract(shortcode_atts(array(
		"src" => '',
		"width" => '',
		"height" => ''
	), $atts));
	return '<div class="embed-responsive embed-responsive-16by9"><video src="'.$src.'" width="'.$width.'" height="'.$height.'" class="embed-responsive-item content_video" controls autobuffer></div>';
}
add_shortcode('video', 'html5_video');

function prikr_head_tags() {
  echo '<meta name="theme-color" content="#FFCC00">';
  echo '<meta name="application-name" content="EKH"/>';
  echo '<meta name="msapplication-TileColor" content="#FFCC00" />';
  echo '<meta name="msapplication-TileImage" content="'. MY_THEME_DIR_URI . '/favicons/mstile-144x144.png" />';
  echo '<meta name="msapplication-square70x70logo" content="'. MY_THEME_DIR_URI . '/favicons/mstile-70x70.png" />';
  echo '<link rel="shortcut icon" href="'. MY_THEME_DIR_URI . '/favicons/favicon.ico" >';
  echo '<link rel="apple-touch-icon-precomposed" sizes="57x57" href="'. MY_THEME_DIR_URI . '/favicons/apple-touch-icon-57x57.png" />';
  echo '<link rel="icon" type="image/png" href="'. MY_THEME_DIR_URI . '/favicons/favicon-196x196.png" sizes="196x196" />';
}
add_action('wp_head', 'prikr_head_tags');

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