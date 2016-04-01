	<?php


/**
* Here project status worked like below
*	1 = Uploaded projects
*	2 = In Editing Process
*	3 = Closed Project
*
* 100 = Custom category 'Processed' id
* 97 = Custom category 'Inprocessed' id
**/

//Inherit wordpress framework support into this file functionality...
if ( !isset($wp_did_header) ) {

    $wp_did_header = true;

    require_once( dirname(__FILE__) . '/wp-load.php' );

    wp();

    require_once( ABSPATH . WPINC . '/template-loader.php' );

}

/**
*Start logic for image check and upload as attachement if image is processed and 
*upload into 'uploads/final-edited-images/' folder. 
**/

//Initialize general variables...
$arrProjectsImg = array();
$arrProjectsImgPathNew = array();
$arrProjectsImgTotal = array();
$arrProjectDetail = array();
$arrUploadedProject = array();
$arrProjAuthorInfo = array();


/*	FOR IN PROCESS PROJECTS */
$projectStatus = 2;
$cntProject = 0;

//Get all in process projects...
$args = array(
		'post_type' => 'projects',
		'posts_per_page' => -1,
		'orderby' => 'date',
		/*'author'=> 29,*/
		'order' => 'DESC',
		'meta_query' => array(
						array(
							'key'     => 'image_project_status',
							'value'   => $projectStatus,
							'compare' => '=',
							'type'    => 'numeric',
							),
						),
		);

$q = new WP_Query($args);
$totalImg = 0;
while ( $q->have_posts() ) : $q->the_post();
	$pid = get_the_ID();
	$post_author_id = get_post_field( 'post_author', $pid );
	
	//Get current projects images...
	$args2 = array(
					'post_status' => 'any',
					'post_type'   => 'attachment',
					'posts_per_page'=>-1,
					/*'author'=> $post_author_id,*/
					'meta_query' => array(
							array(
								'key'     => 'group_id',
								'value'   => get_the_ID(),
								'compare' => '=',
								'type'    => 'numeric',
							),
							array(
								'key'     => 'image_status',
								'value'   => $projectStatus,
								'compare' => '=',
								'type'    => 'numeric',
							),
						),
					);

	$count2 = count(query_posts( $args2 ));
	
	//Check for atleast one image uploaded...
	if($count2 > 0){
		
		//Initialize array for check uploaded inprocess image and processed image count by project id...
		if(!isset($arrProjectsImg[$pid])) $arrProjectsImg[$pid] = 0;
		if(!isset($arrProjectsImgPathNew[$pid])) $arrProjectsImgPathNew[$pid] = array();
		if(!isset($arrProjectsImgTotal[$pid])) $arrProjectsImgTotal[$pid] = 0;

		$arrUploadedProject[$pid] = $count2;
		$cntProject++;

		//Loop until project images...
		while(have_posts()) : the_post();

			$feat_image =  wp_get_attachment_url( get_the_ID() );
			$path = parse_url($feat_image, PHP_URL_PATH);
			
			//To get the dir, use: dirname($path)
			$inprocess_image_path = str_replace('uploads/','uploads/final-edited-images/',$_SERVER['DOCUMENT_ROOT'] . $path);
			$arrProjectsImgTotal[$pid] = $arrProjectsImgTotal[$pid] + 1;
			
			//If image processed and uploaded into 'uploads/final-edited-images/' and matched with inprocess image
			if (file_exists($inprocess_image_path)) {
			    $arrProjectsImg[$pid] = $arrProjectsImg[$pid] + 1;
			    $newFilePath = str_replace('uploads/','uploads/final-edited-images/',$feat_image);
			    $arrProjectsImgPathNew[$pid][get_the_ID()] = $newFilePath;


			    //Get user data for completed project...
			    $author_data = get_userdata( $post_author_id );
					$arrProjAuthorInfo[$pid] = array();
					$arrProjAuthorInfo[$pid]['user_id'] = $post_author_id;
					$arrProjAuthorInfo[$pid]['user_name'] = $author_data->user_login;
					$arrProjAuthorInfo[$pid]['user_email'] = $author_data->user_email;
					$arrProjAuthorInfo[$pid]['display_name'] = $author_data->display_name;
			}			
			$totalImg++;
		endwhile;	
	}
	
	//$post_language_information = wpml_get_language_information('70876');
	//print('<pre style="color:red;"> ' . $pid . ' ');
	//print_r($post_language_information);
	//print('</pre>');
