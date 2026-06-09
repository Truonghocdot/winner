<?php

function winner_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);

    register_nav_menus([
        'primary' => __('Menu chính', 'winner'),
        'footer' => __('Menu chân trang', 'winner'),
    ]);
}
add_action('after_setup_theme', 'winner_setup');

function winner_assets(): void
{
    wp_enqueue_style('winner-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'winner_assets');

function winner_menu_fallback(): void
{
    echo '<ul>';
    wp_list_pages([
        'title_li' => '',
        'depth' => 1,
    ]);
    echo '</ul>';
}

function winner_excerpt_more(string $more): string
{
    return '...';
}
add_filter('excerpt_more', 'winner_excerpt_more');

function winner_get_contact_form_state(): array
{
    $state = [
        'success' => false,
        'message' => '',
        'errors' => [],
        'values' => [
            'name' => '',
            'phone' => '',
            'email' => '',
            'subject' => '',
            'message' => '',
        ],
    ];

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return $state;
    }

    if (!isset($_POST['winner_contact_submit'])) {
        return $state;
    }

    $nonce = isset($_POST['winner_contact_nonce']) ? sanitize_text_field(wp_unslash($_POST['winner_contact_nonce'])) : '';
    if (!wp_verify_nonce($nonce, 'winner_contact_form')) {
        $state['message'] = 'Phiên gửi biểu mẫu đã hết hạn. Vui lòng thử lại.';
        return $state;
    }

    $state['values'] = [
        'name' => isset($_POST['winner_name']) ? sanitize_text_field(wp_unslash($_POST['winner_name'])) : '',
        'phone' => isset($_POST['winner_phone']) ? sanitize_text_field(wp_unslash($_POST['winner_phone'])) : '',
        'email' => isset($_POST['winner_email']) ? sanitize_email(wp_unslash($_POST['winner_email'])) : '',
        'subject' => isset($_POST['winner_subject']) ? sanitize_text_field(wp_unslash($_POST['winner_subject'])) : '',
        'message' => isset($_POST['winner_message']) ? sanitize_textarea_field(wp_unslash($_POST['winner_message'])) : '',
    ];

    if ($state['values']['name'] === '') {
        $state['errors']['name'] = 'Vui lòng nhập họ và tên.';
    }

    if ($state['values']['phone'] === '') {
        $state['errors']['phone'] = 'Vui lòng nhập số điện thoại.';
    }

    if ($state['values']['email'] === '') {
        $state['errors']['email'] = 'Vui lòng nhập email.';
    } elseif (!is_email($state['values']['email'])) {
        $state['errors']['email'] = 'Địa chỉ email chưa đúng định dạng.';
    }

    if ($state['values']['subject'] === '') {
        $state['errors']['subject'] = 'Vui lòng nhập nhu cầu liên hệ.';
    }

    if ($state['values']['message'] === '') {
        $state['errors']['message'] = 'Vui lòng nhập nội dung cần hỗ trợ.';
    }

    if (!empty($state['errors'])) {
        $state['message'] = 'Vui lòng kiểm tra lại các trường thông tin.';
        return $state;
    }

    $admin_email = get_option('admin_email');
    $subject = sprintf('Khach hang lien he tu website: %s', $state['values']['subject']);
    $body = implode("\n", [
        'Khach hang vua gui thong tin lien he tu website Winner.',
        '',
        'Ho ten: ' . $state['values']['name'],
        'So dien thoai: ' . $state['values']['phone'],
        'Email: ' . $state['values']['email'],
        'Nhu cau: ' . $state['values']['subject'],
        '',
        'Noi dung:',
        $state['values']['message'],
    ]);

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        sprintf('Reply-To: %s <%s>', $state['values']['name'], $state['values']['email']),
    ];

    $sent = wp_mail($admin_email, $subject, $body, $headers);

    if (!$sent) {
        $state['message'] = 'He thong chua gui duoc thong tin. Vui long thu lai sau.';
        return $state;
    }

    $state['success'] = true;
    $state['message'] = 'Winner da nhan duoc thong tin cua ban. Chung toi se lien he som nhat.';
    $state['values'] = [
        'name' => '',
        'phone' => '',
        'email' => '',
        'subject' => '',
        'message' => '',
    ];

    return $state;
}

