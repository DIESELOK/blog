<?php get_header(); ?>

<div class="container clear">
<main class="main-content clear">
    <?php
    // the query to set the posts per page to 3
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array('posts_per_page' => 4, 'paged' => $paged );
    query_posts($args); ?>

    <section class="slider">
        <ul class="bxslider">

                <?php
                $args = array( 'post_type' => 'slider' );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                    ?>
                <li>
                    <article class="slider-item">
                        <figure class="slider-item-photo"><?php the_post_thumbnail('banner-thumbnails');?></figure>
                        <div class="description-block">
                            <h3 class="slider-item-header"><?php the_title();?></h3>
                            <?php the_content(); ?>
                        </div>
                    </article>

                    <?php endwhile; ?>
                </li>
        </ul>
    </section>

    <section class="article-section clear">
        <h2>Latest Blog Post</h2>
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
                        <?php the_excerpt(); ?>
                        <a class="excerpt-link" href="<?php the_permalink(); ?>">Continue Reading<span class="fa fa-angle-right"></span></a>
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
