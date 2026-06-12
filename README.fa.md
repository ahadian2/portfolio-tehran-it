# پلاگین نمونه کار تهران آی تی

🇺🇸 مستندات انگلیسی:

[README.md](README.md)

---

## معرفی

پلاگین نمونه کار تهران آی تی یک پلاگین سبک، توسعه‌پذیر و مناسب توسعه‌دهندگان وردپرس است که برای مدیریت پروژه‌ها، نمونه‌کارها و دسته‌بندی‌های آن‌ها طراحی شده است.

برخلاف بسیاری از پلاگین‌های نمونه کار که برای کاربران عمومی یا صفحه‌سازها توسعه داده شده‌اند، این پلاگین با تمرکز بر توسعه‌دهندگان وردپرس طراحی شده است و امکان شخصی‌سازی کامل قالب‌ها، بخش‌ها، فیلدها و ساختار خروجی را فراهم می‌کند.

این پلاگین بر پایه موارد زیر توسعه یافته است:

- پست تایپ اختصاصی
- دسته‌بندی اختصاصی
- فیلدهای سفارشی
- Template Part های قابل استفاده مجدد
- تنظیمات سراسری
- ساختار مناسب سئو
- پشتیبانی از Schema.org

---

## ویژگی‌ها

### مدیریت نمونه کارها

- پست تایپ اختصاصی نمونه کار
- دسته‌بندی اختصاصی نمونه کارها
- صفحه آرشیو نمونه کارها
- صفحه دسته‌بندی نمونه کارها
- صفحه تکی پروژه

### محتوای پروژه

- تصویر شاخص
- تصویر هیرو
- گالری تصاویر
- پشتیبانی از ویدیو (آپارات و یوتیوب)
- ویژگی‌های پروژه
- جزئیات پروژه
- توضیحات پروژه

### منابع پروژه

- لینک مخزن گیت‌هاب
- لینک دانلود
- پروژه‌های مرتبط

### امکانات توسعه‌دهندگان

- Template Part های قابل استفاده مجدد
- Helper Function های اختصاصی
- ساختار ماژولار
- قابلیت توسعه آسان
- سازگاری با قالب‌های سفارشی
- شخصی‌سازی آسان

### امکانات سئو

- ساختار HTML معنایی
- پشتیبانی از Schema.org
- ساختار مناسب هدینگ‌ها
- صفحات نمونه کار بهینه برای موتورهای جستجو
- دسترس‌پذیری بهتر

---

## تصاویر

### صفحه اصلی نمونه کارها

![صفحه اصلی نمونه کارها](docs/screenshots/screenshot-1.png)

### دسته‌بندی نمونه کارها

![دسته‌بندی نمونه کارها](docs/screenshots/screenshot-2.png)

### صفحه نمونه کارها

![صفحه نمونه کارها](docs/screenshots/screenshot-3.png)

### تنظیمات نمونه کارها

![تنظیمات نمونه کارها](docs/screenshots/screenshot-4.png)

### مستندات نمونه کارها

![مستندات نمونه کارها](docs/screenshots/screenshot-5.png)

---

## مناسب چه کسانی است؟

این پلاگین بیشتر برای افراد زیر طراحی شده است:

- توسعه‌دهندگان وردپرس
- توسعه‌دهندگان قالب وردپرس
- فریلنسرها
- شرکت‌های طراحی سایت
- توسعه‌دهندگان PHP
- برنامه‌نویسان نرم‌افزار
- افرادی که به کنترل کامل روی ساختار خروجی نیاز دارند

---

## این پلاگین برای چه کسانی مناسب نیست؟

این پلاگین برای کاربرانی طراحی نشده است که:

- به دنبال صفحه‌ساز Drag & Drop هستند
- بدون دانش برنامه‌نویسی قصد شخصی‌سازی کامل دارند
- وابسته به Page Builder ها هستند
- انتظار دارند همه امکانات فقط از پنل مدیریت کنترل شود

هدف اصلی این پروژه ارائه یک زیرساخت سبک و توسعه‌پذیر برای توسعه‌دهندگان وردپرس است.

---

## ساختار پروژه

```text
portfolio-tehran-it/
│
├── assets/
│
├── docs/
│   └── screenshots/
│
├── helpers/
├── includes/
├── languages/
├── templates/
│
├── README.md
├── README.fa.md
├── CHANGELOG.md
├── LICENSE
└── portfolio-tehran-it.php
```

---

## امکانات هر نمونه کار

هر نمونه کار می‌تواند شامل موارد زیر باشد:

- عنوان پروژه
- توضیحات پروژه
- تصویر شاخص
- تصویر هیرو
- گالری تصاویر
- ویدیوی پروژه
- ویژگی‌های پروژه
- جزئیات پروژه
- لینک گیت‌هاب
- لینک دانلود
- پروژه‌های مرتبط
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

این تنظیمات به عنوان مقادیر پیش‌فرض در سراسر پلاگین استفاده می‌شوند.

---

## Template Parts

پلاگین شامل Template Part های آماده است که می‌توان آن‌ها را در قالب وردپرس فراخوانی کرد.

