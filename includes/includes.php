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

// ACF Fields
require get_template_directory() . '/includes/acf-fields/fields.php';

// Marketing dashboard
require get_template_directory() . '/includes/marketing/marketing-admin.php';

// HTML minifier
require get_template_directory() . '/includes/minifier/minifier.php';

// Plugin activator
require get_template_directory() . '/includes/plugin-activation/plugin-activation.php';

?>