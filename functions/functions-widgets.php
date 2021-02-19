<?php
/*
 *  Author: Jasper van Doorn
 *  Widget functions
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function teachdigital_widgets_init() {
  
  // Footer column left
  register_sidebar(
    array(
      'name'          => __( 'Footer first column', 'teachdigital' ),
      'id'            => 'footer-1',
      'description'   => __( 'Widgets in deze column zijn te zien in de footer, in het eerste kolom.', 'teachdigital' ),
      'before_widget' => '<div class="footer__top__column__widget"><div class="footer__top__column__widget__wrapper">',
      'after_widget'  => '</div></div>',
      'before_title'  => '<h4 class="footer__top__column__widget__title">',
      'after_title'   => '</h4>',
    )
  );

  // Footer column middle
  register_sidebar(
    array(
      'name'          => __( 'Footer second column', 'teachdigital' ),
      'id'            => 'footer-2',
      'description'   => __( 'Widgets in deze column zijn te zien in de footer, in het tweede kolom.', 'teachdigital' ),
      'before_widget' => '<div class="footer__top__column__widget"><div class="footer__top__column__widget__wrapper">',
      'after_widget'  => '</div></div>',
      'before_title'  => '<h4 class="footer__top__column__widget__title">',
      'after_title'   => '</h4>',
    )
  );

  // Footer column right
  register_sidebar(
    array(
      'name'          => __( 'Footer third column', 'teachdigital' ),
      'id'            => 'footer-3',
      'description'   => __( 'Widgets in deze column zijn te zien in de footer, in het derde kolom.', 'teachdigital' ),
      'before_widget' => '<div class="footer__top__column__widget"><div class="footer__top__column__widget__wrapper">',
      'after_widget'  => '</div></div>',
      'before_title'  => '<h4 class="footer__top__column__widget__title">',
      'after_title'   => '</h4>',
    )
  );

  // Footer column right
  register_sidebar(
    array(
      'name'          => __( 'Footer fourth column', 'teachdigital' ),
      'id'            => 'footer-4',
      'description'   => __( 'Widgets in deze column zijn te zien in de footer, in het vierde kolom.', 'teachdigital' ),
      'before_widget' => '<div class="footer__top__column__widget"><div class="footer__top__column__widget__wrapper">',
      'after_widget'  => '</div></div>',
      'before_title'  => '<h4 class="footer__top__column__widget__title">',
      'after_title'   => '</h4>',
    )
  );
}
add_action( 'widgets_init', 'teachdigital_widgets_init' );