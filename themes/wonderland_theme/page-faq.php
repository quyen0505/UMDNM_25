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

<section class="faq-section container py-5">
  <div class="row">
    <!-- Cột trái -->
    <div class="col-md-4">
      <h2 class="faq-heading">FIND ANSWERS</h2>
      <p class="p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      
      <form class="faq-search-form" action="<?php echo home_url('/'); ?>" method="get">
        <input type="text" name="s" class="faq-search-input" placeholder="Search here..." />
        <button type="submit" class="faq-search-btn"></button>
      </form>
    </div>

    <!-- Cột phải -->
    <div class="col-md-8 faq-list">
  <?php 
    $args = array(
      'post_type'      => 'post',
      'posts_per_page' => 5,
      'post_status'    => 'publish',
      'category_name'  => 'faqs-post' // slug của category
    );
    $faq_query = new WP_Query($args);
    $i = 1;
    if ($faq_query->have_posts()) :
      while ($faq_query->have_posts()) : $faq_query->the_post(); ?>
        <div class="faq-item">
          <!-- Tiêu đề -->
          <h3>
            <span><?php echo sprintf('%02d', $i); ?></span>
            <?php the_title(); ?>
          </h3>

          <!-- Nội dung (giới hạn khoảng 40 từ để không quá dài) -->
          <div class="faq-content-text">
            <?php echo wp_trim_words(get_the_content(), 100, '...'); ?>
          </div>
        </div>
      <?php 
        $i++;
      endwhile;
      wp_reset_postdata();
    else : ?>
      <p>No FAQ posts found.</p>
    <?php endif; ?>
</div>
    

  </div>
</section>


<?php get_footer(); ?>
