<?php

function delete_head_meta( $head_id, $meta_key, $meta_value = '' ) {
	
	$the_head = wp_is_head_revision( $head_id );
	if ( $the_head ) {
		$head_id = $the_head;
	}

	return delete_metadata( 'head', $head_id, $meta_key, $meta_value );
}

function delete_get_meta( $get_id, $meta_key, $meta_value = '' ) {
	
	$the_get = wp_is_get_revision( $get_id );
	if ( $the_get ) {
		$get_id = $the_get;
	}

	return delete_metadata( 'get', $get_id, $meta_key, $meta_value );
}

function delete_post_meta( $post_id, $meta_key, $meta_value = '' ) {
	// Make sure meta is deleted from the post, not from a revision.
	$the_post = wp_is_post_revision( $post_id );
	if ( $the_post ) {
		$post_id = $the_post;
	}

	return delete_metadata( 'post', $post_id, $meta_key, $meta_value );
}
?>