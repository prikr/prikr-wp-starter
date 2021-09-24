<?php

/**
 * Project: mvr
 * File: pb-hero.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
global $post;
$wrapperbgcolor = '';
if (!empty(get_sub_field('heading_tekst_achtergrond_kleur'))) :
  $wrapperbgcolor = get_sub_field('heading_tekst_achtergrond_kleur');
endif;
$bgcolor = '';
if (!empty(get_sub_field('fallback_achtergrond_kleur'))) :
  $bgcolor = get_sub_field('fallback_achtergrond_kleur');
endif;
?>

<style>
  .hero__background,
  .image-col {
    height: <?php echo intval(get_sub_field('min_height')) * 0.50; ?>px !important;
  }

  .hero__header__text__bg {
    background-size: cover;
    background-repeat: no-repeat;
    background-position-y: 100%;
    background-position-x: 50%;
  }

  .hero__content {
    z-index: 1;
    text-align: center;
  }

  @media screen and (min-width: 992px) {
    .hero__content {
      text-align: left;
    }

    .hero__background,
    .hero__header__text,
    .image-col {
      height: <?php echo intval(get_sub_field('min_height')); ?>px !important;
    }

    .hero__header__text__bg {
      background-size: cover;
      background-position-x: 50%;
      background-size: cover;
      background-position-y: 10%;
    }
  }
</style>

<section name="hero" class="hero" <?php echo ($wrapperbgcolor !== '' ? 'style="background-color: ' . $wrapperbgcolor . '"' : ''); ?>>

  <?php if (get_sub_field('tekst_in_header_tonen')) : ?>
    <div class="hero__content position-relative">

      <div class="hero__header__text" <?php echo ($bgcolor !== '' ? 'style="background-color: ' . $bgcolor . '"' : ''); ?>>
        <div class="container-fluid hero__header__text">
          <div class="row h-100">
            <div class="col-12 col-lg-6 order-1 order-lg-0 padding-32 padding-lg-100 padding-bottom-160 padding-bottom-lg-200">
              <?php echo get_sub_field('tekst_in_header'); ?>
            </div>
            <div class="col-12 col-lg-6 d-block d-md-none d-lg-block order-0 order-lg-1 image-col">
              <?php
              $acfimage = get_sub_field('afbeelding_naast_tekst_in_header');
              if ($acfimage) :
                $image = wp_get_attachment($acfimage['id'], 'full');
                if ($image !== false) : ?>
                  <div class="position-relative h-100 hero__header__text__bg" style="background-image: url( '<?php echo $image['src']; ?>' );">

                    <?php echo '<img alt="' . $image['alt'] . '" class="d-none" src="' . $image['src'] . '" title="' . $image['title'] . '" width="auto" height="' . intval(get_sub_field('min_height')) . '" />'; ?>

                  </div>
              <?php endif;
              endif;
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php else :

    $acfimage = get_sub_field('desktop_afbeelding');
    if ($acfimage) :
    ?>
      <div class="hero__background">
        <div class="background background-desktop d-none d-lg-block">
          <?php

          $image = wp_get_attachment($acfimage['id'], 'full');
          if ($image !== false) :
            echo '<img alt="' . $image['alt'] . '" src="' . $image['src'] . '" title="' . $image['title'] . '" width="100%" height="auto" />';
          endif;
          ?>
        </div>

      <?php
    else :
      ?>
      <div class="hero__background__replacer">

      </div>
      <?php
      endif;
      ?>

      <?php $acfimage = get_sub_field('mobiel_afbeelding');
      if ($acfimage) : ?>
        <div class="background background-mobile d-block d-lg-none">
          <?php
          $image = wp_get_attachment($acfimage['id'], 'full');
          if ($image !== false) :
            echo '<img alt="' . $image['alt'] . '" src="' . $image['src'] . '" title="' . $image['title'] . '" width="100%" height="auto" />';
          endif;
          ?>
        </div>
      </div>
    <?php
      endif;
    ?>
  <?php endif; ?>



  <div class="hero__wrapper<?php echo (get_sub_field('titelvak_door_header_heen') === true ? ' hero__wrapper__margin padding-left-32 padding-right-32 padding-left-lg-0 padding-right-lg-0' : ''); ?>">
    <div class="container hero__title">
      <div class="row d-flex flex-row align-items-center justify-content-center">
        <div class="col-12 <?php echo (get_sub_field('titelvak_door_header_heen') === true ? ' col-lg-10 col-xl-8 padding-16 padding-lg-48' : ''); ?> <?php echo ($wrapperbgcolor === '' ? 'bg-white' : ''); ?>" <?php echo ($wrapperbgcolor !== '' ? 'style="background-color: ' . $wrapperbgcolor . '"' : ''); ?>>
          <?php echo get_sub_field('heading_tekst'); ?>
        </div>
      </div>
    </div>
  </div>


</section>