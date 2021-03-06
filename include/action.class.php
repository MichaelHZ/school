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
if (!defined('IN_DOUCO')) {
    die('Hacking attempt');
}
class Action extends Common {
    /**
     * +----------------------------------------------------------
     * 获取导航菜单
     * +----------------------------------------------------------
     * $type 导航类型
     * $parent_id 默认获取一级导航
     * $current_module 当前页面模型名称，用于高亮导航栏
     * $current_id 当前页面栏目ID
     * +----------------------------------------------------------
     */
    function get_nav($type = 'middle', $parent_id = 0, $current_module = '', $current_id = '', $current_parent_id = '') {
        $nav = array ();
        $data = $this->fetch_array_all($this->table('nav'), 'sort ASC');
		$i = 2;
        foreach ((array) $data as $value) {
            // 根据$parent_id和$type筛选父级导航
            if ($value['parent_id'] == $parent_id && $value['type'] == $type) {
                // 如果是自定义链接则$value['guide']值链接地址，如果是内部导航则值是栏目ID
                if ($value['module'] == 'nav') {
                    if (strpos($value['guide'], 'http://') === 0 || strpos($value['guide'], 'https://') === 0) {
                        $value['url'] = $value['guide'];
                        // 自定义导航如果包含http则在新窗口打开
                        $value['target'] = true;
                    } else {
                        $value['url'] = ROOT_URL . $value['guide'];
                        // 系统会比对自定义链接是否包含在当前URL里，如果包含则高亮菜单，如果不需要此功能，请注释掉下面那行代码
                        $value['cur'] = strpos($_SERVER['REQUEST_URI'], $value['guide']);
                    }
                } else {
                    $value['url'] = $this->rewrite_url($value['module'], $value['guide']);
                    $value['cur'] = $this->dou_current($value['module'], $value['guide'], $current_module, $current_id, $current_parent_id);
                }
                
                foreach ($data as $child) {
                    // 筛选下级导航
                    if ($child['parent_id'] == $value['id']) {
                        $value['child'] = $this->get_nav($type, $value['id']);
                        break;
                    }
                }
				$value['index'] = $i++;
                $nav[] = $value;
            }
        }
        
        return $nav;
    }

    /**
     * +----------------------------------------------------------
     * 获取当前栏目上级栏目图
     * +----------------------------------------------------------
     *
     * @var integer $cate_id
     *
     * @return boolean | string
     * +----------------------------------------------------------
     */
    function get_parent_image($cate_id) {
        if(empty($cate_id)){
            return false;
        }

        $cateInfo = $this->get_row("select parent_id,image From ".$this->table('nav')." where guide = '$cate_id'");

        if(empty($cateInfo)){
            return false;
        }

        if($cateInfo['parent_id'] == 0 || !empty($cateInfo['image'])){
            return $cateInfo['image'];
        }

        return $this->get_one("Select image From ".$this->table('nav')." where id=".$cateInfo['parent_id']);

    }
    /**
     * +----------------------------------------------------------
     * 高亮当前菜单
     * +----------------------------------------------------------
     * $module 模块名称
     * $id 当前要判断的ID
     * $current_module 当前模块名称，例如在获取导航菜单时就会涉及到不同的模块
     * $current_id 当前的ID
     * +----------------------------------------------------------
     */
    function dou_current($module, $id, $current_module, $current_id = '', $current_parent_id = '') {
        if (($id == $current_id || $id == $current_parent_id) && $module == $current_module) {
            return true;
        } elseif (!$id && $module == $current_module) {
            return true;
        }
    }
    
    /**
     * +----------------------------------------------------------
     * 当前位置
     * +----------------------------------------------------------
     * $module 模块名称
     * $class 分类ID或模块子栏目
     * $title 信息标题
     * +----------------------------------------------------------
     */
    function ur_here($module, $class = '', $title = '') {
        if ($module == 'page') {
            // 如果是单页面，则只显示单页面名称
            $ur_here = $title;
        } elseif (!$class) {
            // 模块主页
            $ur_here = $GLOBALS['_LANG'][$module];
        } else {
            // 模块名称
            $main = '<a href=' . $this->rewrite_url($module) . '>' . $GLOBALS['_LANG'][$module] . '</a>';
            
            // 如果存在分类
            if ($class) {
                $cat_name = is_numeric($class) ? $this->get_one("SELECT cat_name FROM " . $this->table($module) . " WHERE cat_id = '$class'") : $GLOBALS['_LANG'][$class];
                
                // 如果存在标题
                if ($title) {
                    $category = '<b>></b><a href=' . $this->rewrite_url($module, $class) . '>' . $cat_name . '</a>';
                } else {
                    $category = "<b>></b>$cat_name";
                }
            }
            
            // 如果存在标题
            if ($title)
                $title = '<b>></b>' . $title;
            
            $ur_here = $main . $category . $title;
        }
        
        return $ur_here;
    }
    
