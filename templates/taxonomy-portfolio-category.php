<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();

include TIT_20260606_DIR . 'templates/parts/taxonomy-hero.php';
include TIT_20260606_DIR . 'templates/parts/taxonomy-description.php';
include TIT_20260606_DIR . 'templates/parts/taxonomy-sub-categories.php';
include TIT_20260606_DIR . 'templates/parts/taxonomy-posts.php';

set_query_var('section_title', 'با خدمات تهران آی تی آشنا شوید');
set_query_var('section_bg', 'dark');
set_query_var('post_bg', 'light');
get_template_part('template-parts/share/list-services/owl-services');

get_footer();