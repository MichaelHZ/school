$(document).ready(function(){
	
		$("#menu").dropdown_menu()
		if ($("#banner").length>0)
		{
				$("#banner").ZHYslider({
						fullscreen	:true,
						arrow		:true,		
						speed: 1200, 
						space: 6000,
						auto: true, //自动滚动
						affect:'fade',
						ctag: '.Slide_'
				})
		}
		
		if ($("#InterestBanner").length>0)
		{
				$("#InterestBanner").ZHYslider({
						arrow		:true,		
						speed: 1200, 
						space: 6000,
						auto: true, //自动滚动
						affect:'scrollx',
						ctag: '.Slide_'
				})
		}
		
		
		if ($("#AboutUsBanner").length>0)
		{
				$("#AboutUsBanner").ZHYslider({
						speed: 1200, 
						space: 6000,
						auto: true, //自动滚动
						affect:'fade',
						ctag: '.Slide_'
				})
		}
		
		
		if ($("#SpecialtyCourses").length>0)
		{
			
			$(".Intr_nr").each(function(index, element) {
					$(".Intr_nr:eq("+index+")").ZHYslider({
							speed: 1200, 
							space: 6000,
							auto: false, //自动滚动
							affect:'fade',
							ctag: '.Slide_'
					})
            });
			$('#SpecialtyCourses .fenlei').Tab({lilab:"li",labselect:".change",Tabname:".Intr_nr",labaction:"click",animatename:"fade",animateTime:500,mode:"none"})
		}
		
		if ($("#playBanner").length>0)
		{
				$("#playBanner").ZHYslider({
						speed: 1200, 
						space: 6000,
						auto: true, //自动滚动
						affect:'fade',
						ctag: '.Slide_'
				})
		}
		$(".Searchform .text").bind("focusin",function(){
			$(this).parent().addClass("focus_searchForm");	
		}).bind("focusout",function(){
			
			$(this).parent().removeClass("focus_searchForm");	
		})
		$(".Searchform [placeholder]").key("","#00baac","#999")
		$("#userLogin [placeholder]").key("","#333","#999")
		$("#sidebarFenlei .SortList3").sidebar_menu()
		$('#News .NewsTab').Tab({lilab:"li",labselect:".change",Tabname:".Tab_nr",labaction:"click",animatename:"scroll_x",animateTime:300,mode:"none"})
		$('#InterestDoc .InterestTab').Tab({lilab:"li",labselect:".change",Tabname:".Tab_nr",labaction:"click",animatename:"scroll_x",animateTime:300,mode:"none"})
		$("#BlogMenu ul").Tab_()
		$("#Banner2").imgcenter();
		$.fn.css3_allnth([
			'.PicList li:nth-child(3n){margin-right:0px;}',
			'#column .columnbox:nth-child(2n){margin-right:0px;}',
			'.MainTitle::after{width:61px;position:absolute;bottom:-1px;left:50%;margin-left:-30px;border-bottom:3px solid #00bbaa;content:"";}',
			'.FocusColumn h5::after{width:43px;position:absolute;bottom:0px;left:50%;margin-left:-21px;border-bottom:2px solid #01baaa;content:"";}',
			'.docs::after{clear:both;display:block;content:"";}',
			'.PhotoList li::after{clear:both;display:block;content:"";}'
		])	
		
		
		
		if ($("#blogList").length>0)
		{
			//Blog列表页.html
			$("#blogList").loadmore({"items":".docs","morebtn":".btn_readmore","pagename":".pagenav"})		
		}
		$("#BlogMenu").floatheader({"time":600,"delaytime":10,"top":441,"class_change":"BlogMenu_change"})
		
		
		$("#RecommendGundong").jcarousellite_gundong({btn:1,list:".PictureList li","visible":5,"auto":5500,"speed":1000,scroll: 5})		
		
		$.fn.hovers()
})



