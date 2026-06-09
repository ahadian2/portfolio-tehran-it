<?php

if (!defined('ABSPATH')) {
    exit;
}

class TIT_20260606_Taxonomy {

    private string $taxonomy = 'tit_20260606_portfolio_cat';

    private string $post_type = 'tit_20260606_pf';

    public function init(): void {
        add_action('init', [$this, 'register_taxonomy']);
    }

    public function register_taxonomy(): void {

        $labels = [
            'name'                       => 'دسته‌بندی نمونه کارها',
            'singular_name'              => 'دسته نمونه کار',
            'search_items'               => 'جستجوی دسته‌ها',
            'all_items'                  => 'همه دسته‌ها',
            'parent_item'                => 'دسته والد',
            'parent_item_colon'          => 'دسته والد:',
            'edit_item'                  => 'ویرایش دسته',
            'update_item'                => 'بروزرسانی دسته',
            'add_new_item'               => 'افزودن دسته جدید',
            'new_item_name'              => 'نام دسته جدید',
            'menu_name'                  => 'دسته‌بندی نمونه کارها',
            'not_found'                  => 'دسته‌ای یافت نشد',
        ];

        $args = [
            'labels'            => $labels,
            'public'            => true,
            'publicly_queryable'=> true,
            'hierarchical'      => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_menu'      => true,
            'show_in_rest'      => true,

            'rewrite' => [
                'slug'         => 'portfolio-category',
                'with_front'   => false,
                'hierarchical' => true,
            ],

            'query_var' => true,
        ];

        register_taxonomy(
            $this->taxonomy,
            [$this->post_type],
            $args
        );
    }
}