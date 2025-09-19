<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- ===== Top Bar ===== -->
<div class="top-bar d-flex justify-content-between align-items-center py-1">
  <div class="contact-info d-flex align-items-center">
    <span class="phone me-2"><i class="fa fa-phone"></i> +123 4567 789</span>
    <span class="email"><i class="fa fa-envelope"></i> QuyenWander@techonology.com</span>
  </div>
  <div class="social-links d-flex align-items-center">
    <span class="me-2">Socials</span>
    <a href="#"><i class="fab fa-instagram"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
    <a href="#"><i class="fab fa-facebook-f"></i></a>
    <a href="#"><i class="fab fa-youtube"></i></a>
  </div>
</div>

<!-- ===== Main Header ===== -->
<header class="main-header py-2 navbar-sticky">
  <div class="container">
    <div class="header-layout d-flex justify-content-between align-items-center">

      <!-- Menu trái (desktop) -->
      <nav class="menu-left d-none d-md-flex">
        <?php
        wp_nav_menu([
            'theme_location' => 'left-menu',
            'container'      => false,
            'menu_class'     => 'nav menu-left-items',
            'fallback_cb'    => false,
        ]);
        ?>
      </nav>

      <!-- Logo -->
<div class="site-branding">
  <a href="<?php echo esc_url(home_url('/')); ?>">
    <?php
    // Logo mặc định (WordPress Customizer)
    if (function_exists('the_custom_logo')) {
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo_light = wp_get_attachment_image_src($custom_logo_id, 'full');
        if ($logo_light) {
            echo '<img src="' . esc_url($logo_light[0]) . '" alt="Logo" class="logo-light">';
        }
    } else {
        echo get_bloginfo('name');
    }
    ?>
    <!-- Logo khi scroll -->
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/custom-logo.png" alt="Logo" class="logo-dark">
  </a>
</div>



      <!-- Menu phải (desktop) -->
      <nav class="menu-right d-none d-md-flex">
        <?php
        wp_nav_menu([
            'theme_location' => 'right-menu',
            'container'      => false,
            'menu_class'     => 'nav menu-right-items',
            'fallback_cb'    => false,
        ]);
        ?>
      </nav>

      <!-- Nút hamburger (mobile) -->
      <button class="mobile-menu-toggle d-md-none" aria-label="Menu">&#9776;</button>
    </div>
  </div>

  <!-- Menu mobile (gom cả 2 menu) -->
  <nav class="navbar-mobile">
    <?php
      wp_nav_menu([
          'theme_location' => 'left-menu',
          'container'      => false,
          'menu_class'     => 'nav-mobile',
          'fallback_cb'    => false,
      ]);
      wp_nav_menu([
          'theme_location' => 'right-menu',
          'container'      => false,
          'menu_class'     => 'nav-mobile',
          'fallback_cb'    => false,
      ]);
    ?>
  </nav>
</header>