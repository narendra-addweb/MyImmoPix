

<?php
	
	// fetch project of status = 3
	$arg2 = array(
	'post_type'   => 'projects',
	'posts_per_page'=>-1,
	'author'=> $user_ID,
	'meta_query' => array(
	array(
	'key'     => 'image_project_status',
	'value'   => 3,
	'compare' => '=',
	'type'    => 'numeric',
	),
	),
	);
	$q = new WP_Query($arg2);
	while ( $q->have_posts() ) : $q->the_post();
	
	 $project_id = get_the_ID();
	 $post_date = get_the_date('Y-m-d');
				
	$date = date_i18n('Y-m-d');
	$mdate = $post_date;
	$sq = "SELECT DATEDIFF('".$date."','".$mdate."') AS DiffDate";
	$rst = mysql_query($sq);
	$day = mysql_result($rst,'0','DiffDate');
		
		
		
		$args3 = array(
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
						'value'   => 3,
						),
						),
						);
		
		
		query_posts( $args3 );
		
		if($day >= 90)
		{
			
			
			while(have_posts()) : the_post();
			
			// trash image
			 wp_trash_post( get_the_ID()  ); 
			
			endwhile;
			wp_reset_query();	
			
			// trash code project
			wp_trash_post( $project_id  ); 
			
		
		}
		
		
				
	endwhile;
	wp_reset_postdata(); // end of the loop.  
?>


