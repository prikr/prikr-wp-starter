<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme prikr
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/modules/plugin-activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'prikr_register_required_plugins' );

function prikr_register_required_plugins() {
	$plugins = array(

    // Wordpress plugin repositorie plugins:
		array(
			'name'               => 'ACF Extended', // The plugin name.
			'slug'               => 'acf-extended', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
    ),
    
    array(
			'name'               => 'ACF Flexible layouts manager', // The plugin name.
			'slug'               => 'acf-flexible-layouts-manager', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
    ),
    
    array(
			'name'               => 'ACF Font Awesome', // The plugin name.
			'slug'               => 'advanced-custom-fields-font-awesome', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
    ),

    array(
      'name'      => 'Classic Editor',
      'slug'      => 'classic-editor',
      'required'  => true,
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
    ),

    array(
      'name'      => 'TinyMCE Advanced',
      'slug'      => 'tinymce-advanced',
      'required'  => true,
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
    ),

    array(
      'name'      => 'Contact Form 7',
      'slug'      => 'contact-form-7',
      'required'  => true,
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
    ),

    array(
      'name'      => 'SVG Support',
      'slug'      => 'svg-support',
      'required'  => true,
      'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
    ),

    // Custom WordPress plugins:
    // array(
    //   'name'      => 'WP Rocket',
    //   'slug'      => 'wp-rocket',
    //   'source'    => get_template_directory() . '/modules/plugin-activation/plugins/wp-rocket.zip', // The plugin source.
    //   'required'  => true,
    //   'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
    // )
	);


	$config = array(
		'id'           => 'plugins',                // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'prikr-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => 'Deze plugins moeten worden gedownload, zodat het thema daarna goed werkt.',                      // Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => __( 'Installeer vereiste plugins.', 'prikr' ),
			'menu_title'                      => __( 'Install Plugins', 'prikr' ),
			
			'installing'                      => __( 'Installing Plugin: %s', 'prikr' ),
		
			'updating'                        => __( 'Updating Plugin: %s', 'prikr' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'prikr' ),
			'notice_can_install_required'     => _n_noop(
				
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'prikr'
			),
			'notice_can_install_recommended'  => _n_noop(
				
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'prikr'
			),
			'notice_ask_to_update'            => _n_noop(
				
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'prikr'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'prikr'
			),
			'notice_can_activate_required'    => _n_noop(
			
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'prikr'
			),
			'notice_can_activate_recommended' => _n_noop(
			
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'prikr'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'prikr'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'prikr'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'prikr'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'prikr' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'prikr' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'prikr' ),
			
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'prikr' ),
			
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'prikr' ),
			
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'prikr' ),
			'dismiss'                         => __( 'Dismiss this notice', 'prikr' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'prikr' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'prikr' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
	);

	tgmpa( $plugins, $config );
}