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
    'دسته‌بندی نمونه‌کارهای طراحی سایت، فروشگاه اینترنتی، برنامه‌نویسی و پروژه‌های اختصاصی تهران آی تی را مشاهده کنید.'
);

$section_bg = get_query_var('section_bg', 'light');
$post_bg = get_query_var('post_bg', 'dark');

$posts_per_page = (int) get_query_var('posts_per_page', 0);
$hide_empty = (bool) get_query_var('hide_empty', false);

$valid_section_bg = in_array($section_bg, ['light', 'dark', 'darker'], true)
    ? $section_bg
    : 'light';

$valid_post_bg = in_array($post_bg, ['light', 'dark'], true)
    ? $post_bg
    : 'dark';

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

$total_items = count($terms);

$section_id = get_query_var('section_id', 'portfolio-categories-grid');
$title_id = $section_id . '-title';
$desc_id = $section_id . '-desc';
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

        <div class="row box-post box-post-img-150 box-post-p-4 box-post-bg-<?php echo esc_attr($valid_post_bg); ?>"
             itemscope
             itemtype="https://schema.org/ItemList"
             role="list"
             aria-label="<?php echo esc_attr($section_title); ?>">

            <meta itemprop="name" content="<?php echo esc_attr($section_title); ?>">
            <meta itemprop="itemListOrder" content="https://schema.org/ItemListOrderAscending">
            <meta itemprop="numberOfItems" content="<?php echo esc_attr($total_items); ?>">

            <?php $position = 1; ?>

            <?php foreach ($terms as $term) : ?>

                <?php
                $term_link = get_term_link($term);

                if (is_wp_error($term_link)) {
                    continue;
                }

                $image_id = get_term_meta(
                    $term->term_id,
                    'tit_20260606_category_image',
                    true
                );

                if (empty($image_id)) {
                    $image_id = get_term_meta(
                        $term->term_id,
                        'thumbnail_id',
                        true
                    );
                }

                $image_url = tit_20260606_get_setting_image_url(
                    'default_image',
                    'img-200-200',
                    TIT_20260606_URL . 'assets/img/no-image.webp'
                );

                $image_srcset = '';

                if (!empty($image_id)) {
                    $image_src = wp_get_attachment_image_src(
                        (int) $image_id,
                        'img-200-200'
                    );

                    if (!empty($image_src[0])) {
                        $image_url = $image_src[0];
                    }

                    $image_srcset = wp_get_attachment_image_srcset(
                        (int) $image_id,
                        'img-200-200'
                    );
                }

                $description = term_description(
                    $term->term_id,
                    'tit_20260606_portfolio_cat'
                );

                if (empty($description)) {
                    $description = sprintf(
                        'مشاهده نمونه‌کارهای دسته %s در تهران آی تی.',
                        $term->name
                    );
                }

                $description = wp_trim_words(
                    wp_strip_all_tags($description),
                    25,
                    '...'
                );

                $image_alt = sprintf(
                    'آیکون دسته %s در نمونه‌کارهای تهران آی تی',
                    $term->name
                );

                if (!empty($image_id)) {
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

                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">

                    <article class="item"
                             role="listitem"
                             itemprop="itemListElement"
                             itemscope
                             itemtype="https://schema.org/ListItem">

                        <meta itemprop="position" content="<?php echo esc_attr($position); ?>">

                        <a href="<?php echo esc_url($term_link); ?>"
                           class="sec-pt-1 sec-pb-1"
                           itemprop="url"
                           title="<?php echo esc_attr('مشاهده نمونه‌کارهای ' . $term->name); ?>"
                           aria-label="<?php echo esc_attr('مشاهده نمونه‌کارهای دسته ' . $term->name); ?>">

                            <figure class="mb-0 pt-4">
                                <img src="<?php echo esc_url($image_url); ?>"
                                     <?php if (!empty($image_srcset)) : ?>
                                         srcset="<?php echo esc_attr($image_srcset); ?>"
                                     <?php endif; ?>
                                     sizes="(max-width: 575px) 100vw, (max-width: 991px) 50vw, (max-width: 1199px) 33vw, 25vw"
                                     class="rounded-1"
                                     alt="<?php echo esc_attr($image_alt); ?>"
                                     width="150"
                                     height="150"
                                     loading="lazy"
                                     decoding="async"
                                     itemprop="image">
                            </figure>

                            <div class="description pb-3 pt-1">

                                <h3 class="mt-2" itemprop="name">
                                    <?php echo esc_html($term->name); ?>
                                </h3>

                                <p itemprop="description">
                                    <?php echo esc_html($description); ?>
                                </p>

                                <i class="bi bi-link" aria-hidden="true"></i>

                                <span class="visually-hidden">
                                    <?php echo esc_html('لینک به دسته ' . $term->name); ?>
                                </span>

                            </div>

                        </a>

                    </article>

                </div>

                <?php $position++; ?>

            <?php endforeach; ?>

        </div>

    </div>

</section>