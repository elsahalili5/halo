<?php

/**
 * Template Name: Teams
 */
get_header(); ?>
<div class="content-wrapper">
    <div class="container">
        <div class="teams-section">
            <h1>F1 Teams 2024</h1>
            <div class="teams-container">
                <?php
                $args = array(
                    'post_type' => 'teams-post',
                    'posts_per_page' => -1,
                );
                $teams_query = new WP_Query($args);
                $team_number = 1;

                if ($teams_query->have_posts()) :
                    while ($teams_query->have_posts()) : $teams_query->the_post();
                        $team_id = get_the_ID();
                        $driver_1_name = get_field('driver_1_name');
                        $driver_1_image = get_field('driver_1_image');
                        $driver_2_name = get_field('driver_2_name');
                        $driver_2_image = get_field('driver_2_image');
                        $car_image = get_field('car_image');
                ?>
                        <div class="team-profile">
                            <a href="<?php the_permalink(); ?>">
                                <div class="team-info">
                                    <div class="team-number">
                                        <p><?php echo esc_html($team_number); ?></p>
                                    </div> <!-- Auto-increment number -->
                                    <div class="team-name">
                                        <p><?php the_title(); ?></p>
                                    </div>
                                    <div class="team-drivers">
                                        <div class="driver">
                                            <p><?php echo esc_html($driver_1_name); ?></p>
                                            <img src="<?php echo esc_url($driver_1_image); ?>" alt="<?php echo esc_attr($driver_1_name); ?>" />
                                        </div>
                                        <div class="driver">
                                            <p><?php echo esc_html($driver_2_name); ?></p>
                                            <img src="<?php echo esc_url($driver_2_image); ?>" alt="<?php echo esc_attr($driver_2_name); ?>" />
                                        </div>
                                    </div>
                                    <div class="team-car">
                                        <img src="<?php echo esc_url($car_image); ?>" alt="Car Image for <?php the_title(); ?>" />
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php
                        $team_number++;
                    endwhile;
                else :
                    echo '<p>No teams found.</p>';
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>