<?php

if (!defined('ABSPATH')) {
    exit;
}

class TIT_20260606_Docs {

    public function init(): void {
        add_action('admin_menu', [$this, 'add_docs_page']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    public function add_docs_page(): void {
        add_submenu_page(
            'edit.php?post_type=tit_20260606_pf',
            'آموزش نمونه کارها',
            'آموزش',
            'manage_options',
            'tit-20260606-docs',
            [$this, 'render_docs_page']
        );
    }

    public function enqueue_assets($hook): void {
        if (strpos($hook, 'tit-20260606-docs') === false) {
            return;
        }

        wp_enqueue_style(
            'tit-20260606-admin',
            TIT_20260606_URL . 'assets/admin.css',
            [],
            TIT_20260606_VERSION
        );
    }

    public function render_docs_page(): void {
        ?>

        <div class="wrap tit-20260606-admin-page">

            <div class="tit-20260606-admin-header">
                <div>
                    <h1>آموزش استفاده از پلاگین نمونه کارها</h1>
                    <p>راهنمای سریع برای مدیریت نمونه کارها، دسته‌بندی‌ها و استفاده از Template Part ها</p>
                </div>

                <span class="tit-20260606-version">
                    Version <?php echo esc_html(TIT_20260606_VERSION); ?>
                </span>
            </div>

            <div class="tit-20260606-docs-grid">

                <section class="tit-20260606-card">
                    <h2>1. لینک صفحات اصلی پلاگین</h2>

                    <p>صفحه اصلی نمونه کارها:</p>
                    <pre><code><?php echo esc_html(home_url('/portfolio/')); ?></code></pre>

                    <p>نمونه لینک دسته‌بندی نمونه کار:</p>
                    <pre><code><?php echo esc_html(home_url('/portfolio-category/design/')); ?></code></pre>

                    <p>نمونه لینک صفحه تکی نمونه کار:</p>
                    <pre><code><?php echo esc_html(home_url('/portfolio/project-name/')); ?></code></pre>
                </section>

                <section class="tit-20260606-card">
                    <h2>2. افزودن نمونه کار جدید</h2>

                    <p>
                        برای افزودن نمونه کار جدید، از منوی «نمونه کارها» وارد بخش «افزودن نمونه کار جدید» شوید.
                        عنوان پروژه، توضیحات، تصویر شاخص، تصویر بک‌گراند، گالری، ویدیو، جزئیات پروژه و ویژگی‌ها را کامل کنید.
                    </p>

                    <h3>فیلدهای مهم هر نمونه کار</h3>

                    <ul>
                        <li><strong>تصویر شاخص:</strong> برای کارت‌ها و نمایش عمومی پروژه استفاده می‌شود.</li>
                        <li><strong>تصویر بک‌گراند:</strong> برای Hero صفحه تکی نمونه کار استفاده می‌شود.</li>
                        <li><strong>گالری تصاویر:</strong> برای نمایش تصاویر پروژه در بخش رسانه‌ها.</li>
                        <li><strong>ویدیو:</strong> برای نمایش ویدیوی پروژه، مثل آپارات.</li>
                        <li><strong>GitHub:</strong> برای لینک سورس کد پروژه.</li>
                        <li><strong>EDD:</strong> برای اتصال نمونه کار به محصول دانلودی.</li>
                    </ul>
                </section>

                <section class="tit-20260606-card">
                    <h2>3. افزودن دسته‌بندی نمونه کار</h2>

                    <p>
                        از بخش «دسته‌بندی نمونه کارها» می‌توانید دسته‌هایی مثل طراحی سایت، وردپرس، ASP.NET Core، هوش مصنوعی و غیره بسازید.
                    </p>

                    <h3>فیلدهای دسته‌بندی</h3>

                    <ul>
                        <li><strong>تصویر دسته:</strong> برای کارت دسته‌ها استفاده می‌شود.</li>
                        <li><strong>تصویر بک‌گراند دسته:</strong> برای Hero صفحه دسته‌بندی استفاده می‌شود.</li>
                        <li><strong>توضیحات دسته:</strong> در صفحه دسته‌بندی نمایش داده می‌شود.</li>
                    </ul>
                </section>

                <section class="tit-20260606-card tit-20260606-card-wide">
                    <h2>4. نمایش نمونه کارهای یک دسته در صفحات سایت</h2>

                    <p>
                        برای نمایش نمونه کارهای یک دسته، این کد را داخل فایل قالب همان صفحه قرار دهید.
                        مثلا در صفحه خدمات ASP.NET Core:
                    </p>

                    <pre><code><?php echo esc_html("
set_query_var('section_title', 'نمونه کارهای ASP.NET Core');

set_query_var(
    'section_description',
    'در این بخش می‌توانید برخی از پروژه‌های طراحی و توسعه ASP.NET Core را مشاهده کنید.'
);

set_query_var('section_bg', 'dark');
set_query_var('post_bg', 'light');
set_query_var('portfolio_category', 'aspnet');
set_query_var('posts_per_page', 8);

set_query_var('show_button', true);
set_query_var('button_text', 'مشاهده همه نمونه کارهای ASP.NET Core');
set_query_var('button_url', '/portfolio-category/aspnet/');

include TIT_20260606_DIR . 'templates/parts/portfolio-list.php';
"); ?></code></pre>
                </section>

                <section class="tit-20260606-card tit-20260606-card-wide">
                    <h2>5. نمایش جدیدترین نمونه کارها</h2>

                    <p>
                        اگر دسته مشخص نکنید، آخرین نمونه کارها نمایش داده می‌شوند.
                    </p>

                    <pre><code><?php echo esc_html("
set_query_var('section_title', 'جدیدترین نمونه کارها');

set_query_var(
    'section_description',
    'در ادامه می‌توانید جدیدترین پروژه‌ها و نمونه کارهای تهران آی تی را مشاهده کنید.'
);

set_query_var('section_bg', 'light');
set_query_var('post_bg', 'dark');
set_query_var('posts_per_page', 8);

set_query_var('show_button', true);
set_query_var('button_text', 'مشاهده همه نمونه کارها');
set_query_var('button_url', '/portfolio/');

include TIT_20260606_DIR . 'templates/parts/portfolio-list.php';
"); ?></code></pre>
                </section>

                <section class="tit-20260606-card tit-20260606-card-wide">
                    <h2>6. نمایش دسته‌بندی‌های نمونه کارها</h2>

                    <p>
                        برای نمایش کارت‌های دسته‌بندی نمونه کارها در هر صفحه، از این کد استفاده کنید:
                    </p>

                    <pre><code><?php echo esc_html("
set_query_var('section_title', 'دسته‌بندی نمونه کارها');

set_query_var(
    'section_description',
    'از بین دسته‌بندی‌های زیر، نمونه کارهای مرتبط با نیاز خود را مشاهده کنید.'
);

set_query_var('section_bg', 'light');
set_query_var('hide_empty', false);

include TIT_20260606_DIR . 'templates/parts/portfolio-categories-list.php';
"); ?></code></pre>
                </section>

                <section class="tit-20260606-card">
                    <h2>7. تنظیمات پلاگین</h2>

                    <p>
                        در بخش «تنظیمات» می‌توانید موارد زیر را مدیریت کنید:
                    </p>

                    <ul>
                        <li>تصویر پیش‌فرض نمونه کار</li>
                        <li>تصویر پیش‌فرض هیرو</li>
                        <li>تصویر هیرو آرشیو</li>
                        <li>متن دکمه مشاوره</li>
                        <li>لینک دکمه مشاوره</li>
                        <li>تعداد پیش‌فرض نمایش نمونه کارها</li>
                    </ul>
                </section>

                <section class="tit-20260606-card">
                    <h2>8. لینک‌های پیشنهادی</h2>

                    <ul>
                        <li><code>/portfolio/</code> صفحه اصلی نمونه کارها</li>
                        <li><code>/portfolio-category/design/</code> دسته طراحی سایت</li>
                        <li><code>/portfolio-category/wordpress/</code> دسته وردپرس</li>
                        <li><code>/portfolio-category/aspnet/</code> دسته ASP.NET Core</li>
                        <li><code>/free-consultation/</code> صفحه مشاوره رایگان</li>
                    </ul>
                </section>

            </div>

        </div>

        <?php
    }
}