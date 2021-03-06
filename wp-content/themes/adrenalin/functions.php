<?php

/**
 * CommerceGurus functions and definitions
 * Maybe your best course would be to tread lightly.
 *
 * @package commercegurus
 */
global $cg_options;


/**
 * Global Paths
 */
define( 'CG_FILEPATH', get_template_directory() );
define( 'CG_THEMEURI', get_template_directory_uri() );
define( 'CG_BOOTSTRAP_JS', get_template_directory_uri() . '/inc/core/bootstrap/dist/js' );
define( 'CG_JS', get_template_directory_uri() . '/js' );
define( 'CG_CORE', get_template_directory() . '/inc/core' );


/**
 * Constants for Plugins
 */
define( 'ULTIMATE_USE_BUILTIN', true );


/**
 * Load Globals
 */
require_once(CG_CORE . '/functions/javascript.php');
require_once(CG_CORE . '/functions/get-the-image.php');
require_once(CG_CORE . '/menus/wp_bootstrap_navwalker.php');
require_once(CG_CORE . '/menus/megadropdown.php');


/**
 * TGM Plugin Activation
 */
//require_once (CG_CORE . '/functions/class-tgm-plugin-activation.php');
require_once (CG_CORE . '/functions/class-tgm-plugin-activation-enhanced.php');
add_action( 'tgmpa_register', 'cg_register_required_plugins' );

function cg_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        array(
            'name' => 'Advanced Custom Fields', // The plugin name
            'slug' => 'advanced-custom-fields', // The plugin slug (typically the folder name)
            'required' => true, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name' => 'Advanced Sidebar Menu', // The plugin name
            'slug' => 'advanced-sidebar-menu', // The plugin slug (typically the folder name)
            'required' => true, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name' => 'Redux Framework', // The plugin name
            'slug' => 'redux-framework', // The plugin slug (typically the folder name)
            'required' => true, // If false, the plugin is only 'recommended' instead of required
        ),        
        array(
            'name' => '4k Icons for Visual Composer - Free', // The plugin name
            'slug' => '4k-icon-fonts-for-visual-composer', // The plugin slug (typically the folder name)
            'required' => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name' => 'CommerceGurus Toolkit', // The plugin name
            'slug' => 'commercegurus-toolkit', // The plugin slug (typically the folder name)
            'source' => get_stylesheet_directory() . '/inc/plugins/commercegurus-toolkit.zip', // The plugin source
            'required' => true, // If false, the plugin is only 'recommended' instead of required
            'version' => '1.2.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name' => 'Contact Form 7', // The plugin name
            'slug' => 'contact-form-7', // The plugin slug (typically the folder name)
            'required' => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name' => 'Envato Toolkit', // The plugin name
            'slug' => 'envato-wordpress-toolkit-master', // The plugin slug (typically the folder name)
            'source' => get_stylesheet_directory() . '/inc/plugins/envato-wordpress-toolkit-master.zip', // The plugin source
            'required' => true, // If false, the plugin is only 'recommended' instead of required
            'version' => '1.6.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name' => 'Layer Slider', // The plugin name
            'slug' => 'LayerSlider', // The plugin slug (typically the folder name)
            'source' => get_stylesheet_directory() . '/inc/plugins/layersliderwp-5.3.1.installable.zip', // The plugin source
            'required' => false, // If false, the plugin is only 'recommended' instead of required
            'version' => '5.3.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name' => 'MailChimp', // The plugin name
            'slug' => 'mailchimp', // The plugin slug (typically the folder name)
            'required' => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name' => 'Regenerate Thumbnails', // The plugin name
            'slug' => 'regenerate-thumbnails', // The plugin slug (typically the folder name)
            'required' => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name' => 'WooCommerce',
            'slug' => 'woocommerce',
            'required' => true,
        ),
        array(
            'name' => 'WooSidebars', // The plugin name
            'slug' => 'woosidebars', // The plugin slug (typically the folder name)
            'required' => true, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name' => 'WPBakery Visual Composer', // The plugin name
            'slug' => 'js_composer', // The plugin slug (typically the folder name)
            'source' => get_stylesheet_directory() . '/inc/plugins/js_composer.zip', // The plugin source
            'required' => true, // If false, the plugin is only 'recommended' instead of required
            'version' => '4.3.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name' => 'YITH WooCommerce Ajax Navigation', // The plugin name
            'slug' => 'yith-woocommerce-ajax-navigation', // The plugin slug (typically the folder name)
            'required' => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name' => 'YITH WooCommerce Ajax Search', // The plugin name
            'slug' => 'yith-woocommerce-ajax-search', // The plugin slug (typically the folder name)
            'required' => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name' => 'YITH WooCommerce Wishlist', // The plugin name
            'slug' => 'yith-woocommerce-wishlist', // The plugin slug (typically the folder name)
            'required' => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name' => 'WP Retina 2x', // The plugin name
            'slug' => 'wp-retina-2x', // The plugin slug (typically the folder name)
            'required' => false, // If false, the plugin is only 'recommended' instead of required
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain' => 'commercegurus', // Text domain - likely want to be the same as your theme.
        'default_path' => '', // Default absolute path to pre-packaged plugins
        'parent_menu_slug' => 'themes.php', // Default parent menu slug
        'parent_url_slug' => 'themes.php', // Default parent URL slug
        'menu' => 'install-required-plugins', // Menu slug
        'has_notices' => true, // Show admin notices or not
        'is_automatic' => false, // Automatically activate plugins after installation or not
        'message' => '', // Message to output right before the plugins table
        'strings' => array(
            'page_title' => __( 'Install Required Plugins', '' ),
            'menu_title' => __( 'Install Plugins', 'commercegurus' ),
            'installing' => __( 'Installing Plugin: %s', 'commercegurus' ), // %1$s = plugin name
            'oops' => __( 'Something went wrong with the plugin API.', 'commercegurus' ),
            'notice_can_install_required' => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended' => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install' => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required' => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate' => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update' => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update' => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link' => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link' => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return' => __( 'Return to Required Plugins Installer', 'commercegurus' ),
            'plugin_activated' => __( 'Plugin activated successfully.', 'commercegurus' ),
            'complete' => __( 'All plugins installed and activated successfully. %s', 'commercegurus' ), // %1$s = dashboard link
            'nag_type' => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );

    tgmpa( $plugins, $config );
}

