$(document).ready(function(){
	$("#header2.floatheader").floatheader(120)
	$("#menu li").hover(function(){
		if (!$(this).is(".hover"))
		{
			$(this).find("span").stop(true,false).animate({"top":0},{ duration:1200,easing:'easeOutQuint' })
		}
	},function(){
		if (!$(this).is(".hover"))
		{
		$(this).find("span").stop(true,false).animate({"top":"-125px"},300)
		}
	})
	
	
	if ($("#gonggao_scroll").length>0)
	{
	
			
			$("#gonggao_scroll .gundong").each(function(index){
			
						$("#gonggao_scroll .jCarouselLite:eq("+index+")").jCarouselLite({
							btnPrev: "#gonggao_scroll .move_lefts:eq("+index+")",
							btnNext: "#gonggao_scroll .move_rights:eq("+index+")",
							visible:1,
							vertical:true,
							auto: 2500 ,
							speed: 300
						});	
				
			})
				
		
	}

	
	$("#quicklink ul li a").hover(function(){
		$(this).find("span").addClass("hover");
	},function(){
		$(this).find("span").removeClass("hover");
	})

	$("#keys").key("请输入您要搜索的关键词","#fff","#fff")
	$("#key2").key("请输入您要搜索的关键词","#fff","#fff")
	if ($("#Faq").length>0)
	{
			$("#name_").key("称呼","#333","#999")
			$("#mail_").key("邮箱","#333","#999")
			$("#tel_").key("手机","#333","#999")
			$("#yzm_").key("验证码","#333","#999")
			$("#problem_").key("问题：","#333","#999")
		
	}


	/*广告*/
	if ($("#banner").length>0)
	{
		$("#banner").Xslider_full({
				speed: 1200, 
				space: 6000,
				auto: true, //自动滚动
				affect:'fade',
				ctag: 'div'
		})
	}

	if ($("#playBanner").length>0)
	{
			$("#playBanner").Xslider_arrow().Xslider({
				speed: 1200, 
				space: 3000,
				auto: true, //自动滚动
				affect:'scrollx',
				ctag: 'div'
			});
	}
	/*新闻速递 公告 新闻选项卡切换*/
	$('#News .NewsTab').Tab("li",".change",".NewsTab_nr","click")			
	if ($("#History").length>0)		
	{
		$("#History ol li").hover(function(){
			
			$(this).addClass("hover");
		
			
			$(this).find(".txt").stop(true,false).fadeIn(200)
			
			},function(){
				
				$(this).removeClass("hover");
				
				$(this).find(".txt").stop(true,false).fadeOut(100)
				})
			
		
	}
			
			
		if ($("#Teacher .scrollleft").length>0)
		{
			
				$(".scrollleft").imgscroll({
					speed: 2800,    //图片滚动速度
					amount: 800,    //图片滚动过渡时间
					width: 279,     //图片滚动步数
					dir: "left"   // "left" 或 "up" 向左或向上滚动
				});	
					
				
				
				
				
	
		}		
			
		
		$('#SchoolPhotoTab li').each(function(index){
			if (!$(this).is(".change"))
			{$("#SchoolPhotoTab").parent().find(".Tab_nr:eq("+index+")").hide();}
		 
		  $(this).click(function()
			{ 
			
			  $('#SchoolPhotoTab li').removeClass('change');
			  $(this).addClass('change');
			  $("#SchoolPhotoTab").parent().find(".Tab_nr").hide();
			  $("#SchoolPhotoTab").parent().find(".Tab_nr:eq("+index+")").show();
			  return false;
			}
		  )								   
		  })		

		
		//团队悬停效果
		/*移到图片上的效果*/
		$(".PhotoList li").hover(
		function(){
			var objs=$(this).find(".txt");
			objs.stop(true,false).animate({"bottom":0},{ duration:1000,easing:'easeOutElastic' });
		},
		function(){
			
			var objs=$(this).find(".txt");
			objs.stop(true,false).animate({"bottom":"-174px"},{ duration:1000,easing:'easeOutQuint' });
			
		}
		)
			
		if ($("#pictureBrowse").length>0)
		{
			$("#pictureBrowse img").loadingpic({},function(obj,val){obj.loadingok(val)})
		}
	
		
		if ($("#Column").length>0)
		{
		
				$('#Column').find(".column_show").wrap("<li></li>");
				 $('#Column').find(".column_show").parent().wrapAll("<ul></ul>");
		
		
		
				
				$("#Column .gundong").each(function(index){
				
							$("#Column .jCarouselLite:eq("+index+")").jCarouselLite({
								btnPrev: "#Column .move_left:eq("+index+")",
								btnNext: "#Column .move_right:eq("+index+")",
								visible:4,
								auto: 2500 ,
								speed: 500
							});	
					
				})
					
			
		}		


		
		
		
		$('#Faq .ad img').imgcenter()		
		
		
		
		
		//学校照片悬停效果
		$(".PictureList li").hover(
		function(){
			var objs=$(this).find(".btn_browse");
			objs.stop(true,false).animate({"top":0},{ duration:700,easing:'easeOutQuint' });
		},
		function(){
			
			var objs=$(this).find(".btn_browse");
			objs.stop(true,false).animate({"top":"-250px"},{ duration:700,easing:'easeOutQuint' });
			
		}
		)
		
		
		$(".column_show").each(function(index, element) {
            $(this).find("p:gt(5)").hide()
        });
		//栏目悬停效果
		
		$(".column_show").hover(
		function(){
			var objs=$(this).find(".pic");
			var more=$(this).find(".btn_browsemore");
			
			$(this).find("p").show()
			
			$(this).addClass("hover_column");
			objs.stop(true,false).animate({"margin-top":"-129px"},{ duration:1000,easing:'easeOutQuint' });
			more.stop(true,false).animate({"bottom":"20px"},{ duration:1000,easing:'easeOutQuint' });
		},
		function(){
			
			var objs=$(this).find(".pic");
			var more=$(this).find(".btn_browsemore");
			$(this).removeClass("hover_column");
			$(this).find("p:gt(5)").hide()
			objs.stop(true,false).animate({"margin-top":"0px"},{ duration:1000,easing:'easeOutQuint' });
			more.stop(true,false).animate({"bottom":"-60px"},{ duration:1000,easing:'easeOutQuint' });
		}
		)
		
		
		//老师列表.html  
		//图片悬停效果
		$(".TeacherList li").hover(
				function(){
					var objs=$(this).find(".txt");
					objs.stop(true,false).animate({"bottom":0},{ duration:1200,easing:'easeOutElastic' });
				},
				function(){
					var objs=$(this).find(".txt");
					objs.stop(true,false).animate({"bottom":"-150px"},{ duration:700,easing:'easeOutQuint' });
				}
		)
		
		
		//图文列表.html
		//新闻悬停效果 
		
		$(".news").hover(
				function(){
					
					$(this).addClass("hover_news")
				},
				function(){
					$(this).removeClass("hover_news")
				}
		)
		
		//查看留言.html
		//留言悬停效果 
		
		$(".faqs").hover(
				function(){
					$(this).addClass("hover_faqs")
				},
				function(){
					$(this).removeClass("hover_faqs")
				}
		)
		//创建－评估内容导航.html
		$(".SortList").each(function(index, element) {
            $(this).find("li:last").addClass("no_bor")
        });
		
		
		if ($("#NavList").length>0)
		{
				$(".SortList").each(function(index, element) {
					
					var h=$(this).outerHeight();
					var min_h=69
					
					$(this).find("h4 span").css("padding-top",(h-min_h)/2+"px")
					
				});
					
		}
		$(".SortList").hover(
				function(){
					$(this).addClass("hover_SortList")
				},
				function(){
					$(this).removeClass("hover_SortList")
				}
		)
		
		//图片列表.html
		
		$(".imgList li").hover(
				function(){
					$(this).addClass("hover")
				},
				function(){
					$(this).removeClass("hover")
				}
		)
		
		
		//列表悬停效果
		
		
		$(".list li").hover(function(){
					$(this).addClass("hover")
		},function(){
					$(this).removeClass("hover")
			
		})
		
		
		//我要留言.html
		
		if ($("#LeaveMessage").length>0)
		{
			
			$("#m_name_").key("称呼：","#333","#999")
			$("#m_mail_").key("邮箱：","#333","#999")
			$("#m_tel_").key("手机：","#333","#999")
			$("#m_qq_").key("QQ：","#333","#999")
			$("#m_yzm_").key("验证码：","#333","#999")
			$("#m_problem_").key("留言/问题：","#333","#999")
			
		}
		
		
		
		$("#banner2 img").imgcenter()
		
		
		if ($("#float_menu").length>0)
		{
			
			
			$("#float_menu .btn_more").click(function(){
				
				AutoScroll($(this).siblings(".float_menu"))
				return false;
			})
			
			
		}
		
		$(".NavList").navlist()
		$(".news").browse_type()
		
		
		
		//教育集团.html
		
		if ($("#maximage").length>0)
		{
			$('#maximage').maximage();
		}	
		
		
		
		//自动调整
		$.fn.autotiaozhen=function(){
			
			var window_h=$(window).height()
			var header_h=134
			var content_h=355
			var copyright_h=80
			var tiaozhen_h=window_h-header_h-content_h-copyright_h
			var padding=tiaozhen_h/4
			$("#GroupHeader,#CroupCopyright").css({"padding-top":padding,"padding-bottom":padding})
		}
		
		if ($("#main_content").length>0)
		{
					
				$(window).bind("resize",function(){
					$("#main_content").autotiaozhen()
				})
				
				
				$("#main_content").autotiaozhen()
				$('#GroupNewsTab').Tab("li",".change",".Tab_nr","mouseenter")			
		}
			
		//博客首页.html
		if ($("#blog_hot").length>0)
		{
					$("#FocusBlog_group").RecommendGroup({"gundong_idname":"#FocusBlog_group",	speed: 600, space: 4000,auto: true, affect:'fade',ctag: '.groups'})
					$("#Search3 .select").select_(6)
					
					if ($("#NewsPlay").length>0)
					{
							$("#NewsPlay").Xslider({
								speed: 1200, 
								space: 3000,
								auto: true, //自动滚动
								affect:'fade',
								ctag: 'div'
							});
					}		
					
					
					if ($(".scrollleft").length>0)
					{
						
							
							
							$(".scrollleft").imgscroll({
								speed: 40,    //图片滚动速度
								amount: 10,    //图片滚动过渡时间
								width:2,     //图片滚动步数
								dir: "left"   // "left" 或 "up" 向左或向上滚动
							});	
							
							
						
					}	
					
				//排行榜 最近更新选项卡
					
				$('#blogRankingTab').Tab("li",".change",".Tab_nr","mouseenter")		
				//console.log(11);
				
				 $("#DocFenlei").floatheaderold(0)
				
		}
		
		
		//个人博客首页.html
		if ($("#blog_header").length>0)
		{
		
		
		}
		
		
		//博客首页.html
		
		if ($("#blog_doc").length>0)
		{
				
			$("#DocFenlei ul").Tab_()
		}
		
	$(".MusicRecordList li").bind('mouseenter',function(){
					var self=$(this).find("a");
					time_delay=setTimeout(function(){
								if(!self.is(":animated"))
								{
									self.addClass("star_animate");
									self.stop(true,false).fadeIn(200);
								}
						
					},100)
				
			}).bind('mouseleave',function(){
				    clearTimeout(time_delay)	
							var self=$(this).find("a")
							if (self.is(".star_animate"))
							{		
									self.removeClass("star_animate");
									self.stop(true,false).fadeOut(200);
							}
			})		
		
		//音乐专缉－内页
		
		$(".Musiclist li").bind('mouseenter',function(){
				$(this).addClass("hovers").siblings().removeClass("hovers")
		})
		$(".Musiclist li").find(".music_icon1x1").bind("click",function(){
			if ($(this).is(".change"))
			{
				$(this).removeClass("change");
				
				$(this).parents("li").find(".music_icon2").css("visibility","hidden");
				
			}
			else
			{
				
				$(this).parents("li").siblings().find(".change").removeClass("change");
				$(this).parents("li").siblings().find(".music_icon2").css("visibility","hidden");
				$(this).addClass("change");
				$(this).parents("li").find(".music_icon2").css("visibility","visible");
			}
			
			return false;
		})
		$("#float_bar").float_bar()
})
//每周星博文
					$.fn.RecommendGroup=function(config){
						var self=$(this);
						if (self.length==0)	 return false;
									var class_name=self.attr("class"),
									group_sl=self.attr("data-group-sl"),
									group_name=self.attr("data-group-name"),
									lengths=self.find(group_name).length,
									htmls="",temphtml="",k=0,tempclass,tempobjs,
									 parents="<div class='conbox'>{nr}</div>",
									 grouphtml="<div class='groups'>{grouplist}</div>"
									// ul="<ul class='"+class_name+"'>{list_nr}</ul><span class='clear'></span>";
									if (typeof(group_sl)=="undefined")
									{
										alert("请在."+class_name+"配置data-group-sl属性")
										return false;
									}
									if (lengths<=group_sl) return false;
									
									var groups=parseInt(lengths/group_sl);
									var ys=lengths%group_sl;
									ys>0 ? groups=groups+1 : 0
									
									
									for (var i=0;i<groups;i++)
									{
										for (var j=0;j<group_sl;j++)
										{
											tempobjs=self.find(group_name+":eq("+k+")");
											if (tempobjs.length>0)
											{
												temphtml=temphtml+tempobjs.prop("outerHTML");
											}
											k=k+1;
										}
										
										htmls=htmls+grouphtml.replace("{grouplist}",temphtml);
										temphtml="";
									}
									
									
									parents=parents.replace("{nr}",htmls)
									
									self.html(parents);
									$(config.gundong_idname).Xslider(config);
					}		