//悬停效果
$.fn.hovers=function(){
	
	
var time_delay=null;	

			$(".btn_backtop").bind("click",function(){
				
				$("html,body").animate({scrollTop:0},1000)
				
			return false;	
			})
			if ($("#GonggaoGundong").length>0)
			{
				
					$('#GonggaoGundong').find(".gonggaoList").wrap("<li></li>");
					$('#GonggaoGundong').find(".gonggaoList").parent().wrapAll("<ul></ul>");		
					$('#GonggaoGundong').imgscroll({
						speed: 1800,    //图片滚动速度
						amount: 1000,    //图片滚动过渡时间
						width: 112,     //图片滚动步数
						dir: "up"   // "left" 或 "up" 向左或向上滚动
					});	
		
			}
		

			/*悬停效果*/
			$("#BlogMenu .icon_ewm").bind('mouseenter',function(){
					var self=$(this)
					clearTimeout(time_delay)	
					time_delay=setTimeout(function(){
						if(!self.is(":animated"))
						{
							self.addClass("hover_ewm");
							
						}
						
					},100)
				
			}).bind('mouseleave',function(){
				   clearTimeout(time_delay)	
							var self=$(this)
							if (self.is(".hover_ewm"))
							{		
									
									
									self.removeClass("hover_ewm");
							}
			})
			
				
	$("#InterestBanner").on("click",".nav_text li",function(){
		var index=$(this).index()
		$(this).addClass("change").siblings().removeClass("change");
		$(this).parent().siblings(".switcher").find("a:eq("+index+")").trigger("mouseenter");
	})
	
	
	
	$(".PhotoList li").hover_animate(
				{
				  aniobj:
				  [
					  [
						  "self",					//应用对象
						  "position:relative;",//初始CSS
						  "top:-5px;",		//mouseenter动画CSS
						  "top:0px;",			//mouseleave动画css
						  "300",					//mouseenter 时间
						  "300"						//mouseleave 时间
					  ],
					  [
						  ".text",					//应用对象
						  "",//初始CSS
						  "bottom:0;",		//mouseenter动画CSS
						  "bottom:-95px;",			//mouseleave动画css
						  "300",					//mouseenter 时间
						  "300"						//mouseleave 时间
					  ]
					  
					  
				  ],
				  set_class:"hover"
				}
				
			)
	
	
	
	$(".FocusColumn").hover_animate(
				{
				  aniobj:
				  [
					  [
						  "self",					//应用对象
						  "position:relative;",//初始CSS
						  "margin-top:-10px;",		//mouseenter动画CSS
						  "margin-top:0px;",			//mouseleave动画css
						  "300",					//mouseenter 时间
						  "300"						//mouseleave 时间
					  ],
					  [
						  ".icon_fdj",					//应用对象
						  "",//初始CSS
						  "top:50%;",		//mouseenter动画CSS
						  "top:-50%;",			//mouseleave动画css
						  "300",					//mouseenter 时间
						  "300"						//mouseleave 时间
					  ],
					  [
						  ".photo img",					//应用对象
						  "",//初始CSS
						  "opacity:0.6;",		//mouseenter动画CSS
						  "opacity:1;",			//mouseleave动画css
						  "300",					//mouseenter 时间
						  "300"						//mouseleave 时间
					  ]
					  
					  
				  ],
				  set_class:"hover_FocusColumn"
				}
				
			)
	
	
	$(".PictureList li").hover_animate(
				{
				  aniobj:
				  [
					  [
						  "self",					//应用对象
						  "position:relative;",//初始CSS
						  "margin-top:-10px;",		//mouseenter动画CSS
						  "margin-top:0px;",			//mouseleave动画css
						  "300",					//mouseenter 时间
						  "300"						//mouseleave 时间
					  ],
					  [
						  ".icon_fdj",					//应用对象
						  "",//初始CSS
						  "top:50%;",		//mouseenter动画CSS
						  "top:-50%;",			//mouseleave动画css
						  "300",					//mouseenter 时间
						  "300"						//mouseleave 时间
					  ],
					  [
						  ".photo img",					//应用对象
						  "",//初始CSS
						  "opacity:0.6;",		//mouseenter动画CSS
						  "opacity:1;",			//mouseleave动画css
						  "300",					//mouseenter 时间
						  "300"						//mouseleave 时间
					  ]
					  
					  
				  ]
				}
				
			)
	
	
	$("#quicklink dl").hover_animate(
				{
				  aniobj:
				  [
					  [
						  "self",					//应用对象
						  "position:relative;",//初始CSS
						  "margin-top:-10px;",		//mouseenter动画CSS
						  "margin-top:0px;",			//mouseleave动画css
						  "300",					//mouseenter 时间
						  "300"						//mouseleave 时间
					  ]
				  ],
				  set_class:"hover_dl"
				}
				
			)
	
	
	$(".PicList li").hover_animate(
				{
				  aniobj:
				  [
					  [
						  "self",					//应用对象
						  "position:relative;",//初始CSS
						  "top:-5px;",		//mouseenter动画CSS
						  "top:0px;",			//mouseleave动画css
						  "300",					//mouseenter 时间
						  "300"						//mouseleave 时间
					  ],
					  [
						  "em",					//应用对象
						  "",//初始CSS
						  "bottom:0px;",		//mouseenter动画CSS
						  "bottom:-63px;",			//mouseleave动画css
						  "300",					//mouseenter 时间
						  "300"						//mouseleave 时间
					  ]
				  ]
				}
				
			)
	
	
	
	
}

