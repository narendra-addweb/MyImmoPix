<?php   $user_ID = get_current_user_id();?>
<?php $upload_dir = wp_upload_dir(); ?>







<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        
    	<?php 
			if(isset($_GET['pid']) && !empty($_GET['pid'])){
			$pid = $_GET['pid'];
			}
			else{
				if(ICL_LANGUAGE_CODE == 'fr')
				{
				$gotopage = '69190';
				}
				else if(ICL_LANGUAGE_CODE == 'nl')
				{
				$gotopage = '69189';
				}
				else if(ICL_LANGUAGE_CODE == 'en')
				{
				$gotopage = '67465';
				}
			echo '<script>document.location.href="'.get_bloginfo("url").'/?p='.$gotopage.'/"</script>';
			exit;
			}
	
		
        $showposts = -1;
		$args = array(
		'post_type' => 'projects',
		'author'=>$user_ID,
		'orderby' => 'post_title',
		'order' => 'ASC',
		'posts_per_page' => -1,
		'p' => $pid,
		
		);

		//query_posts( $args );	
		$q = new WP_Query($args);
		while ( $q->have_posts() ) : $q->the_post();
        $pid = get_the_ID();
		$post_date = get_the_date('Y-m-d');
	    $post_time = get_the_time('H:i:s');
		endwhile;  wp_reset_postdata(); // end of the loop.  
	
		$date = date_i18n('Y-m-d H:i:s');
		$mdate = $post_date.' '.$post_time;
	  
	  /*$seconds = strtotime($date)- strtotime($mdate);
		$time = time_to_his($seconds);*/
	
	//-----------------------------
	$strTimeAgo = get_string_upload($mdate);
	
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
						),
						),
						);
   $count2 = count(query_posts( $args2 ));
	?>
    
	<?php $v = get_str_upload();?>
    
       <div class="row">  <div class="col-lg-12 col-md-12">
            <div class="col-lg-3 col-md-3 col-xs-6"><strong><?php echo '#'.$pid;?></strong></div>
            <div class="col-lg-3 col-md-3 col-xs-6"><strong><span id="cntPhoto"><?php echo $count2;?></span> <?php print(get_string_photo());?></strong></div>
            <div class="col-lg-6 col-md-6"><strong><?php echo $strTimeAgo;?></strong></div>
           
		   <?php 
		   if(ICL_LANGUAGE_CODE == 'fr')
		   {
		   	$gotopage = '69199';
		   }
		   else if(ICL_LANGUAGE_CODE == 'nl')
		   {
		   	$gotopage = '69198';
		   }
		   else if(ICL_LANGUAGE_CODE == 'en')
		   {
		   	$gotopage = '66607';
		   }
		   
		   
		   ;?>
		    
            
            
            
        </div></div>
        
        <div class="row topmargin"><div class="col-lg-12 col-md-12">
        
        
                <div class="" id="divPhoto">
                <?php
                while(have_posts()) : the_post();
                $feat_image =  wp_get_attachment_url( get_the_ID() );
                $img =  vt_resize('',$feat_image,350, 200,false);//Proportionally resize
			 	$image_notes = get_post_meta( get_the_id() , 'image_notes'  , true); 
                ?>
                
              	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 uploaded-img divimage" id="div<?php echo get_the_id();?>">
                
				
				<div class="crossimage"><img id="<?php echo get_the_id();?>" src="<?php echo $upload_dir['baseurl'].'/icon/cross.png' ?>"  /></div>
                
                <img src="<?php echo $img['url'] ?>"  />
                <span class="imgid" ><strong><?php echo '#'.get_the_id();?></strong></span></div>
                
                <?php endwhile;  wp_reset_query(); // end of the loop.  ?> 
                </div>
        </div></div> 
        
    </div><!-- .entry-content -->
   
   
   
   
   
</article><!-- #post-## -->
