<div id="secondary" class="widget-area msecondary" role="complementary">
  <div class="col-lg-8 col-md-8 togocls"><strong><?php echo get_str_readytostart();?></strong></div>
  <div class="row ready">
     <?php 
		   if(ICL_LANGUAGE_CODE == 'fr')
		   {
		   	$gotopage = '69199';
		   }
		   else if(ICL_LANGUAGE_CODE == 'nl')
		   {
		   	$gotopage = '69198';
		   }
		   else if(ICL_LANGUAGE_CODE == 'en')
		   {
		   	$gotopage = '66607';
		   }
		   ?>
      <div class="col-lg-8 col-md-8 topmargin-example"> <?php if(!empty($user_ID)){?>
      <a href="<?php echo get_bloginfo('url').'/?p='.$gotopage.'/';?>"><button type="button" name="" class="btn  hbtn btn-sm"><?php echo get_str_uploadphoto();?></button></a></strong> <?php } else {?>
      <a href="<?php echo get_bloginfo('url').'/my-account/';?>"><button type="button" name="" class="btn  hbtn btn-sm">
	  <?php echo get_str_createanaccount();?></button></a>
      <?php }?>
      
      </div>
  </div>
 
</div>