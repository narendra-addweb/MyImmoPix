<?php
/**
 * The theme header
 *
 * */
global $cg_options;
$user_ID = get_current_user_id(); 
$protocol = (!empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https:" : "http:";

$cg_responsive_status = '';

if ( isset( $cg_options['cg_responsive'] ) ) {
    $cg_responsive_status = $cg_options['cg_responsive'];
}

$cg_logo = '';

$cg_favicon = '';

if ( isset( $cg_options['cg_favicon']['url'] ) ) {
    $cg_options['cg_favicon']['url'] = $protocol . str_replace( array( 'http:', 'https:' ), '', $cg_options['cg_favicon']['url'] );
    $cg_favicon = $cg_options['cg_favicon']['url'];
}

$cg_retina_favicon = '';

if ( isset( $cg_options['cg_retina_favicon']['url'] ) ) {
    $cg_options['cg_retina_favicon']['url'] = $protocol . str_replace( array( 'http:', 'https:' ), '', $cg_options['cg_retina_favicon']['url'] );
    $cg_retina_favicon = $cg_options['cg_retina_favicon']['url'];
}

$cg_topbar_display = '';

if ( isset( $cg_options['cg_topbar_display'] ) ) {
    $cg_topbar_display = $cg_options['cg_topbar_display'];
}

$cg_topbar_message = '';

if ( isset( $cg_options['cg_topbar_message'] ) ) {
    $cg_topbar_message = $cg_options['cg_topbar_message'];
}

$cg_display_cart = '';

if ( isset( $cg_options['cg_show_cart'] ) ) {
    $cg_display_cart = $cg_options['cg_show_cart'];
}

$cg_catalog = '';

if ( isset( $cg_options['cg_catalog_mode'] ) ) {
    $cg_catalog = $cg_options['cg_catalog_mode'];
}

$cg_primary_menu_layout = '';

if ( isset( $cg_options['cg_primary_menu_layout'] ) ) {
    $cg_primary_menu_layout = $cg_options['cg_primary_menu_layout'];
}

$cg_sticky_menu = '';

if ( isset( $cg_options['cg_sticky_menu'] ) ) {
    $cg_sticky_menu = $cg_options['cg_sticky_menu'];
}

if ( !empty( $_SESSION['cg_header_top'] ) ) {
    $cg_topbar_display = $_SESSION['cg_header_top'];
}

$shop_announcements = '';

if ( isset( $cg_options['cg_shop_announcements'] ) ) {
    $shop_announcements = $cg_options['cg_shop_announcements'];
}

$logo_position = '';

if ( isset( $cg_options['cg_logo_position'] ) ) {
    $logo_position = $cg_options['cg_logo_position'];
}

?>
<?php //echo 'aaaa'.$user_ID = get_current_user_id(); ?> 
<!DOCTYPE html>
<!--[if IE 9 ]><html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <?php
        if ( $cg_responsive_status == 'enabled' ) {
            ?>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php } ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">  
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,200,100,500,600,700,800,900' rel='stylesheet' type='text/css'>      
        <link rel="shortcut icon" href="<?php
        if ( $cg_favicon ) {
            echo $cg_favicon;
        } else {
            ?><?php echo get_template_directory_uri(); ?>/favicon.png<?php } ?>"/>

        <link rel="shortcut icon" href="<?php
        if ( $cg_retina_favicon ) {
            echo $cg_retina_favicon;
        } else {
            ?><?php echo get_template_directory_uri(); ?>/apple-touch-icon-precomposed.png<?php } ?>"/>
       <!--[if lte IE 9]><script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script><![endif]-->
        <?php wp_head(); ?>
		
		<script>
		
			jQuery(window).scroll(function () {
			if (jQuery(document).scrollTop() == 0) {
			jQuery('.cg-menu-below').removeClass('tiny');
			} else {
			
			var scrollp = jQuery(window).scrollTop();
			if(scrollp>100)
			jQuery('.cg-menu-below').addClass('tiny');
			
			}
			});
		
		</script>
    </head>
	<?php
	if(ICL_LANGUAGE_CODE == 'fr')
	$mycls = "frcls"; 
	else if(ICL_LANGUAGE_CODE == 'nl')
	$mycls = "nlcls"; 
	else if(ICL_LANGUAGE_CODE == 'en')
	$mycls = "encls"; 
	?>
	
    <body id="skrollr-body" <?php body_class($mycls); ?>>
        <div id="wrapper">
            <div class="cg-shopping-toolbar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6 wpml">
                            <?php if ( is_active_sidebar( 'top-bar-left' ) ) : ?>
                                <?php dynamic_sidebar( 'top-bar-left' ); ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 visible-lg top-bar-right">
                            <?php if ( is_active_sidebar( 'top-bar-right' ) ) : ?>
                                <?php dynamic_sidebar( 'top-bar-right' ); ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 visible-md visible-sm visible-xs mobile-search">
                            <?php if ( is_active_sidebar( 'mobile-search' ) ) : ?>
                                <?php dynamic_sidebar( 'mobile-search' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if ( $logo_position == 'left' ) {
            ?>
            <!-- Default Logo to the left with menu below -->
            <div class="cg-menu-below">
                <div class="container">
                    <div class="cg-logo-cart-wrap">
                        <div class="cg-logo-inner-cart-wrap">
                            <div class="row">
                                <div class="remove-container">
                                    <div class="cg-wp-menu-wrapper">
                                        <?php
                                        if ( $cg_responsive_status !== 'disabled' ) { ?>
                                        <div id="load-mobile-menu">
                                        </div>
                                        <?php } ?>
                                        
                                        <div class="col-lg-4 col-md-4 pull-right"><div class="cg-header-search visible-lg">
                                        
                                            
											<?php if(empty($user_ID)){?>
											<div class="login-area">
												
													<div class="fleft"><a href="<?php echo get_bloginfo('url').'/credit/';?>"><button type="button" class="btn btn-danger mbtnc"><?php echo get_str_buycredit();?></button></a> </div>
													<div class="signupcls"><?php dynamic_sidebar('homesignup');?></div>
													<div class="logincls"><?php dynamic_sidebar('homelogin'); ?> </div>
												
												</div>
							
							<?php }?>
							
							
											<?php if($user_ID>0){?>
											<?php $name = get_user_name_string($user_ID);?> 
                                                <div class="seactbox"><select class="selectpicker" name="userbox" id="userid" onChange="location = this.options[this.selectedIndex].value;">
                                                <option><?php echo $name;?></option>
                                                <option value=""><?php echo do_shortcode('[usercreditwoocommerce]');?>  <?php echo get_str_credit();?> </option>
                                                <option value="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') );?>">
                                                <?php echo get_str_profilesettings();?></option>
												
												
												<?php
													if(ICL_LANGUAGE_CODE == 'fr')
													{
													$uploadlink = "multiple-upload-fr";
													$myprojectslink = "project-fr";
													}
													else if(ICL_LANGUAGE_CODE == 'nl')
													{
													$uploadlink = "multiple-upload-dutch";
													$myprojectslink = "project-dutch";
													}
													else if(ICL_LANGUAGE_CODE == 'en')
													{
													$uploadlink = "multiple-upload-en";
													$myprojectslink = "project-en";
													}
												?>
												
												<option value="<?php echo get_bloginfo('url');?>/<?php echo $uploadlink;?>"><?php echo get_str_uploadphoto();?></option>
												<option value="<?php echo get_bloginfo('url');?>/<?php echo $myprojectslink;?>"><?php echo get_str_myproject();?></option>
												<option value="<?php echo get_bloginfo('url');?>/contact-us"><?php echo get_str_contactus();?></option>
                                                <option value="<?php echo wp_logout_url( home_url() );?>"><?php echo get_str_logout();?></option>
                                                </select></div>
                            				<?php } ?>
                                        </div></div>
										
										
										
										
                                        <?php
                                        if ( !empty( $cg_options['site_logo']['url'] ) ) {
                                            $cg_options['site_logo']['url'] = $protocol . str_replace( array( 'http:', 'https:' ), '', $cg_options['site_logo']['url'] );
                                            $cg_logo = $cg_options['site_logo']['url'];
                                        }

                                        if ( !empty( $_SESSION['cg_skin_color'] ) ) {
                                            $cg_skin_color = $_SESSION['cg_skin_color'];
                                            if ( $cg_skin_color == '#DF440B' ) {
                                                $cg_logo = CG_THEMEURI . '/images/logo_red.png';
                                            } elseif ( $cg_skin_color == '#1e73be' ) {
                                                $cg_logo = CG_THEMEURI . '/images/logo_blue.png';
                                            } elseif ( $cg_skin_color == '#208e3c' ) {
                                                $cg_logo = CG_THEMEURI . '/images/logo_green.png';
                                            } elseif ( $cg_skin_color == '#9b3b85' ) {
                                                $cg_logo = CG_THEMEURI . '/images/logo_purple.png';
                                            }
                                        }

                                        if ( $cg_logo ) {
                                            $cg_logo_width = $cg_options['site_logo']['width'];
                                            $cg_logo_max_width = $cg_logo_width / 2;
                                            ?>

                                       <div class="col-lg-8 col-md-8">     
									  		<div class="logo image">
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                    <span class="helper"></span>
                                                    <img src="<?php echo $cg_logo; ?>" style="max-width: <?php echo $cg_logo_max_width; ?>px;" alt="<?php bloginfo( 'name' ); ?>"/>
                                                </a>
                                                <div class="logotxt">
                                                    <!--------better photos better sale ---------------->
                                                    <div class="logoslogan"><?php echo get_str_slogan();?></div>
                                                </div>
                                            </div>
											
											
											
											<?php //if(is_front_page() || is_home()){?>
                                            <?php if(true){?>
											<div class="homemenu">
												
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
											
									  
									  
									  		 <?php }?>
									  
									  
									  	<?php //if ( $shop_announcements == 'enabled' ) { ?>
                                        <?php if ( false ) { ?>

                                                <div class="cg-announcements">
                                                    <div class="divider"></div>
                                                    <ul class="cg-show-announcements">
                                                       
													    <?php if(!is_front_page() && !is_home()){?>
														<?php cg_get_announcements();} ?>
														
														
                                                    </ul>
                                                </div>
												
												
											<?php if(!is_front_page() && !is_home()){ ?>
												 <div class="clstxt">
                                                   <!--------better photos better sale ---------------->
												    <div class="bettersale"><?php echo get_str_slogan();?></div>
                                                   
                                                </div>
												<?php }?>
												
												
												
												
												

                                            <?php } ?>
                                            </div>
                                        <?php } else { ?>
                                            <div class="logo text-logo">
                                                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                            </div>
                                            <?php if ( $shop_announcements == 'enabled' ) { ?>
                                                <div class="cg-announcements">
                                                    <div class="divider"></div>
                                                    <ul class="cg-show-announcements">
                                                         <?php if(!is_front_page() || !is_home())?>
														<?php cg_get_announcements(); ?>
                                                    </ul>
                                                </div>

                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div><!--/container -->
                            </div><!--/row -->
                        </div><!--/cg-logo-inner-cart-wrap -->
                    </div><!--/cg-logo-cart-wrap -->
                </div><!--/container -->
            </div><!--/cg-menu-below -->
            <?php } else if ( $logo_position == 'center' ) { ?>
            <!-- Center Logo with menu below -->
            <div class="cg-menu-below cg-logo-center">
                <div class="container">
                    <div class="cg-logo-cart-wrap">
                        <div class="cg-logo-inner-cart-wrap">
                            <div class="row">
                                <div class="container">
                                    <div class="cg-wp-menu-wrapper">
                                        <div id="load-mobile-menu">
                                        </div>
                                        
                                        <div class="multi-lang">gfffffffffffff</div>
										
                                        <div class="cg-header-search visible-lg">
                                        
                                            <?php if ( is_active_sidebar( 'header-search' ) ) : ?>
                                                <?php dynamic_sidebar( 'header-search' ); ?>
                                            <?php endif; ?>
                                      
										</div>
                                        <?php
                                        if ( !empty( $cg_options['site_logo']['url'] ) ) {
                                            $cg_options['site_logo']['url'] = $protocol . str_replace( array( 'http:', 'https:' ), '', $cg_options['site_logo']['url'] );
                                            $cg_logo = $cg_options['site_logo']['url'];
                                        }

                                        if ( !empty( $_SESSION['cg_skin_color'] ) ) {
                                            $cg_skin_color = $_SESSION['cg_skin_color'];
                                            if ( $cg_skin_color == '#DF440B' ) {
                                                $cg_logo = CG_THEMEURI . '/images/logo_red.png';
                                            } elseif ( $cg_skin_color == '#1e73be' ) {
                                                $cg_logo = CG_THEMEURI . '/images/logo_blue.png';
                                            } elseif ( $cg_skin_color == '#208e3c' ) {
                                                $cg_logo = CG_THEMEURI . '/images/logo_green.png';
                                            } elseif ( $cg_skin_color == '#9b3b85' ) {
                                                $cg_logo = CG_THEMEURI . '/images/logo_purple.png';
                                            }
                                        }

                                        if ( $cg_logo ) {
                                            $cg_logo_width = $cg_options['site_logo']['width'];
                                            $cg_logo_max_width = $cg_logo_width / 2;
                                            ?>

                                            <div class="logo image">
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                    <span class="helper"></span><img src="<?php echo $cg_logo; ?>" style="max-width: <?php echo $cg_logo_max_width; ?>px;" alt="<?php bloginfo( 'name' ); ?>"/></a>
                                            </div>
                                            <?php if ( $shop_announcements == 'enabled' ) { ?>

                                                <div class="cg-announcements">
                                                    <div class="divider"></div>
                                                    <ul class="cg-show-announcements">
                                                        <?php if(!is_front_page() && !is_home()){?>
														<?php cg_get_announcements(); ?>
														<?php }?>
                                                    </ul>
                                                </div>

                                            <?php } ?>
                                        <?php } else { ?>
                                            <div class="logo text-logo">
                                                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                            </div>
                                            <?php if ( $shop_announcements == 'enabled' ) { ?>
                                                <div class="cg-announcements">
                                                    <div class="divider"></div>
                                                    <ul class="cg-show-announcements">
                                                        
														<?php if(!is_front_page() && !is_home()){?>
														<?php cg_get_announcements(); ?>
														<?php }?>
                                                    </ul>
                                                </div>

                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div><!--/container -->
                            </div><!--/row -->
                        </div><!--/cg-logo-inner-cart-wrap -->
                    </div><!--/cg-logo-cart-wrap -->
                </div><!--/container -->
            </div><!--/cg-menu-below -->
            <?php } ?>


			
            <div class="cg-primary-menu cg-wp-menu-wrapper cg-primary-menu-below-wrapper">
                <div class="container">
                    <div class="row">
					
							
							

					<?php //if(!is_front_page() && !is_home() && $user_ID>0){?>
                    <?php if(false){?>		
					<div class="col-lg-6 col-md-6">
                        
						<?php $pageid = get_the_id();?>
						
						<div class="container my-main-menu">
                            <?php if ( has_nav_menu( 'primary' ) ) { ?>
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'primary',
									'before' => '',
                                    'after' => '',
                                    'link_before' => '',
                                    'link_after' => '',
                                    'depth' => 4,
                                    'container' => 'div',
                                    'container_class' => 'cg-main-menu',
                                    'fallback_cb' => false,
                                    'walker' => new primary_cg_menu() )
                                );
                                ?>
                            <?php } else { ?>
                                <p class="setup-message">You can set your main menu in <strong>Appearance &gt; Menus</strong></p>
                            <?php } ?>
                            <?php if ( $cg_display_cart !== 'no' ) { ?>
                                <?php if ( $cg_catalog == 'disabled' ) { ?>
                                    <div class="cart-wrap">
                                        <?php 
                                        if ( class_exists( 'WooCommerce' ) ) {
                                            ?>
                                            <?php echo cg_woocommerce_cart_dropdown(); ?>
                                        <?php }
                                        ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
						
						</div>
						<?php }?>
						
                    </div>
                </div>
            </div>
            <!-- close primary menu below logo layout -->
            <?php
            if ( $cg_sticky_menu == 'yes' ) {
                ?>
                <!--FIXED -->
                <div class="cg-header-fixed-wrapper">
                    <div class="cg-header-fixed">
                        <div class="container">
                            <div class="cg-wp-menu-wrapper">
                                <div class="cg-primary-menu">
                                    <div class="row">
                                        <div class="container">
                                            <div class="cg-wp-menu-wrapper">
                                                <?php if ( $cg_display_cart !== 'no' ) { ?>
                                                    <?php if ( $cg_catalog == 'disabled' ) { ?>
                                                        <div class="cart-wrap">
                                                            <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                                                                ?>
                                                                <?php echo cg_woocommerce_cart_dropdown(); ?>
                                                            <?php }
                                                            ?>
                                                        </div>
                                                    <?php } ?>
                                                <?php } ?>

                                                <?php
                                                if ( isset( $cg_options['site_logo']['url'] ) ) {
                                                    $cg_options['site_logo']['url'] = $protocol . str_replace( array( 'http:', 'https:' ), '', $cg_options['site_logo']['url'] );
                                                    $cg_logo = $cg_options['site_logo']['url'];
                                                }

                                                if ( $cg_logo ) {
                                                    $cg_logo_width = $cg_options['site_logo']['width'];
                                                    $cg_logo_max_width = $cg_logo_width / 2;
                                                    ?>

                                                    <div class="logo image">
                                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="max-width: <?php echo $cg_logo_max_width; ?>px;">
                                                            <span class="helper"></span><img src="<?php echo $cg_logo; ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="logo text-logo">
                                                        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                                    </div>
                                                <?php } ?>
												
												
												
												
												
												
												<?php //if(is_front_page() || is_home() ){ ?>
                                                <?php if(true){ ?>
												
												<div class="homemenu">
												
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
												
												<?php }else{ ?>
												
												
    												 <?php if ( has_nav_menu( 'primary' ) ) { ?>
                                                        <?php
                                                        wp_nav_menu( array(
                                                            'theme_location' => 'primary',
                                                            'before' => '',
                                                            'after' => '',
                                                            'link_before' => '',
                                                            'link_after' => '',
                                                            'depth' => 4,
                                                            'fallback_cb' => false,
                                                            'walker' => new primary_cg_menu() )
                                                        );
                                                        ?>
                                                    <?php } else { ?>
                                                        <p class="setup-message">You can set your main menu in <strong>Appearance &gt; Menus</strong></p>
                                                    <?php }
                                                } ?>
                                            </div><!--/cg-wp-menu-wrapper -->
                                        </div><!--/container -->
                                    </div><!--/row -->
                                </div><!--/cg-primary-menu -->
                            </div><!--/cg-wp-menu-wrapper -->
                        </div><!--/container -->
                    </div><!--/cg-header-fixed -->
                </div><!--/cg-header-fixed-wrapper. -->
            <?php }
            ?>
            <?php
            if ( $cg_responsive_status !== 'disabled' ) {
            ?>
            <div id="mobile-menu">
                <a id="skip" href="#cg-page-wrap" class="hidden" title="<?php esc_attr_e( 'Skip to content', 'commercegurus' ); ?>"><?php _e( 'Skip to content', 'commercegurus' ); ?></a> 
                <?php
                if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'mobile' ) ) {
                    wp_nav_menu( array( 'theme_location' => 'mobile', 'container' => 'ul', 'menu_id' => 'mobile-cg-mobile-menu', 'menu_class' => 'mobile-menu-wrap', 'walker' => new mobile_cg_menu() ) );
                } elseif ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'ul', 'menu_id' => 'mobile-cg-primary-menu', 'menu_class' => 'mobile-menu-wrap', 'walker' => new mobile_cg_menu() ) );
                }
                ?>
            </div><!--/mobile-menu -->
            <?php } ?>

            <div id="cg-page-wrap" class="hfeed site">
                <?php do_action( 'before' ); ?>
                <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?> 
                    <?php if ( function_exists( 'wc_print_notices' ) ) { ?>
                        <?php
                        $cg_wc_notices = WC()->session->get( 'wc_notices', array() );
                        if ( !empty( $cg_wc_notices ) ) {
                            ?>
                            <div class="cg-wc-messages">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php wc_print_notices(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                <?php } ?>  

                <?php
                if ( function_exists( 'yoast_breadcrumb' ) && (!is_front_page() ) ) {
                    yoast_breadcrumb( '
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div><p id="breadcrumbs">', '</p></div>
                </div>
            </div>
        </div>' );
                }
                ?>
 
<!-- popp model window-->
<script>

<?php 
if(ICL_LANGUAGE_CODE == 'nl')
{
	 $val1 = 'Registreren';
	 $val2 = 'InLoggen';
}
if(ICL_LANGUAGE_CODE == 'fr')
{
	 $val1 = "S'enregistrer";
	 $val2 = "Connexion";
	
	
}
else if(ICL_LANGUAGE_CODE == 'en')
{
	$val1 = 'Sign Up';
	$val2 = "Log In";
}	
	
?>




 
jQuery(document).ready(function(){
jQuery('.signupcls a').html("<?php echo $val1?>");
jQuery('.logincls a').html("<?php echo $val2?>");

jQuery( ".menu-item-70634 a" ).click(function() {
 jQuery(".signupcls a").trigger("click");
});

jQuery( ".menu-item-70636 a" ).click(function() {
 jQuery(".signupcls a").trigger("click");
});





    







});

</script> 
<!--<script type="text/javascript" src="<?php //bloginfo('template_url'); ?>/js/example/application.js"></script>-->
<!--<script type="text/javascript" src="<?php //bloginfo('template_url'); ?>/js/example/typekit.js"></script>-->
<link rel="stylesheet" href="<?php bloginfo('url'); ?>/css/example/application.css" type="text/css" />