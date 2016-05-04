<?php
/*
 Template Name: Temp creadits
 
 */
get_header();
?>

<div class="container cg-credit-common-cls">
    <div class="content">
        <div class="row">
        
        <div class="col-lg-3 col-md-3 col-sm-4 col-sm-push-8 col-md-push-9 col-lg-push-9">
                <?php //get_sidebar(); ?>
                <?php dynamic_sidebar('sidebarcart'); ?>
                
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-sm-pull-4 col-md-pull-3 col-lg-pull-3">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">

                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php get_template_part( 'content', 'credit' ); ?>

                           

                        <?php endwhile; // end of the loop.  ?>

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
            
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->

<?php get_footer(); ?>


<script>
jQuery( document ).ready(function() {
	
<?php
if(ICL_LANGUAGE_CODE == 'fr')
{
$atxt = 'AJOUTER AU PANIER';
}
else if(ICL_LANGUAGE_CODE == 'nl')
{
$atxt = 'VOEG TOE AAN WINKELMANDJE';
}
else if(ICL_LANGUAGE_CODE == 'en')
{
$atxt = 'ADD TO CART';
}
?>	
	
jQuery(".btnclass .btn-danger").val("<?php echo $atxt;?>");
jQuery(".checkout").html("Proceed to checkout");

var element = jQuery(".buttons").find('a:first'); 
	jQuery(element).addClass("viewcardcls");	
});
</script>