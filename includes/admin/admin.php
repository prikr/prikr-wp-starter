<?php
 /*
 *  Author: Jasper van Doorn
 *  Specific admin functions
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function load_custom_wp_admin_style(){
  wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/includes/admin/style.css', false, '1.0.0' );
  wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');

function my_login_stylesheet() {
  wp_enqueue_style( 'custom_wp_login_css', get_template_directory_uri() . '/includes/admin/login-style.css', false, '1.0.0' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


function render_login_message() {
  echo '<div class="login-header"><div class="logo"></div><div class="welcome-back-message">Welkom terug</div></div>';
}
add_filter( 'login_message', 'render_login_message');

function render_wrapper() {
  echo '<div class="prikr_login_wrapper"><div class="inside-wrapper">';
}

add_filter( 'login_headertext', 'render_wrapper');

function render_footer_message() {
  echo '<div id="image"><div class="inside-image"></div></div></div></div>';
}

add_filter( 'login_footer', 'render_footer_message');