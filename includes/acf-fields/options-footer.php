<?php

/**
 * Project: prikr
 * File: options-footer.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

  if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(array(
      'key' => 'group_60adfa53895c3',
      'title' => 'Footer instellingen',
      'fields' => array(
        array(
          'key' => 'field_60adfa5f6a397',
          'label' => 'Bellen voor afspraak tekst',
          'name' => 'footer_call_cta',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Bel naar 0570 - 26 60 09 voor een vrijblijvende afspraak',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_60adfa756a398',
          'label' => 'Bereikbaarheid tekst',
          'name' => 'footer_call_openings',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Wij zijn bereikbaar van 09:00 tot 17:30, ook op zaterdag.',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_60adfa8b6a399',
          'label' => 'Terugbelverzoek tekst',
          'name' => 'footer_callback_cta',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Of, laat ons u terugbellen.',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_60adfabf6a39b',
          'label' => 'Terugbelverzoek subtitel',
          'name' => 'footer_callback_subcta',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Wij gaan veilig om met uw gegevens',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_60adfad56a39c',
          'label' => 'Terugbelverzoek content',
          'name' => 'footer_callback_content',
          'type' => 'textarea',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => 'Vul uw naam en telefoonnummer in, in de invoervelden hieronder. Vervolgens klik je op verzenden en wij bellen u nog binnen 24 uur terug.',
          'placeholder' => '',
          'maxlength' => '',
          'rows' => '',
          'new_lines' => '',
          'acfe_textarea_code' => 0,
        ),
        array(
          'key' => 'field_60adfae36a39d',
          'label' => 'Contactformulier',
          'name' => 'footer_callback_form',
          'type' => 'post_object',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
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
      ),
      'location' => array(
        array(
          array(
            'param' => 'options_page',
            'operator' => '==',
            'value' => 'footer',
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
      'acfe_display_title' => 'Footer content',
      'acfe_autosync' => '',
      'acfe_form' => 0,
      'acfe_meta' => '',
      'acfe_note' => '',
    ));

  endif;

  if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(array(
      'key' => 'group_60ae18f137178',
      'title' => 'Footer gallerij',
      'fields' => array(
        array(
          'key' => 'field_60ae18f96b7e7',
          'label' => 'Footer afbeeldingen',
          'name' => 'footer_galery',
          'type' => 'gallery',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'array',
          'preview_size' => 'medium',
          'insert' => 'append',
          'library' => 'all',
          'min' => '',
          'max' => '',
          'min_width' => '',
          'min_height' => '',
          'min_size' => '',
          'max_width' => '',
          'max_height' => '',
          'max_size' => '',
          'mime_types' => '',
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'options_page',
            'operator' => '==',
            'value' => 'footer',
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
