<?php
/*
 *  Author: Jasper van Doorn
 *  Widget functions
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function prikr_widgets_init() {
  
  // Footer column left
  register_sidebar(
    array(
      'name'          => __( 'Footer first column', 'prikr' ),
      'id'            => 'footer-1',
      'description'   => __( 'Widgets in deze column zijn te zien in de footer, in het eerste kolom.', 'prikr' ),
      'before_widget' => '<div class="footer__top__column__widget"><div class="footer__top__column__widget__wrapper">',
      'after_widget'  => '</div></div>',
      'before_title'  => '<h4 class="footer__top__column__widget__title">',
      'after_title'   => '</h4>',
    )
  );

  // Footer column middle
  register_sidebar(
    array(
      'name'          => __( 'Footer second column', 'prikr' ),
      'id'            => 'footer-2',
      'description'   => __( 'Widgets in deze column zijn te zien in de footer, in het tweede kolom.', 'prikr' ),
      'before_widget' => '<div class="footer__top__column__widget"><div class="footer__top__column__widget__wrapper">',
      'after_widget'  => '</div></div>',
      'before_title'  => '<h4 class="footer__top__column__widget__title">',
      'after_title'   => '</h4>',
    )
  );

  // Footer column right
  register_sidebar(
    array(
      'name'          => __( 'Footer third column', 'prikr' ),
      'id'            => 'footer-3',
      'description'   => __( 'Widgets in deze column zijn te zien in de footer, in het derde kolom.', 'prikr' ),
      'before_widget' => '<div class="footer__top__column__widget"><div class="footer__top__column__widget__wrapper">',
      'after_widget'  => '</div></div>',
      'before_title'  => '<h4 class="footer__top__column__widget__title">',
      'after_title'   => '</h4>',
    )
  );

  // Footer column right
  register_sidebar(
    array(
      'name'          => __( 'Footer fourth column', 'prikr' ),
      'id'            => 'footer-4',
      'description'   => __( 'Widgets in deze column zijn te zien in de footer, in het vierde kolom.', 'prikr' ),
      'before_widget' => '<div class="footer__top__column__widget"><div class="footer__top__column__widget__wrapper">',
      'after_widget'  => '</div></div>',
      'before_title'  => '<h4 class="footer__top__column__widget__title">',
      'after_title'   => '</h4>',
    )
  );
}
add_action( 'widgets_init', 'prikr_widgets_init' );