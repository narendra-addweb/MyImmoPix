<?php
	
if(isset($_GET['pid']) && !empty($_GET['pid']))
	$pid = $_GET['pid'];

$zipname = createZIPOfClosedProject($pid, TRUE);
$downldLink = str_replace('/' . ICL_LANGUAGE_CODE, '',get_bloginfo("url"));
	
?><div id="secondary" class="widget-area mbgcolr1" role="complementary">
	<div class="row topmargin mainlink close-sidebar">
	  <div class="col-lg-12 col-md-12"><strong><?php echo get_str_projectstatus()?> &nbsp; <?php echo get_str_closetxt()?></strong></div>
	  <div class="download-zip"> <a href="<?php echo $downldLink ?>/downloadimg.php?zip=<?php echo str_replace(get_bloginfo("url") . '/',"",'wp-content/uploads/uploadedzip/'.$zipname); ?>&pid=<?php echo $pid; ?>"><?php echo get_str_downloadzip()?></a></div>
	</div>
</div>

<?php





