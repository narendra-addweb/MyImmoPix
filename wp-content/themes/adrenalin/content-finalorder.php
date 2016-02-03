<?php    $user_ID = get_current_user_id();?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
       
		
        
	<?php 
	
    if(isset($_GET['pid'])  )
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
            <div class="col-lg-3 col-md-3"><strong><?php echo 'Project #'.$pid;?></strong></div>
       </div></div>
        
       
       			<?php
				$i=0;
                while(have_posts()) : the_post();
                $feat_image =  wp_get_attachment_url( get_the_ID() );
                $img =  vt_resize('',$feat_image,200, 120,true); 
                ?>
       
                
                
        <?php $i++;?>
         <?php endwhile;  wp_reset_query(); // end of the loop.  ?> 
        
    </div><!-- .entry-content -->
   
   
   
   
    <div class="container">
        <?php edit_post_link( __( 'Edit', 'commercegurus' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    </div>
</article><!-- #post-## -->
