<?php
/**
 * Template Name: Shop Page
 */
get_header();
?>

<?php if (has_post_thumbnail()): ?>
    <section class="shop-hero" 
        style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
        <div class="overlay"></div>
        <div class="container">
            <h1 class="shop-heading">
                <?php 
                // Nếu có ACF thì lấy, không thì lấy tiêu đề page
                if (function_exists('get_field') && get_field('shop-title')) {
                    echo esc_html(get_field('shop-title'));
                } else {
                    the_title();
                }
                ?>
            </h1>
        </div>
    </section>
<?php endif; ?>

<div class="container my-5">
    <?php
    while (have_posts()) : the_post();
        the_content();
    endwhile;
    ?>
</div>

<?php get_footer(); ?>
