<?php
/*
 *  Author: Jasper van Doorn
 *  Page header
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_6051c8190c381',
    'title' => 'Page | Header',
    'fields' => array(
      array(
        'key' => 'field_6051c8253d6cc',
        'label' => '(Column 6/12)',
        'name' => '',
        'type' => 'acfe_column',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'columns' => '6/12',
        'endpoint' => 0,
      ),
      array(
        'key' => 'field_6051c8353d6cd',
        'label' => 'Subtitel',
        'name' => 'subtitle',
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
        'key' => 'field_6051c83b3d6ce',
        'label' => 'Titel',
        'name' => 'title',
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
        'key' => 'field_6051c8483d6cf',
        'label' => 'Ondertitel',
        'name' => 'undertitle',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'visual',
        'toolbar' => 'basic',
        'media_upload' => 0,
        'delay' => 1,
      ),
      array(
        'key' => 'field_607983eec3eb5',
        'label' => 'Knop',
        'name' => 'button',
        'type' => 'acfe_advanced_link',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'post_type' => '',
        'taxonomy' => '',
      ),
      array(
        'key' => 'field_6051c8563d6d0',
        'label' => '(Column 6/12)',
        'name' => '',
        'type' => 'acfe_column',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'columns' => '6/12',
        'endpoint' => 0,
      ),
      array(
        'key' => 'field_6051c8623d6d1',
        'label' => 'Header afbeelding',
        'name' => 'header_image',
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
        'acfe_thumbnail' => 1,
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
        'default_value' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'page',
        ),
      ),
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
        ),
      )
    ),
    'menu_order' => 1,
    'position' => 'acf_after_title',
    'style' => 'default',
    'label_placement' => 'left',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'discussion',
      1 => 'comments',
      2 => 'author',
      3 => 'featured_image',
      4 => 'categories',
    ),
    'active' => true,
    'description' => '',
    'acfe_display_title' => 'Header',
    'acfe_autosync' => array(
      0 => 'json',
    ),
    'acfe_form' => 0,
    'acfe_meta' => '',
    'acfe_note' => '',
    'modified' => 1621234862,
  ));
  
  endif;