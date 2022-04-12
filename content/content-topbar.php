<?php

/**
 * Project: prikr
 * File: content-topbar.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>

<section name="top" class="header__top d-none d-lg-block">

  <div class="container-fluid">

    <div class="row align-items-center">

      <div class="col-12 d-flex align-items-center justify-content-end">

        <nav name="topnav" class="d-flex flex-row">
          <?php
          if (has_nav_menu('topbar')) :
            wp_nav_menu(array(
              'menu'              => "topbar",
              'container_class'   => 'topbar',
              'menu_class'        => 'topbar__menu d-flex flex-lg-row list-unstyled margin-bottom-0',
              'add_a_class'       => 'text-decoration-none text-purple pe-3',
              'depth'             => 1,
              'fallback_cb'       => false,
              'container'         => "ul",
              'theme_location'    => "topbar",
            ));
          endif;
          ?>

        </nav>

      </div>

    </div>

  </div>

</section>