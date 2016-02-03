

<?php
	$upload_dir = wp_upload_dir(); 	
	
	// fetch images of status = 2
	$args = array(
	'post_status' => 'any',
	'post_type'   => 'attachment',
	'posts_per_page'=>-1,
	
	'meta_query' => array(
	array(
	'key'     => 'image_status',
	'value'   => 2,
	'compare' => '=',
	
	),
	),
	);
	$q = new WP_Query($args);
	 
	while ( $q->have_posts() ) : $q->the_post();
	$feat_image =  wp_get_attachment_url( get_the_ID() );
	
	$str = explode('/',$feat_image);
	$file_name = get_the_id().'_'.end($str);
	copy($upload_dir['basedir']."/2015/10/".end($str),$upload_dir['basedir']."/ordered-images/".$file_name);
	$filelist[] = $file_name;
	endwhile;
	wp_reset_postdata();
	
	
	
	
	
	$zipname = call_to_zip($filelist);
	$link = get_bloginfo('url').'/'.$zipname.'';
	
	
	
	// make zip file 
	function call_to_zip($filelist)
	{
	
	$upload_dir = wp_upload_dir(); 	
	$zipname = 'order.zip';
	$zip = new ZipArchive;
	$zip->open($zipname, ZipArchive::CREATE);
	if ($handle = opendir($upload_dir['basedir'].'/ordered-images/')) {
	
	for ($i=0;$i<count($filelist); $i++) {
	$str = explode('/',$filelist[$i]);
	$entry = end($str);
	$zip->addFile($upload_dir['basedir'].'/ordered-images/'.$entry, $entry);
	
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