/**
 * Demo Data Installer
 */
require get_template_directory() . '/inc/radium-one-click-demo-install/init.php';

/**
 * Live Preview
 */
//$cg_live_preview = true;

if ( isset( $cg_live_preview ) ) {

    add_action( 'after_setup_theme', 'start_live_session', 1 );
    add_action( 'wp_logout', 'end_live_session' );
    add_action( 'wp_login', 'end_live_session' );

    //start live session
    if ( !function_exists( 'start_live_session' ) ) {

        function start_live_session() {
            if ( !session_id() ) {
                session_start();
            }
        }

    }

    //end live session 
    if ( !function_exists( 'end_live_session' ) ) {

        function end_live_session() {
            session_destroy();
        }

    }
}

/**
 * Load CSS
 */
function load_cg_styles() {
    global $cg_live_preview, $cg_options;

    $cg_responsive_status = '';

    if ( isset( $cg_options['cg_responsive'] ) ) {
        $cg_responsive_status = $cg_options['cg_responsive'];
    }

    wp_register_style( 'cg-bootstrap', get_template_directory_uri() . '/inc/core/bootstrap/dist/css/bootstrap.min.css' );
    wp_register_style( 'cg-commercegurus', get_template_directory_uri() . '/css/commercegurus.css' );

    if ( $cg_responsive_status !== 'disabled' ) {
        wp_register_style( 'cg-responsive', get_template_directory_uri() . '/css/responsive.css' );
    }
 
    if ( $cg_responsive_status == 'disabled' ) {
        wp_register_style( 'cg-non-responsive', get_template_directory_uri() . '/css/non-responsive.css' );
    }

    wp_enqueue_style( 'cg-style', get_stylesheet_uri() );
    wp_enqueue_style( 'cg-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', array(), '4.0.3' );
    wp_enqueue_style( 'cg-bootstrap' );
    wp_enqueue_style( 'cg-commercegurus' );

    if ( $cg_responsive_status !== 'disabled' ) {
        wp_enqueue_style( 'cg-responsive' );
    }

    if ( $cg_responsive_status == 'disabled' ) {
        wp_enqueue_style( 'cg-non-responsive' );
    }
        
    if ( isset( $cg_live_preview ) ) {
        wp_enqueue_style( 'cg-livepreviewcss', get_template_directory_uri() . '/css/livepreview.css' );
    }
}

add_action( 'wp_enqueue_scripts', 'load_cg_styles' );

// Load css from theme options.
require_once(CG_CORE . '/css/custom-css.php');


/**
 * Add Redux Framework
 */
require get_template_directory() . '/admin/admin-init.php';


/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
    vc_set_as_theme( $disable_updater = true );

    // Disable frontend editor by default - to re-enable just comment out the next line
    vc_disable_frontend();
}

