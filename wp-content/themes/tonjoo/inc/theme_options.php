<?php
/**
 * @Author: hakim
 * @Date:   2016-12-31 08:03:17
 * @Last Modified by:   hakim
 * @Last Modified time: 2016-12-31 12:12:42
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPEX_Theme_Options' ) ) {

	class WPEX_Theme_Options {

		public function __construct() {

			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'WPEX_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'WPEX_Theme_Options', 'register_settings' ) );
			}

		}

		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}

		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}

		public static function add_admin_menu() {
			add_menu_page(
				esc_html__( 'Tonjoo Theme Settings', 'text-domain' ),
				esc_html__( 'Tonjoo Theme Settings', 'text-domain' ),
				'manage_options',
				'theme-settings',
				array( 'WPEX_Theme_Options', 'create_admin_page' )
			);
		}

		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'WPEX_Theme_Options', 'sanitize' ) );
		}

		public static function sanitize( $options ) {

			// If we have options lets sanitize them
			if ( $options ) {

				// Address Location
				if ( ! empty( $options['address_location'] ) ) {
					$options['address_location'] = sanitize_text_field( $options['address_location'] );
				} else {
					unset( $options['address_location'] );
				}

				// Handphone Number
				if ( ! empty( $options['phone_number'] ) ) {
					$options['phone_number'] = sanitize_text_field( $options['phone_number'] );
				} else {
					unset( $options['phone_number'] );
				}

				// Email Address
				if ( ! empty( $options['email_address'] ) ) {
					$options['email_address'] = sanitize_text_field( $options['email_address'] );
				} else {
					unset( $options['email_address'] );
				}

				// Map Location
				if ( ! empty( $options['map_location'] ) ) {
					$options['map_location'] = sanitize_text_field( $options['map_location'] );
				} else {
					unset( $options['map_location'] );
				}

			}

			// Return sanitized options!
			return $options;

		}

		public static function create_admin_page() { ?>

			<div class="wrap">


					<?php require get_template_directory() . '/inc/theme_options/index.php';?>

			</div><!-- .wrap -->
		<?php }

	}
}
new WPEX_Theme_Options();

// Helper function to use in your theme to return a theme option value
function myprefix_get_theme_option( $id = '' ) {
	return WPEX_Theme_Options::get_theme_option( $id );
}
?>