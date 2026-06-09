<?php

if (!defined('ABSPATH')) {
    exit;
}

$post_id = get_the_ID();

$features = get_post_meta($post_id, 'tit_20260606_project_features', true);

if (empty($features) || !is_array($features)) {
    return;
}

$title_id = 'project-features-title-' . $post_id;
?>

<section class="sec sec-bg-light sec-pt-5 sec-pb-5 portfolio-page" aria-labelledby="<?php echo esc_attr($title_id); ?>">
    <div class="container">
        <div class="row">
            <header class="home-title mb-4 col-12">
                <h2 id="<?php echo esc_attr($title_id); ?>">
                    <?php echo esc_html('ویژگی‌ها و امکانات پروژه ' . get_the_title()); ?>
                </h2>

                <p id="project-features-desc">
                    در این بخش می‌توانید مهم‌ترین امکانات، قابلیت‌ها و ویژگی‌های پیاده‌سازی شده در این نمونه‌کار را مشاهده کنید.
                </p>
            </header>
        </div>

        <div class="row">
            <div class="col-12 owl-4box owl-carousel owl-theme box-post box-post-img-150 box-post-p-2 box-post-bg-dark owl-remove-dots"
                 role="list"
                 aria-label="<?php echo esc_attr('ویژگی‌ها و امکانات پروژه ' . get_the_title()); ?>">

                <?php foreach ($features as $item) : ?>
                    <?php
                    $item_title = $item['title'] ?? '';
                    $item_desc  = $item['description'] ?? '';
                    $item_icon  = $item['icon'] ?? '';

                    if (empty($item_title) && empty($item_desc)) {
                        continue;
                    }
                    ?>

                    <article class="item sec-py-2" role="listitem" itemscope itemtype="https://schema.org/CreativeWork">

                        <?php if (!empty($item_icon)) : ?>
                            <div class="text-center sec-pb-1">
                                <div class="process-step-icon">
                                    <i class="<?php echo esc_attr($item_icon); ?>"></i>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="description pb-4">

                            <?php if (!empty($item_title)) : ?>
                                <h3 itemprop="name">
                                    <?php echo esc_html($item_title); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if (!empty($item_desc)) : ?>
                                <p itemprop="description">
                                    <?php echo esc_html($item_desc); ?>
                                </p>
                            <?php endif; ?>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>