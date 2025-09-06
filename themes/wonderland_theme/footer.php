</div><!-- /.container -->
</main>

<?php
// Lấy dữ liệu từ ACF Options
$footer_logo_id   = get_field('footer_logo', 'option');
$footer_text      = get_field('footer_text', 'option');
$footer_copyright = get_field('footer_copyright', 'option');

$footer_logo = $footer_logo_id 
    ? wp_get_attachment_image($footer_logo_id, 'medium', false, [
        'class' => 'img-fluid',
        'style' => 'max-height:50px'
    ]) 
    : '';
?>

<footer class="bg-dark text-white mt-5 py-4">
  <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
    <div class="small">
      <?php 
      if($footer_copyright) {
        echo esc_html($footer_copyright);
      } else {
        echo '© ' . date('Y') . ' ' . get_bloginfo('name');
      }
      ?>
      — Wonderland Theme v<?php echo esc_html(wp_get_theme()->get('Version')); ?>
    </div>

    <div class="text-center my-3 my-md-0">
      <?php echo $footer_logo; ?>
      <?php if($footer_text): ?>
        <p class="mt-2 small"><?php echo esc_html($footer_text); ?></p>
      <?php endif; ?>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
