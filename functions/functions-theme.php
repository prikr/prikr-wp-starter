<?php
/*
 *  Author: Jasper van Doorn
 *  Theme functions
 */

/* Disable features*/
// if ( !is_admin() ) wp_deregister_script('jquery');

// Disable rss features
function wpb_disable_feed() {
    wp_die( __('No feed available, please visit our <a href="'. get_bloginfo('url') .'">website</a>!') );
    }
     
    add_action('do_feed', 'wpb_disable_feed', 1);
    add_action('do_feed_rdf', 'wpb_disable_feed', 1);
    add_action('do_feed_rss', 'wpb_disable_feed', 1);
    add_action('do_feed_rss2', 'wpb_disable_feed', 1);
    add_action('do_feed_atom', 'wpb_disable_feed', 1);
    add_action('do_feed_rss2_comments', 'wpb_disable_feed', 1);
    add_action('do_feed_atom_comments', 'wpb_disable_feed', 1);
 
// Remove feed link from header
remove_action( 'wp_head', 'feed_links_extra', 3 ); //Extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // General feeds: Post and Comment Feed

// Disable json api
add_filter('rest_jsonp_enabled', '_return_false');
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
      echo get_template_directory_uri() . '/src/img/' . $img;
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

// Remove admin bar
add_filter('show_admin_bar', '__return_false');

// Remove generator tag
remove_action('wp_head', 'wp_generator');

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
  add_image_size( 'large', 1400 );
}
add_action( 'after_setup_theme', 'image_size_setup' );

// Allow svg in upload
function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $new_filetypes['woff'] = 'application/x-font-woff';
  $new_filetypes['woff2'] = 'application/x-font-woff2';
  $new_filetypes['ttf'] = 'application/x-font-ttf';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

if (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
  ini_set( 'error_log', MY_THEME_DIR . '/debug.txt' );
}

?>