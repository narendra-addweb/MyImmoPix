<?php

/*

	Template Name: All Ordered Image

 
*/
 
get_header();
?>
<?php cg_get_page_title(); ?>

<?php   
$user_ID = get_current_user_id();
if(!$user_ID){
	echo '<script>document.location.href="'.get_bloginfo("url").'/"</script>';
	exit;
}
?>


<?php  $upload_dir = wp_upload_dir();?> 

<div class="container">
   
<?php  



// script for getting omages of status = 2	 and make zip file for download
	
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
	
	$count =  count(query_posts($args));
	$q = new WP_Query($args);
	 
	while ( $q->have_posts() ) : $q->the_post();
 	$feat_image =  wp_get_attachment_url( get_the_ID() );
	
	$featym = explode('uploads',$feat_image);
	$featym[1] = ltrim($featym[1],'/');
	$featval = explode('/',$featym[1]);
	
	$str = explode('/',$feat_image);
	$entry = end($str);
	$file_name = get_the_id().'__'.$entry;
	
	copy($upload_dir['basedir'].'/'.$featval[0].'/'.$featval[1].'/'.end($str),$upload_dir['basedir']."/ordered-images/".$file_name);
	$filelist[] = $file_name;
	endwhile;
	wp_reset_postdata();
	
	if($count>0){
	$zipname = call_to_zip($filelist);
	$link = get_bloginfo('url').'/'.$zipname.'';
	}
	
	
	// make zip file 
	function call_to_zip($filelist)
	{
	
	$upload_dir = wp_upload_dir(); 	
	$zipname = 'client-order.zip';
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
	//echo $count;
	
	?>
   
	
    <div class="content">
    
        <div class="row">
            <div class="col-lg-9 col-md-9 col-md-push-3 col-lg-push-3 pull-2">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
<?php if($count>0){?>
                     <div class="mtext"><strong>Please referesh page before download !</strong></div>  
					 <div class="ordercls"><a href="<?php echo get_bloginfo('url').'/'.$zipname.'';?>">download all ordered images</a></div>  
<?php }else if($count==0){?>
<div class="mtext"><strong>You dont have any attachment of status 2 !</strong></div>  
<?php }?>						

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
            <div class="col-lg-3 col-md-3 col-md-pull-9 col-lg-pull-9">
                <?php //get_sidebar(); ?>
            </div>
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->

<?php get_footer(); ?>