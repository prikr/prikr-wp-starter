<?php

/**
 * Project: prikr
 * File: header.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

?>

<!DOCTYPE html>
<!-- Designed & Developed with ♥ and ☕ by prikr. -->

<html <?php language_attributes(); ?>>

<?php 
global $wp;
$current_url = home_url($wp->request);
$args = wp_parse_args(
  $args,
  array(
    'body'          => array(
      'bodyClass'       =>  '',
    )
  )
);
$body        =   $args['body'];
?>

<head> 
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="author" content="Prikr <jasper@prikr.io>">
  <meta name="copyright" content="<?php bloginfo('name'); ?>">
  <meta name="language" content="NL">
  <meta name="url" content="<?php echo $current_url; ?>">
  <meta name="identifier-URL" content="<?php echo $current_url; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="theme-color" content="#fff">
  <?php echo prikr_critical_css(); ?>
  <title>
    <?php
    if (function_exists('is_tag') && is_tag()) {
      echo 'Overzicht van tag: &quot;' . $tag . '&quot; - ';
    } elseif (is_archive()) {
      echo ' Overzicht van ';
      wp_title('');
      echo ' - ';
    } elseif (is_search()) {
      echo 'Zoekresultaten voor &quot;' . esc_html($s) . '&quot; - ';
    } elseif (is_front_page()) {
      echo get_bloginfo('name') . ' - ' . get_bloginfo('description');

    } elseif (!(is_404()) && (is_single()) || (is_page() || is_singular())) {      
      wp_title('');
      echo ' - ';
    } elseif (is_404()) {
      echo 'Niet gevonden - ';
    } elseif (is_home()) {
      echo 'Blog overzicht - ';
    }
    if (!is_front_page()) {
      bloginfo('name');
    }
    ?>
  </title>
  <?php wp_head(); ?>

</head>
<body>
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TSNBF8" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <nav class="nav">

    
<script>
  <?php echo (!empty(get_field('google_tag_manager_id', 'algemeen'))) ? 'window.gtmid = "' . get_field('google_tag_manager_id', 'algemeen') . '";' : ''; ?>
  <?php echo (!empty(get_field('google_analytics_id', 'algemeen'))) ? 'window.ga3id = "' . get_field('google_analytics_id', 'algemeen') . '";' : ''; ?>
  <?php echo (!empty(get_field('google_analytics_id_four', 'algemeen'))) ? 'window.ga4id = "' . get_field('google_analytics_id_four', 'algemeen') . '";' : ''; ?>
  <?php echo (!empty(get_field('conform_avg', 'algemeen'))) ? 'window.avg = ' . get_field('conform_avg', 'algemeen') . ';' : ''; ?>
  <?php echo (!empty(get_field('preload_ga', 'algemeen'))) ? 'window.preload_ga = ' . get_field('preload_ga', 'algemeen') . ';' : ''; ?>
  <?php echo 'window.currenturl = "' . $current_url . '";'; ?> 
</script>


</head>
<body class="<?php echo $body['bodyClass']; ?>" >
  <section id="__prikr">

  <?php get_template_part('content/content', 'header'); ?>