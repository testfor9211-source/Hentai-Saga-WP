<?php
/**
 * Theme Footer Template
 * Exact replica of React footer component with customizer settings
 */
?>

<footer style="border-top: 1px solid rgba(255, 255, 255, 0.1); background-color: #0d0a1b; margin-top: 48px;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 16px;">
        
        <!-- Desktop Footer -->
        <div style="display: block; padding: 40px 0;" class="md:block">
            <div style="display: flex; flex-direction: column; gap: 24px;">
                <!-- Logo and Copyright Section -->
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 40px; height: 40px; background-color: #ff00ff; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-family: 'Orbitron', sans-serif; font-weight: bold; font-size: 20px;">
                            H
                        </div>
                        <span style="font-family: 'Orbitron', sans-serif; font-size: 20px; font-weight: bold; color: white;">
                            <?php echo esc_html(get_theme_mod('hentai_saga_footer_text', 'HENTAI SAGA')); ?>
                        </span>
                    </div>
                    <p style="color: #a0a0a0; font-size: 14px;">
                        <?php echo esc_html(get_theme_mod('hentai_saga_footer_copyright', '© 2025 Hentai Saga. All rights reserved.')); ?>
                    </p>
                </div>
                
                <!-- Separator -->
                <div style="height: 1px; background-color: rgba(255, 255, 255, 0.1);"></div>
                
                <!-- Footer Links -->
                <div style="display: flex; align-items: center; justify-content: center; gap: 32px; color: #a0a0a0; font-size: 14px; flex-wrap: wrap;">
                    <?php
                    $links = array(
                        array('key' => 'privacy', 'default' => 'Privacy Policy', 'url_default' => 'privacy-policy'),
                        array('key' => 'terms', 'default' => 'Terms of Service', 'url_default' => 'terms-of-service'),
                        array('key' => 'dmca', 'default' => 'DMCA Copyright Policy', 'url_default' => 'dmca-copyright-policy'),
                        array('key' => 'usc', 'default' => 'USC 2257', 'url_default' => 'usc-2257'),
                        array('key' => 'cookies', 'default' => 'Cookie Policy', 'url_default' => 'cookie-policy'),
                        array('key' => 'disclaimer', 'default' => 'Disclaimer', 'url_default' => 'disclaimer'),
                        array('key' => 'ads', 'default' => 'Advertisement Policy', 'url_default' => 'advertisement-policy'),
                        array('key' => 'age', 'default' => 'Age Restriction Policy', 'url_default' => 'age-restriction-policy'),
                        array('key' => 'parental', 'default' => 'Parental Controls', 'url_default' => 'parental-controls'),
                    );
                    
                    foreach ($links as $link) {
                        $text = get_theme_mod('hentai_saga_footer_' . $link['key'] . '_text', $link['default']);
                        $url = get_theme_mod('hentai_saga_footer_' . $link['key'] . '_url', home_url('/' . $link['url_default'] . '/'));
                        
                        if (!empty($text) && !empty($url)) {
                            echo '<a href="' . esc_url($url) . '" style="color: #a0a0a0; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color=\'#ff00ff\'" onmouseout="this.style.color=\'#a0a0a0\'" data-testid="link-' . esc_attr($link['key']) . '">' . esc_html($text) . '</a>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Mobile Footer -->
        <div style="display: none; padding: 32px 0; flex-direction: column; align-items: center; gap: 20px;" class="md:hidden">
            <!-- Logo -->
            <div style="display: flex; align-items: center; gap: 8px;">
                <div style="width: 32px; height: 32px; background-color: #ff00ff; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: white; font-family: 'Orbitron', sans-serif; font-weight: bold; font-size: 18px;">
                    H
                </div>
                <span style="font-family: 'Orbitron', sans-serif; font-size: 18px; font-weight: bold; color: white;">
                    <?php echo esc_html(get_theme_mod('hentai_saga_footer_text', 'HENTAI SAGA')); ?>
                </span>
            </div>
            
            <!-- Copyright -->
            <p style="color: #a0a0a0; font-size: 12px;">
                <?php echo esc_html(get_theme_mod('hentai_saga_footer_copyright', '© 2025 Hentai Saga. All rights reserved.')); ?>
            </p>
            
            <!-- Separator -->
            <div style="height: 1px; background-color: rgba(255, 255, 255, 0.1); width: 100%;"></div>
            
            <!-- Footer Links Grid -->
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px 24px; color: #a0a0a0; font-size: 12px; text-align: center; width: 100%;">
                <?php
                foreach ($links as $link) {
                    $text = get_theme_mod('hentai_saga_footer_' . $link['key'] . '_text', $link['default']);
                    $url = get_theme_mod('hentai_saga_footer_' . $link['key'] . '_url', home_url('/' . $link['url_default'] . '/'));
                    
                    if (!empty($text) && !empty($url)) {
                        echo '<a href="' . esc_url($url) . '" style="color: #a0a0a0; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color=\'#ff00ff\'" onmouseout="this.style.color=\'#a0a0a0\'" data-testid="link-' . esc_attr($link['key']) . '-mobile">' . esc_html($text) . '</a>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
