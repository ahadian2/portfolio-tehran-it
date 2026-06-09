# Portfolio Tehran IT

A lightweight, developer-focused WordPress portfolio plugin built for custom themes and professional portfolio websites.

🇮🇷 Persian Documentation:

[README.fa.md](README.fa.md)

---

## About

Portfolio Tehran IT is a flexible WordPress portfolio plugin designed for developers who need full control over portfolio structure, templates, custom fields, frontend output, and theme integration.

Unlike many portfolio plugins that are built for general users or drag-and-drop page builders, this plugin is mainly created for WordPress developers.

It provides a clean and modular portfolio system based on:

- Custom Post Types
- Custom Taxonomies
- Custom Fields
- Reusable Template Parts
- Global Settings
- SEO-Friendly HTML Structure

---

## Key Features

- Lightweight and clean structure
- Portfolio Custom Post Type
- Portfolio Custom Taxonomy
- Portfolio Archive Page
- Portfolio Category Page
- Single Portfolio Page
- Project Image Gallery
- Project Video Support
- GitHub Link
- Download Link
- Global Plugin Settings
- Reusable Template Parts
- SEO-Friendly Markup
- Schema.org Support
- Theme-Friendly Integration

---

## Who Is This Plugin For?

This plugin is mainly built for:

- WordPress Developers
- WordPress Theme Developers
- Freelancers
- Web Agencies
- PHP Developers
- Developers who want full control over frontend structure

This plugin is not designed for non-technical users who are looking for a visual builder or drag-and-drop portfolio system.

---

## Project Structure

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

## Portfolio Features

Each portfolio item can include:

- Project title
- Project description
- Featured image
- Hero image
- Image gallery
- Video
- Project features
- Project details
- GitHub link
- Download link
- Portfolio category

---

## Plugin Settings

The plugin includes a settings page for managing:

- Default portfolio image
- Default hero image
- Archive hero image
- Consultation button text
- Consultation button URL
- Default portfolio display count

These settings are used as global fallback values across the plugin.

---

## Template Parts

The plugin includes reusable template parts that can be called inside WordPress theme files.

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

## Display Latest Portfolio Items

```php
set_query_var('section_title', 'Latest Portfolio Projects');

set_query_var(
    'section_description',
    'Explore some of the latest portfolio projects.'
);

set_query_var('section_bg', 'light');
set_query_var('post_bg', 'dark');
set_query_var('posts_per_page', 8);

include TIT_20260606_DIR . 'templates/parts/portfolio-list.php';
```

---

## Display Portfolio Items From One Category

```php
set_query_var('section_title', 'ASP.NET Core Projects');

set_query_var(
    'section_description',
    'Selected ASP.NET Core portfolio projects.'
);

set_query_var('portfolio_category', 'aspnet');

include TIT_20260606_DIR . 'templates/parts/portfolio-list.php';
```

---

## Display Portfolio Categories

```php
set_query_var(
    'section_title',
    'Portfolio Categories'
);

set_query_var(
    'section_description',
    'Browse portfolio projects by category.'
);

include TIT_20260606_DIR . 'templates/parts/portfolio-categories-list.php';
```

---

## Design Philosophy

The goal of this plugin is to provide a lightweight and extendable portfolio system for WordPress developers.

This project focuses on:

- Removing unnecessary dependencies
- Keeping the code modular
- Making templates reusable
- Giving developers full control over output
- Avoiding page-builder dependency
- Keeping frontend structure clean and customizable

For this reason, Portfolio Tehran IT works more like a developer-friendly portfolio framework than a ready-made portfolio builder for general users.

---

## License

GPL-2.0 or later

---

## Author

Tehran IT

Professional WordPress solutions, custom plugin development, and custom web systems.