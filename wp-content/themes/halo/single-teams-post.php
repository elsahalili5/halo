<?php


get_header();
?>

<div style="margin-top: 100px;">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="post-title"><?php the_title(); ?></h1>

                <!-- Post content goes here -->
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
            </article>
    <?php endwhile;
    endif; ?>
</div>
<?php
get_footer();
?>