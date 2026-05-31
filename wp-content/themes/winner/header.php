<?php
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="winner-shell">
    <header class="winner-site-header">
        <div class="winner-container winner-header-row">
            <a class="winner-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <span class="winner-brand-mark"><?php bloginfo('name'); ?></span>
                <span class="winner-brand-note">Thời trang nam nữ hiện đại</span>
            </a>
            <nav class="winner-nav" aria-label="<?php esc_attr_e('Điều hướng chính', 'winner'); ?>">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container' => false,
                    'fallback_cb' => 'winner_menu_fallback',
                    'menu_class' => '',
                ]);
                ?>
            </nav>
        </div>
    </header>
    <main class="winner-main">