$.fn.loadmore=function(config){
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
							obj.unbind("click").text("没有了")	
						}
						
					})
			
		}
		else
		{
			$(this).unbind("click").text("没有了")
			
		}
	return false;
	})
	
	if (self.find(config.pagename).find(".change").length==0)
	{
		
		self.find(config.pagename).find('a:first').addClass('change');
		self.find(config.morebtn).trigger("click");
		
		
	}
	
}
//滚动
		$.fn.jcarousellite_gundong=function(options ){
			var self=$(this);
			if (self.length==0) return false;
			var items=options.list,config;
			if (self.find(items).length<=options.visible) 
			{
				var width=self.find(options.list).parent().outerWidth()
				self.css({"margin":"0 auto","width":width})
			return false;	
			}
			else
			{
				var liobj=self.find(options.list)
				var width=liobj.outerWidth()
				var margin=parseInt(liobj.css("margin-left"))+parseInt(liobj.css("margin-right"));
				width+=margin
				self.css({"margin":"0 auto","width":width*options.visible})
			}
			self.css("overflow","visible");
			
			if (self.find(items).is("div"))
			{
				self.find(items).wrap("<li></li>");
				self.find(items).parent().wrapAll("<ul class='templist'></ul>");		
				items=".templist li"
			}
			self.find(items).parent().wrapAll('<div class="jCarouselLite"></div>').parent().wrapAll('<div class="gundong"></div>');
			
			
			if (options.btn!=0)
			{
				self.find(".gundong").append('<span class="clear"></span><a href="javascript:;"  class="move_right"><span></span></a><a href="javascript:;" class="move_left disabled" ><span></span></a>')
			}
			
			self.find(".gundong").each(function(index){
				
				config={
							btnPrev: $(this).find(".move_left:eq("+index+")"),
							btnNext: $(this).find(".move_right:eq("+index+")"),
							visible:1,
							auto: 2500 ,
							speed: 300
						}	
				if (options.btn==0)		
				{
					$.extend(config, {btnPrev:null,btnNext:null});							
				}
				$.extend(config, options);
				$(this).find(".jCarouselLite:eq("+index+")").jCarouselLite(config);	
			})
		}
