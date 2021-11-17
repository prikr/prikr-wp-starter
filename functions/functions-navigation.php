<?php

/**
 * Project: mvr
 * File: functions-navigation.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Register navigation menus in WP
 */
function prikr_register_nav_menus()
{
  register_nav_menus(
    array(
      'topbar' => __('Topbar menu', 'prikr'),
      'primary'       => __('Hoofdmenu', 'prikr'),
      'bottom_footer' => __('Bottom footer menu', 'prikr')
    )
  );
}
add_action('after_setup_theme', 'prikr_register_nav_menus', 0);

/**
 * Add additional classes to anchors in menus
 */
function add_additional_class_on_a($classes, $item, $args)
{
  if (isset($args->add_a_class)) {
    $classes['class'] = $args->add_a_class;
  }
  return $classes;
}

add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

/**
 * Add additional classes to list items in menu
 */
function add_additional_class_on_li($classes, $item, $args)
{
  if (isset($args->add_li_class)) {
    $classes[] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
