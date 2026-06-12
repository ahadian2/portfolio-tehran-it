<?php

if (!defined('ABSPATH')) {
    exit;
}

$post_id = get_the_ID();

$project_name = get_post_meta($post_id, '_github_project_name', true);
$github_link  = get_post_meta($post_id, '_github_project_link', true);

$product_id   = get_post_meta($post_id, '_custom_edd_product_id', true);

$has_github = !empty($project_name) && !empty($github_link);
$has_edd    = !empty($product_id) && function_exists('edd_get_purchase_link');

if (!$has_github && !$has_edd) {
    return;
}

$title_id = 'project-downloads-title-' . $post_id;
$desc_id  = 'project-downloads-desc-' . $post_id;
?>

<section class="sec sec-bg-light sec-pt-4 sec-pb-5 singel"
         aria-labelledby="<?php echo esc_attr($title_id); ?>"
         aria-describedby="<?php echo esc_attr($desc_id); ?>">

    <div class="container">

        <div class="row">
            <header class="home-title col-12">
                <h2 id="<?php echo esc_attr($title_id); ?>">
                    دانلود و سورس پروژه
                </h2>

                <p id="<?php echo esc_attr($desc_id); ?>">
                    در این بخش می‌توانید سورس کد پروژه را مشاهده کنید یا در صورت ارائه نسخه دانلودی، فایل‌های پروژه را دریافت کنید.
                </p>
            </header>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-xl-10">

                <?php if ($has_github) : ?>
                    <div id="tit-git"
                         class="Download-box flex-column-reverse flex-lg-row sec-bg-blue-50 mt-3"
                         itemscope
                         itemtype="https://schema.org/SoftwareSourceCode">

                        <div class="Download-box-description align-items-center align-items-lg-start mt-2 mt-lg-0">

                            <h2 itemprop="name">
                                سورس کد <?php echo esc_html($project_name); ?>
                            </h2>

                            <p itemprop="description">
                            شما می‌توانید سورس کد کامل <?php echo esc_html($project_name); ?> را از طریق گیت مشاهده کنید و یا اگر گیت کار نمی‌کنید، به راحتی آن را به صورت فایل فشرده (ZIP) دانلود کنید. فایل‌های دانلودی شامل تمام بخش‌های پروژه است و می‌توانید آن را روی سیستم خود اجرا یا تغییر دهید.
                            </p>

                            <div class="w-100 mt-3 text-center text-lg-start btn-download-box">
                                <a href="<?php echo esc_url($github_link); ?>"
                                   class="d-inline-block"
                                   title="<?php echo esc_attr('مشاهده و دانلود سورس کد ' . $project_name); ?>"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   itemprop="codeRepository">
                                    دانلود سورس کد از گیت
                                </a>
                            </div>

                        </div>

                        <div class="Download-box-img">
                            <figure class="m-0">
                                <img src="<?php echo esc_url(TIT_20260606_URL . 'assets/img/github.webp'); ?>"
                                     class="img-150"
                                     width="150"
                                     height="150"
                                     loading="lazy"
                                     decoding="async"
                                     alt="<?php echo esc_attr('سورس کد ' . $project_name); ?>"
                                     itemprop="image">
                            </figure>
                        </div>

                    </div>
                <?php endif; ?>

                <?php if ($has_edd) : ?>
                    <?php
                    $custom_title = get_post_meta($post_id, '_custom_edd_custom_title', true);
                    $description  = get_post_meta($post_id, '_custom_edd_custom_description', true);
                    $button_text  = get_post_meta($post_id, '_custom_edd_button_text', true);

                    if (empty($custom_title)) {
                        $custom_title = 'دانلود پروژه';
                    }

                    if (empty($description)) {
                        $description = 'خرید از تهران آی تی به صورت آنلاین میباشد و لینک دانلود به صورت خودکار برای شما ایمیل میشود. چنانچه نیاز به هرگونه سوال و یا کمک در خرید آنلاین داشتید با شماره 09121486770 تماس بگیرید. شماره کارت ما 6362141104352035 به نام محمدرضا احدیان میباشد.';
                    }

                    if (empty($button_text)) {
                        $button_text = 'دانلود پروژه';
                    }

                    if (function_exists('edd_item_in_cart') && edd_item_in_cart($product_id)) {
                        $purchase_button = '<a href="' . esc_url(edd_get_checkout_uri()) . '" class="button d-inline-block">پرداخت و تکمیل خرید</a>';
                    } else {
                        $purchase_button = edd_get_purchase_link([
                            'download_id' => $product_id,
                            'price'       => true,
                            'text'        => $button_text,
                            'style'       => 'button',
                            'color'       => 'red',
                            'class'       => 'edd-add-to-cart button red edd-submit',
                            'direct'      => false,
                        ]);
                    }
                    ?>

                    <div class="Download-box edd-download-box flex-column-reverse flex-lg-row sec-bg-green-50 mt-3"
                         id="tit-download">

                        <div class="Download-box-description align-items-center align-items-lg-start mt-2 mt-lg-0">

                            <h2>
                                <?php echo esc_html($custom_title); ?>
                            </h2>

                            <p>
                                <?php echo wp_kses_post($description); ?>
                            </p>

                            <div class="w-100 mt-3 text-center text-lg-start btn-download-box">
                                <?php echo $purchase_button; ?>
                            </div>

                        </div>

                        <div class="Download-box-img">
                            <figure class="m-0">
                                <img src="<?php echo esc_url(TIT_20260606_URL . 'assets/img/download.webp'); ?>"
                                     class="img-150"
                                     width="150"
                                     height="150"
                                     loading="lazy"
                                     decoding="async"
                                     alt="<?php echo esc_attr($custom_title); ?>">
                            </figure>
                        </div>

                    </div>
                <?php endif; ?>

            </div>
        </div>

    </div>

</section>