//输入关键词
$.fn.key=function(a,color1,color2){
	$(this).each(function(index, element) {
		
			var self=$(this)
			if (self.length==0) return false;
			if (!self.is("input") && !self.is("textarea")) return false;
			var placeholder=self.attr("placeholder")
			var keys=''
			if (typeof(placeholder)!="undefined")
			{
				a=placeholder
			}
			keys=a
			if (self.is("[type='password']"))
			{
				$(this).removeAttr("placeholder").attr("data-placeholder",a)
				var css_h=self.outerHeight()
				var css_paddingleft=parseInt(self.css("padding-left"))
				$(this).wrap("<div data-pwdiv='1' style='clear:both;position:relative;'></div>")
				self.before("<i data-pwi='1' style='color:"+color2+";height:"+css_h+"+px;padding-left:"+css_paddingleft+"px;line-height:"+css_h+"px;position:absolute;left:0;top:0;'>"+placeholder+"</i>")
				self.prev().bind("click",function(){
					$(this).next().focus()	
					
				})
				self.bind("focus",function(){
					var prevobj=$(this).prev()
					if (prevobj.is("[data-pwi]"))
					{
						prevobj.hide();
					}
					
				}).bind("blur",function(){
					var prevobj=$(this).prev()
					if (prevobj.is("[data-pwi]") && self.val()=="")
					{
						prevobj.show();
					}
				})
			}
			else
			{
				self.css("color",color2).val(a)
				self.bind("focus",function(){
					if (self.val()==keys){self.val("");self.css("color",color1)}
				}).bind("blur",function(){
					if (self.val()==""){self.val(keys);self.css("color",color2)}
				})
			}
			
			
			
	});
}
//侧栏导航效果
$.fn.sidebar_menu=function(){
	var self=$(this)
	if (self.length==0) return false;
	self.find("ol").prev().addClass("btn_submenu");
	self.find("ol").prev().append('<i class="arrow"></i>')
	self.find("a.change").next().show();
	self.find(".btn_submenu").on("click",function(){
			var obj=$(this)
			obj.toggleClass("change")
			obj.next("ol").toggle();
	return false;
	})
}
$.fn.hover_animate=function(obj){
	var time_delay=null,runlist=[],runlist_end	=[],create_var=[],set_var=[],self=$(this)
		if (self.length==0) return false;
		if (obj.aniobj.length==0) return false;
		if (obj.set_class=="" || typeof (obj.set_class)=="undefined") {$.extend(obj,{set_class:"hover"});	}
		if (typeof(obj.delaytime)!="number" || typeof(obj.delaytime)=="undefined"){$.extend(obj,{delaytime:100});	}
		var fn={
			csschange:function(val){
				if (val==""){return '';}
				if (val.indexOf("{")<0 || val.indexOf("}")<0 )
				{
					val=$.trim(val)
					var last_fh=val.lastIndexOf(';')
					if (last_fh+1==val.length)
					{
						val=val.substring(0,last_fh);
						val='{\''+val.replace(/\:/g,"':'").replace(/\;/g,"','")+'\'}';
					}
					else
					{   val='{\''+val.replace(/\:/g,"':'").replace(/\;/g,"','")+'\'}';	}
				}
				return $.trim(val);
			}	
		}
		$.each(obj.aniobj,function(index,val){
			if (val.length<6) return false;
			var setobj			=	val[0],
				setobj_			=	setobj.replace(/\.|\ |\>/g,""),
				animate_css		=	fn.csschange(val[1]),
				animate_start	=	fn.csschange(val[2]),
				animate_end		=	fn.csschange(val[3]),
				animate_easing	=	val[4],
				animate_easing2	=	val[5],
				run				=	'',
				run_end			=	''
				
				if (setobj=="") return false;
				create_var.push('var _'+setobj_+'')
				setobj=="self" ? set_var.push('_'+setobj_+'=[self]'): set_var.push('_'+setobj_+'=[self].find("'+setobj+'")')
				if (animate_css=="" && animate_start=="") return false;
				if (animate_css!="" && animate_start!="")
				{run='_'+setobj_+'.css('+animate_css+').stop(true,false).animate('+animate_start+','+animate_easing+')'}		
				else if (animate_css=="" && animate_start!="")
				{run='_'+setobj_+'.stop(true,false).animate('+animate_start+','+animate_easing+')'}
				else if (animate_css!="" && animate_start=="")
				{run='_'+setobj_+'.css('+animate_css+')'}
				
				runlist.push(run)
				if (animate_end!="")
				{	
					run_end='_'+setobj_+'.animate('+animate_end+','+animate_easing2+')'
					runlist_end.push(run_end)
				}
				
		})
		var selfobj=null;
		self.unbind(".s")
		$.each(create_var,function(index,val){eval(val);})
		self.bind("mouseenter.s",function(){
			selfobj=$(this)
			$.each(set_var,function(index,val){eval(val.replace("[self]","selfobj"));})
			clearTimeout(time_delay)	
			time_delay=setTimeout(function(){
					if(!selfobj.is(":animated"))
					{
						selfobj.addClass(obj.set_class);
						$.each(runlist,function(index,val){eval(val)})	;
					}
			},obj.delaytime)
		})
		.bind("mouseleave.s",function(){
			clearTimeout(time_delay)	
			if (selfobj.is("."+obj.set_class))
			{		
				$.each(runlist_end,function(index,val){eval(val);})	
				selfobj.removeClass(obj.set_class);
			}
		})
}


