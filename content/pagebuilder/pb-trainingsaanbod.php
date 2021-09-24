<?php

/**
 * Project: mvr
 * File: pb-trainingsaanbod.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

$listview = '';
if (key_exists('viewCookie', $_COOKIE)) {
  $listview = $_COOKIE['viewCookie'];
}
global $wp;

$modal = get_field('nocursusfound_modal', 'content_sections'); 
if (!empty($modal)) :
  add_modal_to_queue($modal->ID);
endif;

?>

<section id="trainingsaanbod" name="trainingsaanbod">

  <form id="form_trainingsaanbod" action="/trainingsaanbod/" method="POST">

    <section name="filter" class="container">
      <div class="row">
        <div class="col-12 padding-16 padding-lg-48 bg-light border-1 border border-gray">
          <div class="d-flex flex-row justify-content-center">
            <div class="trainingsaanbod__search margin-right-32">
              <input hidden class="d-none" id="listview" name="listview" value="<?php echo $listview; ?>" />
              <input class="trainingsaanbod__search__input form-control" type="text" name="search" placeholder="Zoek door naam, tekst, tags of locatie" value="" />
            </div>
            <div class="trainingsaanbod__categories margin-right-32">

              <?php
              $isCategory = false;
              $product_cat = '';
              if (function_exists('is_product_category')) {
                if (is_product_category()) {
                  $isCategory = true;
                  $product_cat = get_queried_object();
                }
              }
              $categories = get_terms([
                'taxonomy' => 'product_cat',
                'hide_empty' => false,
                'suppress_filters' => false,
              ]);
              ?>

              <select name="product_cat" class="form-select">
                <option value="all" <?php echo !$isCategory ? 'selected' : ''; ?>>Alle categoriën</option>

                <?php echo __('Specialisatie', 'prikr'); ?></option>
                <?php foreach ($categories as $category) : ?>
                  <option value="<?php echo $category->slug; ?>" <?php echo $category->slug === $product_cat->slug ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
                <?php endforeach; ?>
              </select>

            </div>
            <div class="trainingsaanbod__submit">
              <button id="submit_search_trainingsaanbod" class="btn btn-secondary trainingsaanbod__submit__button">Zoeken</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div name="subsettings" class="container">
      <div class="row padding-top-32 padding-bottom-32" id="layout_switcher_buttons">
        <div class="col-12 d-flex flex-row justify-content-between align-items-center padding-right-lg-0 padding-left-lg-0">
          <div class="d-flex flex-row">
            <span>Resultaten: <span id="count"><?php $count = count(get_posts(array(
                                                  'post_type' => 'product',
                                                  'post_status' => 'publish',
                                                  'posts_per_page' => -1,
                                                  'nopaging' => true
                                                )));
                                                echo $count; ?></span></span>
            <span id="deletefilters" class="margin-left-16" style="opacity: 0; transition: .3s ease;"><a href="<?php echo '//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '/#form_trainingsaanbod'; ?>" class="text-primary">alle filters verwijderen</a></span>
          </div>

          <div class="d-flex flex-row">
            <span class="margin-right-16 font-roboto">
              Weergave:
            </span>
            <div data-type="list" class="switch-layout-button list-view <?php echo $listview !== '' && $listview === 'list' ? 'active' : ''; ?> margin-right-8">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                <g id="Rectangle_1" class="layout_switcher_buttons_rectangle" data-name="Rectangle 1" stroke-width="2">
                  <rect width="30" height="30" rx="3" stroke="none" />
                  <rect x="1" y="1" width="28" height="28" rx="2" fill="none" />
                </g>
                <line id="Line_1" class="layout_switcher_buttons_switch" data-name="Line 1" x2="18.87" transform="translate(5.661 7.548)" stroke-width="3" />
                <line id="Line_2" class="layout_switcher_buttons_switch" data-name="Line 2" x2="18.87" transform="translate(5.661 15.096)" stroke-width="3" />
                <line id="Line_3" class="layout_switcher_buttons_switch" data-name="Line 3" x2="18.87" transform="translate(5.661 22.644)" stroke-width="3" />
              </svg>
            </div>
            <div data-type="block" class="switch-layout-button block-view <?php echo $listview !== '' && $listview === 'block' ? 'active' : ''; ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                <g id="Rectangle_2" class="layout_switcher_buttons_rectangle" data-name="Rectangle 2" stroke-width="2">
                  <rect width="30" height="30" rx="2" stroke="none" />
                  <rect x="1" y="1" width="28" height="28" rx="1" fill="none" />
                </g>
                <g id="Icon_feather-grid" data-name="Icon feather-grid" transform="translate(0.671 0.671)">
                  <path id="Path_16" class="layout_switcher_buttons_switch" data-name="Path 16" d="M4.5,4.5h7.645v7.645H4.5Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                  <path id="Path_17" class="layout_switcher_buttons_switch" data-name="Path 17" d="M21,4.5h7.645v7.645H21Z" transform="translate(-4.487)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                  <path id="Path_18" class="layout_switcher_buttons_switch" data-name="Path 18" d="M21,21h7.645v7.645H21Z" transform="translate(-4.487 -4.487)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                  <path id="Path_19" class="layout_switcher_buttons_switch" data-name="Path 19" d="M4.5,21h7.645v7.645H4.5Z" transform="translate(0 -4.487)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </g>
              </svg>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="replace_list">
      <?php
      $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'nopaging' => true
      );

      if ($isCategory) {
        $args['tax_query'] = array(
          array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $product_cat->slug,
            'operator'  => 'IN'
          )
        );
      }

      get_template_part('content/content', 'trainingsaanbod', array(
        'query' =>  $args
      ));
      ?>
    </div>

  </form>
</section>