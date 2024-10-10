<?php

add_action( 'admin_init', 'custom_theme_options', 1 );

function custom_theme_options() {

$saved_settings = get_option( 'option_tree_settings', array() );
$custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'header',
        'title'       => 'Header'
      ),
      array(
        'id'          => 'onoff',
        'title'       => 'Enable & Disable'
      ),
      array(
        'id'          => 'footer',
        'title'       => 'Footer'
      ),
),

'settings'        => array( 

// General
array(
    'id'          => 'favicon',
    'label'       => 'Favicon',
    'desc'        => '',
    'std'         => '',
    'type'        => 'upload',
    'section'     => 'header'
),

array(
  'id'          => 'logo_',
  'label'       => 'Logo',
  'desc'        => '',
  'std'         => '',
  'type'        => 'upload',
  'section'     => 'header'
),

array(
    'id'          => 'off_1',
    'label'       => 'Logo',
    'desc'        => '',
    'std'         => '',
    'type'        => 'on-off',
    'section'     => 'onoff'
),
array(
    'id'          => 'off_2',
    'label'       => 'Favicon',
    'desc'        => '',
    'std'         => '',
    'type'        => 'on-off',
    'section'     => 'onoff'
),
array(
    'id'          => 'off_3',
    'label'       => 'Search',
    'desc'        => '',
    'std'         => '',
    'type'        => 'on-off',
    'section'     => 'onoff'
),
array(
    'id'          => 'off_4',
    'label'       => 'Tabs Sidebar',
    'desc'        => '',
    'std'         => '',
    'type'        => 'on-off',
    'section'     => 'onoff'
),
array(
    'id'          => 'off_5',
    'label'       => 'Tags',
    'desc'        => '',
    'std'         => '',
    'type'        => 'on-off',
    'section'     => 'onoff'
),
array(
    'id'          => 'off_6',
    'label'       => 'Related Posts',
    'desc'        => '',
    'std'         => '',
    'type'        => 'on-off',
    'section'     => 'onoff'
),
array(
    'id'          => 'off_7',
    'label'       => 'Sort URL ',
    'desc'        => '',
    'std'         => '',
    'type'        => 'on-off',
    'section'     => 'onoff'
),
array(
    'id'          => 'off_8',
    'label'       => 'Author Information',
    'desc'        => '',
    'std'         => '',
    'type'        => 'on-off',
    'section'     => 'onoff'
),
array(
    'id'          => 'Sort URL',
    'label'       => 'Logo',
    'desc'        => '',
    'std'         => '',
    'type'        => 'on-off',
    'section'     => 'onoff'
),

array(
    'id'          => '',
    'label'       => __( 'Share Social', 'theme-text-domain' ),
    'type'        => 'textblock-titled',
    'section'     => 'footer',
    'operator'    => 'and'
  ),
  array(
    'id'          => 'texts_1',
    'label'       => 'Telegram',
    'desc'        => '',
    'std'         => '',
    'type'        => 'text',
    'section'     => 'footer'
  ),
  array(
    'id'          => 'texts_2',
    'label'       => 'Instagram',
    'desc'        => '',
    'std'         => '',
    'type'        => 'text',
    'section'     => 'footer'
  ),
  array(
    'id'          => 'texts_3',
    'label'       => 'Linkedin',
    'desc'        => '',
    'std'         => '',
    'type'        => 'text',
    'section'     => 'footer'
  ),

  array(
    'id'          => 'textarea_1',
    'label'       => 'About Me',
    'desc'        => '',
    'std'         => '',
    'type'        => 'textarea',
    'section'     => 'footer'
  ),


));
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
}