//选项卡滑动
	$.fn.Tab_=function(){
		var obj=$(this)
		if (obj.length==0) return false;
		var times=300
		obj.each(function(index, element) {
			var tab_obj=$(this)
			var li=tab_obj.find("li.change");
			
			tab_obj.find("li:last-child").after("<span class='lines'></span>")
			if (li.length>0)
			{
				obj.css("position","relative");
				var width=li.outerWidth();
				var lineobj=tab_obj.find(".lines")
				lineobj.css("width",width);
				
				tab_obj.find("li").bind("mouseenter",function(){
						var left=$(this).position().left
						lineobj.stop(true,false).animate({"left":left},times)
				}).bind("mouseleave",function(){
						if (!$(this).is(".change"))
						{
						var left=$(this).siblings(".change").css("position","static").position().left;
						 lineobj.stop(true,false).animate({"left":left},times)
						}
						
				})
			}
		});
		
		var tab_nr=$("#blog_doc")
		
		if (obj.find("li.change").length==0) 
		{
			obj.find("li:eq(0)").addClass("change");
		}
		tab_nr.find(".docTypeBox").hide();
		//tab_nr.find(".docTypeBox:eq("+obj.find("li").index()+")").show();
		tab_nr.find(".docTypeBox:eq(0)").show();
		obj.find("li").bind("click",function(){
			
			$(this).addClass("change").siblings().removeClass('change');
			var index=$(this).index();
			tab_nr.find(".docTypeBox").hide();
			tab_nr.find(".docTypeBox:eq("+index+")").show();
			return false;
		})
			
	}




