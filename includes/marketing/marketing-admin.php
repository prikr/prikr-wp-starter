<?php

/**
 * Project: mvr
 * File: marketing-admin.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Register a custom menu page.
 */
function prikr_register_marketing_page()
{
  add_menu_page(
    __('Marketing', 'prikr'),
    'Marketing',
    'manage_options',
    'marketing-dashboard',
    '',
    'dashicons-chart-bar',
    34
  );

  add_submenu_page(
    'marketing-dashboard',
    'Dashboard',
    'Dashboard',
    'manage_options',
    'dashboard',
    'prikr_get_marketing_contents',
    0
  );

  add_submenu_page(
    'marketing-dashboard',
    'Contactformulieren',
    'Contactformulieren',
    'manage_options',
    'wpcf7',
    'wpcf7',
    2
  );

  remove_menu_page('wpcf7');
}
add_action('admin_menu', 'prikr_register_marketing_page');

/**
 * Display a custom menu page
 */
function prikr_get_marketing_contents()
{
  require get_template_directory() . '/includes/marketing/marketing-screen.php';
}

function load_marketing_admin_style()
{
  if (stripos($_SERVER['REQUEST_URI'], 'dashboard') !== false) {

    wp_register_script('prikr_bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '1.0.0');
    wp_enqueue_script('prikr_bootstrap_js');

    wp_register_style('prikr_bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', false, '1.0.0');
    wp_enqueue_style('prikr_bootstrap_css');

    wp_register_style('custom_marketing_css', get_template_directory_uri() . '/includes/marketing/marketing-style.css', false, '1.0.0');
    wp_enqueue_style('custom_marketing_css');
  }
}
add_action('admin_enqueue_scripts', 'load_marketing_admin_style');
