<?php
/*
 *  Author: Jasper van Doorn
 *  Header options page
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_6051ba5b53be0',
    'title' => 'Opties | Header | Default',
    'fields' => array(
      array(
        'key' => 'field_6051bc0a6d2e2',
        'label' => 'Logo',
        'name' => 'header_logo',
        'type' => 'image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'uploader' => 'wp',
        'acfe_thumbnail' => 0,
        'return_format' => 'array',
        'preview_size' => 'medium',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
        'default_value' => 1614245732,
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'header',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'left',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'acfe_display_title' => 'Algemene header instellingen',
    'acfe_autosync' => array(
      0 => 'json',
    ),
    'acfe_form' => 0,
    'acfe_meta' => '',
    'acfe_note' => '',
    'modified' => 1621235012,
  ));
  
  endif;