var resizeTimer = null;

//浮动头部
$.fn.floatheaderold=function(starvalue){
	
	var self=$(this);
	if (self.length==0) return false;
	if (typeof(starvalue) == "undefined" || starvalue == 0){
		console.log(starvalue);
		starvalue=self.position().top
	}
	
	
	var win_width=$(window).width();
	
	var self_h=self.outerHeight();//取得高度
	var spaces_name=self.attr("id")+"_"
	
	if ($("#"+spaces_name).length==0)
	{
		self.before("<span id='"+spaces_name+"' style='display:none'></span>")	
	}
	
	$(window).bind("scroll",function(){
		if (resizeTimer) {clearTimeout(resizeTimer)}
		resizeTimer = setTimeout(function(){
			
					var scrolltop=$(document).scrollTop();	
					if (scrolltop>starvalue)
					{
						if (self.css("position")!="fixed")
						{
							
							$("#"+spaces_name).css({"display":"block","height":self_h})
							self.find(".logo2").show(0)
							self.css({"z-index":50000,"position":"fixed","left":"0","top":"0","width":"100%","top":-(self_h+10)}).stop(true,false).animate({"top":"0"},600)
						}
					}
					else
					{
						if (self.css("position")=="fixed")
						{
							self.find(".logo2").hide(0)
							self.stop(true,false).animate({"top":-(self_h+10)},0,function(){$("#"+spaces_name).css({"display":"none"});$(this).css({"position":"relative","top":0})})
						}
					}
			
		}, 70);
		
		})
				
	
}

	
		
