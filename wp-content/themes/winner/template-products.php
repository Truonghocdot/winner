<?php
/*
Template Name: Products Page
*/

get_header();
?>

<?php while (have_posts()) : the_post(); ?>
    <section class="winner-page-header">
        <div class="winner-container">
            <span class="winner-label">Winner Collection</span>
            <h1 class="winner-page-title"><?php the_title(); ?></h1>
            <p class="winner-note">Bộ sưu tập thời trang tối giản, sang trọng và đầy tính ứng dụng cho cuộc sống hiện đại.</p>
        </div>
    </section>

    <section class="winner-page-content">
        <div class="winner-container">
            <div class="winner-page-box" style="margin-bottom: 50px;">
                <h3 style="margin-top: 0; font-size: 1.6rem; font-weight: 700; color: var(--winner-dark);">Chào mừng bạn đến với Winner</h3>
                <?php the_content(); ?>
            </div>

            <!-- Product Grid -->
            <h2 class="winner-section-heading" style="text-align: center; margin-bottom: 40px;">Sản phẩm nổi bật</h2>
            <div class="winner-grid-4">
                <!-- Product 1 -->
                <article class="winner-card">
                    <div class="winner-lookbook-img">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/prod_shirt_men.png'); ?>" alt="Áo Sơ Mi Oxford Minimalist">
                    </div>
                    <span class="winner-label" style="font-size: 0.7rem; padding: 4px 10px; margin-bottom: 12px;">Nam</span>
                    <h3>Áo Sơ Mi Oxford Minimalist</h3>
                    <p>Form đứng chỉn chu, vải Oxford cotton 100% tự nhiên thoáng khí, cực kỳ thanh lịch.</p>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: auto; padding-top: 16px;">
                        <span class="winner-price" style="margin-top: 0;">450.000₫</span>
                        <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="winner-button" style="min-height: 38px; padding: 0 16px; font-size: 0.85rem; background: var(--winner-dark); color: #fff; border-radius: 8px;">Mua ngay</a>
                    </div>
                </article>

                <!-- Product 2 -->
                <article class="winner-card">
                    <div class="winner-lookbook-img">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/prod_dress_women.png'); ?>" alt="Đầm Linen Dáng Suông Tối Giản">
                    </div>
                    <span class="winner-label" style="font-size: 0.7rem; padding: 4px 10px; margin-bottom: 12px;">Nữ</span>
                    <h3>Đầm Linen Dáng Suông Tối Giản</h3>
                    <p>Vải linen rủ nhẹ tự nhiên, sắc rêu mát mẻ và thanh thoát cho ngày hè đầy nắng.</p>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: auto; padding-top: 16px;">
                        <span class="winner-price" style="margin-top: 0;">620.000₫</span>
                        <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="winner-button" style="min-height: 38px; padding: 0 16px; font-size: 0.85rem; background: var(--winner-dark); color: #fff; border-radius: 8px;">Mua ngay</a>
                    </div>
                </article>

                <!-- Product 3 -->
                <article class="winner-card">
                    <div class="winner-lookbook-img">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/prod_blazer_men.png'); ?>" alt="Áo Blazer Nam Premium">
                    </div>
                    <span class="winner-label" style="font-size: 0.7rem; padding: 4px 10px; margin-bottom: 12px;">Nam</span>
                    <h3>Áo Blazer Nam Premium</h3>
                    <p>Đường may đo sắc sảo, cấu trúc vai đệm nhẹ tạo phom dáng vững chãi mà vẫn thoải mái.</p>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: auto; padding-top: 16px;">
                        <span class="winner-price" style="margin-top: 0;">890.000₫</span>
                        <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="winner-button" style="min-height: 38px; padding: 0 16px; font-size: 0.85rem; background: var(--winner-dark); color: #fff; border-radius: 8px;">Mua ngay</a>
                    </div>
                </article>

                <!-- Product 4 -->
                <article class="winner-card">
                    <div class="winner-lookbook-img">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/prod_knit_women.png'); ?>" alt="Set Áo Dệt Kim & Chân Váy Midi">
                    </div>
                    <span class="winner-label" style="font-size: 0.7rem; padding: 4px 10px; margin-bottom: 12px;">Nữ</span>
                    <h3>Set Áo Dệt Kim & Chân Váy Midi</h3>
                    <p>Chất liệu len dệt kim mỏng mềm mại, tông kem trang nhã phù hợp đi làm hay dạo phố.</p>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: auto; padding-top: 16px;">
                        <span class="winner-price" style="margin-top: 0;">780.000₫</span>
                        <a href="<?php echo esc_url(home_url('/lien-he')); ?>" class="winner-button" style="min-height: 38px; padding: 0 16px; font-size: 0.85rem; background: var(--winner-dark); color: #fff; border-radius: 8px;">Mua ngay</a>
                    </div>
                </article>
            </div>

            <!-- Categories Callout -->
            <div class="winner-products-callout winner-grid-2" style="margin-top: 60px;">
                <article class="winner-card">
                    <div class="winner-lookbook winner-tone-men"></div>
                    <h3>Dành cho Nam giới</h3>
                    <p>Áo sơ mi, áo thun, quần tây, blazer nhẹ và outerwear cho phong cách thanh lịch hằng ngày.</p>
                </article>
                <article class="winner-card">
                    <div class="winner-lookbook winner-tone-women"></div>
                    <h3>Dành cho Nữ giới</h3>
                    <p>Đầm, áo, quần, chân váy và set đồ tối giản với bảng màu dễ phối và dễ bán.</p>
                </article>
            </div>

            <!-- Highlights -->
            <div class="winner-grid-3 winner-products-callout" style="margin-top: 40px;">
                <article class="winner-highlight">
                    <strong>Vải cao cấp</strong>
                    100% Cotton, Linen và dệt kim được tuyển chọn nghiêm ngặt.
                </article>
                <article class="winner-highlight">
                    <strong>Phom dáng tinh tế</strong>
                    Thiết kế suông nhẹ, gọn gàng phù hợp với vóc dáng người Việt.
                </article>
                <article class="winner-highlight">
                    <strong>Trang phục bền vững</strong>
                    Chất lượng bền vững cả về đường kim mũi chỉ và phong cách vượt thời gian.
                </article>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>
