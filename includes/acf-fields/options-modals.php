<?php

/**
 * Project: prikr
 * File: options-modals.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly


if (function_exists('acf_add_local_field_group')) :

  acf_add_local_field_group(array(
    'key' => 'group_6141d3ea7e550',
    'title' => 'Modals',
    'fields' => array(
      array(
        'key' => 'field_6141d3ef0ec7b',
        'label' => 'Modal titel',
        'name' => 'titel',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'wpml_cf_preferences' => 0,
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_6141d3f60ec7c',
        'label' => 'Modal tekst',
        'name' => 'modal_content',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'wpml_cf_preferences' => 0,
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 1,
        'delay' => 0,
      ),
      array(
        'key' => 'field_6141dae15ec03',
        'label' => 'Knop of formulier',
        'name' => 'knop_of_formulier',
        'type' => 'radio',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'choices' => array(
          'form' => 'Formulier',
          'btn' => 'Knop',
        ),
        'allow_null' => 0,
        'other_choice' => 0,
        'default_value' => '',
        'layout' => 'vertical',
        'return_format' => 'value',
        'wpml_cf_preferences' => 0,
        'save_other_choice' => 0,
      ),
      array(
        'key' => 'field_6141d40a0ec7e',
        'label' => 'Modal formulier',
        'name' => 'formulier',
        'type' => 'post_object',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_6141dae15ec03',
              'operator' => '==',
              'value' => 'form',
            ),
          ),
        ),
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'wpml_cf_preferences' => 0,
        'post_type' => array(
          0 => 'wpcf7_contact_form',
        ),
        'taxonomy' => '',
        'allow_null' => 0,
        'multiple' => 0,
        'return_format' => 'object',
        'save_custom' => 0,
        'save_post_status' => 'publish',
        'acfe_bidirectional' => array(
          'acfe_bidirectional_enabled' => '0',
        ),
        'ui' => 1,
      ),
      array(
        'key' => 'field_6141dad85ec02',
        'label' => 'Knop',
        'name' => 'modal_knop',
        'type' => 'acfe_advanced_link',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
          array(
            array(
              'field' => 'field_6141dae15ec03',
              'operator' => '==',
              'value' => 'btn',
            ),
          ),
        ),
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'post_type' => '',
        'taxonomy' => '',
        'wpml_cf_preferences' => 0,
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'modals',
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
    'acfe_display_title' => '',
    'acfe_autosync' => '',
    'acfe_form' => 0,
    'acfe_meta' => '',
    'acfe_note' => '',
  ));

endif;
