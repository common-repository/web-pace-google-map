<?php
/**
 * Template for API Key form
 */

$api_key = Webpace_Maps()->get_api_key();

?>
<form class="webpace_map_main_api_form <?php if ( is_null($api_key) || $api_key == '' ) { echo 'hide'; } ?>" action="" method="post">
	<label class="webpace_mui_text">
		<span class="webpace_mui_label mui_label_mt11"><?php _e( 'API KEY', 'webpace_map' ); ?></span>
		<div class="webpace_mui_input_block">
			<input name="webpace_map_api_key_input" class="webpace_map_api_key_input" value="<?php echo $api_key; ?>"
			       required="required" type="text"><span class="control_title"><?php _e( 'Input the api key here', 'webpace_map' ); ?></span>
			<div class="webpace_mui_bar"></div>
		</div>
	</label>
	<span class="webpace_map_apply_action"><button class="webpace_map_save_api_key_button webpace_mui_btn webpace_mui_btn_raised_green"><?php _e( 'Save', 'webpace_map' ); ?></button><span class="spinner"></span></span>
</form>