//图片居中
$.fn.imgcenter=function(){
	var self=$(this)
	if (self.length==0) return false;
	self.find("img").hide();
	var imgsrc=self.find("img").attr("src");
	$.fn.loadingpic(imgsrc,function(loading_oklist){
		var val	=	loading_oklist.split("|")
		var url	=	val[0]
		var w	=	val[1]
		var h	=	val[2]
		self.css({"height":h+"px","overflow":"hidden"});
		var bg_color=self.css("background-color")
		if (typeof(bg_color)=="undefined")
		{self.css({'background':'url('+imgsrc+') no-repeat center top','background-size':'cover'});}
		else
		{self.css({'background':bg_color+' url('+imgsrc+') no-repeat center top','background-size':'cover'});}
	})
}
$.fn.loadingpic=function(urllist,callback){
	if (urllist!="")
	{
			var img = new Image();
			img.onload = function(){
				var imgwidth=img.width
				var imgheight=img.height
			};	
			img.src = urllist;
			var check = function(){
				if(img.width>0 || img.height>0)
				{
					clearInterval(set);
					return  callback(urllist+'|'+img.width+'|'+img.height); 
					
				}
			};
			var set = setInterval(check,100);
	}
}

//浮动头部
		$.fn.floatheader=function(config){
			var self=$(this);
			if (self.length==0) return false;
				
			var default_config={
				spaces		:true,
				time		:500,
				delaytime	:100,
				class_change:".change",
				"top"		:	150
			}
			
			$.extend(default_config,config)
			
			var win_width		=	$(window).width(),
				 self_h			=	self.outerHeight(),
				 time_delay		=	null,
				 spaces_name	=	self.attr("id")+"_",
				 time			=	default_config.time,
				 delaytime		=	default_config.delaytime
				if ($("#"+spaces_name).length==0 && default_config.spaces==true){self.before("<span id='"+spaces_name+"' style='display:none;width:100%;height:"+self_h+"px'></span>");}
			$(window).unbind("scroll")
			$(window).bind("scroll",function(){
				clearTimeout(time_delay)
				time_delay = setTimeout(function(){
							var scrolltop=$(document).scrollTop();	
							if (scrolltop>default_config.top)
							{
								if (self.css("position")!="fixed")
								{
									if (default_config.spaces==true)
									{$("#"+spaces_name).css({"display":"block"})}
									
									
									if (typeof (default_config.class_change)!="undefined")
									{
										self.addClass(default_config.class_change)	
									}
									self.css({"z-index":50000,"position":"fixed","left":"0","top":"0","width":"100%","top":-(self_h+10)}).stop(true,false).animate({"top":"0"},time)
								}
							}
							else
							{
								if (self.css("position")=="fixed")
								{
									self.stop(true,false)
									.animate({"top":-(self_h+10)},0,function(){
										
										$("#"+spaces_name).css({"display":"none"});
										$(this).css({"position":"relative","top":0});
										if (typeof (default_config.class_change)!="undefined")
										{
											self.removeClass(default_config.class_change)	
										}
									}
									)
								}
							}
					
				}, delaytime);
			})
		}
//下拉菜单
	$.fn.dropdown_menu=function(){
		var self=$(this);
		if (self.length==0) return false;
		var select_classname='hover',
			submenu_name="ol",
			olobj=self.find(submenu_name);
		
		self.bind("mouseleave",function(){
			olobj.hide();
			self.find("li."+select_classname).removeClass(select_classname)
		})
		
		self.find("ul>li").hover(function(){
			var obj=$(this),submenuobj=obj.find(submenu_name);
			if (submenuobj.length>0) 
			{
				obj.addClass(select_classname);
				submenuobj.delay(220).slideDown(80);
			}
		},function(){
			var obj=$(this),submenuobj=obj.find(submenu_name+":visible");
			if (submenuobj.length>0) 
			{
				obj.removeClass(select_classname);
				submenuobj.slideUp(50);
			}
		})
	}


//选项卡滑动
	$.fn.Tab_=function(){
		var obj=$(this),times=300,delaytime=null
		if (obj.length==0) return false;
		obj.each(function(index, element) {
			var tab_obj=$(this)
			var li=tab_obj.find("li.change");
			if (li.length>0)
			{
				tab_obj.find("li:last-child").after("<span class='lines'></span>")
				obj.css("position","relative");
				var width	=	li.outerWidth();
				var lileft	=	li.position().left+parseInt(li.css("margin-left"))
				var lineobj	=	tab_obj.find(".lines")
				lineobj.css({"width":width,"left":lileft});
				
				tab_obj.find("li").bind("mouseenter",function(){
						clearTimeout(delaytime)
						var width	=	$(this).outerWidth();
						var left=$(this).position().left+parseInt($(this).css("margin-left"))
						lineobj.stop(true,false).animate({"width":width,"left":left},times)
				}).bind("mouseleave",function(){
					var self=$(this)
					delaytime=setTimeout(function(){
						if (!self.is(".change"))
						{
						var changeobj=self.siblings(".change")
						var left=changeobj.css("position","static").position().left+parseInt(changeobj.css("margin-left"));
						var width=changeobj.outerWidth()
						 lineobj.stop(true,false).animate({"width":width,"left":left},times)
						}
						
						
					},200)
				})
			}
		});	
	}
