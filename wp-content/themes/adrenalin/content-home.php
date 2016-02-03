<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php cg_get_page_title(); ?>
    <div  class="entry-content">
       
	   
	    <div id="example" class="col-lg-12 col-md-12 clsexamp"><?php echo get_string_example();?>  </div>
		
		<div class="container">
		<div class="row"><div class="col-lg-4 col-md-4 clsexamptxt"> <?php get_template_part('home','example');?></div>
		<div class="col-lg-4 col-md-4 clsexamptxt"> <?php get_template_part('home','example1');?></div></div>
		</div>    
		<div class="divider"></div>
		
		<div class="container">
		<div id="price" class="col-lg-12 col-md-12 clsprice"><?php echo get_string_pricing();?>  </div>
		</div>
		
		<div class="container">
		<div class="col-lg-12 col-md-12 "> <?php get_template_part('home','price');?></div>
		</div>
		
		
		<div class="divider1"></div>
		
		<div class="container">
		<div id="tour" class="col-lg-12 col-md-12 clsprice"><?php echo get_string_tour();?>   </div>
		</div>
		
		<div class="container">
		<div class="col-lg-12 col-md-12 "> <?php get_template_part('home','tour');?> </div>
		</div>
		
		<div class="divider1"></div>
		
		<div class="container ">
		<div id="service" class="col-lg-12 col-md-12 clsprice"><?php echo get_str_services();?>   </div>
		</div>
		
		<div class="container">
		<div class="col-lg-12 col-md-12 "> <?php get_template_part('home','services');?> </div>
		</div>
		
		<div class="col-lg-12 col-md-12 "> 
		<?php $upload_dir = wp_upload_dir(); ?>
		
						<div class="top-footer">
							<ul class="contrast">
							<li><img width="80" height="60" src="<?php echo $upload_dir['baseurl'].'/icon/icon_luminosity.png';?>" /><span>Liuminity enhancement</span></li>
							<li><img width="80" height="60" src="<?php echo $upload_dir['baseurl'].'/icon/icon_contrast.png';?>" /><span>Contrast adjustment</span></li>
							<li><img width="80" height="60" src="<?php echo $upload_dir['baseurl'].'/icon/icon_perspective.png';?>" /><span>Perspective correction</span></li>
							<li><img width="80" height="60" src="<?php echo $upload_dir['baseurl'].'/icon/icon_color_palet.png';?>" /><span>Color adjustment</span></li>
							<li><img width="80" height="60" src="<?php echo $upload_dir['baseurl'].'/icon/icon_blur.png';?>" /><span>Blur and noise removal</span></li>
							<li><img width="80" height="60" src="<?php echo $upload_dir['baseurl'].'/icon/icon_remove.png';?>" /><span>Dust clean up</span></li>
							<li><img width="80" height="60" src="<?php echo $upload_dir['baseurl'].'/icon/icon_resizing.png';?>" /><span>Crop and  resizing</span></li>
							</ul>
						</div> </div>
       
	   
	    
	 </div><!-- .entry-content -->
    
</article><!-- #post-## -->
