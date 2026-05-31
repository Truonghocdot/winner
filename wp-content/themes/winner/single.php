<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <section class="winner-page-header">
        <div class="winner-container">
            <span class="winner-label">Bài viết</span>
            <h1 class="winner-page-title"><?php the_title(); ?></h1>
            <p class="winner-note"><?php echo esc_html(get_the_date()); ?></p>
        </div>
    </section>

    <section class="winner-page-content">
        <div class="winner-container">
            <div class="winner-page-box">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>
