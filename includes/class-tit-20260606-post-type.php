<?php

if (!defined('ABSPATH')) {
    exit;
}

class TIT_20260606_Post_Type {

    private string $post_type = 'tit_20260606_pf';

    public function init(): void {
        add_action('init', [$this, 'register_post_type']);
    }

    public function register_post_type(): void {

        $labels = [
            'name'                  => 'نمونه کارها',
            'singular_name'         => 'نمونه کار',
            'menu_name'             => 'TehranIT portfolio',
            'name_admin_bar'        => 'نمونه کار',
            'add_new'               => 'افزودن',
            'add_new_item'          => 'افزودن نمونه کار جدید',
            'new_item'              => 'نمونه کار جدید',
            'edit_item'             => 'ویرایش نمونه کار',
            'view_item'             => 'مشاهده نمونه کار',
            'all_items'             => 'همه نمونه کارها',
            'search_items'          => 'جستجوی نمونه کارها',
            'not_found'             => 'نمونه کاری یافت نشد',
            'not_found_in_trash'    => 'نمونه کاری در زباله‌دان یافت نشد',
            'featured_image'        => 'تصویر شاخص',
            'set_featured_image'    => 'انتخاب تصویر شاخص',
            'remove_featured_image' => 'حذف تصویر شاخص',
            'use_featured_image'    => 'استفاده به عنوان تصویر شاخص',
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_admin_bar'  => true,
            'show_in_nav_menus'  => true,
            'show_in_rest'       => true,

            'query_var'          => true,

            'rewrite' => [
                'slug'       => 'portfolio',
                'with_front' => false,
            ],

            'capability_type'    => 'post',
            'hierarchical'       => false,

            'menu_position'      => 25,

            'menu_icon'          => 'dashicons-portfolio',

            'supports' => [
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'author',
                'revisions',
                'custom-fields',
            ],

            'has_archive'        => true,
            'exclude_from_search'=> false,
            'can_export'         => true,
        ];

        register_post_type(
            $this->post_type,
            $args
        );
    }
}