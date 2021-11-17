<?php

/**
 * Project: prikr
 * File: cpt-modals.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!defined('ABSPATH')) exit; // Exit if accessed directly

$postTypes = [
  array(
    'post_type' =>  'modals',
    'singular_name' => 'modal',
    'singular_name_cap' => 'Modal',
    'plural_name' => 'modals',
    'plural_name_cap' => 'Modals',
    'taxonomies' => array(),
    'show_in_menu' => 'marketing-dashboard',
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => true,
    'rewrite' => array(
      'slug' => 'modals',
      'with_front' => true,
      'feeds' => true,
      'pages' => true,
    ),
  )
];

foreach ($postTypes as $type) {
  if (function_exists('register_post_type')) {
    register_post_type($type['post_type'], array(
      'label' => $type['plural_name_cap'],
      'description' => $type['plural_name'],
      'hierarchical' => false,
      'supports' => array(
        0 => 'title',
        1 => 'thumbnail',
        2 => 'custom-fields',
      ),
      'taxonomies' => array(),
      'public' => true,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'can_export' => true,
      'delete_with_user' => 'null',
      'menu_icon' => 'dashicons-align-full-width',
      'show_ui' => true,
      'show_in_menu' => $type['show_in_menu'],
      'show_in_nav_menus' => $type['show_in_nav_menus'],
      'show_in_admin_bar' => $type['show_in_admin_bar'],
      'rewrite' => $type['rewrite'],
      'has_archive' => false,
      'acfe_admin_archive' => false,
      'acfe_admin_ppp' => 10,
      'acfe_admin_orderby' => 'date',
      'acfe_admin_order' => 'DESC',
      'menu_position' => 25,
      'capability_type' => 'post',
      'capabilities' => array(),
      'map_meta_cap' => NULL,
    ));
  }
}
