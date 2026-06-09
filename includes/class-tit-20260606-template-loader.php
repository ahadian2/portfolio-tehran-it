<?php

if (!defined('ABSPATH')) {
    exit;
}

class TIT_20260606_Template_Loader {

    private string $post_type = 'tit_20260606_pf';

    private string $taxonomy = 'tit_20260606_portfolio_cat';

    public function init(): void {
        add_filter('single_template', [$this, 'load_single_template']);
        add_filter('archive_template', [$this, 'load_archive_template']);
        add_filter('taxonomy_template', [$this, 'load_taxonomy_template']);
    }

    public function load_single_template(string $template): string {
        if (is_singular($this->post_type)) {
            $plugin_template = TIT_20260606_DIR . 'templates/single-portfolio.php';

            if (file_exists($plugin_template)) {
                return $plugin_template;
            }
        }

        return $template;
    }

    public function load_archive_template(string $template): string {
        if (is_post_type_archive($this->post_type)) {
            $plugin_template = TIT_20260606_DIR . 'templates/archive-portfolio.php';

            if (file_exists($plugin_template)) {
                return $plugin_template;
            }
        }

        return $template;
    }

    public function load_taxonomy_template(string $template): string {
        if (is_tax($this->taxonomy)) {
            $plugin_template = TIT_20260606_DIR . 'templates/taxonomy-portfolio-category.php';

            if (file_exists($plugin_template)) {
                return $plugin_template;
            }
        }

        return $template;
    }
}