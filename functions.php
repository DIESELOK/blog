<?php
function theme_resources(){
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'theme_resources');

//add featured image support
function classic_setup(){
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnails', 328, 228, true);
    add_image_size('banner-thumbnails', 692, 250, true);
}
add_action('after_setup_theme', 'classic_setup');

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
        .header-nav,
        .excerpt-link,
        .widget_text button,
        #recent-posts-3 ul li a:hover,
        .count,
        #categories-3 ul li:hover { background:<?php echo get_theme_mod('theme_color', '#000000'); ?>; }
        .main-content .slider .description-block {border-top-color:<?php echo get_theme_mod('theme_color', '#000000'); ?>;}
    </style>
    <?php
}
add_action( 'wp_head', 'blog_customize_css');

//add slider post type
add_action('init', 'slider_register');
function slider_register() {
    $args = array(
        'label' => __('Slider'),
        'singular_label' => __('Slider Item'),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'custom-fields', 'editor', 'thumbnail')
    );
    register_post_type( 'slider' , $args );
}

// add pagination
function blog_pagination(){
    $pagination = get_the_posts_pagination( array(
        'mid_size' => 1,
        'prev_text' => __( '<span class="fa fa-chevron-left"></span>', 'textdomain' ),
        'next_text' => __( '<span class="fa fa-chevron-right"></span>', 'textdomain' ),
        'screen_reader_text' => __( ' ', 'textdomain' ),
    ) );
    echo $pagination;
}

// Add Widget Areas
function ourWidgetsInit() {
    register_sidebar( array(
        'name' => 'Sidebar',
        'id' => 'main_sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));
}
add_action('widgets_init', 'ourWidgetsInit');

// Category count in <span>
function add_span_cat_count($links) {
    $links = str_replace('</a> (', '</a> <span class="count">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}
add_filter('wp_list_categories', 'add_span_cat_count');