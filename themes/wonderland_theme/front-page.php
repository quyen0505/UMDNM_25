<?php
/**
 * Template Name: Page
 */
acf_form_head();
get_header();
?>

<div class="site-content">

  <?php if (is_front_page()) : ?>
    <!-- ===== Slider (ACF) ===== -->
    <div class="full-screen-slider">
      <?php
      $slider = get_field('slider');
      $slides = [];
      if ($slider && is_array($slider)) {
        foreach (['slide1', 'slide2', 'slide3'] as $key) {
          if (!empty($slider[$key])) {
            $slides[] = is_array($slider[$key]) ? $slider[$key] : ['url' => $slider[$key], 'alt' => "Slide " . (count($slides) + 1)];
          }
        }
      }
      ?>
      <?php if (!empty($slides)) : ?>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
          <div class="carousel-indicators">
            <?php foreach ($slides as $i => $slide) : ?>
              <button type="button"
                      data-bs-target="#carouselExample"
                      data-bs-slide-to="<?php echo $i; ?>"
                      class="<?php echo $i === 0 ? 'active' : ''; ?>"
                      aria-current="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                      aria-label="Slide <?php echo $i + 1; ?>">
              </button>
            <?php endforeach; ?>
          </div>
          <div class="carousel-inner">
            <?php foreach ($slides as $i => $slide) : ?>
              <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
                <img src="<?php echo esc_url($slide['url']); ?>"
                     class="d-block w-100"
                     alt="<?php echo esc_attr($slide['alt'] ?? 'Slide ' . ($i + 1)); ?>"
                     loading="eager">
              </div>
            <?php endforeach; ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      <?php else : ?>
        <p class="text-danger text-center py-4">No images found. Please check your 'slider' group field.</p>
      <?php endif; ?>
    </div>

    <!-- ===== Logo Section (ACF) ===== -->
    <div class="logo-section">
      <?php
      $logos = get_field('logos');
      $has_logos = $logos && is_array($logos) && (
        !empty($logos['logo1']) || !empty($logos['logo2']) ||
        !empty($logos['logo3']) || !empty($logos['logo4']) ||
        !empty($logos['logo5'])
      );
      ?>
      <?php if ($has_logos) : ?>
        <div class="logo-container">
          <?php foreach (['logo1', 'logo2', 'logo3', 'logo4', 'logo5'] as $i => $key) : ?>
            <?php if (!empty($logos[$key])) :
              $logo = is_array($logos[$key]) ? $logos[$key] : ['url' => $logos[$key], 'alt' => "Logo " . ($i + 1)];
            ?>
              <img src="<?php echo esc_url($logo['url']); ?>"
                   alt="<?php echo esc_attr($logo['alt'] ?? 'Logo ' . ($i + 1)); ?>"
                   class="logo-img"
                   loading="eager">
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
<section class="post-2" >
  <div class="travel-posts-wrapper">

    <?php
    $args1 = array(
        'posts_per_page' => 1,
        'offset'         => 0, // bài mới nhất
        'category_name'  => 'chua-phan-loai'
    );
    $query1 = new WP_Query($args1);
    if ($query1->have_posts()):
        while ($query1->have_posts()): $query1->the_post(); ?>
          
          <div class="travel-post-container">
            <div class="travel-image-wrapper">
              <?php if (has_post_thumbnail()) {
                  the_post_thumbnail('full', ['alt' => get_the_title()]);
              } ?>
            </div>
            <div class="travel-content">
              <div class="travel-meta">
                <span class="date"><?php echo get_the_date('F j, Y'); ?></span>
                <span class="author">by <?php the_author(); ?></span>
              </div>
              <h3 class="travel-title"><?php the_title(); ?></h3>
              <div class="travel-excerpt"><?php the_excerpt(); ?></div>
              <a href="<?php the_permalink(); ?>" class="readmore-btn">READ MORE <i class="fa fa-long-arrow-right"></i></a>
            </div>
          </div>
          
    <?php endwhile; wp_reset_postdata(); endif; ?>


    <?php
    $args2 = array(
        'posts_per_page' => 1,
        'offset'         => 1, // bỏ qua bài đầu, lấy bài tiếp theo
        'category_name'  => 'chua-phan-loai'
    );
    $query2 = new WP_Query($args2);
    if ($query2->have_posts()):
        while ($query2->have_posts()): $query2->the_post(); ?>
          
          <div class="travel-post-container1">
            <div class="travel-content1">
              <div class="travel-meta1">
                <span class="date1"><?php echo get_the_date('F j, Y'); ?></span>
                <span class="author1">by <?php the_author(); ?></span>
              </div>
              <h3 class="travel-title1"><?php the_title(); ?></h3>
              <div class="travel-excerpt1"><?php the_excerpt(); ?></div>
              <a href="<?php the_permalink(); ?>" class="readmore-btn1">READ MORE <i class="fa fa-long-arrow-right"></i></a>
            </div>
            <div class="travel-image-wrapper1">
              <?php if (has_post_thumbnail()) {
                  the_post_thumbnail('full', ['alt' => get_the_title()]);
              } ?>
            </div>
          </div>
          
    <?php endwhile; wp_reset_postdata(); endif; ?>

  </div>
