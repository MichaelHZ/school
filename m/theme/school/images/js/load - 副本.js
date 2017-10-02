$(document).ready(function() {

	if ($("#banner").length > 0) {

		$('#banner .banner_nr').bxSlider({
			slideWidth : 750,
			adaptiveHeight : false,
			startSlides : 0,
			slideMargin : 10
		});

	}

	if ($("#scrollDiv").length > 0) {
		var myar = setInterval('AutoScroll("#scrollDiv")', 2000)
		$("#scrollDiv").hover(function() {
			clearInterval(myar);
		}, function() {
			myar = setInterval('AutoScroll("#scrollDiv")', 2000)
		}); // 当鼠标放上去的时候，滚动停止，鼠标离开的时候滚动开始
	}

	$("#news .FocusNews").bxSlider_diy({
		slideWidth : 750,
		adaptiveHeight : false,
		startSlides : 0,
		slideMargin : 10
	})

	$(".main_content").minheight()
	FontAdjustment();

	// 点击弹出菜单
	$(".btn_menu").click(function() {

		if ($("#navmenu_zz").length > 0 && $("#navmenu").length > 0)

		{
			var obj1 = $("#navmenu")
			var obj2 = $("#navmenu_zz")
			var obj1_w = obj1.outerWidth()
			obj1.css({
				"display" : "block",
				"left" : -obj1_w
			}).animate({
				"left" : "0px"
			}, 300)
			$("#navmenu_zz").fadeIn(200)

			obj2.one("click", function() {
				obj1.animate({
					"left" : -obj1_w
				}, 300)
				obj2.fadeOut(200)
			})
		}
		return false;

	})

	$("#NewsList").scrollloading("docs")
	$("#MessageList").scrollloading("problembox")
	$("#Doclist").scrollloading("NewsList")
})
// 拖动加载
$.fn.scrollloading = function(liobj) {

	var self = $(this);
	var self2 = $(this).parent()
	if (self.length == 0)
		return false;
	if (self.find("ul").length > 0) {
		if (self.find("." + liobj).length == 0)
			return false;

		self.wrap(' <div id="wrapper" ></div>').wrap(
				'<div class="scroller"></div>')
	} else {
		if (self.find("." + liobj).length == 0)
			return false;
		// 结构重构
		self.find("." + liobj).wrap("<li></li>").parent().wrapAll("<ul></ul>")
		self.wrap(' <div id="wrapper" ></div>').wrap(
				'<div class="scroller"></div>')
	}

	refresher.init({
		id : "wrapper",
		pullDownAction : function() {
			wrapper.refresh();
		},
		pullUpAction : function() {
			var writehtml = ''
     
			setTimeout(function() {
				switch (liobj) {

				// 文字列表.html
				case "NewsList":
					writehtml = writehtml
							+ '<li><a href="#">首套房贷款暗中趋紧 市场期待放松或一厢情愿</a></li>'
					writehtml = writehtml
							+ '<li><a href="#">朝鲜大部地区出现降雨缓解旱情 有利于农业生产</a></li>'
					writehtml = writehtml
							+ '<li><a href="#">废旧家电回收基金开征 电视销售成本增5%</a></li>'
					writehtml = writehtml
							+ '<li><a href="#">首套房贷款暗中趋紧 市场期待放松或一厢情愿</a></li>'

					// 以上HTML代码请通过AJAX方式加载进来

					$("#wrapper").find("ul").append(writehtml)
					break;
				// 图文列表.html
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
							page += 1;
							$("#wrapper").find("ul").append(writehtml);
						} else {
							$("#wrapper").find("ul").append('没有更多了');
						}
					}, 'json')

					// 以上HTML代码请通过AJAX方式加载进来

					break;
				// 留言列表.html
				case "problembox":

					writehtml = '<li>'

					writehtml = writehtml + '<div class="problembox">'

					writehtml = writehtml + '<div class="problem">'
					writehtml = writehtml + '	<h5>心系学校的家长 </h5>'
					writehtml = writehtml
							+ '	<p>尊敬的学校领导：你们好！我是一位四年级学生的家长。游泳是一项很好的运动，在此，非'
					writehtml = writehtml
							+ '	常感谢学校的精心安排！但是，体育中心游泳卫生状况不容乐观，麻烦学校领导能否和体育'
					writehtml = writehtml
							+ '	中心相关负责人沟通一下，把卫生搞上去，这毕竟是关系到学生的健康。谢谢！ '
					writehtml = writehtml + '	</p>'
					writehtml = writehtml + '	<time> 2016-03-08 23:23</time>'

					writehtml = writehtml + '</div>'

					writehtml = writehtml + '<div class="huifu">'
					writehtml = writehtml + '	<span>校长回复 </span>'
					writehtml = writehtml
							+ '	<p> 家长朋友您好！看到您的留言我校及时与体育中心负责人进行问题反馈和意见交流，体育'
					writehtml = writehtml
							+ '	中心的答复是：游泳池的卫生工作是游泳馆的一项重要的常规工作，上周四游泳中心已进行'
					writehtml = writehtml
							+ '	了一次全面卫生整理工作，卫生局每月都会到游泳中心进行检测，以确保游泳池卫生符合相'
					writehtml = writehtml + '	关要求，请家长放心。感谢您对学校工作的关心和支持！'
					writehtml = writehtml + '	</p>'
					writehtml = writehtml + '</div>'

					writehtml = writehtml + '</div>'

					writehtml = writehtml + '</li>'

					// 以上HTML代码请通过AJAX方式加载进来

					$("#wrapper").find("ul").append(writehtml)
					break;

				}

				wrapper.refresh();
			}, 600);

		}
	});
	$('#wrapper').wrapper_height()

}

// wrapper高度调整
$.fn.wrapper_height = function() {
	var self = $(this);
	if (self.length == 0)
		return false;
	var window_h = $(window).height();
	var top = self.position().top;
	self.css("height", window_h - top);

}

// 最小高度
$.fn.minheight = function() {
	var self = $(this);
	if (self.length == 0)
		return false;
	var window_h = $(window).height();
	var top = self.position().top;
	self.css("min-height", window_h - top);
}

// 响应式滚动自动转化
$.fn.bxSlider_diy = function(option) {
	var self = $(this);
	if (self.length == 0)
		return false;

	if (self.length > 1) {
		self.each(function(index, element) {
			$(this).wrap('<div class="slide_"></div>')
		});
		self.parent().wrapAll('<div class="FocusNews_play"></div>')
		self.parent().parent().bxSlider(option);
	}
}

function AutoScroll(obj) {
	var top = $(obj).find("ul li").outerHeight();
	$(obj).find("ul:first").animate({
		marginTop : "-" + top + "px"
	}, 500, function() {
		$(this).css({
			marginTop : "0px"
		}).find("li:first").appendTo(this);
	});
}

$(window).resize(function() {
	$('#wrapper').wrapper_height()
	FontAdjustment();
})

function FontAdjustment() {
	var window_w = $(window).width()
	var page_w = 750
	if (window_w >= page_w) {
		window_w = page_w;
		$("body").css("font-size", "62.5%");
	} else if (window_w >= 300 && window_w < page_w) {
		var newbaifenbi = (62.5 / (page_w / window_w)).toFixed(3);
		$("body").css("font-size", newbaifenbi + "%");
	} else if (window_w < 300) {
		var newbaifenbi = (62.5 / (page_w / 300)).toFixed(3);
		$("body").css("font-size", newbaifenbi + "%");
	}
}