<footer id="footer">
    	<div class="center">
                <div id="lianxi">
                    <div class="bomlogo">
                    <a href="#" > <img src="images/bomlogo.png" alt="description " /></a>
                    </div>
                        <p>常熟市报慈小学      版权所有</p>
                        <p>地       址：江苏省苏州市常熟市湘江西路288号</p>
                        <p>备案号：888888       技术支持：常熟市报慈小学</p>
                    <ul>
                        <li><img src="images/ewm.jpg" alt="description " />关注微信公众号</li>
                        <li><img src="images/ewm2.jpg" alt="description " />扫一扫，手机端</li>
                        <li><img src="images/dw.png" alt="description " />苏ICP备 10217989号</li>
                    </ul>
                </div>
                <!-- lianxi结束 -->
        
                <section id="LeaveMessage">
                    <form  class="form"  id="form1">
                    <h5><em>在线留言 </em> <span> 我们会在三个工作日内回复！</span></h5>
                    <dl>
                        <dt>姓 &nbsp; &nbsp;  名 :</dt>
                        <dd><input name="name" type="text" class="text1" id="name_" value="" /> <span class="must">*</span> </dd>
                        <dl class="tel">
                            <dt>电 &nbsp;话:</dt>
                            <dd><input name="tel" type="text" class="text2" id="tel_" value=""/> <span class="must">*</span> </dd>
                        </dl>
                        
                        
                        
                        <dt>邮  &nbsp; &nbsp;  箱:</dt>
                        
                        <dd><input name="email" type="text" class="text1" id="mail_" value=""/> <span class="must">*</span> </dd>
                        
                        
                        <dl class="yzm">
                            <dt>验证码：</dt>
                            <dd><input name="captcha" type="text" class="text0" id="yzm_" value=""/> <img src="{$site.root_url}captcha.php" class="yzmpic" id="vcode" alt="{$lang.captcha}" border="1" onClick="refreshimage()" title="{$lang.captcha_refresh}"> <span class="must">*</span> </dd>
                        </dl>
                        
                        
                        <dt>我要留言:</dt>
                        
                        
                        <dd><textarea name="textarea" cols="" rows="" id="problem_" value=""> </textarea> <span class="must">*</span> </dd>
                        <dd> 
                         <input name="btn" class="btn_send" type="submit" value="提交" />
                         <input name="btn" class="btn_reset" type="reset" value="重置" />
                          <input type="hidden" name="token" value="{$token}" id="token_" />
                         </dd>
                </dl>
                    </form>
            </section>

            <script>
                {literal}
                $(function(){

                    $("#form1").submit(function(){
                        name = $("#name_").val();
                        if(name == '称呼' || name == ''){
                            alert('称呼不能为空');
                            return false;
                        }

                        email = $("#mail_").val();
                        if(email == '邮箱' || email == ''){
                            email = '';
                        }
                        tel = $("#tel_").val();
                        if(tel == '手机' || tel == ''){
                            tel = '';
                        }
                        captcha = $("#yzm_").val();
                        if(captcha == '验证码' || captcha == ''){
                            alert('验证码不能为空');
                            return false;
                        }
                        content = $("#problem_").val();
                        if( content == ''){
                            alert('内容不能为空');
                            return false;
                        }
                        token = $("#token_").val();
                        $.post(
                            '/guestbook.php?rec=ajax_insert',{
                                name:name,
                                email: email,
                                tel: tel,
                                captcha: captcha,
                                content: $("#problem_").val(),
                                token : token
                            },function(data){
                                alert(data);
                            },'json')
                        return false;
                    })
                })

                {/literal}
            </script>
            <!-- LeaveMessage结束 -->
    
		<span class="clear"></span>
		</div>
        <span  class="footerbg"></span>
	</footer>