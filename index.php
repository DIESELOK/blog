<?php get_header(); ?>

<section class="article-section clear">
    <div class="container clear">

            <?php
                if (have_posts()):
                    while (have_posts()) : the_post(); ?>

                        <article class="post">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="post-info">Posted on <?php the_time('F j, Y'); ?></php></p>
                            <div class="thumbnail">
                                <?php the_post_thumbnail('small-thumbnails'); ?>
                            </div>
                            <?php the_excerpt(); ?>
                            <a class="excerpt-link" href="<?php the_permalink(); ?>"><span class="fa fa-arrow-circle-o-right"></span>         Read More</a>
                        </article>

                    <?php endwhile; ?>
                    <?php echo classic_pagination(); ?>
                    <?php else:
                        echo '<p>Mo content found</p>'; ?>
                <?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>
