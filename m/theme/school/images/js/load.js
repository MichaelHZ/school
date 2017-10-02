$(document).ready(function(){
	
		if ($("#banner").length>0)
		{
			
			  $('#banner .banner_nr').bxSlider({ 
				slideWidth: 750, 
				adaptiveHeight: false,
				startSlides: 0, 
				slideMargin: 10
			  });	

		}
		
		if ($("#Teacher").length>0)
		{
					
				var swiper = new Swiper('.swiper-container', {
					
					slidesPerView: 4,
					centeredSlides: false,
					paginationClickable: false,
					spaceBetween: 0
				});
	
			
		}
	
	
		if ($("#scrollDiv").length>0)
		{
			var myar = setInterval('AutoScroll("#scrollDiv")', 2000)
            $("#scrollDiv").hover(function() { clearInterval(myar); }, function() { myar = setInterval('AutoScroll("#scrollDiv")', 2000) }); //当鼠标放上去的时候，滚动停止，鼠标离开的时候滚动开始
		}
	
	
		$("#news .FocusNews").bxSlider_diy({ 
				slideWidth: 750, 
				adaptiveHeight: false,
				startSlides: 0, 
				slideMargin: 10
			  })
	
		$(".main_content").minheight()
		FontAdjustment();
	
		//点击弹出菜单
		$(".btn_menu").click(function(){
			
			if ($("#navmenu_zz").length>0 && $("#navmenu").length>0)
			
			{
				var obj1=$("#navmenu")
				var obj2=$("#navmenu_zz")
				var obj1_w=obj1.outerWidth()
				obj1.css({"display":"block","left":-obj1_w}).animate({"left":"0px"},300)
				$("#navmenu_zz").fadeIn(200)	
				
				obj2.one("click",function(){
					obj1.animate({"left":-obj1_w},300)
					obj2.fadeOut(200)
					obj1.find("ol").fadeOut()
					obj1.find("li.change").removeClass("change");
				})
			}
			return false;
			
		})
		
		
		$("#navmenu").submenus()
		//$("#NewsList").scrollloading("teacher_")
		$("#NewsList").scrollloading("docs")
		$("#NewsFast").scrollloading("news_docs")
		$("#MessageList").scrollloading("problembox")
		$("#Doclist").scrollloading("NewsList")
})

$.fn.submenus=function(){
	var self=$(this);
	if (self.length==0) return false;
		
	self.find("ol").prev().addClass("btn_submenu")
	self.find(".btn_submenu").parent().siblings().bind("click",function(){
		
		$(this).siblings().removeClass("change").find("ol").fadeOut()
	})
	self.find(".btn_submenu").bind("click",function(){
		if ($(this).parent().is(".change"))
		{
			$(this).parent().removeClass("change")
			$(this).next("ol").fadeOut(200)	
			
		}
		else
		{
				$(this).parent().siblings().find("ol").fadeOut()
				$(this).parent().addClass("change").siblings().removeClass("change")
				$(this).next("ol").fadeIn(200)	
		}
		
	})
}

