<?php
	
	if(isset($_GET['pid']) && !empty($_GET['pid']))
	$pid = $_GET['pid'];
	
	
	
	
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
	
?>
<?php 


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
	
 	
?> 	



<div id="secondary" class="widget-area" role="complementary">
  
  
  <div class="row topmargin mainlink">
      <div class="col-lg-12 col-md-12"><strong><?php echo get_str_projectstatus()?> &nbsp; <?php echo get_str_closetxt()?></strong></div>
     
      <div> <a href="/<?php echo $zipname;?>"><?php echo get_str_downloadzip()?></a></div>
  </div>
  
  
</div>