<footer style="background-color: #1f2937; color: white; padding: 40px 20px; margin-top: 60px;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; margin-bottom: 30px;">
            <div>
                <h3 style="margin-bottom: 15px;">Policies</h3>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li><a href="<?php echo site_url('/privacy-policy'); ?>" style="color: #9ca3af; text-decoration: none;">Privacy Policy</a></li>
                    <li><a href="<?php echo site_url('/terms-of-service'); ?>" style="color: #9ca3af; text-decoration: none;">Terms of Service</a></li>
                    <li><a href="<?php echo site_url('/cookie-policy'); ?>" style="color: #9ca3af; text-decoration: none;">Cookie Policy</a></li>
                    <li><a href="<?php echo site_url('/disclaimer'); ?>" style="color: #9ca3af; text-decoration: none;">Disclaimer</a></li>
                </ul>
            </div>
            <div>
                <h3 style="margin-bottom: 15px;">Legal</h3>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li><a href="<?php echo site_url('/dmca-copyright-policy'); ?>" style="color: #9ca3af; text-decoration: none;">DMCA Copyright Policy</a></li>
                    <li><a href="<?php echo site_url('/advertisement-policy'); ?>" style="color: #9ca3af; text-decoration: none;">Advertisement Policy</a></li>
                    <li><a href="<?php echo site_url('/usc-2257'); ?>" style="color: #9ca3af; text-decoration: none;">USC 2257</a></li>
                </ul>
            </div>
            <div>
                <h3 style="margin-bottom: 15px;">Support</h3>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li><a href="<?php echo site_url('/age-restriction-policy'); ?>" style="color: #9ca3af; text-decoration: none;">Age Restriction</a></li>
                    <li><a href="<?php echo site_url('/parental-controls'); ?>" style="color: #9ca3af; text-decoration: none;">Parental Controls</a></li>
                </ul>
            </div>
        </div>
        <div style="border-top: 1px solid #374151; padding-top: 20px; text-align: center; color: #9ca3af;">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>