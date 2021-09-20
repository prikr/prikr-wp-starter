<?php

/**
 * Project: mvr
 * File: functions-woocommerce.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Disable Analytics features
 */
function teachdigital_cleanup_woocommerce()
{

  add_filter('woocommerce_admin_disabled', 'teachdigital__disable__wcnewadmin');
  add_action('admin_menu', function () {
    remove_menu_page('skyverge');
  }, 99);
  add_action('admin_menu', 'wcbloat_remove_admin_addon_submenu', 999);
  add_filter('woocommerce_marketing_menu_items', '__return_empty_array', 1);
  add_filter('woocommerce_admin_features', 'disable_marketing_features', 1);
  add_filter('woocommerce_admin_features', 'disable_analytics_features', 1);
  add_filter('jetpack_just_in_time_msgs', '__return_false', 20);
  add_filter('jetpack_show_promotions', '__return_false', 20);
  add_filter('woocommerce_allow_marketplace_suggestions', '__return_false', 999);
  add_action('wp_dashboard_setup', 'wcbloat_disable_woocommerce_status');
  add_action('widgets_init', 'wcbloat_disable_woocommerce_widgets', 99);

  function teachdigital__disable__wcnewadmin()
  {
    return true;
  }

  function wcbloat_disable_woocommerce_widgets()
  {
    unregister_widget('WC_Widget_Products');
    unregister_widget('WC_Widget_Product_Categories');
    unregister_widget('WC_Widget_Product_Tag_Cloud');
    unregister_widget('WC_Widget_Cart');
    unregister_widget('WC_Widget_Layered_Nav');
    unregister_widget('WC_Widget_Layered_Nav_Filters');
    unregister_widget('WC_Widget_Price_Filter');
    unregister_widget('WC_Widget_Product_Search');
    unregister_widget('WC_Widget_Recently_Viewed');
    unregister_widget('WC_Widget_Recent_Reviews');
    unregister_widget('WC_Widget_Top_Rated_Products');
    unregister_widget('WC_Widget_Rating_Filter');
  }

  function wcbloat_disable_woocommerce_status()
  {
    remove_meta_box('woocommerce_dashboard_status', 'dashboard', 'normal');
  }

  function wcbloat_remove_admin_addon_submenu()
  {
    remove_submenu_page('woocommerce', 'wc-addons');
  }

  function disable_marketing_features($features)
  {
    $marketing = array_search('marketing', $features);
    unset($features[$marketing]);
    return $features;
  }
  function disable_analytics_features($features)
  {
    $marketing = array_search('analytics', $features);
    unset($features[$marketing]);
    return $features;
  }
}
add_action('after_setup_theme', 'teachdigital_cleanup_woocommerce');

add_filter('body_class', function ($classes) {
  if (in_array("woocommerce-no-js", $classes)) {
    remove_action('wp_footer', 'wc_no_js');
    $classes = array_diff($classes, array('woocommerce-no-js'));
    $classes[] = 'woocommerce-js';
  }
  return array_values($classes);
}, 10, 1);

add_action('wp_print_styles', function () {
  wp_style_add_data('woocommerce-inline', 'after', '');
});

/**
 * Remove scripts from not-woocommerce pages
 */
function teachdigital_disable_woocommerce_scripts()
{
  if (function_exists('is_woocommerce')) {
    //Dequeue WooCommerce Styles
    wp_dequeue_style('woocommerce-general');
    wp_dequeue_style('woocommerce-layout');
    wp_dequeue_style('woocommerce-smallscreen');
    wp_dequeue_style('woocommerce_frontend_styles');
    wp_dequeue_style('woocommerce_fancybox_styles');
    wp_dequeue_style('woocommerce_chosen_styles');
    wp_dequeue_style('woocommerce_prettyPhoto_css');
    //Dequeue WooCommerce Scripts
    wp_dequeue_script('wc_price_slider');
    wp_dequeue_script('wc-single-product');
    wp_dequeue_script('wc-add-to-cart');
    wp_dequeue_script('wc-checkout');
    wp_dequeue_script('wc-add-to-cart-variation');
    wp_dequeue_script('wc-single-product');
    wp_dequeue_script('wc-cart');
    wp_dequeue_script('wc-chosen');
    wp_dequeue_script('woocommerce');
    wp_dequeue_script('prettyPhoto');
    wp_dequeue_script('prettyPhoto-init');
    wp_dequeue_script('jquery-blockui');
    wp_dequeue_script('jquery-placeholder');
    wp_dequeue_script('fancybox');
    wp_dequeue_script('wc-cart-fragments');
    wp_dequeue_script('wc-cart-fragments');
  }
}
add_action('wp_enqueue_scripts', 'teachdigital_disable_woocommerce_scripts', 99);


function cleanup_default_rewrite_rules($rules)
{
  foreach ($rules as $regex => $query) {
    if (strpos($regex, 'attachment') || strpos($query, 'attachment')) {
      unset($rules[$regex]);
    }
  }

  return $rules;
}
add_filter('rewrite_rules_array', 'cleanup_default_rewrite_rules');
