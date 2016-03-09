<?php   $user_ID = get_current_user_id();

if(isset($_GET['ptype']) && !empty($_GET['ptype']))
{
	$val = $_GET['ptype'];
	if(ICL_LANGUAGE_CODE == 'fr')
	{
	$head = "Projets : Projets en retouche";
	}
	
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
	$head = "Projecten : Onder bewerking";
	}
	
	else
	{
	$head = "Projects : In Editing Process ";
	
	
	}
}


else
{
	$val = 1;

	if(ICL_LANGUAGE_CODE == 'fr')
	{
	$head = "Projets : Projets chargés";
	}
	
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
	$head = "Projecten : Opgeladen";
	}
	
	else
	{
	$head = "Projects : Uploaded ";
	
	
	}

}



if(ICL_LANGUAGE_CODE == 'fr')
{
$gotopage1 = '69190';
}
else if(ICL_LANGUAGE_CODE == 'nl')
{
$gotopage1 = '69189';
}
else if(ICL_LANGUAGE_CODE == 'en')
{
$gotopage1 = '67465';
}


			   
		  

//---------------------------------
if(isset($_GET['your_project_title']) && !empty($_GET['your_project_title']))
{
	$your_project_title = trim($_GET['your_project_title']);
}


if(isset($_POST['update'])  && $_POST['update']!='')
{
	// Update post
	$my_post = array(
	'ID'           => $_POST['postid'],
	'post_title'   => $_POST['project_name'],
	);
	
	wp_update_post( $my_post );
	echo '<script>document.location.href="'.get_bloginfo("url").'/?p='.$gotopage1.'/"</script>';
	exit;	
	

}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
      
      <div class="col-lg-12 col-md-12 prjtitle"><strong><?php echo $head;?></strong></div>
      
        
        <?php
		
		
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$showposts = -1;
		$args = array(
		'post_type' => 'projects',
		'author'=>$user_ID,
		'posts_per_page'            => '10',
		'paged' => $paged,
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => -1,
		"s" => $your_project_title,
		'offset' => $offsetb,
		
		'meta_query' => array(
						array(
						'key'     => 'image_project_status',
						'value'   => $val,
						'compare' => '=',
						'type'    => 'numeric',
						),
						),
		);

		//query_posts( $args );	
		$q = new WP_Query($args);
		
        ?>
		<?php while ( $q->have_posts() ) : $q->the_post();?>
        
        <?php 
						$pid = get_the_ID();
						$_POST['postid'] = get_the_ID();
						$post_date = get_the_date('Y-m-d');
						$post_time = get_the_time('H:i:s');
						$user_ID = get_current_user_id();
						$_POST['project_name'] = get_the_title(); 
		
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
						),
						);
						
						
	$count2 = count(query_posts( $args2 ));
	$feat_image='';
	while(have_posts()) : the_post();
	$feat_image =  wp_get_attachment_url( get_the_ID() );
	endwhile;
	wp_reset_query();	
	?>
    
    <?php
	$date = date_i18n('Y-m-d H:i:s');
    $mdate = $post_date.' '.$post_time;
	$seconds = strtotime($date) - strtotime($mdate);
	$time = time_to_his($seconds);
	
	//-----------------------------
	$strTimeAgo = get_string_upload($mdate);
	
	?>
       <?php $img =  vt_resize('',$feat_image,120, 80,true); ?>
        <div class="col-lg-12 col-md-12">
        
        <?php
					if(ICL_LANGUAGE_CODE == 'fr')
					{
					$gotopage = '69217';
					}
					else if(ICL_LANGUAGE_CODE == 'nl')
					{
					$gotopage = '69216';
					}
					else if(ICL_LANGUAGE_CODE == 'en')
					{
					$gotopage = '67546';
					}
		
					$v = get_str_upload();
			
		
		
        if(isset($_GET['ptype']) && !empty($_GET['ptype'])){
		?>
        
        <div class="row border-bot mainlink">
        <div class="col-lg-2 col-md-2 mainlink"><a href="<?php echo get_bloginfo('url').'/editing-project-detail/?pid='.$pid.'';?>"><img src="<?php echo $img['url'] ?>"  /></a><span><strong><a href="<?php echo get_bloginfo('url').'/editing-project-detail/?pid='.$pid.'';?>"><?php echo $count2;?>
        <?php echo $phstr = get_string_photos();?></a></strong></span></div>
        
       <div class="col-lg-10 col-md-10 color-bg"> 
            <div class="col-lg-3 col-md-3 mainlink"><a href="<?php echo get_bloginfo('url').'/editing-project-detail/?pid='.$pid.'';?>"><strong><?php echo '#'.$pid;?></strong></a></div>
            <div class="col-lg-3 col-md-3 pull-right"><strong><?php echo $strTimeAgo;?></strong></div>
        </div>
       </div>
       <?php } else {?>
       
       <div class="row border-bot">
        <div class="col-lg-2 col-md-2 mainlink"><a href="<?php echo get_bloginfo('url').'/?p='.$gotopage.'&pid='.$pid.'';?>"><img src="<?php echo $img['url'] ?>"  /></a><span><strong><a href="<?php echo get_bloginfo('url').'/?p='.$gotopage.'&pid='.$pid.'';?>"><?php echo $count2;?> Photos</a></strong></span></div>
        
       <div class="col-lg-10 col-md-10 color-bg"> 
            <div class="col-lg-3 col-md-3 mainlink"><a href="<?php echo get_bloginfo('url').'/?p='.$gotopage.'&pid='.$pid.'';?>"><strong><?php echo '#'.$pid;?></strong></a></div>
            
            <form name="form1" action="" method="post">
            <input type="hidden" name="postid" class="postid" value="<?php echo $_POST['postid'];?>"  />
            <div class="col-lg-3 col-md-3">
            
            <input type="text" name="project_name" placeholder="<?php echo get_str_newname();?>"  class="myinputtxt" value="<?php if($_POST['project_name'] != 'My Project'){echo $_POST['project_name'];}?>"  /></div>
            <div class="col-lg-1 col-md-1"><button type="submit" name="update" value="update" class="btn btn-primary msearchbtn"><?php echo $ustr = get_str_updatetxt();?></button></div>
            </form>
            
            <div class="col-lg-3 col-md-3 pull-right myfont"><strong><?php echo $strTimeAgo;?></strong></div>
        </div>
       </div>
       
       <?php }?>
       
        
        </div>
		
       <?php endwhile;  
	   
	   if(function_exists('wp_page_numbers')) : wp_page_numbers(); endif; 
	   
	   wp_reset_postdata(); // end of the loop.  ?> 
     
        
        
    </div><!-- .entry-content -->
   
   
   
   
   
</article><!-- #post-## -->