endwhile;

wp_reset_query();//Flush query...
$arrProjectDetail[$projectStatus] = $cntProject;//Set total project count...

//All attached file with project...
print('<pre style="color:green;">All exist file attached with projects ');
print_r($arrProjectsImgTotal);
print('</pre>');

//Newly added into 'uploads/final-edited-images/' folder...
print('<pre style="color:red;"> Newly processed file by project id ');
print_r($arrProjectsImg);
print('</pre>');


//Filter empty array and remove it's elements...
$arrProjectsImgPathNew = array_filter($arrProjectsImgPathNew);

$arrClosedProj = array();
//Loop until project images...
foreach($arrProjectsImgTotal AS $projId => $cntProjImg){
	if($arrProjectsImg[$projId] > 0){

		//Check and update every file status...
		print('<pre style="color:red;">');
		print_r("Newly update image list");
		foreach($arrProjectsImgPathNew[$projId] AS $postId => $filePath){
			if(check_and_update_attachment($projId, $filePath, $postId, $arrProjAuthorInfo[$projId]['user_id'])){
				print($filePath . '<br />');
			}
		}
		print('</pre>');

		//If every files are processed then need to close project...
		if($cntProjImg == $arrProjectsImg[$projId]){
			closeProjectStatus($projId);
			$arrClosedProj[] = $projId;
		}
	}

}

//Closed project list...
print('<pre style="color:red;">Newly closed projects ');
print_r($arrClosedProj);
print('</pre>');

//Loop closed project and send mail to perticular...
foreach($arrClosedProj AS $arrKey => $project_id){
	if(isset($arrProjAuthorInfo[$project_id])){
		sendProjectMail($project_id, $arrProjAuthorInfo[$project_id]);
	}
}

//FOR TESTING PURPOSE UNCOMMENT BELOW LINE...
/*$arrProjAuthorInfo = array(
											'user_name' => 'Narendra', 
											'user_email' => 'narendra.addweb@gmail.com', 
											'display_name' => 'Narendra'
										);
sendProjectMail('74793', $arrProjAuthorInfo);
*/

/*
* This function will check and set requested attachement category and update it.
*/
function check_and_update_attachment($parent_post_id, $file_path, $attachement_id, $post_author){
	$category_id = 100;
	$wp_upload_dir = wp_upload_dir();
	
	$filename = str_replace( $wp_upload_dir['url'] . '/', '', $file_path);
	$wp_filetype = wp_check_filetype( basename($filename), null );
	
	//Get attachement post for check already entry exist OR not...
	$args = array(
		'post_status' => 'any',
		'post_type'   => 'attachment',
		'post_mime_type' => $wp_filetype['type'],
		'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
		'posts_per_page'=>-1,
		'post_parent' => $parent_post_id,
		'cat' => $category_id,
		'meta_query' => array(
			array(
				'key'     => 'image_status',
				'value'   => 3,
				'compare' => '=',
			),
		),
	);
	
	$count =  count(query_posts($args));
	$q = new WP_Query($args);	
	
	$flagPostExist = false;
	while ( $q->have_posts() ) : $q->the_post();
		if(get_the_guid() == $file_path){
			$flagPostExist = true;
		}
		
	endwhile;

	//If entry not exist...
	if(!$flagPostExist){
		$attachment = array(
			 'guid' => $file_path,
			 'post_mime_type' => $wp_filetype['type'],
			 'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
			 'post_content' => '',
			 'post_status' => 'inherit',
			 'post_author' => $post_author,
		);
		$path = parse_url($file_path, PHP_URL_PATH);
		$inprocess_image_path = $_SERVER['DOCUMENT_ROOT'] . $path;
		$attach_id = wp_insert_attachment( $attachment, $inprocess_image_path, $parent_post_id);

		include_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once(ABSPATH . 'wp-blog-header.php');
		require_once(ABSPATH . 'wp-admin/includes/image.php');
		// Generate the metadata for the attachment, and update the database record.
		$attach_data = wp_generate_attachment_metadata( $attach_id, $inprocess_image_path );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		set_post_thumbnail( $parent_post_id, $attach_id );

		
		add_post_meta($attach_id, 'image_status', '3');
		add_post_meta($attach_id, 'credits', '1');
		add_post_meta($attach_id, 'group_id', $parent_post_id);

		// no, then get the default one
		$post_category = array('100');//Get custom category 'Inprocess'

		// then set category if default category is set on writting page
		if ( $post_category )
			wp_set_post_categories( $attach_id, $post_category );

		return true;
	}
	return false;
}


