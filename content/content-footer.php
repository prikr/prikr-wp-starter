<?php

/**
 * Project: mvr
 * File: content-footer.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

$socials = get_field( 'kanalen', 'algemeen' ); 

?>

<div class="container padding-top-32 padding-bottom-120">


  <div class="row border-top border-sm-0 border-primary padding-top-16">

    <div class="col-12 col-lg-6 order-1 order-lg-0 d-flex flex-row justify-content-center justify-content-lg-start">
      <?php get_template_part('content/content', 'logo', array(
        'max-width' =>  '200px'
      )); ?>
    </div>
    <div class="col-12 col-lg-6 d-flex flex-row justify-content-center justify-content-lg-end order-0 order-lg-1 padding-top-48 padding-top-lg-0 padding-bottom-48">
      <?php 

        if (have_rows('kanalen', 'algemeen')) :
          while (have_rows('kanalen', 'algemeen')) : the_row(); 
            if (!empty(get_sub_field('url'))) :
              echo '<a href="' . get_sub_field('url')['url'] . '" class="margin-left-16" target=" ' . get_sub_field('url')['target'] . '">';
            
              if (get_sub_field('kanaal') === 'facebook') : ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="10.494" height="19.594" viewBox="0 0 10.494 19.594">
                  <path id="Icon_awesome-facebook-f" data-name="Icon awesome-facebook-f" d="M11.416,11.022l.544-3.546h-3.4v-2.3a1.773,1.773,0,0,1,2-1.916H12.1V.24A18.864,18.864,0,0,0,9.358,0c-2.8,0-4.634,1.7-4.634,4.773v2.7H1.609v3.546H4.724v8.572H8.558V11.022Z" transform="translate(-1.609)" fill="#5c2483"/>
                </svg>
              <?php elseif (get_sub_field('kanaal') === 'twitter') : ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="23.702" height="19.25" viewBox="0 0 23.702 19.25">
                  <path id="Icon_awesome-twitter" data-name="Icon awesome-twitter" d="M21.265,8.178c.015.211.015.421.015.632A13.726,13.726,0,0,1,7.459,22.631,13.727,13.727,0,0,1,0,20.45a10.049,10.049,0,0,0,1.173.06A9.728,9.728,0,0,0,7.2,18.435a4.866,4.866,0,0,1-4.542-3.369,6.126,6.126,0,0,0,.917.075,5.138,5.138,0,0,0,1.278-.165,4.858,4.858,0,0,1-3.9-4.767v-.06a4.892,4.892,0,0,0,2.2.617,4.865,4.865,0,0,1-1.5-6.5A13.808,13.808,0,0,0,11.67,9.351a5.484,5.484,0,0,1-.12-1.113,4.862,4.862,0,0,1,8.407-3.324A9.564,9.564,0,0,0,23.04,3.742,4.845,4.845,0,0,1,20.9,6.419a9.738,9.738,0,0,0,2.8-.752,10.442,10.442,0,0,1-2.436,2.511Z" transform="translate(0 -3.381)" fill="#5c2483"/>
                </svg>
              <?php elseif (get_sub_field('kanaal') === 'instagram') : ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="19.254" height="19.25" viewBox="0 0 19.254 19.25">
                  <path id="Icon_awesome-instagram" data-name="Icon awesome-instagram" d="M9.624,6.927a4.935,4.935,0,1,0,4.935,4.935A4.928,4.928,0,0,0,9.624,6.927Zm0,8.144a3.209,3.209,0,1,1,3.209-3.209A3.215,3.215,0,0,1,9.624,15.071Zm6.289-8.346a1.151,1.151,0,1,1-1.151-1.151A1.149,1.149,0,0,1,15.913,6.725Zm3.269,1.168A5.7,5.7,0,0,0,17.626,3.86a5.734,5.734,0,0,0-4.033-1.555c-1.589-.09-6.353-.09-7.942,0A5.726,5.726,0,0,0,1.617,3.856,5.716,5.716,0,0,0,.062,7.889c-.09,1.589-.09,6.353,0,7.942a5.7,5.7,0,0,0,1.555,4.033A5.742,5.742,0,0,0,5.651,21.42c1.589.09,6.353.09,7.942,0a5.7,5.7,0,0,0,4.033-1.555,5.734,5.734,0,0,0,1.555-4.033c.09-1.589.09-6.349,0-7.938Zm-2.053,9.643a3.249,3.249,0,0,1-1.83,1.83c-1.267.5-4.274.387-5.674.387s-4.411.112-5.674-.387a3.249,3.249,0,0,1-1.83-1.83c-.5-1.267-.387-4.274-.387-5.674s-.112-4.411.387-5.674a3.249,3.249,0,0,1,1.83-1.83c1.267-.5,4.274-.387,5.674-.387s4.411-.112,5.674.387a3.249,3.249,0,0,1,1.83,1.83c.5,1.267.387,4.274.387,5.674S17.631,16.274,17.128,17.537Z" transform="translate(0.005 -2.238)" fill="#5c2483"/>
                </svg>  
              <?php elseif (get_sub_field('kanaal') === 'linkedin') : ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="19.25" height="19.25" viewBox="0 0 19.25 19.25">
                  <path id="Icon_awesome-linkedin-in" data-name="Icon awesome-linkedin-in" d="M4.309,19.251H.318V6.4H4.309Zm-2-14.605A2.322,2.322,0,1,1,4.623,2.312,2.331,2.331,0,0,1,2.311,4.645ZM19.246,19.251H15.264V12.994c0-1.491-.03-3.4-2.075-3.4-2.075,0-2.393,1.62-2.393,3.3v6.364H6.809V6.4h3.828V8.152h.056a4.194,4.194,0,0,1,3.776-2.075c4.039,0,4.782,2.66,4.782,6.115v7.06Z" transform="translate(0 -0.001)" fill="#5c2483"/>
                </svg>
              <?php elseif (get_sub_field('kanaal') === 'youtube') : ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="27.378" height="19.25" viewBox="0 0 27.378 19.25">
                  <path id="Icon_awesome-youtube" data-name="Icon awesome-youtube" d="M27.856,7.512a3.44,3.44,0,0,0-2.42-2.436C23.3,4.5,14.739,4.5,14.739,4.5s-8.561,0-10.7.576a3.44,3.44,0,0,0-2.42,2.436,36.087,36.087,0,0,0-.572,6.632,36.087,36.087,0,0,0,.572,6.632,3.389,3.389,0,0,0,2.42,2.4c2.135.576,10.7.576,10.7.576s8.561,0,10.7-.576a3.389,3.389,0,0,0,2.42-2.4,36.087,36.087,0,0,0,.572-6.632,36.087,36.087,0,0,0-.572-6.632Zm-15.917,10.7V10.074l7.156,4.071-7.156,4.071Z" transform="translate(-1.05 -4.5)" fill="#5c2483"/>
                </svg>
              <?php endif;
              echo '</a>';
            endif;
          endwhile;
        endif;


      ?>
    </div>
  </div>


</div>