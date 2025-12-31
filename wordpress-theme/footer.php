<?php
/**
 * Theme Footer Template
 * Complete footer with logo, copyright, and policy links
 */
?>

<!-- Footer Navigation -->
<footer style="border-top: 1px solid rgba(255, 255, 255, 0.1); background-color: hsl(240, 10%, 6%); margin-top: 48px;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 16px;">
        
        <!-- Desktop Footer -->
        <div style="display: none; @media(min-width: 768px) { display: block; } padding: 40px 0;">
            <div style="display: flex; flex-direction: column; gap: 24px;">
                <!-- Header with Logo and Copyright -->
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 40px; height: 40px; background-color: #ff00ff; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-family: 'Orbitron', sans-serif; font-weight: bold; font-size: 20px;">
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
                    $footer_links = array(
                        array('text' => get_theme_mod('hentai_saga_footer_privacy_text', 'Privacy Policy'), 'url' => get_theme_mod('hentai_saga_footer_privacy_url', home_url('/privacy-policy/'))),
                        array('text' => get_theme_mod('hentai_saga_footer_terms_text', 'Terms of Service'), 'url' => get_theme_mod('hentai_saga_footer_terms_url', home_url('/terms-of-service/'))),
                        array('text' => get_theme_mod('hentai_saga_footer_dmca_text', 'DMCA Copyright Policy'), 'url' => get_theme_mod('hentai_saga_footer_dmca_url', home_url('/dmca-copyright-policy/'))),
                        array('text' => get_theme_mod('hentai_saga_footer_usc_text', 'USC 2257'), 'url' => get_theme_mod('hentai_saga_footer_usc_url', home_url('/usc-2257/'))),
                        array('text' => get_theme_mod('hentai_saga_footer_cookies_text', 'Cookie Policy'), 'url' => get_theme_mod('hentai_saga_footer_cookies_url', home_url('/cookie-policy/'))),
                        array('text' => get_theme_mod('hentai_saga_footer_disclaimer_text', 'Disclaimer'), 'url' => get_theme_mod('hentai_saga_footer_disclaimer_url', home_url('/disclaimer/'))),
                        array('text' => get_theme_mod('hentai_saga_footer_ads_text', 'Advertisement Policy'), 'url' => get_theme_mod('hentai_saga_footer_ads_url', home_url('/advertisement-policy/'))),
                        array('text' => get_theme_mod('hentai_saga_footer_age_text', 'Age Restriction Policy'), 'url' => get_theme_mod('hentai_saga_footer_age_url', home_url('/age-restriction-policy/'))),
                        array('text' => get_theme_mod('hentai_saga_footer_parental_text', 'Parental Controls'), 'url' => get_theme_mod('hentai_saga_footer_parental_url', home_url('/parental-controls/')))
                    );
                    
                    foreach ($footer_links as $link) {
                        if (!empty($link['text']) && !empty($link['url'])) {
                            echo '<a href="' . esc_url($link['url']) . '" style="color: hsl(240, 5%, 65%); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color=\'#ff00ff\'" onmouseout="this.style.color=\'hsl(240, 5%, 65%)\'">'. esc_html($link['text']) . '</a>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Mobile Footer -->
        <div style="display: flex; @media(min-width: 768px) { display: none; } padding: 32px 0; flex-direction: column; align-items: center; gap: 20px;">
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
            <p style="color: hsl(240, 5%, 65%); font-size: 12px;">
                <?php echo esc_html(get_theme_mod('hentai_saga_footer_copyright', '© 2025 Hentai Saga. All rights reserved.')); ?>
            </p>
            
            <!-- Separator -->
            <div style="height: 1px; background-color: rgba(255, 255, 255, 0.1); width: 100%;"></div>
            
            <!-- Footer Links Grid -->
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; color: hsl(240, 5%, 65%); font-size: 12px; text-align: center; width: 100%;">
                <?php
                foreach ($footer_links as $link) {
                    if (!empty($link['text']) && !empty($link['url'])) {
                        echo '<a href="' . esc_url($link['url']) . '" style="color: hsl(240, 5%, 65%); text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color=\'#ff00ff\'" onmouseout="this.style.color=\'hsl(240, 5%, 65%)\'">'. esc_html($link['text']) . '</a>';
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
