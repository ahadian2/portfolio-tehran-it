<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();

include TIT_20260606_DIR . 'templates/parts/archive-hero.php';
include TIT_20260606_DIR . 'templates/parts/archive-categories.php';
include TIT_20260606_DIR . 'templates/parts/archive-latest-portfolios.php';

set_query_var('section_title', 'با خدمات تهران آی تی آشنا شوید');
set_query_var('section_bg', 'light');
set_query_var('post_bg', 'dark');
get_template_part('template-parts/share/list-services/owl-services');

get_footer();