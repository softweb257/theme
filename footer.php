
<footer class="site-footer">
    <div class="footer_top">
        <div class="custom_container ">
            <div class="newsletter_form">
                <h3>Subscribe to Our Newsletter</h3>
                <?php echo do_shortcode('[newsletter_form form="1"]');?>
            </div>
        </div>
        <div class="custom_container"> 
            <div class="custom_row">
                <div class="col-4 box">
                    <div class="footer_logo_box">
                        <div class="left_side">
                            <?php if ( is_active_sidebar( 'footer-logo' ) ) { ?>
                                <?php dynamic_sidebar( 'footer-logo' ); ?>
                            <?php } ?>
                        </div>
                        <div class="right_side" >
                             <?php if ( is_active_sidebar( 'footer-address' ) ) { ?>
                                <?php dynamic_sidebar( 'footer-address' ); ?>
                            <?php } ?>
                            <?php if ( is_active_sidebar( 'footer-property' ) ) { ?>
                                <?php dynamic_sidebar( 'footer-property' ); ?>
                            <?php } ?>
                        </div>
                    </div>
                   
                </div>
                <div class="col-3 box ">

                    <?php if ( is_active_sidebar( 'footer-phone' ) ) { ?>
                        <?php dynamic_sidebar( 'footer-phone' ); ?>
                    <?php } ?>

                    <?php if ( is_active_sidebar( 'footer-mallorca-one' ) ) { ?>
                        <?php dynamic_sidebar( 'footer-mallorca-one' ); ?>
                    <?php } ?>
                    
                </div>
                <div class="col-2 box ">
                    <?php if ( is_active_sidebar( 'footer-cet' ) ) { ?>
                        <?php dynamic_sidebar( 'footer-cet' ); ?>
                    <?php } ?>

                    <?php if ( is_active_sidebar( 'footer-email' ) ) { ?>
                        <?php dynamic_sidebar( 'footer-email' ); ?>
                    <?php } ?>
                   
                    <?php if ( is_active_sidebar( 'footer-mallorca-new') ) { ?>
                        <?php dynamic_sidebar( 'footer-mallorca-new'); ?>
                    <?php } ?>
                </div>
                <div class="col-2 box ">
                    <?php if ( is_active_sidebar( 'footer-follow-link') ) { ?>
                        <?php dynamic_sidebar( 'footer-follow-link'); ?>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <div class="footer_bootom">
        <div class="container">          
            <?php $copy_right = get_theme_mod('copy_right');
                if($copy_right) { ?>
                   <p> <?php echo $copy_right; ?></p>
                    <?php } ?>
        </div>
    </div>         
</footer>
<?php wp_footer(); ?>
</body>

</html>