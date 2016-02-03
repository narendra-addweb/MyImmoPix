<?php
/*

Template Name: Example

*/
get_header();

?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/myslider.css">
<script src="<?php bloginfo('template_url'); ?>/js/slider.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/min.js" type="text/javascript"></script>
<script>
  window.console = window.console || function(t) {};
</script>


<script>
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
}
      //@ sourceURL=pen.js
    </script>
    <strong><script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script></strong>




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
						
                       
								
                            <?php get_template_part( 'content', 'example' ); ?>

                       
                        
                        
                        

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
            
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->

<?php get_footer(); ?>