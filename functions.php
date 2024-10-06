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