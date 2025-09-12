<?php get_header(); ?>
<div class="site-content">

    <?php if (is_front_page()) : ?>
        <!-- ===== Slider chỉ hiện ở Home ===== -->
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
                        <?php foreach ($slides as $i => $slide): ?>
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
                        <?php foreach ($slides as $i => $slide): ?>
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
                        <span class="visually-hidden">Trước</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Tiếp theo</span>
                    </button>
                </div>
            <?php else : ?>
                <p class="text-danger text-center py-4">No images found. Please check your 'slider' group field.</p>
            <?php endif; ?>
        </div>

        <!-- ===== Logo Section chỉ hiện ở Home ===== -->
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
                        <?php if (!empty($logos[$key])) : ?>
                            <?php 
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
    <section class="travel-section" style="background-image: url('URL_CUA_ANH_HOA_VAN');">
    <div class="container">
        <h2 class="main-heading">
            TRAVEL ESSENTIALS <span class="highlight">TIPS</span>
        </h2>

        <?php
        // Tạo query để lấy bài viết
        $args = array(
            'posts_per_page' => 1, // Lấy 1 bài viết
            'category_name'  => 'chua-phan-loai', // Thay bằng slug category của bạn
        );

        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) :
                $the_query->the_post();
        ?>
            <div class="travel-post-container">
                <div class="travel-image-wrapper">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
                    <?php else: ?>
                        <img src="https://wanderland.qodeinteractive.com/wp-content/uploads/2019/10/h1-bckg-02.jpg?id=102" alt="Default image">
                    <?php endif; ?>
                </div>

                <div class="travel-content">
                    <div class="travel-meta">
                        <span class="date"><?php echo get_the_date('F j, Y'); ?></span>
                        <span class="author">by <?php the_author(); ?></span>
                    </div>

                    <h3 class="travel-title"><?php the_title(); ?></h3>
                    
                    <div class="travel-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <a href="<?php the_permalink(); ?>" class="readmore-btn">READ MORE <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>

        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p style="text-align: center; color: red;">No posts found.</p>';
        endif;
        ?>
    </div>

        <?php
        // Tạo query để lấy bài viết
        $args = array(
            'posts_per_page' => 1, // Lấy 1 bài viết
            'category_name'  => 'chua-phan-loai', // Thay bằng slug category của bạn
        );

        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) :
                $the_query->the_post();
        ?>
            <div class="travel-post-container1">

                <div class="travel-content1">
                    <div class="travel-meta1">
                        <span class="date1"><?php echo get_the_date('F j, Y'); ?></span>
                        <span class="author1">by <?php the_author(); ?></span>
                    </div>

                    <h3 class="travel-title1"><?php the_title(); ?></h3>
                    
                    <div class="travel-excerpt1">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <a href="<?php the_permalink(); ?>" class="readmore-btn1">READ MORE <i class="fa fa-long-arrow-right1"></i></a>
                </div>
                <div class="travel-image-wrapper1">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
                    <?php else: ?>
                        <img src="URL_ANH_THAY_THE_NEU_KHONG_CO_THUMBNAIL" alt="Default image">
                    <?php endif; ?>
                </div>
            </div>

        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p style="text-align: center; color: red;">No posts found.</p>';
        endif;
        ?>
    </div>
    </section>
</section>

</div>
<?php get_footer(); ?>