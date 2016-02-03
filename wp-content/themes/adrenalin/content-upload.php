
<?php 
if(ICL_LANGUAGE_CODE == 'fr')
{
$gotopage = '69217';
$next = "Etape suivante >>";
$morephoto = "Ou charger plus de photos";
}
else if(ICL_LANGUAGE_CODE == 'nl')
{
$gotopage = '69216';
$next = "volgende stap >>";
$morephoto = "Of meer foto's opladen";
}
else if(ICL_LANGUAGE_CODE == 'en')
{
$gotopage = '67546';
$next = "Next step >>";
$morephoto = "or upload more photos";

}
?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
	
	    
	
	<div class="entry-content topmargin-upload">
        <?php the_content(); ?>
		
	
		
		
       <div class="nextclass"><a href="<?php echo get_bloginfo("url");?>/?p=<?php echo $gotopage; ?>"><button type="button" class="btn btn-primary"><?php echo $next;?></button></a><br /><span class="topmargin"> <?php echo $morephoto; ?> . </span></div>
		
			
	<div class="mythumb">
	<ul class="mythumb_cls"></ul>
	</div>	
		
    </div><!-- .entry-content -->
    <!--<div class="container">
        <?php //edit_post_link( __( 'Edit', 'commercegurus' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    </div>-->
</article><!-- #post-## -->
