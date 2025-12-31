<?php
/**
 * Theme Header Template
 * Exact replica of React navbar component with customizer settings
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
        @media (max-width: 767px) {
            .md\:hidden { display: none !important; }
            .md\:flex { display: none !important; }
            .md\:block { display: none !important; }
        }
        @media (min-width: 768px) {
            .md\:hidden { display: none !important; }
            .md\:flex { display: flex !important; }
            .md\:block { display: block !important; }
        }
        @media (min-width: 1024px) {
            .lg\:gap-6 { gap: 24px !important; }
            .lg\:-ml-8 { margin-left: -32px !important; }
        }
        @media (min-width: 1280px) {
            .xl\:gap-7 { gap: 28px !important; }
            .xl\:-ml-\[65px\] { margin-left: -65px !important; }
        }
        .group:hover .group-hover\:bg-primary\/80 { background-color: rgba(255, 0, 255, 0.8) !important; }
        .group:hover .group-hover\:text-primary { color: #ff00ff !important; }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav style="position: sticky; top: 0; z-index: 50; width: 100%; border-bottom: 1px solid rgba(255, 255, 255, 0.1); background-color: rgba(13, 10, 27, 0.8); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 16px; height: 64px; display: flex; align-items: center; justify-content: space-between; gap: 16px;">
        
        <!-- Logo - Mobile Only -->
        <a href="<?php echo esc_url(home_url('/')); ?>" style="display: flex; align-items: center; gap: 8px; text-decoration: none; cursor: pointer;" class="md:hidden">
            <div style="width: 32px; height: 32px; background-color: #ff00ff; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: white; font-family: 'Orbitron', sans-serif; font-weight: bold; font-size: 20px; transition: background-color 0.3s;" class="group-hover:bg-primary/80">
                H
            </div>
            <span style="font-family: 'Orbitron', sans-serif; font-size: 18px; font-weight: bold; letter-spacing: 0.05em; color: white; transition: color 0.3s;" class="group-hover:text-primary">
                <?php echo esc_html(get_theme_mod('hentai_saga_header_text', 'HENTAI SAGA')); ?>
            </span>
        </a>

        <!-- Desktop Navigation -->
        <div style="display: flex; align-items: center; gap: 16px; margin-left: -16px;" class="md:flex lg:gap-6 lg:-ml-8 xl:gap-7 xl:-ml-[65px]">
            <a href="<?php echo esc_url(home_url('/')); ?>" style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 500; color: white; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ff00ff'" onmouseout="this.style.color='white'">
                <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2.83-2.83a2 2 0 112.828 0L9 12l2.83-2.83a2 2 0 112.828 0L18 12"></path></svg>
                Home
            </a>
            <a href="<?php echo esc_url(home_url('/trending')); ?>" style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 500; color: #a0a0a0; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ff00ff'" onmouseout="this.style.color='#a0a0a0'">
                <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2c5.33 4.55 8 8.48 8 11.8 0 4.98-3.8 8.2-8 8.2s-8-3.22-8-8.2C4 10.48 6.67 6.55 12 2z"></path></svg>
                Trending
            </a>
            <a href="<?php echo esc_url(home_url('/genres')); ?>" style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 500; color: #a0a0a0; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ff00ff'" onmouseout="this.style.color='#a0a0a0'">
                <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Genres
            </a>
            <a href="<?php echo esc_url(home_url('/censored')); ?>" style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 500; color: #a0a0a0; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ff00ff'" onmouseout="this.style.color='#a0a0a0'">
                <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 24 24"><path d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1zm0 19c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path></svg>
                Censored
            </a>
            <a href="<?php echo esc_url(home_url('/uncensored')); ?>" style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 500; color: #a0a0a0; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ff00ff'" onmouseout="this.style.color='#a0a0a0'">
                <svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 24 24"><path d="M13 3H4a1 1 0 00-1 1v12a1 1 0 001 1h10a1 1 0 001-1V4a1 1 0 00-1-1z"></path><path d="M20 7v10a1 1 0 11-2 0V7a1 1 0 112 0z"></path></svg>
                Uncensored
            </a>
            <a href="<?php echo esc_url(home_url('/2025')); ?>" style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 500; color: #a0a0a0; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ff00ff'" onmouseout="this.style.color='#a0a0a0'">
                <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                2025
            </a>
        </div>

        <!-- Search & Actions -->
        <div style="display: flex; align-items: center; gap: 8px;">
            <!-- Desktop Search -->
            <div style="display: flex; align-items: center; gap: 4px; background-color: #1a1a2e; border-radius: 4px; padding: 4px 8px;" class="md:flex">
                <input type="text" placeholder="Search anime..." style="background-color: #1a1a2e; border: none; color: white; font-size: 14px; width: 192px; padding: 4px 8px; outline: none;" data-testid="input-search" />
                <button style="background: none; border: none; color: white; cursor: pointer; padding: 4px 8px; font-size: 14px;">🔍</button>
            </div>

            <!-- Mobile Search Icon -->
            <button style="background: none; border: none; color: white; cursor: pointer; font-size: 20px; padding: 4px;" class="md:hidden">🔍</button>

            <!-- Mobile Menu Icon -->
            <button style="background: none; border: none; color: white; cursor: pointer; font-size: 20px; padding: 4px;" class="md:hidden">☰</button>
        </div>
    </div>
</nav>
