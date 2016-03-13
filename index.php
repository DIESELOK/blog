<?php get_header(); ?>

<div class="container clear">
<main class="main-content clear">
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
                echo '<p>No content found</p>'; ?>
            <?php endif; ?>
    </section>
</main>
</div>

<?php get_footer(); ?>
