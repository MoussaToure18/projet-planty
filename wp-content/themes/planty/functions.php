<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/theme.css'));
}

add_filter('wp_nav_menu_items', 'add_extra_item_to_nav_menu', 1, 2);
function add_extra_item_to_nav_menu($items, $args)
{
    if (is_user_logged_in()) {
        $items .= '<li><a href="' . get_permalink(get_option('woocommerce_myaccount_page_id')) . '">My Account</a></li>';
    }
    return $items;
}
