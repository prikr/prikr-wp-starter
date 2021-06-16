<?php
/*
 *  Author: Jasper van Doorn
 *  ACF functions
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function prikr_add_theme_options_pages() {
  // Register option pages
  if( function_exists('acf_add_options_page') ):

    // Parent: Thema
    acf_add_options_page(array(
      'page_title' => 'Thema',
      'menu_title' => 'Thema',
      'menu_slug' => 'thema',
      'capability' => 'edit_posts',
      'position' => '60',
      'parent_slug' => '',
      'icon_url' => 'dashicons-admin-customizer',
      'redirect' => true,
      'post_id' => 'options',
      'autoload' => false,
      'update_button' => 'Thema bijwerken',
      'updated_message' => 'Thema bijwerken',
    ));

    // Child: Algemeen
    acf_add_options_page(array(
      'page_title' => 'Algemeen',
      'menu_title' => 'Algemeen',
      'menu_slug' => 'algemeen',
      'capability' => 'edit_posts',
      'position' => '',
      'parent_slug' => 'thema',
      'icon_url' => '',
      'redirect' => false,
      'post_id' => 'algemeen',
      'autoload' => false,
      'update_button' => 'Bijwerken',
      'updated_message' => 'Algemene opties bijgewerkt',
    ));

    // Child: Voorpagina
    acf_add_options_page(array(
      'page_title' => 'Voorpagina',
      'menu_title' => 'Voorpagina',
      'menu_slug' => 'front-page',
      'capability' => 'edit_posts',
      'position' => '',
      'parent_slug' => 'thema',
      'icon_url' => '',
      'redirect' => false,
      'post_id' => 'front-page',
      'autoload' => false,
      'update_button' => 'Bijwerken',
      'updated_message' => 'Voorpagina bijgewerkt',
    ));
    
    // Child: Content secties
    acf_add_options_page(array(
      'page_title' => 'Content secties',
      'menu_title' => 'Content secties',
      'menu_slug' => 'content_sections',
      'capability' => 'edit_posts',
      'position' => '',
      'parent_slug' => 'thema',
      'icon_url' => '',
      'redirect' => true,
      'post_id' => 'content_sections',
      'autoload' => false,
      'update_button' => 'Update',
      'updated_message' => 'Options Updated',
    ));
   
    // Child: Header
    acf_add_options_page(array(
      'page_title' => 'Header',
      'menu_title' => 'Header',
      'menu_slug' => 'header',
      'capability' => 'edit_posts',
      'position' => '',
      'parent_slug' => 'thema',
      'icon_url' => '',
      'redirect' => false,
      'post_id' => 'header',
      'autoload' => false,
      'update_button' => 'Bijwerken',
      'updated_message' => 'Header bijgewerkt',
    ));

    // Child: Footer
    acf_add_options_page(array(
      'page_title' => 'Footer',
      'menu_title' => 'Footer',
      'menu_slug' => 'footer',
      'capability' => 'edit_posts',
      'position' => '',
      'parent_slug' => 'thema',
      'icon_url' => '',
      'redirect' => false,
      'post_id' => 'footer',
      'autoload' => false,
      'update_button' => 'Bijwerken',
      'updated_message' => 'Footer bijgewerkt',
    ));

    // WooCommerce extra options
    acf_add_options_page(array(
      'page_title' => 'Aangepaste instellingen',
      'menu_title' => 'Aangepaste instellingen',
      'menu_slug' => 'aangepaste_instellingen',
      'capability' => 'edit_posts',
      'position' => '300',
      'parent_slug' => 'woocommerce',
      'icon_url' => '',
      'redirect' => true,
      'post_id' => 'wc_extra_options',
      'autoload' => false,
      'update_button' => 'Update',
      'updated_message' => 'Options Updated',
    ));

  endif;
}
add_action( 'init', 'prikr_add_theme_options_pages', 10 );

// add default image setting to ACF image fields
// let's you select a defualt image
// this is simply taking advantage of a field setting that already exists

add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field');
function add_default_value_to_image_field($field) {
  acf_render_field_setting( $field, array(
    'label'			      => 'Standaard afbeelding',
    'instructions'		=> 'Komt naar voren als er een nieuw bericht wordt aangemaakt.',
    'type'			      => 'image',
    'name'			      => 'default_value',
  ));
}

// Format Price fields value
function prikr_currency_format($value, $post_id, $field) {
  $value = number_format($value, 2, ',', '.');
  if (strpos($value, ',00')) return substr($value, -3) == ",00" ? substr($value, 0, -3) . ',-' : $value;
  return $value;
}
add_filter('acf/format_value/name=subprijs', 'prikr_currency_format', 20, 3);

function form_remove_enqueues() {
  // Stylized select (including user and post fields)
  wp_dequeue_script( 'select2' );
  wp_dequeue_style( 'select2' );

  // Date picker
  wp_dequeue_script( 'jquery-ui-datepicker' );
  wp_dequeue_style( 'acf-datepicker' );

  // Date and time picker
  wp_dequeue_script( 'acf-timepicker' );
  wp_dequeue_style( 'acf-timepicker' );

  // Color picker
  wp_dequeue_script( 'wp-color-picker' );
  wp_dequeue_style( 'wp-color-picker' );

  wp_dequeue_style( 'acf-code-editor' );

}
add_action( 'af/form/enqueue', 'form_remove_enqueues' );

function my_deregister_styles() {
  if (!is_admin()) {
    wp_deregister_style( 'acf-field-group' );
    wp_deregister_style( 'acf-global' );
    wp_deregister_style( 'acf-input' );
    wp_deregister_style( 'acf-datepicker' );
    wp_deregister_style( 'acf-extended-input' );
    wp_deregister_style( 'acf-extended' );
    wp_deregister_style( 'code-editor' );
    wp_deregister_style( 'wp-mirrorcode' );
  }
}
add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

function my_deregister_scripts() {
  if (!is_admin()) {
    wp_deregister_style( 'acf-input' );
    wp_deregister_style( 'acf-pro-input' );
  }
}
add_action( 'wp_print_scripts', 'my_deregister_scripts', 100 );
