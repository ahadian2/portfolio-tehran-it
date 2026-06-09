<?php

if (!defined('ABSPATH')) {
    exit;
}

$posts_per_page = (int) tit_20260606_get_setting(
    'latest_posts_count',
    8
);

$args = [
    'post_type'           => 'tit_20260606_pf',
    'posts_per_page'      => $posts_per_page,
    'ignore_sticky_posts' => true,
    'orderby'             => 'date',
    'order'               => 'DESC',
];

$latest_query = new WP_Query($args);

if (!$latest_query->have_posts()) {
    return;
}

$title_id = 'latest-portfolios-title';
?>

<section class="sec sec-bg-dark sec-pt-4 sec-pb-5"
         id="latest-portfolios"
         aria-labelledby="<?php echo esc_attr($title_id); ?>">

    <div class="container">

        <div class="row">
            <header class="home-title mb-4 col-12">
                <h2 id="<?php echo esc_attr($title_id); ?>">
                    جدیدترین نمونه‌کارها
                </h2>

                <p>
                    در ادامه می‌توانید جدیدترین پروژه‌ها و نمونه‌کارهای انجام شده تهران آی تی را مشاهده کنید.
                </p>
            </header>
        </div>

        <div class="row">
            <div class="col-12"
                 aria-roledescription="carousel"
                 aria-live="polite"
                 itemscope
                 itemtype="https://schema.org/ItemList">

                <meta itemprop="name" content="جدیدترین نمونه‌کارهای تهران آی تی">
                <meta itemprop="itemListOrder" content="https://schema.org/ItemListOrderDescending">
                <meta itemprop="numberOfItems" content="<?php echo esc_attr($latest_query->post_count); ?>">

                <div role="list"
                     aria-label="لیست جدیدترین نمونه‌کارهای تهران آی تی"
                     class="owl-4box owl-carousel owl-theme box-post box-post-img-full box-post-p-3 box-post-bg-light owl-remove-dots">

                    <?php $position = 1; ?>

                    <?php while ($latest_query->have_posts()) : ?>
                        <?php $latest_query->the_post(); ?>

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

    </div>

</section>