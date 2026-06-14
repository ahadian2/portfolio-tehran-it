<?php

if (!defined('ABSPATH')) {
    exit;
}

$current_category = get_queried_object();

if (!$current_category || !is_a($current_category, 'WP_Term')) {
    return;
}

$all_categories = get_terms([
    'taxonomy'   => 'tit_20260606_portfolio_cat',
    'hide_empty' => false,
]);

if (is_wp_error($all_categories) || empty($all_categories)) {
    echo '<div class="sec-pb-2"></div>';
    return;
}

$section_id  = 'portfolio-categories-' . $current_category->slug;
$total_items = count($all_categories);
?>

<section id="<?php echo esc_attr($section_id); ?>"
         class="sec sec-bg-darker sec-py-4"
         aria-labelledby="<?php echo esc_attr($section_id); ?>-title">

    <div class="container">

        <div class="row"
             itemscope
             itemtype="https://schema.org/ItemList"
             aria-describedby="<?php echo esc_attr($section_id); ?>-desc">

            <meta itemprop="name" content="<?php echo esc_attr('دسته‌های نمونه‌کار'); ?>" />
            <meta itemprop="itemListOrder" content="https://schema.org/ItemListOrderAscending" />
            <meta itemprop="numberOfItems" content="<?php echo esc_attr($total_items); ?>" />

            <div class="col-12">

                <div class="owl-4box owl-carousel owl-theme box-post box-post-img-150 box-post-p-4 box-post-bg-light owl-remove-dots">

                    <?php $position = 1; ?>

                    <?php foreach ($all_categories as $category) : ?>

                        <?php
                        $card_image_id = get_term_meta(
                            $category->term_id,
                            'tit_20260606_category_image',
                            true
                        );

                        $image_url = tit_20260606_get_setting_image_url(
                            'default_image',
                            'img-200-200',
                            TIT_20260606_URL . 'assets/img/no-image.webp'
                        );

                        if (!empty($card_image_id)) {
                            $image_src = wp_get_attachment_image_src(
                                (int) $card_image_id,
                                'img-200-200'
                            );

                            if (!empty($image_src[0])) {
                                $image_url = $image_src[0];
                            }
                        }

                        $description = term_description(
                            $category->term_id,
                            'tit_20260606_portfolio_cat'
                        );

                        if (empty($description)) {
                            $description = sprintf(
                                'مشاهده نمونه‌کارهای دسته %s',
                                $category->name
                            );
                        }

                        $description = wp_trim_words(
                            wp_strip_all_tags($description),
                            35,
                            '...'
                        );

                        $image_alt = sprintf(
                            'آیکون دسته %s در نمونه‌کارهای تهران آی تی',
                            $category->name
                        );

                        if (!empty($card_image_id)) {
                            $custom_alt = get_post_meta(
                                (int) $card_image_id,
                                '_wp_attachment_image_alt',
                                true
                            );

                            if (!empty($custom_alt)) {
                                $image_alt = $custom_alt;
                            }
                        }
                        ?>

                        <article class="item"
                                 role="listitem"
                                 itemprop="itemListElement"
                                 itemscope
                                 itemtype="https://schema.org/ListItem">

                            <meta itemprop="position" content="<?php echo esc_attr($position); ?>" />

                            <a href="<?php echo esc_url(get_term_link($category)); ?>"
                               class="sec-pt-1 sec-pb-1"
                               itemprop="url"
                               aria-label="<?php echo esc_attr('مشاهده نمونه‌کارهای دسته ' . $category->name); ?>">

                                <figure class="mb-0 pt-4">
                                    <img src="<?php echo esc_url($image_url); ?>"
                                         <?php if ($card_image_id) : ?>
                                             srcset="<?php echo esc_attr(wp_get_attachment_image_srcset((int) $card_image_id, 'img-200-200')); ?>"
                                         <?php endif; ?>
                                         sizes="200px"
                                         class="rounded-1"
                                         alt="<?php echo esc_attr($image_alt); ?>"
                                         width="200"
                                         height="200"
                                         loading="lazy"
                                         decoding="async"
                                         itemprop="image" />
                                </figure>

                                <div class="description pb-3 pt-1">

                                    <h3 class="mt-2" itemprop="name">
                                        <?php echo esc_html($category->name); ?>
                                    </h3>

                                    <p itemprop="description">
                                        <?php echo esc_html($description); ?>
                                    </p>

                                    <i class="bi bi-link" aria-hidden="true"></i>

                                    <span class="visually-hidden">
                                        <?php echo esc_html('لینک به دسته ' . $category->name); ?>
                                    </span>

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