<?php
/*
Template Name: Contact Page
*/

get_header();
?>

<?php while (have_posts()) : the_post(); ?>
    <?php $contact_form = winner_get_contact_form_state(); ?>
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
                <div class="winner-contact-form-wrap">
                    <h3>Để lại thông tin của bạn</h3>
                    <p class="winner-contact-intro">Winner sẽ phản hồi để tư vấn sản phẩm, hỗ trợ đặt hàng hoặc trao đổi hợp tác.</p>

                    <?php if ($contact_form['message'] !== '') : ?>
                        <div class="winner-form-notice <?php echo $contact_form['success'] ? 'is-success' : 'is-error'; ?>">
                            <?php echo esc_html($contact_form['message']); ?>
                        </div>
                    <?php endif; ?>

                    <form class="winner-contact-form" method="post" action="<?php echo esc_url(get_permalink()); ?>">
                        <?php wp_nonce_field('winner_contact_form', 'winner_contact_nonce'); ?>
                        <div class="winner-form-grid">
                            <div class="winner-form-field">
                                <label for="winner_name">Họ và tên</label>
                                <input
                                    id="winner_name"
                                    name="winner_name"
                                    type="text"
                                    value="<?php echo esc_attr($contact_form['values']['name']); ?>"
                                    placeholder="Nguyễn Văn A"
                                    required
                                >
                                <?php if (isset($contact_form['errors']['name'])) : ?>
                                    <p class="winner-field-error"><?php echo esc_html($contact_form['errors']['name']); ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="winner-form-field">
                                <label for="winner_phone">Số điện thoại</label>
                                <input
                                    id="winner_phone"
                                    name="winner_phone"
                                    type="tel"
                                    value="<?php echo esc_attr($contact_form['values']['phone']); ?>"
                                    placeholder="0909 000 111"
                                    required
                                >
                                <?php if (isset($contact_form['errors']['phone'])) : ?>
                                    <p class="winner-field-error"><?php echo esc_html($contact_form['errors']['phone']); ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="winner-form-field">
                                <label for="winner_email">Email</label>
                                <input
                                    id="winner_email"
                                    name="winner_email"
                                    type="email"
                                    value="<?php echo esc_attr($contact_form['values']['email']); ?>"
                                    placeholder="bạn@email.com"
                                    required
                                >
                                <?php if (isset($contact_form['errors']['email'])) : ?>
                                    <p class="winner-field-error"><?php echo esc_html($contact_form['errors']['email']); ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="winner-form-field">
                                <label for="winner_subject">Nhu cầu liên hệ</label>
                                <input
                                    id="winner_subject"
                                    name="winner_subject"
                                    type="text"
                                    value="<?php echo esc_attr($contact_form['values']['subject']); ?>"
                                    placeholder="Tư vấn sản phẩm / Đặt hàng / Hợp tác"
                                    required
                                >
                                <?php if (isset($contact_form['errors']['subject'])) : ?>
                                    <p class="winner-field-error"><?php echo esc_html($contact_form['errors']['subject']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="winner-form-field">
                            <label for="winner_message">Nội dung</label>
                            <textarea
                                id="winner_message"
                                name="winner_message"
                                rows="6"
                                placeholder="Mời bạn để lại nội dung cần Winner hỗ trợ"
                                required
                            ><?php echo esc_textarea($contact_form['values']['message']); ?></textarea>
                            <?php if (isset($contact_form['errors']['message'])) : ?>
                                <p class="winner-field-error"><?php echo esc_html($contact_form['errors']['message']); ?></p>
                            <?php endif; ?>
                        </div>

                        <button class="winner-button winner-button-primary" type="submit" name="winner_contact_submit" value="1">
                            Gửi thông tin
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>
