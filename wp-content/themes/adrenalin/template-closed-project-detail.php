<?php
/*
	Template Name: Closed Projects Detail

*/
 
 
get_header();

$user_ID = get_current_user_id();
if(!$user_ID)
{
echo '<script>document.location.href="'.get_bloginfo("url").'/"</script>';
exit;
}

?>
<?php cg_get_page_title(); ?>
<?php get_template_part('manage' ,'closed-project-status' ); ?> 






<div class="container">
    <div class="content">
    
        
    <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-sm-push-8 col-md-push-9 col-lg-push-9">
             <?php get_sidebar('closedpdetail'); ?>
               
               </div>
               <div class="col-lg-9 col-md-9 col-sm-8 col-sm-pull-4 col-md-pull-3 col-lg-pull-3">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">

                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php get_template_part( 'content', 'closed-project-detail' );?>

<!-- END In a Template File -->
                           

                        <?php endwhile; // end of the loop.  ?>

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
           
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->

<?php get_footer(); ?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<script>
jQuery( document ).ready(function() {
	
	<?php
	
	$mylink = get_bloginfo('url').'/project-detail/?pid='.$pid;
	?>
	 
   jQuery(".wpb_button_a").attr("href", "<?php echo $mylink;?>")
});
</script>