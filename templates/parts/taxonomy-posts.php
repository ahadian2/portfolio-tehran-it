<?php

if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="sec sec-bg-light sec-pt-4 sec-pb-3 box-post box-post-img-200 box-post-p-3 box-post-bg-dark portfolio-page">
    <div class="container">
        <div class="row">

            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>

                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3 mb-4">
                        <article class="item" role="listitem" itemscope itemtype="https://schema.org/CreativeWork">
                            <a href="<?php the_permalink(); ?>" rel="bookmark" aria-label="مشاهده نمونه‌کار: <?php the_title_attribute(); ?>">
                                <figure class="mb-2 pt-4 px-4">

                                    <?php if (has_post_thumbnail()) : ?>

                                        <img src="<?php the_post_thumbnail_url('img-261-147'); ?>"
                                             alt="<?php the_title_attribute(); ?>"
                                             width="200"
                                             height="113"
                                             loading="lazy"
                                             decoding="async"
                                             itemprop="image">

                                    <?php else : ?>

                                        <?php
                                        $default_image_url = tit_20260606_get_setting_image_url(
                                            'default_image',
                                            'img-260-167',
                                            TIT_20260606_URL . 'assets/img/no-image-300-154.webp'
                                        );
                                        ?>

                                        <img src="<?php echo esc_url($default_image_url); ?>"
                                             alt="<?php echo esc_attr('تصویر پیش‌فرض نمونه‌کار ' . get_the_title()); ?>"
                                             width="260"
                                             height="167"
                                             loading="lazy"
                                             decoding="async"
                                             itemprop="image">

                                    <?php endif; ?>

                                </figure>

                                <div class="description pb-4">
                                    <h3 class="h5" itemprop="headline"><?php the_title(); ?></h3>

                                    <p itemprop="description">
                                        <?php echo esc_html(wp_trim_words(get_the_excerpt(), 30, '...')); ?>
                                    </p>

                                    <i class="bi bi-link" aria-hidden="true"></i>
                                </div>

                                <meta itemprop="datePublished" content="<?php echo esc_attr(get_the_date('Y-m-d')); ?>">
                            </a>
                        </article>
                    </div>

                <?php endwhile; ?>

            <?php else : ?>

                <div class="col-12">
                    <p class="no-post">هیچ نمونه‌کاری در این دسته یافت نشد.</p>
                </div>

            <?php endif; ?>

        </div>

        <?php the_posts_pagination(); ?>

    </div>
</section>