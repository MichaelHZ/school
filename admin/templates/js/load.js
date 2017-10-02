$(document).ready(function(){
	$("body").append('<div id="Threelevelmenu"></div>')
	$(".btn_more").moremenu()
	$("#nav").navmenu()
	
	
})
//导航菜单
$.fn.navmenu=function(){
	var self=$(this);
	if (self.length==0) return false;
	self.find("ul").addScroll();
	self.find("ol").prev().addClass("btn_openmenu")
	self.find(".threelevelmenu").prev().addClass("btn_threelevelmenu")
	var threelevelmenu=$("#Threelevelmenu")
	self.find(".btn_threelevelmenu").bind("click",function(){
		if (threelevelmenu.is(":visible") && $(this).parent().is(".hover"))
		{
			
			$(this).parent().removeClass("hover")
			threelevelmenu.stop(true,false).fadeOut();
			
			
		}
		else
		{
			$(this).parent().siblings().removeClass("hover")
			$(this).parents("ul").find("ol li").removeClass("hover")
			$(this).parent().addClass("hover");
			threelevelmenu.html($(this).next().html()).fadeIn();
		}
	})
	
	threelevelmenu.bind("mouseleave",function(){
		threelevelmenu.stop(true,false).fadeOut();
	})
	
	self.find(".btn_openmenu").bind("click",function(){
		if ($(this).next().is(":visible"))
		{
				$(this).removeClass("change");	
				$(this).next().slideUp(200)
		}
		else
		{
				$(this).parents("ul").find(".change").removeClass("change").next().slideUp(200)
				$(this).addClass("change");	
				$(this).next().slideDown(200)
				
				
				
		}
		
		threelevelmenu.fadeOut(5)
		setTimeout(function(){
			$('.div_scroll').scroll_absolute({arrows:false,mouseWheelSpeed: 30,verticalGutter:0})
		},300)
		
		
		
	})
	
	
	self.find(".change").next().show(0)
	setTimeout(function(){
	$(".div_scroll").height($(window).height()-120);
	$('.div_scroll').scroll_absolute({arrows:false,mouseWheelSpeed: 30,verticalGutter:0})
	},300)
	$(window).bind("resize",function(){
			$(".div_scroll").height($(window).height()-120);
			$('.div_scroll').scroll_absolute({arrows:false,mouseWheelSpeed: 30,verticalGutter:0})
	})
	
	
}




//自动加滚动条外包标签
$.fn.addScroll=function(){
	var self=$(this)
	if (self.length==0)  return false;
	self.wrap('<div class="container1"></div>').wrap('<div class="div_scroll"></div>');

}


//显示更多菜单
$.fn.moremenu=function(){
	var self=$(this);
	if (self.length==0) return false;
	
	var more_menu=$(".more_menu")
	var more_menu_h=more_menu.outerHeight();
	if (more_menu.length==0) return false;
	
	more_menu.bind("mouseenter",function(){
		$(document).unbind("click");
	})
	more_menu.bind("mouseleave",function(){
		more_menu.fadeOut();
		$(document).unbind("click");
	})
	
	more_menu.find("a").bind("click",function(){
			alert("你点击了")
			
	})
	
	self.bind('click',function(){
		var window_w=$(window).width();
		var window_h=$(window).height();
		var left=$(this).offset().left+40;
		var top=$(this).offset().top+20;
		var height=top+more_menu_h
		
		if (height>window_h)
		{var bottom=window_h-top+20;
		 more_menu.css({"top":"auto","bottom":bottom,"right":window_w-left})
		}
		else
		{more_menu.css({"bottom":"auto","top":top,"right":window_w-left});}
		
		
		more_menu.stop(true,false).fadeIn()		
		$(document).unbind("click");
		setTimeout(function(){
				$(document).bind("click",function(){
						more_menu.fadeOut();
						$(document).unbind("click");
						
				})
		},300)
		return false;		
	})
	
	
	
}