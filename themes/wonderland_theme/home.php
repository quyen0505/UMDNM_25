<?php
/**
 * Template Name: Home Page
 *
 * This is the template for the home page of the Wonderland theme.
 */

get_header(); ?>

<?php
// Lấy toàn bộ Group field 'slider'
$slider_group = get_field('slider'); 

// Tạo một mảng mới để lưu các URL hình ảnh
$images = [];

if (!empty($slider_group)) {
    // Truy cập từng trường con trong group
    // Chỉ thêm vào mảng nếu trường không rỗng
    if (!empty($slider_group['image1'])) {
        $images[] = $slider_group['image1'];
    }
    if (!empty($slider_group['image2'])) {
        $images[] = $slider_group['image2'];
    }
    if (!empty($slider_group['image3'])) {
        $images[] = $slider_group['image3'];
    }
    // Tiếp tục thêm các dòng tương tự nếu bạn có nhiều trường image hơn
}
?>

<?php if (!empty($images)) : ?>
    <div id="wonderlandCarousel" class="carousel slide" data-bs-ride="carousel">
        
        <div class="carousel-indicators">
            <?php foreach ($images as $index => $img_url) : ?>
                <button type="button" data-bs-target="#wonderlandCarousel" data-bs-slide-to="<?php echo $index; ?>" <?php echo ($index == 0) ? 'class="active" aria-current="true"' : ''; ?> aria-label="Slide <?php echo $index + 1; ?>"></button>
            <?php endforeach; ?>
        </div>

        <div class="carousel-inner">
            <?php foreach ($images as $index => $img_url) : ?>
                <div class="carousel-item <?php echo ($index == 0) ? 'active' : ''; ?>">
                    <img src="<?php echo esc_url($img_url); ?>" class="d-block w-100" alt="Slide <?php echo $index + 1; ?>">
                </div>
            <?php endforeach; ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#wonderlandCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#wonderlandCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<?php else : ?>
    <div style="color:red; font-size:14px; padding: 20px;">No images found. Please check your 'slider' group field.</div>
<?php endif; ?>

<?php get_footer(); ?>