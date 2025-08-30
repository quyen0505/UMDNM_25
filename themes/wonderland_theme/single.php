<?php get_header(); ?>
<div class="row justify-content-center">
  <div class="col-lg-8">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article>
        <header class="mb-4">
          <h1 class="mb-3"><?php the_title(); ?></h1>
          <div class="text-muted small mb-3"><?php echo get_the_date(); ?></div>
          <?php if (has_post_thumbnail()) : ?>
            <figure class="mb-4">
              <?php the_post_thumbnail('hero-xl', ['class' => 'img-fluid rounded-3 shadow-sm']); ?>
            </figure>
          <?php endif; ?>
        </header>
        <div class="content mb-5">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; endif; ?>
  </div>
</div>
<?php get_footer(); ?>