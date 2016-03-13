<?php
get_header();
?>
    <section class="article-section clear">
    <div class="container">
        <?php
            // the query to set the posts per page to 3
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array('posts_per_page' => 3, 'paged' => $paged,
                category_name => get_query_var('category_name'));
            query_posts($args); ?>

            <?php if ( have_posts() ) : while (have_posts()) : the_post(); ?>

                    <article class="post">
                        <h2 class="post-header"><a href="<?php echo the_permalink();?>"><?php the_title();?></a></h2>
                        <p class="post-info"><?php echo __('Posted on '); the_time('F j, Y'); ?></p>
                        <div class="thumbnail">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <?php the_excerpt(); ?>

                        <a class="excerpt-link" href="<?php echo the_permalink();?>"><span class="fa fa-arrow-circle-o-right"></span> Read more</a>
                    </article>

            <?php endwhile; ?>
                <!-- pagination -->
                <?php classic_pagination(); ?>

            <?php else : ?>
                <p><?php echo __('No content found'); ?></p>
            <?php endif; ?>

    </div>
    </section>

<?php
get_footer();
?>