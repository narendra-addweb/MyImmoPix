<?php
/**
 * Template Name: Full width page
 * @package commercegurus
 */
global $cg_options;
get_header();

?>

<div class="content-area">
    <div class="col-lg-12 col-md-12">
   <?php echo do_shortcode( '[vc_row][vc_column width="1/1"][vc_column_text][layerslider id="1"]'.'[/vc_column_text][/vc_column][/vc_row]' ); ?>
   </div>
   <div class="col-lg-12 col-md-12">
   
            <?php
			
				$defaults = array(
				'theme_location'  => '',
				'menu'            => 'Home Menus',
				'container'       => 'div',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'menu',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
				);

			
			?>
			
			<?php //wp_nav_menu( $defaults ); ?>
						
   </div>
   
   
    <?php while ( have_posts() ) : the_post(); ?>
       
	    <?php get_template_part( 'content', 'fullwidthpage' ); ?>
        
		
		<div class="container">
            
        </div>
    <?php endwhile; // end of the loop.   ?>
</div><!-- #primary -->
<?php get_footer(); ?>
