$(function(){
	
	
	$('#boke_pw .password').placeholder({isUseSpan:true});
	$("#submit").click(function(){
		
		var blog_id = $('#blog_id').val();
		var pwd = $('#password').val();
		$.post('article.php',{'act':'pwd','blog_id':blog_id,'pwd':pwd},function(data){
			if(data == 0){
				window.location.reload();
			}else{
			   $("#password").val('');
			   $("#password").attr('placeholder','口令错误');
			}
		})
			return false;
	});
	
})