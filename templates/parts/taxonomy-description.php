<?php

if (!defined('ABSPATH')) {
    exit;
}

$term = get_queried_object();

if (!$term || !($term instanceof WP_Term)) {
    return;
}

$term_id = $term->term_id;
$category_title = single_term_title('', false);
$category_description = term_description($term_id, 'tit_20260606_portfolio_cat');

$image_id = get_term_meta(
    $term_id,
    'tit_20260606_category_image',
    true
);

if (empty($category_description) && empty($image_id)) {
    return;
}

$section_id = 'portfolio-category-description-' . $term_id;
$title_id   = $section_id . '-title';

$image_alt = '';

if ($image_id) {
    $image_alt = get_post_meta(
        (int) $image_id,
        '_wp_attachment_image_alt',
        true
    );
}

if (empty($image_alt)) {
    $image_alt = 'تصویر دسته نمونه‌کار ' . $category_title . ' در تهران آی تی';
}
?>

<section class="sec sec-bg-dark sec-py-4"
         id="<?php echo esc_attr($section_id); ?>"
         aria-labelledby="<?php echo esc_attr($title_id); ?>">

    <div class="container">

        <div class="row flex-column-reverse flex-lg-row align-items-center">

            <div class="col-12 col-lg-8">

                <header class="home-title text-center text-lg-start">

                    <h2 class="mb-3"
                        id="<?php echo esc_attr($title_id); ?>">
                        <?php echo esc_html($category_title); ?>
                    </h2>

                    <?php if (!empty($category_description)) : ?>
                        <div class="category-description-content">
                            <?php
                            echo str_replace(
                                '<p>',
                                '<p class="text-paragraph">',
                                wp_kses_post(wpautop($category_description))
                            );
                            ?>
                        </div>
                    <?php endif; ?>

                </header>

            </div>

            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">

                <figure class="m-0 text-center">

                        <?php if (!empty($image_id)) : ?>
                        
                            <?php
                            $image = wp_get_attachment_image_src(
                                (int) $image_id,
                                'img-250-250'
                            );
                        
                            if ($image) :
                            ?>
                        
                                <img src="<?php echo esc_url($image[0]); ?>"
                                     class="img-250 mb-4 mb-lg-0 px-4 px-lg-0"
                                     width="250"
                                     height="250"
                                     loading="lazy"
                                     decoding="async"
                                     alt="<?php echo esc_attr($image_alt); ?>">
                        
                            <?php endif; ?>
                        
                        <?php else : ?>
                        
                            <img src="<?php echo esc_url(TIT_20260606_URL . 'assets/img/no-image.webp'); ?>"
                                 class="img-250 mb-4 mb-lg-0 px-4 px-lg-0"
                                 width="250"
                                 height="250"
                                 loading="lazy"
                                 decoding="async"
                                 alt="<?php echo esc_attr($image_alt); ?>">
                        
                        <?php endif; ?>

                    <figcaption class="visually-hidden">
                        <?php echo esc_html($image_alt); ?>
                    </figcaption>

                </figure>

            </div>

        </div>

    </div>

</section>