//选项卡切换
		$.fn.Tab=function(config){
			var self=$(this);
			var select_=0;
			var classname=config.labselect.replace(".","")
			if (self.length==0) return false;
			if (self.find(config.lilab).length==0) return false;
			
			
			self.each(function(index, element) {
							
				self=$(this);
						
						if (self.find(config.labselect).length==0) 
						{self.find(config.lilab+":eq(0)").addClass(classname);}
						self.find(config.lilab).each(function(index, element) {
							if (!$(this).is(config.labselect))
							{
								self.siblings(config.Tabname+":eq("+index+")").hide();
							}
						});
						
						self.find(config.lilab).bind(config.labaction+".action",function(){
							
							var index=$(this).index();
							if(self.siblings(config.Tabname+":visible").is(":animated")){ 
							return false;
							
							}

							
							if ($(this).is(config.labselect)) return false;
							var index2=$(this).siblings(config.labselect).index()
							$(this).addClass(classname).siblings().removeClass(classname);
							
							config.animate(index,index2,config.animatename)
							return config.labaction=="click"?   false :  true;
						})
						
						config.animate=function(index,index2,active){
							
							switch (active)
							{
								case "fade":
									self.siblings(config.Tabname+":visible").hide();
									self.siblings(config.Tabname+":eq("+index+")").fadeIn(config.animateTime);
								break;
								case "scroll_x":
									self.parent().css({"position":"relative","overflow":"hidden"});
									var selfs=self.siblings(config.Tabname+":visible")
									var dr="100%",dr2="100%"
									if (index2>index)
									{
										dr="100%";
										dr2="-100%"
									}
									else
									{
										dr="-100%";
										dr2="100%"
									}
									var top=selfs.position().top
									
									
									if (config.mode=="delay")		
									{
									//当前渐隐
									selfs
									.css({"position":"relative","width":"100%"})
									.stop(true,false)
									.animate({"left":dr,"opacity":0},config.animateTime,
												function(){
													 $(this).css({"position":"static","left":"auto","opacity":1,"display":"none"}
												)}
											)
									setTimeout(function(){
												self.siblings(config.Tabname+":eq("+index+")").css({"position":"relative","left":dr2,"display":"block","opacity":0})
												.stop(true,false)
												.animate({"left":0,"opacity":1},config.animateTime
												,function(){
														$(this).css({"top":0,"position":"static"})	
														
												})
									},config.animateTime)		
								
									}
									
									else
									{
										
											selfs
											.css({"position":"absolute","width":"100%","left":selfs.position().left,"top":selfs.position().top})
											.stop(true,false)
											.animate({"left":dr,"opacity":0},config.animateTime,
												function(){
													 $(this).css({"position":"relative","top":"auto","left":"auto","opacity":1,"display":"none"}
												)}
											)
									
									
												self.siblings(config.Tabname+":eq("+index+")").css({"position":"relative","left":dr2,"display":"block","opacity":0})
												.stop(true,false)
												.animate({"left":0,"opacity":1},config.animateTime
												,function(){
														$(this).css({"top":0,"position":"relative"})	
														
												})
									}
								break;
								
								
								case "none":
									self.siblings(config.Tabname+":visible").hide();
									self.siblings(config.Tabname+":eq("+index+")").show();
								break;	
								
							}
							
							
						}


            });

		}
		
