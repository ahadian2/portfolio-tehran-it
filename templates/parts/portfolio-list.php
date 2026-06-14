<?php

if (!defined('ABSPATH')) {
    exit;
}

$section_title = get_query_var('section_title', 'نمونه‌کارهای تهران آی تی');

$section_description = get_query_var(
    'section_description',
    'در ادامه می‌توانید برخی از پروژه‌ها و نمونه‌کارهای انجام شده تهران آی تی را مشاهده کنید.'
);

$section_bg = get_query_var('section_bg', 'light');
$post_bg = get_query_var('post_bg', 'dark');
$portfolio_category = get_query_var('portfolio_category', '');

$default_count = (int) tit_20260606_get_setting('latest_posts_count', 8);
$posts_per_page = (int) get_query_var('posts_per_page', $default_count);

$orderby = get_query_var('orderby', 'date');
$order = get_query_var('order', 'DESC');

$show_button = (bool) get_query_var('show_button', false);
$button_text = get_query_var('button_text', 'مشاهده همه نمونه کارها');
$button_url = get_query_var('button_url', '/portfolio/');

$valid_section_bg = in_array($section_bg, ['light', 'dark', 'darker'], true)
    ? $section_bg
    : 'light';

$valid_post_bg = in_array($post_bg, ['light', 'dark'], true)
    ? $post_bg
    : 'dark';

$args = [
    'post_type'           => 'tit_20260606_pf',
    'posts_per_page'      => $posts_per_page,
    'ignore_sticky_posts' => true,
    'orderby'             => sanitize_key($orderby),
    'order'               => strtoupper($order) === 'ASC' ? 'ASC' : 'DESC',
];

if (!empty($portfolio_category)) {
    $args['tax_query'] = [
        [
            'taxonomy' => 'tit_20260606_portfolio_cat',
            'field'    => 'slug',
            'terms'    => sanitize_title($portfolio_category),
        ],
    ];
}

$portfolio_query = new WP_Query($args);

if (!$portfolio_query->have_posts()) {
    return;
}

$section_id = 'portfolio-list-' . sanitize_title($portfolio_category ?: 'latest');
$title_id = $section_id . '-title';
$desc_id = $section_id . '-desc';
?>
<section class="sec sec-bg-<?php echo esc_attr($valid_section_bg); ?> sec-pt-5 sec-pb-5"
         id="<?php echo esc_attr($section_id); ?>"
         aria-labelledby="<?php echo esc_attr($title_id); ?>"
         aria-describedby="<?php echo esc_attr($desc_id); ?>">

    <div class="container">

        <div class="row">
            <header class="home-title mb-4 col-12">
                <h2 id="<?php echo esc_attr($title_id); ?>">
                    <?php echo esc_html($section_title); ?>
                </h2>

                <p id="<?php echo esc_attr($desc_id); ?>">
                    <?php echo esc_html($section_description); ?>
                </p>
            </header>
        </div>

        <div class="row">
            <div class="col-12"
                 aria-roledescription="carousel"
                 aria-live="polite"
                 itemscope
                 itemtype="https://schema.org/ItemList">

                <meta itemprop="name" content="<?php echo esc_attr($section_title); ?>">
                <meta itemprop="itemListOrder" content="https://schema.org/ItemListOrderDescending">
                <meta itemprop="numberOfItems" content="<?php echo esc_attr($portfolio_query->post_count); ?>">

                <div role="list"
                     aria-label="<?php echo esc_attr($section_title); ?>"
                     class="owl-4box owl-carousel owl-theme box-post box-post-img-full box-post-p-3 box-post-bg-<?php echo esc_attr($valid_post_bg); ?> owl-remove-dots">

                    <?php $position = 1; ?>

                    <?php while ($portfolio_query->have_posts()) : ?>
                        <?php $portfolio_query->the_post(); ?>

                        <article class="item"
                                 role="listitem"
                                 itemprop="itemListElement"
                                 itemscope
                                 itemtype="https://schema.org/ListItem">

                            <meta itemprop="position" content="<?php echo esc_attr($position); ?>">

                            <a href="<?php the_permalink(); ?>"
                               rel="bookmark"
                               itemprop="url"
                               aria-label="<?php echo esc_attr('مشاهده نمونه‌کار: ' . get_the_title()); ?>">

                                <figure class="mb-2 pt-4 px-4">
                                    <?php if (has_post_thumbnail()) : ?>

                                        <?php
                                        the_post_thumbnail(
                                            'img-261-147',
                                            [
                                                'loading'  => 'lazy',
                                                'decoding' => 'async',
                                                'alt'      => the_title_attribute(['echo' => false]),
                                            ]
                                        );
                                        ?>

                                    <?php else : ?>

                                        <?php
                                        $default_image_url = tit_20260606_get_setting_image_url(
                                            'default_image',
                                            'img-261-147',
                                            TIT_20260606_URL . 'assets/img/no-image.webp'
                                        );
                                        ?>

                                        <img src="<?php echo esc_url($default_image_url); ?>"
                                             width="261"
                                             height="147"
                                             loading="lazy"
                                             decoding="async"
                                             alt="<?php echo esc_attr('تصویر نمونه‌کار ' . get_the_title()); ?>">

                                    <?php endif; ?>
                                </figure>

                                <div class="description pb-4"
                                     itemscope
                                     itemtype="https://schema.org/CreativeWork">

                                    <h3 class="h5" itemprop="name">
                                        <?php the_title(); ?>
                                    </h3>

                                    <p itemprop="description">
                                        <?php echo esc_html(wp_trim_words(get_the_excerpt(), 20, '...')); ?>
                                    </p>

                                    <i class="bi bi-link" aria-hidden="true"></i>

                                </div>

                            </a>

                        </article>

                        <?php $position++; ?>

                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                </div>

            </div>
        </div>

        <?php if ($show_button) : ?>
            <div class="row text-center">
                <div class="col-12 text-center mt-2">

                    <a href="<?php echo esc_url(home_url($button_url)); ?>"
                       class="btn btn-section mt-4"
                       title="<?php echo esc_attr($button_text); ?>"
                       aria-label="<?php echo esc_attr($button_text); ?>">

                        <?php echo esc_html($button_text); ?>

                    </a>

                </div>
            </div>
        <?php endif; ?>

    </div>

</section>