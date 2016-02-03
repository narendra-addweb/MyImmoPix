<?php 
    if(isset($_GET['pid']) && !empty($_GET['pid']))
    {
        $pid = $_GET['pid'];
    }
	
	//-----------------------------
	$args1 = array(
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
	
 $count3 = count(query_posts( $args1 ));
 while(have_posts()) : the_post();
 $imgstr[] = get_the_id();
 endwhile;  wp_reset_query(); // end of the loop.  ?>

<?php

$totalcredit =  intval(do_shortcode("[usercreditwoocommerce]"));
$upload_dir = wp_upload_dir();
?>

<div id="secondary" class="widget-area topmarginorder" role="complementary">
  
  <div class="row topmargin">
      <div class="col-lg-8 col-md-8"><strong><?php echo $ustr = get_str_ordersummary();?></strong></div>
      
  </div>
  
  <div class="row topmargin">
      <div class="col-lg-8 col-md-8"><?php echo $ustr = get_str_orderfor();?></div>
      <div class="col-lg-2 col-md-2 orderfor"><?php echo $count3;?></div>
  </div>
  
  
  
  <div class="row topmargin">
      <div class="col-lg-8 col-md-8"><?php echo $ustr = get_str_servisecredit();?></div>
      <div class="col-lg-2 col-md-2"><span id="servicetxt"><?php echo $count3;?></span></div>
  </div>
  <div class="row topmargin border-bot">
      <div class="col-lg-8 col-md-8"><?php echo $ustr = get_str_availablecredit();?></div>
      <div class="col-lg-2 col-md-2"><?php echo do_shortcode('[usercreditwoocommerce]');?></div>
  </div>
  
  <?php if($totalcredit >= $count3){?>
	  
  
  
 
  <form name="form" action="" method="post">
  <input type="hidden" name="total_servic_credit" value="<?php echo $count3;?>" id="service-credit-val" />
  <input type="hidden" name="total_servic_order" value="<?php echo $count3;?>" id="service-order" />
  <input type="hidden" name="creditupdate" value="yes" id="" />
  <input type="hidden" name="mediid" value="<?php echo implode(',',$imgstr);?>" id="mymedia" />
  
  <div class="row topmargin border-bot">
      <div class="col-lg-6 col-md-6"><button name="next" type="submit" class="btn btn-md hbtn1"><?php echo $ustr = get_str_order();?>  >> </button>
    
      </div>
  </div>
  </form>
  
  <?php } else {?>
  
  <div class="row topmargin border-bot3 mainlink">
      <div class="col-lg-12 col-md-12">Your available credits is not enough  for this service .  Your available credits is <?php echo do_shortcode('[usercreditwoocommerce]');?> . Please purchase credits By click here  <a href="<?php echo get_bloginfo('url').'/credit/';?>"> Purchase credit</a> </div>
     
  </div>
  
  
  <?php }?>
  
  
</div>

<?php


// update credit



 $n=0;
 $totalcredit =  intval(do_shortcode("[usercreditwoocommerce]"));
 
 // check user
 if(!$user_ID)
 {
	 echo '<script>document.location.href="'.get_bloginfo("url").'/"</script>';
	 exit;
 }
 
 
 // update credit
 
 if($_POST['creditupdate']=="yes" && $_POST['total_servic_order']>0 )
 {
	 
	$order = $_POST['total_servic_order'];
	
	$media =  explode(',',$_POST['mediid']); 
	foreach($media as $val)
	{
	if(!empty($val))
	$myarr [$n++] =  $val;
	
	}
	
	if($totalcredit>0 && $totalcredit >= count($myarr) )
	{
	foreach($myarr as $id)
	{
		updatcredit($id);
		update_post_meta($id, 'image_status' , '2');
	}
	update_post_meta($_GET['pid'],'image_project_status','2');
	echo '<script>document.location.href="'.get_bloginfo("url")."/order-summary-final/?&pid=".$_GET['pid']."&order=".$order."".'&action=done"</script>';
	exit;
	
	}
	
	else
	{
	echo '<script>document.location.href="'.get_bloginfo("url")."/order-summary/?pid=".$_GET['pid'].'&action=no"</script>';
	exit;
	
	}
 
 
 }
 

?>