// Initialising Shortcodes
if ( class_exists( 'WPBakeryVisualComposerAbstract' ) ) {

    function requireVcExtend() {
        require_once locate_template( '/customvc/vc_extend.php' );
    }

    add_action( 'init', 'requireVcExtend', 2 );

    // Set VC tpl override directory
    $vcdir = get_stylesheet_directory() . '/customvc/vc_templates/';
    vc_set_template_dir( $vcdir );

    // Remove VC nag looking for key - CommerceGurus has an extended lic.
    if ( is_admin() ) :

        function remove_vc_nag() {
            remove_meta_box( 'vc_teaser', '', 'side' );
        }

        add_action( 'admin_head', 'remove_vc_nag' );
    endif;
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if ( !function_exists( 'cg_setup' ) ) :

    function cg_setup() {

        /**
         * Translations can be filed in the /languages/ directory
         * If you're building a theme based on a commercegurus theme, use a find and replace
         * to change 'commercegurus' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'commercegurus', get_template_directory() . '/languages' );

        /**
         * Add default posts and comments RSS feed links to head
         */
        add_theme_support( 'automatic-feed-links' );

        /**
         * This theme uses wp_nav_menu() in one location.
         */
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'commercegurus' ),
            'mobile' => __( 'Mobile Menu', 'commercegurus' ),
        ) );

        /**
         * Custom Thumbnails
         */
        if ( function_exists( 'add_theme_support' ) ) {
            add_theme_support( 'post-thumbnails' );
            add_image_size( 'hp-latest-posts', 380, 160, true );
            add_image_size( 'showcase-page', 750, 450, true ); // Showcase Page thumbnail
            add_image_size( 'showcase-4col', 293, 186, true ); // Showcase 4Col thumbnail
            add_image_size( 'showcase-3col', 360, 234, true ); // Showcase 3Col thumbnail
            add_image_size( 'showcase-2col', 585, 431, true ); // Showcase 2Col thumbnail
            add_image_size( 'product-category-banner', 1140, 500, true );
        }

        /**
         * Enable support for Post Formats
         */
        add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'quote', 'link' ) );

        /**
         * Setup the WordPress core custom background feature.
         */
        //add_theme_support( 'custom-background', apply_filters( 'cg_custom_background_args', array(
        //  'default-color' => 'ffffff',
        //  'default-image' => '',
        //) ) );
    }

endif; // cg_setup
add_action( 'after_setup_theme', 'cg_setup' );


/**
 * Set WooCommerce image dimensions upon activation
 */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' )
    add_action( 'init', 'cg_woocommerce_image_dimensions', 1 );

/**
 * Define image sizes
 */
function cg_woocommerce_image_dimensions() {
    $catalog = array(
        'width' => '220', // px
        'height' => '286', // px
        'crop' => 1        // true
    );

    $single = array(
        'width' => '500', // px
        'height' => '650', // px
        'crop' => 1        // true
    );

    $thumbnail = array(
        'width' => '120', // px
        'height' => '155', // px
        'crop' => 1        // false
    );

    // Image sizes
    update_option( 'shop_catalog_image_size', $catalog );       // Product category thumbs
    update_option( 'shop_single_image_size', $single );         // Single product image
    update_option( 'shop_thumbnail_image_size', $thumbnail );   // Image gallery thumbs
}

/**
 * Register widgetized area and update sidebar with default widgets
 */
