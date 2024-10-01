<?php

/**
 * Template Name: home
 *
 */ get_header();

?>


<div class="container">
    <div class="home-section">
        <div class="video">
            <video id="video" autoplay loop muted class="background-video">
                <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/intro-video.mp4" type="video/mp4" />
            </video>
            <i
                class="fa-solid fa-volume-xmark mute-btn"
                id="mute-btn"
                style="color: #ffffff"></i>
        </div>
    </div>
</div>



<?php get_footer();
?>

<script>
    const video = document.getElementById("video");
    const muteBtn = document.getElementById("mute-btn");

    function toggleMute() {
        if (video.muted) {
            video.muted = false;
            muteBtn.classList.remove("fa-volume-xmark");
            muteBtn.classList.add("fa-volume-high");
        } else {
            video.muted = true;
            muteBtn.classList.remove("fa-volume-high");
            muteBtn.classList.add("fa-volume-xmark");
        }
    }

    if (video.muted) {
        muteBtn.classList.remove("fa-volume-high");
        muteBtn.classList.add("fa-volume-xmark");
    } else {
        muteBtn.classList.remove("fa-volume-xmark");
        muteBtn.classList.add("fa-volume-high");
    }

    muteBtn.addEventListener("click", toggleMute);

    window.addEventListener("scroll", () => {
        const header = document.querySelector("header");
        console.log("Scroll detected, window.scrollY:", window.scrollY);
        if (window.scrollY > 0) {
            header.classList.add("header-blur");
        } else {
            header.classList.remove("header-blur");
        }
    });
</script>