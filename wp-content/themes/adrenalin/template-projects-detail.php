<?php


/*



Template Name: Project Detail

 

 */


get_header();
 
?>



<?php cg_get_page_title(); ?>

<?php get_template_part('manage' ,'closed-project-status' ); ?> 

<?php
$user_ID = get_current_user_id();
if(!$user_ID)
{
echo '<script>document.location.href="'.get_bloginfo("url").'/"</script>';
exit;
}


if(!isset($_GET['pid']) && empty($_GET['pid']) && $_GET['pid'] == '' )
{
	$project_id = get_post_meta( $user_ID, 'my_temp_field', true );
	 
	   if(ICL_LANGUAGE_CODE == 'fr')
		   {
		   	$gotopage = '69217';
		   }
		   else if(ICL_LANGUAGE_CODE == 'nl')
		   {
		   	$gotopage = '69216';
		   }
		   else if(ICL_LANGUAGE_CODE == 'en')
		   {
		   	$gotopage = '67546';
		   }
	echo '<script>document.location.href="'.get_bloginfo('url').'/?p='.$gotopage.'&pid='.$project_id.'"</script>';
	exit;
	
	
}

?>

<?php  update_post_meta($user_ID, 'my_temp_field', '0' );?>
<?php  $upload_dir = wp_upload_dir(); ?> 

<div class="container">
    <div class="content">
       
	   
	   <div class="tunnelicon">
       
	  	<div class="col-lg-12 col-md-12 tunnel">
		<div class="col-lg-3 col-md-3 tunnel-iconimg"><img src="<?php echo $upload_dir['baseurl']; ?>/icon/upload_photos_inactive.png" width="100px" height="80px" /></div>
		<div class="col-lg-3 col-md-3 tunnel-iconimg"><img src="<?php echo $upload_dir['baseurl']; ?>/icon/project_review_active.png" width="100px" height="80px" /></div>
		<div class="col-lg-3 col-md-3 tunnel-iconimg"><img src="<?php echo $upload_dir['baseurl']; ?>/icon/order_summary_inactive.png" width="100px" height="80px" /></div>
		<div class="col-lg-3 col-md-3 tunnel-iconimg"><img src="<?php echo $upload_dir['baseurl']; ?>/icon/order_confirmed_inactive.png" width="100px" height="80px" /></div>
		
		</div>
		
    </div>
	
	<div class="col-lg-12 col-md-12 tunnel">
	<div class="col-lg-3 col-md-3">1 <span><small><?php echo get_str_uploadphoto1();?> </small></span></div>
	<div class="col-lg-3 col-md-3">2 <span><small> <?php echo get_str_review_project();?></small></span></div>
	<div class="col-lg-3 col-md-3">3 <span><small><?php echo get_str_ordersummary();?></small></span></div>
	<div class="col-lg-3 col-md-3">4 <span><small>  <?php echo get_str_order_complete();?></small></span></div>
	</div>
	   
	    <div class="row">
       
      
       
	   <div class="col-lg-12 col-md-12">
	  	<div class="col-lg-7 col-ms-7 col-md-7  topmargin-price">
                <div id="primary" class="content-area mbgcolr">
                    <main id="main" class="site-main" role="main">

                       <?php get_template_part( 'content', 'projectdetail' ); ?>

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
	  
		  <div class="col-lg-5 col-ms-5 col-md-5  topmargin-price ">
					<div class="mbgcolr1"><?php get_sidebar('service'); ?></div>
				</div>
		  
		   </div>
	   
	   
       
        
            
            
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
$( document ).ready(function() {

// on button click
	$( "input[name = 'mybutton']" ).click(function() {
	var id = this.id;	
	$(".dftbtn").trigger("click");
	});


//on image click

	$("img").click(function() {
	var id = this.id;	
	
	$('#div'+id).html('<img width="32" height="32" src="<?php echo $upload_dir['baseurl']."/icon/ajax_loader.gif"?>" class=""/>');
	
	$.ajax({
	type: "POST",
	datatype: 'json',
	url: "<?php  bloginfo( 'template_url' ); ?>/delete-image-ajax.php",
	data: {id: id}, // serializes the form's elements.
	success: function(data)
	{
	if(data == 1)
	{
	//$('#div'+id).html('<div class="deldiv">Deleted !</div>');
	$('#div'+id).remove();
	}
	
	
	}
	
	});
	
	
	
	});

//on image click

});




</script>
<?php get_footer(); ?>
