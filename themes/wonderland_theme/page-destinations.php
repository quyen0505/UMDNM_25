<?php
/**
 * Template Name: Destinational
 */

get_header();
?>

<?php 
  // Lấy dữ liệu ACF
  $title = get_field('des_title');
?>

<!-- Hero Section -->
<section class="destination-hero" 
  style="background-image: url('<?php echo has_post_thumbnail() ? esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')) : ''; ?>');">
  <div class="overlay"></div>
  <div class="container text-center">
    <?php if ($title): ?>
      <h1 class="destination-title"><?php echo esc_html($title); ?></h1>
    <?php endif; ?>
  </div>
</section>

<!-- Nội dung + Slide -->
<div class="site-content">
  <div class="container py-5">
    <?php
      // Lấy 6 ảnh từ ACF
      $slides = [];
      for ($i = 1; $i <= 6; $i++) {
          $img = get_field("slide{$i}");
          if (!empty($img)) {
              $slides[] = $img;
          }
      }
      $slide_count = count($slides);
    ?>

    <?php if ($slide_count > 0): ?>
      <div class="swiper mySwiper" data-slides="<?php echo esc_attr($slide_count); ?>">
        <div class="swiper-wrapper">
          <?php foreach ($slides as $slide): ?>
            <div class="swiper-slide">
              <a href="<?php echo esc_url($slide['url']); ?>" data-lightbox="dest-slider">
                <img src="<?php echo esc_url($slide['url']); ?>" alt="<?php echo esc_attr($slide['alt'] ?? ''); ?>">
              </a>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Nếu muốn bật điều khiển thì bỏ comment -->
        <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div> -->
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- Average Costs Section -->
<section class="average-costs container my-5">

  <?php
  // Lấy 4 bài viết trong category 'Dest Post'
  $args = array(
    'category_name' => 'dest post', // tên slug của category
    'posts_per_page' => 4,
    'orderby' => 'date',
    'order' => 'ASC'
  );
  $query = new WP_Query($args);

  if ($query->have_posts()) :
    $i = 0; // counter để biết đang ở bài số mấy
    while ($query->have_posts()) : $query->the_post();
      $i++;
  ?>
      
      <div class="cost-item <?php echo ($i == 3) ? 'special-layout' : ''; ?>">
        <span class="label"><?php the_title(); ?></span>

        <?php if ($i == 3): ?>
          <!-- Layout riêng cho bài thứ 3 -->
          <div class="visit-row">
            <div class="visit-text">
              <p><?php the_content(); ?></p>
            </div>
            <div class="visit-image">
              <?php if ($img1 = get_field('image1')): ?>
                <img src="<?php echo esc_url($img1['url']); ?>" alt="<?php echo esc_attr($img1['alt']); ?>">
              <?php endif; ?>
              <?php if ($img2 = get_field('image2')): ?>
                <img src="<?php echo esc_url($img2['url']); ?>" alt="<?php echo esc_attr($img2['alt']); ?>">
              <?php endif; ?>
            </div>
          </div>
        <?php else: ?>
          <!-- Layout mặc định -->
          <p><?php the_content(); ?></p>
          <div class="cost-images">
            <?php if ($img1 = get_field('image1')): ?>
              <img src="<?php echo esc_url($img1['url']); ?>" alt="<?php echo esc_attr($img1['alt']); ?>">
            <?php endif; ?>
            <?php if ($img2 = get_field('image2')): ?>
              <img src="<?php echo esc_url($img2['url']); ?>" alt="<?php echo esc_attr($img2['alt']); ?>">
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>

    <?php endwhile;
    wp_reset_postdata();
  else :
    echo '<p>Chưa có nội dung chi phí.</p>';
  endif;
  ?>
</section>

<!-- Comment Section -->
<div class="container my-5">
  <?php
  // Kiểm tra nếu comment được bật
  if (comments_open() || get_comments_number()) :
    comments_template();
  endif;
  ?>
</div>

<?php get_footer(); ?>
