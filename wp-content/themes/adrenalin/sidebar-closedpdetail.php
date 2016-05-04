<?php
	
if(isset($_GET['pid']) && !empty($_GET['pid']))
	$pid = $_GET['pid'];

$zipname = createZIPOfClosedProject($pid);
$downldLink = str_replace('/' . ICL_LANGUAGE_CODE, '',get_bloginfo("url"));
	
@header('Content-Type: application/zip');
@header("Content-Disposition: attachment; filename='".$zipname."'");
@header('Content-Length: ' . filesize($zipname));
@header("Location: http://www.myimmopix.com/".$zipname."");
?><div id="secondary" class="widget-area mbgcolr1" role="complementary">
	<div class="row topmargin mainlink close-sidebar">
	  <div class="col-lg-12 col-md-12"><strong><?php echo get_str_projectstatus()?> &nbsp; <?php echo get_str_closetxt()?></strong></div>
	  <div class="download-zip"> <a href="<?php echo $downldLink ?>/downloadimg.php?zip=<?php echo str_replace(get_bloginfo("url") . '/',"",'wp-content/uploads/uploadedzip/'.$zipname); ?>"><?php echo get_str_downloadzip()?></a></div>
	</div>
</div>

<?php





