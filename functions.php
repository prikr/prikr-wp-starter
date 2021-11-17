<?php
 /*
 *  Author: Jasper van Doorn
 *  Default functions.php
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (!defined("MY_THEME_DIR")) define("MY_THEME_DIR", trailingslashit( get_template_directory() ));
if (!defined("MY_THEME_DIR_URI")) define("MY_THEME_DIR_URI", trailingslashit( get_template_directory_uri() ));

include_once(MY_THEME_DIR . '.env.php');

/**
 * Template styles with critical styles
 */
function prikr_critical_css() {
	$styles = '';
	$name = '';
  $hasCritical = false;
  $files = json_decode(file_get_contents( MY_THEME_DIR . 'critical.pages.json' ), true);
  foreach( $files['urls'] as $file) {
    if( call_user_func($file['condition'], $file['condition_argument']) ) {
      $name = $file['name'];
      $hasCritical = true;
    }
  }

	if($hasCritical !== true) {
    $styles .= '<link rel="stylesheet" href="' . get_template_directory_uri() . '/style.css" />';		
	} else {
		$styles .= '<style>' . file_get_contents(get_template_directory_uri() . '/dist/critical/critical-' . $name . '.css', true) .'</style>';
    $styles .= '<link rel="preload" href="' . get_template_directory_uri() . '/style.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'"/>';
  }

  echo $styles;
}

/**
 * Template scripts
 */
function prikr_template_scripts()
{
  $environment = new Environment;
  if (!is_admin()) {
    if ($environment->is_production()) {
      wp_enqueue_script('main-defer', get_template_directory_uri() . '/dist/js/scripts.min.js', null, '1', true);
    } else {
      wp_enqueue_script('main-dev-defer', get_template_directory_uri() . '/dist/js/scripts.min.js', null, '1', true);
    }
  }
}
add_action('wp_enqueue_scripts', 'prikr_template_scripts', 12);

/**
 * General theme functions
 */
require get_template_directory() . '/functions/functions.php';

/**
 * Theme includes
 */
require get_template_directory() . '/includes/includes.php';
