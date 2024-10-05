<?php

define("RAYIUM_URL", get_template_directory_uri());
define("RAYIUM_STYLE", get_stylesheet_uri());
define("RAYIUM_PARCHLINUX_VERSION", '1.0.0');
define("RAYIUM_PARCHLINUX_ASSETS_VERSION", defined('WP_DEBUG') && WP_DEBUG ? time() : RAYIUM_COURSE_VERSION);

// Calling Files style

function Rayium_Styles(): void {

	$css_deps = [];

    wp_enqueue_style(
        'bootstrap',
        RAYIUM_URL . '/css/bootstrap.min.css',
        '5.3.0'
    );

    wp_enqueue_style(
        'all',
        RAYIUM_URL . '/css/all.css',
        '6.5.0'
    );

    wp_enqueue_style(
        'like',
        RAYIUM_URL . '/css/likes.css',
        '2.0.0'
    );

    wp_enqueue_style(
        'style',
        RAYIUM_STYLE,
        RAYIUM_PARCHLINUX_VERSION
    );

}
add_action('wp_head', 'Rayium_Styles', 1);

// Calling Files Scripts

function Rayium_Scripts(): void {

    $deps = ['jquery'];

    wp_enqueue_script(
        'main',
        RAYIUM_URL . '/js/main.js',
        $deps,
	    RAYIUM_PARCHLINUX_ASSETS_VERSION,
        true
    );

    wp_enqueue_script(
        'bootstrap',
        RAYIUM_URL . '/js/bootstrap.bundle.min.js',
        '5.3.0',
        true
    );

    wp_enqueue_script(
        'likes',
        RAYIUM_URL . '/js/likes.js',
        $deps,
        '5.0.0',
        true
    );

    wp_enqueue_script(
        'darkmode',
        RAYIUM_URL . '/js/darkmode.js',
        $deps,
        '5.0.0',
        true
    );

}
add_action('wp_footer', 'Rayium_Scripts');


