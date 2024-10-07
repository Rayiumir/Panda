<?php

// Call Files

require_once ('inc/enqueue.php');
require_once ('like.php');
require_once ('navbar.php');

// Enable Post Thumbnails

if (function_exists('add_theme_support')) {
    add_theme_support( 'post-thumbnails' );
}

// Enable Menus

register_nav_menu('menu-one', 'Menu First');

// View Posts

function set_post_view_custom_field() {
    if ( is_single() ) {
        global $post;
        $post_id = $post->ID;
        $count = 1;
        $post_view_count = get_post_meta( $post_id, 'post_view_count', true );
        if ( $post_view_count ) {
            $count = $post_view_count + 1;
        }
    update_post_meta( $post_id, 'post_view_count', $count );
    }
}
add_action( 'wp_head', 'set_post_view_custom_field' );

function add_post_view_count_column( $columns ) {
    if( is_array( $columns ) && ! isset( $columns['post_view_count'] ) )
        $columns[ 'post_view_count' ] = 'تعداد بازدید';
    return $columns;
}
add_filter( 'manage_posts_columns', 'add_post_view_count_column' );

function set_post_view_count_column( $column_name, $post_ID ) {
    if ( $column_name == 'post_view_count' ) {
        $count = get_post_meta( $post_ID, 'post_view_count', true );
        echo $count ? $count : 0;
    }
}
add_action( 'manage_posts_custom_column', 'set_post_view_count_column', 10, 2);

function get_post_view_count( $post_id ){
    return get_post_meta( $post_id, 'post_view_count', true );
}