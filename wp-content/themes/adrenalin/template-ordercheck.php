<?php
/**
Template Name: checkorder

 * The template for displaying all pages.
 * @package commercegurus
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
 
 if($totalcredit>0)
 {
 foreach($_POST['mediid'] as $id)
 {
 updatcredit($id);
 }
  header("Location:".get_permalink("url")."?assign=done");
  exit;

 }
 else
 {
  header("Location:".get_permalink("url")."?assign=no");
  exit;

 }
 
 }
get_header();

?>
<?php cg_get_page_title(); ?>
<?php
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
        <?php if($_GET['assign']=="done")
		{
		?>
        <div style="color:#006600"><strong> Thanks for assigning credit to images.</strong></div>
        <?php } else if($_GET['assign']=="no") {?><div style="color:#FF0000"><strong>No Credit Available.</strong></div>
        <?php } ?>
        
        <div style="clear:both"> You have <?php echo $totalcredit; ?> credits and <?php  echo $count?> unpaid images, please <a href="<?php  echo get_bloginfo("url")?>/credit/">buy credit</a> to approve these  images.</div>
        <br/>
        <?php  if($count>0)
		{?>
        <h3> Assign Credit to Images</h3>
        <form name="checkconform" action="" method="post" >
        <input type="hidden" name="creditupdate" value="yes" />
        <?php 			
			
					while ( have_posts() ) : the_post();
					$image_id = get_post_thumbnail_id($post->ID);
					$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>

                           <article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-4 col-md-4'); ?>>
    <div class="entry-content">
       <?php $img =  vt_resize('',$feat_image,350, 250,false);//Proportionally resize
		 ?>
        
        <a href="<?php echo $feat_image; ?>" target="_blank">
      <img src="<?php echo $img['url'] ?>" style="padding:10px"  /></a>
        <input type="checkbox" name="mediid[]" value="<?php echo get_the_ID() ?>"  />
         <?php
    
        ?>
    </div><!-- .entry-content -->
    
</article><!-- #post-## -->


                           

                        <?php endwhile;  wp_reset_query(); // end of the loop.  ?>
                        
                       
                        
                        
                        <div style="clear:both">
                     <input type="submit" class="button checkout-button " name="proceed" value="Proceed to Conform">
                     </div>
                     </form> <?php } ?>
                    </main><!-- #main -->
                
                
                
                <main id="main" class="site-main" role="main" style="clear:both;padding-top:100px">
<h3> Approved Images</h3>
                        <?php 
						$totalcredit =  do_shortcode("[usercreditwoocommerce]");
						
						$user_ID = get_current_user_id();
						$args = array(
	'post_status' => 'any',
	'post_type'   => 'attachment',
	'posts_per_page'=>-1,
	'author'=>$user_ID,
	'meta_query' => array(
		array(
			'key'     => 'credits',
			'value'   => 1,
			'compare' => '=',
		),
	),
);
		$count = count(query_posts( $args ));	
		
		?>
        
       
        <br/>
        <?php 			
			
					while ( have_posts() ) : the_post();
					$image_id = get_post_thumbnail_id($post->ID);
					$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					

					 ?>

                           <article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-4 col-md-4'); ?>>
    <div class="entry-content">
        <?php $img =  vt_resize('',$feat_image,350, 250,false);//Proportionally resize
		 ?>
        
        <a href="<?php echo $feat_image; ?>" target="_blank">
      <img src="<?php echo $img['url'] ?>" style="padding:10px"  /></a>
    </div><!-- .entry-content -->
   
</article><!-- #post-## -->


                           

                        <?php endwhile;  wp_reset_query(); // end of the loop.  ?>

                    </main>
                
                
                
                <main id="main" class="site-main" role="main" style="clear:both;padding-top:100px">
<h3>Image Uplaod by admin</h3>
                        <?php 
						$totalcredit =  do_shortcode("[usercreditwoocommerce]");
						
						$user_ID = get_current_user_id();
						$args = array(
	'post_status' => 'any',
	'post_type'   => 'attachment',
	'posts_per_page'=>-1,
	'author'=>$user_ID,
	'meta_query' => array(
		array(
			'key'     => 'upload_by_admin',
			'value'   => 1,
			'compare' => '=',
		),
	),
);
		echo  $count = count(query_posts( $args ));	
		
		?>
        
       
        <br/>
        <?php 			
			
					while ( have_posts() ) : the_post();
					$image_id = get_post_thumbnail_id($post->ID);
					$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					
			 ?>

                           <article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-4 col-md-4'); ?>>
    <div class="entry-content" style="text-align:center">
        <?php $img =  vt_resize('',$feat_image,350, 250,false);//Proportionally resize
		 ?>
        
        <a href="<?php echo get_bloginfo("url") ?>downloadimg.php?img=<?php echo str_replace(get_bloginfo("url"),"",$feat_image); ?>">
      <img src="<?php echo $img['url'] ?>" style="padding:10px 10px 2px 10px"  />Download Image</a>
    </div><!-- .entry-content -->
   
</article><!-- #post-## -->


                           

                        <?php endwhile;  wp_reset_query(); // end of the loop.  ?>

                    </main>
                
                </div><!-- #primary -->
            </div>
            <div class="col-lg-3 col-md-3 col-md-pull-9 col-lg-pull-9">
                <?php get_sidebar(); ?>
            </div>
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->

<?php get_footer(); ?>
