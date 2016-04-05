<?php
/*
Template Name: Assign Image

 
 */

 $user_ID = get_current_user_id();
 $totalcredit =  intval(do_shortcode("[usercreditwoocommerce]"));
 if(!$user_ID)
 {
 header("Location:".get_bloginfo("url"));
 exit;
 }
 
 
 
 if($_POST['creditupdate']=="yes")
 {
 
	extract($_POST);
	
	if($your_project == 'other')
	{
		$my_post = array(
		'post_title'    => $_POST['myproject'],
		'post_content'  => 'This is my post.',
		'post_status'   => 'publish',
		'post_author'   => $user_ID,
		'post_type'   =>  'projects',
		);
		
		// Insert the post into the database
		$post_id = wp_insert_post( $my_post, $wp_error );
		update_post_meta( $post_id, 'image_project_status', '1' );
		foreach($_POST['mediid'] as $id)
		{
			update_post_meta( $id, 'group_id', $_POST['your_project'] );
			echo get_field('group_id',$id); 
		}
	} else if(	isset($your_project) && !empty($your_project) && $your_project!= 'other'	 ){
		
		
			foreach($_POST['mediid'] as $id)
			{
				update_post_meta( $id, 'group_id', $_POST['your_project'] ); 
				
			}
		
			

	}
	
			header("Location:".get_permalink("url")."?assign=done");
			exit;
}
 
get_header();

?>
<?php cg_get_page_title(); ?>
<?php


/* fetch select active venu box */

	

	function selectbox_project()
	{
		$showposts1 = -1;
		$args1 = array(
		'post_type' => 'projects',
		'author'=>$user_ID,
		'orderby' => 'post_title',
		'order' => 'ASC',
		'post_status' => array('publish'),
		'posts_per_page' => $showposts1,
		);

		query_posts( $args1 );	
		while ( have_posts() ) : the_post();
		echo  '<option '.$chk.' value='.get_the_id().'>'.get_the_title().'</option>';
		endwhile;
		wp_reset_query();
	}


function get_project_count()
	{
		$showposts = -1;
		$args = array(
		'post_type' => 'projects',
		'author'=>$user_ID,
		'orderby' => 'post_title',
		'order' => 'ASC',
		'post_status' => array('publish'),
		'posts_per_page' => $showposts,
		);

		$count = count(query_posts( $args ));	
		return $count;
		
	}

// Get our page banner if it exists
$cg_page_banner_image = '';
if ( function_exists( 'get_field' ) ) {
    $page_banner = get_field( 'banner_image' );
    $page_banner_height = get_field( 'page_banner_height' );
}

if ( !empty( $page_banner ) ) {
    $cg_page_banner_image = $page_banner;
}
?>

<?php if ( $cg_page_banner_image ) { ?>

    <?php $danchor = 'cg-strip-' . rand(); ?>

    <div class="cg-strip cg-strip-wrap fade-in animate" style="background-color:#333333!important; height:<?php echo $page_banner_height; ?>;">
        <div class="cg-strip-bg cg_parallax skrollable skrollable-between" style="background-image: url(<?php echo $cg_page_banner_image; ?>);" data-center="background-position: 50% 50%;" data-top-bottom="background-position: 50% 0%" data-bottom-top="background-position: 50% 95%"></div>
        <div class="row">
            <div style="width: 50%;" class="cg-pos valign-center halign-center">
                <div class="cg-strip-content <?php echo $danchor; ?> light text-align-center skrollable skrollable-before" data-center-bottom="opacity: 1" data--150-top="opacity: 0" data-anchor-target=".<?php echo $danchor; ?>" style="opacity: 1;">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-md-push-3 col-lg-push-3">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main woocommerce" role="main">

		<?php 
        $totalcredit =  do_shortcode("[usercreditwoocommerce]");
        $user_ID = get_current_user_id();
        ?>
        <?php if($_GET['assign']=="done")
		{
		?>
        <div style="color:#006600"><strong> Thanks for assigning images to Project.</strong></div>
        <?php } else if($_GET['assign']=="no") {?><div style="color:#FF0000"><strong>No Image Available.</strong></div>
        <?php } ?>
        
       <?php 
	   $project_count = get_project_count();
	   $cls = 'textdiv';
	   if(get_project_count>0)
	   {
		   $cls = '';
	   }
	   
	   ?>
        
        <form name="checkconform" action="" method="post" >
        <div><select name="your_project" class="form-control mselect" id="project"><?php  selectbox_project();?><option value="other">Other</option></select></div>
        <div class="<?php echo $cls;?> topmargin" id="hidtext" ><input id="myproject" type="text" name="myproject" value="" <?php if($project_count<1){?>required="required"<?php }?> placeholder="Project Name" /></div>
        
        <br/>
        
        <?php
        $args = array(
						'post_status' => 'any',
						'post_type'   => 'attachment',
						'posts_per_page'=>-1,
						'author'=>$user_ID,
						'meta_query' => array(
						array(
						'key'     => 'credits',
						'value'   => 0,
						'compare' => '=',
						),
						),
						);
		$count = count(query_posts( $args ));	
        
        ?>
        
        
        <?php  if($count>0)
		{?>
        <h3> Assign Images to Project</h3>
      	<input type="hidden" name="creditupdate" value="yes" />
        
       
        <?php 			
			
					while ( have_posts() ) : the_post();
					$image_id = get_post_thumbnail_id($post->ID);
					$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>

                           <article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-4 col-md-4'); ?>>
    <div class="entry-content">
       <?php $img =  vt_resize('',$feat_image,350, 250,false); //Proportionally resize
       ?><a href="<?php echo $feat_image; ?>" target="_blank">
      <img src="<?php echo $img['url'] ?>" style="padding:10px"  /></a>
        <input type="checkbox" name="mediid[]" value="<?php echo get_the_ID() ?>"  /> 
        <?php  $projt = get_post_meta(get_the_ID() , 'group_id' ,true);?>
        <span> <strong><?php if(!empty($projt)){echo 'Project&nbsp;'.get_the_title($projt);}?></strong></span>
         <?php
    
        ?>
    </div><!-- .entry-content -->
    
</article><!-- #post-## -->


                           

                        <?php endwhile;  wp_reset_query(); // end of the loop.  ?>
                        
                       
                        
                        
                        <div style="clear:both">
                     <input type="submit" class="button btn-danger " name="proceed" value="Add To Projects">
                     <a href="<?php echo get_bloginfo('url').'/projects/'?>"><input type="button" class="button btn-danger " name="checkorder" value="Next Step"></a>
                     </div>
                     </form> <?php } ?>
                    </main><!-- #main -->
                
                
                 
                
                </div><!-- #primary -->
            </div>
            <div class="col-lg-3 col-md-3 col-md-pull-9 col-lg-pull-9">
                <?php get_sidebar(); ?>
            </div>
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->

<?php get_footer(); ?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<script>
	jQuery("#project").change(function(){
	var val = jQuery('#project').val();
	if(val == 'other')
	{
	jQuery('#hidtext').show();
	jQuery('#myproject').removeAttr("required");
	jQuery('#myproject').attr("required", "true");
	
	}
	else
	{
	jQuery('#hidtext').hide();
	jQuery('#myproject').removeAttr("required");	
	}
	});
</script>