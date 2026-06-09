<?php

if (!defined('ABSPATH')) {
    exit;
}

class TIT_20260606_Meta_Boxes {

    private string $post_type = 'tit_20260606_pf';

    private string $details_meta_key = 'tit_20260606_project_details';
    private string $features_meta_key = 'tit_20260606_project_features';
    private string $background_meta_key = 'tit_20260606_background_image';

    private string $intro_title_key = 'tit_20260606_intro_title';
    private string $intro_description_key = 'tit_20260606_intro_description';
    private string $intro_image_key = 'tit_20260606_intro_image';

    public function init(): void {
        add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
        add_action('save_post_' . $this->post_type, [$this, 'save_meta_boxes']);
    }

    public function add_meta_boxes(): void {
        add_meta_box(
            'tit_20260606_background_image_meta_box',
            'تصویر بک‌گراند پروژه',
            [$this, 'render_background_image_meta_box'],
            $this->post_type,
            'side',
            'low'
        );

        add_meta_box(
            'tit_20260606_project_intro_meta_box',
            'معرفی پروژه',
            [$this, 'render_project_intro_meta_box'],
            $this->post_type,
            'normal',
            'high'
        );

        add_meta_box(
            'tit_20260606_project_details_meta_box',
            'جزئیات پروژه',
            [$this, 'render_project_details_meta_box'],
            $this->post_type,
            'normal',
            'high'
        );

        add_meta_box(
            'tit_20260606_project_features_meta_box',
            'ویژگی‌ها و امکانات پروژه',
            [$this, 'render_project_features_meta_box'],
            $this->post_type,
            'normal',
            'high'
        );
    }

    public function render_background_image_meta_box($post): void {
        wp_nonce_field('tit_20260606_save_background_image', 'tit_20260606_background_image_nonce');

        $image_id = get_post_meta($post->ID, $this->background_meta_key, true);
        $image_url = $image_id ? wp_get_attachment_image_url((int) $image_id, 'medium') : '';
        ?>

        <div class="tit-20260606-media-field">
            <input type="hidden"
                   name="tit_20260606_background_image"
                   value="<?php echo esc_attr($image_id); ?>"
                   class="tit-20260606-media-id">

            <div class="tit-20260606-media-preview" style="margin-bottom:10px;">
                <?php if ($image_url) : ?>
                    <img src="<?php echo esc_url($image_url); ?>" style="max-width:100%;height:auto;">
                <?php endif; ?>
            </div>

            <p>
                <button type="button" class="button tit-20260606-select-media">انتخاب تصویر</button>
                <button type="button" class="button tit-20260606-remove-media">حذف تصویر</button>
            </p>
        </div>

        <?php
    }

    public function render_project_intro_meta_box($post): void {
        wp_nonce_field('tit_20260606_save_project_intro', 'tit_20260606_project_intro_nonce');

        $intro_title = get_post_meta($post->ID, $this->intro_title_key, true);
        $intro_description = get_post_meta($post->ID, $this->intro_description_key, true);
        $intro_image_id = get_post_meta($post->ID, $this->intro_image_key, true);
        $intro_image_url = $intro_image_id ? wp_get_attachment_image_url((int) $intro_image_id, 'medium') : '';
        ?>

        <p>
            <label><strong>عنوان معرفی</strong></label>
            <input type="text"
                   name="tit_20260606_intro_title"
                   value="<?php echo esc_attr($intro_title); ?>"
                   class="widefat"
                   placeholder="مثلاً: طراحی سایت فروشگاهی سبز">
        </p>

        <p>
            <label><strong>توضیحات معرفی</strong></label>
            <textarea name="tit_20260606_intro_description"
                      rows="7"
                      class="widefat"
                      placeholder="توضیح کوتاه و سئو شده درباره پروژه"><?php echo esc_textarea($intro_description); ?></textarea>
        </p>

        <p>
            <label><strong>تصویر معرفی پروژه</strong> ابعاد 350*350</label>
        </p>

        <div class="tit-20260606-media-field">
            <input type="hidden"
                   name="tit_20260606_intro_image"
                   value="<?php echo esc_attr($intro_image_id); ?>"
                   class="tit-20260606-media-id">

            <div class="tit-20260606-media-preview" style="margin-bottom:10px;">
                <?php if ($intro_image_url) : ?>
                    <img src="<?php echo esc_url($intro_image_url); ?>" style="max-width:180px;height:auto;">
                <?php endif; ?>
            </div>

            <p>
                <button type="button" class="button tit-20260606-select-media">انتخاب تصویر</button>
                <button type="button" class="button tit-20260606-remove-media">حذف تصویر</button>
            </p>
        </div>

        <?php
    }

    public function render_project_details_meta_box($post): void {
        wp_nonce_field('tit_20260606_save_project_details', 'tit_20260606_project_details_nonce');

        $items = get_post_meta($post->ID, $this->details_meta_key, true);
        $items = is_array($items) ? $items : [];

        $this->render_repeater_field('tit_20260606_project_details', $items, 'افزودن جزئیات پروژه');
    }

    public function render_project_features_meta_box($post): void {
        wp_nonce_field('tit_20260606_save_project_features', 'tit_20260606_project_features_nonce');

        $items = get_post_meta($post->ID, $this->features_meta_key, true);
        $items = is_array($items) ? $items : [];

        $this->render_repeater_field('tit_20260606_project_features', $items, 'افزودن ویژگی');
    }