    /**
     * +----------------------------------------------------------
     * 标题
     * +----------------------------------------------------------
     * $module 模块名称
     * $class 分类ID或模块子栏目
     * $title 信息标题
     * +----------------------------------------------------------
     */
    function page_title($module, $class = '', $title = '') {
        // 如果是单页面，则只执行这一句
        if ($module == 'page') {
            $titles = $title . ' | ';
        } elseif ($module) {
            // 模块名称
            $main = $GLOBALS['_LANG'][$module] . ' | ';
            
            // 如果存在分类
            if ($class) {
                $cat_name = is_numeric($class) ? $this->get_one("SELECT cat_name FROM " . $this->table($module) . " WHERE cat_id = '$class'") : $GLOBALS['_LANG'][$class];
                $cat_name = $cat_name . ' | ';
            }
            
            // 如果存在标题
            if ($title)
                $title = $title . ' | ';
            
            $titles = $title . $cat_name . $main;
        }
        
        $page_title = ($titles ? $titles . $GLOBALS['_CFG']['site_name'] : $GLOBALS['_CFG']['site_title']);
        
        return $page_title;
    }
    
    /**
     * +----------------------------------------------------------
     * 判断是否是移动客户端
     * +----------------------------------------------------------
     */
    function is_mobile() {
        static $is_mobile;
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        
        if (isset($is_mobile))
            return $is_mobile;
        
        if (empty($user_agent)) {
            $is_mobile = false;
        } else {
            // 移动端UA关键字
            $mobile_agents = array (
                    'Mobile',
                    'Android',
                    'Silk/',
                    'Kindle',
                    'BlackBerry',
                    'Opera Mini',
                    'Opera Mobi' 
            );
            $is_mobile = false;
            
            foreach ($mobile_agents as $device) {
                if (strpos($user_agent, $device) !== false) {
                    $is_mobile = true;
                    break;
                }
            }
        }
        
        return $is_mobile;
    }
    
    /**
     * +----------------------------------------------------------
     * 信息提示
     * +----------------------------------------------------------
     * $text 提示的内容
     * $url 提示后要跳转的网址
     * $time 多久时间跳转
     * +----------------------------------------------------------
     */
    function dou_msg($text, $url = '', $time = 3) {
        if (!$text) {
            $text = $GLOBALS['_LANG']['dou_msg_success'];
        }
        
        /* 获取meta和title信息 */
        $GLOBALS['smarty']->assign('page_title', $GLOBALS['_CFG']['site_title']);
        $GLOBALS['smarty']->assign('keywords', $GLOBALS['_CFG']['site_keywords']);
        $GLOBALS['smarty']->assign('description', $GLOBALS['_CFG']['site_description']);
        
        /* 初始化导航栏 */
        $data = $this->fetch_array_all($this->table('nav'), 'sort ASC');
        $GLOBALS['smarty']->assign('nav_top_list', $this->get_nav('top'));
        $GLOBALS['smarty']->assign('nav_middle_list', $this->get_nav('middle'));
        $GLOBALS['smarty']->assign('nav_bottom_list', $this->get_nav('bottom'));
        
        /* 初始化数据 */
        $GLOBALS['smarty']->assign('ur_here', $GLOBALS['_LANG']['dou_msg']);
        $GLOBALS['smarty']->assign('text', $text);
        $GLOBALS['smarty']->assign('url', $url);
        $GLOBALS['smarty']->assign('time', $time);
        
        // 根据跳转时间生成跳转提示
        $cue = preg_replace('/d%/Ums', $time, $GLOBALS['_LANG']['dou_msg_cue']);
        $GLOBALS['smarty']->assign('cue', $cue);
        
        $GLOBALS['smarty']->display('dou_msg.dwt');
        
        exit();
    }
	function admin_check($user_id, $shell, $action_list = ALL) {
        if (!defined('NO_CHECK')) {
            if ($row = $this->admin_state($user_id, $shell)) {
                $this->admin_ontime(10800);
                if (is_array($row)) {
                    $user = array (
                            'user_id' => $row['user_id'],
                            'user_name' => $row['user_name'],
                    		'group_id' => $row['group_id'],
                    		'nick_name' => $row['nick_name'],
                    		'mobile' => $row['mobile'],
                    		'status' => $row['status'],
                    		'job_id' => $row['job_id'],
                    		'sex' => $row['sex'],
                            'email' => $row['email'],
                            'action_list' => $row['action_list'] 
                    );
                    
                    return $user;
                }
            } 
        }
    }
	 /**
     * +----------------------------------------------------------
     * 登录超时默认为3小时(10800秒)
     * +----------------------------------------------------------
     */
    function admin_ontime($timeout = '10800') {
        $ontime = $_SESSION[DOU_UID]['ontime'];
        $cur_time = time();
        if ($cur_time - $ontime > $timeout) {
            unset($_SESSION[DOU_UID]);
        } else {
            $_SESSION[DOU_UID]['ontime'] = time();
        }
    }
	  /**
     * +----------------------------------------------------------
     * 用户状态
     * +----------------------------------------------------------
     */
    function admin_state($user_id, $shell) {
        $query = $this->select($this->table('admin'), '*', '`user_id` = \'' . $user_id . '\'');
        $user = $this->fetch_array($query);
        
        // 如果$user则开始比对$shell值
        $check_shell = is_array($user) ? $shell == md5($user['user_name'] . $user['password'] . DOU_SHELL) : FALSE;
        
        // 如果比对$shell吻合，则返回会员信息，否则返回空
        return $check_shell ? $user : NULL;
    }

