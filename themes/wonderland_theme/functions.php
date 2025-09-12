<?php
/**
 * Wonderland Theme Functions
 * Author: Quyền
 * Version: 1.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// =============== Enqueue Scripts & Styles ===============
add_action('wp_enqueue_scripts', function () {
    $theme_version = wp_get_theme()->get('Version');

    // Bootstrap CSS
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        [],
        '5.3.3'
    );

    // Font Awesome
    wp_enqueue_style(
        'fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css',
        [],
        '5.15.4'
    );

    // Custom CSS
    wp_enqueue_style(
        'wonderland-custom',
        get_template_directory_uri() . '/custom.css',
        ['bootstrap-css', 'fontawesome'],
        $theme_version
    );

    // Bootstrap JS (bundle có Popper, cần cho Carousel, Modal, Dropdown…)
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.3',
        true
    );
});

function enqueue_custom_styles() {
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

// =============== Theme Supports ===============
add_action('after_setup_theme', function () {
    // Hỗ trợ title tag
    add_theme_support('title-tag');

    // Hỗ trợ post thumbnail
    add_theme_support('post-thumbnails');

    // Hỗ trợ custom logo
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    // Đăng ký menu
    register_nav_menus([
        'left-menu'   => __('Left Menu', 'wonderland_theme'),
        'right-menu'  => __('Right Menu', 'wonderland_theme'),
        'footer-menu' => __('Footer Menu', 'wonderland_theme'),
    ]);
});

// =============== Hàm hiển thị Logo / Tên site ===============
if (!function_exists('wonderland_site_brand')) {
    function wonderland_site_brand() {
        if (has_custom_logo()) {
            the_custom_logo();
        } else {
            ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title text-decoration-none">
                <?php bloginfo('name'); ?>
            </a>
            <?php
        }
    }
}

// =============== Customizer (Footer Logo) ===============
add_action('customize_register', function ($wp_customize) {
    $wp_customize->add_section('wonderland_footer_section', [
        'title'    => __('Footer Settings', 'wonderland_theme'),
        'priority' => 120,
    ]);

    $wp_customize->add_setting('wonderland_footer_logo');

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'wonderland_footer_logo',
        [
            'label'    => __('Footer Logo', 'wonderland_theme'),
            'section'  => 'wonderland_footer_section',
            'settings' => 'wonderland_footer_logo',
        ]
    ));
});
// Tắt Gutenberg, bật Classic Editor
add_filter('use_block_editor_for_post', '__return_false', 10);

// Tắt trình soạn thảo khối trong widget (WP 5.8+)
add_filter('use_widgets_block_editor', '__return_false');

// // Tắt admin bar trên frontend
// add_filter('show_admin_bar', '__return_false');