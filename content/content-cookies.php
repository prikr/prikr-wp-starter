<?php

/**
 * Project: mvr
 * File: content-cookies.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>

<div class="cookieconsent" id="cookie_consent" style="transform: translateY(300px)">
  <div class="cookieconsent__wrapper">

    <div class="container-fluid px-0">
      <div class="row">
        <div class="col-12 d-flex align-items-start d-flex flex-column">
          <span class="h3 text-primary mb-3"><?php echo __( 'Cookie talk', 'prikr' ); ?></span>
          <p class="text mb-5"><?php echo get_field('cookieconsent_content', 'algemeen'); ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-12 d-flex justify-content-center justify-content-sm-start">
          <?php if (get_field('conform_avg', 'algemeen') === 'false') : ?>
            <a href="/cookie-policy" class="btn btn-link text-primary text-decoration-none fw-bold me-4">Cookie policy</a>
            <button id="acceptCookies" class="btn btn-secondary cookieBar me-2 me-lg-4" data-accept="true"><?php echo __( 'Begrepen', 'prikr' ); ?></button>
          <?php else : ?>
            <a href="/cookie-policy" class="btn btn-link text-primary text-decoration-none fw-bold me-4">Cookie policy</a>
            <button id="declineCookies" class="btn btn-gray-outline text-decoration-none me-4 cookieBar" data-accept="false"><?php echo __( 'Weigeren', 'prikr' ); ?></button>
            <button id="acceptCookies" class="btn btn-primary cookieBar" data-accept="true"><?php echo __( 'Accepteren', 'prikr' ); ?></button>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>