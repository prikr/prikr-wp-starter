<?php

/**
 * Project: mvr
 * File: content-header.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

?>

<header class="header">

  <?php get_template_part('content/content', 'topbar'); ?>

  <section name="navigation" class="header__navigation">
    <div class="container-fluid">

      <div class="row d-flex flex-row align-items-center">

        <div class="col-9 col-sm-5 col-lg-3">
          <?php get_template_part('content/content', 'logo'); ?>
        </div>

        <div class="col-3 col-sm-7 col-lg-9 d-flex justify-content-end js-nav">
          <?php get_template_part('content/content', 'navigation'); ?>
        </div>
      </div>


    </div>
  </section>

</header>