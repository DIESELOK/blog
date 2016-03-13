<?php
get_header();
?>
    <section class="article-section clear">
    <div class="container">
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
                <article class="post">
                    <h2><?php the_title();?></h2>
                    <?php the_post_thumbnail();?>
                    <?php the_content(); ?>
                </article>
        <?php endwhile; ?>

        <?php else : ?>
            <p><?php echo __('No content found'); ?></p>
        <?php endif; ?>

        <section class="our-team">
            <h2 class="single-post-header"><?php echo __('Meet Our Team!'); ?></h2>
            <div class="team-container">
                <?php
                $args = array( 'post_type' => 'team' );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                    ?>
                    <article class="member-item">
                        <figure class="member-item-photo"><?php the_post_thumbnail();?></figure>
                        <h3 class="member-item-header"><?php the_title();?></h3>
                        <p class="member-item-position">
                            <?php
                            $mykey_values = get_post_custom_values( 'position' );
                            foreach ( $mykey_values as $key => $value ) {
                                echo $value;
                            }
                            ?>
                        </p>
                        <?php the_content(); ?>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

        </section>

    </div>

<?php
get_footer();
?>