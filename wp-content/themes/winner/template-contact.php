<?php
/*
Template Name: Contact Page
*/

get_header();
?>

<?php while (have_posts()) : the_post(); ?>
    <section class="winner-page-header">
        <div class="winner-container">
            <span class="winner-label">Liên hệ</span>
            <h1 class="winner-page-title"><?php the_title(); ?></h1>
        </div>
    </section>

    <section class="winner-page-content">
        <div class="winner-container winner-contact-grid">
            <div class="winner-contact-box">
                <h3>Thông tin của Winner</h3>
                <ul class="winner-contact-list">
                    <li>Địa chỉ: 123 Nguyễn Trãi, Quận 1, TP.HCM</li>
                    <li>Điện thoại: 0909 000 111</li>
                    <li>Email: hello@winner.local</li>
                    <li>Giờ mở cửa: 09:00 - 21:00</li>
                </ul>
            </div>
            <div class="winner-page-box">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>