function cg_widgets_init() {

    register_sidebar( array(
        'name' => __( 'Sidebar', 'commercegurus' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'Top Toolbar - Left', 'commercegurus' ),
        'id' => 'top-bar-left',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'Top Toolbar - Right', 'commercegurus' ),
        'id' => 'top-bar-right',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'Mobile Search', 'commercegurus' ),
        'id' => 'mobile-search',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'Header Search', 'commercegurus' ),
        'id' => 'header-search',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'Shop Sidebar', 'commercegurus' ),
        'id' => 'shop-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'Below main body', 'commercegurus' ),
        'id' => 'below-body',
        'before_widget' => '<div class="row"><div id="%1$s" class="col-lg-12 %2$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'First Footer', 'commercegurus' ),
        'id' => 'first-footer',
        'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-nr-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );

    register_sidebar( array(
        'name' => __( 'Second Footer', 'commercegurus' ),
        'id' => 'second-footer',
        'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-nr-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
	
	register_sidebar( array(
        'name' => __( 'Multi Language' ),
        'id' => 'multilanguage',
        'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-nr-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
	
	register_sidebar( array(
        'name' => __( 'Sidebar Cart' ),
        'id' => 'sidebarcart',
        'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-nr-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
	
	register_sidebar( array(
        'name' => __( 'Home Login' ),
        'id' => 'homelogin',
        'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-nr-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
	
	register_sidebar( array(
        'name' => __( 'Home Signup' ),
        'id' => 'homesignup',
        'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-nr-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
	
	register_sidebar( array(
        'name' => __( 'Home Start' ),
        'id' => 'homestart',
        'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-nr-3 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
	
}

add_action( 'widgets_init', 'cg_widgets_init' );

/**
 * Remove WooCommerce breadcrumbs and replace with Yoast
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/* WooCommerce */

/* ----------------------------------------------------------------------------------- */
/* Start WooThemes Functions - Please refrain from editing this section */
/* ----------------------------------------------------------------------------------- */

// Register Support
add_theme_support( 'woocommerce' );

// Set path to WooFramework and theme specific functions
$woocommerce_path = get_template_directory() . '/woocommerce/';

// WooCommerce
if ( function_exists( "is_woocommerce" ) ) {
    require_once ( $woocommerce_path . 'woocommerce-config.php' );    //woocommerce shop plugin    
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( !isset( $content_width ) )
    $content_width = 640; /* pixels */

// End of core functions.


add_filter('manage_media_columns', 'ST4_columns_book_head');
add_action('manage_media_custom_column', 'ST4_columns_book_content', 10, 2);

// ADD TWO NEW COLUMNS
function ST4_columns_book_head($defaults) {
    $defaults['first_column']  = 'Credit';
	$defaults['admin_approve']  = 'Admin Approve/ Reuplaod Image';
    return $defaults;
}
 
function ST4_columns_book_content($column_name, $post_ID) {
    if ($column_name == 'first_column') {
   echo  get_post_meta($post_ID,'credits',true)?get_post_meta($post_ID,'credits',true):0;
    }
    if ($column_name == 'admin_approve') {
   echo  get_post_meta($post_ID,'upload_by_admin',true)?'yes':'no';
    }  
}


// 
function updatcredit($postid,$mode='outer')
{

global $wpdb;
$user_id = get_current_user_id();
if($mode=="inner")
{
update_post_meta($postid,'credits',0);
return;
}

$sql ="select * from wp_woocredit_users where user_id='$user_id'";
$result  = mysql_query($sql);
$row =  mysql_fetch_array($result);
$total = $row['credit']-1;
if($total>0)
{
update_post_meta($postid,'credits',1);
$sql ="update  wp_woocredit_users set credit='$total' where user_id='$user_id'";
mysql_query($sql);

}
else
{
update_post_meta($postid,'credits',0);
}

}


function etheme_get_resized_url($id,$width, $height, $crop) {
 if ( function_exists("gd_info") && (($width >= 10) && ($height >= 10)) && (($width <= 1024) && ($height <= 1024)) ) {
  $vt_image = vt_resize( $id, '', $width, $height, $crop );
  if ($vt_image) 
   $image_url = $vt_image['url'];
  else
   $image_url = false;
 }
 else {
  $full_image = wp_get_attachment_image_src( $id, 'full');
  if (!empty($full_image[0]))
   $image_url = $full_image[0];
  else
   $image_url = false;
 }
 
    if( is_ssl() && !strstr(  $image_url, 'https' ) ) str_replace('http', 'https', $image_url);
    
    return $image_url;
}

if ( !function_exists('vt_resize') ) {
 function vt_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {
 
  // this is an attachment, so we have the ID
  if ( $attach_id ) {
  
   $image_src = wp_get_attachment_image_src( $attach_id, 'full' );
   $file_path = get_attached_file( $attach_id );
  
  // this is not an attachment, let's use the image url
  } else if ( $img_url ) {
   
   $file_path = parse_url( $img_url );
   $file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];
   
   //$file_path = ltrim( $file_path['path'], '/' );
   //$file_path = rtrim( ABSPATH, '/' ).$file_path['path'];
   
   $orig_size = getimagesize( $file_path );
   
   $image_src[0] = $img_url;
   $image_src[1] = $orig_size[0];
   $image_src[2] = $orig_size[1];
  }
  
  $file_info = pathinfo( $file_path );
 
  // check if file exists
  $base_file = $file_info['dirname'].'/'.$file_info['filename'].'.'.$file_info['extension'];
  if ( !file_exists($base_file) )
   return;
   
  $extension = '.'. $file_info['extension'];
 
  // the image path without the extension
  $no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];
  
  // checking if the file size is larger than the target size
  // if it is smaller or the same size, stop right here and return
  if ( $image_src[1] > $width || $image_src[2] > $height ) {
 
   if ( $crop == true ) {
   
    $cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;
    
    // the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
    if ( file_exists( $cropped_img_path ) ) {
  
     $cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
     
     $vt_image = array (
      'url' => $cropped_img_url,
      'width' => $width,
      'height' => $height
     );
     
     return $vt_image;
    }
   }
   elseif ( $crop == false ) {
   
    // calculate the size proportionaly
    $proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
    $resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;   
 
    // checking if the file already exists
    if ( file_exists( $resized_img_path ) ) {
    
     $resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );
 
     $vt_image = array (
      'url' => $resized_img_url,
      'width' => $proportional_size[0],
      'height' => $proportional_size[1]
     );
     
     return $vt_image;
    }
   }
 
   // check if image width is smaller than set width
   $img_size = getimagesize( $file_path );
   if ( $img_size[0] <= $width ) $width = $img_size[0];  
 
   // no cache files - let's finally resize it
   $new_img_path = image_resize( $file_path, $width, $height, $crop );
   $new_img_size = getimagesize( $new_img_path );
   $new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );
 
   // resized output
   $vt_image = array (
    'url' => $new_img,
    'width' => $new_img_size[0],
    'height' => $new_img_size[1]
   );
   
   return $vt_image;
  }
 
  // default output - without resizing
  $vt_image = array (
   'url' => $image_src[0],
   'width' => $image_src[1],
   'height' => $image_src[2]
  );
  
  return $vt_image;
 }
}

if ( !function_exists('vt_resize2') ) {
 function vt_resize2( $img_name, $dir_url, $dir_path, $width, $height, $crop = false ) {
  
  $file_path = trailingslashit($dir_path).$img_name;
  
  $orig_size = getimagesize( $file_path );
  
  $image_src[0] = trailingslashit($dir_url).$img_name;
  $image_src[1] = $orig_size[0];
  $image_src[2] = $orig_size[1];
  
  $file_info = pathinfo( $file_path );
 
  // check if file exists
  $base_file = $file_info['dirname'].'/'.$file_info['filename'].'.'.$file_info['extension'];
  if ( !file_exists($base_file) )
   return;
   
  $extension = '.'. $file_info['extension'];
 
  // the image path without the extension
  $no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];
  
  // checking if the file size is larger than the target size
  // if it is smaller or the same size, stop right here and return
  if ( $image_src[1] > $width || $image_src[2] > $height ) {
 
   if ( $crop == true ) {
   
    $cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;
    
    // the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
    if ( file_exists( $cropped_img_path ) ) {
  
     $cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
     
     $vt_image = array (
      'url' => $cropped_img_url,
      'width' => $width,
      'height' => $height
     );
     
     return $vt_image;
    }
   }
   elseif ( $crop == false ) {
   
    // calculate the size proportionaly
    $proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
    $resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;   
 
    // checking if the file already exists
    if ( file_exists( $resized_img_path ) ) {
    
     $resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );
 
     $vt_image = array (
      'url' => $resized_img_url,
      'width' => $proportional_size[0],
      'height' => $proportional_size[1]
     );
     
     return $vt_image;
    }
   }
 
   // check if image width is smaller than set width
   $img_size = getimagesize( $file_path );
   if ( $img_size[0] <= $width ) $width = $img_size[0];  
 
   // no cache files - let's finally resize it
   $new_img_path = image_resize( $file_path, $width, $height, $crop );
   $new_img_size = getimagesize( $new_img_path );
   $new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );
 
   // resized output
   $vt_image = array (
    'url' => $new_img,
    'width' => $new_img_size[0],
    'height' => $new_img_size[1]
   );
   
   return $vt_image;
  }
 
  // default output - without resizing
  $vt_image = array (
   'url' => $image_src[0],
   'width' => $image_src[1],
   'height' => $image_src[2]
  );
  
  return $vt_image;
 }
}
function etheme_get_image( $attachment_id = 0, $width = null, $height = null, $crop = true, $post_id = null ) {
 global $post;
 if (!$attachment_id) {
  if (!$post_id) {
   $post_id = $post->ID;
  }
  if ( has_post_thumbnail( $post_id ) ) {
   $attachment_id = get_post_thumbnail_id( $post_id );
  } 
  else {
   $attached_images = (array)get_posts( array(
    'post_type'   => 'attachment',
    'numberposts' => 1,
    'post_status' => null,
    'post_parent' => $post_id,
    'orderby'     => 'menu_order',
    'order'       => 'ASC'
   ) );
   if ( !empty( $attached_images ) )
    $attachment_id = $attached_images[0]->ID;
  }
 }}
 
 
 function output_file($Source_File, $Download_Name, $mime_type='')
{
 /*
$Source_File = path to a file to output
$Download_Name = filename that the browser will see 
$mime_type = MIME type of the file (Optional)
*/
 if(!is_readable($Source_File)) die('File not found or inaccessible!');
 
 $size = filesize($Source_File);
 $Download_Name = rawurldecode($Download_Name);
 
 /* Figure out the MIME type (if not specified) */
 $known_mime_types=array(
    "pdf" => "application/pdf",
    "csv" => "application/csv",
    "txt" => "text/plain",
    "html" => "text/html",
    "htm" => "text/html",
    "exe" => "application/octet-stream",
    "zip" => "application/zip",
    "doc" => "application/msword",
    "xls" => "application/vnd.ms-excel",
    "ppt" => "application/vnd.ms-powerpoint",
    "gif" => "image/gif",
    "png" => "image/png",
    "jpeg"=> "image/jpg",
    "jpg" =>  "image/jpg",
    "php" => "text/plain"
 );
 
 if($mime_type==''){
     $file_extension = strtolower(substr(strrchr($Source_File,"."),1));
     if(array_key_exists($file_extension, $known_mime_types)){
        $mime_type=$known_mime_types[$file_extension];
     } else {
        $mime_type="application/force-download";
     };
 };
 
 @ob_end_clean(); //off output buffering to decrease Server usage
 
 // if IE, otherwise Content-Disposition ignored
 if(ini_get('zlib.output_compression'))
  ini_set('zlib.output_compression', 'Off');
 
 header('Content-Type: ' . $mime_type);
 header('Content-Disposition: attachment; filename="'.$Download_Name.'"');
 header("Content-Transfer-Encoding: binary");
 header('Accept-Ranges: bytes');
 
 header("Cache-control: private");
 header('Pragma: private');
 header("Expires: Thu, 26 Jul 2012 05:00:00 GMT");
 
 // multipart-download and download resuming support
 if(isset($_SERVER['HTTP_RANGE']))
 {
    list($a, $range) = explode("=",$_SERVER['HTTP_RANGE'],2);
    list($range) = explode(",",$range,2);
    list($range, $range_end) = explode("-", $range);
    $range=intval($range);
    if(!$range_end) {
        $range_end=$size-1;
    } else {
        $range_end=intval($range_end);
    }
 
    $new_length = $range_end-$range+1;
    header("HTTP/1.1 206 Partial Content");
    header("Content-Length: $new_length");
    header("Content-Range: bytes $range-$range_end/$size");
 } else {
    $new_length=$size;
    header("Content-Length: ".$size);
 }
 
 /* output the file itself */
 $chunksize = 1*(1024*1024); //you may want to change this
 $bytes_send = 0;
 if ($Source_File = fopen($Source_File, 'r'))
 {
    if(isset($_SERVER['HTTP_RANGE']))
    fseek($Source_File, $range);
 
    while(!feof($Source_File) && 
        (!connection_aborted()) && 
        ($bytes_send<$new_length)
          )
    {
        $buffer = fread($Source_File, $chunksize);
        print($buffer); //echo($buffer); // is also possible
        flush();
        $bytes_send += strlen($buffer);
    }
 fclose($Source_File);
 } else die('Error - can not open file.');
 
die();
}

//  by ayaz 22 sept 2015

//get user role
function get_user_role() 
{
	global $current_user;
	$user_roles = $current_user->roles;
	$user_role = array_shift($user_roles);
	return $user_role;
}

//get user first_name
function get_user_fname($uid) 
{
	$user_info = get_userdata($uid);
    return $user_info->first_name;
}

// get user last name
function get_user_lname($uid) 
{
	$user_info = get_userdata($uid);
    return $user_info->last_name;
}

// get user phone
function get_user_phone($uid) 
{
	$phone = get_user_meta($uid, 'your_phone', true); 
    return $phone;
}

// get user email
function get_user_email($uid) 
{
	$user_info = get_userdata($uid);
    return $user_info->user_email;
}





add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );

function add_loginout_link( $items, $args ) {

  	if (!is_user_logged_in() && $args->theme_location == 'primary') {

		$items .= '<li><a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'">Sign UP</a></li>';

    }

    return $items;
}
function my_login_redirect( $redirect_to, $request, $user ) {
	//is there a user to check?
	global $user;
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		//check for admins
		if ( in_array( 'administrator', $user->roles ) ) {
			// redirect them to the default place
			return $redirect_to;
		} else {
			return home_url();
		}
	} else {
		return $redirect_to;
	}
}

/*add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );
add_action('wp_logout',create_function('','wp_redirect(home_url());exit();'));*/
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

// create post
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'projects',
    array(
      'labels' => array(
        'name' => __( 'Projects' ),
        'singular_name' => __( 'Projects' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}


//  End by ayaz 22 sept 2015
function get_original_cf($postid=0, $element_type='post', $key){
        global $sitepress, $post;
       
        $postid                 = ($postid == 0 ? $post->ID : $postid);
        $custom_field   = get_post_meta(icl_object_id($postid, $element_type, false, $sitepress->get_default_language()), $key, true); 
       
return $custom_field;
}

function get_string_day($days)
{
	
	if(ICL_LANGUAGE_CODE == 'fr'){
		$str = "Chargé il y a ".$days." jours";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "".$days." dagen geleden opgeladen";
	}
	else
	{
		$str = "Uploaded ".$days." days ago";
	}
	return $str;


}





function get_string_ago()
{
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "depuis";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = " geleden ";
	}
	else
	{
		$str = "ago ";
	}
	return $str;
}


function get_string_hours($hours)
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Chargé il y a ".$hours." heures";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "".$hours." uren geleden opgeladen";
	}
	else
	{
		$str = "Uploaded ".$hours." hours ago";
	}
	return $str;
}
function get_string_minutes($minutes)
{
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Chargé il y a ".$minutes." min";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "".$minutes." min geleden opgeladen";
	}
	else
	{
		$str = "Uploaded ".$minutes." min ago ";
	}
	return $str;
}

function get_string_sec($sec)
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Chargé il y a ".$sec." sec";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "".$sec." seconden geleden opgeladen";
	}
	else
	{
		$str = "Uploaded ".$sec." sec ago ";
	}
	return $str;
}

