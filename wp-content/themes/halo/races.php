<?php

/**
 * Template Name: Races
 */
get_header();
?>

<div class="swiper mySwiper">
    <div class="swiper-pagination"></div>
    <div class="swiper-wrapper">

        <?php
        $race_dates = get_field('race_dates');
        $race_dates_array = !empty($race_dates) ? explode(', ', $race_dates) : []; // Ensure it's an array even if empty</p>
        $args = array(
            'post_type' => 'races-post',
            'posts_per_page' => -1,
        );

        $races_query = new WP_Query($args);

        if ($races_query->have_posts()) :
            while ($races_query->have_posts()) : $races_query->the_post();
                $race_image = get_field('race_image');
        ?>

                <div class="swiper-slide">
                    <?php if ($race_image): ?>

                        <img src="<?php echo esc_url($race_image); ?>" />
                    <?php endif; ?>
                    <p> <?php the_field('race_dates'); ?></p>

                </div>
        <?php

            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No races found.</p>';
        endif;
        ?>
    </div>

</div>

<script src=" https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var slideDates = [
        "20 Sep", "18 Oct", "25 Oct", "01 Nov", "22 Nov", "29 Nov", "06 Dec" // Example dates for pagination
    ];

    var swiper = new Swiper(".mySwiper", {
        direction: "vertical",
        slidesPerView: 1,
        spaceBetween: 30,
        mousewheel: true,
        centeredSlides: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            renderBullet: function(index, className) {
                const [day, month] = slideDates[index].split(" ");
                return (
                    '<span class="' + className + '">' +
                    '<span class="day">' + day + "</span>" +
                    '<span class="month">' + month + "</span>" +
                    '</span>'
                );
            }
        }
    });
</script>
<!-- 
<script>
    var raceDates = <?php echo json_encode($race_dates_array); ?>;
    console.log(raceDates); // Check if slideDates is populated correctly

    var swiper = new Swiper(".mySwiper", {
        direction: "vertical",
        slidesPerView: 1,
        spaceBetween: 30,
        mousewheel: true,
        centeredSlides: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            renderBullet: function(index, className) {
                if (raceDates[index]) {
                    const [day, month] = raceDates[index].split(" ");
                    return (
                        '<span class="' + className + '">' +
                        '<span class="day">' + day + '</span>' +
                        '<span class="month">' + month + '</span>' +
                        '</span>'
                    );
                }
            }
        }
    });
</script> -->
<?php
get_footer();
?>