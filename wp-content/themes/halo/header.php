<?php

/**
 * Header file for Halo
 *
 *
 * @package WordPress
 * @subpackage Halo
 */

?>

<!DOCTYPE html>
<html style="margin-top: 0px!important">

<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />
    <title>
        Halo
    </title>

    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" type="image/png">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/general.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/drivers.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/races.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/teams.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/news.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/header_footer.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <header>
        <div class="container">
            <div class="header-wrapper">
                <div class="left-nav">
                    <a href="../index.php">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/halo-logo.png" alt="">
                    </a>
                </div>

                <div class="right-nav">
                    <?php
                    wp_nav_menu(
                        args: array(
                            'walker' => new My_Custom_Nav_Walker,
                            'menu_class' => 'navbar',
                            'theme_location' => 'header-menu',
                            'container' => false,
                        )
                    );
                    ?>
                </div>
            </div>
        </div>
    </header>