function get_string_photos()
{
	
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Photos ";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Photos ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Photos  ";
	}
	return $str;
	
}

function get_string_example()
{
	
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "EXEMPLE ";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "VOORBEELD";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "EXAMPLE  ";
	}
	return $str;
	
}

function get_string_pricing()
{
	
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "TARIFICATION";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "PRIJZEN";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "PRICING";
	}
	return $str;
	
}


function get_string_tour()
{
	
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "VISITE";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "OVERZICHT";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "TOUR";
	}
	return $str;
	
}

function get_str_upload()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Projets chargés";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Opgeladen ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Uploaded ";
	}
	
	return $str;
}
function get_str_editing()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Projets en retouche";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Onder bewerking";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "In Editing Process ";
	}
	
	return $str;
}
function get_str_closed()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Projets clotûrés";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Afgewerkt";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Closed Project ";
	}
	
	return $str;
}


function get_str_newname()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Nouveau nom";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Nieuwe titel";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "New Name ";
	}
	
	return $str;
}



function get_str_search()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Recherche projet";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "project zoeken ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Project Search ";
	}
	
	return $str;
}




function get_str_placeholder_title()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Titre du projet";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Project titel ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Project Title ";
	}
	
	return $str;
}
function get_str_searchtxt()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "recherche";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "zoeken ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "search ";
	}
	
	return $str;
}
function get_str_updatetxt()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Mettre à jour";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "bijwerken ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "update ";
	}
	
	return $str;
}
function get_str_readytogo()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Prêt à partir ?";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Klaar om te gaan ? ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Ready To Go ? ";
	}
	
	return $str;
}

