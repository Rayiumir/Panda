<?php
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {
  
$rayium_box = array();

if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $rayium_box );
}