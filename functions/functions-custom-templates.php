<?php
/*
 *  Author: Jasper van Doorn
 *  Custom teplates folder functions
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// defining the sub-directory so that it can be easily accessed from elsewhere as well.
define( 'WPSE_PAGE_TEMPLATE_SUB_DIR', 'templates' );

function teachdigital_page_template_add_subdir( $templates = array() ) {
    // Generally this doesn't happen, unless another plugin / theme does modifications
    // of their own. In that case, it's better not to mess with it again with our code.
    if( empty( $templates ) || ! is_array( $templates ) || count( $templates ) < 3 )
        return $templates;

    $page_tpl_idx = 0;
    $cnt = count( $templates );
    if( $templates[0] === get_page_template_slug() ) {
        // if there is custom template, then our page-{slug}.php template is at the next index 
        $page_tpl_idx = 1;
    }

    // the last one in $templates is page.php, so
    // all but the last one in $templates starting from $page_tpl_idx will be moved to sub-directory
    for( $i = $page_tpl_idx; $i < $cnt - 1; $i++ ) {
        $templates[$i] = WPSE_PAGE_TEMPLATE_SUB_DIR . '/' . $templates[$i];
    }

    return $templates;
}
// the original filter hook is {$type}_template_hierarchy,
// wihch is located in wp-includes/template.php file
add_filter( 'page_template_hierarchy', 'teachdigital_page_template_add_subdir' );
