<?php

/**
 * Project: mvr
 * File: content-logo.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

?>

<section class="logo">
  <a href="/">
    <?php
    $acfimage = get_field('header_logo', 'header');
    if ($acfimage) :
      $image = wp_get_attachment($acfimage['id'], 'full');
      if ($image !== false) :
        echo '<img alt="' . $image['alt'] . '" data-src="' . $image['src'] . '" title="' . $image['title'] . '" width="100%" height="auto" />';
      endif;
    endif;
    ?>
  </a>
</section>