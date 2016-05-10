<?php
/*

	Template Name: Order Summary

 
 */
get_header();

?>

<?php cg_get_page_title(); ?>


<?php  $upload_dir = wp_upload_dir(); ?> 

<div class="container">
    <div class="content">
	
	
    <div class="tunnelicon">
      <div class="tunnel">
        <div class="col-lg-3 col-sm-3 col-xs-6 res-mrg-bottom-30">
          <div class="tunnel-iconimg">
            <img src="<?php echo $upload_dir['baseurl']; ?>/icon/upload_photos_inactive.png" width="100px" height="80px" />
          </div>
          <span class="photo-upload-step">1 <small><?php echo get_str_uploadphoto1();?> </small></span>
        </div>
        <div class="col-lg-3 col-sm-3 col-xs-6 res-mrg-bottom-30">
          <div class="tunnel-iconimg">
            <img src="<?php echo $upload_dir['baseurl']; ?>/icon/project_review_inactive.png" width="100px" height="80px" />
          </div>
          <span class="photo-upload-step">2 <small> <?php echo get_str_review_project();?></small></span>
        </div>
        <div class="col-lg-3 col-sm-3 col-xs-6 res-mrg-bottom-30">
          <div class="tunnel-iconimg">
            <img src="<?php echo $upload_dir['baseurl']; ?>/icon/order_summary_active.png" width="100px" height="80px" />
          </div>
          <span class="photo-upload-step">3 <small><?php echo get_str_ordersummary();?></small></span>
        </div>
        <div class="col-lg-3 col-sm-3 col-xs-6 res-mrg-bottom-30">
          <div class="tunnel-iconimg">
            <img src="<?php echo $upload_dir['baseurl']; ?>/icon/order_confirmed_inactive.png" width="100px" height="80px" />
          </div>
          <span class="photo-upload-step">4 <small>  <?php echo get_str_order_complete();?></small></span>
        </div>
      </div>
    </div>

    <div class="row">
		 <div class="col-lg-12 col-md-12">
		
		
		  <div class="col-lg-7 col-sm-8 topmargin-price ">
                <div id="primary" class="content-area mbgcolr">
                    <main id="main" class="site-main" role="main">

                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php get_template_part( 'content', 'order' ); ?>

                            <?php
                            $cg_comments_status = $cg_options['cg_page_comments'];
                            if ( $cg_comments_status == 'yes' ) {
                                if ( comments_open() || '0' != get_comments_number() ) {
                                    comments_template();
                                }
                            }
                            ?>

                        <?php endwhile; // end of the loop.  ?>

                    </main><!-- #main -->
                </div><!-- #primary -->
      </div>

		  <div class="col-lg-5 col-sm-4 topmargin-price ">
					<div class="mbgcolr1"><?php get_sidebar('order'); ?></div>
				</div>
		  
		   </div>
			
		</div>	
            
            
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->

<?php get_footer(); ?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<script>

	jQuery("input[type='radio']").change(function () {
	var selection=jQuery(this).val();
	var k =0;
	var j = ',' ;
	jQuery('input:radio').each(function() {
	if(jQuery(this).is(':checked') && jQuery(this).val()==1) {
	j = j + this.id + ',';
	k++; 
	
	}
	else {
	}
	});
	
	jQuery('#servicetxt').html(k);
	jQuery('#servicetxt2').html(k);
	jQuery('.orderfor').html(k);
	
	jQuery('#service-credit-val').val(k);
	jQuery('#service-order').val(k);
	jQuery('#mymedia').val(j);
	});


</script>