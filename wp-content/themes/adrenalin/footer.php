<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package commercegurus
 */
global $cg_options;
$cg_below_body_widget = '';
$cg_below_body_widget = $cg_options['cg_below_body_widget'];
$cg_footer_message = '';
$cg_footer_message = $cg_options['cg_footer_message'];
$cg_footer_top_active = '';
$cg_footer_top_active = $cg_options['cg_footer_top_active'];
$cg_footer_bottom_active = '';
$cg_footer_bottom_active = $cg_options['cg_footer_bottom_active'];
$cg_footer_cards_display = '';
$cg_footer_cards_display = $cg_options['cg_show_credit_cards'];
$cg_back_to_top = '';
$cg_back_to_top = $cg_options['cg_back_to_top'];

function display_card( $card, $status ) {
    if ( $card == '1' and $status == '1' ) {
        echo do_shortcode( '[cg_card type="visa"]' );
    }
    if ( $card == '2' and $status == '1' ) {
        echo do_shortcode( '[cg_card type="mastercard"]' );
    }
    if ( $card == '3' and $status == '1' ) {
        echo do_shortcode( '[cg_card type="paypal"]' );
    }
    if ( $card == '4' and $status == '1' ) {
        echo do_shortcode( '[cg_card type="amex"]' );
    }
}
?>
<div class="custom-fotter-main">
    <footer class="footercontainer" role="contentinfo">
        
        <div class="footer">
            <div class="custom-footer-top custom-fotter-lang">
                <div class="container">
                    <div class="row">
                        <div class="custom-lang-logo">
                            <div class="custom-lang">
                                <div class="custom-lang-select">
                                    <?php languages_select_footer(); ?>
                                </div>
                            </div>
                            <?php if ( $cg_below_body_widget == 'yes' ) { ?>
                                <section class="below-body-widget-area custom-footer-logo">
                                    <?php if ( is_active_sidebar( 'below-body' ) ) { ?>
                                        <?php dynamic_sidebar( 'below-body' ); ?>  
                                    <?php } ?>
                                </section>
                            <?php } ?>
                        </div>

                        <div class="custom-menu-links">
                            <?php if ( $cg_footer_bottom_active == 'yes' ) { ?>
                                <?php if ( is_active_sidebar( 'first-footer' ) ) : ?>
                                    <div class="subfooter">
                                        <?php dynamic_sidebar( 'first-footer' ); ?>
                                    </div><!-- /.subfooter -->
                                <?php endif; ?>
                            <?php } ?>
                        </div>


                        <div class="custom-credit-cards"><?php
                            if ( class_exists( 'CGToolKit' ) ) {
                                if ( $cg_footer_cards_display == 'show' ) {
                                    echo '<div class="footer-credit-cards">';
                                    print '<h4>'. get_card_title() .'</h4>';
                                    $cg_card_array = ($cg_options['cg_show_credit_card_values']);
                                    foreach ( $cg_card_array as $card => $status ) {
                                        display_card( $card, $status );
                                    }
                                    echo '</div>';
                                }
                            }
                        ?></div>
                    </div>

                </div>
            </div>
            <div class="custom-footer-bottom">
                <div class="fotter-social">
                    <?php if ( $cg_footer_bottom_active == 'yes' ) { ?>
                        <?php if ( is_active_sidebar( 'second-footer' ) ) : ?>
                            <div class="subfooter">
                                <div class="container">
                                    <div class="row">
                                        <?php dynamic_sidebar( 'second-footer' ); ?>            
                                    </div><!-- /.row -->
                                </div><!-- /.container -->
                            </div><!-- /.subfooter -->
                        <?php endif; ?>
                    <?php } ?>
                </div>
                <div class="footer-copyright"> <?php
                    if ( $cg_footer_message ) {
                        echo '<div class="footer-copyright">';
                        echo $cg_footer_message;
                        echo '</div>';
                    }
                ?></div>
            </div>
        </div>
    </footer>
</div>



</div><!--/wrapper-->

</div><!-- close #cg-page-wrap -->

<?php
global $cg_live_preview;
if ( isset( $cg_live_preview ) )
    include("live-preview.php")
    ?>
<?php wp_footer(); ?>

<?php get_template_part('trash' ,'closed-project' ); ?>
</body>
</html>

