<?php
/*

	Template Name: Order Summary Final

 
 */
get_header();

?>

<?php cg_get_page_title(); ?>
<?php  update_user_meta($user_ID, 'my_temp_field', '0' );?>


<?php  $upload_dir = wp_upload_dir(); ?> 

<div class="container">
    <div class="content">
	
	
	
	<div class="tunnelicon">
	  <div class="tunnel">
  		<div class="col-lg-3 col-sm-3 col-xs-6 res-mrg-bottom-30">
        <div class="tunnel-iconimg">
          <img src="<?php echo $upload_dir['baseurl']; ?>/icon/upload_photos_inactive.png" width="100px" height="80px" />
        </div>
        <span class="photo-upload-step"><small><?php echo get_str_uploadphoto1();?> </small></span>
      </div>
  		<div class="col-lg-3 col-sm-3 col-xs-6 res-mrg-bottom-30">
        <div class="tunnel-iconimg">
          <img src="<?php echo $upload_dir['baseurl']; ?>/icon/project_review_inactive.png" width="100px" height="80px" />
        </div>
        <span class="photo-upload-step"><small> <?php echo get_str_review_project();?></small></span>
      </div>
  		<div class="col-lg-3 col-sm-3 col-xs-6 res-mrg-bottom-30">
        <div class="tunnel-iconimg">
          <img src="<?php echo $upload_dir['baseurl']; ?>/icon/order_summary_inactive.png" width="100px" height="80px" />
        </div>
        <span class="photo-upload-step"><small><?php echo get_str_ordersummary();?></small></span>
      </div>
  		<div class="col-lg-3 col-sm-3 col-xs-6 res-mrg-bottom-30">
        <div class="tunnel-iconimg">
          <img src="<?php echo $upload_dir['baseurl']; ?>/icon/order_confirmed_active.png" width="100px" height="80px" />
        </div>
        <span class="photo-upload-step"><small>  <?php echo get_str_order_complete();?></small></span>
      </div>
		</div>
  </div>
	
	
        <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-sm-push-8 col-md-push-9 col-lg-push-9">
          <div class="mbgcolr1 topmarginorder">
            <?php get_sidebar('finalorder'); ?>
          </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-sm-pull-4 col-md-pull-3 col-lg-pull-3">
            <div id="primary" class="content-area mbgcolr topmarginorder ">
                <main id="main" class="site-main" role="main">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', 'finalorder' ); ?>

                     <?php endwhile; // end of the loop.  ?>

                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
            
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->





<button style="display:none"  type="button" class="btn btn-primary btn-lg sucessbtn" data-toggle="modal" data-target="#myModal">button</button>




<?php get_footer(); ?>
<?php echo $_GET['action'];?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<?php
if($_GET['action'] == 'done'){?>
	<script>
  	jQuery( document ).ready(function() {
     		jQuery(".sucessbtn").trigger("click");
  	});
  	
    //For GIT-124
  	var onlyUrl = window.location.href.replace('&action=done','');
  </script>
<?php }?>
<!-- popp model window-->
<div class="modal fade <?php if($place=='home'){echo 'homenewpopup'; }?>" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript:location.href = onlyUrl;"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel"></h4>

      </div>
	  
	  <?php $upload_dir = wp_upload_dir(); ?>
      <div class="modal-body">
      
      <div class="mainpop">
            <div class="myimg"><img src="<?php echo $upload_dir['baseurl'];?>/icon/check.png" width="" height=""  /></div>
            <div class="myheading topmargin"><?php echo $ustr = get_str_ordersuccessfully();?></div>
            <div class="msgg topmargin"><span><?php echo $ustr = get_str_msgtxt1();?>  </span></div>
      
      </div>
      
      
      
      
      </div>

      <div class="modal-footer mfooter">

        <button type="button" class="btn btn-defaul mbtn" data-dismiss="modal" onclick="javascript:location.href = onlyUrl;"><?php echo $ustr = get_str_clstxt();?></button>

        <!--<button type="button" class="btn btn-primary">Save changes</button>-->

      </div>

    </div>

  </div>

</div>
<!-- popp model window-->