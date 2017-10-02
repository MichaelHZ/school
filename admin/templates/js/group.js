 $(function(){
	// 栏目全部选中
	$("#ckboxCatAll").click(function(){
		
	if(typeof ($(this).attr('checked')) == 'undefined'){
		$(this).attr("checked",true);
		$(".article_cat").prop("checked",true);
	}else{
		$(this).removeAttr("checked");
		$(".article_cat").removeAttr("checked");
	}
   });
   // 快速设置变更
	$("#group_select").change(function(){
		window.location.href = '/admin/managergrouplist.php?cur='+$(this).val();
	});
})