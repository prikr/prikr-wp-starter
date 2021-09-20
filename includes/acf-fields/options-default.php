<?php
/*
 *  Author: Jasper van Doorn
 *  Default options page
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (function_exists('acf_add_local_field_group')) :

  acf_add_local_field_group(array(
    'key' => 'group_6064787405bc4',
    'title' => 'Opties | Algemeen | 404 pagina',
    'fields' => array(
      array(
        'key' => 'field_60647902b9a18',
        'label' => 'Subtitel',
        'name' => 'notfound_subtitle',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_60647977b9a19',
        'label' => 'Titel',
        'name' => 'notfound_title',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_6064797eb9a1a',
        'label' => 'Undertitle',
        'name' => 'notfound_undertitle',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => '',
        'new_lines' => '',
        'acfe_textarea_code' => 0,
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'content_sections',
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
    'acfe_display_title' => '404 pagina',
    'acfe_autosync' => array(
      0 => 'json',
    ),
    'acfe_form' => 0,
    'acfe_meta' => '',
    'acfe_note' => '',
    'modified' => 1617197479,
  ));

endif;

if (function_exists('acf_add_local_field_group')) :

  acf_add_local_field_group(array(
    'key' => 'group_6051d3952beda',
    'title' => 'Opties | Algemeen | Cookie consent',
    'fields' => array(
      array(
        'key' => 'field_6051d3a7923df',
        'label' => 'Content',
        'name' => 'cookieconsent_content',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => 'Deze website maakt gebruikt van cookies!',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => '',
        'new_lines' => '',
        'wpml_cf_preferences' => 2,
        'acfe_textarea_code' => 0,
      ),
      array(
        'key' => 'field_610c469664007',
        'label' => 'Cookiebeleid',
        'name' => 'cookiebeleid',
        'type' => 'post_object',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'wpml_cf_preferences' => 2,
        'hide_admin' => 0,
        'post_type' => array(
          0 => 'page',
          1 => 'attachment',
        ),
        'taxonomy' => '',
        'allow_null' => 0,
        'multiple' => 0,
        'return_format' => 'object',
        'wpml_cf_preferences' => 0,
        'save_custom' => 0,
        'save_post_status' => 'publish',
        'acfe_bidirectional' => array(
          'acfe_bidirectional_enabled' => '0',
        ),
        'ui' => 1,
      ),
      array(
        'key' => 'field_610c46b864008',
        'label' => 'Privacybeleid',
        'name' => 'privacybeleid',
        'type' => 'post_object',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'wpml_cf_preferences' => 2,
        'hide_admin' => 0,
        'post_type' => array(
          0 => 'page',
          1 => 'attachment',
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
        'key' => 'field_610c46c364009',
        'label' => 'Algemene voorwaarden',
        'name' => 'algemene_voorwaarden',
        'type' => 'post_object',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'wpml_cf_preferences' => 2,
        'hide_admin' => 0,
        'post_type' => array(
          0 => 'page',
          1 => 'attachment',
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
          'value' => 'algemeen',
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
    'acfe_display_title' => 'Cookie consent',
    'acfe_autosync' => array(
      0 => 'json',
    ),
    'acfe_form' => 0,
    'acfe_meta' => '',
    'acfe_note' => '',
    'modified' => 1615975450,
  ));

endif;

if (function_exists('acf_add_local_field_group')) :

  acf_add_local_field_group(array(
    'key' => 'group_6051d31ae7885',
    'title' => 'Opties | Algemeen | Tracking',
    'fields' => array(
      array(
        'key' => 'field_60d3006ae49fd',
        'label' => 'Algemene verordering gegevensbescherming (AVG) toepassen',
        'name' => 'conform_avg',
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
          'true' => 'Toepassen, dus Google Tag Manager pas inladen zodra cookie policy is geaccepteerd',
          'false' => 'Niet toepassen, dus Google Tag Manager direct inladen',
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
        'key' => 'field_60d3006ae4955',
        'label' => 'Preload van Google Analytics',
        'name' => 'preload_ga',
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
          'true' => 'Preload GA, dus als Google Tag Manager ingeladen wordt na acceptatie van de cookie policy, kan dat zorgen voor dubbele pageviews (als GA ook is ingesteld via GTM)',
          'false' => 'No preload GA, dus als Google Tag Manager niet is ingeladen, dan kan het zijn dat er géén pageview wordt doorgestuurd.',
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
        'key' => 'field_6051d3263dfa7',
        'label' => 'Google Tag Manager ID',
        'name' => 'google_tag_manager_id',
        'type' => 'text',
        'instructions' => 'Als dit veld niet wordt ingevoerd, zal GTM niet worden geïnitialiseerd.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => 'GTM-XXXXXXX',
        'prepend' => '',
        'append' => '',
        'wpml_cf_preferences' => 0,
        'maxlength' => '',
      ),
      array(
        'key' => 'field_6051d3603dfa8',
        'label' => 'Google Analytics 3',
        'name' => 'google_analytics_id',
        'type' => 'text',
        'instructions' => 'Als dit veld niet wordt ingevoerd, zal GA3 niet worden geïnitialiseerd.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => 'UA-XXXXXX-X',
        'prepend' => '',
        'append' => '',
        'wpml_cf_preferences' => 0,
        'maxlength' => '',
      ),
      array(
        'key' => 'field_6051d3603dfb9',
        'label' => 'Google Analytics 4',
        'name' => 'google_analytics_id_four',
        'type' => 'text',
        'instructions' => 'Als dit veld niet wordt ingevoerd, zal GA4 niet worden geïnitialiseerd.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => 'G-XXXXXXXXXX',
        'prepend' => '',
        'append' => '',
        'wpml_cf_preferences' => 0,
        'maxlength' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'algemeen',
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
    'acfe_display_title' => 'Tracking scripts',
    'acfe_autosync' => array(
      0 => 'json',
    ),
    'acfe_form' => 0,
    'acfe_meta' => '',
    'acfe_note' => '',
    'modified' => 1615975600,
  ));

endif;

if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_61487f4833ccc',
    'title' => 'Social Media kanalen',
    'fields' => array(
      array(
        'key' => 'field_61487f4d836af',
        'label' => 'Kanalen',
        'name' => 'kanalen',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'acfe_repeater_stylised_button' => 0,
        'collapsed' => '',
        'min' => 0,
        'max' => 0,
        'layout' => 'table',
        'button_label' => '',
        'sub_fields' => array(
          array(
            'key' => 'field_61487f58836b0',
            'label' => 'Kanaal',
            'name' => 'kanaal',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'choices' => array(
              'facebook' => 'Facebook',
              'twitter' => 'Twitter',
              'youtube' => 'YouTube',
              'instagram' => 'Instagram',
              'linkedin' => 'LinkedIn',
            ),
            'default_value' => false,
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
          ),
          array(
            'key' => 'field_61487fa6836b1',
            'label' => 'Url',
            'name' => 'url',
            'type' => 'link',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'array',
          ),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'algemeen',
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