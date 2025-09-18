<?php
/**
 * Template Name: FAQ Page
 */
get_header();
?>

<?php
// Lấy Featured Image
$faq_bg = get_the_post_thumbnail_url(get_the_ID(), 'full');
$faq_title = get_field('faq_title') ?: get_the_title();
?>

<!-- Banner Section -->
<section class="faq-hero" style="background-image: url('<?php echo esc_url($faq_bg); ?>');">
  <div class="faq-overlay"></div>
  <div class="faq-content container text-center">
    <h1 class="faq-title"><?php echo esc_html($faq_title); ?></h1>
  </div>
</section>

<!-- Nội dung chính -->
<div class="container py-5">
  <div class="faq-wrapper">
    <?php
    while (have_posts()) : the_post();
      the_content();
    endwhile;
    ?>
  </div>
</div>

<?php get_footer(); ?>
