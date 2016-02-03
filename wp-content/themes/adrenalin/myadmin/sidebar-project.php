<?php
	$args2 = array(
	'post_type'   => 'projects',
	'posts_per_page'=>-1,
	'author'=> $user_ID,
	'meta_query' => array(
	array(
	'key'     => 'image_project_status',
	'value'   => 1,
	'compare' => '=',
	'type'    => 'numeric',
	),
	),
	);
	$mcount1 = count(query_posts( $args2 ));
	while(have_posts()) : the_post();
	endwhile;
	wp_reset_query();	
?>


<?php
	$args2 = array(
	'post_type'   => 'projects',
	'posts_per_page'=>-1,
	'author'=> $user_ID,
	'meta_query' => array(
	array(
	'key'     => 'image_project_status',
	'value'   => 2,
	'compare' => '=',
	'type'    => 'numeric',
	),
	),
	);
	$mcount2 = count(query_posts( $args2 ));
	while(have_posts()) : the_post();
	endwhile;
	wp_reset_query();	
?>


<?php
	$args2 = array(
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
	$mcount3 = count(query_posts( $args2 ));
	while(have_posts()) : the_post();
	endwhile;
	wp_reset_query();	
?>
<div id="secondary" class="widget-area" role="complementary">
  
  
  <div class="row topmargin">
      <div class="col-lg-12 col-md-12"><strong><?php  if(ICL_LANGUAGE_CODE == 'fr'){echo "Liste des projets";}else if(ICL_LANGUAGE_CODE == 'ln'){
		  echo "Lijst projecten";}else {echo "Project list";}?></strong></div>
      
  </div>
  <?php
  
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
  ?>
  
  <div class="row topmargin mainlink">
      <div class="col-lg-8 col-md-8 "><strong><a href="<?php echo get_bloginfo('url').'/?p='.$gotopage.'/'?>"><?php echo $ustr = get_str_upload();?></a></strong></div>
      <div class="col-lg-2 col-md-2"><strong><a href="<?php echo get_bloginfo('url').'/?p='.$gotopage.'/'?>"><?php echo $mcount1;?></a></strong></div>
  </div>
  
  <div class="row topmargin mainlink">
      <div class="col-lg-8 col-md-8"><strong><a href="<?php echo get_bloginfo('url').'/?p='.$gotopage.'&ptype=2'?>"><?php echo $ustr = get_str_editing();?>
	 </a></strong></div>
      <div class="col-lg-2 col-md-2"><strong><a href="<?php echo get_bloginfo('url').'/?p='.$gotopage.'&ptype=2'?>"><?php echo $mcount2;?></a></strong></div>
  </div>
  
  <div class="row topmargin mainlink">

      <div class="col-lg-8 col-md-8"><strong><a href="<?php echo get_bloginfo('url').'/closed-projects/'?>"><?php echo $ustr = get_str_closed();?>
	  </a></strong></div>
      <div class="col-lg-2 col-md-2"><strong><a href="<?php echo get_bloginfo('url').'/closed-projects/'?>"><?php echo $mcount3;?></a></strong></div>
  </div>
  
  
</div>


<div id="secondary" class="widget-area" role="complementary">
  
  
  <div class="row topmargin">
      <div class="col-lg-12 col-md-12"><strong><?php echo $ustr = get_str_search();?>
	  </strong></div>
      
  </div>
  
  
  <div class="row topmargin ">
      
      <form name="form" action="" method="get">
      <div class="col-lg-8 col-md-8 ">
      <input type="text" name="your_project_title" value="<?php echo trim($_GET['your_project_title']);?>" placeholder="<?php echo $ustr = get_str_placeholder_title();?>"  /></div>
      <div class="col-lg-6 col-md-6 topmargin "><button type="submit" name="search" class="btn btn-primary msearchbtn">
	  <?php echo $ustr = get_str_searchtxt();?></button></div>
      </form>
  </div>
  
   
  
</div>