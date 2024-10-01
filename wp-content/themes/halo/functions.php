
<?php
function register_my_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            'footer-menu' => __('Footer Menu'),
        )
    );
}
remove_filter('the_content', 'wpautop');
add_action('init', 'register_my_menus');
add_theme_support('post-thumbnails');
add_theme_support('custom-logo');


if (!class_exists('My_Custom_Nav_Walker')) {
    class My_Custom_Nav_Walker extends Walker_Nav_Menu
    {
        function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
        {
            $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
            if ($item->url && $item->url != '#') {
                $output .= '<a href="' . $item->url . '">';
            } else {
                $output .= '<span>';
            }
            $output .= $item->title;
            if ($item->url && $item->url != '#') {
                $output .= '</a>';
            } else {
                $output .= '</span>';
            }
        }
    }
}
function register_race_teams_post_type()
{
    register_post_type(
        'race_teams',
        array(
            'labels' => array(
                'name' => __('Race Teams'),
                'singular_name' => __('Race Team')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'),
        )
    );
}
add_action('init', 'register_race_teams_post_type');

function create_team_post_type()
{
    register_post_type(
        'teams-post',
        array(
            'labels' => array(
                'name' => __('Teams-Post'),
                'singular_name' => __('single-team')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite' => array('slug' => 'teams-post'),
        )
    );
}
add_action('init', 'create_team_post_type');


function create_team_detail_post_type()
{
    $labels = array(
        'name' => 'Teams-Post',
        'singular_name' => 'Team-Post',
        'menu_name' => 'Teams-Post',
        'name_admin_bar' => 'Team',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Team',
        'new_item' => 'New Team',
        'edit_item' => 'Edit Team',
        'view_item' => 'View Team',
        'all_items' => 'All Teams',
        'search_items' => 'Search Teams',
        'not_found' => 'No teams found.',
        'not_found_in_trash' => 'No teams found in Trash.',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'teams-post'),
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-groups',
    );

    register_post_type('teams-post', $args);
}
add_action('init', 'create_team_detail_post_type');
function enqueue_swiper_styles()
{
    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_styles');
