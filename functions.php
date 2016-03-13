<?php
    function theme_resources(){
        wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'theme_resources');

//navigation menu
register_nav_menus(array(
    'primary' => __( 'Header menu' ),
    'footer' => __( 'Footer Menu' ),
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
        'label'      => __('Twitter Link', 'classic'),
        'section'    => 'social_links',
        'settings'   => 'twitter',
    ));

    $wp_customize->add_setting( 'facebook' , array(
        'default'     => '',
    ) );

    $wp_customize->add_control('facebook', array(
        'label'      => __('Facebook Link', 'classic'),
        'section'    => 'social_links',
        'settings'   => 'facebook',
    ));

    $wp_customize->add_setting( 'pinterest' , array(
        'default'     => '',
    ) );

    $wp_customize->add_control('pinterest', array(
        'label'      => __('pinterest Link', 'classic'),
        'section'    => 'social_links',
        'settings'   => 'pinterest',
    ));

    $wp_customize->add_setting( 'google' , array(
        'default'     => '',
    ) );

    $wp_customize->add_control('google', array(
        'label'      => __('google Link', 'classic'),
        'section'    => 'social_links',
        'settings'   => 'google',
    ));

}
add_action( 'customize_register', 'social_links' );

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

//add comments
function classic_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        <?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
            <?php
            /* translators: 1: date, 2: time */
            printf( __('%1$s - %2$s'), get_comment_date(),  get_comment_time() ); ?></a>
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
        <br />
    <?php endif; ?>

    <?php comment_text(); ?>

    <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
        </div>
    <?php endif; ?>
    <?php
}

/* Our Team Post Type */
add_action('init', 'team_register');
function team_register() {
    $args = array(
        'label' => __('Team'),
        'singular_label' => __('Team member'),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'custom-fields', 'editor', 'thumbnail')
    );
    register_post_type( 'team' , $args );
}