<?php
/**
 * Footer template
 * Author: Quyền
 */
?>

<footer id="colophon" class="site-footer bg-dark text-white">
    <div class="footer-top-area py-5">
        <div class="container">
            <div class="row">

                <!-- Logo + Text -->
                <div class="col-md-3 footer-column footer-logo-text mb-4">
                    <div class="footer-logo mb-3">
                        <?php 
                        $footer_logo_id = get_theme_mod('wonderland_footer_logo');
                        // var_dump($footer_logo_id);
                        if ($footer_logo_id) {
                            ?>
                            <img src="<?php echo  $footer_logo_id;?>" alt="">
                            <?php
                            // echo wp_get_attachment_image($footer_logo_id, 'medium', false, ['class' => 'img-fluid', 'style' => 'max-height:50px;']);
                        } else {
                            echo '<h3 class="fw-bold">' . get_bloginfo('name') . '</h3>';
                        }
                        ?>
                    </div>
                    <p>
                        Wanderland, trụ sở tại Utah, Mỹ, là một blog của Markus Thompson. 
                        Các bài viết của anh khám phá trải nghiệm ngoài trời qua ảnh và nhật ký với mẹo & thủ thuật hữu ích.
                    </p>
                </div>

                <!-- About -->
                <div class="col-md-3 footer-column about-the-blog mb-4">
                    <h4 class="footer-title">VỀ BLOG</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
                </div>

                <!-- Subscribe -->
                <div class="col-md-3 footer-column subscribe-newsletter mb-4">
                    <h4 class="footer-title">ĐĂNG KÝ NHẬN TIN</h4>
                    <form class="footer-form">
                        <input type="text" name="your-name" placeholder="Tên của bạn...">
                        <input type="email" name="your-email" placeholder="Email của bạn...">
                        <button type="submit">ĐĂNG KÝ <i class="fas fa-arrow-right"></i></button>
                    </form>
                </div>

                <!-- Recent News -->
                <div class="col-md-3 footer-column recent-news mb-4">
                    <h4 class="footer-title">TIN TỨC GẦN ĐÂY</h4>
                    <ul>
                        <li>
                            <i class="far fa-calendar-alt"></i> 
                            <?php echo date('d/m/Y'); ?> Chuyến đi tới Iceland
                        </li>
                        <li>
                            <i class="far fa-calendar-alt"></i> 
                            <?php echo date('d/m/Y'); ?> Bờ biển biến mất Ấn Độ
                        </li>
                        <li>
                            <i class="far fa-calendar-alt"></i> 
                            <?php echo date('d/m/Y'); ?> Thăm Rabat
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom-area border-top border-light py-3">
        <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="socials mb-2 mb-md-0">
                <span class="me-2">Mạng xã hội</span>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
            </div>
            <div class="footer-copyright mb-2 mb-md-0">
                <p class="mb-0">&copy; <?php echo date('Y'); ?> Wonderland Theme. Mọi quyền được bảo lưu</p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
<script>
document.addEventListener("scroll", function() {
  if (window.scrollY > 50) {
    document.body.classList.add("scrolled");
  } else {
    document.body.classList.remove("scrolled");
  }
});
</script>
