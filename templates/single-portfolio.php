<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) :
    the_post();

    include TIT_20260606_DIR . 'templates/parts/project-hero.php';
    include TIT_20260606_DIR . 'templates/parts/project-introduction.php';
    include TIT_20260606_DIR . 'templates/parts/project-details.php';
    include TIT_20260606_DIR . 'templates/parts/project-media.php';
    include TIT_20260606_DIR . 'templates/parts/project-content.php';
    include TIT_20260606_DIR . 'templates/parts/project-features.php';
    include TIT_20260606_DIR . 'templates/parts/project-downloads.php';
    include TIT_20260606_DIR . 'templates/parts/project-related.php';

    set_query_var('section_title', 'با خدمات تهران آی تی آشنا شوید');
    set_query_var('section_bg', 'dark');
    set_query_var('post_bg', 'light');
    get_template_part('template-parts/share/list-services/owl-services');

endwhile;

get_footer();