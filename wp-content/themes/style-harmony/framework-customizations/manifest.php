<?php if (!defined('FW')) die('Forbidden');

$manifest = array();

/**
 * An unique id to identify your theme
 * For e.g. this is used to store Theme Settings in wp_option 'fw_theme_settings_options:{theme_id}'
 */
$manifest['id'] = get_option( 'stylesheet' );

/**
 * Specify extensions that you customized, that will look good and work well with your theme.
 * After plugin activation, the user will be redirected to a page to install these extensions.
 */
$manifest['supported_extensions'] = array(
	// 'extension_name' => array(),

	'page-builder' => array(),
	'breadcrumbs' => array(),
	'slider' => array(),
	// ...

	/**
	 * These extensions are visible on Unyson Extensions page only if are specified here.
	 * Because they has no sense to be available for a theme that is not configured to support them.
	 */
	'styling' => array(),
	'megamenu' => array(),
);