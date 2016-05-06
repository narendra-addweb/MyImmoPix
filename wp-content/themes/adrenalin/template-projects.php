<?php


/*



	Template Name: My Projects



*/



get_header();



?>
<?php cg_get_page_title(); ?>

<?php

$user_ID = get_current_user_id();

if(!$user_ID)
{
echo '<script>document.location.href="'.get_bloginfo("url").'/"</script>';
exit;
}

?>

<?php  update_user_meta($user_ID, 'my_temp_field', '0' );?>

<?php get_template_part('manage' ,'closed-project-status' ); ?> 






<div class="container">
    <div class="content">
        <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-sm-push-8 col-md-push-9 col-lg-push-9 topmargin-price ">
                <div class="mbgcolr1 padingleft pro-list-sidebar "><?php get_sidebar('project'); ?></div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-sm-pull-4 col-md-pull-3 col-lg-pull-3">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">

                        <?php get_template_part( 'content', 'projects' ); ?>

                      </main><!-- #main -->
                </div><!-- #primary -->
            </div>
            
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->

<?php get_footer(); ?>
