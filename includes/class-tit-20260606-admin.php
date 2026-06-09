<?php

if (!defined('ABSPATH')) {
    exit;
}

class TIT_20260606_Admin {

    private string $post_type = 'tit_20260606_pf';

    public function init(): void {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_assets']);
    }

    public function enqueue_admin_assets(string $hook): void {
        global $post;

        $is_portfolio_post = $post && $post->post_type === $this->post_type;

        $is_portfolio_taxonomy = isset($_GET['taxonomy']) && $_GET['taxonomy'] === 'tit_20260606_portfolio_cat';

        if (!$is_portfolio_post && !$is_portfolio_taxonomy) {
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
}