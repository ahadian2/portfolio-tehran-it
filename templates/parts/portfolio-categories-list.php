<?php

if (!defined('ABSPATH')) {
    exit;
}

$section_title = get_query_var(
    'section_title',
    'نمونه‌کارهای تهران آی تی'
);

$section_description = get_query_var(
    'section_description',
    'مشاهده دسته‌بندی‌های نمونه‌کارها و پروژه‌های انجام شده تهران آی تی.'
);

$section_bg = get_query_var('section_bg', 'light');

$posts_per_page = (int) get_query_var('posts_per_page', 0);

$hide_empty = (bool) get_query_var('hide_empty', false);

$valid_section_bg = in_array($section_bg, ['light', 'dark', 'darker'], true)
    ? $section_bg
    : 'light';

$term_args = [
    'taxonomy'   => 'tit_20260606_portfolio_cat',
    'hide_empty' => $hide_empty,
];

if ($posts_per_page > 0) {
    $term_args['number'] = $posts_per_page;
}

$terms = get_terms($term_args);

if (empty($terms) || is_wp_error($terms)) {
    return;
}

$section_id = 'portfolio-categories-list';
$title_id   = $section_id . '-title';
$desc_id    = $section_id . '-desc';
?>

<section class="sec sec-bg-<?php echo esc_attr($valid_section_bg); ?> sec-pt-5 sec-pb-5"
         id="<?php echo esc_attr($section_id); ?>"
         aria-labelledby="<?php echo esc_attr($title_id); ?>"
         aria-describedby="<?php echo esc_attr($desc_id); ?>">

    <div class="container box-portfolio">

        <div class="row">
            <header class="home-title mb-4 col-12">
                <h2 id="<?php echo esc_attr($title_id); ?>">
                    <span><?php echo esc_html($section_title); ?></span>
                </h2>

                <p id="<?php echo esc_attr($desc_id); ?>">
                    <?php echo esc_html($section_description); ?>
                </p>
            </header>
        </div>

        <div class="row g-4"
             id="portfolio-grid"
             role="list"
             aria-label="<?php echo esc_attr($section_title); ?>">

            <?php foreach ($terms as $term) : ?>

                <?php
                $image_id = get_term_meta(
                    $term->term_id,
                    'tit_20260606_category_background_image',
                    true
                );

                if (empty($image_id)) {
                    $image_id = get_term_meta(
                        $term->term_id,
                        'tit_20260606_category_image',
                        true
                    );
                }

                $image_url = tit_20260606_get_setting_image_url(
                    'default_image',
                    'img-500-313',
                    TIT_20260606_URL . 'assets/img/no-image.webp'
                );

                $image_alt = 'دسته نمونه‌کار ' . $term->name;

                if (!empty($image_id)) {
                    $image_src = wp_get_attachment_image_src(
                        (int) $image_id,
                        'img-500-313'
                    );

                    if (!empty($image_src[0])) {
                        $image_url = $image_src[0];
                    }

                    $custom_alt = get_post_meta(
                        (int) $image_id,
                        '_wp_attachment_image_alt',
                        true
                    );

                    if (!empty($custom_alt)) {
                        $image_alt = $custom_alt;
                    }
                }
                ?>

                <div class="col-md-6 col-lg-4 portfolio-item"
                     role="listitem">

                    <a href="<?php echo esc_url(get_term_link($term)); ?>"
                       class="card portfolio-card"
                       title="<?php echo esc_attr('مشاهده نمونه‌کارهای ' . $term->name); ?>"
                       aria-label="<?php echo esc_attr('مشاهده نمونه‌کارهای ' . $term->name); ?>">

                        <div class="portfolio-thumb">
                            <img src="<?php echo esc_url($image_url); ?>"
                                 width="416"
                                 height="260"
                                 loading="lazy"
                                 decoding="async"
                                 alt="<?php echo esc_attr($image_alt); ?>"
                                 sizes="(max-width: 768px) 100vw, 33vw">

                            <div class="portfolio-overlay">
                                <span><?php echo esc_html($term->name); ?></span>
                            </div>
                        </div>

                    </a>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>