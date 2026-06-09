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

        <div class="wrap">
            <h1>تنظیمات نمونه کارها</h1>

            <form method="post" action="options.php">
                <?php settings_fields('tit_20260606_settings_group'); ?>

                <table class="form-table">

                    <tr>
                        <th scope="row">تصویر پیش‌فرض نمونه کار</th>
                        <td>
                            <?php $this->render_media_field('default_image', (int) $default_image); ?>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">تصویر پیش‌فرض هیرو</th>
                        <td>
                            <?php $this->render_media_field('default_hero_image', (int) $default_hero_image); ?>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">تصویر هیرو آرشیو نمونه کارها</th>
                        <td>
                            <?php $this->render_media_field('archive_hero_image', (int) $archive_hero_image); ?>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">متن دکمه مشاوره</th>
                        <td>
                            <input type="text"
                                   name="<?php echo esc_attr($this->option_name); ?>[consultation_button_text]"
                                   value="<?php echo esc_attr($button_text); ?>"
                                   class="regular-text">
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">لینک دکمه مشاوره</th>
                        <td>
                            <input type="url"
                                   name="<?php echo esc_attr($this->option_name); ?>[consultation_button_url]"
                                   value="<?php echo esc_url($button_url); ?>"
                                   class="regular-text">
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">تعداد پیش‌فرض نمایش</th>
                        <td>
                            <input type="number"
                                   name="<?php echo esc_attr($this->option_name); ?>[latest_posts_count]"
                                   value="<?php echo esc_attr($latest_posts_count); ?>"
                                   min="1"
                                   max="24">
                        </td>
                    </tr>

                </table>

                <?php submit_button('ذخیره تنظیمات'); ?>
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

            <div class="tit-20260606-media-preview" style="margin-bottom:10px;">
                <?php if ($image_url) : ?>
                    <img src="<?php echo esc_url($image_url); ?>" style="max-width:150px;height:auto;">
                <?php endif; ?>
            </div>

            <button type="button" class="button tit-20260606-select-media">
                انتخاب تصویر
            </button>

            <button type="button" class="button tit-20260606-remove-media">
                حذف تصویر
            </button>

        </div>

        <?php
    }
}