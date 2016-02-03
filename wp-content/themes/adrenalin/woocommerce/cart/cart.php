<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.8
 */
if ( !defined( 'ABSPATH' ) )
    exit; // Exit if accessed directly

global $woocommerce;
wc_print_notices();

do_action( 'woocommerce_before_cart' );
?>
<?php  $page_id = get_the_id();?>
<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">
    <?php do_action( 'woocommerce_before_cart_table' ); ?>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="main-cart-wrap">
                <table class="shop_table cart" cellspacing="0">
                    <thead>
                        <tr>
                            	<th class="product-name" colspan="3"><?php _e( 'Product', 'woocommerce' ); ?></th>
                                <th class="product-price"><?php _e( 'Price', 'woocommerce' ); ?></th>
                                <th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
                                <th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                        <?php
						 $mtot = 0;
                        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                            $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                             $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                ?>
                                <tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                                    <td class="product-remove">
                                        <?php
                                        echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
                                        ?>
                                    </td>

                                    <td class="product-thumbnail">
                                        <?php
                                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                        if ( !$_product->is_visible() )
                                            echo $thumbnail;
                                        else
                                         echo  '<div class="mycartcredits">'. $credits_amount =  get_post_meta($product_id ,'_credits_amount' , true ).'</div>'
										  
										   // printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
                                        ?>
                                    </td>



<?php

  $credits_amount =  get_post_meta($product_id ,'_credits_amount' , true );
  $mtot = $mtot + $credits_amount;
 
 
 
?>
                                    <td class="product-name">
                                        <?php
                                        if ( !$_product->is_visible() )
                                         
										    echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                                        else
                                           
										  
										    echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );

                                        // Meta data
                                        echo WC()->cart->get_item_data( $cart_item );

                                        // Backorder notification
                                        if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
                                            echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
                                        ?>
                                    </td>

                                    <td class="product-price">
                                        <?php
                                        echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                        ?>
                                    </td>

                                    <td class="product-quantity">
                                        <?php
                                        if ( $_product->is_sold_individually() ) {
                                            $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                        } else {
                                            $product_quantity = woocommerce_quantity_input( array(
                                                'input_name' => "cart[{$cart_item_key}][qty]",
                                                'input_value' => $cart_item['quantity'],
                                                'max_value' => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                                    ), $_product, false );
                                        }

                                        //echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
                                        echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item )
                                        ?>
                                    </td>

                                    <td class="product-subtotal">
                                        <?php
                                        echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }

                        do_action( 'woocommerce_cart_contents' );
                        ?>

                        <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                    </tbody>
                </table>
            </div><!-- /main cart wrap -->
            
            
            
           <div class="mtotalcredits"> <?php echo $mtot . ' credits ';?></div>
            <?php do_action( 'woocommerce_after_cart' ); ?>
        </div><!--/8 -->
		<?php  $page_id = get_the_id();?>
        <div class="col-lg-4 col-md-4 col-sm-4 color-extera">

            <div class="cart-collaterals">
                <?php woocommerce_cart_totals(); ?>

<?php $updatestr = get_str_updatecart();?>
<?php $checkoutstr = get_str_checkout();?>

                <input type="submit" class="button update-button" name="update_cart" value="<?php _e( $updatestr, 'commercegurus' ); ?>" /> 
				<input type="submit" class="button checkout-button cart-check " name="proceed" value="<?php _e( $checkoutstr, 'commercegurus' ); ?>" />

                <?php //do_action( 'woocommerce_proceed_to_checkout' ); ?>

                <?php wp_nonce_field( 'woocommerce-cart' ); ?>

                <?php if ( $woocommerce->cart->coupons_enabled() ) { ?>
                    <div class="coupon">
                        <h3 class="widget-title"><?php _e( 'Coupon', 'woocommerce' ); ?></h3>
                        <input type="text" name="coupon_code"  id="coupon_code" value="" placeholder="<?php _e( 'Enter Coupon', 'commercegurus' ); ?>"/> 
                        <input type="submit" class="button small expand" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'commercegurus' ); ?>" />
                        <?php do_action( 'woocommerce_cart_coupon' ); ?>

                    </div>
                <?php } ?>

                <?php //woocommerce_shipping_calculator(); ?>
            </div>
        </div><!--/4 -->
    </div><!--/row -->
    <?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>
<?php if($page_id == '66589'){?>
<div class="mycredit"><strong> <?php echo get_str_yourcredit();?> </strong></div>
<div class="mycredit1"><?php echo do_shortcode('[usercreditwoocommerce]');?></div>
<?php }?>
<!----   by ayaz custom code 06/10/2015 ----->

<?php if($page_id == '7' || $page_id == '66770' || $page_id == '66771') {?>
<div class=""><?php echo do_shortcode('[creditwoocommerce]');?></div>
<?php }?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <!-- Cross Sells -->
        <?php do_action( 'woocommerce_cart_collaterals' ); ?>
    </div><!--/12 -->
</div><!--/row -->

