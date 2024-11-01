<?php
/**
 *
 */

$maps = Webpace_Maps_Query::get_maps();

?>
<style>
    .tb_popup_form {
        position: relative;
        display: block;
    }

    .tb_popup_form li {
        display: block;
        height: 35px;
        width: 70%;
    }

    .tb_popup_form li label {
        float: left;
        width: 35%
    }

    .tb_popup_form li input {
        float: left;
        width: 60%;
    }

    .slider, .slider-container {
        display: block;
        position: relative;
        height: 35px;
        line-height: 35px;
    }


</style>
<div id="webpace_maps" style="display:none;">
    <?php

    if( $maps && !empty($maps) ){
        Webpace_Maps_Template_Loader::get_template('admin/inline-popup-form.php', array( 'maps' => $maps ));
    }else{
        printf(
            '<p>%s<a class="button" href="%s">%s</a></p>',
            __('You have not creted any maps', 'webpace_map'),
            admin_url('admin.php?page=webpace_maps&task=create_new_map'),
            __( 'Create new Map', 'webpace_map' )
        );
    }

    ?>
</div>
