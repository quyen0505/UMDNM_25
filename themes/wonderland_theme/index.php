<?php get_header(); ?>

<?php if (have_posts()) : ?>
  <div class="row g-4">
    <?php while (have_posts()) : the_post(); ?>
      <div class="col-md-6 col-lg-4">
        <article class="card h-100 shadow-sm">
          <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" class="ratio ratio-16x9">
              <?php the_post_thumbnail('card-md', ['class' => 'card-img-top object-fit-cover']); ?>
            </a>
          <?php endif; ?>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><a href="<?php the_permalink(); ?>" class="stretched-link text-decoration-none"><?php the_title(); ?></a></h5>
            <p class="card-text text-muted small mb-3"><?php echo get_the_date(); ?></p>
            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 24); ?></p>
          </div>
        </article>
      </div>
    <?php endwhile; ?>
  </div>

  <nav class="mt-4">
    <?php the_posts_pagination(['mid_size' => 2]); ?>
  </nav>
<?php else : ?>
<?php endif; ?>

<?php get_footer(); ?>