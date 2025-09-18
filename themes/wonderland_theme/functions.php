<?php
/**
 * Wonderland Theme Functions
 * Author: Quyền
 * Version: 1.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * =============== Enqueue Scripts & Styles ===============
 */
add_action('wp_enqueue_scripts', function () {
    $theme_version = wp_get_theme()->get('Version');

    // Bootstrap
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', [], '5.3.3');
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', [], '5.3.3', true);

    // Font Awesome
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', [], '5.15.4');

    // Swiper
    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '11');
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], '11', true);
    wp_enqueue_script('custom-swiper', get_template_directory_uri() . '/js/custom-swiper.js', ['swiper'], $theme_version, true);

    // Custom CSS
    wp_enqueue_style('wonderland-custom', get_template_directory_uri() . '/custom.css', ['bootstrap-css', 'fontawesome'], $theme_version);
    wp_enqueue_style('wonderland-style', get_stylesheet_uri(), [], $theme_version);
});

/**
 * =============== Theme Supports ===============
 */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    register_nav_menus([
        'left-menu'   => __('Left Menu', 'wonderland_theme'),
        'right-menu'  => __('Right Menu', 'wonderland_theme'),
        'footer-menu' => __('Footer Menu', 'wonderland_theme'),
    ]);
});

/**
 * =============== Site Brand ===============
 */
function wonderland_site_brand() {
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        echo '<a href="' . esc_url(home_url('/')) . '" class="site-title text-decoration-none">' . get_bloginfo('name') . '</a>';
    }
}



/**
 * =============== Classic Editor ===============
 */
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_widgets_block_editor', '__return_false');

/**
 * =============== Custom Login Logo ===============
 */
add_action('login_enqueue_scripts', function () {
    ?>
    <style>
        #login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/custom-logo.png');
            height: 100px;
            width: 320px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 20px;
        }
    </style>
    <?php
});
add_filter('login_headerurl', fn() => home_url());
add_filter('login_headertext', fn() => get_bloginfo('name'));

/**
 * =============== CPT: Subscriber ===============
 */
add_action('init', function () {
    register_post_type('subscriber', [
        'labels' => [
            'name'          => 'Subscribers',
            'singular_name' => 'Subscriber',
        ],
        'public'     => false,
        'show_ui'    => true,
        'supports'   => ['title'],
        'menu_icon'  => 'dashicons-email-alt',
    ]);
});

// ACF form placeholders
add_filter('acf/load_field/name=name_12', function ($field) {
    $field['placeholder'] = 'Name';
    return $field;
});
add_filter('acf/load_field/name=email_12', function ($field) {
    $field['placeholder'] = 'E-mail';
    return $field;
});

/**
 * =============== CPT: Travel Items ===============
 */
add_action('init', function () {
    $labels = [
        'name'               => 'Travel Items',
        'singular_name'      => 'Travel Item',
        'menu_name'          => 'Travel Items',
        'add_new'            => 'Thêm sản phẩm',
        'add_new_item'       => 'Thêm sản phẩm mới',
        'new_item'           => 'Sản phẩm mới',
        'edit_item'          => 'Chỉnh sửa sản phẩm',
        'view_item'          => 'Xem sản phẩm',
        'all_items'          => 'Tất cả sản phẩm',
        'search_items'       => 'Tìm sản phẩm',
        'not_found'          => 'Không tìm thấy',
    ];

    register_post_type('travel_item', [
        'labels'      => $labels,
        'public'      => true,
        'has_archive' => true,
        'menu_icon'   => 'dashicons-products',
        'supports'    => ['title', 'editor', 'thumbnail'],
        'rewrite'     => ['slug' => 'travel-item'],
    ]);
});

/**
 * Shortcode hiển thị Travel Items
 */
function show_travel_items() {
    $args = [
        'post_type'      => 'travel_item',
        'posts_per_page' => 5,
    ];
    $query = new WP_Query($args);

    ob_start();
    if ($query->have_posts()) {
        echo '<div class="travel-items">';
        while ($query->have_posts()) {
            $query->the_post();
            $price  = get_field('price');
            $rating = intval(get_field('rating'));
            $hover  = get_field('hover_image'); // ACF field cho ảnh hover
            ?>
            <div class="travel-item">
                <div class="travel-item-image">
                    <!-- Ảnh mặc định -->
                    <?php echo get_the_post_thumbnail(get_the_ID(), 'full', ['class'=>'normal-img']); ?>
                    <!-- Ảnh hover -->
                    <?php if ($hover) : ?>
                        <img src="<?php echo esc_url($hover['url']); ?>" class="hover-img" alt="">
                    <?php endif; ?>

                    <!-- Overlay + Nút -->
                    <div class="overlay">
                        <a href="#" class="btn-add">ADD TO CART</a>
                    </div>
                </div>

                <!-- Giá -->
                <p class="price">$<?php echo esc_html($price); ?></p>

                <!-- Tên sp -->
                <h3 class="title"><?php the_title(); ?></h3>

                <!-- Rating -->
                <div class="stars">
                    <?php for ($i=1; $i<=5; $i++): ?>
                        <span class="star <?php echo ($i <= $rating) ? 'active' : ''; ?>">★</span>
                    <?php endfor; ?>
                </div>
            </div>
            <?php
        }
        echo '</div>';
        wp_reset_postdata();
    }
    return ob_get_clean();
}
add_shortcode('travel_items', 'show_travel_items');

function wonderland_get_footer_settings_id() {
    $footer_page = get_page_by_title('Footer Settings');
    return $footer_page ? $footer_page->ID : 0;
}