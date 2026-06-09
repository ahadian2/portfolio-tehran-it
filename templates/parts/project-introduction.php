<?php

if (!defined('ABSPATH')) {
    exit;
}

$post_id = get_the_ID();

$intro_title = get_post_meta($post_id, 'tit_20260606_intro_title', true);
$intro_description = get_post_meta($post_id, 'tit_20260606_intro_description', true);
$intro_image_id = get_post_meta($post_id, 'tit_20260606_intro_image', true);

if (empty($intro_title)) {
    $intro_title = get_the_title();
}

if (empty($intro_description)) {
    return;
}

$section_id = 'portfolio-introduction-' . $post_id;
$title_id = $section_id . '-title';

$image_url = '';
$image_alt = '';

if ($intro_image_id) {
    $image_url = wp_get_attachment_image_url((int) $intro_image_id, 'img-350-350');

    $image_alt = get_post_meta(
        (int) $intro_image_id,
        '_wp_attachment_image_alt',
        true
    );
}

if (empty($image_url) && has_post_thumbnail($post_id)) {
    $intro_image_id = get_post_thumbnail_id($post_id);
    $image_url = get_the_post_thumbnail_url($post_id, 'img-350-350');

    $image_alt = get_post_meta(
        (int) $intro_image_id,
        '_wp_attachment_image_alt',
        true
    );
}

if (empty($image_url)) {
    $image_url = TIT_20260606_URL . 'assets/img/no-image.webp';
}

if (empty($image_alt)) {
    $image_alt = sprintf(
        'نمونه کار %s توسط تهران آی تی',
        wp_strip_all_tags(get_the_title())
    );
}
?>

<section class="sec sec-bg-light sec-pt-5 sec-pb-5 portfolio-page"
         id="<?php echo esc_attr($section_id); ?>"
         aria-labelledby="<?php echo esc_attr($title_id); ?>"
         itemscope
         itemtype="https://schema.org/CreativeWork">

    <div class="container">

        <div class="row flex-column-reverse flex-lg-row align-items-center">

            <div class="col-12 col-lg-8">

                <header class="home-title text-center text-lg-start">

                    <h1 class="mb-3"
                        id="<?php echo esc_attr($title_id); ?>"
                        itemprop="name">
                        <?php echo esc_html($intro_title); ?>
                    </h1>

                    <div class="portfolio-desc" itemprop="description mb-0">
                        <?php
                        echo str_replace(
                            '<p>',
                            '<p class="text-paragraph">',
                            wp_kses_post(wpautop($intro_description))
                        );
                        ?>
                    </div>

                    <?php
                    $terms = get_the_terms(
                        get_the_ID(),
                        'tit_20260606_portfolio_cat'
                    );
                    
                    if (!empty($terms) && !is_wp_error($terms)) :
                    ?>
                        <div class="portfolio-categories">
                    
                            <span class="portfolio-categories-title">
                                دسته‌بندی :
                            </span>
                    
                            <?php foreach ($terms as $term) : ?>
                    
                                <a href="<?php echo esc_url(get_term_link($term)); ?>"
                                   class="portfolio-category-item"
                                   title="<?php echo esc_attr($term->name); ?>">
                    
                                    <?php echo esc_html($term->name); ?>
                    
                                </a>
                    
                            <?php endforeach; ?>
                    
                        </div>
                    <?php endif; ?>

                </header>

            </div>

            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">

                <figure class="m-0 text-center" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">

                    <img src="<?php echo esc_url($image_url); ?>"
                         class="img-350 mb-4 mb-lg-0 px-4 px-lg-0"
                         width="350"
                         height="350"
                         loading="lazy"
                         decoding="async"
                         alt="<?php echo esc_attr($image_alt); ?>"
                         itemprop="url">

                </figure>

            </div>

        </div>

    </div>

</section>