function get_str_readytostart()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Prêt à démarrer ?";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Klaar om te starten? ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Ready To start ? ";
	}
	
	return $str;
}
function get_str_orderservice()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "COMMANDER LE SERVICE ?";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "BESTEL  DE DIENST ? ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "ORDER SERVICE? ";
	}
	
	return $str;
}
function get_str_wrong_photos()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Photos incorrectes ?";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Verkeerde foto ? ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Wrong Photos ? ";
	}
	
	return $str;
}
function get_str_delete()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Supprimer ce projet";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Verwijder dit project ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Delete this project";
	}
	
	return $str;
}



function get_str_or()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "OU";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "OR";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "OR";
	}
	
	return $str;
}


function get_str_uploadphoto()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "SELECTIONNER DES PHOTOS";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "PHOTOS UPLOADEN";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "UPLOAD PHOTOS";
	}
	
	return $str;
}

function get_str_uploadphoto1()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Selectionners des photos";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Photos Uploaden";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Upload Photos";
	}
	
	return $str;
}




function get_str_review_project()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Examen des projets";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Beoordeling Project";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Review Project";
	}
	
	return $str;
}

function get_str_myproject()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "MES PROJETS";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "MIJN PROJECTEN";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "MY PROJECTS";
	}
	
	return $str;
}


