<?php

if (!defined('ABSPATH')) {
    exit;
}

class TIT_20260606_Plugin {

    public function run(): void {
        $this->load_dependencies();
        $this->init_hooks();
    }

    private function load_dependencies(): void {
        require_once TIT_20260606_DIR . 'includes/class-tit-20260606-post-type.php';
        require_once TIT_20260606_DIR . 'includes/class-tit-20260606-taxonomy.php';
        require_once TIT_20260606_DIR . 'includes/class-tit-20260606-taxonomy-fields.php';
        require_once TIT_20260606_DIR . 'includes/class-tit-20260606-meta-boxes.php';
        require_once TIT_20260606_DIR . 'includes/class-tit-20260606-admin.php';
        require_once TIT_20260606_DIR . 'includes/class-tit-20260606-template-loader.php';
        require_once TIT_20260606_DIR . 'includes/class-tit-20260606-settings.php';
        require_once TIT_20260606_DIR . 'includes/class-tit-20260606-docs.php';

        require_once TIT_20260606_DIR . 'helpers/template-functions.php';
    }

    private function init_hooks(): void {
        $post_type       = new TIT_20260606_Post_Type();
        $taxonomy        = new TIT_20260606_Taxonomy();
        $meta_boxes      = new TIT_20260606_Meta_Boxes();
        $admin           = new TIT_20260606_Admin();
        $template_loader = new TIT_20260606_Template_Loader();
        $taxonomy_fields = new TIT_20260606_Taxonomy_Fields();
        $settings        = new TIT_20260606_Settings();
        $docs            = new TIT_20260606_Docs();

        $post_type->init();
        $taxonomy->init();
        $meta_boxes->init();
        $admin->init();
        $template_loader->init();
        $taxonomy_fields->init();
        $settings->init();
        $docs->init();
    }
}