//下拉列表的转换
	$.fn.select_=function(show_sl){
		if ($(this).length==0) return false;
		
		var select_option=$(this).find("option");
		var select_names=$(this).attr("name");
		var select_classnmae=$(this).attr("class");
		var htmls='',selecthtmls='',temps=''
		var select_option_url=''
		select_option.each(function(index, element) {
			
            temps=$(this)
			select_option_url=$.trim($(this).attr("data-url"))
			
			if (temps.is(":selected"))
			{
				selecthtmls=selecthtmls+'<strong>'+temps.text()+'</strong><span class="arrow"></span><input name="'+select_names+'" type="hidden" value="'+temps.attr("value")+'" />'
				
			}
			else
			{
				
				if (typeof(select_option_url)=="undefined")
				{
					htmls=htmls+'<a href="javascript:;" data-value="'+temps.attr("value")+'">'+temps.text()+'</a>'
				}
				else
				{
					
					if (select_option_url!="")
					{htmls=htmls+'<a href="'+select_option_url+'" data-value="'+temps.attr("value")+'">'+temps.text()+'</a>'}
					else
					{htmls=htmls+'<a href="#" data-value="'+temps.attr("value")+'">'+temps.text()+'</a>'}
					
				}
				
				
			}
        });
	
		htmls='<div class="'+select_classnmae+'"><div class="'+select_classnmae+'_dt">'+selecthtmls+'</div><div class="'+select_classnmae+'_dd"  maxsl="'+show_sl+'">'+htmls+'</div></div>'	
		
		$(this).replaceWith(htmls)
		
		
		$("div."+select_classnmae+"").find(">div:eq(0)").bind("click",function(){
			
			
			 var dd=$(this).next();
			 if (dd.is(":visible")) return  false;
			 var option_height= dd.find("a:eq(0)").outerHeight()+1;
			 var option_sl=parseInt(dd.attr("maxsl"));
			 var dd_height= dd.outerHeight();
			 if (option_sl)
			 {
				 var max_height=option_sl*option_height;
				 if (dd_height>max_height)
				 {dd.css({"height":max_height});}
			 }
			 
			 $(this).parents("div."+select_classnmae+"").css("z-index",500)
			 $(this).addClass("change");	
			  dd.show();
			 
			 
			 
			 
		})
		
		$("div."+select_classnmae+"").bind("mouseleave",function(){
			
			$(this).find("."+select_classnmae+"_dd").hide();
			$(this).find("."+select_classnmae+"_dt").removeClass("change");
			$(this).css("z-index",0);
		})
		
		$("div."+select_classnmae+"").find(">div:eq(1)>a").bind("click",function(){
			var self=$(this);
			
				 var text=$.trim(self.text());
				 var thisvalue=$.trim(self.attr("data-value"));
				 var href=$.trim(self.attr("href"))
				 self.parent().hide()
				
				 if (href=="#")
				 {
					 var dt=self.parent().prev();
					 dt.find("input").val(thisvalue);			
					 dt.find("strong").text(text);
					
					 return false;
				 }
				 else
				 {
					 
				}
			
		})
		
	}

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
	})
}