    private function render_repeater_field(string $field_name, array $items, string $button_text): void {
        ?>
        <div class="tit-20260606-repeater" data-field-name="<?php echo esc_attr($field_name); ?>">
            <div class="tit-20260606-repeater-items">
                <?php foreach ($items as $index => $item) : ?>
                    <div class="tit-20260606-repeater-item">
                        <p>
                            <label>عنوان</label>
                            <input type="text"
                                   name="<?php echo esc_attr($field_name); ?>[<?php echo esc_attr($index); ?>][title]"
                                   value="<?php echo esc_attr($item['title'] ?? ''); ?>"
                                   class="widefat">
                        </p>

                        <p>
                            <label>توضیح کوتاه</label>
                            <textarea name="<?php echo esc_attr($field_name); ?>[<?php echo esc_attr($index); ?>][description]"
                                      class="widefat"
                                      rows="3"><?php echo esc_textarea($item['description'] ?? ''); ?></textarea>
                        </p>

                        <p>
                            <label>آیکون Bootstrap</label>
                            <input type="text"
                                   name="<?php echo esc_attr($field_name); ?>[<?php echo esc_attr($index); ?>][icon]"
                                   value="<?php echo esc_attr($item['icon'] ?? ''); ?>"
                                   class="widefat"
                                   placeholder="مثلاً: bi-bag">
                        </p>

                        <button type="button" class="button tit-20260606-remove-item">حذف</button>
                        <hr>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="button" class="button button-primary tit-20260606-add-item">
                <?php echo esc_html($button_text); ?>
            </button>
        </div>

        <script type="text/html" class="tit-20260606-repeater-template">
            <div class="tit-20260606-repeater-item">
                <p>
                    <label>عنوان</label>
                    <input type="text" name="__FIELD_NAME__[__INDEX__][title]" class="widefat">
                </p>

                <p>
                    <label>توضیح کوتاه</label>
                    <textarea name="__FIELD_NAME__[__INDEX__][description]" class="widefat" rows="3"></textarea>
                </p>

                <p>
                    <label>آیکون Bootstrap</label>
                    <input type="text" name="__FIELD_NAME__[__INDEX__][icon]" class="widefat" placeholder="مثلاً: bi-bag">
                </p>

                <button type="button" class="button tit-20260606-remove-item">حذف</button>
                <hr>
            </div>
        </script>
        <?php
    }

    public function save_meta_boxes(int $post_id): void {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        $this->save_background_image($post_id);
        $this->save_project_intro($post_id);
        $this->save_project_details($post_id);
        $this->save_project_features($post_id);
    }

    private function save_background_image(int $post_id): void {
        if (
            !isset($_POST['tit_20260606_background_image_nonce']) ||
            !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['tit_20260606_background_image_nonce'])), 'tit_20260606_save_background_image')
        ) {
            return;
        }

        $image_id = isset($_POST['tit_20260606_background_image']) ? absint($_POST['tit_20260606_background_image']) : 0;

        if ($image_id) {
            update_post_meta($post_id, $this->background_meta_key, $image_id);
        } else {
            delete_post_meta($post_id, $this->background_meta_key);
        }
    }

    private function save_project_intro(int $post_id): void {
        if (
            !isset($_POST['tit_20260606_project_intro_nonce']) ||
            !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['tit_20260606_project_intro_nonce'])), 'tit_20260606_save_project_intro')
        ) {
            return;
        }

        $intro_title = isset($_POST['tit_20260606_intro_title'])
            ? sanitize_text_field(wp_unslash($_POST['tit_20260606_intro_title']))
            : '';

        $intro_description = isset($_POST['tit_20260606_intro_description'])
            ? sanitize_textarea_field(wp_unslash($_POST['tit_20260606_intro_description']))
            : '';

        $intro_image = isset($_POST['tit_20260606_intro_image'])
            ? absint($_POST['tit_20260606_intro_image'])
            : 0;

        update_post_meta($post_id, $this->intro_title_key, $intro_title);
        update_post_meta($post_id, $this->intro_description_key, $intro_description);

        if ($intro_image) {
            update_post_meta($post_id, $this->intro_image_key, $intro_image);
        } else {
            delete_post_meta($post_id, $this->intro_image_key);
        }
    }

    private function save_project_details(int $post_id): void {
        if (
            !isset($_POST['tit_20260606_project_details_nonce']) ||
            !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['tit_20260606_project_details_nonce'])), 'tit_20260606_save_project_details')
        ) {
            return;
        }

        $items = isset($_POST['tit_20260606_project_details'])
            ? wp_unslash($_POST['tit_20260606_project_details'])
            : [];

        update_post_meta($post_id, $this->details_meta_key, $this->sanitize_repeater_items($items));
    }

    private function save_project_features(int $post_id): void {
        if (
            !isset($_POST['tit_20260606_project_features_nonce']) ||
            !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['tit_20260606_project_features_nonce'])), 'tit_20260606_save_project_features')
        ) {
            return;
        }

        $items = isset($_POST['tit_20260606_project_features'])
            ? wp_unslash($_POST['tit_20260606_project_features'])
            : [];

        update_post_meta($post_id, $this->features_meta_key, $this->sanitize_repeater_items($items));
    }

    private function sanitize_repeater_items($items): array {
        if (!is_array($items)) {
            return [];
        }

        $clean_items = [];

        foreach ($items as $item) {
            $title = isset($item['title']) ? sanitize_text_field($item['title']) : '';
            $description = isset($item['description']) ? sanitize_textarea_field($item['description']) : '';
            $icon = isset($item['icon']) ? sanitize_html_class($item['icon']) : '';

            if ($title === '' && $description === '' && $icon === '') {
                continue;
            }

            $clean_items[] = [
                'title' => $title,
                'description' => $description,
                'icon' => $icon,
            ];
        }

        return $clean_items;
    }
}