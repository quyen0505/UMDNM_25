<?php

if (!defined('ABSPATH')) {
    exit; // Thoát nếu file được truy cập trực tiếp
}

// 1) Thiết lập theme + hỗ trợ logo tùy chỉnh
add_action('after_setup_theme', function () {
    // Tải ngôn ngữ
    load_theme_textdomain('wonderland_theme', get_template_directory() . '/languages');

    // Hỗ trợ tiêu đề và hình đại diện
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // Hỗ trợ logo tùy chỉnh
    add_theme_support('custom-logo', [
        'height'      => 120,
        'width'       => 120,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => ['site-title', 'site-description'],
    ]);

    // Đăng ký các menu location
    register_nav_menus([
        'left-menu'   => __('Left Menu', 'wonderland_theme'),
        'right-menu'  => __('Right Menu', 'wonderland_theme'),
        'primary'     => __('Primary Menu', 'wonderland_theme'), // Menu cho mobile
    ]);
});

// 2) Nạp Bootstrap CDN và custom.css
add_action('wp_enqueue_scripts', function () {
    $theme_version = wp_get_theme()->get('Version');

    // Nạp Bootstrap CSS
    wp_enqueue_style(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        [],
        '5.3.3',
        'all'
    );

    // Nạp Font Awesome
    wp_enqueue_style(
        'fontawesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css',
        [],
        '7.0.1',
        'all'
    );

    // Nạp CSS tùy chỉnh (custom.css nằm ngoài cùng thư mục theme)
    wp_enqueue_style(
        'wonderland-custom',
        get_template_directory_uri() . '/custom.css',
        ['bootstrap'],
        $theme_version,
        'all'
    );

    // Nạp Bootstrap JS
    wp_enqueue_script(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        ['jquery'],
        '5.3.3',
        true
    );

    // Đảm bảo jQuery được nạp (nếu cần)
    wp_enqueue_script('jquery');
});

// 3) Kích thước ảnh tùy chỉnh
add_action('after_setup_theme', function () {
    add_image_size('hero-xl', 1920, 600, true);
    add_image_size('card-md', 800, 450, true);
}, 11);

// 4) In logo hoặc tên site
function wonderland_site_brand()
{
    if (function_exists('the_custom_logo') && has_custom_logo()) {
        the_custom_logo();
    } else {
        echo '<a class="navbar-brand fw-bold" href="' . esc_url(home_url('/')) . '" rel="home">' . esc_html(get_bloginfo('name')) . '</a>';
    }
}

// 5) Logo trang đăng nhập
add_action('login_enqueue_scripts', function () {
    $logo_id = get_theme_mod('custom_logo');
    if ($logo_id) {
        $src = wp_get_attachment_image_src($logo_id, 'full');
        if (!empty($src[0])) {
            echo '<style type="text/css">
                .login h1 a {
                    background-image: url(' . esc_url($src[0]) . ') !important;
                    background-size: contain !important;
                    width: 100% !important;
                    height: 80px !important;
                    background-repeat: no-repeat !important;
                }
            </style>';
        }
    }
});

// Thêm trang Options cho ACF
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page([
        'page_title'    => 'Cài đặt giao diện',
        'menu_title'    => 'Cài đặt giao diện',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ]);

    // Trang con dành cho Footer
    acf_add_options_sub_page([
        'page_title'    => 'Cài đặt Footer',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-settings',
    ]);
}

add_filter('login_headerurl', function () {
    return esc_url(home_url('/'));
});

add_filter('login_headertext', function () {
    return esc_html(get_bloginfo('name'));
});

// 6) Tắt Gutenberg, bật Classic Editor
add_filter('use_block_editor_for_post', '__return_false', 10);

// 7) Tắt trình soạn thảo khối trong widget (WP 5.8+)
add_filter('use_widgets_block_editor', '__return_false');

// 8) Tối ưu hóa thêm (tùy chọn)
add_action('wp_head', function () {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
}, 1);
