<?php

if (!defined('ABSPATH')) {
    exit;
}

class TIT_20260606_Settings {

    private string $option_name = 'tit_20260606_settings';

    public function init(): void {
        add_action('admin_menu', [$this, 'add_settings_page']);
        add_action('admin_init', [$this, 'register_settings']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    public function add_settings_page(): void {
        add_submenu_page(
            'edit.php?post_type=tit_20260606_pf',
            'تنظیمات نمونه کارها',
            'تنظیمات',
            'manage_options',
            'tit-20260606-settings',
            [$this, 'render_settings_page']
        );
    }

    public function enqueue_assets($hook): void {
        if (strpos($hook, 'tit-20260606-settings') === false) {
            return;
        }

        wp_enqueue_media();

        wp_enqueue_style(
            'tit-20260606-admin',
            TIT_20260606_URL . 'assets/admin.css',
            [],
            TIT_20260606_VERSION
        );

        wp_enqueue_script(
            'tit-20260606-admin',
            TIT_20260606_URL . 'assets/admin.js',
            ['jquery'],
            TIT_20260606_VERSION,
            true
        );
    }

    public function register_settings(): void {
        register_setting(
            'tit_20260606_settings_group',
            $this->option_name,
            [$this, 'sanitize_settings']
        );
    }

    public function sanitize_settings($input): array {
        return [
            'default_image' => isset($input['default_image']) ? absint($input['default_image']) : 0,
            'default_hero_image' => isset($input['default_hero_image']) ? absint($input['default_hero_image']) : 0,
            'archive_hero_image' => isset($input['archive_hero_image']) ? absint($input['archive_hero_image']) : 0,
            'consultation_button_text' => isset($input['consultation_button_text'])
                ? sanitize_text_field($input['consultation_button_text'])
                : '',
            'consultation_button_url' => isset($input['consultation_button_url'])
                ? esc_url_raw($input['consultation_button_url'])
                : '',
            'latest_posts_count' => isset($input['latest_posts_count'])
                ? absint($input['latest_posts_count'])
                : 8,
        ];
    }

    public function render_settings_page(): void {
        $settings = get_option($this->option_name, []);

        $default_image = $settings['default_image'] ?? 0;
        $default_hero_image = $settings['default_hero_image'] ?? 0;
        $archive_hero_image = $settings['archive_hero_image'] ?? 0;

        $button_text = $settings['consultation_button_text'] ?? 'دریافت مشاوره رایگان';
        $button_url = $settings['consultation_button_url'] ?? home_url('/free-consultation/');
        $latest_posts_count = $settings['latest_posts_count'] ?? 8;
        ?>

        <div class="wrap tit-20260606-admin-page">

            <div class="tit-20260606-admin-header">
                <div>
                    <h1>تنظیمات نمونه کارها</h1>
                    <p>مدیریت تنظیمات عمومی پلاگین Portfolio Tehran IT</p>
                </div>

                <span class="tit-20260606-version">
                    Version <?php echo esc_html(TIT_20260606_VERSION); ?>
                </span>
            </div>

            <form method="post" action="options.php">
                <?php settings_fields('tit_20260606_settings_group'); ?>

                <div class="tit-20260606-settings-grid">

                    <section class="tit-20260606-card">
                        <h2>تصاویر پیش‌فرض</h2>
                        <p class="tit-20260606-card-desc">
                            اگر برای نمونه کار یا هیرو تصویری انتخاب نشده باشد، این تصاویر استفاده می‌شوند.
                        </p>

                        <div class="tit-20260606-field">
                            <label>تصویر پیش‌فرض نمونه کار</label>
                            <?php $this->render_media_field('default_image', (int) $default_image); ?>
                        </div>

                        <div class="tit-20260606-field">
                            <label>تصویر پیش‌فرض هیرو</label>
                            <?php $this->render_media_field('default_hero_image', (int) $default_hero_image); ?>
                        </div>

                        <div class="tit-20260606-field">
                            <label>تصویر هیرو آرشیو نمونه کارها</label>
                            <?php $this->render_media_field('archive_hero_image', (int) $archive_hero_image); ?>
                        </div>
                    </section>

                    <section class="tit-20260606-card">
                        <h2>دکمه مشاوره</h2>
                        <p class="tit-20260606-card-desc">
                            متن و لینک دکمه مشاوره در بخش‌های هیرو استفاده می‌شود.
                        </p>

                        <div class="tit-20260606-field">
                            <label for="tit-20260606-button-text">متن دکمه مشاوره</label>
                            <input id="tit-20260606-button-text"
                                   type="text"
                                   name="<?php echo esc_attr($this->option_name); ?>[consultation_button_text]"
                                   value="<?php echo esc_attr($button_text); ?>"
                                   class="regular-text">
                        </div>

                        <div class="tit-20260606-field">
                            <label for="tit-20260606-button-url">لینک دکمه مشاوره</label>
                            <input id="tit-20260606-button-url"
                                   type="url"
                                   name="<?php echo esc_attr($this->option_name); ?>[consultation_button_url]"
                                   value="<?php echo esc_url($button_url); ?>"
                                   class="regular-text">
                        </div>
                    </section>

                    <section class="tit-20260606-card">
                        <h2>نمایش نمونه کارها</h2>
                        <p class="tit-20260606-card-desc">
                            تعداد پیش‌فرض آیتم‌هایی که در لیست‌های نمونه کار نمایش داده می‌شود.
                        </p>

                        <div class="tit-20260606-field">
                            <label for="tit-20260606-latest-count">تعداد پیش‌فرض نمایش</label>
                            <input id="tit-20260606-latest-count"
                                   type="number"
                                   name="<?php echo esc_attr($this->option_name); ?>[latest_posts_count]"
                                   value="<?php echo esc_attr($latest_posts_count); ?>"
                                   min="1"
                                   max="24">
                        </div>
                    </section>

                </div>

                <div class="tit-20260606-submit">
                    <?php submit_button('ذخیره تنظیمات'); ?>
                </div>

            </form>
        </div>

        <?php
    }

    private function render_media_field(string $field_key, int $image_id): void {
        $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'thumbnail') : '';
        ?>

        <div class="tit-20260606-media-field">

            <input type="hidden"
                   name="<?php echo esc_attr($this->option_name); ?>[<?php echo esc_attr($field_key); ?>]"
                   value="<?php echo esc_attr($image_id); ?>"
                   class="tit-20260606-media-id">

            <div class="tit-20260606-media-preview">
                <?php if ($image_url) : ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="">
                <?php else : ?>
                    <span>تصویری انتخاب نشده است</span>
                <?php endif; ?>
            </div>

            <div class="tit-20260606-media-actions">
                <button type="button" class="button tit-20260606-select-media">
                    انتخاب تصویر
                </button>

                <button type="button" class="button tit-20260606-remove-media">
                    حذف تصویر
                </button>
            </div>

        </div>

        <?php
    }
}