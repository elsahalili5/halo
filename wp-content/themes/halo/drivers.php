<?php

/**
 * Template Name: Drivers
 */
get_header();
?>
<div class="content-wrapper">
    <div class="container">
        <div class="drivers-section">
            <?php
            // Query to get drivers
            $args = array(
                'post_type' => 'race_teams',
                'posts_per_page' => -1,
            );

            $drivers_query = new WP_Query($args);

            if ($drivers_query->have_posts()) :
                while ($drivers_query->have_posts()) : $drivers_query->the_post();

                    // Get driver custom fields using ACF
                    $id = get_field('slug');
                    $first_name = get_field('first_name');
                    $last_name = get_field('last_name');
                    $team = get_field('team');
                    $driver_number = get_field('driver_number');
                    $driver_number_image = get_field('driver_number_image');
                    $driver_photo = get_field('driver_photo');
            ?>
                    <a href="<?php the_permalink(); ?>">
                        <div class="driver-profile">
                            <div class="driver-info">
                                <div class="driver-number">
                                </div>
                                <div class="driver-name">
                                    <p class="first-name"><?php echo esc_html($id); ?></p>
                                    <p class="first-name"><?php echo esc_html($first_name); ?></p>
                                    <p class="last-name"><?php echo esc_html($last_name); ?></p>
                                </div>
                                <div class="driver-team">
                                    <p><?php echo esc_html($team); ?></p>
                                </div>
                                <div class="images">
                                    <?php if ($driver_number_image): ?>
                                        <img src="<?php echo esc_url($driver_number_image); ?>" />
                                    <?php endif; ?>
                                    <?php if ($driver_photo): ?>
                                        <div class="driver-image">
                                            <img class="driver-photo" src="<?php echo esc_url($driver_photo); ?>" alt="<?php echo esc_attr($first_name . ' ' . $last_name); ?>" />
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </a>
            <?php
                endwhile;
            else :
                echo '<p>No drivers found</p>';
            endif;

            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>

<footer>
    <div class="footer-content">
        <div class="footer-copyright">
            &copy; 2024 Halo. All rights reserved.
        </div>
    </div>
</footer>

<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
<?php get_footer(); ?>