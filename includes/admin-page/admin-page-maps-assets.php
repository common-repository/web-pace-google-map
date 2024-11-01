<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Class Webpace_Maps_Admin_Assets
 */
class Webpace_Maps_Admin_Assets {

	/**
	 * Portfolio_Gallery_Admin_Assets constructor.
	 */
	public static function init() {
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'admin_scripts' ) );
	}

	/**
	 * @param $hook
	 */
	public static function admin_styles( $hook ){

		if( $hook === Webpace_Maps()->admin->pages['main_page'] ){

			wp_enqueue_style( 'webpace_maps_admin_styles', Webpace_Maps()->plugin_url().'/assets/css/admin.style.css' );

			wp_enqueue_style( 'webpace-simple-slider', Webpace_Maps()->plugin_url().'/assets/css/simple-slider.css' );

            wp_enqueue_style( 'webpace-js-timepicker', Webpace_Maps()->plugin_url().'/assets/css/jquery.timepicker.css' );

			wp_enqueue_style( 'webpace-animate-css', Webpace_Maps()->plugin_url().'/assets/css/animate.css' );

			wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=cyrillic' );

		}



        if( in_array( $hook, array('post.php', 'post-new.php') ) ){
            wp_enqueue_style( 'webpace-simple-slider', Webpace_Maps()->plugin_url().'/assets/css/simple-slider.css' );
            wp_enqueue_style( 'webpace-js-timepicker', Webpace_Maps()->plugin_url().'/assets/css/jquery.timepicker.css' );
        }



	}

    /**
     * @param $hook
     */
	public static function admin_scripts( $hook ){

		if( $hook === Webpace_Maps()->admin->pages['main_page']  ){

            $suffix = SCRIPT_DEBUG ? '' : '.min';

			wp_enqueue_media();

            $api_key = Webpace_Maps()->get_api_key();
            if(!is_null($api_key) && $api_key != ""){
                $key_param = 'key='.$api_key.'&';
            }else{
                $key_param = '';
            }

            $lang_param = '';

            if( isset($_GET['task']) && $_GET['task'] == 'edit_map' ){
                if(isset($_GET['id']) && absint($_GET['id'])==$_GET['id']){
                    $map = new Webpace_Maps_Map( absint ($_GET['id'] ) );

                    $language = $map->get_language();

                    $lang_param = $language != 'location based' ? 'language=' . $language . '&' : '';

                }

                wp_enqueue_script( "google-maps-api", 'https://maps.googleapis.com/maps/api/js?'.$key_param.$lang_param.'libraries=places,geometry',false, null,true );

                wp_enqueue_script( "webpace-jscolor", Webpace_Maps()->plugin_url()."/assets/jscolor/jscolor$suffix.js", array( 'jquery' ), false, true );

                wp_enqueue_script( "webpace-simple-slider", Webpace_Maps()->plugin_url()."/assets/js/simple-slider.js", array( 'jquery' ), false, true );

                wp_enqueue_script( "webpace-js-timepicker", Webpace_Maps()->plugin_url()."/assets/js/jquery.timepicker.min.js", array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-accordion-sections', Webpace_Maps()->plugin_url().'/assets/js/admin/accordion-sections.js', array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-notices', Webpace_Maps()->plugin_url().'/assets/js/admin/notices.js', array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-scroll-map', Webpace_Maps()->plugin_url().'/assets/js/admin/scroll-map.js', array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-extract-to-csv', Webpace_Maps()->plugin_url().'/assets/js/admin/extract-to-csv.js', array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-copy-map', Webpace_Maps()->plugin_url().'/assets/js/admin/copy-map.js', array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-maps', Webpace_Maps()->plugin_url().'/assets/js/admin/maps.js', array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-markers', Webpace_Maps()->plugin_url().'/assets/js/admin/markers.js', array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-polygons', Webpace_Maps()->plugin_url().'/assets/js/admin/polygons.js', array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-locator', Webpace_Maps()->plugin_url().'/assets/js/admin/locator.js', array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-polylines', Webpace_Maps()->plugin_url().'/assets/js/admin/polylines.js', array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-circles', Webpace_Maps()->plugin_url().'/assets/js/admin/circles.js', array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-maps-save', Webpace_Maps()->plugin_url().'/assets/js/admin/maps-save.js', array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-markers-save', Webpace_Maps()->plugin_url().'/assets/js/admin/markers-save.js', array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-polygons-save', Webpace_Maps()->plugin_url().'/assets/js/admin/polygons-save.js', array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-polylines-save', Webpace_Maps()->plugin_url().'/assets/js/admin/polylines-save.js', array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-circles-save', Webpace_Maps()->plugin_url().'/assets/js/admin/circles-save.js', array( 'jquery' ), false, true );

                wp_enqueue_script( 'webpace-maps-admin-locator-save', Webpace_Maps()->plugin_url().'/assets/js/admin/locator-save.js', array( 'jquery' ), false, true );
            }

            wp_enqueue_script( 'webpace-maps-admin-js', Webpace_Maps()->plugin_url().'/assets/js/admin/admin.js', array( 'jquery' ), false, true );

            wp_enqueue_script( 'webpace-maps-admin-api-key', Webpace_Maps()->plugin_url().'/assets/js/admin/api-key.js', array( 'jquery' ), false, true );
		}

        if( in_array( $hook, array('post.php', 'post-new.php') ) ){
            wp_enqueue_script( "webpace-simple-slider", Webpace_Maps()->plugin_url()."/assets/js/simple-slider.js", array( 'jquery' ), false, true );
            wp_enqueue_script( "webpace-maps-inline-popup", Webpace_Maps()->plugin_url()."/assets/js/admin/inline-popup.js", array( 'jquery' ), false, true );
            wp_enqueue_script( "webpace-js-timepicker", Webpace_Maps()->plugin_url()."/assets/js/jquery.timepicker.min.js", array( 'jquery' ), false, true );
        }

        self::localize_scripts();

	}

    /**
     * Localize scripts
     */
	private static function localize_scripts(){

        if(isset($_GET['id'])){
            $map = new Webpace_Maps_Map( absint ( $_GET['id'] ) );

            $localized_map = array(
                'id'=>$map->get_id(),
                'styling_hue'=>$map->get_styling_hue(),
                'styling_saturation'=>$map->get_styling_saturation(),
                'styling_lightness'=>$map->get_styling_lightness(),
                'styling_gamma'=>$map->get_styling_gamma(),
                'zoom'=>$map->get_zoom(),
                'type'=>$map->get_type(),
                'bike_layer'=>$map->get_bike_layer(),
                'traffic_layer'=>$map->get_traffic_layer(),
                'transit_layer'=>$map->get_transit_layer(),
                'animation'=>$map->get_animation(),
            );

        }else{
            $localized_map = array();
        }


        wp_localize_script( 'webpace-maps-inline-popup', 'inlinePopupL10n', array(
            'nonce'=>wp_create_nonce('webpace_maps_save_shortcode_options'),
        ) );
        wp_localize_script( 'webpace-maps-admin-api-key', 'apiKeyL10n', array(
            'nonce'=>wp_create_nonce('webpace_maps_save_api_key'),
        ) );
        wp_localize_script( 'webpace-maps-admin-extract-to-csv', 'extractCSVL10n', array(
            'nonce'=>wp_create_nonce('webpace_maps_extract_to_csv'),
        ) );
        wp_localize_script( 'webpace-maps-admin-maps', 'mapL10n', array(
            'map'=>$localized_map,
            'delete_nonce'=>wp_create_nonce('webpace_maps_delete_item'),
            'save_nonce'=>wp_create_nonce('webpace_maps_save_map'),
            'stylingNonce'=>wp_create_nonce( 'webpace-maps-styling-save' )
        ) );

        wp_localize_script( 'webpace-maps-admin-markers', 'markerL10n', array(
            'map'=>$localized_map,
            'nonce'=>wp_create_nonce('webpace_maps_marker'),
            'icons_url' => HUGEIT_MAPS_IMAGES_URL.'icons/',
            'admin_url' => admin_url()
        ) );

        wp_localize_script( 'webpace-maps-admin-polygons', 'polygonL10n', array(
            'map'=>$localized_map,
        ) );

        wp_localize_script( 'webpace-maps-admin-polylines', 'polylineL10n', array(
            'map'=>$localized_map,
        ) );

        wp_localize_script( 'webpace-maps-admin-locator', 'locatorL10n', array(
            'map'=>$localized_map,
            'startPointTitle' => __( 'Start Point', 'webpace_map' ),
            'invalidLocatorPoints' => __( 'Could not construct a route with the given options', 'webpace_map' )
        ) );

        wp_localize_script( 'webpace-maps-admin-circles', 'circleL10n', array('map'=>$localized_map) );

        wp_localize_script( 'webpace-maps-admin-maps-save', 'mapSaveL10n',array(
            'nonce'=>wp_create_nonce( 'webpace-maps-map-save' ),
            'stylingNonce'=>wp_create_nonce( 'webpace-maps-styling-save' )
        ) );

        wp_localize_script( 'webpace-maps-admin-markers-save', 'markerSaveL10n',array(
            'nonce'=>wp_create_nonce( 'webpace-maps-marker-save' ),
            'icons_url' => HUGEIT_MAPS_IMAGES_URL.'icons/'
        ) );

        wp_localize_script( 'webpace-maps-admin-polygons-save', 'polygonSaveL10n',array(
            'nonce'=>wp_create_nonce( 'webpace-maps-polygon-save' )
        ) );
        wp_localize_script( 'webpace-maps-admin-polylines-save', 'polylineSaveL10n',array(
            'nonce'=>wp_create_nonce( 'webpace-maps-polyline-save' )
        ) );

        wp_localize_script( 'webpace-maps-admin-circles-save', 'circleSaveL10n',array(
            'nonce'=>wp_create_nonce( 'webpace-maps-circle-save' )
        ) );

        wp_localize_script( 'webpace-maps-admin-locator-save', 'locatorSaveL10n',array(
            'nonce'=>wp_create_nonce( 'webpace-maps-locator-save' )
        ) );

    }
}