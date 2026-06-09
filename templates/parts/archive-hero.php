<?php

if (!defined('ABSPATH')) {
    exit;
}

$title_id = 'portfolio-title';

$background_url = tit_20260606_get_setting_image_url(
    'archive_hero_image',
    'full',
    TIT_20260606_URL . 'assets/img/bg.webp'
);
?>

<section class="hero-c sec sec-scrim-55 sec-bg-img"
         style="background-image:url('<?php echo esc_url($background_url); ?>')"
         role="banner"
         aria-labelledby="<?php echo esc_attr($title_id); ?>">

    <div class="container">

        <div class="row sec-min-50vh">

            <div class="col-12 d-flex flex-column justify-content-around text-center text-lg-start">

                <header class="hero-content">

                    <h1 id="<?php echo esc_attr($title_id); ?>" class="hero-title text-center">
                        نمونه‌کارهای تهران آی تی
                    </h1>

                </header>

            </div>

        </div>

    </div>

</section>