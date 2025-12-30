<?php
/**
 * Theme Footer Template
 * Displays the footer and closing HTML structure
 */
?>

<!-- Footer Navigation -->
<footer style="border-top: 1px solid rgba(255, 255, 255, 0.1); background-color: hsl(240, 10%, 6%); margin-top: 48px;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 16px;">
        <!-- Desktop Footer -->
        <div class="hidden md:block" style="padding: 40px 0;">
            <div style="display: flex; flex-direction: column; gap: 24px;">
                <!-- Header with Logo and Copyright -->
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 40px; height: 40px; background-color: hsl(326, 100%, 50%); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: hsl(0, 0%, 98%); font-family: 'Orbitron', sans-serif; font-weight: bold; font-size: 20px;">
                            H
                        </div>
                        <span style="font-family: 'Orbitron', sans-serif; font-size: 20px; font-weight: bold; color: white;">
                            <?php echo esc_html(get_theme_mod('hentai_saga_footer_text', 'HENTAI SAGA')); ?>
                        </span>
                    </div>
                    <p style="color: hsl(240, 5%, 65%); font-size: 14px;">
                        <?php echo esc_html(get_theme_mod('hentai_saga_footer_copyright', '© 2025 Hentai Saga. All rights reserved.')); ?>
                    </p>
                </div>
                <!-- Separator -->
                <div style="height: 1px; background-color: rgba(255, 255, 255, 0.1);"></div>
                <!-- Footer Links -->
                <div style="display: flex; align-items: center; justify-content: center; gap: 32px; color: hsl(240, 5%, 65%); font-size: 14px; flex-wrap: wrap;">
                    <?php
                    $footer_links = hentai_saga_get_all_footer_links();
                    foreach ($footer_links as $link) {
                        echo '<a href="' . esc_url($link['url']) . '" style="color: hsl(240, 5%, 65%); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color=\'hsl(326, 100%, 50%)\'" onmouseout="this.style.color=\'hsl(240, 5%, 65%)\'">'. esc_html($link['text']) . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Mobile Footer -->
        <div class="md:hidden" style="padding: 32px 0; display: flex; flex-direction: column; align-items: center; gap: 20px;">
            <!-- Logo -->
            <div style="display: flex; align-items: center; gap: 8px;">
                <div style="width: 32px; height: 32px; background-color: hsl(326, 100%, 50%); border-radius: 4px; display: flex; align-items: center; justify-content: center; color: hsl(0, 0%, 98%); font-family: 'Orbitron', sans-serif; font-weight: bold; font-size: 18px;">
                    H
                </div>
                <span style="font-family: 'Orbitron', sans-serif; font-size: 18px; font-weight: bold; color: white;">
                    <?php echo esc_html(get_theme_mod('hentai_saga_footer_text', 'HENTAI SAGA')); ?>
                </span>
            </div>
            <!-- Copyright -->
            <p style="color: hsl(240, 5%, 65%); font-size: 12px;">
                <?php echo esc_html(get_theme_mod('hentai_saga_footer_copyright', '© 2025 Hentai Saga. All rights reserved.')); ?>
            </p>
            <!-- Separator -->
            <div style="height: 1px; background-color: rgba(255, 255, 255, 0.1); width: 100%;"></div>
            <!-- Footer Links Grid -->
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px 24px; color: hsl(240, 5%, 65%); font-size: 12px; text-align: center; width: 100%;">
                <?php
                foreach ($footer_links as $link) {
                    echo '<a href="' . esc_url($link['url']) . '" style="color: hsl(240, 5%, 65%); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color=\'hsl(326, 100%, 50%)\'" onmouseout="this.style.color=\'hsl(240, 5%, 65%)\'">'. esc_html($link['text']) . '</a>';
                }
                ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
