<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(  ); ?>>

<header>
    <div class="container clear">
        <h1 class="logo"><a href='<?php echo home_url();?>'><img src="<?php echo get_theme_mod('theme_logo');?>" alt=''></a></h1>

        <?php get_search_form(); ?>

        <nav class="header-nav clear">
            <?php
            $args = array(
                'theme_location' => 'primary'
            );
            ?>
            <?php wp_nav_menu( $args); ?>
        </nav>
    </div>
</header>
