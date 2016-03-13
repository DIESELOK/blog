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
                        <?php the_post_thumbnail('banner-thumbnails'); ?>
                    </div>
                    <?php the_content(); ?>

                    <section class="post-comments">
                        <h3 class="section-header">Comments</h3>
                        <ul class="commentlist">
                            <?php
                            //Gather comments for a specific page/post
                            $comments = get_comments(array(
                                'post_id' => $post->ID,
                                'status' => 'approve' //Change this to the type of comments to be displayed
                            ));
                            //Display the list of comments
                            wp_list_comments(array(
                                'per_page' => 10, //Allow comment pagination
                                'reply_text'        => '<span class="fa fa-reply"></span> Click to reply',
                                'avatar_size'       => 71,
                                'callback' => 'classic_comment',
                                'reverse_top_level' => false //Show the latest comments at the top of the list
                            ), $comments);
                            ?>
                        </ul>
                    </section>
                    <section class="leave-comment">
                        <?php
                        comments_template();
                        ?>
                    </section>
                </article>

            <?php endwhile; ?>

            <?php else:
                echo '<p>Mo content found</p>';
            endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>
