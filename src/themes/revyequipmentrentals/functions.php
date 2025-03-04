<?php
/* Require Includes */
include_once get_template_directory() . '/includes/helper-functions.php';
include_once get_template_directory() . '/includes/bootstrap-5-wp-navwalker.php';

/* Hooks */
if (!function_exists('enqueue_scripts')) {

    add_action('wp_enqueue_scripts', 'enqueue_scripts');

    function enqueue_scripts() {
        wp_enqueue_script('jquery');

        // Styles
        $style_file = get_stylesheet_directory() . '/style/style.css';
        wp_enqueue_style('style_file', get_stylesheet_directory_uri() . '/style/style.css', [], filemtime($style_file));

        // Header JS
        $header_js = get_stylesheet_directory() . '/js/header-bundle.js';
        wp_enqueue_script('header_js', get_stylesheet_directory_uri() . '/js/header-bundle.js', [], filemtime($header_js), false);

        // Footer JS
        $footer_js = get_stylesheet_directory() . '/js/footer-bundle.js';
        wp_enqueue_script('footer_js', get_stylesheet_directory_uri() . '/js/footer-bundle.js', [], filemtime($footer_js), true);
    }

}

if (!function_exists('custom_after_setup_theme')) {

    add_action('after_setup_theme', 'custom_after_setup_theme', 11);

    function custom_after_setup_theme()
    {
        remove_theme_support('custom-background');
        //remove_theme_support('post-thumbnails');
        add_theme_support( 'post-thumbnails' );

        register_nav_menus([
            'primary' => 'Primary Menu',
            'secondary' => 'Footer Menu',
            'tertiary' => 'Legal Menu'
        ]);

        // Style Gutenberg
        add_theme_support('editor-styles');
        add_editor_style('style-editor.css');
    }
}

/* Misc */
remove_action('wp_head', 'wp_generator');
add_filter('allow_dev_auto_core_updates', '__return_false');
add_filter('auto_update_plugin', '__return_true');

/* Gravity Forms */
add_filter('gform_init_scripts_footer', '__return_true');
add_filter('gform_confirmation_anchor', '__return_false');
//add_filter('gform_enable_field_label_visibility_settings', '__return_true');

/* ACF - Theme Options */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_posts',
        'position' => 80,
        'redirect' => false
    ]);
}
