<?php
/**
 * Template for main maps list
 */
global $wpdb;

$new_map_link = admin_url( 'admin.php?page=webpace_maps&task=create_new_map' );

$new_map_link = wp_nonce_url( $new_map_link, 'webpace_maps_create_new_map' );

?>
<div class="wrap maps_list_container">
	<h1><a class="page-title-action" href="<?php echo $new_map_link; ?>"><?php _e( 'Add New Map', 'webpace_map' ); ?></a></h1>

	<table class="widefat striped fixed maps_table">
		<thead>
			<tr>
				<th scope="col" id="header-id" style="width:30px"><span><?php _e( 'ID', 'webpace_map' ); ?></span></span></th>
				<th scope="col" id="header-name" style="width:85px"><span><?php _e( 'Name', 'webpace_map' ); ?></span></th>
				<th scope="col" id="header-shortcode" style="width:85px"><span><?php _e( 'Shortcode', 'webpace_map' ); ?></span></th>
				<th style="width:40px"><?php _e( 'Delete', 'webpace_map' ); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php

		$maps = Webpace_Maps_Query::get_maps();
		if( !empty( $maps ) ){

			foreach( $maps as $map ){

				Webpace_Maps_Template_Loader::get_template( 'admin/gmaps-single-item.php', array( 'map'=>$map ) );

			}

		}else{

			Webpace_Maps_Template_Loader::get_template( 'admin/gmaps-no-items.php' );

		}

		?>
		</tbody>
		<tfoot>
			<tr>
				<th scope="col" class="footer-id" style="width:30px"><span><?php _e( 'ID', 'webpace_map' ); ?></th>
				<th scope="col" class="footer-name" style="width:85px"><span><?php _e( 'Name', 'webpace_map' ); ?></span></th>
				<th scope="col" class="footer-shortcode" style="width:85px"><span><?php _e( 'Shortcode', 'webpace_map' ); ?></span></th>
				<th style="width:40px"><?php _e( 'Delete', 'webpace_map' ); ?></th>
			</tr>
		</tfoot>
	</table>
</div>