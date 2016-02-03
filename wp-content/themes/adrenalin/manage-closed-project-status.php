

<?php
	$project_id = '';
	$imagecount_in_project = '';
	$closed_images_of_project = '';
	// fetch project of status = 2
	$arg2 = array(
	'post_type'   => 'projects',
	'posts_per_page'=>-1,
	'author'=> $user_ID,
	'meta_query' => array(
	array(
	'key'     => 'image_project_status',
	'value'   => 2,
	'compare' => '=',
	'type'    => 'numeric',
	),
	),
	);
	$q = new WP_Query($arg2);
	while ( $q->have_posts() ) : $q->the_post();
	
	$project_id = get_the_ID();
	
				
				if(!empty($project_id)){
				// count all images in each project(where image status = (can be any one like 1 , 2,3) and project status = 2)
				
				$arg3 = array(
				'post_status' => 'any',
				'post_type'   => 'attachment',
				'posts_per_page'=>-1,
				'author'=> $user_ID,
				'meta_query' => array(
				array(
				'key'     => 'group_id',
				'value'   => $project_id,
				'compare' => '=',
				'type'    => 'numeric',
				),
				),
				);
			  	
				$imagecount_in_project = count(query_posts( $arg3 ));
				
				
				
				
				// count images in each project(where image status =3 and project status = 2)
				
				$arg4 = array(
				'post_status' => 'any',
				'post_type'   => 'attachment',
				'posts_per_page'=>-1,
				'author'=> $user_ID,
				'meta_query' => array(
				'relation' => 'AND',
				array(
				'key'     => 'group_id',
				'value'   => $project_id,
				'compare' => '=',
				'type'    => 'numeric',
				),
				array(
				'key'     => 'image_status',
				'value'   => 3,
				),
				),
				);
				$closed_images_of_project = count(query_posts( $arg4 ));
				
				
				// update project status if its all images has edited
				if(!empty($imagecount_in_project) && !empty($closed_images_of_project) ){
					if($imagecount_in_project == $closed_images_of_project)
					{
						
								update_post_meta($project_id , 'image_project_status' , '3');
						
						 		$zipname = call_to_zip($project_id);
								
								$ORDER_NUMBER = $project_id;
								$CLIENT_NAME = ucfirst(get_user_fname1($user_ID)).''.ucfirst(get_user_lname1($user_ID));
								$LINK = get_bloginfo('url').'/'.$zipname.'';
								// multiple recipients
								
								$to = get_user_email1($user_ID);
								
								
								
								if(ICL_LANGUAGE_CODE == 'fr')
								{
									
									// subject
									$subject = 'Mon projet Immopix Fermé';
									
									// message
									$message = '<div class="myemail"> Bonjour '.$CLIENT_NAME.':<br><br>
									Félicitations! Nous avons chargé les photos retouchées de votre commande <ORDER NUMBER>. '.$ORDER_NUMBER.'.<br><br>
									Veuillez suivre le lien suivant pour télécharger vos images retouchées ::<br><br>
									'.$LINK.'<br><br>
									Les images resteront sur myimmopix.com pour 90 jours. Elles serotn ensuite supprimées. Merci donc de les télécharger le plus tôt possible.<br><br>
	
									Cordialement,<br><br>
	
									Myimmopix  - L'.'équipe
									</div>';
									
									// To send HTML mail, the Content-type header must be set
									$headers  = 'MIME-Version: 1.0' . "\r\n";
									$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
									
									// Additional headers
									$headers .= 'To: '.$to.'' . "\r\n";
									$headers .= 'From: Fermé Rappel projet <myimmopix@example.com>' . "\r\n";
									
								}
								else if(ICL_LANGUAGE_CODE == 'nl')
								{
									// subject
									$subject = 'MIJN Immopix Project Gesloten';
									
									// message
									$message = '<div class="myemail"> Hallo '.$CLIENT_NAME.':<br><br>
									Gefeliciteerd! We-hebben de laatste bewerkte foto (s) voor uw bestelling geupload '.$ORDER_NUMBER.'.<br><br>
									Klik link naar de aanleiding van uw bewerkte foto(s) te downloaden:<br><br>
									'.$LINK.'<br><br>
									De foto(s) zullen er voor 90 dagen myimmopix.com. Dan zullen ze worden verwijderd,.<br><br>
	
									Met vriendelijke groet,<br><br>
	
									Myimmopix  - Het team
									</div>';
									
									// To send HTML mail, the Content-type header must be set
									$headers  = 'MIME-Version: 1.0' . "\r\n";
									$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
									
									// Additional headers
									$headers .= 'To: '.$to.'' . "\r\n";
									$headers .= 'From: Gesloten Project Herinnering <myimmopix@example.com>' . "\r\n";
									
								}
								else if(ICL_LANGUAGE_CODE == 'en')
								{
									// subject
									$subject = 'MY Immopix Project Closed';
									
									// message
									$message = '<div class="myemail"> Hi '.$CLIENT_NAME.':<br><br>
									Congratulations! We have uploaded the latest edited photo(s) for your order '.$ORDER_NUMBER.'.<br><br>
									Please click the following link to download your edited images:<br><br>
									'.$LINK.'<br><br>
									The images will stay on myimmopix.com for 90 days. They will then be deleted,<br><br> so please download them as quickly 	
									as possible.<br><br>
	
									Sincerely yours,<br><br>
	
									Myimmopix - The team
									</div>';
									
									// To send HTML mail, the Content-type header must be set
									$headers  = 'MIME-Version: 1.0' . "\r\n";
									$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
									
									// Additional headers
									$headers .= 'To: '.$to.'' . "\r\n";
									$headers .= 'From: Closed Project Reminder <myimmopix@example.com>' . "\r\n";
								}
								
								
								
								
								// Mail it
								mail($to, $subject, $message, $headers);

						}
				}
		}
				
	endwhile;
	wp_reset_postdata(); // end of the loop.  
	
	
	//get user first_name
	function get_user_fname1($uid) 
	{
		$user_info = get_userdata($uid);
		return $user_info->first_name;
	}
	
	// get user last name
	function get_user_lname1($uid) 
	{
		$user_info = get_userdata($uid);
		return $user_info->last_name;
	}
	// get user email
	function get_user_email1($uid) 
	{
	$user_info = get_userdata($uid);
	return $user_info->user_email;
	}
	
	
	// make zip file 
	function call_to_zip($pid)
	{
		
	$args2 = array(
	'post_status' => 'any',
	'post_type'   => 'attachment',
	'posts_per_page'=>-1,
	'author'=> $user_ID,
	'meta_query' => array(
	array(
	'key'     => 'group_id',
	'value'   => $pid,
	'compare' => '=',
	'type'    => 'numeric',
	),
	),
	);
	$count2 = count(query_posts( $args2 ));
	
		while(have_posts()) : the_post();
		$newimageid = get_field('upload_image');
		
		$new_feat_image =  wp_get_attachment_url( $newimageid );
	
		$filelist[] = $new_feat_image;		
				
		endwhile;  wp_reset_query(); // end of the loop.
	
 


	$upload_dir = wp_upload_dir(); 
	
	
	$zipname = 'order-'.$pid.'.zip';
	$zip = new ZipArchive;
	$zip->open($zipname, ZipArchive::CREATE);
	if ($handle = opendir($upload_dir['basedir'].'/2015/10/')) {
	
	
	foreach ($filelist as $file) {
	
	$str = explode('/',$file);
	$entry = end($str);
	
	$zip->addFile($upload_dir['basedir'].'/2015/10/'.$entry, $entry);
	}
	}
	closedir($handle);
	
	
	$zip->close();
	
	@header('Content-Type: application/zip');
	@header("Content-Disposition: attachment; filename='".$zipname."'");
	@header('Content-Length: ' . filesize($zipname));
	@header("Location: http://www.myimmopix.com/".$zipname."");
	return $zipname;
	
 	}
	
?>


