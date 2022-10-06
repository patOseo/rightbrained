<?php
/* Going from Gravity Form list to ACF Repeater functionality */

add_action( 'gform_advancedpostcreation_post_after_creation_2', 'list_to_repeater', 10, 4 );
function list_to_repeater( $post_id, $feed, $entry, $form ) {

/* Set the field ids for the custom list fields */
	$list_key = 'field_633ca72228c94';

/* get and unserialize the list */
	$list_ser = rgar($entry,'8');
	$list_unser = unserialize($list_ser);

/* Create the list arrays */
	foreach($list_unser as $single_item){
		$value[] = array(
/* 'full_name' and 'email' are the slugs you gave the ACF repeater fields */
			'video_url' => $single_item
		);
	}

/* Update the list fields */
	update_field($list_key, $value, $post_id);
}