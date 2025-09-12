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
    <span class="phone me-2">
      <i class="fa fa-phone"></i> +123 4567 789
    </span>
    <span class="email me-0">
      <i class="fa fa-envelope"></i> QuyenWander@techonology.com
    </span>
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

      <!-- Menu trái -->
      <nav class="menu-left">
        <?php
        wp_nav_menu([
            'theme_location' => 'left-menu',
            'container'      => false,
            'menu_class'     => 'nav',
            'fallback_cb'    => false,
        ]);
        ?>
      </nav>

      <!-- Logo giữa -->
      <div class="site-branding mx-4">
        <?php
        if (function_exists('the_custom_logo')) {
            the_custom_logo();
        } else {
            echo '<a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
        }
        ?>
      </div>

      <!-- Menu phải -->
      <nav class="menu-right">
        <?php
        wp_nav_menu([
            'theme_location' => 'right-menu',
            'container'      => false,
            'menu_class'     => 'nav',
            'fallback_cb'    => false,
        ]);
        ?>
      </nav>

    </div>
  </div>
</header>
