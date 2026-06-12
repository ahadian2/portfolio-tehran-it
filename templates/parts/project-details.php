<?php

if (!defined('ABSPATH')) {
    exit;
}

$post_id = get_the_ID();

$details = get_post_meta($post_id, 'tit_20260606_project_details', true);

if (empty($details) || !is_array($details)) {
    return;
}

$title_id = 'project-details-title-' . $post_id;
$desc_id  = 'project-details-desc-' . $post_id;
?>

<section class="sec sec-bg-light sec-pt-5 sec-pb-5 portfolio-page"
         aria-labelledby="<?php echo esc_attr($title_id); ?>"
         aria-describedby="<?php echo esc_attr($desc_id); ?>"
         itemscope
         itemtype="https://schema.org/CreativeWork">

    <div class="container">

        <div class="row">
            <header class="home-title mb-4 col-12">

                <h2 id="<?php echo esc_attr($title_id); ?>">
                    <span>جزئیات پروژه </span>
                    <span class="d-none d-lg-inline-block"><?php echo esc_html(get_the_title()); ?></span>
                </h2>

                <p id="<?php echo esc_attr($desc_id); ?>">
                    در ادامه می‌توانید جزئیات فنی پروژه، فناوری‌های مورد استفاده، قابلیت‌های پیاده‌سازی شده و مهم‌ترین ویژگی‌های این نمونه‌کار را مشاهده کنید.
                </p>

            </header>
        </div>

        <div class="row">
            <div class="col-12 owl-4box owl-carousel owl-theme box-post box-post-img-150 box-post-p-2 box-post-bg-dark owl-remove-dots"
                 role="list"
                 aria-label="<?php echo esc_attr('جزئیات فنی و اطلاعات پروژه ' . get_the_title()); ?>">

                <?php foreach ($details as $item) : ?>

                    <?php
                    $item_title = $item['title'] ?? '';
                    $item_desc  = $item['description'] ?? '';
                    $item_icon  = $item['icon'] ?? '';

                    if (empty($item_title) && empty($item_desc)) {
                        continue;
                    }
                    ?>

                    <article class="item sec-py-2"
                             role="listitem"
                             itemprop="hasPart"
                             itemscope
                             itemtype="https://schema.org/CreativeWork">

                        <?php if (!empty($item_icon)) : ?>
                            <div class="text-center sec-pb-1">
                                <div class="process-step-icon" aria-hidden="true">
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