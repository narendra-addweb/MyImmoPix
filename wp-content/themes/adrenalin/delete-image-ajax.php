<?php

define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */

require( '../../../wp-config.php' );


global $wpdb;




$attachment_id = $_POST['id'];
if(!empty($attachment_id))
{
	$status = wp_delete_attachment($attachment_id); 
	 if($status)
	 {
		 echo 1;
	 }
	 else
	 {
		 echo 0;
	 }

}


?>