<?php get_header(); ?>
<div class="container clear">
    <main class="main-content clear">
    <section class="article-section clear">
            <?php
        if (have_posts()):
            while (have_posts()) : the_post(); ?>

                <article class="post">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <ul class="meta-info">
                        <li>
                            <span class="fa fa-comment"></span>
                            <a href="<?php the_permalink() ?>#comments">
                                <?php comments_number('No Comments yet', '1  comment', '% comments');
                                ?>
                            </a></li>
                        <li><span class="fa fa-folder-open"></span><?php echo the_category(); ?></li>
                    </ul>

                    <div class="date-wrap">
                        <time>
                            <p class="post-date"><?php the_time('j'); ?></p>
                            <p class="post-month"><?php the_time('F'); ?></p>
                        </time>
                    </div>
                    <?php the_content(); ?>
                </article>

            <?php endwhile; ?>

            <?php echo blog_pagination(); ?>

        <?php else:
            echo '<p>No content found</p>'; ?>
        <?php endif; ?>
    </section>
    </main>

    <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
