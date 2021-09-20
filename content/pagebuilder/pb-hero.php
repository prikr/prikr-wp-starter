<?php

/**
 * Project: mvr
 * File: pb-hero.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly
global $post;
?>

<section name="hero" class="hero">
  <div class="hero__background" style="<?php echo 'height: ' . get_sub_field('min_height') . 'px !important;'; ?>">

<div class="background background-desktop d-none d-lg-block">
    <?php
      $acfimage = get_sub_field('desktop_afbeelding');
      if ($acfimage) :
        $image = wp_get_attachment($acfimage['id'], 'full');
        if ($image !== false) :
          echo '<img alt="' . $image['alt'] . '" src="' . $image['src'] . '" title="' . $image['title'] . '" width="100%" height="auto" />';
        endif;
      endif;
    ?>
    </div>

    <div class="background background-mobile d-block d-lg-none">
    <?php
      $acfimage = get_sub_field('mobiel_afbeelding');
      if ($acfimage) :
        $image = wp_get_attachment($acfimage['id'], 'full');
        if ($image !== false) :
          echo '<img alt="' . $image['alt'] . '" src="' . $image['src'] . '" title="' . $image['title'] . '" width="100%" height="auto" />';
        endif;
      endif;
    ?>
    </div>
    </div>

  <div class="hero__wrapper">
    <div class="container hero__title">
      <div class="row d-flex flex-row align-items-center justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8 p-5 bg-white">
          <?php echo get_sub_field('heading_tekst'); ?>
        </div>
      </div>
    </div>
  </div>

 
</section>