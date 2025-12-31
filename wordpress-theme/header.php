<?php
/**
 * Theme Header Template
 * Complete navbar with all menus, search, and navigation
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

<!-- Navigation Navbar -->
<nav style="position: sticky; top: 0; z-index: 50; width: 100%; border-bottom: 1px solid rgba(255, 255, 255, 0.1); background-color: rgba(13, 10, 27, 0.8); backdrop-filter: blur(12px);">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 16px; height: 64px; display: flex; align-items: center; justify-content: space-between; gap: 16px;">
        
        <!-- Logo - Mobile Only -->
        <a href="<?php echo esc_url(home_url('/')); ?>" style="display: flex; align-items: center; gap: 8px; text-decoration: none; @media(min-width: 768px) { display: none; }">
            <div style="width: 32px; height: 32px; background-color: #ff00ff; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: white; font-family: 'Orbitron', sans-serif; font-weight: bold; font-size: 18px;">
                H
            </div>
            <span style="font-family: 'Orbitron', sans-serif; font-size: 18px; font-weight: bold; color: white;">
                <?php echo esc_html(get_theme_mod('hentai_saga_header_text', 'HENTAI SAGA')); ?>
            </span>
        </a>

        <!-- Desktop Navigation -->
        <div style="display: none; @media(min-width: 768px) { display: flex; } align-items: center; gap: 16px; margin-left: -32px;">
            <a href="<?php echo esc_url(home_url('/')); ?>" style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 500; color: white; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ff00ff'" onmouseout="this.style.color='white'">
                🏠 Home
            </a>
            <a href="<?php echo esc_url(home_url('/trending')); ?>" style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 500; color: #a0a0a0; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ff00ff'" onmouseout="this.style.color='#a0a0a0'">
                🔥 Trending
            </a>
            <a href="<?php echo esc_url(home_url('/genres')); ?>" style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 500; color: #a0a0a0; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ff00ff'" onmouseout="this.style.color='#a0a0a0'">
                🎬 Genres
            </a>
            <a href="<?php echo esc_url(home_url('/censored')); ?>" style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 500; color: #a0a0a0; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ff00ff'" onmouseout="this.style.color='#a0a0a0'">
                🔒 Censored
            </a>
            <a href="<?php echo esc_url(home_url('/uncensored')); ?>" style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 500; color: #a0a0a0; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ff00ff'" onmouseout="this.style.color='#a0a0a0'">
                🔓 Uncensored
            </a>
            <a href="<?php echo esc_url(home_url('/2025')); ?>" style="display: flex; align-items: center; gap: 8px; font-size: 14px; font-weight: 500; color: #a0a0a0; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#ff00ff'" onmouseout="this.style.color='#a0a0a0'">
                📅 2025
            </a>
        </div>

        <!-- Search & Actions -->
        <div style="display: flex; align-items: center; gap: 12px;">
            <!-- Desktop Search -->
            <div style="display: none; @media(min-width: 768px) { display: flex; } align-items: center; gap: 4px; background-color: #1a1a2e; border-radius: 4px; padding: 4px 8px;">
                <input type="text" placeholder="Search anime..." style="background-color: #1a1a2e; border: none; color: white; font-size: 14px; width: 192px; padding: 4px 8px; outline: none;" data-testid="input-search" />
                <button style="background: none; border: none; color: white; cursor: pointer; padding: 4px 8px; font-size: 14px;">🔍</button>
            </div>

            <!-- Mobile Search Icon -->
            <button style="display: flex; @media(min-width: 768px) { display: none; } background: none; border: none; color: white; cursor: pointer; font-size: 20px;">🔍</button>

            <!-- Mobile Menu Icon -->
            <button style="display: flex; @media(min-width: 768px) { display: none; } background: none; border: none; color: white; cursor: pointer; font-size: 20px;">☰</button>
        </div>
    </div>
</nav>
