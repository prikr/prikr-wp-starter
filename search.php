<?php

/**
 * Project: mvr
 * File: search.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

global $post;
if ($post === NULL) :
  if (!empty($_GET)) :
    $post = get_post($_GET['ID']);
  endif;
endif;

/**
 * Generate settings
 */
$settings = array(
  // Body settings
  'bodyClass'          =>    esc_attr(implode(' ', get_body_class('default-page'))),
  'mainClass'          =>    'main',

  // Default settings
  'isSingle'           => (is_single() || is_singular() ? true : false),
);

if (is_front_page()) :
  $settings['bodyClass']          = esc_attr(implode(' ', get_body_class('front-page')));
endif;

get_header(true, array(
  'body'   => array(
    'bodyClass'           =>    $settings['bodyClass'],
    'mainClass'           =>    $settings['mainClass']
  )
));

get_template_part('content/content', 'pagebuilder');

get_footer(true, array(
  'background'    =>    'gray'
));

