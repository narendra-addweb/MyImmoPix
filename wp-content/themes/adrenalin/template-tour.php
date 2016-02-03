<?php


/*


	Template Name: TOUR

 
 */
 
get_header();
?>
 

<?php cg_get_page_title(); ?>



<div class="container">
    <div class="content">
    <div class="row">
            <div class="col-lg-9 col-md-9 col-md-push-3 col-lg-push-3">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">

                       <div class="divtxt msgg1">	
                       
                       <?php if(ICL_LANGUAGE_CODE == 'en'){?>
                       The <small class="digittxt" > 	4	 </small>&nbsp; steps for better real estate photos.
                        <?php } else if(ICL_LANGUAGE_CODE == 'nl'){?>
                        The 	<small class="digittxt" > 	4	 </small>&nbsp; stappen voor betere vastgoed foto's.
                         <?php } else if(ICL_LANGUAGE_CODE == 'fr'){?>
                         Les <small class="digittxt" > 	4	 </small>&nbsp;étapes pour de meilleures photo immobilières.
                         <?php }?>
                       </div>
                       
                        

                      
                       
                       <?php if(ICL_LANGUAGE_CODE == 'en'){?>
                        <ul class="mylist">
                        <li><span>1</span> Create a free account</li>
                        <li><span>2</span> Upload your photos</li>
                        <li><span>3</span> Purchase credits and order the service</li>
                        <li><span>4</span> Your Edited photos reach you within 24 hours.</li>
                        </ul>
                        <?php } else if(ICL_LANGUAGE_CODE == 'nl'){?>
                        <ul class="mylist">
                        <li><span>1</span> Creëer een account</li>
                        <li><span>2</span> Uw foto's opladen</li>
                        <li><span>3</span> Koop kredieten en bestel </li>
                        <li><span>4</span> Uw geretoucheerde foto's bereiken u in minder dan 24 uur.</li>
                        </ul>
                        
                        <?php } else if(ICL_LANGUAGE_CODE == 'fr'){?>
                        <ul class="mylist">
                        <li><span>1</span> Créer un compte gratuit</li>
                        <li><span>2</span> Charger vos photos</li>
                        <li><span>3</span> Acheter des crédits et passer la commande de service</li>
                        <li><span>4</span> Vos photos retouchées sont disponibles dans les 24 heures.</li>
                        </ul>
                        
                        <?php }?>   


						
                        <div class="col-lg-9 col-md-9 divtxt"><a href="<?php echo get_bloginfo('url').'/my-account/';?>"><button type="button" name="" class="btn hbtn  hbtn2 btn-sm"><?php echo $ustr = get_str_createanaccount();?></button></a></div>
                        <div class="divtxt"></div>
                        

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
            <div class="col-lg-3 col-md-3 col-md-pull-9 col-lg-pull-9">
                <?php //get_sidebar(); ?>
            </div>
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->

<?php get_footer(); ?>