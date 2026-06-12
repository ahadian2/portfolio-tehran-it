<?php

if (!defined('ABSPATH')) {
    exit;
}

$background_id = get_post_meta(
    get_the_ID(),
    'tit_20260606_background_image',
    true
);

$background_url = '';

if ($background_id) {
    $background_url = wp_get_attachment_image_url(
        (int) $background_id,
        'full'
    );
}

if (!$background_url) {
    $background_url = tit_20260606_get_setting_image_url(
        'default_hero_image',
        'full',
        TIT_20260606_URL . 'assets/img/bg.webp'
    );
}

$button_text = tit_20260606_get_setting(
    'consultation_button_text',
    'دریافت مشاوره رایگان'
);

$button_url = tit_20260606_get_setting(
    'consultation_button_url',
    home_url('/free-consultation/')
);
?>

<section class="hero-c sec sec-scrim-60 sec-bg-img"
         style="background-image:url('<?php echo esc_url($background_url); ?>')"
         role="banner"
         aria-labelledby="portfolio-title">

    <div class="container">

        <div class="row sec-min-50vh">

            <div class="col-12 d-flex flex-column justify-content-around text-center text-lg-start">

                <header class="hero-content">

                    <h1 id="portfolio-title" class="hero-title">
                        <?php the_title(); ?>
                    </h1>

                    <div class="hero-actions">
                        <a href="<?php echo esc_url($button_url); ?>"
                           class="btn btn-hero mt-3"
                           title="<?php echo esc_attr($button_text); ?>"
                           aria-label="<?php echo esc_attr($button_text); ?>">
                            <?php echo esc_html($button_text); ?>
                        </a>
                    </div>

                </header>

            </div>

        </div>

    </div>

</section>