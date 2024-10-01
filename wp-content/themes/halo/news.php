<?php

/**
 * Template Name: News
 */
get_header();
?>

<div class="content-wrapper">

    <div class="container">

        <div class="news-container">
            <section class="news-wrapper">
                <?php
                $args = array(
                    'post_type' => 'news-section',
                    'posts_per_page' => -1,
                );

                $news_query = new WP_Query($args);

                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                        $news_image = get_field('news_image');
                ?>

                        <div class="news-item">
                            <a href="
                        ">
                                <?php if ($news_image): ?>
                                    <img src="<?php echo esc_url($news_image); ?>" />
                                <?php endif; ?>
                                <div class="article-wrapper">
                                    <div>
                                        <p class="article">Article</p>
                                        <p class="article-title"> <?php the_field('news_title'); ?>
                                        </p>
                                    </div>
                                    <i class="fa-solid fa-arrow-right-long arrow"></i>
                                </div>
                            </a>
                        </div>

                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No news articles found.</p>';
                endif;
                ?>
            </section>
        </div>
    </div>
</div>

<?php get_footer(); ?>