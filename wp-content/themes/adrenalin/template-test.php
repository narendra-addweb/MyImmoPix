<?php
/*

Template Name: ExampleTest

*/
get_header();

?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/example/application.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/example/typekit.js"></script>
<!-- <link rel="stylesheet" href="<?php bloginfo('url'); ?>/css/example/application.css" type="text/css" /> -->


   




<?php cg_get_page_title(); ?>
<?php $user_ID = get_current_user_id();?>




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
        <div class="col-lg-3 col-md-3 col-md-push-9 col-lg-push-9">
                <?php get_sidebar('example'); ?>
            </div>
            <div class="col-lg-9 col-md-9 col-md-pull-3 col-lg-pull-3">
                <div id="primary" class="">
                    <main id="main" class="site-main" role="main">
						
                       
								
                         <div class="row topmargin"><div class="col-lg-12 col-md-12">
        
                            
							<div class="row g60"><div class="one-half right-desktop features-mh" style="height: 404px;"><div class="va-wrap"><div class="va-m"><div class="features-wrap"><i class="icon-img icon-camera"></i><h1 class="h2">Retouche Photo</h1><ul class="features-list"><li><span><i class="icon-clock-black"></i>48h</span></li><li><span><i class="icon-coins-black"></i>2</span></li></ul></div><p class="large clear">Des retouches personnalisées de la plus haute qualité.</p><p class="large clear">Des études récentes ont démontré que les photographes professionnels consacrent près d'un tiers de leurs temps à la retouche photo. Laissez-nous vous aider à devenir plus efficace et concentré sur la croissance de votre entreprise grâce à notre solution de retouche photo.</p><p class="clearfix"><a target="_blank" href="#" data-toggle="modal" data-target="#service-modal" class="button">Commencer</a></p></div></div></div><div class="one-half"><div class="slick-slider img slick-initialized"><div class="slick-list" aria-live="polite" tabindex="0"><div class="slick-track" style="opacity: 1; width: 4304px; transform: translate3d(-538px, 0px, 0px); height: 404px;"><div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 538px;"><div class="twentytwenty-wrapper twentytwenty-horizontal"><div class="twentytwenty twentytwenty-container" style="height: 404px;"><img alt="Before 6 10c9b4f30e3b7e3d4a06ab5ead63a45340c9d5d190288aa3612be6816396404d" src="/assets/services/photo_editing/before-6-10c9b4f30e3b7e3d4a06ab5ead63a45340c9d5d190288aa3612be6816396404d.jpg" class="twentytwenty-before" style="clip: rect(0px, 161.4px, 404px, 0px);"><img alt="After 6 da6f531aaab86f7a2499d906e80c0cf44505a435ffa46dc196cbe6f8e9262f3e" src="/assets/services/photo_editing/after-6-da6f531aaab86f7a2499d906e80c0cf44505a435ffa46dc196cbe6f8e9262f3e.jpg" class="twentytwenty-after"><div class="twentytwenty-overlay"><div class="twentytwenty-before-label"></div><div class="twentytwenty-after-label"></div></div><div class="twentytwenty-handle" style="left: 161.4px;"><span class="twentytwenty-left-arrow"></span><span class="twentytwenty-right-arrow"></span></div></div></div><a title="Example" rel="gallery" href="/assets/services/photo_editing/after-6-da6f531aaab86f7a2499d906e80c0cf44505a435ffa46dc196cbe6f8e9262f3e.jpg" class="fancybox"><i class="icon-magnifier"></i></a></div><div class="slick-slide slick-active" data-slick-index="0" aria-hidden="false" style="width: 538px;"><div class="twentytwenty-wrapper twentytwenty-horizontal"><div class="twentytwenty twentytwenty-container" style="height: 404px;"><img alt="Before 1 fb76099fc894dee641a5a5165326ec10afbe51458530b9b30c0bd4b8ab4a5ad8" src="/assets/services/photo_editing/before-1-fb76099fc894dee641a5a5165326ec10afbe51458530b9b30c0bd4b8ab4a5ad8.jpg" class="twentytwenty-before" style="clip: rect(0px, 161.4px, 404px, 0px);"><img alt="After 1 5473778e0e1ee503907c2e63f853099039637f23fd83cc2ca115df6d68285aaf" src="/assets/services/photo_editing/after-1-5473778e0e1ee503907c2e63f853099039637f23fd83cc2ca115df6d68285aaf.jpg" class="twentytwenty-after"><div class="twentytwenty-overlay"><div class="twentytwenty-before-label"></div><div class="twentytwenty-after-label"></div></div><div class="twentytwenty-handle" style="left: 161.4px;"><span class="twentytwenty-left-arrow"></span><span class="twentytwenty-right-arrow"></span></div></div></div><a title="Example" rel="gallery" href="/assets/services/photo_editing/after-1-5473778e0e1ee503907c2e63f853099039637f23fd83cc2ca115df6d68285aaf.jpg" class="fancybox"><i class="icon-magnifier"></i></a></div><div class="slick-slide" data-slick-index="1" aria-hidden="true" style="width: 538px;"><div class="twentytwenty-wrapper twentytwenty-horizontal"><div class="twentytwenty twentytwenty-container" style="height: 404px;"><img alt="Before 2 c145500a63a82b31d9672bf858d3fe250b359547ad6d41f0ac2b92267e6f6804" src="/assets/services/photo_editing/before-2-c145500a63a82b31d9672bf858d3fe250b359547ad6d41f0ac2b92267e6f6804.jpg" class="twentytwenty-before" style="clip: rect(0px, 161.4px, 404px, 0px);"><img alt="After 2 0d319b72066347d38023a4053b7097ee5bc00b5dbdcd3f3fdcd4f89b2d37eb14" src="/assets/services/photo_editing/after-2-0d319b72066347d38023a4053b7097ee5bc00b5dbdcd3f3fdcd4f89b2d37eb14.jpg" class="twentytwenty-after"><div class="twentytwenty-overlay"><div class="twentytwenty-before-label"></div><div class="twentytwenty-after-label"></div></div><div class="twentytwenty-handle" style="left: 161.4px;"><span class="twentytwenty-left-arrow"></span><span class="twentytwenty-right-arrow"></span></div></div></div><a title="Example" rel="gallery" href="/assets/services/photo_editing/after-2-0d319b72066347d38023a4053b7097ee5bc00b5dbdcd3f3fdcd4f89b2d37eb14.jpg" class="fancybox"><i class="icon-magnifier"></i></a></div><div class="slick-slide" data-slick-index="2" aria-hidden="true" style="width: 538px;"><div class="twentytwenty-wrapper twentytwenty-horizontal"><div class="twentytwenty twentytwenty-container" style="height: 404px;"><img alt="Before 3 7a9d63c308b5e1f39eb2d6ab400d6b10d99f9e333560df356d1cd2d1694283a5" src="/assets/services/photo_editing/before-3-7a9d63c308b5e1f39eb2d6ab400d6b10d99f9e333560df356d1cd2d1694283a5.jpg" class="twentytwenty-before" style="clip: rect(0px, 161.4px, 404px, 0px);"><img alt="After 3 05a2b5cea94c2e0c4c5b7ffdb5c3135181d08e1077750b4e0edb375247a97314" src="/assets/services/photo_editing/after-3-05a2b5cea94c2e0c4c5b7ffdb5c3135181d08e1077750b4e0edb375247a97314.jpg" class="twentytwenty-after"><div class="twentytwenty-overlay"><div class="twentytwenty-before-label"></div><div class="twentytwenty-after-label"></div></div><div class="twentytwenty-handle" style="left: 161.4px;"><span class="twentytwenty-left-arrow"></span><span class="twentytwenty-right-arrow"></span></div></div></div><a title="Example" rel="gallery" href="/assets/services/photo_editing/after-3-05a2b5cea94c2e0c4c5b7ffdb5c3135181d08e1077750b4e0edb375247a97314.jpg" class="fancybox"><i class="icon-magnifier"></i></a></div><div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 538px;"><div class="twentytwenty-wrapper twentytwenty-horizontal"><div class="twentytwenty twentytwenty-container" style="height: 404px;"><img alt="Before 4 c14f497569bb5310d1822667a0fbcf184e835174c4f8729a1803cddbe83dbb28" src="/assets/services/photo_editing/before-4-c14f497569bb5310d1822667a0fbcf184e835174c4f8729a1803cddbe83dbb28.jpg" class="twentytwenty-before" style="clip: rect(0px, 161.4px, 404px, 0px);"><img alt="After 4 3569b4072c1d6636c04052aec063cea29d4214eae42000d8ded8aa9aa5b60dd6" src="/assets/services/photo_editing/after-4-3569b4072c1d6636c04052aec063cea29d4214eae42000d8ded8aa9aa5b60dd6.jpg" class="twentytwenty-after"><div class="twentytwenty-overlay"><div class="twentytwenty-before-label"></div><div class="twentytwenty-after-label"></div></div><div class="twentytwenty-handle" style="left: 161.4px;"><span class="twentytwenty-left-arrow"></span><span class="twentytwenty-right-arrow"></span></div></div></div><a title="Example" rel="gallery" href="/assets/services/photo_editing/after-4-3569b4072c1d6636c04052aec063cea29d4214eae42000d8ded8aa9aa5b60dd6.jpg" class="fancybox"><i class="icon-magnifier"></i></a></div><div class="slick-slide" data-slick-index="4" aria-hidden="true" style="width: 538px;"><div class="twentytwenty-wrapper twentytwenty-horizontal"><div class="twentytwenty twentytwenty-container" style="height: 404px;"><img alt="Before 5 7aa8e78fdd73a76924f4960c24ae07538b3fe8e1fd62a78e6e8ad11f165eaff1" src="/assets/services/photo_editing/before-5-7aa8e78fdd73a76924f4960c24ae07538b3fe8e1fd62a78e6e8ad11f165eaff1.jpg" class="twentytwenty-before" style="clip: rect(0px, 161.4px, 404px, 0px);"><img alt="After 5 b98e8b83273af522e0b360d3f39d51783ac43f38928414e2a65f577aa5c38c50" src="/assets/services/photo_editing/after-5-b98e8b83273af522e0b360d3f39d51783ac43f38928414e2a65f577aa5c38c50.jpg" class="twentytwenty-after"><div class="twentytwenty-overlay"><div class="twentytwenty-before-label"></div><div class="twentytwenty-after-label"></div></div><div class="twentytwenty-handle" style="left: 161.4px;"><span class="twentytwenty-left-arrow"></span><span class="twentytwenty-right-arrow"></span></div></div></div><a title="Example" rel="gallery" href="/assets/services/photo_editing/after-5-b98e8b83273af522e0b360d3f39d51783ac43f38928414e2a65f577aa5c38c50.jpg" class="fancybox"><i class="icon-magnifier"></i></a></div><div class="slick-slide" data-slick-index="5" aria-hidden="true" style="width: 538px;"><div class="twentytwenty-wrapper twentytwenty-horizontal"><div class="twentytwenty twentytwenty-container" style="height: 404px;"><img alt="Before 6 10c9b4f30e3b7e3d4a06ab5ead63a45340c9d5d190288aa3612be6816396404d" src="/assets/services/photo_editing/before-6-10c9b4f30e3b7e3d4a06ab5ead63a45340c9d5d190288aa3612be6816396404d.jpg" class="twentytwenty-before" style="clip: rect(0px, 161.4px, 404px, 0px);"><img alt="After 6 da6f531aaab86f7a2499d906e80c0cf44505a435ffa46dc196cbe6f8e9262f3e" src="/assets/services/photo_editing/after-6-da6f531aaab86f7a2499d906e80c0cf44505a435ffa46dc196cbe6f8e9262f3e.jpg" class="twentytwenty-after"><div class="twentytwenty-overlay"><div class="twentytwenty-before-label"></div><div class="twentytwenty-after-label"></div></div><div class="twentytwenty-handle" style="left: 161.4px;"><span class="twentytwenty-left-arrow"></span><span class="twentytwenty-right-arrow"></span></div></div></div><a title="Example" rel="gallery" href="/assets/services/photo_editing/after-6-da6f531aaab86f7a2499d906e80c0cf44505a435ffa46dc196cbe6f8e9262f3e.jpg" class="fancybox"><i class="icon-magnifier"></i></a></div><div class="slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" style="width: 538px;"><div class="twentytwenty-wrapper twentytwenty-horizontal"><div class="twentytwenty twentytwenty-container" style="height: 404px;"><img alt="Before 1 fb76099fc894dee641a5a5165326ec10afbe51458530b9b30c0bd4b8ab4a5ad8" src="/assets/services/photo_editing/before-1-fb76099fc894dee641a5a5165326ec10afbe51458530b9b30c0bd4b8ab4a5ad8.jpg" class="twentytwenty-before" style="clip: rect(0px, 161.4px, 404px, 0px);"><img alt="After 1 5473778e0e1ee503907c2e63f853099039637f23fd83cc2ca115df6d68285aaf" src="/assets/services/photo_editing/after-1-5473778e0e1ee503907c2e63f853099039637f23fd83cc2ca115df6d68285aaf.jpg" class="twentytwenty-after"><div class="twentytwenty-overlay"><div class="twentytwenty-before-label"></div><div class="twentytwenty-after-label"></div></div><div class="twentytwenty-handle" style="left: 161.4px;"><span class="twentytwenty-left-arrow"></span><span class="twentytwenty-right-arrow"></span></div></div></div><a title="Example" rel="gallery" href="/assets/services/photo_editing/after-1-5473778e0e1ee503907c2e63f853099039637f23fd83cc2ca115df6d68285aaf.jpg" class="fancybox"><i class="icon-magnifier"></i></a></div></div></div><button aria-label="previous" class="slick-prev" data-role="none" type="button" style="display: block;">Previous</button><button aria-label="next" class="slick-next" data-role="none" type="button" style="display: block;">Next</button><ul class="slick-dots" style="display: block;"><li class="slick-active" aria-hidden="false"><button style="background-image: url(http://drawbotics.com/assets/services/photo_editing/after-1-5473778e0e1ee503907c2e63f853099039637f23fd83cc2ca115df6d68285aaf.jpg);" class="tab"></button></li><li aria-hidden="true"><button style="background-image: url(http://drawbotics.com/assets/services/photo_editing/after-2-0d319b72066347d38023a4053b7097ee5bc00b5dbdcd3f3fdcd4f89b2d37eb14.jpg);" class="tab"></button></li><li aria-hidden="true"><button style="background-image: url(http://drawbotics.com/assets/services/photo_editing/after-3-05a2b5cea94c2e0c4c5b7ffdb5c3135181d08e1077750b4e0edb375247a97314.jpg);" class="tab"></button></li><li aria-hidden="true"><button style="background-image: url(http://drawbotics.com/assets/services/photo_editing/after-4-3569b4072c1d6636c04052aec063cea29d4214eae42000d8ded8aa9aa5b60dd6.jpg);" class="tab"></button></li><li aria-hidden="true"><button style="background-image: url(http://drawbotics.com/assets/services/photo_editing/after-5-b98e8b83273af522e0b360d3f39d51783ac43f38928414e2a65f577aa5c38c50.jpg);" class="tab"></button></li><li aria-hidden="true"><button style="background-image: url(http://drawbotics.com/assets/services/photo_editing/after-6-da6f531aaab86f7a2499d906e80c0cf44505a435ffa46dc196cbe6f8e9262f3e.jpg);" class="tab"></button></li></ul></div></div></div>
                
        </div></div>   

                       
                        
                        
                        

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
            
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->

<?php get_footer(); ?>