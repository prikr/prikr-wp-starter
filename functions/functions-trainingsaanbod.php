<?php

/**
 * Project: mvr
 * File: functions-trainingsaanbod.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Init AJAX url handler
 */
function mvr_trainingsaanbod_enqueue()
{
  $handler = '';
  $environment = new Environment;
  if ($environment->is_production()) :
    $handler = 'main-defer';
  else :
    $handler = 'main-dev-defer';
  endif;

  wp_localize_script(
    $handler,
    'mvr__trainingsaanbod_ajax',
    array(
      'ajaxurl' => admin_url('admin-ajax.php'),
      'security'  =>  wp_create_nonce('mvr__trainingsaanbod_nonce')
    )
  );
}
add_action('wp_enqueue_scripts', 'mvr_trainingsaanbod_enqueue', 13);


/**
 * Get new search results
 */
function mvr_get_new_trainingsaanbod_results()
{
  if (!wp_verify_nonce($_REQUEST['nonce'], "mvr__trainingsaanbod_nonce")) {
    exit("Get away here!");
  }
  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    $payload = array();
    parse_str($_POST['payload'], $payload);

    $meta_query = mvr_get_meta_queries($payload);

    $args = array(
      'post_type' => 'product',
      '_meta_or_title' => $payload['search'],
      'meta_query' => $meta_query
    );

    if (key_exists('product_cat', $payload)) {
      if ($payload['product_cat'] !== 'all') {
        $args['tax_query'] = array(
          array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $payload['product_cat'],
          ),
        );
      }
    }


    ob_start();

    if ($payload['search'] === '' && $payload['product_cat'] === 'all') :
      $count = count(get_posts(array('post_type' => 'product', 'post_status' => 'publish', 'posts_per_page' => -1, 'nopaging' => true)));
      get_template_part('content/content', 'trainingsaanbod');
    elseif ($payload['search'] === '' && $payload['product_cat'] !== 'all') :
      get_template_part('content/content', 'trainingsaanbod', array(
        'query' =>  array(
          'post_type' => 'product',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'nopaging' => true,
          'tax_query' =>  array(
            array(
              'taxonomy' => 'product_cat',
              'field' => 'slug',
              'terms' => $payload['product_cat'],
            )
          )
        )
      ));
    else :
      $count = count(get_posts($args));
      get_template_part('content/content', 'trainingsaanbod', array(
        'query' =>  $args
      ));
    endif;

    $html = ob_get_contents();
    ob_end_clean();
    $result = array(
      'html'  =>  $html,
      'count' =>  $count
    );

    return wp_send_json_success($result);
  } else {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    die();
  }
}
add_action('wp_ajax_mvr_get_new_trainingsaanbod_results', 'mvr_get_new_trainingsaanbod_results');
add_action('wp_ajax_nopriv_mvr_get_new_trainingsaanbod_results', 'mvr_get_new_trainingsaanbod_results');

/**
 * Get all meta queries to filter through
 */
function mvr_get_meta_queries($payload)
{
  $search_string = $payload['search'];

  $meta_query = array();

  // $overall_query = array(
  //   'relation'  => 'AND',
  //   $meta_query
  // );

  $meta_query[] = array(
    'key' => 'card_title',
    'value' => $search_string,
    'compare' => 'LIKE'
  );

  $meta_query[] = array(
    'key' => 'card_description',
    'value' => $search_string,
    'compare' => 'LIKE'
  );



  if (count($meta_query) > 1) {
    $meta_query['relation'] = 'OR';
  }

  // if (key_exists('hour', $payload)) {
  //   $overall_query[] = array(
  //     'key' => 'job_employment_type',
  //     'value' => $payload['hour'],
  //     'compare' => '='
  //   );
  //   return $overall_query;
  // }

  return $meta_query;
}
