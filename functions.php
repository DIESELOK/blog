<?php
function theme_resources(){
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'theme_resources');

//navigation menu
register_nav_menus(array(
    'primary' => __( 'Header menu' ),
));

//add social links
function social_links( $wp_customize ) {
    $wp_customize->add_section( 'social_links' , array(
        'title'      => __( 'Social Links', 'classic' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_setting( 'twitter' , array(
        'default'     => '',
    ) );

    $wp_customize->add_control('twitter', array(
        'label'      => __('Twitter Link', 'blog'),
        'section'    => 'social_links',
        'settings'   => 'twitter',
    ));

    $wp_customize->add_setting( 'facebook' , array(
        'default'     => '',
    ) );

    $wp_customize->add_control('facebook', array(
        'label'      => __('Facebook Link', 'blog'),
        'section'    => 'social_links',
        'settings'   => 'facebook',
    ));

    $wp_customize->add_setting( 'linkedin' , array(
        'default'     => '',
    ) );

    $wp_customize->add_control('linkedin', array(
        'label'      => __('linkedin Link', 'blog'),
        'section'    => 'social_links',
        'settings'   => 'linkedin',
    ));
}
add_action( 'customize_register', 'social_links' );

//add color theme, logo
function blog_customize_register( $wp_customize ) {
    //color
    $wp_customize->add_setting( 'theme_color' , array(
        'default'     => '#ffd500',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_section( 'blog_theme' , array(
        'title'      => __( 'Theme Setting', 'blog' ),
        'priority'   => 30,
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
        'label'        => __( 'Theme Color', 'blog' ),
        'section'    => 'blog_theme',
        'settings'   => 'theme_color',
    ) ) );

    //logo
    $wp_customize->add_setting( 'theme_logo' , array(
        'default'     => '',
        'transport'   => 'refresh',
    ) );
        $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'logo', array(
                'label'      => __( 'Upload a logo', 'blog' ),
                'section'    => 'blog_theme',
                'settings'   => 'theme_logo',
                'context'    => ''
            )
        )
    );
}
add_action( 'customize_register', 'blog_customize_register' );

//style color theme
function blog_customize_css()
{
    ?>
    <style type="text/css">
        .header-nav { background:<?php echo get_theme_mod('theme_color', '#000000'); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'blog_customize_css');

//add featured image support
function classic_setup(){
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnails', 328, 228, true);
    add_image_size('banner-thumbnails', 960, 360, true);
}
add_action('after_setup_theme', 'classic_setup');

// add pagination

function classic_pagination(){
    $pagination = get_the_posts_pagination( array(
        'mid_size' => 2,
        'prev_text' => __( '<span class="fa fa-chevron-left"></span>', 'textdomain' ),
        'next_text' => __( '<span class="fa fa-chevron-right"></span>', 'textdomain' ),
        'screen_reader_text' => __( ' ', 'textdomain' ),
    ) );
    echo $pagination;
}