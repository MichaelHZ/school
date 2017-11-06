$(document).ready(function(){
		$.fn.menu()
		$("#banner").swiperBanner({"bannername":"bannerSwiper","nav":1,"prevnext":0})
		$('#Column .Tab').Tab("li",".change",".Tab_nr","click")
		setTimeout(function(){
			
			$("#Column .Tab_nr").loadmore({"items":".docs","morebtn":".btn_more","pagename":".pagenav"})
			$("#docList").loadmore({"items":".docs","morebtn":".btn_more","pagename":".pagenav"})
			$("#Teacher").loadmore({"items":".PhotoList","morebtn":".btn_more","pagename":".pagenav"})	
			$("#Project").loadmore({"items":".Project","morebtn":".btn_more","pagename":".pagenav"})
			$("#ProjectList").loadmore({"items":".DocList","morebtn":".btn_more","pagename":".pagenav"})
		
		},50)
		
		
})



//选项卡切换
		$.fn.Tab=function(subtab,selectname,tab,action){
			var self=$(this);
			var select_=0;
			var addselectname=selectname.replace(".","")
			if (self.find(subtab).length==0) return false;
			if (self.find(subtab+selectname).length==0) 
			{self.find(subtab+":eq(0)").addClass(addselectname);}
			
			self.find(subtab).each(function(index, element) {
                if (!$(this).is(selectname))
				{
					self.parent().find(tab+":eq("+index+")").hide();
				}
            });
			self.find(subtab).bind(action,function(){
				self.find(subtab+selectname).removeClass(addselectname);
				$(this).addClass(addselectname);
				var index=$(this).index();
				self.siblings(tab).hide()
				self.siblings(tab+":eq("+index+")").show();
				return false;
			})
		}
		
		
//菜单
$.fn.menu=function(){
	var btn		=	$(".btn_menu"),
		menu	=	$("#menu"),
		menu_w	=	menu.outerWidth(),
		menu_zz	=	$("#menu_zz")
	menu.find("ul>li>.change").next().fadeIn();
	menu.find("ol").prev().append('<i class="icon_open"></i>')
	$("body").on("click","#menu ul>li>a",function(){
			if ($(this).next("ol").length>0)
			{
					if ($(this).is('.change'))
					{
						$(this).removeClass("change")	
						$(this).next("ol").slideUp(300);
					}
					else
					{
						$(this).addClass("change")
						$(this).next("ol").slideDown(300);
					}
				return false;
			}
		
	})
	$("body").on("click",".btn_menu",function(){
		if (!$(this).is(".openmenu"))
		{
			$(this).addClass("openmenu").animate({"margin-left":menu_w},300)
			menu.css({"display":"block","opacity":0}).animate({"opacity":1,"margin-left":0},300)
			menu_zz.fadeIn();
			
		}
		else
		{
			$("#menu_zz").trigger("click");
		}
	})
	
	
	$("body").on("click","#menu_zz",function(){
		btn.removeClass("openmenu").animate({"margin-left":0},300)
		menu.animate({"opacity":0,"margin-left":-menu_w},300)
		menu_zz.fadeOut();
	})
}

//加载更多
$.fn.loadmore=function(config){
	
	$(this).each(function(index, element) {
			var self=$(this)
			if (self.length==0) return false;
		
			
			self.find(config.morebtn).bind("click",function(){
				
				var obj=$(this)
				var href=self.find(config.pagename).find(".change").attr("href")
				var index=self.find(config.pagename).find(".change").index();
				var len=self.find(config.pagename+" a").length
				
				if (index<=len-1)
				{
					
					
							if (self.find(config.items+":last").length==0)
							{
								
								self.find(config.pagename).before("<div id='loadpage'></div>")
							}
							else
							{
								
									self.find(config.items+":last").after("<div id='loadpage'></div>")
							}
							self.find("#loadpage").load(href+" [data-page-content]",function(data){
								
								$("#loadpage "+config.items).unwrap().unwrap()
								if (index<len-1)
								{
									self.find(config.pagename).find(".change").next().addClass("change").siblings().removeClass("change");
								}
								else
								{
									obj.unbind("click").addClass("unclick").text("这是我的底线")	
								}
								
							})
					
				}
				else
				{
					$(this).unbind("click").addClass("unclick").text("这是我的底线")
					
				}
			return false;
			})
			
			if (self.find(config.pagename).find(".change").length==0)
			{
				
				self.find(config.pagename).find('a:first').addClass('change');
				self.find(config.morebtn).trigger("click");
				
				
			}


    });
	
}


  
//广告
$.fn.swiperBanner=function(config){
	var self=$(this)
	if (self.length==0) return false;
	
	var ulobj=self .find("ul")
	var liobj=self .find("li")
	var nav,prevnext
	config.nav==1? nav='<div class="swiper-pagination"></div>':nav=''
	config.prevnext==1? prevnext='<div class="swiper-button-next"></div><div class="swiper-button-prev"></div>': prevnext=' '
	
	if (liobj.length>0)
	{
		liobj.each(function(index, element) {
            var htmls=$(this).html()
			$(this).replaceWith('<div class="swiper-slide">'+htmls+'</div>');
        });	
		ulobj.replaceWith('<div class="swiper-container" id="'+config.bannername+'"><div class="swiper-wrapper">'+ulobj.html()+'</div>'+nav+prevnext+'</div>')
		var swiper = new Swiper('#'+config.bannername, {
			pagination: '#'+config.bannername+' .swiper-pagination',
			nextButton: '#'+config.bannername+' .swiper-button-next',
			prevButton: '#'+config.bannername+' .swiper-button-prev',
			slidesPerView: 1,
			paginationClickable: true,
			spaceBetween: 1,
			loop: true,
			autoplay:typeof(config.autoplay)!="undefined" ? config.autoplay : false

		});
	}
	
}