//点击切换浏览类型
$.fn.browse_type=function(){
	var self=$(this)
	if (self.length==0) return false;
	var typeobj=$("#browseType")
	var browse_type_class=""
	var type=$.cookie('browse_type');
	if (!type && typeof(type)!="undefined" && type!=0)
	{
	
   		if (typeobj.length>0)
		{
			if (typeobj.find(".change").length==0)
			{
				typeobj.find("a:eq(0)").addClass("change");
				browse_type_class="news-showtype-1"
			}
			else
			{
				browse_type_class="news-showtype-"+(parseInt(typeobj.find(".change").index())+1)
			}
			$.cookie('browse_type',browse_type_class, { expires: 7, path: '/' }); 
			type=browse_type_class;
		}
	}
	else
	{
	   var readindex=parseInt(type.split("-")[2])-1;
	   typeobj.find("a:eq("+readindex+")").addClass("change").siblings().removeClass("change")
	   	setTimeout(function(){$.fn.auto_height("#sidebar","#neirong","#container")},100)
	}
	self.removeClass("news-showtype-1").removeClass("news-showtype-2").removeClass("news-showtype-3").addClass(type)
	//点击浏览
	$("#browseType a").bind("click",function(){
		
			var self2=$(this)
			var index=self2.index()+1
			if (self2.is(".change")) 
			{return false;}
			self2.addClass("change").siblings().removeClass("change")
			browse_type_class="news-showtype-"+index
			
			$.cookie('browse_type',browse_type_class); 
			self.removeClass("news-showtype-1").removeClass("news-showtype-2").removeClass("news-showtype-3").addClass(browse_type_class)
			setTimeout(function(){$.fn.auto_height("#sidebar","#neirong","#container")},300)			
			return false;
	})
}
//根据内容的多少平衡左右区域的内容高度
$.fn.auto_height=function(obj1,obj2,obj3){
	if ($(obj1).length==0) return false;
	if ($(obj2).length==0) return false;
	
	var h1=$(obj1).outerHeight()
	var h2=$(obj2).outerHeight()
	
	h1=h1+186+81
	
	if (h1>h2)
	{
		$(obj2).animate({"height":h1},100)
	}
	else
	{
		$(obj2).css("height","auto")
		if ($(obj2).outerHeight()>h1)
		{
			$(obj2).animate({"height":$(obj2).outerHeight()},100)
		}
		else
		{
			
			$(obj2).animate({"height":h1},0)
		}
	}
	
}

