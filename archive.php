<?php get_header(); ?>
<section class="article-section clear">
    <div class="container clear">
        <?php
        if (have_posts()):
            while (have_posts()) : the_post(); ?>

                <article class="post">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="post-info">Posted on <?php the_time('F j, Y'); ?></php></p>

                    <?php the_content(); ?>
                </article>

            <?php endwhile;

        else:
            echo '<p>Mo content found</p>';
        endif;
        ?>
    </div>
</section>
<?php get_footer(); ?>