function get_str_morephoto()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "CHARGER D'AUTRES PHOTOS";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "MEER FOTO'S OPLADEN";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "UPLOAD MORE PHOTOS";
	}
	
	return $str;
}


function get_str_createanaccount()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "CRÉER UN COMPTE";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "MAAK EEN ACCOUNT ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "CREATE AN ACCOUNT";
	}
	
	return $str;
}


function get_str_ordersummary()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Résumé de la commande";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Samenvatting van de bestelling ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Order Summary";
	}
	
	return $str;
}


function get_str_order_complete()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Commande terminée";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Om voltooid";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Order Completed";
	}
	
	return $str;
}


function get_str_orderfor()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Images à retoucher";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Dienst besteld voor ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Service ordered for";
	}
	
	return $str;
}
function get_str_servisecredit()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Créditsnécessaires";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "dienst Credits ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Service Credits";
	}
	
	return $str;
}
function get_str_availablecredit()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Voscréditsdisponibles";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Uw beschikbare krediet";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Your available credits";
	}
	
	return $str;
}


function get_str_EstimatedDelivery()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Vos crédits disponibles";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Délai de livraison estimé ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Estimated Delivery";
	}
	
	return $str;
}
function get_str_Project()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Projet";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Project ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Project";
	}
	
	return $str;
}
function get_str_editings()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Retouche";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Editing ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Editing";
	}
	
	return $str;
}
function get_str_credit()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Crédit";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Kredieten ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Credit";
	}
	
	return $str;
}

function get_str_contactus()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Nous contacter";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Contacteer ons ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Contact Us";
	}
	
	return $str;
}



function get_str_profilesettings()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Paramètres & Profil";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Profiel & Instellingen ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Profile & Settings";
	}
	
	return $str;
}



function get_str_noediting()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Pas de retouche";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "geen bewerken ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "No Editing";
	}
	
	return $str;
}
function get_str_order()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "COMMANDE";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "BESTELLEN ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "ORDER";
	}
	
	return $str;
}

function get_str_logout()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Se déconnecter";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Uitloggen ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Logout";
	}
	
	return $str;
}



function get_str_ordersuccessfully()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Service commandé avec succès";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Bestelde dienst succesvol ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Service ordered succesfully";
	}
	
	return $str;
}
function get_str_msgtxt1()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Le temps estimé de traitement est de 24 heures. Une notification par email vous sera envoyée dès que vos photos seront prêtes à être téléchargées.";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "De tijd om de foto's te behandelen wordt ingeschat op 24 uur. Een notificatie email zal gestuurd worden  van zodra de geretoucheerde foto's opgeladen zijn.  ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Estimated turn around is 24 hours. An email notification will be sent to you as soon as we uploaded edited photos. ";
	}
	
	return $str;
}


