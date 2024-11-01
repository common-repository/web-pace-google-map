<?php

if( !isset( $map ) ){
	throw new Exception( '"map" variable is not reachable in maps-list-single-item template.' );
}

if( !( $map instanceof Webpace_Maps_Map ) ){
	throw new Exception( '"map" variable must be instance of Webpace_Maps_Map class.' );
}

$map_id = $map->get_id();



Webpace_Maps_Template_Loader::get_template( 'admin/api-key.php' );
?>
<form action="" method="post" name="adminform" id="adminform">

	<input type="hidden" name="map_id" id="map_id" value="<?php echo $map->get_id(); ?>"/>

	<div class="map_heading">

		<?php

		do_action( 'before_webpace_maps_edit_map_header' );

		Webpace_Maps_Template_Loader::get_template( 'admin/edit-header-gmaps-list.php', array( 'map' => $map ) );

		do_action( 'after_webpace_maps_edit_map_header' );

		?>

	</div>

</form>

<div class="admin_edit_section_container">
	<input type="hidden" id="map_id" name="map_id" value="<?php echo $map_id; ?>"/>
	<ul class="admin_edit_section">
		<?php

		Webpace_Maps_Template_Loader::get_template( 'admin/edit-gmaps-general-settings.php', array( 'map'=>$map ) );

		Webpace_Maps_Template_Loader::get_template( 'admin/edit-gmaps-markers.php', array( 'map'=>$map ) );

		Webpace_Maps_Template_Loader::get_template( 'admin/edit-gmaps-polygons.php', array( 'map'=>$map ) );

		Webpace_Maps_Template_Loader::get_template( 'admin/edit-gmaps-polylines.php', array( 'map'=>$map ) );

		Webpace_Maps_Template_Loader::get_template( 'admin/edit-gmaps-directions.php', array( 'map'=>$map ) );

		Webpace_Maps_Template_Loader::get_template( 'admin/edit-gmaps-circles.php', array( 'map' => $map ) );

		Webpace_Maps_Template_Loader::get_template( 'admin/edit-gmaps-layers.php', array( 'map' => $map ) );

		Webpace_Maps_Template_Loader::get_template( 'admin/edit-gmaps-styling.php', array( 'map' => $map ) );

        Webpace_Maps_Template_Loader::get_template( 'admin/edit-gmaps-locator.php', array( 'map' => $map ) );

		?>
	</ul>
	<div id="g_maps" >
		<?php Webpace_Maps_Template_Loader::get_template( 'admin/edit-layered-gmaps.php', array( 'map' => $map ) ); ?>

		<span class="webpace_map_map_notice_wrapper"><span class="webpace_map_map_notice"></span></span>
	</div>

	<div class="map_database_actions_section">
		<div class="button copy_map_button" data-map-id="<?php echo $map->get_id(); ?>"><?php _e( 'Create Copy Of This Map', 'webpace_map' ); ?></div>
		<div class="button extract_to_csv_button" data-map-id="<?php echo $map->get_id(); ?>"><?php _e( 'Export This Map To CSV', 'webpace_map' ); ?></div>
	</div>
	<div class="shortcode_containers">
		<div class="shortcode_container">
			<div class="shortcode_heading"><?php _e( 'Shortcode', 'webpace_map' ); ?></div>
			<p class="shortcode_description"><?php _e( 'The shortcode should be copied and inserted into any WordPress page or post.', 'webpace_map' ); ?></p>
			<div class="shortcode_view">[webpace_maps id="<?php echo $map->get_id(); ?>"]</div>
		</div>
		<div class="shortcode_container">
			<div class="shortcode_heading"><?php _e( 'Template Include', 'webpace_map' ); ?></div>
			<p class="shortcode_description"><?php _e( 'To demonstrate the map on your website insert the code into theme template file.', 'webpace_map' ); ?></p>
			<div class="shortcode_view">&lt;?php echo do_shortcode("[webpace_maps id='<?php echo $map->get_id(); ?>']"); ?&gt;</div>
		</div>
	</div>
</div>

