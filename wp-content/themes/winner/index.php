<?php get_header(); ?>

<section class="winner-page-header">
    <div class="winner-container">
        <span class="winner-label">Tin tức</span>
        <h1 class="winner-page-title"><?php bloginfo('name'); ?> chia sẻ</h1>
    </div>
</section>

<section class="winner-post-list">
    <div class="winner-container">
        <?php if (have_posts()) : ?>
            <div class="winner-post-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="winner-post-card">
                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <div class="winner-page-box">
                <p>Chưa có bài viết nào.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
