jQuery(document).ready(function() {

  /* Custom radio and checkbox design */
  jQuery('input[type="radio"], input[type="checkbox"]').wrap('<div class="input-rc"></div>');
  jQuery('.input-rc').append('<span class="input-rc-span"></span>');
  /* End */

  /* Custom select design (Footer language select) */
  jQuery('.custom-lang-select').append('<div class="button"></div>');
  jQuery('.custom-lang-select').append('<ul class="select-list"></ul>');
  //jQuery('.custom-lang-select .button').append('<a href="javascript:void(0);" class="select-list-link">Arrow</a>');

  jQuery('.custom-lang-select select option').each(function() {
    var bg = jQuery(this).css('background-image');
    jQuery('.select-list').append('<li class="clsAnchor"><a href="'+jQuery(this).val()+'" class="'+ jQuery(this).attr('class') +'" style=background-image:' + bg + '>'+jQuery(this).text()+'</a></li>');
  });
  jQuery('.custom-lang-select .button').html(jQuery('.custom-lang-select select').find(':selected').text() + '<a href="javascript:void(0);" class="select-list-link">Arrow</a>');

  jQuery('.custom-lang-select ul li').each(function() {
    if (jQuery(this).find('a').text() == jQuery('.custom-lang-select select').find(':selected').text()) {
      jQuery(this).addClass('active');
    }
  });

  jQuery('body').click(function(){
    jQuery('.custom-lang-select ul li').hide();
  });

  jQuery('.custom-lang-select a.select-list-link').on("click", function(event) {
    event.stopPropagation();
    jQuery('.custom-lang-select ul li').slideToggle();
  });


  /* End */

  /* Login Popup */
  jQuery(".lwa .lwa-modal-bg").live( "click", function() {
    jQuery(".lwa .lwa-modal").hide();
  });

  jQuery('.lwa-modal-close').live( "click", function() {
    jQuery(".lwa .lwa-modal").hide();
  });
  /* End */

  /* Menu */
  //jQuery('#block-system-main-menu ul.menu').wrap('<div class="menu-wrap"></div>');
  jQuery('.homemenu').prepend('<a href="javascript:void(0);" class="menu-login-btn">login</a><a href="javascript:void(0);" class="menu-navbtn"><span></span><span></span><span></span></a>');
  
  jQuery(".menu-navbtn").click(function() {
    jQuery('.homemenu .menu').slideToggle().toggleClass(' ');
    jQuery('.login-area').hide();
  });

  //jQuery('.cg-header-search').prepend('');

  jQuery(".menu-login-btn").click(function() {
    jQuery('.login-area').slideToggle().toggleClass(' ');
    jQuery('.homemenu .menu').hide();
  });

  /* Table responsive */
  jQuery('.shop_table').wrap('<div class="responsive_shop_table"></div>');
  /* End */

   /* Scrolling effect in home page*/
  jQuery( ".homemenu .menu li a" ).live( "click", function() {
    var target = jQuery(this).attr("href");
      jQuery('html, body').animate({
      scrollTop:jQuery(target).offset().top - 150
      }, 1000);
  });

  jQuery( ".cg-header-fixed .homemenu .menu li a" ).live( "click", function() {
    var target = jQuery(this).attr("href");
      jQuery('html, body').animate({
      scrollTop:jQuery(target).offset().top - 50
      }, 1000);
  });

});