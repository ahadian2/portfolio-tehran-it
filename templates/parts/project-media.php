<?php

if (!defined('ABSPATH')) {
    exit;
}

$post_id    = get_the_ID();
$post_title = get_the_title();

$gallery_ids = get_post_meta($post_id, 'gallery_image_ids', true);
$gallery_ids = is_array($gallery_ids) ? array_filter(array_map('intval', $gallery_ids)) : [];

$aparat_iframe  = get_post_meta($post_id, 'aparat_iframe', true);
$youtube_iframe = get_post_meta($post_id, 'youtube_iframe', true);

$video_url = '';

if (!empty($aparat_iframe)) {
    $video_url = $aparat_iframe;
} elseif (!empty($youtube_iframe)) {
    $video_url = $youtube_iframe;
}

$has_video   = !empty($video_url);
$has_gallery = !empty($gallery_ids);

if (!$has_video && !$has_gallery) {
    return;
}

if ($has_video && $has_gallery) {
    $section_title = 'تصاویر و ویدیوهای پروژه';
    $section_desc  = 'در این بخش می‌توانید تصاویر، ویدیوها و محتوای چندرسانه‌ای مرتبط با پروژه را مشاهده کنید و با طراحی، ساختار صفحات و جزئیات اجرایی آن بیشتر آشنا شوید.';
} elseif ($has_video) {
    $section_title = 'ویدیوی پروژه';
    $section_desc  = 'در این بخش می‌توانید ویدیوی معرفی پروژه را مشاهده کنید و با ساختار، روند اجرا و بخش‌های مهم این نمونه‌کار بیشتر آشنا شوید.';
} else {
    $section_title = 'تصاویر پروژه';
    $section_desc  = 'در این بخش می‌توانید تصاویر مرتبط با پروژه را مشاهده کنید و با طراحی، ساختار صفحات و جزئیات اجرایی آن بیشتر آشنا شوید.';
}

$title_id = 'project-media-title-' . $post_id;
$desc_id  = 'project-media-desc-' . $post_id;
?>

<section class="sec sec-bg-light sec-pt-5 sec-pb-5 portfolio-page"
         aria-labelledby="<?php echo esc_attr($title_id); ?>"
         aria-describedby="<?php echo esc_attr($desc_id); ?>">

    <div class="container img-video-portfolio">

        <div class="row">
            <header class="home-title mb-4 col-12">

                <h2 id="<?php echo esc_attr($title_id); ?>">
                    <?php echo esc_html($section_title); ?>
                </h2>

                <p id="<?php echo esc_attr($desc_id); ?>">
                    <?php echo esc_html($section_desc); ?>
                </p>

            </header>
        </div>

        <div class="row justify-content-center">

            <?php if ($has_video) : ?>
                <div class="col-12 col-xl-11 mb-3">
                    <div class="video-post">
                        <div class="video-container">
                            <iframe src="<?php echo esc_url($video_url); ?>"
                                    title="<?php echo esc_attr('ویدیوی معرفی پروژه ' . $post_title); ?>"
                                    loading="lazy"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    webkitallowfullscreen="true"
                                    mozallowfullscreen="true"></iframe>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($has_gallery) : ?>
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
            <?php endif; ?>

        </div>

    </div>

</section>