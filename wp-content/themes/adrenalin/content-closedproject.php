<?php   $user_ID = get_current_user_id();?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content"><?php
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $showposts = -1;
		$projectStatus = 3;
		$args = array(
		'post_type' => 'projects',
		'author'=>$user_ID,
		'posts_per_page' => '10',
		'paged' => $paged,
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => -1,
		'meta_query' => array(
						array(
						'key'     => 'image_project_status',
						'value'   => $projectStatus,
						'compare' => '=',
						'type'    => 'numeric',
						),
				),
		);

		//query_posts( $args );	
		$q = new WP_Query($args);
		while ( $q->have_posts() ) : $q->the_post();
			$pid = get_the_ID();
			$post_date = get_the_date('Y-m-d');
		  $post_time = get_the_time('H:i:s');
			$user_ID = get_current_user_id();
			$args2 = array(
						'post_status' => 'any',
						'post_type'   => 'attachment',
						'posts_per_page'=>-1,
						'author'=> $user_ID,
						'meta_query' => array(
						array(
							'key'     => 'group_id',
							'value'   => get_the_ID(),
							'compare' => '=',
							'type'    => 'numeric',
						),
						array(
							'key'     => 'image_status',
							'value'   => $projectStatus,
							'compare' => '=',
							'type'    => 'numeric',
						),
				),
		);
		$count2 = count(query_posts( $args2 ));
		while(have_posts()) : the_post();
			$feat_image =  wp_get_attachment_url( get_the_ID() );
		endwhile;
		
		wp_reset_query();	
    $img =  vt_resize('',$feat_image,120, 80,false); //Proportionally resize
    ?><div class="col-lg-12 col-md-12">
	    <div class="row border-bot mainlink">
	    	<div class="col-lg-2 col-md-2 col-xs-3 pro-uploaded "><a href="<?php echo get_bloginfo('url').'/closed-project-detail/?pid='.$pid.'';?>"><img src="<?php echo $img['url'] ?>"  /></a><span><strong><a href="<?php echo get_bloginfo('url').'/closed-project-detail/?pid='.$pid.'';?>"><?php echo $count2;?> <?php echo get_string_photos();?></a></strong></span>
	    	</div>
	    
		   <div class="col-lg-10 col-md-10 col-xs-9 pro-uploaded color-bg"> 
		        <div class="col-lg-3 col-md-3"><a href="<?php echo get_bloginfo('url').'/closed-project-detail/?pid='.$pid.'';?>"><strong><?php echo '#'.$pid;?></strong></a></div>
		        <div class="col-lg-3 col-md-3 pull-right"><strong><?php echo get_str_closetxt();?><?php echo '&nbsp;'. $val;?></strong></div>
		    </div>
	  	</div>
    </div>
	
  <?php endwhile;  
   
  if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif; 
  wp_reset_postdata(); // end of the loop.  ?> 
  </div><!-- .entry-content -->
   
</article><!-- #post-## -->
