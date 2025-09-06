<?php get_header(); ?>
<div class="site-content">
    <div class="full-screen-slider">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!-- Thêm carousel từ ACF Group Field -->
            <?php 
                $slider = get_field('slider'); 
                if ($slider && is_array($slider)) :
            ?>
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php $active = 'active'; ?>
                        <?php if ($slider['image1']): ?>
                            <div class="carousel-item <?php echo $active; ?>">
                                <img src="<?php echo esc_url($slider['image1']['url']); ?>" class="d-block w-100" alt="<?php echo esc_attr($slider['image1']['alt']); ?>" loading="eager">
                            </div>
                            <?php $active = ''; ?>
                        <?php endif; ?>
                        <?php if ($slider['image2']): ?>
                            <div class="carousel-item <?php echo $active; ?>">
                                <img src="<?php echo esc_url($slider['image2']['url']); ?>" class="d-block w-100" alt="<?php echo esc_attr($slider['image2']['alt']); ?>" loading="eager">
                            </div>
                            <?php $active = ''; ?>
                        <?php endif; ?>
                        <?php if ($slider['image3']): ?>
                            <div class="carousel-item <?php echo $active; ?>">
                                <img src="<?php echo esc_url($slider['image3']['url']); ?>" class="d-block w-100" alt="<?php echo esc_attr($slider['image3']['alt']); ?>" loading="eager">
                            </div>
                        <?php endif; ?>
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
            <?php endif; ?>
        <?php endwhile; endif; ?>
    </div>

    <section class="hero-section text-center text-white py-5" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>'); background-size: cover;">
        <div class="container">
            <h1 class="display-4"><?php the_title(); ?></h1>
            <p class="lead">Chào mừng đến với trang web của chúng tôi!</p>
        </div>
    </section>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="content mb-5">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>