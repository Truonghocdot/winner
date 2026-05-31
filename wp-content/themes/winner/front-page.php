<?php get_header(); ?>

<section class="winner-hero">
    <div class="winner-container winner-hero-grid">
        <div class="winner-hero-copy">
            <span class="winner-label">Bộ sưu tập Winner</span>
            <h1>Phong cách gọn, đẹp và dễ mặc mỗi ngày.</h1>
            <p class="winner-lead">
                Winner là thương hiệu thời trang nam nữ theo đuổi tinh thần tối giản, hiện đại và thanh lịch.
                Từ áo sơ mi, áo thun, quần tây đến đầm và set đồ, mỗi thiết kế đều hướng đến sự tiện dụng
                và gu thẩm mỹ rõ ràng.
            </p>
            <div class="winner-actions">
                <a class="winner-button winner-button-primary" href="<?php echo esc_url(home_url('/san-pham')); ?>">Xem sản phẩm</a>
                <a class="winner-button winner-button-secondary" href="<?php echo esc_url(home_url('/gioi-thieu')); ?>">Tìm hiểu Winner</a>
            </div>
        </div>
        <div class="winner-hero-visual-wrap">
            <div class="winner-hero-visual">
                <div class="winner-hero-top">
                    <span class="winner-pill">Hàng mới về</span>
                    <span class="winner-pill">BST 2026</span>
                </div>
                <div class="winner-hero-title">Winner Fashion</div>
                <div class="winner-hero-bottom">
                    <span class="winner-pill">Nam</span>
                    <span class="winner-pill">Nữ</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="winner-section">
    <div class="winner-container">
        <div class="winner-section-head">
            <div>
                <span class="winner-label">Danh mục nổi bật</span>
                <h2 class="winner-section-heading">Những dòng sản phẩm được quan tâm nhiều.</h2>
            </div>
            <p class="winner-section-text">
                Giao diện được bố trí gọn, dễ đọc và dễ mở rộng sau này nếu anh muốn thêm lookbook, catalogue hay đặt hàng.
            </p>
        </div>
        <div class="winner-grid-4">
            <article class="winner-card">
                <div class="winner-lookbook winner-tone-men"></div>
                <h3>Thời trang nam</h3>
                <p>Sơ mi, áo khoác, quần tây và những set đồ mang tính ứng dụng cao.</p>
                <span class="winner-price">Từ 390.000đ</span>
            </article>
            <article class="winner-card">
                <div class="winner-lookbook winner-tone-women"></div>
                <h3>Thời trang nữ</h3>
                <p>Đầm, áo, chân váy và các set đồ tối giản dễ mặc mỗi ngày.</p>
                <span class="winner-price">Từ 420.000đ</span>
            </article>
            <article class="winner-card">
                <div class="winner-lookbook winner-tone-soft"></div>
                <h3>Công sở</h3>
                <p>Những lựa chọn gọn gàng và lịch sự cho ngày đi làm.</p>
                <span class="winner-price">Từ 450.000đ</span>
            </article>
            <article class="winner-card">
                <div class="winner-lookbook winner-tone-dark"></div>
                <h3>Cuối tuần</h3>
                <p>Trang phục dễ chịu, dễ phối và giữ được chất riêng của Winner.</p>
                <span class="winner-price">Từ 350.000đ</span>
            </article>
        </div>
    </div>
</section>

<section class="winner-section">
    <div class="winner-container">
        <div class="winner-section-head">
            <div>
                <span class="winner-label">Định hướng thương hiệu</span>
                <h2 class="winner-section-heading">Đơn giản nhưng vẫn có điểm nhấn.</h2>
            </div>
        </div>
        <div class="winner-grid-3">
            <article class="winner-card">
                <h3>Phom dáng dễ mặc</h3>
                <p>Độ rộng vừa phải, đủ để thoải mái nhưng vẫn giữ tổng thể gọn và sạch.</p>
            </article>
            <article class="winner-card">
                <h3>Bảng màu dễ phối</h3>
                <p>Tập trung vào đen, trắng, kem, ghi, nâu và các gam trung tính phù hợp cả nam và nữ.</p>
            </article>
            <article class="winner-card">
                <h3>Trưng bày rõ ràng</h3>
                <p>Trang chủ và các trang con được chia khối rõ để giới thiệu sản phẩm, bài viết và thông tin liên hệ.</p>
            </article>
        </div>
    </div>
</section>

<section class="winner-section">
    <div class="winner-container">
        <div class="winner-band">
            <div class="winner-band-grid">
                <div>
                    <span class="winner-label">Về Winner</span>
                    <h2>Một website nhỏ cho thương hiệu thời trang nam nữ.</h2>
                    <p>
                        Theme này phù hợp để bắt đầu với các trang cơ bản như trang chủ, sản phẩm, giới thiệu,
                        tin tức và liên hệ. Sau này có thể mở rộng thêm bộ sưu tập, lookbook hoặc giỏ hàng.
                    </p>
                </div>
                <div class="winner-actions">
                    <a class="winner-button winner-button-primary" href="<?php echo esc_url(home_url('/lien-he')); ?>">Liên hệ ngay</a>
                    <a class="winner-button winner-button-secondary" href="<?php echo esc_url(home_url('/tin-tuc')); ?>">Xem tin tức</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$recent_posts = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post_status' => 'publish',
]);
?>
<section class="winner-section">
    <div class="winner-container">
        <div class="winner-section-head">
            <div>
                <span class="winner-label">Tin tức mới</span>
                <h2 class="winner-section-heading">Cập nhật xu hướng và cách phối đồ.</h2>
            </div>
        </div>
        <?php if ($recent_posts->have_posts()) : ?>
            <div class="winner-grid-3">
                <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                    <article class="winner-post-card">
                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <div class="winner-page-box">
                <p>Chưa có bài viết nào.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
