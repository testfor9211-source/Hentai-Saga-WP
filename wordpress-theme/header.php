<?php
/**
 * Theme Header Template
 * Displays the header and opening HTML structure
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Header Navigation -->
<header class="sticky top-0 z-50 w-full border-b border-white/10 bg-background/80 backdrop-blur-md">
    <div class="container mx-auto px-4 h-16 flex items-center justify-between gap-4">
        <!-- Logo -->
        <a href="<?php echo esc_url(get_theme_mod('hentai_saga_header_url', home_url('/'))); ?>" class="flex items-center gap-2 group">
            <div class="w-8 h-8 bg-primary rounded flex items-center justify-center text-primary-foreground font-display font-bold text-xl">
                H
            </div>
            <span class="font-display text-lg font-bold tracking-wider text-white">
                <?php echo esc_html(get_theme_mod('hentai_saga_header_text', 'HENTAI SAGA')); ?>
            </span>
        </a>

        <!-- Search and Menu Icons (React will handle interactivity) -->
        <div class="flex items-center gap-2">
            <!-- Placeholder for React navbar components -->
        </div>
    </div>
</header>