```php
templates/parts/portfolio-list.php
templates/parts/portfolio-categories-list.php

templates/parts/archive-hero.php
templates/parts/archive-categories.php
templates/parts/archive-latest-portfolios.php

templates/parts/project-hero.php
templates/parts/project-introduction.php
templates/parts/project-details.php
templates/parts/project-features.php
templates/parts/project-video.php
templates/parts/project-gallery.php
templates/parts/project-content.php
templates/parts/project-downloads.php
templates/parts/project-related.php

templates/parts/taxonomy-hero.php
templates/parts/taxonomy-description.php
templates/parts/taxonomy-sub-categories.php
templates/parts/taxonomy-posts.php
```

---

## توابع کمکی

دریافت تنظیمات:

```php
tit_20260606_get_setting(
    'consultation_button_text'
);
```

دریافت تصویر از تنظیمات:

```php
tit_20260606_get_setting_image_url(
    'default_image'
);
```

دریافت ویژگی‌های پروژه:

```php
tit_20260606_get_project_features(
    get_the_ID()
);
```

دریافت جزئیات پروژه:

```php
tit_20260606_get_project_details(
    get_the_ID()
);
```

---

## نمونه استفاده

نمایش جدیدترین نمونه کارها:

```php
set_query_var(
    'section_title',
    'جدیدترین نمونه کارها'
);

set_query_var(
    'section_description',
    'در ادامه می‌توانید جدیدترین پروژه‌ها را مشاهده کنید.'
);

set_query_var('section_bg', 'light');
set_query_var('post_bg', 'dark');
set_query_var('posts_per_page', 8);

include TIT_20260606_DIR . 'templates/parts/portfolio-list.php';
```

نمایش نمونه کارهای یک دسته:

```php
set_query_var(
    'section_title',
    'پروژه‌های ASP.NET Core'
);

set_query_var(
    'section_description',
    'برخی از پروژه‌های ASP.NET Core'
);

set_query_var(
    'portfolio_category',
    'aspnet'
);

include TIT_20260606_DIR . 'templates/parts/portfolio-list.php';
```

نمایش دسته‌بندی‌ها به صورت اسلایدر:

```php
set_query_var(
    'section_title',
    'دسته‌بندی نمونه کارها'
);

set_query_var(
    'section_description',
    'نمونه کارها را بر اساس دسته‌بندی مرور کنید.'
);

include TIT_20260606_DIR . 'templates/parts/portfolio-categories-list.php';
```

نمایش دسته‌بندی‌ها به صورت گرید:

```php
set_query_var(
    'section_title',
    'دسته‌بندی نمونه کارها'
);

set_query_var(
    'section_description',
    'از بین دسته‌بندی‌های زیر، نمونه کارهای مرتبط با نیاز خود را مشاهده کنید.'
);

set_query_var('section_bg', 'light');
set_query_var('post_bg', 'dark');
set_query_var('hide_empty', false);

include TIT_20260606_DIR . 'templates/parts/portfolio-categories-grid.php';
```

---

## لینک‌های پیش‌فرض

صفحه اصلی نمونه کارها:

```text
/portfolio/
```

دسته‌بندی نمونه کارها:

```text
/portfolio-category/aspnet/
```

صفحه تکی پروژه:

```text
/portfolio/project-name/
```

---

## فلسفه طراحی پلاگین

هدف این پلاگین ارائه یک سیستم نمونه کار سبک، ماژولار و توسعه‌پذیر برای توسعه‌دهندگان وردپرس است.

در این پروژه تلاش شده است:

- وابستگی‌های اضافی حذف شوند
- کدها ماژولار باشند
- قالب‌ها قابل استفاده مجدد باشند
- توسعه‌دهنده کنترل کامل روی خروجی داشته باشد
- وابستگی به صفحه‌سازها حذف شود
- ساختار صفحات برای سئو بهینه باشد
- شخصی‌سازی ساده و سریع انجام شود

به همین دلیل این پلاگین بیشتر یک فریم‌ورک نمونه کار برای توسعه‌دهندگان وردپرس محسوب می‌شود تا یک پلاگین آماده برای کاربران عادی.

---

## نقشه راه

### نسخه 1.0

- [x] پست تایپ نمونه کار
- [x] دسته‌بندی نمونه کار
- [x] صفحه آرشیو نمونه کارها
- [x] صفحه دسته‌بندی نمونه کارها
- [x] صفحه تکی پروژه
- [x] گالری تصاویر پروژه
- [x] ویدیوی پروژه
- [x] لینک دانلود
- [x] پروژه‌های مرتبط
- [x] تنظیمات سراسری
- [x] Template Part های قابل استفاده مجدد
- [x] Helper Function ها

### نسخه‌های آینده

- [ ] نمونه کار ویژه
- [ ] مرتب‌سازی نمونه کارها
- [ ] آمار و گزارشات
- [ ] مستندات پیشرفته‌تر
- [ ] توابع کمکی بیشتر
- [ ] پشتیبانی از REST API
- [ ] Template Part های بیشتر

---

## نیازمندی‌ها

- وردپرس 6.0 یا بالاتر
- PHP 8.0 یا بالاتر

---

## مجوز

GPL-2.0 یا نسخه‌های جدیدتر

https://www.gnu.org/licenses/gpl-2.0.html

---

## توسعه‌دهنده

**محمدرضا احدیان (تهران آی تی)**

راهکارهای حرفه‌ای وردپرس، توسعه پلاگین و طراحی سیستم‌های سفارشی

وب‌سایت:

https://tehranit.net

گیت‌هاب:

https://github.com/ahadian2