function get_str_closetxt()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Fermer";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Dicht ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Close ";
	}
	
	return $str;
}
function get_str_projectstatus()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "État du projet";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "project Status ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Project Status ";
	}
	
	return $str;
}
function get_str_downloadzip()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Télécharger fichier zip";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Download zipbestand ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Download zip file ";
	}
	
	return $str;
}

function get_str_downloadimg()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Télécharger l'image";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Download Afbeelding ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Download Image ";
	}
	
	return $str;
}

function get_str_oruploadmorephoto()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "ou télécharger plus de photos";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "of upload meer foto's ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "or upload more photos ";
	}
	
	return $str;
}


function get_str_updatecart()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Mise à jour panier";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Winkelwagen bijwerken ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Update Cart ";
	}
	
	return $str;
}

function get_str_checkout()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "CHECK-OUT";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "UITCHECKEN ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "CHECKOUT ";
	}
	
	return $str;
}


function get_str_signup()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "INSCRIVEZ-VOUS";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "SCHRIJF ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "SIGN UP ";
	}
	
	return $str;
}

function get_str_login()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "SE CONNECTOR";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "LOG IN ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "LOGIN ";
	}
	
	return $str;
}



function get_str_slogan()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "De meilleures photos, de meilleures ventes! ";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Betere foto's, betere verkoop! ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Better Photos , better sales! ";
	}
	
	return $str;
}

function get_str_delete_project_success_msg()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Projet et ses images supprimées avec succès! ";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Project en de beelden met succes verwijderd! ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Project and its images deleted successfully ! ";
	}
	
	return $str;
}



function get_str_services()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "NOS SERVICES";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "ONZE DIENSTEN";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "OUR SERVICES ";
	}
	
	return $str;
}



function get_str_yourcredit()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "vos crédits";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "uw credits ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Your  credits ";
	}
	
	return $str;
}

function get_str_buycredit()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Acheter des cr&eacute;dits";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "Koop Credits ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Buy  credits ";
	}
	
	return $str;
}

function get_str_price_static_txt()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "	Obtenez une photo de l'immobilier professionnellement éditée pour aussi peu que";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "	Krijg een professionnally bewerkt vastgoed foto voor zo laag als ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "	Get a professionnally edited real estate photo for as low as ";
	}
	
	return $str;
}

function get_str_price_static_txt1()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "	utilise des crédits pour payer les services d'édition. Un crédit est nécessaire pour un emploi d'édition.";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "	maakt gebruik van credits te betalen voor het bewerken diensten. Een credit is nodig voor één bewerken baan. ";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "	uses credits to pay for editing services. One credit is necessary for one editing job. ";
	}
	
	return $str;
}

function get_str_cartmsg()
{
	
	if(ICL_LANGUAGE_CODE == 'fr')
	{
		$str = "Le 'crédit' est le moyen de transaction utilisé sur notre site web. Chaque service qui est commandé requiert un certain nombre de ces crédits qui seront déduits de votre compte. Les crédits restant dans votre compte sont valables un an à compter du jour d'achat.";
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
		$str = "'Krediet' is het betaalmiddel om van onze diensten gebruik te maken. Iedere dienst vereist een bepaald aantal kredieten die afgetrokken worden van uw account. Een krediet heeft een geldigheidsduur van exact 1 jaar.";
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
		$str = "Credit is our site currency and you use credits to order our services.For each service orderd, a certain number of credit will be deducted from your account. Unused credit are kept in your account for futer use  for exactly 12 months from purchase date.";
	}
	
	return $str;
}

function mythemename_form_alter( &$form, &$form_state, $form_id )
{
    if ( TRUE === in_array( $form_id, array( 'user_login', 'user_login_block' ) ) )
    {
        $form['name']['#attributes']['placeholder'] = t( 'Username or E-Mail' );
        $form['pass']['#attributes']['placeholder'] = t( 'Password' );
    }
}

add_filter('manage_media_columns', 'posts_columns_attachment_id', 1);
add_action('manage_media_custom_column', 'posts_custom_columns_attachment_id', 1, 2);
function posts_columns_attachment_id($defaults){
    $defaults['wps_post_attachments_id'] = __('Group ID');
	
    return $defaults;
}
function posts_custom_columns_attachment_id($column_name, $id){
        if($column_name === 'wps_post_attachments_id'){
        //echo $id;
		//get_post_meta($attachment->ID, '_title_en', true);
		echo get_post_meta($id , 'group_id', true);
    }
}


function time_to_his ($seconds)
	{
	$days = floor ($seconds / 86400);
	if ($days > 1) // 2 days+, we need days to be in plural
	{
	return $days . ' days ' . gmdate ('H:i:s', $seconds);
	}
	else if ($days > 0) // 1 day+, day in singular
	{
	return $days . ' day ' . gmdate ('H:i:s', $seconds);
	}
	
	return gmdate ('H:i:s', $seconds);
	}