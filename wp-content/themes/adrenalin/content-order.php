<?php   $user_ID = get_current_user_id();?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content margleft">
       
	
    <div class="row topmargin"> 
       <?php  if($_GET['action'] == 'no'){?>
        <div class="col-lg-8 col-md-8 errorsmsg"><?php echo 'you are not  credited , Please try again.Purchase credit if your credits is not sufficient';?></div>
        <?php }?>
     </div>
    	
        
	<?php 
    if(isset($_GET['pid']) && !empty($_GET['pid']))
    {
        $pid = $_GET['pid'];
    }
	
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
	?>
    
	
    
       <div class="row topmargin">  <div class="col-lg-12 col-md-12">
            <div class="col-lg-3 col-md-3"><strong><?php echo $ustr = get_str_Project();?><?php echo '#'.$pid;?></strong></div>
       </div></div>
        
       
       			
       
                <div class="row topmargin border-bot1">
                   
                   
					<?php
                    $i=0;
                    while(have_posts()) : the_post();
                    $feat_image =  wp_get_attachment_url( get_the_ID() );
                    $img =  vt_resize('',$feat_image,200, 120,false); //Proportionally resize
                    ?>
                   
                    <div class="col-lg-6 col-sm-6 col-xs-6 upload-edit-img">
                       
                       <div class="row">
                       <div class="col-lg-3 col-md-3"><img src="<?php echo $img['url'] ?>"  /> <span class="imgid" ><strong><?php echo '#'.get_the_id();?></strong></span></div>
                       
                         <div class="col-lg-9 col-md-9 radiotxt"> 
                        <span><label><input type="radio" name="editstatus<?php echo $i;?>" value="1" id="<?php echo get_the_id();?>" checked="checked" />&nbsp;<?php echo $ustr = get_str_editings();?> (1 <?php echo $ustr = get_str_credit();?>)</label></span>
                        <span><label><input type="radio" name="editstatus<?php echo $i;?>" value="0" id="<?php echo get_the_id();?>" />
                        <?php echo $ustr = get_str_noediting();?></label></span>
                        </div>
                        
                        </div>
                        
                        
                     </div>
                     
          <?php $i++;?>
         <?php endwhile;  wp_reset_query(); // end of the loop.  ?> 
                     
                     
                     
                    
                 </div> 
                
        
        
    </div><!-- .entry-content -->
   
   
   
   
    <div class="container">
        <?php //edit_post_link( __( 'Edit', 'commercegurus' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    </div>
</article><!-- #post-## -->
