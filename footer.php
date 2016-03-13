<footer>
    <div class="container clear">
        <nav class="nav-footer">
            <?php
            $args = array(
                'theme_location' => 'footer'
            );
            ?>
            <?php wp_nav_menu( $args); ?>
        </nav>

        <ul class="social-links-menu">
            <li><a href='<?php echo get_theme_mod('twitter'); ?>'><span class="fa fa-twitter"></span></a></li>
            <li><a href='<?php echo get_theme_mod('facebook'); ?>'><span class="fa fa-facebook"></span></a></li>
            <li><a href='<?php echo get_theme_mod('pinterest'); ?>'><span class="fa fa-pinterest-p"></span></a></li>
            <li><a href='<?php echo get_theme_mod('google'); ?>'><span class="fa fa-google-plus"></span></a></li>
        </ul>

        <span class="copyright">© Copyright 2013 DesignerFirst.com</span>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>