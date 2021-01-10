<?php
 /*
 *  Author: Jasper van Doorn
 *  Default functions.php
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (!defined("MY_THEME_DIR")) define("MY_THEME_DIR", trailingslashit( get_template_directory() ));

/* Enqueue scripts and styles.*/
function template_scripts() {
  // Enque font style file
  wp_enqueue_style( 'template-style', get_template_directory_uri() . '/style.css');
  if (!is_admin()) {
      wp_register_script( 'main', get_template_directory_uri() . '/dist/js/scripts.min.js', false, '1', true);
      wp_enqueue_script('main');
  }
}
add_action( 'wp_enqueue_scripts', 'template_scripts' );

// Import all functions
require get_template_directory() . '/functions/functions.php';

// Import all includes
require get_template_directory() . '/includes/includes.php';

// Import all includes
require get_template_directory() . '/modules/modules.php';
