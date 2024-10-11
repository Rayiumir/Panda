<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( 'name' ) | wp_title() ?></title>
    <?php 
        $favicon = ot_get_option('favicon');
        if(!empty($favicon)) {
            if ( ot_get_option('off_2') != "off" ) {
    ?>
    <link rel="icon" href="<?php echo $favicon; ?>" type="image/gif" sizes="16x16">
    <?php   }   }   ?>

    <!-- Styles -->
    <?php wp_head()?>
</head>

<body <?php body_class() ?>>