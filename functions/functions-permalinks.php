<?php

/**
 * Project: mvr
 * File: functions-permalinks.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

add_filter("rewrite_rules_array", function ($rules) {
  global $wp_rewrite;

  $option = get_option("woocommerce_permalinks");
  if (!$option) {
    return $rules;
  }

  $category_base = $option["category_base"];
  $pagination_base = $wp_rewrite->pagination_base;
  
  $terms = array_map(function ($term) {
    return (object)array(
      "term_id"   => $term->term_id,
      "parent_id" => $term->parent,
      "parent"    => NULL,
      "slug"      => $term->slug,
      "path"      => NULL
    );
  }, get_terms("product_cat", array("hide_empty" => 0)));

  foreach ($terms as $term) {
    $term->parent = array_pop(array_filter($terms, function ($parent) use ($term) {
      return ($term->parent_id == $parent->term_id);
    }));
  }

  foreach ($terms as $term) {
    $slugs = array();
    $current_term = $term;
    while ($current_term) {
      array_unshift($slugs, $current_term->slug);
      $current_term = $current_term->parent;
    }
    $term->path = implode("/", $slugs);
  }

  usort($terms, function ($term1, $term2) {
    return (substr_count($term1->path, "/") > substr_count($term2->path, "/")) ? -1 : 1;
  });

  $new_rules = array();

  foreach ($terms as $term) {
    $new_rules["$category_base/$term->path/$pagination_base/([0-9]{1,})/?$"] = "index.php?product_cat=$term->slug&paged=\$matches[1]";
    $new_rules["$category_base/$term->path/?$"] = "index.php?product_cat=$term->slug";
  }

  $new_rules["$category_base/$pagination_base/([0-9]{1,})/?$"] = "index.php?post_type=product&paged=\$matches[1]";

  return array_merge($new_rules, $rules);
});

add_action("create_product_cat", "flush_rewrite_rules");
add_action("edited_product_cat", "flush_rewrite_rules");
add_action("delete_product_cat", "flush_rewrite_rules");