/**
* This function will close mark project...
**/
function closeProjectStatus($project_id){
	update_post_meta($project_id,'image_project_status','3');
}

/**
* This function will send mail...
* $to (required) is the intended recipients. You can also specify multiple recipients by using an array or comma-separated email ids.
* $subject (required) is the subject of your message.
* $message (required) is the content of your message.
* $headers (optional) is the mail headers to be sent with the message.
**/
function sendProjectMail($project_id, $arrPojectUserDetail = array()) {
	global $sitepress;
	/*SEND MAIL TO USER*/
	$post_lang_code = langcode_post_id($project_id);
	
	//Get manage project page link based on selected language at time of order...
	$original_url = get_permalink('70162');
	$lang_page_url = get_url_for_language($original_url, $post_lang_code);


	$to = $arrPojectUserDetail['user_email'];
	$admin_email = get_option('admin_email');
	$subject = 'MyImmoPix - Your Project completed';
	$message = 'Dear ' . $arrPojectUserDetail['display_name'] .',<br /><br />Your project #' . $project_id . ' has been processed. Please check <a href="'. $lang_page_url .'">Manage project</a><br /><br />Thanks!';
	

	$headers[]= "From: MyImmoPix <". $admin_email .">";

	//Send mail to user...
 	if(!wp_mail( $to, $subject, $message, $headers)){
    echo('The e-mail could not be sent to user.');
 	}
  else{
    echo("Message sent to user.");
  }



  //Send mail to site admin...
  $to = $admin_email;
  $message = 'Dear Admin' . $arrPojectUserDetail['display_name'] .',<br /><br />Your project #' . $project_id . ' has been processed. Please check <a href="'. $lang_page_url .'">Manage project</a><br /><br />Thanks!';

 	if(!wp_mail( $to, $subject, $message, $headers)){
    echo('The e-mail could not be sent to user.');
 	}
  else{
    echo("Message sent to user.");
  }
}


/**
* This function will return post language id...
**/
function langcode_post_id($post_id){
    global $wpdb;
 
    $query = $wpdb->prepare('SELECT language_code FROM ' . $wpdb->prefix . 'icl_translations WHERE element_id="%d"', $post_id);
    $query_exec = $wpdb->get_row($query);
 
    return $query_exec->language_code;
}

/**
* This function will return language specific url
**/
function get_url_for_language( $original_url, $language){
    $post_id = url_to_postid( $original_url );
    $lang_post_id = icl_object_id( $post_id , 'page', true, $language );
     
    $url = "";
    if($lang_post_id != 0) {
        $url = get_permalink( $lang_post_id );
    }else {
        // No page found, it's most likely the homepage
        global $sitepress;
        $url = $sitepress->language_url( $language );
    }
     
    return $url;
}
?>
	
	
