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


;?>
		    
<div class="col-lg-4 col-md-4 topmargin4">

 <a href="<?php echo get_bloginfo('url').'?p='.$gotopage.'&pid='.trim($_GET['pid']).'';?>"><button type="button" name="" class="btn  hbtn btn-sm"><?php echo $ustr = get_str_morephoto();?></button></a>

</div>

<div class="col-lg-2 col-md-2 topmargin4"><span class="orr"><?php echo get_str_or();?></span></div>


<div class="col-lg-5 col-md-5" style="margin-left:30px;"><div id="secondary" class="widget-area msecondary" role="complementary">
  <div class="togocls"><strong><?php echo $ustr = get_str_readytogo();?></strong></div>
  <div class="row ready">
    
      <div class="sbutn topmargin"> <?php if(!empty($_GET['pid'])){?>
      <a href="<?php echo get_bloginfo('url').'/order-summary/?pid='.$_GET['pid'].'';?>">
      <button type="button" class="btn btn-warning btn-sm hbtn1"><?php echo $ustr = get_str_orderservice();?> >></button></a></strong> <?php }?>
      </div>
  </div>

  <div class="row">
      <div class=""><strong><?php echo $ustr = get_str_wrong_photos();?></strong></div>
       <div class="deletlink"><a href="javascript:void(0);" class="deleteproject" id="<?php echo $_GET['pid'];?>"><?php echo $ustr = get_str_delete();?></a></div>
  </div>
  
 
  
  
</div></div>



<button style="display:none"  type="button" class="btn btn-primary btn-lg sucessbtn" data-toggle="modal" data-target="#myModal">button</button>

<script>
jQuery( document ).ready(function() {

	<?php if(ICL_LANGUAGE_CODE == 'fr')
	{
	$gotopage = '69190';
	}
	else if(ICL_LANGUAGE_CODE == 'nl')
	{
	$gotopage = '69189';
	}
	else if(ICL_LANGUAGE_CODE == 'en')
	{
	$gotopage = '67465';
	}
	?>
	
	jQuery(".close").click(function() {
	document.location.href='<?php get_bloginfo('url');?>/?p='+<?php echo $gotopage; ?>;
	});
	jQuery(".mbtn").click(function() {
	document.location.href='<?php get_bloginfo('url');?>/?p='+<?php echo $gotopage; ?>;
	});
	
	jQuery(".deleteproject").click(function() {
	var id = this.id;	
	jQuery.ajax({
	type: "POST",
	datatype: 'json',
	url: "<?php  bloginfo( 'template_url' ); ?>/delete-project-ajax.php",
	data: {id: id}, // serializes the form's elements.
	success: function(data)
	{
	if(data == 1){
		jQuery(".sucessbtn").trigger("click");
	}
	else if(data == 0){
		alert("Project and images not deleted Please try again");
	}
	}
	});
	});

	//on image click
});
</script>

<!-- popp model window-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel"></h4>

      </div>
	  
	  <?php $upload_dir = wp_upload_dir(); ?>
      <div class="modal-body">
      
      <div class="mainpop">
             <div class="msgg topmargin"><span><?php echo $ustr = get_str_delete_project_success_msg();?>  </span></div>
      </div>
      </div>

      <div class="modal-footer mfooter">

        <button type="button" class="btn btn-defaul mbtn" data-dismiss="modal"><?php echo $ustr = get_str_closetxt();?></button>

        <!--<button type="button" class="btn btn-primary">Save changes</button>-->

      </div>

    </div>

  </div>

</div>
<!-- popp model window-->