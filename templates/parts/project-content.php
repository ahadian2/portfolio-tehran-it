<?php

if (!defined('ABSPATH')) {
    exit;
}

$content = get_the_content();

if (empty(trim(wp_strip_all_tags($content)))) {
    return;
}

$title_id = 'portfolio-content-title-' . get_the_ID();
?>

<section class="sec sec-bg-dark singel sec-py-4"
         id="content"
         aria-labelledby="<?php echo esc_attr($title_id); ?>">

    <div class="container singel-video">

        <div class="row justify-content-center">

            <div class="col-12 col-xl-11">

                <div class="content content-form p-0">
                    <div>

                        <?php
                        $content = apply_filters('the_content', get_the_content());
                        
                        $content = preg_replace_callback(
                            '/<a\b([^>]*)>\s*(<img[^>]+>)\s*<\/a>/i',
                            function ($matches) {
                                return '<span class="wp-caption">' . $matches[0] . '</span>';
                            },
                            $content
                        );
                        
                        echo $content;
                        
                        wp_link_pages([
                            'before' => '<div class="page-links">',
                            'after'  => '</div>',
                        ]);
                        ?>

                    </div>
                </div>

            </div>

        </div>

    </div>

</section>