<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Webpace_Maps_Admin {


	public $pages;


	public function __construct() {
		$this->init();


	}


	private function init() {

		add_action( 'wp_loaded', array( $this, 'wp_loaded_actions' ) );

		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}


	public function admin_menu() {

		$this->pages['main_page'] = add_menu_page( __( 'WebPace Google Maps', 'webpace_maps' ), __( 'Google Maps', 'webpace_maps' ), 'manage_options', 'webpace_maps', array(
			$this,
			'init_main_page'
		), HUGEIT_MAPS_IMAGES_URL . 'gmaps-builder-20.png' );

	}

	public function print_error( $error_message, $die = true ) {

		$str = sprintf( '<div class="error"><p>%s&nbsp;<a href="#" onclick="window.history.back()">%s</a></p></div>', $error_message, __( 'Go back', 'webpace_map' ) );

		if ( $die ) {

			wp_die( $str );

		} else {
			echo $str;
		}

	}


	public function init_main_page() {
		$api_key = Webpace_Maps()->get_api_key();

        Webpace_Maps_Template_Loader::get_template('admin/free-banner.php');

        if ( is_null( $api_key ) || empty( $api_key ) ) {

			Webpace_Maps_Template_Loader::get_template( 'admin/api-key-not.php' );

		}

		if ( ! isset( $_GET['task'] ) ) {

			Webpace_Maps_Template_Loader::get_template( 'admin/gmaps-list.php' );

		} else {

			$task = sanitize_text_field( $_GET['task'] );

			switch ( $task ) {

				case 'edit_map':

					if ( ! isset( $_GET['id'] ) ) {

						Webpace_Maps()->admin->print_error( __( 'Missing "id" parameter.', 'webpace_map' ) );

					}

					$id = absint ( $_GET['id'] );

					if ( ! $id ) {

						Webpace_Maps()->admin->print_error( __( '"id" parameter must be not negative integer.', 'webpace_map' ) );

					}

					if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'webpace_maps_edit_map_' . $id ) ) {

						Webpace_Maps()->admin->print_error( __( 'Security check failed.', 'webpace_map' ) );

					}

					$map = new Webpace_Maps_Map( $id );




					Webpace_Maps_Template_Loader::get_template( 'admin/edit-gmaps.php', array( 'map' => $map ) );

					break;
			}

		}

	}

	/**
	 * Handle some actions when wordpress is loaded
	 * We call this functions when wp is loaded as we will redirect user to another page so we have to do our staff before headers are sent that's why we use wp_loaded hook
	 */
	public function wp_loaded_actions() {

		if ( ! isset( $_GET['page'] ) || $_GET['page'] !== 'webpace_maps' || ! isset( $_GET['task'] ) ) {
			return;
		}

		$task = sanitize_text_field( $_GET['task'] );

		switch ( $task ) {

			case "create_new_map":

				if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'webpace_maps_create_new_map' ) ) {
					wp_die( sprintf( '<div class="error"><p>%s</p></div>', __( 'Security check failed.', 'webpace_map' ) ) );
				}

				$new_map = $this->create_new_map();

				/**
				 * after the map is created we need to redirect user to the edit page
				 */
				if ( $new_map && is_int( $new_map ) ) {

					$location = admin_url( 'admin.php?page=webpace_maps&task=edit_map&id=' . $new_map );

					$location = wp_nonce_url( $location, 'webpace_maps_edit_map_' . $new_map );

					$location = html_entity_decode( $location );

                    header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                    header("Location: $location");

					exit;

				} else {

					wp_die( __( 'Problems occured while creating new map.', 'webpace_map' ) );

				}

				break;
			case "remove_map":
				if ( ! isset( $_GET['id'] ) ) {
					wp_die( __( '"id" parameter is required', 'webpace_map' ) );
				}

				$id = absint ( $_GET['id'] );

				if ( absint( $id ) != $id ) {
					wp_die( __( '"id" parameter must be non negative integer', 'webpace_map' ) );
				}

				if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce'], 'webpace_maps_remove_map_' . $id ) ) {
					wp_die( __( 'Security check failed', 'webpace_map' ) );
				}

				Webpace_Maps_Map::delete( $id );

				$location = admin_url( 'admin.php?page=webpace_maps' );


                header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
                header("Location: $location");

                exit;

				break;

		}

	}

	/**
	 * Create a new map
	 */
	private function create_new_map() {
		$new_map = new Webpace_Maps_Map();

		$saved = $new_map->save();

		return $saved;
	}
	

}