<?php

/**
 * Template Name: HOMEPAGE
 * @package commercegurus
 */


global $cg_options;
get_header();
$upload_dir = wp_upload_dir();
?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/myslider.css">
<script src="<?php bloginfo('template_url'); ?>/js/slider.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/assets/plugins/jquery.easing.1.3.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/assets/jquery.bxslider.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/assets/jquery.bxslider.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/assets/jquery.bxslider.css"></script>


<script>
(function($){ 
$(document).ready(function () {
$('.bxslider').bxSlider({
pagerCustom: '#bx-pager'
});
$('.bxslider1').bxSlider({
pagerCustom: '#bx-pager1'
});


});
})(jQuery);
</script>




<script>
  window.console = window.console || function(t) {};
</script>


<script>
     (function($){ 
	  $(document).ready(function () {
    $('.ba-slider').each(function () {
        var cur = $(this);
        var width = cur.width() + 'px';
        cur.find('.resize img').css('width', width);
        drags(cur.find('.handle'), cur.find('.resize'), cur);
    });
});
$(window).resize(function () {
    $('.ba-slider').each(function () {
        var cur = $(this);
        var width = cur.width() + 'px';
        cur.find('.resize img').css('width', width);
    });
});
function drags(dragElement, resizeElement, container) {
    dragElement.on('mousedown touchstart', function (e) {
        dragElement.addClass('draggable');
        resizeElement.addClass('resizable');
        var startX = e.pageX ? e.pageX : e.originalEvent.touches[0].pageX;
        var dragWidth = dragElement.outerWidth(), posX = dragElement.offset().left + dragWidth - startX, containerOffset = container.offset().left, containerWidth = container.outerWidth();
        minLeft = containerOffset + 10;
        maxLeft = containerOffset + containerWidth - dragWidth - 10;
        dragElement.parents().on('mousemove touchmove', function (e) {
            var moveX = e.pageX ? e.pageX : e.originalEvent.touches[0].pageX;
            leftValue = moveX + posX - dragWidth;
            if (leftValue < minLeft) {
                leftValue = minLeft;
            } else if (leftValue > maxLeft) {
                leftValue = maxLeft;
            }
            widthValue = (leftValue + dragWidth / 2 - containerOffset) * 100 / containerWidth + '%';
            $('.draggable').css('left', widthValue).on('mouseup touchend touchcancel', function () {
                $(this).removeClass('draggable');
                resizeElement.removeClass('resizable');
            });
            $('.resizable').css('width', widthValue);
        }).on('mouseup touchend touchcancel', function () {
            dragElement.removeClass('draggable');
            resizeElement.removeClass('resizable');
        });
        e.preventDefault();
    }).on('mouseup touchend touchcancel', function (e) {
        dragElement.removeClass('draggable');
        resizeElement.removeClass('resizable');
    });
}})(jQuery);
      //@ sourceURL=pen.js
    </script>
    <strong><script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


<div class="content-area">
  <div class="col-lg-12 col-md-12">
    <?php the_content(); ?>
  </div>


  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php //cg_get_page_title(); ?>


  <div class="entry-content">
    <div id="example" class="col-lg-12 col-md-12 clsexamp"><?php echo get_string_example();?>  </div>
    <div class="container">
      <div class="row"> <?php get_template_part('home','example');?></div>
    </div> 
  </div>

</div><!-- #primary -->

<!-- #Read more-->
<div class="blog-blue" id="readmore">
  <?php include('home-readmore.php');?>
</div>

<div class="top-blog topmargin-price" id="price">
	<div class="container">
    <div class="row">
    		<div class="col-lg-5 col-sm-5 col-md-5">
      		<?php if(ICL_LANGUAGE_CODE == 'en'){?>
      		<div class="cer-blog"> <img src="<?php echo $upload_dir['baseurl']; ?>/icon/price1.jpg" /></div>
      		<?php }else if(ICL_LANGUAGE_CODE == 'nl'){?>
      		<div class="cer-blog"> <img src="<?php echo $upload_dir['baseurl']; ?>/icon/price-new.jpg" /></div>
      		<?php }else if(ICL_LANGUAGE_CODE == 'fr'){?>
      		<div class="cer-blog"> <img src="<?php echo $upload_dir['baseurl']; ?>/icon/price-new.jpg" /></div>
      		<?php }?>
    		</div>
		    <?php include('home-price.php');?>
    </div>
	</div>
</div>


<div class="blog-blue" id="tour">
  <div class="container"><div class="row">
  	<div class="col-lg-5 col-ms-5 col-md-5">
    	<?php if(ICL_LANGUAGE_CODE == 'en'){?>
    	<video width="450" height="340" controls>
    		<source src="<?php echo $upload_dir['baseurl']; ?>/video/maxrevised.mp4" type="video/mp4">
    		Your browser does not support the video tag.
    	</video>
    	<?php }else if(ICL_LANGUAGE_CODE == 'nl'){?>
    	
    	<video width="450" height="340" controls>
    		<source src="<?php echo $upload_dir['baseurl']; ?>/video/maxrevised.mp4" type="video/mp4">
    		Your browser does not support the video tag.
    	</video>
    	
    	<?php }else if(ICL_LANGUAGE_CODE == 'fr'){?>
    	
    	<video width="450" height="340" controls>
    		<source src="<?php echo $upload_dir['baseurl']; ?>/video/maxrevised.mp4" type="video/mp4">
    		Your browser does not support the video tag.
    	</video>
    	<?php }?>
    </div>
    <?php include('home-tour.php');?>
  	</div>
</div>


</div>


<div class="service-area" id="service">
<?php include('home-services.php');?>
</div>




<div class="iocnlogo">

<?php include('home-brand.php');?>
</div>



<?php get_footer(); ?>
