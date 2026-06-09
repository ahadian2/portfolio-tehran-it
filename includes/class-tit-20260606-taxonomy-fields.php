<?php

if (!defined('ABSPATH')) {
    exit;
}

class TIT_20260606_Taxonomy_Fields {

    private string $taxonomy = 'tit_20260606_portfolio_cat';

    private string $image_key = 'tit_20260606_category_image';
    private string $background_key = 'tit_20260606_category_background_image';

    public function init(): void {
        add_action($this->taxonomy . '_add_form_fields', [$this, 'add_fields']);
        add_action($this->taxonomy . '_edit_form_fields', [$this, 'edit_fields']);

        add_action('created_' . $this->taxonomy, [$this, 'save_fields']);
        add_action('edited_' . $this->taxonomy, [$this, 'save_fields']);
    }

    public function add_fields(): void {
        ?>

        <div class="form-field term-group">
            <label>تصویر دسته</label>

            <?php $this->render_media_field($this->image_key, 0); ?>
        </div>

        <div class="form-field term-group">
            <label>تصویر بک‌گراند دسته</label>

            <?php $this->render_media_field($this->background_key, 0); ?>
        </div>

        <?php
    }

    public function edit_fields($term): void {
        $image_id = (int) get_term_meta($term->term_id, $this->image_key, true);
        $background_id = (int) get_term_meta($term->term_id, $this->background_key, true);
        ?>

        <tr class="form-field term-group-wrap">
            <th scope="row">
                <label>تصویر دسته</label>
            </th>
            <td>
                <?php $this->render_media_field($this->image_key, $image_id); ?>
            </td>
        </tr>

        <tr class="form-field term-group-wrap">
            <th scope="row">
                <label>تصویر بک‌گراند دسته</label>
            </th>
            <td>
                <?php $this->render_media_field($this->background_key, $background_id); ?>
            </td>
        </tr>

        <?php
    }

    private function render_media_field(string $field_name, int $image_id): void {
        $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : '';
        ?>

        <div class="tit-20260606-media-field">
            <input
                type="hidden"
                name="<?php echo esc_attr($field_name); ?>"
                value="<?php echo esc_attr($image_id); ?>"
                class="tit-20260606-media-id"
            >

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

    public function save_fields(int $term_id): void {
        $image_id = isset($_POST[$this->image_key])
            ? absint($_POST[$this->image_key])
            : 0;

        $background_id = isset($_POST[$this->background_key])
            ? absint($_POST[$this->background_key])
            : 0;

        if ($image_id) {
            update_term_meta($term_id, $this->image_key, $image_id);
        } else {
            delete_term_meta($term_id, $this->image_key);
        }

        if ($background_id) {
            update_term_meta($term_id, $this->background_key, $background_id);
        } else {
            delete_term_meta($term_id, $this->background_key);
        }
    }
}