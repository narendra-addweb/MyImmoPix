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
       
	  	<div class="col-lg-12 col-md-12 tunnel">
		<div class="col-lg-3 col-md-3 tunnel-iconimg"><img src="<?php echo $upload_dir['baseurl']; ?>/icon/upload_photos_inactive.png" width="100px" height="80px" /></div>
		<div class="col-lg-3 col-md-3 tunnel-iconimg"><img src="<?php echo $upload_dir['baseurl']; ?>/icon/project_review_inactive.png" width="100px" height="80px" /></div>
		<div class="col-lg-3 col-md-3 tunnel-iconimg"><img src="<?php echo $upload_dir['baseurl']; ?>/icon/order_summary_active.png" width="100px" height="80px" /></div>
		<div class="col-lg-3 col-md-3 tunnel-iconimg"><img src="<?php echo $upload_dir['baseurl']; ?>/icon/order_confirmed_inactive.png" width="100px" height="80px" /></div>
		
		</div>
		
    </div>
	
	<div class="col-lg-12 col-md-12 tunnel">
	<div class="col-lg-3 col-md-3"><span>1 <small><?php echo get_str_uploadphoto1();?> </small></span></div>
	<div class="col-lg-3 col-md-3"><span>2 <small> <?php echo get_str_review_project();?></small></span></div>
	<div class="col-lg-3 col-md-3"><span>3 <small><?php echo get_str_ordersummary();?></small></span></div>
	<div class="col-lg-3 col-md-3"><span>4 <small>  <?php echo get_str_order_complete();?></small></span></div>
	</div>
	   
	
	
        <div class="row">
        
		 <div class="col-lg-12 col-md-12">
		
		
		 <div class="col-lg-7 col-ms-7 col-md-7  topmargin-price ">
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
		
		
		
		
		 <div class="col-lg-5 col-ms-5 col-md-5  topmargin-price ">
					<div class="mbgcolr1"><?php get_sidebar('order'); ?></div>
				</div>
		  
		   </div>
			
		</div>	
            
            
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->

<?php get_footer(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>

	$("input[type='radio']").change(function () {
	var selection=$(this).val();
	var k =0;
	var j = ',' ;
	$('input:radio').each(function() {
	if($(this).is(':checked') && $(this).val()==1) {
	j = j + this.id + ',';
	k++; 
	
	}
	else {
	}
	});
	
	$('#servicetxt').html(k);
	$('#servicetxt2').html(k);
	$('.orderfor').html(k);
	
	$('#service-credit-val').val(k);
	$('#service-order').val(k);
	$('#mymedia').val(j);
	});


</script>