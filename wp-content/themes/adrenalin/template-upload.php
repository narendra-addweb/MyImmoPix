<?php

/*
	Template Name: Upload Photos
*/
 
get_header();
?>
<?php cg_get_page_title(); ?>

<?php   $user_ID = get_current_user_id();

if(!$user_ID)
{
	echo '<script>document.location.href="'.get_bloginfo("url").'/"</script>';
	exit;
}

?>
<?php get_template_part('update','edited-image-status');?>

<?php  $upload_dir = wp_upload_dir(); ?> 

<div class="container">
   
   
   <div class="tunnelicon">
       
	  	<div class="col-lg-12 col-md-12 tunnel">
		<div class="col-lg-3 col-md-3 tunnel-iconimg">
            <img src="<?php echo $upload_dir['baseurl']; ?>/icon/upload_photos_active.png" width="100px" height="80px" />
            <span class="photo-upload-step">1 <small><?php echo get_str_uploadphoto1();?> </small></span>
        </div>
		<div class="col-lg-3 col-md-3 tunnel-iconimg">
            <img src="<?php echo $upload_dir['baseurl']; ?>/icon/project_review_inactive.png" width="100px" height="80px" />
            <span class="photo-upload-step">2 <small> <?php echo get_str_review_project();?></small></span>
        </div>
		<div class="col-lg-3 col-md-3 tunnel-iconimg">
            <img src="<?php echo $upload_dir['baseurl']; ?>/icon/order_summary_inactive.png" width="100px" height="80px" />
            <span class="photo-upload-step">3 <small><?php echo get_str_ordersummary();?></small></span>
        </div>
		<div class="col-lg-3 col-md-3 tunnel-iconimg">
            <img src="<?php echo $upload_dir['baseurl']; ?>/icon/order_confirmed_inactive.png" width="100px" height="80px" />
            <span class="photo-upload-step">4 <small><?php echo get_str_order_complete();?></small></span>
        </div>
		
		</div>
		
    </div>

    <div class="content">
    
        <?php if(isset($_GET['pid']) &&  !empty($_GET['pid'])){?>
        <div class="row myupload">
            <?php  update_post_meta($user_ID, 'my_temp_field', trim($_GET['pid']) );?>
            <!--<div class="col-lg-9 col-md-9 col-md-push-3 col-lg-push-3 uploaddiv"><?php echo  get_str_oruploadmorephoto();?>[<?php echo '#'. trim($_GET['pid']);?>]</div>-->
        </div>
    	<?php }?>
    
    
    
        <div class="row">
            <div class="col-lg-9 col-md-9 col-md-push-3 col-lg-push-3">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">

                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php get_template_part( 'content', 'upload' );?>


                            <?php endwhile; // end of the loop.  ?>
						
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