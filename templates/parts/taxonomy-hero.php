<?php

if (!defined('ABSPATH')) {
    exit;
}

$term = get_queried_object();

if (!$term || !($term instanceof WP_Term)) {
    return;
}

$term_id   = $term->term_id;
$term_name = $term->name;
$title_id  = 'portfolio-category-title-' . $term_id;

$background_id = get_term_meta(
    $term_id,
    'tit_20260606_category_background_image',
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
?>

<section class="hero-d sec sec-scrim-50 sec-bg-img"
         style="background-image: url('<?php echo esc_url($background_url); ?>');"
         role="banner"
         aria-labelledby="<?php echo esc_attr($title_id); ?>">

    <div class="container">

        <div class="row sec-min-40vh">

            <div class="col-12 d-flex flex-column justify-content-around text-center text-lg-start">

                <header class="hero-content">

                    <h1 id="<?php echo esc_attr($title_id); ?>"
                        class="hero-title text-center">
                        <?php echo esc_html($term_name); ?>
                    </h1>

                </header>

            </div>

        </div>

    </div>

</section>