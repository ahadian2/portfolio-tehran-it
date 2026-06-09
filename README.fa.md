# پلاگین نمونه کار تهران آی تی

پلاگین نمونه کار تهران آی تی یک پلاگین سبک، توسعه‌پذیر و مناسب برنامه‌نویسان وردپرس است که برای مدیریت پروژه‌ها، نمونه‌کارها و دسته‌بندی‌های آن‌ها طراحی شده است.

برخلاف بسیاری از پلاگین‌های نمونه کار که برای کاربران عادی و صفحه‌سازها ساخته شده‌اند، این پلاگین با تمرکز بر توسعه‌دهندگان وردپرس طراحی شده است و امکان شخصی‌سازی کامل قالب‌ها، بخش‌ها و ساختار خروجی را فراهم می‌کند.

---

## ویژگی‌های اصلی

- ساختار سبک و بهینه
- پست تایپ اختصاصی نمونه کار
- دسته‌بندی اختصاصی نمونه کارها
- صفحه آرشیو نمونه کارها
- صفحه دسته‌بندی نمونه کارها
- صفحه تکی پروژه
- گالری تصاویر پروژه
- ویدیو پروژه
- لینک گیت‌هاب
- لینک دانلود
- تنظیمات سراسری
- قالب‌های قابل استفاده مجدد
- ساختار مناسب سئو
- پشتیبانی از Schema.org

---

## مناسب چه کسانی است؟

این پلاگین بیشتر برای افراد زیر طراحی شده است:

- توسعه‌دهندگان وردپرس
- توسعه‌دهندگان قالب وردپرس
- فریلنسرها
- شرکت‌های طراحی سایت
- توسعه‌دهندگان PHP
- برنامه‌نویسانی که به دنبال کنترل کامل روی ساختار سایت هستند

این پلاگین برای کاربران غیر فنی که به دنبال یک صفحه‌ساز یا سیستم Drag & Drop هستند طراحی نشده است.

---

## ساختار پروژه

```text
portfolio-tehran-it/
│
├── assets/
├── helpers/
├── includes/
├── templates/
│
├── README.md
├── README.fa.md
├── CHANGELOG.md
└── LICENSE
```

---

## امکانات نمونه کار

هر نمونه کار می‌تواند شامل موارد زیر باشد:

- عنوان پروژه
- توضیحات پروژه
- تصویر شاخص
- تصویر هیرو
- گالری تصاویر
- ویدیو
- ویژگی‌های پروژه
- جزئیات پروژه
- لینک گیت‌هاب
- لینک دانلود
- دسته‌بندی اختصاصی

---

## تنظیمات پلاگین

در بخش تنظیمات می‌توان موارد زیر را مدیریت کرد:

- تصویر پیش‌فرض نمونه کار
- تصویر پیش‌فرض هیرو
- تصویر هیرو آرشیو
- متن دکمه مشاوره
- لینک دکمه مشاوره
- تعداد پیش‌فرض نمایش نمونه کارها

---

## Template Parts

```php
templates/parts/portfolio-list.php
templates/parts/portfolio-categories-list.php
templates/parts/archive-hero.php
templates/parts/archive-categories.php
templates/parts/archive-latest-portfolios.php
templates/parts/project-hero.php
templates/parts/project-details.php
templates/parts/project-features.php
templates/parts/project-media.php
templates/parts/project-related.php
templates/parts/taxonomy-hero.php
templates/parts/taxonomy-description.php
templates/parts/taxonomy-sub-categories.php
templates/parts/taxonomy-posts.php
```

---

## نمایش جدیدترین نمونه کارها

```php
set_query_var('section_title', 'جدیدترین نمونه کارها');

set_query_var(
    'section_description',
    'در ادامه می‌توانید جدیدترین پروژه‌ها و نمونه کارهای تهران آی تی را مشاهده کنید.'
);

set_query_var('section_bg', 'light');
set_query_var('post_bg', 'dark');
set_query_var('posts_per_page', 8);

include TIT_20260606_DIR . 'templates/parts/portfolio-list.php';
```

---

## نمایش نمونه کارهای یک دسته

```php
set_query_var('section_title', 'نمونه کارهای ASP.NET Core');

set_query_var(
    'section_description',
    'در این بخش برخی از پروژه‌های ASP.NET Core نمایش داده می‌شوند.'
);

set_query_var('portfolio_category', 'aspnet');

include TIT_20260606_DIR . 'templates/parts/portfolio-list.php';
```

---

## نمایش دسته‌بندی‌ها

```php
set_query_var(
    'section_title',
    'دسته‌بندی نمونه کارها'
);

set_query_var(
    'section_description',
    'از طریق دسته‌بندی‌ها نمونه کارهای مورد نظر خود را پیدا کنید.'
);

include TIT_20260606_DIR . 'templates/parts/portfolio-categories-list.php';
```

---

## فلسفه طراحی پلاگین

هدف این پلاگین ارائه یک سیستم نمونه کار سبک و توسعه‌پذیر است.

در این پروژه تلاش شده است:

- وابستگی‌های اضافی حذف شوند.
- کدها ماژولار باشند.
- قالب‌ها قابل استفاده مجدد باشند.
- توسعه‌دهنده بتواند ظاهر و ساختار خروجی را به راحتی تغییر دهد.
- پلاگین بدون وابستگی به صفحه‌سازها کار کند.

به همین دلیل این پلاگین بیشتر یک فریم‌ورک نمونه کار برای توسعه‌دهندگان وردپرس محسوب می‌شود تا یک پلاگین آماده برای کاربران عادی.

---

## مجوز

GPL-2.0 یا نسخه‌های جدیدتر

---

## توسعه‌دهنده

Tehran IT

راهکارهای حرفه‌ای وردپرس، توسعه پلاگین و طراحی سیستم‌های سفارشی.