</section>

  <!-- ===== Newsletter Section ===== -->
  <?php get_template_part('page', 'newsletter'); ?>

  <!-- ===== Featured Blog Posts Section ===== -->
  <section class="featured-posts">
    <div class="container">
      <p class="subtitle">Lorem ipsum dolor</p>
      <h2 class="section-title">FEATURED BLOG <span>POSTS</span></h2>

      <div class="swiper featured-slider">
        <div class="swiper-wrapper">
          <?php
          $args = [
            'post_type'      => 'post',
            'posts_per_page' => 4,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'category_name'  => 'featured'
          ];
          $query = new WP_Query($args);
          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
              <div class="swiper-slide featured-slide">
                <div class="featured-image">
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full'); ?>
                  </a>
                  <span class="post-category"><?php the_category(', '); ?></span>
                </div>
                <div class="post-meta">
                  <span class="date"><i class="far fa-calendar"></i> <?php echo get_the_date(); ?></span>
                  <span class="author"><i class="far fa-user"></i> <?php the_author(); ?></span>
                </div>
                <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              </div>
          <?php endwhile;
            wp_reset_postdata();
          endif; ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </section>

<section class="post-3">
<!-- ===== Travel Essentials Section ===== -->
<section class="travel-essentials-section">
  <div class="container text-center">

    <!-- Subtitle & Title -->
    <p class="subtitle">Lorem ipsum dolor</p>
    <h2 class="section-title">
      TRAVEL ESSENTIALS <span>ITEMS</span>
    </h2>

    <!-- Travel Items Grid -->
    <div class="travel-items">
      <?php
      $args = array(
        'post_type'      => 'travel_item',
        'post_status'    => 'publish',
        'posts_per_page' => 5
      );
      $query = new WP_Query($args);

      if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();

          // Lấy dữ liệu từ ACF
          $price   = get_field('price');
          $rating  = get_field('rating');
          $hover   = get_field('hover_image');
          $normal  = get_the_post_thumbnail_url(get_the_ID(), 'medium'); // Featured Image
      ?>
        <div class="travel-item">

          <!-- Image -->
          <div class="travel-item-image">
            <?php if ($normal): ?>
              <img src="<?php echo esc_url($normal); ?>"
                   alt="<?php the_title(); ?>"
                   class="normal-img">
            <?php endif; ?>

            <?php if ($hover): ?>
              <img src="<?php echo esc_url($hover['url']); ?>"
                   alt="<?php the_title(); ?>"
                   class="hover-img">
            <?php endif; ?>

            <!-- Overlay với nút -->
            <div class="overlay">
              <a href="<?php the_permalink(); ?>" class="btn-add">View Item</a>
            </div>
          </div>

          <!-- Price -->
          <?php if ($price): ?>
            <p class="price">$<?php echo number_format($price, 2); ?></p>
          <?php endif; ?>

          <!-- Title -->
          <h3 class="title"><?php the_title(); ?></h3>

          <!-- Rating -->
          <div class="stars">
            <?php for ($i = 1; $i <= 5; $i++): ?>
              <span class="<?php echo ($i <= intval($rating)) ? 'active' : ''; ?>">★</span>
            <?php endfor; ?>
          </div>
        </div>
      <?php
        endwhile;
        wp_reset_postdata();
      else :
        echo "<p class='text-center'>Chưa có Travel Items nào.</p>";
      endif;
      ?>
    </div>
  </div>
</section>

    

  <!-- Icons section -->
  <section class="home-icons container my-5">
    <div class="row text-center">
      <?php for ($i=1; $i<=6; $i++): 
        $default = get_field("icon{$i}_default");
        $hover   = get_field("icon{$i}_hover");
        $text_top = get_field("icon{$i}_text_top");
        $text_bottom = get_field("icon{$i}_text_bottom");
        if ($default && $hover): ?>
          <div class="col-6 col-md-2 mb-4">
            <div class="icon-box">
              <div class="icon-img">
                <img src="<?php echo esc_url($default['url']); ?>" alt="" class="icon-default">
                <img src="<?php echo esc_url($hover['url']); ?>" alt="" class="icon-hover">
              </div>
              <p class="text-top"><?php echo esc_html($text_top); ?></p>
              <h5 class="text-bottom fw-bold"><?php echo esc_html($text_bottom); ?></h5>
            </div>
          </div>
        <?php endif;
      endfor; ?>
    </div>  
  </section>

  <!-- Blog feature section -->
  <section class="blog-feature container">

    <!-- Cột trái: 4 bài (trừ bài mới nhất) -->
    <div class="left-column">
      <?php
      $args = array(
        'posts_per_page' => 4,
        'offset'         => 1,
        'category_name'  => 'features'
      );
      $query = new WP_Query($args);
      if ($query->have_posts()):
        while ($query->have_posts()): $query->the_post(); ?>
          <article class="post-card">
            <a href="<?php the_permalink(); ?>">
              <?php if (has_post_thumbnail()) the_post_thumbnail('medium'); ?>
            </a>
            <div class="meta">
              <span><?php echo get_the_date(); ?></span> • 
              <span><?php the_author(); ?></span>
            </div>
            <h3 class="title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
          </article>
        <?php endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>

    <!-- Cột phải: bài mới nhất -->
    <aside class="right-column">
      <?php
      $feature_query = new WP_Query(array(
        'posts_per_page' => 1,
        'category_name'  => 'features'
      ));
      if ($feature_query->have_posts()):
        while ($feature_query->have_posts()): $feature_query->the_post(); ?>
          <div class="feature-box">
            <p class="kicker">Lorem ipsum dolor sit amet</p>
            <h2 class="feature-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <p class="excerpt"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
          </div>
        <?php endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </aside>

  </section>

</section>

</div><!-- /.site-content -->

<?php get_footer(); ?>
