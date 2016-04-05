<?php    $user_ID = get_current_user_id();?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content"><?php 
		
	    if(isset($_GET['pid'])  )
	    {
	      $pid = $_GET['pid'];
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
	 	
			 $seconds = strtotime($date)- strtotime($mdate);
			 $time = time_to_his($seconds);
			//-----------------------------
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
								),
								);
			$count2 = count(query_posts( $args2 ));
			$strTimeAgo = get_string_upload($mdate);
			?><div class="row topmargin">  <div class="col-lg-12 col-md-12">
          <div class="col-lg-3 col-md-3"><strong><?php echo '#'.$pid;?></strong></div>
          <div class="col-lg-3 col-md-3"><strong><?php echo $count2;?> Photos</strong></div>
          <div class="col-lg-3 col-md-3"><strong><?php echo  $strTimeAgo;?></strong></div>
          <div class="col-lg-3 col-md-3"></div>
      </div> </div>
			<div class="row topmargin">  
       	<div class="col-lg-12 col-md-12"><?php
          $i=0;
		      while(have_posts()) : the_post();
			      $feat_image =  wp_get_attachment_url( get_the_ID() );
			      $img =  vt_resize('',$feat_image,200, 120,false); //Proportionally resize
			      $i++;
			      $image_notes = get_post_meta( get_the_id() , 'image_notes'  , true); 

			      ?><div class="col-lg-2 col-md-2 divimage" id="div<?php echo get_the_id();?>">
		               
		                
		        <img src="<?php echo $img['url'] ?>"  />
		        <span class="imgid" ><strong><?php echo '#'.get_the_id();?></strong></span><span><!--<input type="button" name="mybutton" class="btn btn-primary btn-sm dftbtn dftbtn<?php //echo get_the_ID();?>" data-toggle="modal" data-target="#myModal<?php //echo get_the_ID();?>"   id="<?php //echo get_the_ID();?>"  value="image Notes" />--></span></div><?php
		        
		       
		      endwhile;  wp_reset_query(); // end of the loop.  ?> 
       	</div>
      </div>
    </div><!-- .entry-content -->
   
   
   
   
    <div class="container">
        <?php edit_post_link( __( 'Edit', 'commercegurus' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    </div>
</article><!-- #post-## -->
