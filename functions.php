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

// Disable jQuery Migrate

function remove_jquery_migrate( $scripts ) {
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
        if ( $script->deps ) {
            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
        }
    }
}
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );

// Disable Site Health

add_action('wp_dashboard_setup', 'themeprefix_remove_dashboard_widget' );
function themeprefix_remove_dashboard_widget() {
    remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
}

add_action( 'admin_menu', 'remove_site_health_menu' );

function remove_site_health_menu(){
    remove_submenu_page( 'tools.php','site-health.php' );
}
add_filter( 'wp_fatal_error_handler_enabled', '__return_false' );