$.fn.css3_allnth=function(css){
		if (BrowseVer=="ie7" || BrowseVer=="ie6" || BrowseVer=="ie8")
		{
				$.each(css,function(index,val){
					if (val.indexOf("{")==0) return false;
						var temp_css		=	val.split("{"),
						 	css_select		=	temp_css[0],
						 	css_val			=	temp_css[1].replace("}",""),
							contents		=	css_val.indexOf("content"),
							types			=	""
						if (css_select.indexOf(":before")>0)
						{
							css_select=css_select.replace("::before","").replace(":before","")
							if (contents>=0){types="before";}else{types="first";}
						}
						else if (css_select.indexOf(":after")>0)
						{
							css_select=css_select.replace("::after","").replace(":after","")
							if (contents>=0){types="after";}else{types="last";}
						}
						else
						{types="css"}
						$.fn.css3_before_after(css_select,$.fn.format_css(css_val),types)
				})
		}
}
$.fn.format_css=function(css){
	var temp	=	css.split(";"),temps	=	'',new_css	=	""
	$.each(temp,function(index,val){
		if (val)
		{
			if (val.indexOf('""')>0)
			{temps='"'+val.replace(':','":')+',';
			 temps=temps.replace('""','\'\'');}
			else
			{temps='"'+val.replace(':','":"')+'",';}
			if (temp.length-1==index+1){temps=temps.replace(",","");}
			new_css+=temps
		}
	})
	return new_css
}
$.fn.css3_before_after=function(obj,objlist,types){
	obj=$(obj)
	if (obj.length==0) return false;
	switch (types)
	{
		case "before"	:
			obj.each(function(index, element) {
				var divname="div"+$.fn.ran(5)
				$(this).prepend("<div id='"+divname+"'></div>")
				var objs=$("#"+divname)
				eval('objs.css({'+objlist+'})')
		   });
		break;
		case "after"	:
			obj.each(function(index, element) {
				var divname="div"+$.fn.ran(5)
				$(this).append("<div id='"+divname+"' style='font-size:0;padding:0;line-height:0;'></div>")
				var objs=$("#"+divname)
				eval('objs.css({'+objlist+'})')
		   });
		break;
		case "last"	:
			obj.each(function(index, element) {
				var objs=$(this).find(":last-child")
				eval('objs.css({'+objlist+'})')
		   });
		break;
		case "first"	:
			obj.each(function(index, element) {
				var objs=$(this).find(":first")
				eval('objs.css({'+objlist+'})')
		   });
		break;
		case "css"	:
			obj.each(function(index, element) {
				var objs=$(this)
				eval('objs.css({'+objlist+'})')
		   });
		break;
	}
}

$.fn.ran=function(m){
	m = m > 13 ? 13 : m;
	var num = new Date().getTime();
	return num.toString().substring(13 - m);
}		
		
		
		//返回浏览器类型 
$.fn.Browser_ver=function(){
		var navmsg=navigator.userAgent
		var ver='1';
		if(navmsg.indexOf("MSIE")>0){   
			  ver="";
			  if(navmsg.indexOf("MSIE 6.0")>0){ver='ie6'}   
			  if(navmsg.indexOf("MSIE 7.0")>0){ver='ie7'}   
			  if(navmsg.indexOf("MSIE 8.0")>0 && !window.innerWidth){ver='ie8'}   
			  if(navmsg.indexOf("MSIE 9.0")>0){ver='ie9'}   
			  if(navmsg.indexOf("MSIE 10.0")>0){ver='ie10' }   
			  if(navmsg.indexOf("MSIE 11.0")>0){ver='ie11'}   
		} 
		else if(ver=="1" && navmsg.indexOf("Safari")>0){ 
			ver="Saifari"
		}
		else if(ver=="1" && navmsg.indexOf("Firefox")>0){ 
			ver="Firefox"
		}
		else if(ver=="1" && navmsg.indexOf("Opera")>0){ 
			ver="Opera"
		}
		return ver	
}
var BrowseVer=$.fn.Browser_ver()
		
