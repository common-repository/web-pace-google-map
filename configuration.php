<?php
/**
 * Plugin configurations
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$GLOBALS['webpace_maps_aliases'] = array(
    'Webpace_Maps_Map_Interface' => 'includes/views/view-webpace-maps-map',
    'Webpace_Maps_Marker_Interface' => 'includes/views/view-webpace-maps-marker',
    'Webpace_Maps_Polygon_Interface' => 'includes/views/view-webpace-maps-polygon',
    'Webpace_Maps_Polyline_Interface' => 'includes/views/view-webpace-maps-polyline',
    'Webpace_Maps_Circle_Interface' => 'includes/views/view-webpace-maps-circle',
    'Webpace_Maps_Direction_Interface' => 'includes/views/view-webpace-maps-direction',
    'Webpace_Maps_Locator_Interface' => 'includes/views/view-webpace-maps-locator',
    'Webpace_Maps_Query' => 'includes/class/class-maps-query',
    'Webpace_Maps_Template_Loader' => 'includes/class/class-maps-template-loader',
    'Webpace_Maps_Map' => 'includes/class/class-maps-map',
    'Webpace_Maps_Marker' => 'includes/class/class-maps-marker',
    'Webpace_Maps_Polygon' => 'includes/class/class-maps-polygon',
    'Webpace_Maps_Polyline' => 'includes/class/class-maps-polyline',
    'Webpace_Maps_Circle' => 'includes/class/class-maps-circle',
    'Webpace_Maps_Direction' => 'includes/class/class-maps-direction',
    'Webpace_Maps_Locator' => 'includes/class/class-maps-locator',
    'Webpace_Maps_Install' => 'includes/class/class-maps-install',
    'Webpace_Maps_DB_Refactor' => 'includes/class/class-maps-db-refactor',
    'Webpace_Maps_Shortcode' => 'includes/class/class-maps-shortcode',
    'Webpace_Maps_Frontend_Scripts' => 'includes/class/class-maps-frontend-scripts',
    'Webpace_Maps_Admin' => 'includes/admin-page/admin-page-maps',
    'Webpace_Maps_Admin_Assets' => 'includes/admin-page/admin-page-maps-assets',
    'Webpace_Maps_Ajax' => 'includes/class/class-maps-ajax',
    'Webpace_Maps_Widgets' => 'includes/class/class-maps-widgets',
    'Webpace_Maps_Widget' => 'includes/class/class-maps-widget',
);

/**
 * @param $classname
 * @throws Exception
 */
function webpace_maps_autoload( $classname ){
    global $webpace_maps_aliases;

    /**
     * We do not touch classes that are not related to us
     */
    if( !strstr( $classname, 'Webpace_Maps_' ) ){
        return;
    }

    if( ! key_exists( $classname, $webpace_maps_aliases ) ){
        throw new Exception( 'trying to load "'.$classname.'" class that is not registered in config file.' );
    }

    $path = Webpace_Maps()->plugin_path().'/'.$webpace_maps_aliases[$classname].'.php';

    if( !file_exists( $path ) ){

        throw new Exception( 'the given path for class "'.$classname.'" is wrong, trying to load from '.$path );

    }

    require $path;

    if( !interface_exists( $classname ) && !class_exists( $classname ) ){

        throw new Exception( 'The class "'.$classname.'" is not declared in "'.$path.'" file.' );

    }
}



if( function_exists( 'spl_autoload_register' ) ){

    spl_autoload_register( 'webpace_maps_autoload' );

}elseif( isset( $GLOBALS['_wp_spl_autoloaders'] ) ){

    array_push($GLOBALS['_wp_spl_autoloaders'], 'webpace_maps_autoload');

}else{

    throw new Exception( 'Something went wrong, looks like your server does not support autoload functionality, please check your php version and upgrade WordPress to the latest version.' );

}



