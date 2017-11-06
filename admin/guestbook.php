<?php
/**
 * DouPHP
 * --------------------------------------------------------------------------------------------------
 * 版权所有 2013-2015 漳州豆壳网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.douco.com
 * --------------------------------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在遵守授权协议前提下对程序代码进行修改和使用；不允许对程序代码以任何形式任何目的的再发布。
 * 授权协议：http://www.douco.com/license.html
 * --------------------------------------------------------------------------------------------------
 * Author: DouCo
 * Release Date: 2015-10-16
 */
define('IN_DOUCO', true);

require (dirname(__FILE__) . '/include/init.php');

// rec操作项的初始化
$rec = $check->is_rec($_REQUEST['rec']) ? $_REQUEST['rec'] : 'default';

// 赋值给模板
$smarty->assign('rec', $rec);
$smarty->assign('cur', 'guestbook');

/**
 * +----------------------------------------------------------
 * 留言列表
 * +----------------------------------------------------------
 */
if ($rec == 'default') {
    $smarty->assign('ur_here', $_LANG['guestbook']);

    // SQL查询条件
    $where = " WHERE reply_id = '0'";
    
    // 验证并获取合法的分页ID
    $page = $check->is_number($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $limit = $dou->pager('guestbook', 15, $page, 'guestbook.php', $where);
    
    $sql = "SELECT id,  name, tel, email, qq , if_show, if_read, ip,content, add_time FROM " . $dou->table('guestbook') . $where . " ORDER BY id DESC" . $limit;
    $query = $dou->query($sql);
    while ($row = $dou->fetch_array($query)) {
        $if_show = $row['if_show'] ? $_LANG['display'] : $_LANG['hidden'];
        $add_time = date("Y-m-d", $row[add_time]);
        
        $book_list[] = array (
                "id" => $row['id'],
                "name" => $row['name'],
        		"email" => $row['email'],
                "tel" => $row['tel'],
                "qq" => $row['qq'],
                "if_show" => $if_show,
                "if_read" => $row['if_read'],
                "ip" => $row['ip'],
        		"content" => $row['content'],
                "add_time" => $add_time 
        );
    }
    
    $smarty->assign('book_list', $book_list);
    $smarty->display('guestbook.htm');
} 

/**
 * +----------------------------------------------------------
 * 留言查看
 * +----------------------------------------------------------
 */
elseif ($rec == 'read') {
    $smarty->assign('ur_here', $_LANG['guestbook_read']);
    $smarty->assign('action_link', array (
            'text' => $_LANG['guestbook_list'],
            'href' => 'guestbook.php' 
    ));
    
    $id = trim($_REQUEST['id']);
    
    // 获取留言信息
    $query = $dou->select($dou->table(guestbook), '*', '`id` = \'' . $id . '\'');
    $guestbook = $dou->fetch_array($query);
    $guestbook['add_time'] = date("Y-m-d", $guestbook['add_time']);
    
    // 获取管理员回复
    $sql = "SELECT content, add_time FROM " . $dou->table('guestbook') . " WHERE reply_id = '$id'";
    $query = $dou->query($sql);
    $reply = $dou->fetch_array($query);
    $reply['add_time'] = date("Y-m-d", $reply['add_time']);
    
    // 将留言信息更新为已读
    $read = "UPDATE " . $dou->table('guestbook') . " SET if_read = '1' WHERE id = '$id'";
    $dou->query($read);
    
    $smarty->assign('guestbook', $guestbook);
    $smarty->assign('reply', $reply);
    $smarty->display('guestbook.htm');
} 

/**
 * +----------------------------------------------------------
 * 留言回复
 * +----------------------------------------------------------
 */
elseif ($rec == 'reply') {
	
    $name = time();
    $ip = $dou->get_ip();
    $add_time = time();
    $guess = $dou->get_row("SELECT * FROM " . $dou->table('guestbook') . " WHERE id = '$_POST[id]'");
	$reply = '';
	$name = $guess['name'];
	$content = $name.'您好:'.$_POST['content'];
	if($guess['tel'] && empty($reply)){
		$statusStr = array(
			"0" => "短信发送成功",
				"-1" => "参数不全",
			"-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
			"30" => "密码错误",
			"40" => "账号不存在",
			"41" => "余额不足",
			"42" => "帐户已过期",
			"43" => "IP地址限制",
			"50" => "内容含有敏感词"
	);
		$account = 'shimeixiaoxue';
		$pwd = md5('admin777');
		$content = $name.'您好:您的留言有新的回复请登陆网站查看';
		$url = "http://api.smsbao.com/sms?u={$account}&p={$pwd}&m={$guess['tel']}&c={$content}";
		@$result =file_get_contents($url) ;
		if($result == 0){
			$reply = 'mobile';
		}
		//echo $statusStr[$result];
		
	}
	if($guess['email'] && empty($reply)){
		 // 发送回复内容邮件
		 $body = $content;
        if ($dou->send_mail($guess['email'],'报慈小学留言回复', $body)) {
			$msg = "回复邮件发送成功";
            $reply = 'email';
        } else {
			$msg = "回复邮件回复邮件失败";
            
        }
		
	}
	
	
    $sql = "INSERT INTO " . $dou->table('guestbook') . " (id, name, content, ip, add_time, reply_id,sendtype)" .
             " VALUES (NULL, '$_USER[user_name]', '$_POST[content]', '$ip', '$add_time', '$_POST[id]','$reply')";
    $dou->query($sql);
    
    $dou->create_admin_log($_LANG['guestbook_reply'] . ': ' . $_POST[title]);
    
    $dou->dou_msg($_LANG['guestbook_insert_success'].'|'.$statusStr[$result].'|'.$msg, 'guestbook.php');
} 

/**
 * +----------------------------------------------------------
 * 显示或隐藏
 * +----------------------------------------------------------
 */
elseif ($rec == 'show_hidden') {
    $id = trim($_REQUEST['id']);
    $if_show = $dou->get_one("SELECT if_show FROM " . $dou->table('guestbook') . " WHERE id = '$id'");
    $if_show = $if_show ? 0 : 1;
    
    // 更新留言信息显示状态
    $read = "UPDATE " . $dou->table('guestbook') . " SET if_show = '$if_show' WHERE id = '$id'";
    $dou->query($read);
    
    echo "<em class=" . ($if_show ? 'd' : 'h') . "><b>$_LANG[display]</b><s>$_LANG[hidden]</s></em>";
} 

/**
 * +----------------------------------------------------------
 * 批量留言删除
 * +----------------------------------------------------------
 */
elseif ($rec == 'del_all') {
    if (is_array($_POST['checkbox'])) {
        $checkbox = $dou->create_sql_in($_POST['checkbox']);
        
        // 删除留言
        $sql = "DELETE FROM " . $dou->table('guestbook') . " WHERE id " . $checkbox;
        $dou->query($sql);
        
        $dou->create_admin_log($_LANG['guestbook_del'] . ": GUESTBOOK " . addslashes($checkbox));
        $dou->dou_msg($_LANG['del_succes'], 'guestbook.php');
    } else {
        $dou->dou_msg($_LANG['guestbook_select_empty'], 'guestbook.php');
    }
}
function curlGet($url) {
		$ch = curl_init ();
		$header = "Accept-Charset: utf-8";
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "GET" );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
		curl_setopt ( $ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1 );
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, $header );
		curl_setopt ( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)' );
		curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
		curl_setopt ( $ch, CURLOPT_AUTOREFERER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		$temp = curl_exec ( $ch );
		
		return $temp;
	}
function curlPost($url, $data, $showError = 1) {
		$ch = curl_init ();
		$header = "Accept-Charset: utf-8";
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, "POST" );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
		curl_setopt ( $curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1 );
		curl_setopt ( $curl, CURLOPT_HTTPHEADER, $header );
		curl_setopt ( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)' );
		curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
		curl_setopt ( $ch, CURLOPT_AUTOREFERER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		$tmpInfo = curl_exec ( $ch );
		if ($showError == '10') {
			return $tmpInfo;
			exit ();
		}
		
		$errorno = curl_errno ( $ch );
		if ($errorno) {
			return array (
					'rt' => false,
					'errorno' => $errorno 
			);
		} else {
			$js = json_decode ( $tmpInfo, 1 );
			if (intval ( $js ['errcode'] == 0 )) {
				return array (
						'rt' => true,
						'errorno' => 0,
						'media_id' => $js ['media_id'],
						'msg_id' => $js ['msg_id'] 
				);
			} else {
				if ($showError) {
					return array (
							'rt' => true,
							'errorno' => 10,
							'msg' => '发生了Post错误：错误代码' . $js ['errcode'] . ',微信返回错误信息：' . $js ['errmsg'] 
					);
				}
			}
		}
	}
?>