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

if ( $cg_below_body_widget == 'yes' ) {
    ?>
    <section class="below-body-widget-area">
        <div class="container">
            <?php if ( is_active_sidebar( 'below-body' ) ) { ?>
                <?php dynamic_sidebar( 'below-body' ); ?>  
            <?php } ?>
        </div>
    </section>
<?php } ?>

<footer class="footercontainer" role="contentinfo"> 
    <?php if ( $cg_footer_top_active == 'yes' ) { ?>
        <?php if ( is_active_sidebar( 'first-footer' ) ) : ?>
            <div class="lightwrapper">
                <div class="container">
                    <div class="row">
                        <?php dynamic_sidebar( 'first-footer' ); ?>   
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.lightwrapper -->
        <?php endif; ?>
    <?php } ?>

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

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="bottom-footer-left">
				<?php $upload_dir = wp_upload_dir();?>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><img src="<?php echo $upload_dir['baseurl']; ?>/icon/footer-logo.png" /></div>
				
				
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				
				<div class="foote-nav">
				
				
				 <?php
			
				$defaults = array(
				'theme_location'  => '',
				'menu'            => 'Home Menus',
				'container'       => 'div',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'menu',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
				);

			
			?>
			
			<?php wp_nav_menu( $defaults ); ?>
						
				</div>
				
				<div class="copy-right">
				
				<div class="footer-credit-cards">
				
				 <?php
                    if ( class_exists( 'CGToolKit' ) ) {
                        if ( $cg_footer_cards_display == 'show' ) {
                            echo '<div class="footer-credit-cards">';
                            $cg_card_array = ($cg_options['cg_show_credit_card_values']);
                            foreach ( $cg_card_array as $card => $status ) {
                                display_card( $card, $status );
                            }
                            echo '</div>';
                        }
                    }
                    ?>
				
				
				
				</div><div class="footer-copyright"> <?php
                    if ( $cg_footer_message ) {
                        echo '<div class="footer-copyright">';
                        echo $cg_footer_message;
                        echo '</div>';
                    }
                    ?></div>
				
				</div>
				
				<div class="multi-lang"><?php dynamic_sidebar('multilanguage');?></div>
				
				</div>
				
				 </div>
 				
				
				
				
				
				
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer -->
    <?php if ( $cg_back_to_top == 'yes' ) { ?>
        <a href="#0" class="cd-top">Top</a>
    <?php } ?>
</footer>
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