function winner_seed_pages(): void
{
    $pages = [
        'trang-chu' => [
            'title' => 'Trang chủ',
            'content' => "<p>Winner là thương hiệu thời trang nam nữ theo đuổi tinh thần tối giản, hiện đại và dễ mặc mỗi ngày.</p>\n<p>Chúng tôi tập trung vào những phom dáng gọn, chất liệu dễ chịu và bảng màu dễ phối đồ cho cả nam và nữ.</p>",
            'template' => 'default',
        ],
        'san-pham' => [
            'title' => 'Sản phẩm',
            'content' => "<p>Không gian này dùng để giới thiệu các dòng sản phẩm nổi bật của Winner như áo sơ mi, áo thun, quần tây, đầm, chân váy và các set đồ theo mùa.</p>",
            'template' => 'template-products.php',
        ],
        'gioi-thieu' => [
            'title' => 'Giới thiệu',
            'content' => "<p>Winner được xây dựng như một nhãn hiệu thời trang nam nữ tối giản, hướng đến sự chỉn chu trong từng chi tiết và khả năng ứng dụng cao trong đời sống hằng ngày.</p>\n<p>Chúng tôi tin rằng một tủ đồ đẹp không cần quá phức tạp. Điều quan trọng là chất liệu, tỉ lệ và cảm giác khi mặc.</p>",
            'template' => 'template-about.php',
        ],
        'tin-tuc' => [
            'title' => 'Tin tức',
            'content' => "<p>Cập nhật bộ sưu tập mới, lookbook, xu hướng và những cách phối đồ đơn giản từ Winner.</p>",
            'template' => 'default',
        ],
        'lien-he' => [
            'title' => 'Liên hệ',
            'content' => "<p>Để lại thông tin của bạn để Winner tư vấn sản phẩm, hợp tác hoặc hỗ trợ đặt hàng.</p>",
            'template' => 'template-contact.php',
        ],
    ];

    $created = [];

    foreach ($pages as $slug => $page) {
        $existing = get_page_by_path($slug, OBJECT, 'page');

        if ($existing instanceof WP_Post) {
            $created[$slug] = (int) $existing->ID;
            continue;
        }

        $page_id = wp_insert_post([
            'post_type' => 'page',
            'post_status' => 'publish',
            'post_title' => $page['title'],
            'post_name' => $slug,
            'post_content' => $page['content'],
        ]);

        if (is_wp_error($page_id) || !$page_id) {
            continue;
        }

        if ($page['template'] !== 'default') {
            update_post_meta($page_id, '_wp_page_template', $page['template']);
        }

        $created[$slug] = (int) $page_id;
    }

    if (!empty($created['trang-chu'])) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $created['trang-chu']);
    }

    if (!empty($created['tin-tuc'])) {
        update_option('page_for_posts', $created['tin-tuc']);
    }

    update_option('winner_seeded_pages', $created);
}

function winner_seed_posts(): void
{
    $posts = [
        [
            'title' => 'Bộ sưu tập trung tính cho mùa mới',
            'slug' => 'bo-suu-tap-trung-tinh-cho-mua-moi',
            'content' => "Winner giới thiệu những set đồ trung tính, dễ phối và phù hợp với nhịp sống thành phố. Bảng màu kem, đen, nâu và ghi giúp tổng thể trở nên gọn gàng và hiện đại.",
        ],
        [
            'title' => '3 gợi ý phối đồ công sở nam nữ',
            'slug' => '3-goi-y-phoi-do-cong-so-nam-nu',
            'content' => "Một chiếc áo sơ mi đúng phom, quần ống suông vừa phải và blazer nhẹ là đủ để tạo nên tổng thể lịch sự. Với nữ, có thể thay bằng chân váy midi hoặc quần suông tối giản.",
        ],
        [
            'title' => 'Chất liệu quan trọng như thế nào',
            'slug' => 'chat-lieu-quan-trong-nhu-the-nao',
            'content' => "Chất liệu quyết định độ rủ, độ bền và trải nghiệm khi mặc. Winner ưu tiên các loại vải dễ chịu, giữ phom tốt và phù hợp khi mặc hằng ngày.",
        ],
    ];

    foreach ($posts as $post) {
        $existing = get_page_by_path($post['slug'], OBJECT, 'post');
        if ($existing instanceof WP_Post) {
            continue;
        }

        wp_insert_post([
            'post_type' => 'post',
            'post_status' => 'publish',
            'post_title' => $post['title'],
            'post_name' => $post['slug'],
            'post_content' => $post['content'],
            'post_excerpt' => $post['content'],
        ]);
    }
}

function winner_seed_menu(): void
{
    $locations = get_theme_mod('nav_menu_locations');
    if (!empty($locations['primary'])) {
        return;
    }

    $menu_name = 'Menu Winner';
    $menu = wp_get_nav_menu_object($menu_name);
    $menu_id = $menu ? (int) $menu->term_id : wp_create_nav_menu($menu_name);

    if (!$menu_id || is_wp_error($menu_id)) {
        return;
    }

    $slugs = ['trang-chu', 'san-pham', 'gioi-thieu', 'tin-tuc', 'lien-he'];

    foreach ($slugs as $slug) {
        $page = get_page_by_path($slug, OBJECT, 'page');
        if (!$page instanceof WP_Post) {
            continue;
        }

        $items = wp_get_nav_menu_items($menu_id);
        $exists = false;
        if (is_array($items)) {
            foreach ($items as $item) {
                if ((int) $item->object_id === (int) $page->ID) {
                    $exists = true;
                    break;
                }
            }
        }

        if ($exists) {
            continue;
        }

        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-object-id' => $page->ID,
            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-status' => 'publish',
        ]);
    }

    set_theme_mod('nav_menu_locations', [
        'primary' => $menu_id,
        'footer' => $menu_id,
    ]);
}

function winner_seed_site(): void
{
    if (get_option('winner_theme_seeded')) {
        return;
    }

    winner_seed_pages();
    winner_seed_posts();
    winner_seed_menu();

    update_option('blogname', 'Winner');
    update_option('blogdescription', 'Thời trang nam nữ tối giản và hiện đại');
    update_option('winner_theme_seeded', 1);
}
add_action('after_switch_theme', 'winner_seed_site');
