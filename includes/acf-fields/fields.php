<?php
 /*
 *  Author: Jasper van Doorn
 *  Collect all fields
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Pagebuilder (since 24-05)
 */
require get_template_directory() . '/includes/acf-fields/pagebuilder.php';

/** 
 * Default options
 */
require get_template_directory() . '/includes/acf-fields/options-default.php';

/** 
 * Header options
 */
require get_template_directory() . '/includes/acf-fields/options-header.php';
require get_template_directory() . '/includes/acf-fields/page-header.php';

/**
 * Footer options
 */
require get_template_directory() . '/includes/acf-fields/options-footer.php';
