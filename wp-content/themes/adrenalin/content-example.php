<?php  $upload_dir = wp_upload_dir(); ?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
                            
					
         
                                     
                
        <div class="row topmargin"><div class="col-lg-12 col-md-12">
        
                            <?php                
                            $rows = get_field('sample');
                            if($rows){
                            foreach($rows as $row) {
                            ?>   
                             <div class="col-lg-4 col-md-4 divimage">
                                <div class="ba-slider bxslider">
                                    <img id=""  src="<?php echo  $row['after']; ?>"  />       
                                    <div class="resize">
                                    <img id="" src="<?php echo  $row['before']; ?>"  />
                                    </div>
                                <span class="handle"></span>
                                </div>
                            </div>        
                             
                            
                            <?php  } }?>
                
                
        </div></div> 
        
    </div><!-- .entry-content -->
   
   
   
   
    <div class="container">
        <?php edit_post_link( __( 'Edit', 'commercegurus' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    </div>
</article><!-- #post-## -->
