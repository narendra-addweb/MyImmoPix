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


//Initialize languange specific project count array...
$arrLangProject = array();
$checkForCartExist = false;
$current_lang = '';
$uploadPageURL = ''; 
$arrUploadUrl = array();
if (function_exists('icl_get_languages')) {
    //get list of used languages from WPML
    $langs = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
    //Set current language for language based variables in theme.
    
    global $sitepress;
    $current_lang = $sitepress->get_current_language(); //save current language

    $user_ID = get_current_user_id();
    if($user_ID > 0){
        foreach ($langs AS $langKey => $language) {
        
            $sitepress->switch_lang($langKey);
            //...run query here; if you use WP_Query or get_posts make sure you set suppress_filters=0 ... 
            
            $existProjects = 0;
            $argsProjects = array(
                'post_type'   => 'projects',
                'posts_per_page'=>-1,
                'author'=> $user_ID,
                'meta_query' => array(
                    array(
                        'key'     => 'image_project_status',
                        'value'   => 1,
                        'compare' => '=',
                        'type'    => 'numeric',
                    ),
                ),
            );
            $existProjects = count(query_posts( $argsProjects ));
            while(have_posts()) : the_post();

            endwhile;
            wp_reset_query();
           // print $langKey . ' >> ' . $existProjects . ' :: '; 
           $arrLangProject[$langKey] = $existProjects;

            //Get 'Upload page' URL in other language...
            if($langKey == 'fr'){
                $arrUploadUrl[$langKey] = getWPMU_url('69199');
            }
            else if($langKey == 'nl') {
                $arrUploadUrl[$langKey] = getWPMU_url('69198');
            }
            else if($langKey == 'en') {
               $arrUploadUrl[$langKey] = getWPMU_url('66607');
            }

        }
        $sitepress->switch_lang($current_lang); //restore previous language
    }


    //Build checkout page name array for restict language changer
    $arrChkoutPageName = array(
        'manage-projects', 
        'project-detail', 
        'order-summary', 
        'order-summary-final', 
        'project-detail-dutch', 
        'project-detail-fr', 
        'project-fr', 
        'project-dutch', 
        'project-en'
        );

    //Get current page unique name
    $pagename = get_query_var('pagename');
    if ( !$pagename && $id > 0 ) {
        // If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object
        $post = $wp_query->get_queried_object();
        $pagename = $post->post_name;
    }

    //Check for current page is one of the checkout page and newly selected language has cart builded OR not?
    if(in_array($pagename, $arrChkoutPageName)){
       $checkForCartExist = true;
    }
}
?>
<script>
    //If need to check for cart is empty OR not while select language from footer...
    var checkForCartExist = '<?php echo $checkForCartExist;?>';
    if(checkForCartExist){
        //This JQuery only used for language selection, do not make any change...
        jQuery(document).ready(function() {
            //Initialize used variable...
            var current_lang = '<?php echo $current_lang;?>';
            var checkForCartExist = '<?php echo $checkForCartExist;?>';
            var arrProjCount = <?php echo json_encode($arrLangProject); ?>;
            var arrUploadUrl = <?php echo json_encode($arrUploadUrl); ?>;
            //While click on <a>, act for load into another language OR redirect on upload page...
            jQuery('.clsAnchor').click(function(event) {
                var dropDownURL = jQuery(this).find('a:first').attr('href');
                var selectedClass = jQuery(this).find('a:first').attr('class');
                var selectedLngName = jQuery(this).find('a:first').text();
                var langConfMessage ='';
                //alert(dropDownURL + ' >> ' + current_lang +' :: '+ arrProjCount[selectedClass]);
                event.preventDefault(); 
                if(selectedClass != current_lang && parseInt(arrProjCount[selectedClass]) > 0){
                    window.location.href = dropDownURL;
                }
                else {
                    if(selectedClass != current_lang){
                        ICL_LANGUAGE_CODE = '<?php echo ICL_LANGUAGE_CODE;?>';
                        if(ICL_LANGUAGE_CODE == 'fr'){
                            langConfMessage = "Il n'y a pas de projet disponible builded dans la langue sélectionnée "+ selectedLngName +". Voulez-vous créer?";
                        }
                        else if(ICL_LANGUAGE_CODE == 'nl')
                        {
                            langConfMessage = "Er is geen project beschikbaar is gebouwd in geselecteerde "+ selectedLngName +" taal. Heeft u wilt maken?";
                        }
                        else if(ICL_LANGUAGE_CODE == 'en')
                        {
                            langConfMessage = "There is no project available builded into selected "+ selectedLngName +" language. Do you want to create ?";
                        }

                        if (confirm(langConfMessage)) {
                           window.location.href = arrUploadUrl[selectedClass]; 
                        }
                        /*else{
                            window.location.href = '<?php echo $uploadPageURL ;?>';
                        }*/
                        event.preventDefault();
                    }
                    else {
                        window.location.href = dropDownURL;
                    }
                }
            });
        });
    }

</script>
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
                                    <div class="subfooter"><?php 
                                        if(is_front_page() || is_home()){//For home/front page only...
                                            dynamic_sidebar( 'first-footer' ); 
                                        }
                                        else {//For inner pages...
                                            dynamic_sidebar( 'first-footer-inner-pages' );
                                        }
                                    ?></div><!-- /.subfooter -->
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

