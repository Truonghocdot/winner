<?php
/*
Template Name: About Page
*/

get_header();
?>

<?php while (have_posts()) : the_post(); ?>
    <section class="winner-page-header">
        <div class="winner-container">
            <span class="winner-label">Giới thiệu</span>
            <h1 class="winner-page-title"><?php the_title(); ?></h1>
        </div>
    </section>

    <section class="winner-page-content">
        <div class="winner-container winner-grid-2">
            <div class="winner-page-box">
                <?php the_content(); ?>
            </div>
            <div class="winner-contact-box">
                <h3>Định hướng của Winner</h3>
                <p>Thời trang nam nữ tối giản, dễ tiếp cận nhưng vẫn có tính thẩm mỹ rõ ràng.</p>
                <p>Mỗi bộ sưu tập được xây dựng để có thể mặc đi làm, đi chơi hoặc sử dụng hằng ngày.</p>
                <p>Phong cách tổng thể hướng về sự gọn gàng, dễ phối và có tính thương mại tốt.</p>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>
