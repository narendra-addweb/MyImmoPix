<?php
	
if(isset($_GET['pid']) && !empty($_GET['pid']))
	$pid = $_GET['pid'];
	
$projectStatus = 3;
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
		array(
			'key'     => 'image_status',
			'value'   => $projectStatus,
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

//Create ZIP ARCHIVE from images...
$zipname = 'order-'.$pid.'.zip';
$files_to_zip = array();
foreach ($filelist as $file) {
	$path = parse_url($file, PHP_URL_PATH);
		
	//To get the dir, use: dirname($path)
	$inprocess_image_path = $_SERVER['DOCUMENT_ROOT'] . $path;
	$files_to_zip[] = $inprocess_image_path;
}
//if true, good; if false, zip creation failed
$result = create_zip($files_to_zip,'wp-content/uploads/uploadedzip/'.$zipname);

/*$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE);
$zipname = 'order-'.$pid.'.zip';
$upload_dir = wp_upload_dir(); 
if ($handle = opendir($upload_dir['basedir'].'/uploadedzip/')) {
	foreach ($filelist as $file) {
		$path = parse_url($file, PHP_URL_PATH);
			
		//To get the dir, use: dirname($path)
		$inprocess_image_path = $_SERVER['DOCUMENT_ROOT'] . $path;
		$files_to_zip[] = $inprocess_image_path;
		$str = explode('/',$file);
		$entry = end($str);
		$zip->addFile('uploadedzip/'.$entry, $entry);		
	}
}
closedir($handle);
$zip->close();*/

@header('Content-Type: application/zip');
@header("Content-Disposition: attachment; filename='".$zipname."'");
@header('Content-Length: ' . filesize($zipname));
@header("Location: http://www.myimmopix.com/".$zipname."");
?><div id="secondary" class="widget-area" role="complementary">
	<div class="row topmargin mainlink">
	  <div class="col-lg-12 col-md-12"><strong><?php echo get_str_projectstatus()?> &nbsp; <?php echo get_str_closetxt()?></strong></div>
	  <div> <a href="<?php echo get_bloginfo("url") ?>/downloadimg.php?zip=<?php echo str_replace(get_bloginfo("url") . '/',"",'wp-content/uploads/uploadedzip/'.$zipname); ?>"><?php echo get_str_downloadzip()?></a></div>
	</div>
</div>

<?php

/* creates a compressed zip file */
function create_zip($files = array(), $destination = '',$overwrite = false) {
    
    //Create folder if not exits...
    if (!file_exists('wp-content/uploads/uploadedzip/')) {
		  $oldmask = umask(0);
		  mkdir('wp-content/uploads/uploadedzip/', 0777, true);
		  umask($oldmask);
		}

		//if the zip file already exists and overwrite is false, return false
    if(file_exists($destination) && !$overwrite) { return false; }
    //vars
    $valid_files = array();
    //if files were passed in...
    if(is_array($files)) {
        //cycle through each file
        foreach($files as $file) {
            //make sure the file exists
            if(file_exists($file)) {
                $valid_files[] = $file;
            }
        }
    }
    //if we have good files...
    if(count($valid_files)) {
        //create the archive
        $zip = new ZipArchive();
        if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
            return false;
        }
        //add the files
        foreach($valid_files as $file) {
            $zip->addFile($file,$file);
        }
        //debug
        //echo 'The zip archive contains ',$zip-&gt;numFiles,' files with a status of ',$zip-&gt;status;
 
        //close the zip -- done!
        $zip->close();
 
        //check to make sure the file exists
        return file_exists($destination);
    }
    else
    {
        return false;
    }
}



