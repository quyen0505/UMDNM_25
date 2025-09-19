<?php
/**
 * Template Name: Page
 */
get_header(); ?>
<div class="site-content">
  <?php
  while (have_posts()): the_post();
    the_content();
  endwhile;
  ?>
</div>
<?php get_footer(); ?>