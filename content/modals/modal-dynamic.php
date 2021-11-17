<?php

/**
 * Project: mvr
 * File: modal-dynamic.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Default args
$args = wp_parse_args(
  $args,
  array(
    'id'        =>    false,
    'title'     =>    false,
    'content'   =>    false,
    'formulier' =>    false,
    'link'      =>    false
  )
);
?>

<div class="modal fade" id="modal_<?php echo !empty($args['id']) ? $args['id'] : ''; ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title fw-bold font-roboto">
          <?php echo !empty($args['title']) ? $args['title'] : ''; ?>
        </span>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        if (!empty($args['content'])) :
          echo '<span class="d-block margin-bottom-32 margin-bottom-lg-60">';
          echo $args['content'];
          echo '</span>';
        endif;
        if ($args['formulier'] !== false) :
          
          if (is_string($args['formulier'])) :
            echo prikr_get_form($args['formulier'], false);
          elseif (is_object($args['formulier'])) :
            echo prikr_get_form($args['formulier']->ID, false);
          endif;
          
        elseif ($args['link'] !== false && $args['link'] !== '') :
          echo '<a href="' . $args['link']['url'] . '" class="btn btn-purple mt-auto">' . $args['link']['title'] . '</a>';

        endif;
        ?>
      </div>
    </div>
  </div>
</div>