//拖动加载
$.fn.scrollloading=function(liobj){
	
	var self=$(this);
	var self2=$(this).parent()
	if (self.length==0) return false;
	if (self.find("ul").length>0) 
	{
			if (self.find("."+liobj).length==0) return false;
			
			self.wrap(' <div id="wrapper" ></div>').wrap('<div class="scroller"></div>')
	}
	else
	{
			if (self.find("."+liobj).length==0) return false;
			//结构重构
			self.find("."+liobj).wrap("<li></li>").parent().wrapAll("<ul></ul>")
			self.wrap(' <div id="wrapper" ></div>').wrap('<div class="scroller"></div>')
	}

	
    refresher.init({
        id:"wrapper",
		pullDownAction:function(){ wrapper.refresh();},
        pullUpAction:function(){
		var writehtml=''
		page += 1;	
			
        setTimeout(function () {
			switch (liobj)
			{
				
				//文字列表.html
				case "NewsList":
								
								writehtml = '';
								$.post('/m/article_category.php', {
									page : page,cat_id:cat_id
								}, function(data) {
									if (data.stat == 1) {
										   json = eval(data.data);
									       for(var i=0; i<json.length; i++)
									  {
											writehtml += '<li><a href="'+ json[i]['url'] +'">'+ json[i]['title'] + '</a></li>'
										}
										
										$("#wrapper").find("ul").append(writehtml);
									} else {
										$("#wrapper").find("ul").append('<li><div class="docs" style="text-align:center;">没有更多了</div></li>');
									}
								}, 'json')
								//以上HTML代码请通过AJAX方式加载进来
								
								
			    $("#wrapper").find("ul").append(writehtml)
				break;
				//图文列表.html
				//case "teacher_":
				case "docs":
							
					writehtml = '';
					$.post('/m/article_category.php', {
						page : page,cat_id:cat_id
					}, function(data) {
						if (data.stat == 1) {
							   json = eval(data.data);
						       for(var i=0; i<json.length; i++)
								  
						  {
						    
								writehtml += '<li>'
								//writehtml = writehtml + '<div class="teacher_">'
								writehtml = writehtml + '<div class="docs">'
								writehtml = writehtml + '	<a href="'
										+ json[i]['url'] + '">'
								writehtml = writehtml + '		<div class="photo">'
								if( json[i]['image']){
								writehtml = writehtml + '			<img src="'
										+ json[i]['image']
										+ '" alt="图片描述" />'
								}else{
									writehtml = writehtml + '			<img src="/images/fragment/none.jpg" alt="图片描述" />'
								}		
								writehtml = writehtml + '		</div>'
								writehtml = writehtml + '		<h5> '
										+ json[i]['title'] + '</h5>'
								writehtml = writehtml + '		<time> '
										+ json[i]['add_time'] + '</time><em> '
										+ json[i]['source'] + '</em>'
								writehtml = writehtml + '		<p>'
										+ json[i]['description'] + ' </p>'
								writehtml = writehtml + '	</a>'
								writehtml = writehtml + '</div>'

								writehtml = writehtml + '</li>'
							}
							$("#wrapper").find("ul").append(writehtml);
						} else {
							$("#wrapper").find("ul").append('<li><div class="docs" style="text-align:center;">没有更多了</div></li>');
						}
					}, 'json')
				break;
					//图文列表.html
				case "news_docs":
							
					writehtml = '';
					$.post('/m/news_category.php', {
						page : page
					}, function(data) {
						if (data.stat == 1) {
							   json = eval(data.data);
						       for(var i=0; i<json.length; i++)
						  {
						    
								writehtml += '<li>'
								writehtml = writehtml + '<div class="docs">'
								writehtml = writehtml + '	<a href="'
										+ json[i]['url'] + '">'
								writehtml = writehtml + '		<div class="photo">'
								writehtml = writehtml + '			<img src="'
										+ json[i]['image']
										+ '" alt="图片描述" />'
								writehtml = writehtml + '		</div>'
								writehtml = writehtml + '		<h5> '
										+ json[i]['title'] + '</h5>'
								writehtml = writehtml + '		<time> '
										+ json[i]['add_time'] + '</time><em> '
										+ json[i]['source'] + '</em>'
								writehtml = writehtml + '		<p>'
										+ json[i]['description'] + ' </p>'
								writehtml = writehtml + '	</a>'
								writehtml = writehtml + '</div>'

								writehtml = writehtml + '</li>'
							}
							$("#wrapper").find("ul").append(writehtml);
						} else {
							$("#wrapper").find("ul").append('<li><div class="news_docs" style="text-align:center;">没有更多了</div></li>');
						}
					}, 'json')
				break;	
				//留言列表.html
				case "problembox":
				
					writehtml = '';
					$.post('/m/guestbook.php', {
						page : page
					}, function(data) {
						if (data.stat == 1) {
							   json = eval(data.data);
						       for(var i=0; i<json.length; i++)
						  {
						    	   writehtml='<li>'
										
									    writehtml=writehtml+'<div class="problembox">'
									
												writehtml=writehtml+'<div class="problem">'
												writehtml=writehtml+'	<h5>'+ json[i]['name'] + ' </h5>'
												writehtml=writehtml+'	<p>'+ json[i]['content'] + '</p>'
												writehtml=writehtml+'	<time> '+ json[i]['add_time'] + '</time>'												
												writehtml=writehtml+'</div>'
												if(json[i]['reply']){
													writehtml=writehtml+'<div class="huifu">'
													writehtml=writehtml+'	<span>校长回复 </span>'
													writehtml=writehtml+'	<p> '+ json[i]['reply'] + '</p>'
													writehtml=writehtml+'</div>'
												}
											
									    writehtml=writehtml+'</div>'
													
									writehtml=writehtml+'</li>'
									
							
							}

							$("#wrapper").find("ul").append(writehtml);
						} else {
							$("#wrapper").find("ul").append('<li><div class="problembox"><h5 style="text-align:center;">没有更多了</h5></div></li>');
						}
					}, 'json')
						
								
						
								//以上HTML代码请通过AJAX方式加载进来
		
				
				
				break;
				
			}
			
			
            wrapper.refresh();
        },600);	
			
			
			
		} 																			
    });	
	$('#wrapper').wrapper_height()

}

//wrapper高度调整
$.fn.wrapper_height=function(){
	var self=$(this);
	if (self.length==0) return false;
	var window_h=$(window).height();
	var top=self.position().top;
	self.css("height",window_h-top);
	
}


//最小高度
$.fn.minheight=function(){
	var self=$(this);
	if (self.length==0) return false;
	var window_h=$(window).height();
	var top=self.position().top;
	self.css("min-height",window_h-top);
}

//响应式滚动自动转化
$.fn.bxSlider_diy=function(option){
	var self=$(this);
	if (self.length==0) return false;
	
	if (self.length>1)	
	{
			self.each(function(index, element) {
					$(this).wrap('<div class="slide_"></div>')
			});
			self.parent().wrapAll('<div class="FocusNews_play"></div>')
			 self.parent().parent().bxSlider(option);	
	}
}
				
    
function AutoScroll(obj) {
	var top=$(obj).find("ul li").outerHeight();
	$(obj).find("ul:first").animate({
		marginTop: "-"+top+"px"
	}, 500, function() {
		$(this).css({ marginTop: "0px" }).find("li:first").appendTo(this);
	});
}


$(window).resize(function(){
	$('#wrapper').wrapper_height()
	FontAdjustment();
})

function FontAdjustment()
{
		var window_w=$(window).width()
		var page_w=750
		if (window_w>=page_w)
		{
			window_w=page_w;
			$("body").css("font-size","62.5%");
		}
		else if(window_w>=300 && window_w<page_w)
		{
			var newbaifenbi=(62.5/(page_w/window_w)).toFixed(3);
			$("body").css("font-size",newbaifenbi+"%");
		}
		else if (window_w<300)
		{
			var newbaifenbi=(62.5/(page_w/300)).toFixed(3);
			$("body").css("font-size",newbaifenbi+"%");
		}
}
/**
+----------------------------------------------------------
* 刷新验证码
+----------------------------------------------------------
*/
function refreshimage() {
   var cap = document.getElementById("vcode");
   cap.src = cap.src + '?';
}