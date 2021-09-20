<?php

/**
 * Project: mvr
 * File: functions-buttons-forms-and-modals.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly


if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Remove P tags from forms
 */
add_filter('wpcf7_autop_or_not', '__return_false');


/**
 * Get the advanced form
 */
if (!function_exists('prikr_get_form')) {
  function prikr_get_form($id, $btntext = 'Versturen')
  {
    if (empty($id)) {
      return false;
    }

    if (is_object($id)) {
      return false;
    }

    echo do_shortcode( '[contact-form-7 id="' . $id . '" title="Deel formulier"]'  );

  }
}

if (!function_exists('prikr_get_button')) {
  function prikr_get_button($knop, $class = 'btn btn-secondary', $attributes = '')
  {
    if (empty($knop)) {
      return false;
    }

    $output = '';
    if ($knop['knop_functie'] === 'intern') :
      $link = $knop['link'];
      $output .= '<a class="' . $class . '"  href="' . $link['url'] . '" title="' . $link['title'] . '"' . $attributes . '>' . $knop['knop_tekst'] . '</a>';
    elseif ($knop['knop_functie'] === 'extern') :
      $link = $knop['link'];
      $output .= '<a class="' . $class . '"  rel="' . $knop['rel'] . '" href="' . $link['url'] . '" title="' . $link['title'] . '"' . $attributes . '>' . $knop['knop_tekst'] . '</a>';
    elseif ($knop['knop_functie'] === 'modal') :
      $modal = $knop['modal'];
      if (is_int($modal)) :
        $id = $modal;
      else :
        $id = $modal->ID;
      endif;
      $output .= '<button type="button" class="' . $class . '" data-bs-toggle="modal" data-bs-target="#modal_' . $id . '"' . $attributes . '>' . $knop['knop_tekst'] . '</button>';
      add_modal_to_queue($id);
    elseif ($knop['knop_functie'] === 'formulier') :
      $output .= prikr_get_form($knop['formulier'], $knop['knop_tekst']);
      if ($knop['privacy']) :
        $output .= '<div class="subscribe__footer d-block text-center mt-4" ' . $attributes . '>';
        $output .= $knop['privacy_tekst'];
        $output .= '</div>';
      endif;
    endif;
    echo $output;
  }
}

/**
 * Rendering all modals in the footer
 */
function render_all_modals()
{
  $modals = get_query_var('modals');
  if ($modals !== 'undefined') :
    $modals = array_unique(get_all_modals($modals), SORT_REGULAR);
    if (is_array($modals)) :
      foreach ($modals as $modal) :
        if (is_array($modal)) :
          get_dynamic_modal($modal);
        else :
          get_modal($modal);
        endif;
      endforeach;
    else :
      get_modal($modals);
    endif;
  else :
    return;
  endif;
}

add_action('wp_footer', 'render_all_modals', 0, 0);


/**
 * Get all modals in query_var
 */
if (!function_exists('get_all_modals')) {
  function get_all_modals($modals)
  {
    $queue = array();
    $dynamicModals = get_query_var('modals');

    if (is_array($modals)) :
      $queue = array_merge($queue, $modals);
    endif;
    if (is_array($dynamicModals)) :
      $queue = array_merge($queue, $dynamicModals);
    endif;
    return $queue;
  }
}

/**
 * Add a new modal to the queue
 */
function add_modal_to_queue($modalId)
{
  $queue = array(); // local

  $currentModals = get_query_var('modals'); // existing

  if (is_array($modalId)) { 
    $newModal = $modalId;
  } else {
    $newModal =  array( // new
      'id'        =>  $modalId,
      'title'     =>  get_post_meta($modalId, 'titel', false)[0],
      'content'   =>  get_formatted_content(get_post_meta($modalId, 'modal_content', false)[0]),
      'formulier' =>  !empty(get_post_meta($modalId, 'formulier', false)) ? get_post_meta($modalId, 'formulier', false)[0] : false,
      'link'      =>  !empty(get_post_meta($modalId, 'modal_knop', false)) ? get_post_meta($modalId, 'modal_knop', false)[0] : false
    );
  }

  if (is_array($queue) && is_array($currentModals)) :
    $queue = array_merge($queue, $currentModals); // merge the already existing modals into the queue
    $queue[] = $newModal; // Add the new modal to the queue 
    set_query_var('modals', $queue); // set the queue (with added modal) to the query var
  elseif (is_array($queue) && is_string($currentModals)) :
    $queue[] = $newModal; // Add the new modal to the queue 
    set_query_var('modals', $queue); // set the queue (with added modal) to the query var
  else :
    return;
  endif;
}

/**
 * Get a modal
 */
function get_modal($modal)
{
  return get_template_part('content/modals/modal', $modal);
}

function get_formatted_content($content)
{
  if (false === strpos($content, '[')) {
    return $content;
  }
  preg_match_all('/' . get_shortcode_regex() . '/', $content, $matches, PREG_SET_ORDER);
  if (empty($matches)) {
    return false;
  }
  foreach ($matches as $shortcode) {
    $newContent = do_shortcode($shortcode[0], true);
    $content = str_replace($shortcode[0], $newContent, $content);
  }
  return $content;
}

/**
 * Get a dynamic modal
 */
function get_dynamic_modal($modal)
{
  return get_template_part('content/modals/modal', 'dynamic', array(
    'id'        =>  $modal['id'],
    'title'     =>  $modal['title'],
    'content'   =>  $modal['content'],
    'formulier' =>  $modal['formulier'],
    'link'      =>  $modal['link']
  ));
}



// TODO:
// check if contact form 7 is loaded on all pages:
//   add_action('wp_enqueue_scripts', 'load_wpcf7_scripts');
// function load_wpcf7_scripts() {
//   if ( is_page('contact') ) {
//     if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
//       wpcf7_enqueue_scripts();
//     }
//     if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
//       wpcf7_enqueue_styles();
//     }
//   }
// }