    /**
     * +----------------------------------------------------------
     * 获取栏目菜单
     * +----------------------------------------------------------
     * $table 模块名
     * $parent_id 默认获取一级导航
     * $current_module 当前页面模型名称，用于高亮导航栏
     * $current_id 当前页面栏目ID
     * +----------------------------------------------------------
     */
    function get_home_category($module, $parent_id = 0, $current_module = '', $current_id = '', $current_parent_id = '') {

        $nav = array ();
        $data = $this->fetch_array_all($this->table('blog_category'), 'sort ASC');
        $i = 2;
        foreach ((array) $data as $value) {
            $cats[$value['cat_id']] = $value;
            // 根据$parent_id和$type筛选父级导航
            if ($value['parent_id'] == $parent_id) {
                if($value['custom_url']){
                    $value['url'] = $value['custom_url'];
                }else{
                    $value['url'] = $this->rewrite_url($module, $value['cat_id']);
                }

                $value['cur'] = $this->dou_current($value['module'], $value['cat_id'], $current_module, $current_id, $current_parent_id);


                foreach ($data as $child) {
                    // 筛选下级导航
                    if ($child['parent_id'] == $value['id']) {
                        $value['child'] = $this->get_category($module, $value['cat_id']);
                        break;
                    }
                }
                $value['index'] = $i++;
                $nav[] = $value;
            }
        }

        return array($nav,$cats);
    }

    /**
     * +----------------------------------------------------------
     * 获取博客栏目菜单
     * +----------------------------------------------------------
     * $table 模块名
     * $parent_id 默认获取一级导航
     * $current_module 当前页面模型名称，用于高亮导航栏
     * $current_id 当前页面栏目ID
     * +----------------------------------------------------------
     */
    function get_blog_category($module, $parent_id = 0, $current_module = '', $current_id = '', $current_parent_id = '') {

        $nav = array ();
        $data = $this->fetch_array_all($this->table('blog_category'), 'sort ASC');
        $i = 2;
        foreach ((array) $data as $value) {
            $cats[$value['cat_id']] = $value;
            // 根据$parent_id和$type筛选父级导航
            if ($value['parent_id'] == $parent_id) {
                if($value['custom_url']){
                    $value['url'] = $value['custom_url'];
                }else{
                    $value['url'] = $this->rewrite_url($module, $value['cat_id']);
                }

                $value['cur'] = $this->dou_current($value['module'], $value['cat_id'], $current_module, $current_id, $current_parent_id);


                foreach ($data as $child) {
                    // 筛选下级导航
                    if ($child['parent_id'] == $value['cat_id']) {
                        if($child['custom_url']){
                            $child['url'] = $child['custom_url'];
                        }else{
                            $child['url'] = $this->rewrite_url($module, $child['cat_id']);
                        }
                        $value['child'][] = $child;

                    }
                }
                $value['index'] = $i++;
                $nav[] = $value;
            }
        }

        return array($nav,$cats);
    }
}
?>