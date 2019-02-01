
    <footer class="footer">
        <div class="footer__top">
            <a class="footer__logo" href="<?php echo get_home_url(); ?>"><img src="<?php echo get_option( 'logo' ); ?>" alt="logo"></a>
            <div class="footer__info">
                <div class="footer__social">
                    <a href="<?php echo get_option('instagram'); ?>"><i class="icon fab fa-instagram"></i></a>
                    <a href="<?php echo get_option('twitter'); ?>"><i class="icon fab fa-twitter"></i></a>
                    <a href="<?php echo get_option('facebook'); ?>"><i class="icon fab fa-facebook-f"></i></a>
                    <?php if( is_user_logged_in() ){ ?>
                        <a href="<?php echo home_url( 'logout' ); ?>">Logout</a>
                    <?php } else { ?>
                        <a href="<?php echo home_url( 'login' ); ?>">Employee Login</a>
                    <?php } ?>
                </div>
                <div class="footer__text">
                    <div class="footer__contact">
                        <h4>Main Office</h4>
                        <p><i class="icon fas fa-map-marker-alt"></i>  <span class="footer__address"><?php echo get_option('address'); ?></span></p>
                        <p><a href="tel:<?php echo get_option('phone'); ?>"><i class="icon fas fa-phone"></i>  <span class="footer__phone"><?php echo get_option('phone'); ?></span></a></p>
                        <p><a href="mailto:<?php echo get_option('email'); ?>"><i class="icon fas fa-envelope"></i>  <span class="footer__email"><?php echo get_option('email'); ?></span></a></p>
                    </div>
                    <div class="footer__misc">
                        <h4><a href="contact">Visit our<br/>Contact Us page</a></h4>
                        <p>Reach Out to Us</p>
                        <p>Bid Inquiries</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="footer__menu">
                <?php 
                wp_nav_menu( array(
                    'theme_location'    =>  'footer_menu',
                    'menu_class'        =>  'navbar__nav',
                    'walker'            =>  new Custom_Nav_Walker()
                ) ); ?>
            </div>
            <div class="container container--thin">
                <div class="footer__copyright">
                    <p>&copy; <?php echo date('Y'); ?> Collins Contracting Company, Inc.</p>
                    <p>Website designed by <a href="http://childressagency.com/" ?>The Childress Agency</a></p>
                </div>
            </div>
        </div>
    </footer>
    
    <?php wp_footer(); ?>
</body>
</html>