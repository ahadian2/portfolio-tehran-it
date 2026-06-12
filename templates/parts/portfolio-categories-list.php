<?php

if (!defined('ABSPATH')) {
    exit;
}

$section_title = get_query_var('section_title', 'دسته‌بندی نمونه کارها');

$section_description = get_query_var(
    'section_description',
    'از بین دسته‌بندی‌های زیر، نمونه کارهای مرتبط با نیاز خود را مشاهده کنید.'
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

$section_id = 'portfolio-categories-list';
$title_id = $section_id . '-title';
$desc_id = $section_id . '-desc';
?>

<section class="sec sec-bg-<?php echo esc_attr($valid_section_bg); ?> sec-pt-5 sec-pb-5"
         id="<?php echo esc_attr($section_id); ?>"
         aria-labelledby="<?php echo esc_attr($title_id); ?>"
         aria-describedby="<?php echo esc_attr($desc_id); ?>">

    <div class="container">

        <div class="row">
            <header class="home-title mb-4 col-12">
                <h2 id="<?php echo esc_attr($title_id); ?>">
                    <?php echo esc_html($section_title); ?>
                </h2>

                <p id="<?php echo esc_attr($desc_id); ?>">
                    <?php echo esc_html($section_description); ?>
                </p>
            </header>
        </div>

        <div class="row">
            <div class="col-12"
                 aria-roledescription="carousel"
                 aria-live="polite"
                 itemscope
                 itemtype="https://schema.org/ItemList">

                <meta itemprop="name" content="<?php echo esc_attr($section_title); ?>">
                <meta itemprop="itemListOrder" content="https://schema.org/ItemListOrderAscending">
                <meta itemprop="numberOfItems" content="<?php echo esc_attr(count($terms)); ?>">

                <div role="list"
                     aria-label="<?php echo esc_attr($section_title); ?>"
                     class="owl-4box owl-carousel owl-theme box-post box-post-img-150 box-post-p-3 box-post-bg-<?php echo esc_attr($valid_post_bg); ?> owl-remove-dots">

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

                        $default_image_url = tit_20260606_get_setting_image_url(
                            'default_image',
                            'img-200-200',
                            TIT_20260606_URL . 'assets/img/no-image.webp'
                        );

                        $image_alt = 'تصویر دسته نمونه‌کار ' . $term->name;

                        if (!empty($image_id)) {
                            $image_src = wp_get_attachment_image_src(
                                (int) $image_id,
                                'img-200-200'
                            );

                            if (!empty($image_src[0])) {
                                $image_url = $image_src[0];
                            } else {
                                $image_url = $default_image_url;
                            }

                            $custom_alt = get_post_meta(
                                (int) $image_id,
                                '_wp_attachment_image_alt',
                                true
                            );

                            if (!empty($custom_alt)) {
                                $image_alt = $custom_alt;
                            }
                        } else {
                            $image_url = $default_image_url;
                        }

                        $term_description = !empty($term->description)
                            ? wp_trim_words($term->description, 20, '...')
                            : sprintf('%s نمونه‌کار در این دسته‌بندی وجود دارد.', number_format_i18n($term->count));
                        ?>

                        <article class="item"
                                 role="listitem"
                                 itemprop="itemListElement"
                                 itemscope
                                 itemtype="https://schema.org/ListItem">

                            <meta itemprop="position" content="<?php echo esc_attr($position); ?>">

                            <a href="<?php echo esc_url($term_link); ?>"
                               rel="bookmark"
                               itemprop="url"
                               aria-label="<?php echo esc_attr('مشاهده نمونه‌کارهای ' . $term->name); ?>">

                                <figure class="mb-2 pt-4 px-4">
                                    <img src="<?php echo esc_url($image_url); ?>"
                                         width="150"
                                         height="150"
                                         loading="lazy"
                                         decoding="async"
                                         alt="<?php echo esc_attr($image_alt); ?>">
                                </figure>

                                <div class="description pb-4"
                                     itemscope
                                     itemtype="https://schema.org/CollectionPage">

                                    <h3 class="h5" itemprop="name">
                                        <?php echo esc_html($term->name); ?>
                                    </h3>

                                    <p itemprop="description">
                                        <?php echo esc_html($term_description); ?>
                                    </p>

                                    <i class="bi bi-link" aria-hidden="true"></i>

                                </div>

                            </a>

                        </article>

                        <?php $position++; ?>

                    <?php endforeach; ?>

                </div>

            </div>
        </div>

    </div>

</section>