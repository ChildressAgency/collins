
    <footer class="footer">
        <div class="footer__top">
            <img class="footer__logo" src="<?php echo get_option('header_logo'); ?>" alt="logo">
            <div class="footer__info">
                <div class="footer__social">
                    <a href="#_"><i class="icon fab fa-instagram"></i></a>
                    <a href="#_"><i class="icon fab fa-twitter"></i></a>
                    <a href="#_"><i class="icon fab fa-facebook-f"></i></a>
                    <a href="#_">Employee Login</a>
                </div>
                <div class="footer__text">
                    <div class="footer__contact">
                        <h4>Main Office</h4>
                        <p><i class="icon fas fa-map-marker-alt"></i>  <span class="footer__address">1 Collins Drive<br/>Fredericksburg, VA 22408</span></p>
                        <p><i class="icon fas fa-phone"></i>  <span class="footer__phone">(540) 898-1166</span></p>
                        <p><i class="icon fas fa-envelope"></i>  <span class="footer__email">info@collinscc.com</span></p>
                    </div>
                    <div class="footer__misc">
                        <h4>Visit our<br/>Contact Us page</h4>
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