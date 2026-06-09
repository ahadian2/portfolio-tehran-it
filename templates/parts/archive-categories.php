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
?>

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
                <p id="portfolio-desc">مشاهده دسته‌بندی‌های نمونه‌کارها و پروژه‌های انجام شده تهران آی تی.</p>
            </header>
        </div>

        <div class="row g-4"
             id="portfolio-grid"
             role="list"
             aria-label="دسته‌بندی نمونه‌کارها">

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