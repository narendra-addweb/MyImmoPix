

	<?php
	
	// update status and url of new edited images
	
	$upload_dir = wp_upload_dir(); 	
	$dir = $upload_dir['basedir'].'/final-edited-images/';
	if ($dh = opendir($dir)){
	while (($file = readdir($dh)) !== false){
	
	if($file!='.' &&  $file!='..' && $file!=''  ){
	
	$str = explode('__',$file);
	$org_file_name[] = $str[1];
	$post_id = $str[0];
	$url =  $upload_dir['baseurl'].'/final-edited-images/'.$file;
	update_post_meta($post_id,'image_status','3');
	update_post_meta($post_id,'upload_image',$url);
	}
	}
	closedir($dh);
	}
	
	
	
	
	// delete  ordered images from dir ordered images 
	$dir = $upload_dir['basedir'].'/ordered-images/';
	if ($dh = opendir($dir)){
	while (($file = readdir($dh)) !== false){
	
	if($file!='.' &&  $file!='..' && $file!=''  ){
		
		unlink   ($dir."/".$file);
	
	}
	}
	closedir($dh);
	}
	
	
	
	?>
	
	
