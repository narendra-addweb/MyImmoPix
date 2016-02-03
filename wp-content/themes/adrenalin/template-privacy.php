<?php

/*

	Template Name: PRIVACY

 
 */
 
get_header('faq');
?>
<?php cg_get_page_title(); ?>

<?php   $user_ID = get_current_user_id();?>


<div class="container">
    <div class="content">
    
        
     <div class="row">
            <div class="col-lg-12 col-md-12 ">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">

                       <?php the_content();?>

					</main><!-- #main -->
                </div><!-- #primary -->
            </div>
            <!--<div class="col-lg-3 col-md-3 col-md-pull-9 col-lg-pull-9">
                <?php //get_sidebar(); ?>
            </div>-->
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->

<?php get_footer(); ?>