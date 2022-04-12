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
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="author" content="Prikr <jasper@prikr.io>">
  <meta name="copyright" content="<?php bloginfo('name'); ?>">
  <meta name="url" content="<?php echo $current_url; ?>">
  <meta name="identifier-URL" content="<?php echo $current_url; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php
  echo prikr_critical_css();

  $environment = new Environment;
  $current_theme = $environment->get_current_theme();
  
  if ($environment->is_localhost()) { ?>
    <link rel="preload" href="<?php echo 'http://www.' . $current_theme['name'] . '.local' . '/wp-content/themes/unw/dist/fonts/DM_Sans-normal-400.woff'; ?>" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="<?php echo 'http://www.' . $current_theme['name'] . '.local' . '/wp-content/themes/unw/dist/fonts/DM_Sans-normal-700.woff'; ?>" as="font" type="font/woff" crossorigin>
    <?php } else { ?>
      <link rel="preload" href="<?php echo MY_THEME_DIR_URI . 'dist/fonts/DM_Sans-normal-400.woff'; ?>" as="font" type="font/woff" crossorigin>
      <link rel="preload" href="<?php echo MY_THEME_DIR_URI . 'dist/fonts/DM_Sans-normal-700.woff'; ?>" as="font" type="font/woff" crossorigin>
      <?php }
      
  wp_head();
  ?>
    <script>
    <?php echo (!empty(get_field('google_tag_manager_id', 'default'))) ? 'window.gtmid = "' . get_field('google_tag_manager_id', 'default') . '";' : ''; ?>
    <?php echo (!empty(get_field('google_analytics_id', 'default'))) ? 'window.ga3id = "' . get_field('google_analytics_id', 'default') . '";' : ''; ?>
    <?php echo (!empty(get_field('google_analytics_id_four', 'default'))) ? 'window.ga4id = "' . get_field('google_analytics_id_four', 'default') . '";' : ''; ?>
    <?php echo (!empty(get_field('conform_avg', 'default'))) ? 'window.avg = ' . get_field('conform_avg', 'default') . ';' : ''; ?>
    <?php echo (!empty(get_field('preload_ga', 'default'))) ? 'window.preload_ga = ' . get_field('preload_ga', 'default') . ';' : ''; ?>
    <?php if ($environment->get_current_mode() !== 'localhost') : ?>
    <?php endif; ?>
    <?php echo 'window.currenturl = "' . $current_url . '";'; ?>
    <?php echo ($environment->get_current_mode() === 'localhost') ? 'window.mode = "development";' : 'window.mode = "' . $environment->get_current_mode() . '";'; ?>
    <?php
    echo 'window.currenttheme = "' . $current_theme['name'] . '";';
    ?>
  </script>

  <?php if ( get_field('preload_ga', 'default') === true ) : ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo get_field('google_analytics_id', 'default'); ?>"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo get_field('google_analytics_id_four', 'default'); ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', '<?php echo get_field('google_analytics_id', 'default'); ?>');
      gtag('config', '<?php echo get_field('google_analytics_id_four', 'default'); ?>');
    </script>
  <?php endif; ?>
</head>
<body class="<?php echo $body['bodyClass']; ?> <?php echo $current_theme['name']; ?>">
  <?php echo (!empty(get_field('google_tag_manager_id', 'default'))) ? '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=' . get_field('google_tag_manager_id', 'default') . '" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>' : ''; ?>

      <section id="__prikr">

        <?php get_template_part('content/content', 'header'); ?>