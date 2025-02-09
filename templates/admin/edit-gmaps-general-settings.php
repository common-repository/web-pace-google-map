<?php
/**
 * @var $map Webpace_Maps_Map
 */

?>

<li class="editing_section ">
	<div class="editing_heading">
		<span class="heading_icon"><img src="<?php echo HUGEIT_MAPS_IMAGES_URL.'menu-icons/dashboard.svg'; ?>" width="20" /></span>
		<?php _e( 'General Options', 'webpace_map' ); ?>
		<div class="help">?
			<div class="help-block">
				<span class="pnt"></span>
				<p><?php _e( 'General Options of current map', 'webpace_map' ); ?></p>
			</div>
		</div>
		<span class="heading_arrow"></span>
	</div>
	<div class="edit_content map_options hide">
		<form action="" method="post">
			<ul>
				<li>
					<label for="map_name"><?php _e( 'Map Name', 'webpace_map' ); ?></label>
					<input type="text" name="map_name" id="map_name" value="<?php echo $map->get_name(); ?>"/>
				</li>
				<li>
					<label for="map_controller_pan"><?php _e( 'Enable Pan-Controller', 'webpace_map' ); ?></label>
					<input type="checkbox" class="map_controller_input" id="map_controller_pan" name="map_controller_pan" value="1" <?php checked( $map->get_pan_controller(), 1 ); ?> />
				</li>
				<li>
					<label for="map_controller_zoom"><?php _e( 'Enable Zoom-Controller', 'webpace_map' ); ?></label>
					<input type="checkbox" class="map_controller_input" id="map_controller_zoom" name="map_controller_zoom" value="1" <?php checked( $map->get_zoom_controller(), 1 ); ?> />
				</li>
				<li>
					<label for="map_controller_type"><?php _e( 'Enable Map-Type-Controller', 'webpace_map' ); ?></label>
					<input type="checkbox" class="map_controller_input" id="map_controller_type" name="map_controller_type"
					       value="1" <?php checked( $map->get_type_controller(), 1 ); ?> />
				</li>
				<li>
					<label for="map_controller_scale"><?php _e( 'Enable Scale-Controller', 'webpace_map' ); ?></label>
					<input type="checkbox" class="map_controller_input" id="map_controller_scale" name="map_controller_scale" value="1" <?php checked( $map->get_scale_controller(), 1 ); ?> />
				</li>
				<li>
					<label for="map_controller_street_view"><?php _e( 'Enable Street-View-Controlle', 'webpace_map' ); ?>r</label>
					<input type="checkbox" class="map_controller_input" id="map_controller_street_view"
					       name="map_controller_street_view" value="1" <?php checked( $map->get_street_view_controller(), 1 ); ?> />
				</li>
				<li>
					<label for="map_controller_overview"><?php _e( 'Enable Overview-Map-Controller', 'webpace_map' ); ?></label>
					<input type="checkbox" class="map_controller_input" id="map_controller_overview" name="map_controller_overview" value="1" <?php checked( $map->get_overview_map_controller(), 1 ); ?> />
				</li>
				<li>
					<label for="map_zoom"><?php _e( 'Default Zoom', 'webpace_map' ); ?></label>
					<div class="slider-container" style="float:left; width:55%; height:25px; ">
						<input name="map_zoom" id="map_zoom" data-slider-highlight="true"
						       data-slider-values="0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21" type="text"
						       data-slider="true" value="<?php echo $map->get_zoom(); ?>"/>
						<span style="position:absolute; top: 4px;left: 160px;"><?php echo $map->get_zoom(); ?></span>
					</div>
				</li>
				<li>
					<label for="min_zoom"><?php _e( 'Minimum Zoom', 'webpace_map' ); ?></label>
					<div class="slider-container" style="float:left; width:55%; height:25px; ">
						<input name="min_zoom" id="min_zoom" data-slider-highlight="true"
						       data-slider-values="0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21" type="text"
						       data-slider="true" value="<?php echo $map->get_min_zoom(); ?>"/>
						<span style="position:absolute; top: 4px;left: 160px;"><?php echo $map->get_min_zoom(); ?></span>
					</div>
				</li>
				<li>
					<label for="max_zoom"><?php _e( 'Maximum Zoom', 'webpace_map' ); ?></label>
					<div class="slider-container" style="float:left; width:55%; height:25px; ">
						<input name="max_zoom" id="max_zoom" data-slider-highlight="true"
						       data-slider-values="0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21" type="text"
						       data-slider="true" value="<?php echo $map->get_max_zoom(); ?>"/>
						<span style="position:absolute; top: 4px;left: 160px;"><?php echo $map->get_max_zoom(); ?></span>
					</div>
				</li>
				<li>
					<label for="map_center_addr"><?php _e( 'Center Address', 'webpace_map' ); ?></label>
					<input type="text" name="map_center_addr" id="map_center_addr"/>
				</li>
				<li>
					<label for="map_center_lat"><?php _e( 'Center Latitude', 'webpace_map' ); ?></label>
					<input type="text" name="map_center_lat" id="map_center_lat" value="<?php echo $map->get_center_lat(); ?>"/>
				</li>
				<li>
					<label for="map_center_lng"><?php _e( 'Center Longitude', 'webpace_map' ); ?></label>
					<input type="text" name="map_center_lng" id="map_center_lng" value="<?php echo $map->get_center_lng(); ?>"/>
				</li>
				<li>
					<label for="map_width"><?php _e( 'Map Width', 'webpace_map' ); ?></label>
					<div class="slider-container" style="float:left; width:55%; height:25px; ">
						<input class="front_end_input_options" name="map_width" id="map_width" data-slider-highlight="true"
						       data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true"
						       value="<?php echo $map->get_width(); ?>"/>
						<span style="position:absolute; top: 4px;left: 160px;"><?php echo $map->get_width(); ?>%</span>
					</div>
				</li>
				<li>
					<label for="map_height"><?php _e( 'Map Height', 'webpace_map' ); ?></label>
					<input class="front_end_input_options" type="number" name="map_height" id="map_height"
					       value="<?php echo $map->get_height(); ?>"/>
				</li>
				<li>
					<label for="map_align"><?php _e( 'Map Align', 'webpace_map' ); ?></label>
					<select class="front_end_input_options" name="map_align" id="map_align">
						<option value="left" <?php selected( $map->get_align(), 'left' ); ?>><?php _e( 'left', 'webpace_map' ); ?></option>
						<option value="center" <?php selected( $map->get_align(), 'center' ); ?>><?php _e( 'center', 'webpace_map' ); ?></option>
						<option value="right" <?php selected( $map->get_align(), 'right' ); ?>><?php _e( 'right', 'webpace_map' ); ?></option>
					</select>
				</li>
				<li>
					<label for="map_border_radius"><?php _e( 'Border Radius', 'webpace_map' ); ?></label>
					<input class="front_end_input_options" type="number" name="map_border_radius" id="map_border_radius" value="<?php echo $map->get_border_radius(); ?>"/>
				</li>
				<li>
					<label for="open_infowindows_onload"><?php _e( 'Open infowindows on load', 'webpace_map' ); ?></label>
					<input type="checkbox" value="1" id="open_infowindows_onload" name="open_infowindows_onload" <?php checked( $map->get_open_infowindows_onload(), 1 ); ?> />
				</li>
                <li class="pro">
                    <label for="open_infowindows_onload"><?php _e( 'Enable Full Screen', 'webpace_map' ); ?></label>
                    <input type="checkbox" value="1" id="" name="" checked disabled />
                </li>
				<li class="pro">
					<label for="map_type"><?php _e( 'Map Type', 'webpace_map' ); ?></label>
					<select disabled id="map_type" name="map_type">
						<option value="ROADMAP" <?php selected($map->get_type(), 'ROADMAP' ); ?> >Roadmap</option>
						<option value="SATELLITE" <?php selected($map->get_type(), 'SATELLITE' ); ?> >Satellite</option>
						<option value="HYBRID" <?php selected($map->get_type(), 'HYBRID' ); ?> >Hybrid</option>
						<option value="TERRAIN" <?php selected($map->get_type(), 'TERRAIN' ); ?> >Terrain</option>
					</select>
				</li>
				<li class="pro">
					<label for="map_infowindow_type"><?php _e( 'Marker Infowindow Opens On', 'webpace_map' ); ?></label>
					<select disabled id="map_infowindow_type" name="map_infowindow_type">
						<option value="click" <?php selected($map->get_info_type(), 'click' ); ?> ><?php _e( 'Click', 'webpace_map' ); ?></option>
						<option value="hover" <?php selected($map->get_info_type(), 'hover' ); ?> ><?php _e( 'Hover', 'webpace_map' ); ?></option>
					</select>
				</li>
				<li class="pro">
					<label for="wheel_scroll"><?php _e( 'Wheel Scrolling', 'webpace_map' ); ?></label>
					<select disabled class="front_end_input_options" name="wheel_scroll" id="wheel_scroll">
						<option value="1" <?php selected( $map->get_wheel_scroll(), 1 ); ?>><?php _e( 'On', 'webpace_map' ); ?></option>
						<option value="0" <?php selected( $map->get_wheel_scroll(), 0 ); ?>><?php _e( 'Off', 'webpace_map' ); ?></option>
					</select>
				</li>
				<li class="pro">
					<label for="map_draggable"><?php _e( 'Map Draggable', 'webpace_map' ); ?></label>
					<select disabled class="front_end_input_options" name="map_draggable" id="map_draggable">
						<option value="1" <?php selected( $map->get_draggable(), 1 ); ?>><?php _e( 'On', 'webpace_map' ); ?></option>
						<option value="0" <?php selected( $map->get_draggable(), 0 ); ?>><?php _e( 'Off', 'webpace_map' ); ?></option>
					</select>
				</li>
				<li class="pro">
					<label for="map_language"><?php _e( 'Map Language', 'webpace_map' ); ?></label>
					<select disabled class="front_end_input_options" id="map_language" name="map_language">

						<?php
						$languages = Webpace_Maps_Map::get_available_languages();

						foreach( $languages as $lang ){
							echo '<option value="'.$lang.'" '.selected( $map->get_language() ).' >'.$lang.'</option>';
						}
						?>
					</select>
				</li>
				<li class="pro">
					<label for="map_animation"><?php _e( 'Map Animation', 'webpace_map' ); ?></label>
					<select disabled id="map_animation" name="map_animation">
						<option value="none" <?php selected( $map->get_animation(), 'none' ); ?>><?php _e( 'None', 'webpace_map' ); ?></option>

						<?php

						$groups = array(
							'attention_seekers' => __( 'Attention Seekers', 'webpace_map' ),
							'bouncing_entrances' => __( 'Bouncing Entrances', 'webpace_map' ),
							'fading_entrances' => __( 'Fading Entrances', 'webpace_map' ),
							'flippers' => __( 'Flippers', 'webpace_map' ),
							'rotating_entrances' => __( 'Rotating Entrances', 'webpace_map' ),
							'sliding_entrances' => __( 'Sliding Entrances', 'webpace_map' ),
							'zooming_entrances' => __( 'Zooming Entrances', 'webpace_map' )
						);

						foreach( $groups as $group=>$group_name ){

							echo '<optgroup label="'.$group_name.'">';

							$group_anims = Webpace_Maps_Map::get_available_animations( $group );

							foreach( $group_anims as $group_anim ){
								echo '<option value="'.$group_anim.'" '.selected( $map->get_animation(), $group_anim ).'>'.$group_anim.'</option>';
							}

							echo '</optgroup>';

						}
						?>
					</select>
				</li>
			</ul>
			<span class="spinner"></span>
			<input type="submit" class="button-primary" name="map_submit" id="map_submit" value="Save"/>
		</form>
	</div>
</li>
