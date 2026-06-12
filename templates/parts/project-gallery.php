<?php

if (!defined('ABSPATH')) {
    exit;
}

$post_id    = get_the_ID();
$post_title = get_the_title();

$gallery_ids = get_post_meta($post_id, 'gallery_image_ids', true);
$gallery_ids = is_array($gallery_ids) ? array_filter(array_map('intval', $gallery_ids)) : [];

if (empty($gallery_ids)) {
    return;
}

$title_id = 'project-gallery-title-' . $post_id;
$desc_id  = 'project-gallery-desc-' . $post_id;
?>

<!-- Portfolio Project Gallery -->
<section class="sec sec-bg-dark sec-pt-5 sec-pb-5 portfolio-page project-gallery-section"
         aria-labelledby="<?php echo esc_attr($title_id); ?>"
         aria-describedby="<?php echo esc_attr($desc_id); ?>">

    <div class="container img-video-portfolio">

        <div class="row">
            <header class="home-title mb-4 col-12">

                <h2 id="<?php echo esc_attr($title_id); ?>">
                    تصاویر پروژه
                </h2>

                <p id="<?php echo esc_attr($desc_id); ?>">
                    در این بخش می‌توانید تصاویر مرتبط با پروژه را مشاهده کنید و با طراحی، ساختار صفحات و جزئیات اجرایی آن بیشتر آشنا شوید.
                </p>

            </header>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-xl-11 singel-gallery-1">
                <div class="gallery-post owl-gallery owl-carousel owl-theme owl-remove-dots"
                     role="list"
                     aria-label="<?php echo esc_attr('گالری تصاویر پروژه ' . $post_title); ?>">

                    <?php foreach ($gallery_ids as $image_id) : ?>

                        <?php
                        $full_url = wp_get_attachment_image_url($image_id, 'full');

                        if (!$full_url) {
                            continue;
                        }

                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

                        if (empty($image_alt)) {
                            $image_alt = 'تصویر پروژه ' . $post_title;
                        }
                        ?>

                        <div class="item" role="listitem">
                            <a href="<?php echo esc_url($full_url); ?>"
                               class="tit-post-gallery"
                               data-gallery="portfolio-gallery-<?php echo esc_attr($post_id); ?>"
                               aria-label="<?php echo esc_attr('مشاهده تصویر پروژه ' . $post_title); ?>">

                                <?php
                                echo wp_get_attachment_image(
                                    $image_id,
                                    'medium_large',
                                    false,
                                    [
                                        'loading'  => 'lazy',
                                        'decoding' => 'async',
                                        'alt'      => esc_attr($image_alt),
                                    ]
                                );
                                ?>

                            </a>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>

    </div>

</section>