jQuery.easing['jswing']=jQuery.easing['swing'];jQuery.extend(jQuery.easing,{def:'easeOutQuad',swing:function(x,t,b,c,d){return jQuery.easing[jQuery.easing.def](x,t,b,c,d);},easeInQuad:function(x,t,b,c,d){return c*(t/=d)*t+b;},easeOutQuad:function(x,t,b,c,d){return-c*(t/=d)*(t-2)+b;},easeInOutQuad:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t+b;return-c/2*((--t)*(t-2)-1)+b;},easeInCubic:function(x,t,b,c,d){return c*(t/=d)*t*t+b;},easeOutCubic:function(x,t,b,c,d){return c*((t=t/d-1)*t*t+1)+b;},easeInOutCubic:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t+b;return c/2*((t-=2)*t*t+2)+b;},easeInQuart:function(x,t,b,c,d){return c*(t/=d)*t*t*t+b;},easeOutQuart:function(x,t,b,c,d){return-c*((t=t/d-1)*t*t*t-1)+b;},easeInOutQuart:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t*t+b;return-c/2*((t-=2)*t*t*t-2)+b;},easeInQuint:function(x,t,b,c,d){return c*(t/=d)*t*t*t*t+b;},easeOutQuint:function(x,t,b,c,d){return c*((t=t/d-1)*t*t*t*t+1)+b;},easeInOutQuint:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t*t*t+b;return c/2*((t-=2)*t*t*t*t+2)+b;},easeInSine:function(x,t,b,c,d){return-c*Math.cos(t/d*(Math.PI/2))+c+b;},easeOutSine:function(x,t,b,c,d){return c*Math.sin(t/d*(Math.PI/2))+b;},easeInOutSine:function(x,t,b,c,d){return-c/2*(Math.cos(Math.PI*t/d)-1)+b;},easeInExpo:function(x,t,b,c,d){return(t==0)?b:c*Math.pow(2,10*(t/d-1))+b;},easeOutExpo:function(x,t,b,c,d){return(t==d)?b+c:c*(-Math.pow(2,-10*t/d)+1)+b;},easeInOutExpo:function(x,t,b,c,d){if(t==0)return b;if(t==d)return b+c;if((t/=d/2)<1)return c/2*Math.pow(2,10*(t-1))+b;return c/2*(-Math.pow(2,-10*--t)+2)+b;},easeInCirc:function(x,t,b,c,d){return-c*(Math.sqrt(1-(t/=d)*t)-1)+b;},easeOutCirc:function(x,t,b,c,d){return c*Math.sqrt(1-(t=t/d-1)*t)+b;},easeInOutCirc:function(x,t,b,c,d){if((t/=d/2)<1)return-c/2*(Math.sqrt(1-t*t)-1)+b;return c/2*(Math.sqrt(1-(t-=2)*t)+1)+b;},easeInElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4;}
else var s=p/(2*Math.PI)*Math.asin(c/a);return-(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+b;},easeOutElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d)==1)return b+c;if(!p)p=d*.3;if(a<Math.abs(c)){a=c;var s=p/4;}
else var s=p/(2*Math.PI)*Math.asin(c/a);return a*Math.pow(2,-10*t)*Math.sin((t*d-s)*(2*Math.PI)/p)+c+b;},easeInOutElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if(t==0)return b;if((t/=d/2)==2)return b+c;if(!p)p=d*(.3*1.5);if(a<Math.abs(c)){a=c;var s=p/4;}
else var s=p/(2*Math.PI)*Math.asin(c/a);if(t<1)return-.5*(a*Math.pow(2,10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p))+b;return a*Math.pow(2,-10*(t-=1))*Math.sin((t*d-s)*(2*Math.PI)/p)*.5+c+b;},easeInBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;return c*(t/=d)*t*((s+1)*t-s)+b;},easeOutBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;return c*((t=t/d-1)*t*((s+1)*t+s)+1)+b;},easeInOutBack:function(x,t,b,c,d,s){if(s==undefined)s=1.70158;if((t/=d/2)<1)return c/2*(t*t*(((s*=(1.525))+1)*t-s))+b;return c/2*((t-=2)*t*(((s*=(1.525))+1)*t+s)+2)+b;},easeInBounce:function(x,t,b,c,d){return c-jQuery.easing.easeOutBounce(x,d-t,0,c,d)+b;},easeOutBounce:function(x,t,b,c,d){if((t/=d)<(1/2.75)){return c*(7.5625*t*t)+b;}else if(t<(2/2.75)){return c*(7.5625*(t-=(1.5/2.75))*t+.75)+b;}else if(t<(2.5/2.75)){return c*(7.5625*(t-=(2.25/2.75))*t+.9375)+b;}else{return c*(7.5625*(t-=(2.625/2.75))*t+.984375)+b;}},easeInOutBounce:function(x,t,b,c,d){if(t<d/2)return jQuery.easing.easeInBounce(x,t*2,0,c,d)*.5+b;return jQuery.easing.easeOutBounce(x,t*2-d,0,c,d)*.5+c*.5+b;}});
