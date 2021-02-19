<?php
 /*
 *  Author: Jasper van Doorn
 *  Default functions.php
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (!defined("MY_THEME_DIR")) define("MY_THEME_DIR", trailingslashit( get_template_directory() ));
if (!defined("MY_THEME_DIR_URI")) define("MY_THEME_DIR_URI", trailingslashit( get_template_directory_uri() ));

include_once(MY_THEME_DIR . '.env.php');

/* Enqueue scripts and styles.*/
function template_scripts() {
  // Enque font style file
  wp_enqueue_style( 'template-style', get_template_directory_uri() . '/style.css');
  if (!is_admin()) { 
    // wp_register_script( 'jquery-defer', 'https://code.jquery.com/jquery-3.5.1.min.js', false, 0, true );
    $environment = new Environment;
    if ($environment->is_production()) {
      wp_register_script( 'main-defer', get_template_directory_uri() . '/dist/js/scripts.min.js', 'template-style', '1', true);
    } else {
      wp_register_script( 'main-dev-defer', get_template_directory_uri() . '/dist/js/scripts.min.js', 'template-style', '1', true);
    }

    if ($environment->is_production()) {
      wp_enqueue_script('main-defer');
    } else {
      wp_enqueue_script('main-dev-defer');
    }
  }
}
add_action( 'wp_enqueue_scripts', 'template_scripts' );