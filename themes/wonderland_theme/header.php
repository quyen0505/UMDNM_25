<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="cc">
<header>
  <!-- Top bar -->
  <div class="top-bar d-flex justify-content-between align-items-center py-2">
    <div class="contact-info">
      <span class="phone me-3">
        <i class="fa fa-phone"></i> +123 4567 789
      </span>
      <span class="email">
        <i class="fa fa-envelope"></i> QuyenWander@techonology.com
      </span>
    </div>
    <div class="social-links">
      <span class="me-2">Socials</span>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-youtube"></i></a>
    </div>
  </div>
</header>

<header class="main-header py-3">
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
        <?php wonderland_site_brand(); ?>
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
</div>