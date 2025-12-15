<?php
/**
 * Footer Template
 * 
 * @package Carmazzi_Distilled
 */
?>

<footer class="site-footer" role="contentinfo">
    <div class="container">
        
        <!-- Footer Icons -->
        <div class="footer-icons">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/equalhousing.png" alt="Equal Housing Opportunity" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mls.png" alt="Multiple Listing Service" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/realtor.png" alt="Realtor - Member of National Association of Realtors" />
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/narpm2.png" alt="NARPM - National Association of Residential Property Managers" />
        </div>
        
        <!-- Disclaimer -->
        <div class="footer-disclaimer">
            <p>
                <?php _e('This material at this site is provided solely for informational purposes and does not constitute an offer to purchase, sell, rent, or advertise real estate outside the state of California. Carmazzi Real Estate and its agents are licensed by the Bureau of Real Estate, State of California, Corporate License #01988014. Carmazzi Real Estate is not making any warranties or representations concerning any of the properties illustrated including their availability. Information at this site is deemed reliable but not guaranteed.', 'carmazzi-distilled'); ?>
            </p>
        </div>
        
        <!-- Footer Widgets/Links -->
        <div class="footer-content">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <div class="footer-section">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            <?php else : ?>
                <div class="footer-section">
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php _e('Contact Us', 'carmazzi-distilled'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/vendors/')); ?>"><?php _e('Vendor List', 'carmazzi-distilled'); ?></a></li>
                    </ul>
                </div>
            <?php endif; ?>
            
            <?php if (is_active_sidebar('footer-2')) : ?>
                <div class="footer-section">
                    <?php dynamic_sidebar('footer-2'); ?>
                </div>
            <?php else : ?>
                <div class="footer-section">
                    <ul>
                        <li><a href="https://carmazzirealestate.managebuilding.com/Resident/PublicPages/home.aspx" target="_blank" rel="noopener"><?php _e('Owner Sign In', 'carmazzi-distilled'); ?></a></li>
                        <li><a href="https://carmazzirealestate.managebuilding.com/Resident/PublicPages/home.aspx" target="_blank" rel="noopener"><?php _e('Tenant Sign In', 'carmazzi-distilled'); ?></a></li>
                    </ul>
                </div>
            <?php endif; ?>
            
            <?php if (is_active_sidebar('footer-3')) : ?>
                <div class="footer-section">
                    <?php dynamic_sidebar('footer-3'); ?>
                </div>
            <?php else : ?>
                <div class="footer-section">
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/for-sale/')); ?>"><?php _e('For Sale', 'carmazzi-distilled'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/reviews/')); ?>"><?php _e('Reviews', 'carmazzi-distilled'); ?></a></li>
                    </ul>
                </div>
            <?php endif; ?>
            
            <?php if (is_active_sidebar('footer-4')) : ?>
                <div class="footer-section">
                    <?php dynamic_sidebar('footer-4'); ?>
                </div>
            <?php else : ?>
                <div class="footer-section">
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php _e('Contact Us', 'carmazzi-distilled'); ?></a></li>
                        <li><a href="https://www.google.com/search?q=Carmazzi+Real+Estate" target="_blank" rel="noopener" title="<?php esc_attr_e('Google Carmazzi Real Estate (opens in new tab)', 'carmazzi-distilled'); ?>"><?php _e('Google!', 'carmazzi-distilled'); ?></a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="footer-bottom">
            <p>
                &copy; <?php echo date('Y'); ?> 
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php bloginfo('name'); ?>
                </a>
                <?php
                $phone = get_theme_mod('carmazzi_phone', '(916) 736-1417');
                if ($phone) {
                    echo ' | ' . esc_html($phone);
                }
                ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>