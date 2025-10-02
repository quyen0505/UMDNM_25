<?php
/**
 * Template Name: Blog Page
 */
get_header();

// Lấy ảnh featured image của trang
$bg_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<section class="blog-hero" style="background-image:url('<?php echo esc_url($bg_img); ?>');">
  <div class="overlay"></div>
  <h1 class="page-title"><?php the_title(); ?></h1>
</section>

<section class="blog-list container">
  <div class="blog-grid">
    <?php
    $args = array(
      'posts_per_page' => 5,
      'category_name'  => 'blog-post',
      'post_type'      => 'post'
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post(); ?>
        <a class="post-card" href="<?php the_permalink(); ?>">
          <div class="card-media">
            <?php if (has_post_thumbnail()) : ?>
              <img class="card-img" src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'large')); ?>" alt="<?php the_title_attribute(); ?>">
            <?php endif; ?>
            <span class="card-overlay"></span>
            <h3 class="card-title"><?php the_title(); ?></h3>
          </div>
        </a>
    <?php endwhile; wp_reset_postdata(); endif; ?>
  </div>
</section>

<?php get_footer(); ?>
