<?php
/**
 * Template functions for this plugin
 * 
 * Place all functions that may be usable in theme template files here.
 * 
 * @package WordpressCookies
 * 
 * @author jcpeden
 * @version 1.4.0
 * @since 1.0.0
 */

function cookie_popup() {
	if (!is_admin()) {
		global $AWSCookies;


		if ( function_exists ('icl_get_languages') ) {
    	$languages = icl_get_languages('skip_missing=0&orderby=code');

    	if( !empty( $languages ) ) {
        
        //Get first array value
        $first = current($languages);
        $id = $first['language_code'];

				/* Get position of popup */
				if($AWSCookies->get_option( 'position' ) == 'top') {
					$position = 'top';
				} else {
					$position = 'bottom';
				}
				$flagLangCompare = false;
				foreach ($languages as $l) {
					//If already set language specigic message then skip for other language...
					if($flagLangCompare) continue;

					//Get the language code id
          $id = $l['language_code'];

          //Get default language message...
          $message = $AWSCookies->get_option( 'message' );
          	
          //Get current language message...
          if(ICL_LANGUAGE_CODE == $id && !$flagLangCompare){
          	$flagLangCompare = true;
          	$message = stripslashes($AWSCookies->get_option( 'message_lang_' .$id ));
          }
          
				}
				//Display message belt...
				?><div id="eu-cookie" class="<?php echo $position; ?>">
					<div class="popup-wrapper">
						<a href="javascript:void(0)" class="close-icon"><i class="fa fa-times"></i><span>Close cookie popup</span></a>
						<p><?php echo ($message); ?></p>
					</div>
				</div><?php
			}

		}
	}
}
add_action('wp_footer', 'cookie_popup');