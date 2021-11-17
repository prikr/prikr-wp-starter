<?php

/**
 * Project: prikr
 * File: marketing-screen.php
 * Author: Jasper van Doorn
 * Copyright © Prikr 
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
global $post;

?>

<div class="wrap mt-4">

  <div class="container-fluid">
    <div class="row">

      <div class="col-12">

        <h3>
          Marketing
          <small class="text-muted">dashboard</small>
        </h3>
      </div>
      <div class="col-12 col-md-2 mt-3">

        <div class="d-flex align-items-start border border-1 border-primary rounded-2 py-4 w-100">
          <div class="nav flex-column text-start nav-pills w-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a href="#home" class="nav-link rounded-0 text-start active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
            <a href="#modals" class="nav-link rounded-0 text-start" id="v-pills-modals-tab" data-bs-toggle="pill" data-bs-target="#v-pills-modals" type="button" role="tab" aria-controls="v-pills-modals" aria-selected="false">Modals</a>
            <a href="#formulieren" class="nav-link rounded-0 text-start" id="v-pills-formulieren-tab" data-bs-toggle="pill" data-bs-target="#v-pills-formulieren" type="button" role="tab" aria-controls="v-pills-formulieren" aria-selected="false">Formulieren</a>
            <a href="#inzendingen" class="nav-link rounded-0 text-start" id="v-pills-inzendingen-tab" data-bs-toggle="pill" data-bs-target="#v-pills-inzendingen" type="button" role="tab" aria-controls="v-pills-inzendingen" aria-selected="false">Inzendingen</a>
            <a href="#bedanktpaginas" class="nav-link rounded-0 text-start" id="v-pills-bedanktpaginas-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bedanktpaginas" type="button" role="tab" aria-controls="v-pills-bedanktpaginas" aria-selected="false">Bedanktpagina's</a>
          </div>
        </div>

      </div>
      <div class="col-12 col-md-10 mt-3">

        <div class="d-flex align-items-start w-100">
          <div class="tab-content w-100" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <h3>
                Dashboard
                <small class="text-muted">overzicht</small>
              </h3>
              <div class="d-flex align-items-start">
                <div class="container-fluid px-0">
                  <div class="row">
                    <div class="col-6 py-3">
                      <div class="d-flex flex-column border border-1 rounded-2 border-primary p-3" style="height: 350px;">
                        <h1 class="wp-heading-inline">
                          Modals
                          <a href="/wp-admin/post-new.php?post_type=modals" class="page-title-action">Nieuwe modal</a>
                        </h1>
                        <div class="d-flex flex-column w-100 border-top mt-2" style="overflow-y: scroll;">
                          <?php
                          $modal_tmp_post = $post;
                          $modal_args = array(
                            'post_type' => 'modals',
                            'suppress_filters'  => 0
                          );
                          $modal_myposts = get_posts($modal_args);
                          $i = 0;
                          $index = 'even';
                          foreach ($modal_myposts as $post) : setup_postdata($post);
                            if ($i % 2 == 0) {
                              $index = 'even';
                            } else {
                              $index = 'odd';
                            }
                          ?>
                            <div class="d-flex flex-row justify-content-between p-3 <?php echo $index === 'even' ? 'bg-light' : 'bg-white'; ?>">
                              <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="row-title" id="<?php echo $post->ID; ?>"><?php echo get_the_title($post->ID); ?></a>
                              <span class="edit">
                                <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="pe-3" id="<?php echo $post->ID; ?>">bewerken</a>
                              </span>
                            </div>
                          <?php
                            wp_reset_postdata();
                            $i++;
                          endforeach;
                          $post = $modal_tmp_post;
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 py-3">
                      <div class="d-flex flex-column border border-1 rounded-2 border-primary p-3" style="height: 350px;">
                        <h1 class="wp-heading-inline">
                          Formulieren
                          <a href="/wp-admin/post-new.php?post_type=wpcf7_contact_form" class="page-title-action">Nieuw formulier</a>
                        </h1>
                        <div class="d-flex flex-column w-100 border-top mt-2" style="overflow-y: scroll;">
                          <?php
                          $modal_tmp_post = $post;
                          $modal_args = array(
                            'post_type' => 'wpcf7_contact_form',
                            'suppress_filters'  =>   0
                          );
                          $modal_myposts = get_posts($modal_args);
                          $i = 0;
                          $index = 'even';
                          foreach ($modal_myposts as $post) : setup_postdata($post);
                            if ($i % 2 == 0) {
                              $index = 'even';
                            } else {
                              $index = 'odd';
                            }
                          ?>
                            <div class="d-flex flex-row justify-content-between p-3 <?php echo $index === 'even' ? 'bg-light' : 'bg-white'; ?>">
                              <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="row-title" id="<?php echo $post->ID; ?>"><?php echo get_the_title($post->ID); ?></a>
                              <span class="edit">
                                <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="pe-3" id="<?php echo $post->ID; ?>">bewerken</a>
                              </span>
                            </div>
                          <?php
                            wp_reset_postdata();
                            $i++;
                          endforeach;

                          $post = $modal_tmp_post;

                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="col-6 py-3">
                      <div class="d-flex flex-column border border-1 rounded-2 border-primary p-3" style="height: 350px;">
                        <h1 class="wp-heading-inline">
                          Inzendingen
                        </h1>
                        <div class="d-flex flex-column w-100 border-top mt-2" style="overflow-y: scroll;">
                        <?php
                          $modal_tmp_post = $post;
                          $modal_args = array(
                            'post_type' => 'wpcf7r_leads',
                            'suppress_filters'  =>   0
                          );
                          $modal_myposts = get_posts($modal_args);
                          $i = 0;
                          $index = 'even';
                          foreach ($modal_myposts as $post) : setup_postdata($post);
                            if ($i % 2 == 0) {
                              $index = 'even';
                            } else {
                              $index = 'odd';
                            }
                          ?>
                            <div class="d-flex flex-row justify-content-between p-3 <?php echo $index === 'even' ? 'bg-light' : 'bg-white'; ?>">
                              <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="row-title" id="<?php echo $post->ID; ?>"><?php echo get_the_title($post->ID); ?></a>
                              <span class="edit">
                                <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" id="<?php echo $post->ID; ?>">bekijken</a>
                              </span>
                            </div>
                          <?php
                            wp_reset_postdata();
                            $i++;
                          endforeach;

                          $post = $modal_tmp_post;

                          ?>
                        </div>

                      </div>
                    </div>
                    <div class="col-6 py-3">
                      <div class="d-flex flex-column border border-1 rounded-2 border-primary p-3" style="height: 350px;">
                        <h1 class="wp-heading-inline">
                          Bedanktpagina's
                          <a href="/wp-admin/post-new.php?post_type=af_thankspages" class="page-title-action">Nieuwe bedanktpagina</a>
                        </h1>
                        <div class="d-flex flex-column w-100 border-top mt-2" style="overflow-y: scroll;">
                        <?php
                          $modal_tmp_post = $post;
                          $modal_args = array(
                            'post_type' => 'af_thankpages',
                            'suppress_filters'  =>   0
                          );
                          $modal_myposts = get_posts($modal_args);
                          $i = 0;
                          $index = 'even';
                          foreach ($modal_myposts as $post) : setup_postdata($post);
                            if ($i % 2 == 0) {
                              $index = 'even';
                            } else {
                              $index = 'odd';
                            }
                          ?>
                            <div class="d-flex flex-row justify-content-between p-3 <?php echo $index === 'even' ? 'bg-light' : 'bg-white'; ?>">
                              <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="row-title" id="<?php echo $post->ID; ?>"><?php echo get_the_title($post->ID); ?></a>
                              <span class="edit">
                                <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="pe-3" id="<?php echo $post->ID; ?>">bewerken</a>
                                <a href="<?php echo get_the_permalink(); ?>" id="<?php echo $post->ID; ?>">bekijken</a>
                              </span>
                            </div>
                          <?php
                            wp_reset_postdata();
                            $i++;
                          endforeach;

                          $post = $modal_tmp_post;

                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-modals" role="tabpanel" aria-labelledby="v-pills-modals-tab">
              <h3>
                Modals
                <small class="text-muted">overzicht</small>
                <a href="/wp-admin/post-new.php?post_type=modals" class="page-title-action">Nieuwe modal</a>
              </h3>
              <div class="d-flex align-items-start">
                <div class="container-fluid px-0">
                  <div class="row">
                    <div class="col-12 py-3">
                      <div class="d-flex border border-1 rounded-2 border-primary p-3" style="height: 80vh;">

                        <div class="d-flex flex-column w-100" style="overflow-y: scroll;">
                          <?php
                          $modal_tmp_post = $post;
                          $modal_args = array(
                            'post_type' => 'modals',
                            'suppress_filters'  =>   0
                          );
                          $modal_myposts = get_posts($modal_args);
                          $i = 0;
                          $index = 'even';
                          foreach ($modal_myposts as $post) : setup_postdata($post);
                            if ($i % 2 == 0) {
                              $index = 'even';
                            } else {
                              $index = 'odd';
                            }
                          ?>
                            <div class="d-flex flex-row justify-content-between p-3 <?php echo $index === 'even' ? 'bg-light' : 'bg-white'; ?>">
                              <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="row-title" id="<?php echo $post->ID; ?>"><?php echo get_the_title($post->ID); ?></a>
                              <span class="edit">
                                <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="pe-3" id="<?php echo $post->ID; ?>">bewerken</a>
                              </span>
                            </div>
                          <?php
                            wp_reset_postdata();
                            $i++;
                          endforeach;
                          $post = $modal_tmp_post;
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-formulieren" role="tabpanel" aria-labelledby="v-pills-formulieren-tab">
              <h3>
                Formulieren
                <small class="text-muted">overzicht</small>
                <a href="/wp-admin/post-new.php?post_type=wpcf7_contact_form" class="page-title-action">Nieuw formulier</a>
              </h3>
              <div class="d-flex align-items-start">
                <div class="container-fluid px-0">
                  <div class="row">
                    <div class="col-12 py-3">
                      <div class="d-flex border border-1 rounded-2 border-primary p-3" style="height: 80vh;">

                        <div class="d-flex flex-column w-100" style="overflow-y: scroll;">
                        <?php
                          $modal_tmp_post = $post;
                          $modal_args = array(
                            'post_type' => 'wpcf7_contact_form',
                            'suppress_filters'  =>   0
                          );
                          $modal_myposts = get_posts($modal_args);
                          $i = 0;
                          $index = 'even';
                          foreach ($modal_myposts as $post) : setup_postdata($post);
                            if ($i % 2 == 0) {
                              $index = 'even';
                            } else {
                              $index = 'odd';
                            }
                          ?>
                            <div class="d-flex flex-row justify-content-between p-3 <?php echo $index === 'even' ? 'bg-light' : 'bg-white'; ?>">
                              <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="row-title" id="<?php echo $post->ID; ?>"><?php echo get_the_title($post->ID); ?></a>
                              <span class="edit">
                                <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="pe-3" id="<?php echo $post->ID; ?>">bewerken</a>
                              </span>
                            </div>
                          <?php
                            wp_reset_postdata();
                            $i++;
                          endforeach;
                          $post = $modal_tmp_post;
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-inzendingen" role="tabpanel" aria-labelledby="v-pills-inzendingen-tab">
              <h3>
                Inzendingen
                <small class="text-muted">overzicht</small>
              </h3>
              <div class="d-flex align-items-start">
                <div class="container-fluid px-0">
                  <div class="row">
                    <div class="col-12 py-3">
                      <div class="d-flex border border-1 rounded-2 border-primary p-3" style="height: 80vh;">

                        <div class="d-flex flex-column w-100" style="overflow-y: scroll;">
                        <?php
                          $modal_tmp_post = $post;
                          $modal_args = array(
                            'post_type' => 'wpcf7r_leads',
                            'suppress_filters'  =>   0
                          );
                          $modal_myposts = get_posts($modal_args);
                          $i = 0;
                          $index = 'even';
                          foreach ($modal_myposts as $post) : setup_postdata($post);
                            if ($i % 2 == 0) {
                              $index = 'even';
                            } else {
                              $index = 'odd';
                            }
                          ?>
                            <div class="d-flex flex-row justify-content-between p-3 <?php echo $index === 'even' ? 'bg-light' : 'bg-white'; ?>">
                              <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="row-title" id="<?php echo $post->ID; ?>"><?php echo get_the_title(); ?></a>
                              <span class="edit">
                                <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="pe-3" id="<?php echo $post->ID; ?>">bekijken</a>
                              </span>
                            </div>
                          <?php
                            wp_reset_postdata();
                            $i++;
                          endforeach;
                          $post = $modal_tmp_post;
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-bedanktpaginas" role="tabpanel" aria-labelledby="v-pills-bedanktpaginas-tab">
              <h3>
                Bedanktpagina's 
                <small class="text-muted">overzicht</small>
                <a href="/wp-admin/post-new.php?post_type=af_thankpages" class="page-title-action">Nieuwe bedanktpagina</a>
              </h3>
              <div class="d-flex align-items-start">
                <div class="container-fluid px-0">
                  <div class="row">
                    <div class="col-12 py-3">
                      <div class="d-flex border border-1 rounded-2 border-primary p-3" style="height: 80vh;">

                        <div class="d-flex flex-column w-100" style="overflow-y: scroll;">
                          <?php
                          $modal_tmp_post = $post;
                          $modal_args = array(
                            'post_type' => 'af_thankpages',
                            'suppress_filters'  =>   0
                          );
                          $modal_myposts = get_posts($modal_args);
                          $i = 0;
                          $index = 'even';
                          foreach ($modal_myposts as $post) : setup_postdata($post);
                            if ($i % 2 == 0) {
                              $index = 'even';
                            } else {
                              $index = 'odd';
                            }
                          ?>
                            <div class="d-flex flex-row justify-content-between p-3 <?php echo $index === 'even' ? 'bg-light' : 'bg-white'; ?>">
                              <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="row-title" id="<?php echo $post->ID; ?>"><?php echo get_the_title($post->ID); ?></a>
                              <span class="edit">
                                <a href="/wp-admin/post.php?post=<?php echo $post->ID; ?>&action=edit" class="pe-3" id="<?php echo $post->ID; ?>">bewerken</a>
                                <a href="<?php echo get_the_permalink($post->ID); ?>" id="<?php echo $post->ID; ?>">bekijken</a>
                              </span>
                            </div>
                          <?php
                            wp_reset_postdata();
                            $i++;
                          endforeach;
                          $post = $modal_tmp_post;
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

</div>


</div>