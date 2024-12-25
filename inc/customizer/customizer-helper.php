<?php
/**
 * Load necessary Customizer controls and functions.
 *
 * @package Maghreb
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Add fields.
require_once trailingslashit( dirname( __FILE__ ) ) . 'class-customize-field.php';

// Controls.
require_once trailingslashit( dirname( __FILE__ ) ) . 'controls/custom-color-control.php';
require_once trailingslashit( dirname( __FILE__ ) ) . 'controls/custom-font-control.php';
require_once trailingslashit( dirname( __FILE__ ) ) . 'controls/custom-icon-control.php';
