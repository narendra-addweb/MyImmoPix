jQuery(document).ready(function(){jQuery('input[type="checkbox"]').wrap('<div class="input-rc"></div>'),jQuery(".input-rc").append('<span class="input-rc-span"></span>'),jQuery(".lwa .lwa-modal-bg").live("click",function(){jQuery(".lwa .lwa-modal").hide()}),jQuery(".lwa-modal-close").live("click",function(){jQuery(".lwa .lwa-modal").hide()}),jQuery("#menu-home-menus li a").live("click",function(){var e=jQuery(this).attr("href");jQuery("html, body").animate({scrollTop:jQuery(e).offset().top-150},1e3)}),jQuery("#menu-home-menus-1 li a").live("click",function(){var e=jQuery(this).attr("href");jQuery("html, body").animate({scrollTop:jQuery(e).offset().top-50},1e3)})});