<?php
/**
 * Header template
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="navbar navbar-expand-lg navbar-light bg-light navbar-sticky">
  <div class="container">
    <?php wonderland_site_brand(); ?>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNav" aria-controls="primaryNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <nav class="collapse navbar-collapse" id="primaryNav">
      <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0',
        'fallback_cb'    => function () {
          echo '<ul class="navbar-nav ms-auto"><li class="nav-item"><a class="nav-link" href="' . esc_url(admin_url('nav-menus.php')) . '">Add Menu</a></li></ul>';
        },
        'walker'         => new class extends Walker_Nav_Menu {
          // Walker nhỏ để thêm class Bootstrap
          function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
            $classes = empty($item->classes) ? [] : (array) $item->classes;
            $classes[] = 'nav-item';
            $class_names = join(' ', array_filter($classes));
            $atts = ' class="nav-link"';
            $output .= '<li class="' . esc_attr($class_names) . '"><a' . $atts . ' href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
          }
          function end_el(&$output, $item, $depth = 0, $args = null) { $output .= '</li>'; }
        }
      ]);
      ?>

      <a class="btn btn-outline-primary ms-lg-3" href="<?php echo esc_url(wp_login_url()); ?>">Đăng nhập Admin</a>
    </nav>
  </div>
</header>
<main class="main py-4">
  <div class="container">