//浮动条
$.fn.float_bar=function(){
	var self=$(this)
	if (self.length==0) return false;
	var box=self.find(".box")
	var box2=self.find(".box2")
	self.bind("mouseenter",function(){
		if (self.is(".float_bar_close"))
		$(this).stop(true,false).animate({"margin-top":"-312px"},200)	
	})
	.bind("mouseleave",function(){
		if (self.is(".float_bar_close"))
		$(this).stop(true,false).animate({"margin-top":"-332px"},200)	
		
	})
	self.find(".backtop").bind("click",function(){
		var scrollTop=document.documentElement.scrollTop||document.body.scrollTop;
		if (scrollTop<10) return  false;
		self.stop(true,false).animate({"padding-top":"15%"},300,function(){})	
		$("html,body").animate({scrollTop:0},1000,function(){
			
			self.stop(true,false).animate({"padding-top":"20%"},300,function(){})	
		})
	return false;	
	})
	self.find(".close").bind("click",function(){
		if (self.is(".float_bar_close"))
		{
				self.removeClass("float_bar_close")
				$(this).find("span").fadeIn();
				self.stop(true,false).animate({"padding-top":"20%","margin-top":"0"},300,function(){})	
		}
		else
		{
				$(this).find("span").fadeOut();
				self.stop(true,false).animate({"padding-top":"0","margin-top":"-332px"},300,function(){self.addClass("float_bar_close")})	
		}
		
	})
	
}



$.fn.navlist=function(){
	var self=$(this)
	if (self.length==0) return false;
	
	self.find("ol").prev().addClass("btn_");
	self.find(".btn_").bind("click",function(){
	var ol=	$(this).next("ol")
		if (ol.is(":visible"))	
		{
			
			
			ol.slideUp(180,function(){$(this).parent().removeClass("change")});
			
			
		}
		else
		{
			$(this).parent().addClass("change");
			ol.slideDown(80);
		}
		
		setTimeout(function(){$.fn.auto_height("#sidebar","#neirong","#container")},150)			
		return false;
	})
}

$.fn.imgcenter=function(){
	return $(this).each(function(i){
		var bg=$(this).attr("src")
		$(this).parent().css('background','url('+bg+') no-repeat center center');
		$(this).css("display","none")
	})	
}

function AutoScroll(obj) {

	$(obj).find("ul:first").animate({
		marginTop: "-41px"
	}, 300, function() {
		$(this).css({ marginTop: "0px" }).find("li:first").appendTo(this);
	});
}





//输入关键词
	$.fn.key=function(a,color1,color2){
		var self=$(this)
		if (self.length==0) return false;
		if (!self.is("input") && !self.is("textarea")) return false;
		self.css("color",color2)
			var keywords=a;	
			self.val(keywords).bind("focus",function(){
				if (this.value==keywords){this.value="";this.style.color=color1}
			}).bind("blur",function(){
				if (this.value==""){this.value=keywords;this.style.color=color2}
			});
	}



