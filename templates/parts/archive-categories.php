<?php

if (!defined('ABSPATH')) {
    exit;
}

$terms = get_terms([
    'taxonomy'   => 'tit_20260606_portfolio_cat',
    'hide_empty' => false,
]);

if (empty($terms) || is_wp_error($terms)) {
    return;
}

$total_items = count($terms);
?>

<!-- Portfolio Categories Section -->
<section class="sec sec-bg-light sec-pt-5 sec-pb-5"
         id="portfolio"
         aria-labelledby="portfolio-title"
         aria-describedby="portfolio-desc">

    <div class="container box-portfolio">

        <div class="row">
            <header class="home-title mb-4 col-12">
                <h2 id="portfolio-title">
                    <span>نمونه‌کارهای تهران آی تی</span>
                </h2>

                <p id="portfolio-desc">
                    دسته‌بندی نمونه‌کارهای طراحی سایت، فروشگاه اینترنتی، برنامه‌نویسی و پروژه‌های اختصاصی تهران آی تی را مشاهده کنید.
                </p>
            </header>
        </div>

        <div class="row box-post box-post-img-150 box-post-p-4 box-post-bg-dark"
             itemscope
             itemtype="https://schema.org/ItemList"
             role="list"
             aria-label="دسته‌بندی نمونه‌کارهای تهران آی تی">

            <meta itemprop="name" content="دسته‌بندی نمونه‌کارهای تهران آی تی" />
            <meta itemprop="itemListOrder" content="https://schema.org/ItemListOrderAscending" />
            <meta itemprop="numberOfItems" content="<?php echo esc_attr($total_items); ?>" />

            <?php $position = 1; ?>

            <?php foreach ($terms as $term) : ?>

                <?php
                $image_id = get_term_meta(
                    $term->term_id,
                    'tit_20260606_category_image',
                    true
                );

                $image_url = tit_20260606_get_setting_image_url(
                    'default_image',
                    'img-200-200',
                    TIT_20260606_URL . 'assets/img/no-image.webp'
                );

                if (!empty($image_id)) {
                    $image_src = wp_get_attachment_image_src(
                        (int) $image_id,
                        'img-200-200'
                    );

                    if (!empty($image_src[0])) {
                        $image_url = $image_src[0];
                    }
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

                        <meta itemprop="position" content="<?php echo esc_attr($position); ?>" />

                        <a href="<?php echo esc_url(get_term_link($term)); ?>"
                           class="sec-pt-1 sec-pb-1"
                           itemprop="url"
                           title="<?php echo esc_attr('مشاهده نمونه‌کارهای ' . $term->name); ?>"
                           aria-label="<?php echo esc_attr('مشاهده نمونه‌کارهای دسته ' . $term->name); ?>">

                            <figure class="mb-0 pt-4">
                                <img src="<?php echo esc_url($image_url); ?>"
                                     <?php if (!empty($image_id)) : ?>
                                         srcset="<?php echo esc_attr(wp_get_attachment_image_srcset((int) $image_id, 'img-200-200')); ?>"
                                     <?php endif; ?>
                                     sizes="(max-width: 575px) 100vw, (max-width: 991px) 50vw, (max-width: 1199px) 33vw, 25vw"
                                     class="rounded-1"
                                     alt="<?php echo esc_attr($image_alt); ?>"
                                     width="150"
                                     height="150"
                                     loading="lazy"
                                     decoding="async"
                                     itemprop="image" />
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