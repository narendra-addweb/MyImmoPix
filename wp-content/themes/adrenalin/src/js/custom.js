jQuery(document).ready(function() {

  /* Custom checkbox design */
  jQuery('input[type="checkbox"]').wrap('<div class="input-rc"></div>');
  jQuery('.input-rc').append('<span class="input-rc-span"></span>');
  /* End */

 /* Login Popup */
  jQuery(".lwa .lwa-modal-bg").live( "click", function() {
    jQuery(".lwa .lwa-modal").hide();
  });

  jQuery('.lwa-modal-close').live( "click", function() {
    jQuery(".lwa .lwa-modal").hide();
  });
  /* End */

  /* Scrolling effect in home page*/
  jQuery( "#menu-home-menus li a" ).live( "click", function() {
    var target = jQuery(this).attr("href");
      jQuery('html, body').animate({
      scrollTop:jQuery(target).offset().top - 150
      }, 1000);
  });

  jQuery( "#menu-home-menus-1 li a" ).live( "click", function() {
    var target = jQuery(this).attr("href");
      jQuery('html, body').animate({
      scrollTop:jQuery(target).offset().top - 50
      }, 1000);
  });
 
});