var t_img; // 定时器 
var isLoad = true; // 控制变量 
$.fn.loadingpic=function(opts,callback){
	var picobj=$(this)
	if (picobj.length==0) return false;
	var piclist=[]
    picobj.each(function(){ 
        // 找到为0就将isLoad设为false，并退出each 
        if(this.height=== 0){ 
            isLoad = false; 
            return false; 
        } 
		
		piclist.push(this.src+'|'+this.width+'|'+this.height)
    }); 
	
    if(isLoad){ 
        clearTimeout(t_img); // 清除定时器 
        // 回调函数 
         callback(picobj,piclist); 
    // 为false，因为找到了没有加载完成的图，将调用定时器递归 
    }else{ 
        isLoad = true; 
        t_img = setTimeout(function(){ 
           picobj.loadingpic(opts,callback); // 递归扫描 
        },100); // 我这里设置的是500毫秒就扫描一次，可以自己调整 
    } 
	
	
}

$.fn.loadingok=function(srclist){
	
	var obj=$(this)
	var htmlpic='',htmlpic2='',temphtml=''
	obj.each(function(index, element) {
       var bigpic=$(this).attr("data-bigpic")
	   var smailpic=$(this).attr("src")
				if (index==0)
				{
					htmlpic2=htmlpic2+'<li class="active"><span></span><img src="'+smailpic+'"  /></li>'
					htmlpic=htmlpic+'<li><span></span><img src="'+bigpic+'"  /></li>'
				}
				else
				{
					htmlpic2=htmlpic2+'<li><span></span><img src="'+smailpic+'"  /></li>'
					htmlpic=htmlpic+'<li><span></span><img src="" data-bigpic="'+bigpic+'"  /></li>'
				}
				
		
    });
	
	//obj.css({visibility:"visible"})
	htmlpic2="<ul>"+htmlpic2+"</ul>"
	var html=''
	  html=html+'              <div id="tFocus">'
	  html=html+'                  <div class="prev" id="prev"></div>'
	  html=html+'                  <div class="next" id="next"></div>'
	  html=html+'                  <ul id="tFocus-pic">{htmlpic}</ul>'
	  html=html+'                  <div id="tFocusBtn">'
	  html=html+'                      '
	  html=html+'                      <div id="tFocus-btn"> {htmlpic2} </div>'
	  html=html+'                      '
	  html=html+'                   </div><a href="javascript:void(0);" id="tFocus-leftbtn">上一张</a> <a href="javascript:void(0);" id="tFocus-rightbtn">下一张</a>'
	  html=html+'         </div>'
	
	temphtml=html.replace("{htmlpic}",htmlpic).replace("{htmlpic2}",htmlpic2)
	
	obj.parents("#pictureBrowse").html(temphtml)
	addLoadEvent(Focus())	
}

