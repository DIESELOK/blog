<?php
get_header();
?>
    <div class="container">
        <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>
            <div class="single-page-container">
                <article class="single-post">
                    <h2 class="single-post-header"><?php the_title();?></h2>
                    <?php the_post_thumbnail();?>
                    <?php the_content(); ?>
                </article>
            </div>
        <?php endwhile; ?>

        <?php else : ?>
            <p><?php echo __('No content found'); ?></p>
        <?php endif; ?>
    </div>

<?php
get_footer();
?>