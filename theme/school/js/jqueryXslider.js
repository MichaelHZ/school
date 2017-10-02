/**
 * @package Xslider - A slider plugin for jQuery
 * @version 0.5
 * @author xhowhy <http://x1989.com> 
 **/
;(function($){
	$.fn.Xslider_full=function(options){
		var minwidth=1000
		var objs=$(this);
		var window_w=$(window).width();
		var banner_obj=$(this).find(".conbox div");
		var banner_h=$(this).find(".conbox").height();
		window_w<=minwidth ? window_w=minwidth : window_w=window_w;
		banner_obj.css({"width":window_w+"px","position":"relative"})
		$(this).find(".conbox").find("img").each(function(index, element) {
			var img_url =$(this).attr("src");
			var img = new Image();
			var seft=$(this)
			img.onload = function(){
				var imgwidth=img.width
				var imgheight=img.height
				imgwidth=imgwidth/(imgheight/banner_h)
				seft.css({"position":"relative","left":"50%","margin-left":"-"+imgwidth/2+"px"})
			};	
			img.src = img_url;
			var check = function(){
				if(img.width>0 || img.height>0){clearInterval(set);}
			};
			var set = setInterval(check,100);
		});
		
		$(window).resize(function(){
				var window_w=$(window).width();
				window_w<=minwidth ? window_w=minwidth :
				banner_obj.width(window_w);
				
		})
		
		$(this).Xslider(options);
		
		if (typeof($(window).resizeEnd)!="undefined")
		{
				$(window).resizeEnd({
					delay :200
				}, function(){
					objs.find(".switcher a.cur").mouseover();	
				});

			
		}
		return objs
	}
	
	$.fn.Xslider_arrow=function(){
			var objs=$(this);	
			$(this).append('<a href="javascript:;" class="move_left"><span></span></a> <a href="javascript:;" class="move_right"><span></span></a> ')
			/*移动左*/
				$(this).find(".move_right").click(function(){
					var mb=objs.find(".switcher");
					var index=mb.find(".cur").index();
					var length=mb.find("a").length;
					if (index==0)
					{	length=length-1;
						mb.find("a:eq("+length+")").mouseover();
					}
					else
					{
						index=index-1;
						mb.find("a:eq("+index+")").mouseover();
					}
					
				})
				/*移动右*/
				$(this).find(".move_left").click(function(){
					
					var mb=objs.find(".switcher");
					var index=mb.find(".cur").index();
					var length=mb.find("a").length;
					if (index==length-1)
					{
						mb.find("a:eq(0)").mouseover();
					}
					else
					{	index=index+1;
						mb.find("a:eq("+index+")").mouseover();
					}
				})	
				
			return objs			
	}
	$.fn.Xslider_switcher_hidden=function(){
		var objs=$(this);	
		objs.find(".switcher").hide();
		return objs			
	}
	
	
	$.fn.Xslider = function(options){var settings ={
			affect: 'scrollx', //效果  有scrollx|scrolly|fade|none
			speed: 1200, //动画速度
			space: 6000, //时间间隔
			auto: true, //自动滚动
			trigger: 'mouseover', //触发事件 注意用mouseover代替hover
			conbox: '.conbox', //内容容器id或class
			ctag: 'a', //内容标签 默认为<a>
			switcher: '.switcher', //切换触发器id或class
			stag: 'a', //切换器标签 默认为a
			current:'cur', //当前切换器样式名称
			rand:false //是否随机指定默认幻灯图片
		};
		
		var len=$(this).find(".conbox>div")
		var html=''
		for (var i=1;i<=len.length;i++)
		{
			if (i==1)
			{html+="<a href='#' class='cur'></a>"}
			else
			{html+="<a href='#'></a>"	}
			
		}
		$(this).find(".conbox").after('<div class="switcher">'+html+'</div>')
		
		settings = $.extend({}, settings, options);
		var index = 1;
		var last_index = 0;
		var $conbox = $(this).find(settings.conbox),$contents = $conbox.find(settings.ctag);
		var $switcher = $(this).find(settings.switcher),$stag = $switcher.find(settings.stag);
		if(settings.rand) {index = Math.floor(Math.random()*$contents.length);slide();}
		if(settings.affect == 'fade'){$.each($contents,function(k, v){(k === 0) ? $(this).css({'position':'absolute','z-index':9}):$(this).css({'position':'absolute','z-index':1,'opacity':0});
			});
		}
		function slide(){if (index >= $contents.length) index = 0;
			$stag.removeClass(settings.current).eq(index).addClass(settings.current);
			switch(settings.affect){case 'scrollx':
					$conbox.width($contents.length*$contents.width());
					$conbox.stop().animate({left:-$contents.width()*index},{ duration:settings.speed,easing:'easeOutCirc' });
					break;
				case 'scrolly':
					$contents.css({display:'block'});
					$conbox.stop().animate({top:-$contents.height()*index+'px'},settings.speed);
					break;
				case 'fade':
					$contents.eq(last_index).stop().animate({'opacity': 0}, settings.speed/2).css('z-index',1)
							 .end()
							 .eq(index).css('z-index',9).stop().animate({'opacity': 1}, settings.speed/2)
					break;
				case 'none':
					$contents.hide().eq(index).show();
					break;
			}
			last_index = index;
			index++;
		};
		if(settings.auto) var Timer = setInterval(slide, settings.space);
		$stag.bind(settings.trigger,function(){_pause()
			index = $(this).index();
			slide();
			_continue()
		});
		$conbox.hover(_pause,_continue);
		function _pause(){
			clearInterval(Timer);
		}
		function _continue(){
			if(settings.auto)Timer = setInterval(slide, settings.space);
		}	
	}
})(jQuery);