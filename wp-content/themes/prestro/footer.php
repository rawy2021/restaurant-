<?php
/**
 * The template for displaying the footer
 * @package Prestro
 */
?>
</div>

<div id="footer-area">
    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 ft wow fadeInUp" data-wow-offset="5" data-wow-duration="2.5s" data-wow-delay="0.5s">
                        <?php if ( is_active_sidebar( 'footer-widget-1' ) ){
                            dynamic_sidebar('footer-widget-1');
                        } ?>
                    </div>
                    <div class="col-lg-4 col-md-6 ft wow fadeInUp" data-wow-offset="5" data-wow-duration="2.5s" data-wow-delay="0.5s">
                        <?php if ( is_active_sidebar( 'footer-widget-2' ) ){
                            dynamic_sidebar('footer-widget-2');
                        } ?>
                    </div>
                    <div class="col-lg-4 col-md-6 ft wow fadeInUp" data-wow-offset="5" data-wow-duration="2.5s" data-wow-delay="0.5s">
                        <div class="widget widget_text">
                            <?php if(get_theme_mod("prestroc_fti")) { ?>
                                <h3 class="widgettitle"><?php echo esc_html(get_theme_mod('prestroc_fti',''));?></h3>
                            <?php } ?>
                            <div class="stay-connect">
                                <?php if(get_theme_mod("prestroc_name")) { ?>
                                    <p><i class="fas fa-home"></i><?php echo esc_html(get_theme_mod('prestroc_name',''));?></p>
                                <?php } ?>
                                <?php if(get_theme_mod("prestro_address")) { ?>
                                    <p><i class="fas fa-map-marker"></i><?php echo esc_html(get_theme_mod('prestro_address',''));?>
                                    </p>
                                <?php } ?>
                                <?php if(get_theme_mod("prestro_email")) { ?>
                                    <p><i class="fas fa-envelope"></i><a href="mailto:<?php echo esc_attr(get_theme_mod('prestro_email',''));?>"><?php echo esc_html(get_theme_mod('prestro_email',''));?><span class="screen-reader-text"><?php esc_html_e( 'Email','prestro' );?></span></a>
                                    </p><?php } ?>
                                <?php if(get_theme_mod("prestro_phone")) { ?>
                                    <p><i class="fas fa-phone"></i><?php echo esc_html(get_theme_mod('prestro_phone',''));?></p>
                                <?php } ?>
                                <div class="social_icon">
                                    <?php if(get_theme_mod("prestro_social_fb")) : ?>
                                        <span class="fbs">
                                            <a href="<?php echo esc_url(get_theme_mod('prestro_social_fb',''));?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','prestro' );?></span></a>
                                        </span>
                                    <?php endif; ?>
                                    <?php if(get_theme_mod("prestro_social_twitter")) : ?>
                                        <span class="tws">
                                            <a href="<?php echo esc_url(get_theme_mod('prestro_social_twitter',''));?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','prestro' );?></span></a>
                                        </span>
                                    <?php endif; ?>
                                    <?php if(get_theme_mod("prestro_social_linkedin")) : ?>
                                        <span class="lis">
                                            <a href="<?php echo esc_url(get_theme_mod('prestro_social_linkedin',''));?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','prestro' );?></span></a>
                                        </span>
                                    <?php endif; ?>
                                    <?php if(get_theme_mod("prestro_social_skype")) : ?>
                                        <span class="sks">
                                            <a href="skype:skype?<?php echo esc_url(get_theme_mod('prestro_social_skype',''));?>" data-placement="bottom" data-toggle="tooltip" data-original-title="Skype"><i class="fab fa-skype"></i><span class="screen-reader-text"><?php esc_html_e( 'Skype','prestro' );?></span></a>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-to-top"><i class="fa fa-angle-up"></i></div>
    </footer>
    <div class="site-info container">
        <div class="copyright">
            <p><a href="<?php echo esc_url( __( 'https://www.unboxthemes.com/wp-themes/free-restaurant-wordpress-theme/', 'prestro' ) ); 
                    ?>"><?php printf( esc_html__( 'Restaurant WordPress Theme', 'prestro' ) ); ?> </a><?php echo esc_html(get_theme_mod('prestro_copyright',__('By Unbox Themes','prestro'))); ?>
            </p>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>