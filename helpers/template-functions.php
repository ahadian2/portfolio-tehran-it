<?php

if (!defined('ABSPATH')) {
    exit;
}

function tit_20260606_get_project_details(int $post_id): array
{
    $items = get_post_meta(
        $post_id,
        'tit_20260606_project_details',
        true
    );

    return is_array($items)
        ? $items
        : [];
}

function tit_20260606_get_project_features(int $post_id): array
{
    $items = get_post_meta(
        $post_id,
        'tit_20260606_project_features',
        true
    );

    return is_array($items)
        ? $items
        : [];
}

function tit_20260606_render_icon(string $icon): string
{
    if (empty($icon)) {
        return '';
    }

    return '<i class="' . esc_attr($icon) . '"></i>';
}

function tit_20260606_get_settings(): array
{
    $settings = get_option(
        'tit_20260606_settings',
        []
    );

    return is_array($settings)
        ? $settings
        : [];
}

function tit_20260606_get_setting(
    string $key,
    mixed $default = ''
): mixed {

    $settings = tit_20260606_get_settings();

    return $settings[$key] ?? $default;
}

function tit_20260606_get_setting_image_url(
    string $key,
    string $size = 'full',
    string $fallback = ''
): string {

    $image_id = (int) tit_20260606_get_setting(
        $key,
        0
    );

    if (!$image_id) {
        return $fallback;
    }

    $image = wp_get_attachment_image_src(
        $image_id,
        $size
    );

    if (!empty($image[0])) {
        return $image[0];
    }

    return $fallback;
}