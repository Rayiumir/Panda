<?php

// Call Files

require_once ('inc/enqueue.php');
require_once ('like.php');
require_once ('navbar.php');
require_once ('pagination.php');

// Enable Post Thumbnails

if (function_exists('add_theme_support')) {
    add_theme_support( 'post-thumbnails' );
}

// Enable Menus

register_nav_menu('menu-one', 'Menu Header');
register_nav_menu('menu-two', 'Menu Footer');

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

// Add Table Of Contents

function add_table_of_contents($content) {
    if (is_singular('post') && is_main_query()) {
        $pattern = '/<h([2-6]).*?>(.*?)<\/h[2-6]>/';
        if (preg_match_all($pattern, $content, $matches, PREG_SET_ORDER)) {
            $output = '<div class="card mt-4 mb-4 rounded-5"><details class="js-list">';
            $output .= '<summary class="title js-title"><i class="fa-light fa-list-dots"></i> <h3 class="fs-5 mt-1">فهرست محتوا</h3> <span class="icon"></span></summary>';
            $output .= '<div class="content js-content"><ul class="mt-3">';
            foreach ($matches as $match) {
                $level = $match[1];
                $title = $match[2];
                $slug = sanitize_title($title);
                $output .= '<li class="mb-2 toc-level-' . $level . '"><a href="#' . $slug . '">' . $title . '</a></li>';
                $content = str_replace($match[0], '<h' . $level . ' id="' . $slug . '">' . $title . '</h' . $level . '>', $content);
            }
            $output .= '</ul></div>';
            $output .= '</details></div>';
            $content = $output . $content;
        }
    }
    return $content;
}

// Estimate Study Duration

function estimate_study_duration(){
    $content_text           = strip_tags( get_the_content() );
    $content_words          = explode( ' ', $content_text );
    $word_count             = count( $content_words );
    $estimate_duration      = round( $word_count / 200 );
    $estimate_duration_html = '<p>';
        $estimate_duration_html.= '';
        $estimate_duration_html.= $estimate_duration . ' Minutes';
    $estimate_duration_html.= '</p>';
    return $estimate_duration_html;
}
add_shortcode('studyduration', 'estimate_study_duration');

// Widgets Sidebar Right

function Rayium_widgets_init()
{
    register_sidebar(
        array(
            'name'=>'Sidebar Right',
            'id'=>'sidebar',
            'before_widget'=>'<div class="card rounded-4 shadow-sm mb-3"><div class="card-body">',
            'after_widget'=>'</div></div>',
            'before_title'  => '<h1 class="fs-5 fw-bold mb-3">',
		    'after_title'   => '</h1>',
        )
    );
}
add_action('widgets_init','Rayium_widgets_init');


// Calling Option Tree

add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_meta_boxes', '__return_true' );
include_once( 'option/option-tree/ot-loader.php' );
include_once( 'option/theme-options.php' );
include_once( 'option/theme-metabox.php' );