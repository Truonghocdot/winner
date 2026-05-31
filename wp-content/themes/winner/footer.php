    </main>
    <footer class="winner-site-footer">
        <div class="winner-container">
            <div class="winner-footer-box">
                <div>
                    <strong><?php bloginfo('name'); ?></strong><br>
                    <span>Thời trang nam nữ tối giản cho nhịp sống hiện đại.</span>
                </div>
                <div class="winner-footer-links">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer',
                        'container' => false,
                        'fallback_cb' => 'winner_menu_fallback',
                        'menu_class' => '',
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
