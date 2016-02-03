<?php

define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */

require( '../../../wp-config.php' );


global $wpdb;

$user_ID = get_current_user_id();
$pid = $_POST['id'];
$post_author_id = get_post_field( 'post_author', $pid );

if($user_ID == $post_author_id){



$args2 = array(
						'post_status' => 'any',
						'post_type'   => 'attachment',
						'posts_per_page'=>-1,
						'author'=> $user_ID,
						'meta_query' => array(
						array(
						'key'     => 'group_id',
						'value'   => trim($pid),
						'compare' => '=',
						),
						),
						);
	query_posts( $args2 );
	while(have_posts()) : the_post();
	wp_delete_attachment( get_the_ID() );
	endwhile;
	wp_reset_query();	
	
	
	$status = 	wp_delete_post($pid);
	

}

	if($status)
	echo 1;
	else
	echo 0;

?>