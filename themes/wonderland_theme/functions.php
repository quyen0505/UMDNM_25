<?php


if (!defined('ABSPATH')) { exit; }


// 1) Thiết lập theme + hỗ trợ logo tuỳ chỉnh
add_action('after_setup_theme', function () {
load_theme_textdomain('wonderland_theme', get_template_directory() . '/languages');


add_theme_support('title-tag');
add_theme_support('post-thumbnails');


add_theme_support('custom-logo', [
'height' => 120,
'width' => 120,
'flex-height' => true,
'flex-width' => true,
]);


register_nav_menus([
'primary' => __('Primary Menu', 'wonderland_theme'),
]);
});


// 2) Nạp Bootstrap CDN và custom.css
add_action('wp_enqueue_scripts', function () {
$ver = wp_get_theme()->get('Version');


// Bootstrap 5.3.x CDN
wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', [], '5.3.3');


// Custom CSS riêng
wp_enqueue_style('wonderland-custom', get_template_directory_uri() . '/custom.css', ['bootstrap'], $ver);


wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', [], '5.3.3', true);
});


// 3) Kích thước ảnh
add_action('after_setup_theme', function () {
add_image_size('hero-xl', 1920, 600, true);
add_image_size('card-md', 800, 450, true);
});


// 4) In logo hoặc tên site
function wonderland_site_brand() {
if (function_exists('the_custom_logo') && has_custom_logo()) {
the_custom_logo();
} else {
echo '<a class="navbar-brand fw-bold" href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
}
}


// 5) Logo trang đăng nhập
add_action('login_enqueue_scripts', function () {
$logo_id = get_theme_mod('custom_logo');
if ($logo_id) {
$src = wp_get_attachment_image_src($logo_id, 'full');
if (!empty($src[0])) {
echo '<style> .login h1 a { background-image:url(' . esc_url($src[0]) . ') !important; background-size:contain !important; width:100% !important; height:80px !important; } </style>';
}
}
});


add_filter('login_headerurl', function () { return home_url('/'); });
add_filter('login_headertext', function () { return get_bloginfo('name'); });