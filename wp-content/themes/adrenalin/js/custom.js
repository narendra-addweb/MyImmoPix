jQuery(document).ready(function(){jQuery('input[type="checkbox"]').wrap('<div class="input-rc"></div>'),jQuery(".input-rc").append('<span class="input-rc-span"></span>'),jQuery(".lwa .lwa-modal-bg").live("click",function(){jQuery(".lwa .lwa-modal").hide()}),jQuery(".lwa-modal-close").live("click",function(){jQuery(".lwa .lwa-modal").hide()}),jQuery("#menu-home-menus li a").live("click",function(){var e=jQuery(this).attr("href");jQuery("html, body").animate({scrollTop:jQuery(e).offset().top-150},1e3)}),jQuery("#menu-home-menus-1 li a").live("click",function(){var e=jQuery(this).attr("href");jQuery("html, body").animate({scrollTop:jQuery(e).offset().top-50},1e3)}),jQuery(".custom-lang-select").append('<div class="button"></div>'),jQuery(".custom-lang-select").append('<ul class="select-list"></ul>'),jQuery(".custom-lang-select select option").each(function(){var e=jQuery(this).css("background-image");jQuery(".select-list").append('<li class="clsAnchor"><a href="'+jQuery(this).val()+'" class="'+jQuery(this).attr("class")+'" style=background-image:'+e+">"+jQuery(this).text()+"</a></li>")}),jQuery(".custom-lang-select .button").html(jQuery(".custom-lang-select select").find(":selected").text()+'<a href="javascript:void(0);" class="select-list-link">Arrow</a>'),jQuery(".custom-lang-select ul li").each(function(){jQuery(this).find("a").text()==jQuery(".custom-lang-select select").find(":selected").text()&&jQuery(this).addClass("active")}),jQuery(".custom-lang-select a.select-list-link").click(function(){jQuery(".custom-lang-select ul li").slideToggle()}),"selected"==jQuery(".custom-lang-select select option").attr("selected")});