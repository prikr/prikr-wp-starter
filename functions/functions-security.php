<?php

/**
 * Project: ekh
 * File: functions-security.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Disable file dit
 */
define('DISALLOW_FILE_EDIT', true);

/**
 * Remove X-Pingback
 */
function prikr_remove_x_pingback($headers)
{
  unset($headers['X-Pingback']);
  return $headers;
}
add_filter('wp_headers', 'prikr_remove_x_pingback');

/**
 * Disable XMLRPC Class
 */
add_filter('wp_xmlrpc_server_class', '__return_false');
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Disable RSS Feed
 */
function prikr_disable_feed()
{
  wp_die(__('No feed available, please visit our <a href="' . get_bloginfo('url') . '">website</a>!'));
}
add_action('do_feed', 'prikr_disable_feed', 1);
add_action('do_feed_rdf', 'prikr_disable_feed', 1);
add_action('do_feed_rss', 'prikr_disable_feed', 1);
add_action('do_feed_rss2', 'prikr_disable_feed', 1);
add_action('do_feed_atom', 'prikr_disable_feed', 1);
add_action('do_feed_rss2_comments', 'prikr_disable_feed', 1);
add_action('do_feed_atom_comments', 'prikr_disable_feed', 1);

/**
 * Remove RSS Feed from <head></head>
 */
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);

/**
 * Disable JSON API
 */
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

/**
 * Remove REST API link from <head></head>
 */
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

/**
 * Remove Script and Styles version queries
 */
function prikr_remove_script_version($src)
{
  return remove_query_arg('ver', $src);
}
add_filter('script_loader_src', 'prikr_remove_script_version');
add_filter('style_loader_src', 'prikr_remove_script_version');

/**
 * Remove Manifest URL from <head></head>
 */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

/**
 * Disable emojicons
 */
function prikr_disable_wp_emojicons()
{
  // all actions related to emojis
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
}
add_action('init', 'prikr_disable_wp_emojicons');

/**
 * Remove Block style (if using Classic Editor)
 */
function prikr_remove_wp_block_library_css()
{
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
  wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'prikr_remove_wp_block_library_css', 100);

/**
 * Remove unwanted scripts and styles
 */
function prikr_remove_unwanted_scriptsandstyles()
{
  wp_deregister_script('wp-embed');
  wp_deregister_script('jquery');
}
add_action('wp_enqueue_scripts', 'prikr_remove_unwanted_scriptsandstyles', 100);

/**
 * Hide Admin bar on frontend
 */
// add_filter('show_admin_bar', '__return_false');

/**
 * Remove WP Generator meta tag in <head></head>
 */
remove_action('wp_head', 'wp_generator');

/**
 * Change log location
 */
if (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
  ini_set('error_log', MY_THEME_DIR . '/debug.txt');
}

/**
 * Add DNS Prefetch
 */
function prikr_dns_prefetch()
{
  echo '<meta https-equiv="x-dns-prefetch-control" content="on"> 
        <link rel="dns-prefetch" href="//fonts.googleapis.com" />
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        ';
}
add_action('wp_head', 'prikr_dns_prefetch', 0);

/** 
 * Remove WordPress resource hints prefetch
 */
add_action( 'init', 'remove_dns_prefetch' );
function  remove_dns_prefetch () {
   remove_action( 'wp_head', 'wp_resource_hints', 2, 99 );
}