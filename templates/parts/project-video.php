<?php

if (!defined('ABSPATH')) {
    exit;
}

$post_id    = get_the_ID();
$post_title = get_the_title();

$aparat_iframe  = get_post_meta($post_id, 'aparat_iframe', true);
$youtube_iframe = get_post_meta($post_id, 'youtube_iframe', true);

$video_url = '';

if (!empty($aparat_iframe)) {
    $video_url = $aparat_iframe;
} elseif (!empty($youtube_iframe)) {
    $video_url = $youtube_iframe;
}

if (empty($video_url)) {
    return;
}

$title_id = 'project-video-title-' . $post_id;
$desc_id  = 'project-video-desc-' . $post_id;
?>

<!-- Portfolio Project Video -->
<section class="sec sec-bg-dark sec-pt-5 sec-pb-5 portfolio-page project-video-section"
         aria-labelledby="<?php echo esc_attr($title_id); ?>"
         aria-describedby="<?php echo esc_attr($desc_id); ?>">

    <div class="container img-video-portfolio">

        <div class="row">
            <header class="home-title mb-4 col-12">

                <h2 id="<?php echo esc_attr($title_id); ?>">
                    ویدیوی پروژه
                </h2>

                <p id="<?php echo esc_attr($desc_id); ?>">
                    در این بخش می‌توانید ویدیوی معرفی پروژه را مشاهده کنید و با ساختار، روند اجرا و بخش‌های مهم این نمونه‌کار بیشتر آشنا شوید.
                </p>

            </header>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-xl-9">
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
        </div>

    </div>

</section>