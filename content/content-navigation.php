<?php

/**
 * Project: mvr
 * File: content-navigation.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

$button = get_field('header_default_cta', 'header'); 

?>

<div class="navigation d-flex flex-row align-items-center">

  <div class="hamburger__wrapper d-flex flex-column align-items-center d-lg-none">
    <div class="hamburger hamburger--spin d-flex align-items-center" tabindex="0" aria-label="Menu" role="button" aria-controls="navigation">
      <div class="hamburger-box">
        <div class="hamburger-inner"></div>
      </div>
    </div>
  </div>
  <div class="hamburger__backbutton back-button d-flex flex-row align-items-baseline">
    <svg xmlns="http://www.w3.org/2000/svg" width="11.22" height="10.936" viewBox="0 0 11.22 10.936">
      <path id="Icon_awesome-arrow-right" data-name="Icon awesome-arrow-right" d="M4.77,3.38l.556-.556a.6.6,0,0,1,.849,0l4.868,4.866a.6.6,0,0,1,0,.849L6.175,13.406a.6.6,0,0,1-.849,0L4.77,12.85a.6.6,0,0,1,.01-.859L7.8,9.117H.6a.6.6,0,0,1-.6-.6v-.8a.6.6,0,0,1,.6-.6H7.8L4.78,4.239A.6.6,0,0,1,4.77,3.38Z" transform="translate(11.22 13.583) rotate(180)" fill="#5c2483"/>
    </svg>
    <span class="fw-bold ps-2 text-primary">Terug</span>
  </div>




  <nav name="nav" class="navwrapper">
    <?php
    if (has_nav_menu('primary')) :
      wp_nav_menu(array(
        'menu'              => "primary",
        'container_class'   => 'nav__container',
        'menu_class'        => 'nav__menu d-flex flex-column flex-lg-row list-unstyled mb-0',
        'add_a_class'       => 'nav__anchor text-purple',
        'depth'             => 3,
        'fallback_cb'       => false,
        'container'         => "ul",
        'theme_location'    => "primary",
      ));
    endif;

    if (has_nav_menu('topbar')) :
      wp_nav_menu(array(
        'menu'              => "topbar",
        'container_class'   => 'topbar',
        'menu_class'        => 'topbar__menu d-flex flex-column d-lg-none list-unstyled margin-bottom-0 margin-top-48 py-2',
        'add_a_class'       => 'text-decoration-none small text-gray pe-3 py-2 fw-normal',
        'add_li_class'      => 'border-0',
        'depth'             => 1,
        'fallback_cb'       => false,
        'container'         => "ul",
        'theme_location'    => "topbar",
      ));
    endif;


    if ($button['title']) : ?>
      <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="btn btn-primary"><?php echo $button['title']; ?></a>
    <?php endif; ?>
  </nav>
</div>