/*图片切换*/
function addLoadEvent(func) {
	var oldonload = window.onload;
	if (typeof window.onload != 'function') {
		
	} else {
		window.onload = function() {
			oldonload();
			func();
		}
	}
}
		
		
function Focus() {
	function byid(id) {
		return document.getElementById(id);
	}
	function bytag(tag, obj) {
		return (typeof obj == 'object' ? obj: byid(obj)).getElementsByTagName(tag);
	}
	var timer = null;
	var oFocus = byid('tFocus');
	var oPic = byid('tFocus-pic');
	var oPicLis = bytag('li', oPic);
	var oBtn = byid('tFocus-btn');
	var oBtnLis = bytag('li', oBtn);
	var iActive = 0;
	function inlize() {
		
		oPicLis[0].style.filter = 'alpha(opacity:100)';
		oPicLis[0].style.opacity = 100;
		oPicLis[0].style.zIndex = 6;
	};
	for (var i = 0; i < oPicLis.length; i++) {
		oBtnLis[i].sIndex = i;
		oBtnLis[i].onclick = function() {
			if (this.sIndex == iActive) return;
			iActive = this.sIndex;
			changePic();
		}
	};
	byid('tFocus-leftbtn').onclick = byid('prev').onclick = function() {
		iActive--;
		if (iActive == -1) {
			iActive = oPicLis.length - 1;
		}
		changePic();
	};
	byid('tFocus-rightbtn').onclick = byid('next').onclick = function() {
		
		
		iActive++;
		if (iActive == oPicLis.length) {
			iActive = 0;
		}
		changePic();
	};
	
	function changePic() {
		for (var i = 0; i < oPicLis.length; i++) {
			doMove(oPicLis[i], 'opacity', 0);
			
			oPicLis[i].style.zIndex = 0;
			oBtnLis[i].className = '';
		};
		doMove(oPicLis[iActive], 'opacity', 100);
		oPicLis[iActive].style.zIndex = 5;
		oBtnLis[iActive].className = 'active';
		
		var picobj=$(oPicLis[iActive]).find("img")
		var picobj_url=picobj.attr("data-bigpic")
		if (picobj_url!="undefined")
		{picobj.attr("src",picobj_url);
		picobj.removeAttr("data-bigpic")
		}
		
	//	alert($(oPicLis[iActive]).find("img").attr("data-bigpic"))
	
		if (iActive == 0) {
			doMove(bytag('ul', oBtn)[0], 'left', 0);
		} else if (iActive >= oPicLis.length - 6 && oPicLis.length>7 ) {
			doMove(bytag('ul', oBtn)[0], 'left', -(oPicLis.length - 7) * (oBtnLis[0].offsetWidth+5));
		} else if (oPicLis.length>7 ) {
			doMove(bytag('ul', oBtn)[0], 'left', -(iActive - 1) * (oBtnLis[0].offsetWidth+5));
		}
		
	};
	function autoplay() {
		if (iActive >= oPicLis.length - 1) {
			iActive = 0;
		} else {
			iActive++;
		}
		changePic();
	};
	aTimer = setInterval(autoplay, 2000);
	inlize();
	function getStyle(obj, attr) {
		if (obj.currentStyle) {
			return obj.currentStyle[attr];
		} else {
			return getComputedStyle(obj, false)[attr];
		}
	};
	function doMove(obj, attr, iTarget) {
		
		
		clearInterval(obj.timer);
		obj.timer = setInterval(function() {
			var iCur = 0;
			if (attr == 'opacity') {
				iCur = parseInt(parseFloat(getStyle(obj, attr)) * 100);
			} else {
				iCur = parseInt(getStyle(obj, attr));
			}
			var iSpeed = (iTarget - iCur) / 6;
			iSpeed = iSpeed > 0 ? Math.ceil(iSpeed) : Math.floor(iSpeed);
			if (iCur == iTarget) {
				clearInterval(obj.timer);
			} else {
				
				if (attr == 'opacity') {
					obj.style.filter = 'alpha(opacity:' + (iCur + iSpeed) + ')';
					obj.style.opacity = (iCur + iSpeed) / 100;
				} else {
					obj.style[attr] = iCur + iSpeed + 'px';
					
				}
			}
		},
		30)
	};
	byid('tFocus').onmouseover = function() {
		clearInterval(aTimer);
	}
	byid('tFocus').onmouseout = function() {
		aTimer = setInterval(autoplay, 2000);
	}
	
	
	
	
	
}		




//浮动头部
		$.fn.floatheader=function(starvalue){
			
			var self=$(this);
			if (self.length==0) return false;
			var win_width=$(window).width();
			var resizeTimer=null;
			var self_h=self.outerHeight();//取得高度
			var spaces_name=self.attr("id")+"_"
			
			if ($("#"+spaces_name).length==0)
			{
				self.before("<span id='"+spaces_name+"' style='display:none'></span>")	
			}
			
			$(window).bind("scroll",function(){
				if (resizeTimer) {clearTimeout(resizeTimer)}
				resizeTimer = setTimeout(function(){
					
							var scrolltop=$(document).scrollTop();	
							if (scrolltop>starvalue)
							{
								if (self.css("position")!="fixed")
								{
									
									$("#"+spaces_name).css({"display":"block","height":self_h})
									self.addClass("yinying")
									self.css({"z-index":50000,"position":"fixed","left":"0","top":"0","width":"100%","top":-(self_h+10)}).stop(true,false).animate({"top":"0"},200)
								}
							}
							else
							{
								if (self.css("position")=="fixed")
								{
									self.removeClass("yinying")
									self.stop(true,false).animate({"top":-(self_h+10)},0,function(){$("#"+spaces_name).css({"display":"none"});$(this).css({"position":"relative","top":0})})
								}
							}
					
				},30);
				
				})
						
			
		}



