<?php
/**
 * Footer Template - Wonderland Theme
 * Author: Quyền
 */
?>

<?php 
// Lấy ID của page "Footer Settings" (cho ACF Free)
$footer_page = get_page_by_path('footer');
$footer_id   = $footer_page ? $footer_page->ID : 0;
?>

<footer class="site-footer bg-dark text-white pt-5 pb-3 mt-auto">
  <div class="container">
    <div class="footer-widgets">

      <!-- About the Blog -->
      <div class="footer-col">
        <h5 class="footer-title">
          <?php echo esc_html(get_field('footer_about_title', $footer_id) ?: 'About the Blog'); ?>
        </h5>
        <p><?php echo esc_html(get_field('footer_about_content', $footer_id) ?: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'); ?></p>
      </div>

      <!-- Newsletter -->
      <div class="footer-col">
        <h5 class="footer-title">
          <?php echo esc_html(get_field('footer_newsletter_title', $footer_id) ?: 'Subscribe to Newsletter'); ?>
        </h5>
        <form class="newsletter-form">
          <input type="text" name="name" placeholder="Your name...">
          <input type="email" name="email" placeholder="Your e-mail...">
          <button type="submit">Subscribe </button>
        </form>
      </div>

      <!-- Recent News -->
      <div class="footer-col">
        <h5 class="footer-title">
          <?php echo esc_html(get_field('footer_recent_title', $footer_id) ?: 'Recent News'); ?>
        </h5>
        <ul class="footer-news">
          <li>
            <span class="news-date"><?php echo date_i18n('F j, Y'); ?></span> 
            <?php echo esc_html(get_field('footer_recent_post1', $footer_id) ?: 'Trip to Iceland'); ?>
          </li>
          <li>
            <span class="news-date"><?php echo date_i18n('F j, Y'); ?></span> 
            <?php echo esc_html(get_field('footer_recent_post2', $footer_id) ?: 'On the Shores of India'); ?>
          </li>
          <li>
            <span class="news-date"><?php echo date_i18n('F j, Y'); ?></span> 
            <?php echo esc_html(get_field('footer_recent_post3', $footer_id) ?: 'Visiting Rabat'); ?>
          </li>
        </ul>
      </div>

      <!-- Instagram Feed -->
      <div class="footer-col">
        <h5 class="footer-title">
          <?php echo esc_html(get_field('footer_instagram_title', $footer_id) ?: 'Instagram Feed'); ?>
      </div>

    </div>
  </div>

  <div class="footer-bottom">
    © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
