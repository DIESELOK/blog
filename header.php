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
        <h1 class="logo"><a href="<?php echo home_url();?>"><img src="<?php echo get_template_directory_uri();?>/img/logo.png" alt="Classic"></a></h1>
        <nav class="nav-header">
            <?php
            $args = array(
                'theme_location' => 'primary'
            );
            ?>
            <?php wp_nav_menu( $args); ?>
        </nav>
    </div>

    <?php
        if (is_home() or is_page('news'));
    ?>

</header>

<ul class="category-items clear">
    <div class="container">
        <?php wp_list_categories('orderby=name&title_li='); ?>
    </div>
</ul>