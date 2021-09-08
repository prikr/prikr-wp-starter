<?php
 /*
 *  Author: Jasper van Doorn
 *  Import all includes
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Admin
require get_template_directory() . '/includes/admin/admin.php';

// ACF
require get_template_directory() . '/includes/acf/import.php';

// // ACF Extended
// require get_template_directory() . '/includes/acf-extended/import.php';

// // ACF Fields
// require get_template_directory() . '/includes/acf-fields/fields.php';

?>