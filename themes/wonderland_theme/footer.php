 </div><!-- /.container -->
</main>
<?php
$footer_logo_id = get_theme_mod('wonderland_footer_logo');
$footer_logo    = $footer_logo_id ? wp_get_attachment_image($footer_logo_id, 'medium', false, ['class' => 'img-fluid', 'style' => 'max-height:50px']) : '';
?>
<footer class="bg-dark text-white mt-5 py-4">
  <div class="container d-flex align-items-center justify-content-between">
    <div class="small">© <?php echo date('Y'); ?> <?php bloginfo('name'); ?> — Wonderland Theme v<?php echo esc_html(wp_get_theme()->get('Version')); ?></div>
    <div><?php echo $footer_logo ?: ''; ?></div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>