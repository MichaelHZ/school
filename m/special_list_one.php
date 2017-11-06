<?php
define('IN_DOUCO', true);

require(dirname(__FILE__) . '/include/init.php');
// 验证并获取合法的ID，如果不合法将其设定为-1
$cat_id = $firewall->get_legal_id('article_category', $_REQUEST ['id'], $_REQUEST ['unique_id']);

$get_cat = $dou->get_top_three_cats($cat_id);


$cat_id = $get_cat ['child']['cat_id'];

// 面包屑导航
$sql = "SELECT id,nav_name,parent_id FROM " . $dou->table('nav') . " WHERE guide = '$cat_id' and type='middle'";
$one = $dou->get_row($sql);



$sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table('article_category') . " WHERE cat_id = '{$get_cat['root']['cat_id']}' ";
$query = $dou->query($sql);
$root = $dou->fetch_array($query);
$root ['url'] = $url = $dou->rewrite_url('article_category', $get_cat ['root']['cat_id']);
$sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table('article_category') . " WHERE cat_id = '{$get_cat['two']['cat_id']}' ";
$query = $dou->query($sql);
$two = $dou->fetch_array($query);
$two ['url'] = $url = $dou->rewrite_url('article_category', $get_cat ['two']['cat_id']);
$sql = "SELECT cat_id, cat_name, parent_id,template FROM " . $dou->table('article_category') . " WHERE cat_id = '{$get_cat['child']['cat_id']}' ";

$query = $dou->query($sql);
$child = $dou->fetch_array($query);

$smarty->assign('cat_root', $root);
$smarty->assign('cat_two', $two);
$smarty->assign('cat_child', $child);
// 获取分类信息

$cate_info = $child;

// 赋值给模板-meta和title信息
$smarty->assign('page_title', $dou->page_title('article_category', $cat_id));
$smarty->assign('keywords', $cate_info ['keywords']);
$smarty->assign('description', $cate_info ['description']);

// 赋值给模板-导航栏
$smarty->assign('nav_top_list', $dou->get_nav('top'));
$smarty->assign('nav_middle_list', $dou->get_nav('middle', '0', 'article_category', $cat_id, $cate_info ['parent_id']));
$smarty->assign('nav_bottom_list', $dou->get_nav('bottom'));

// 赋值给模板-数据
$smarty->assign('ur_here', $dou->ur_here('article_category', $cat_id));
$smarty->assign('cate_info', $cate_info);



$smarty->assign('article_category',$dou->get_category('article_category', 0, $get_cat ['child']['cat_id']));
// var_dump($get_cat);
$smarty->assign('get_cat', $get_cat);
$smarty->assign('cat_id', $cat_id);

if(empty($child['template'])){
    $dou->dou_msg('模版信息错误', ROOT_URL);
}


if($child['template'] == 'research_list'){

    if(!empty($_REQUEST['sid'])){

        // 课研列表二
        $smarty->assign('article_list',listTwo('research_category','research'));
    }else{
        // 课研列表一
        $smarty->assign('article_list',listOne('research_category'));
    }
}elseif($child['template'] == 'special_list'){
    if(!empty($_REQUEST['sid'])){
        // 特课列表二
        $smarty->assign('article_list',listTwo('special_category','special'));
    }else{
        // 特课列表一
        $smarty->assign('article_list',listOne('special_category'));
    }
}




if(!empty($_REQUEST['sid'])){
    $smarty->display('special_list_two.dwt');
}else{
    $smarty->display('special_list_one.dwt');
}


function listOne($categoryTable){
    global $check,$cat_id,$dou,$_DISPLAY,$_REQUEST;

    $where = ' WHERE parent_id = 0 ';
    $page = $check->is_number($_REQUEST ['page']) ? trim($_REQUEST ['page']) : 1;

    $show_list = $_DISPLAY ['article'] ? $_DISPLAY ['article'] : 10;
    $limit = $dou->special_pager($categoryTable, ($show_list), $page, $dou->rewrite_special_url('special_list_one', $cat_id), $where);


    $sql = "SELECT * FROM " . $dou->table($categoryTable) . $where . " ORDER BY sort  asc" . $limit;

    $query = $dou->query($sql);
    $article_list= array();
    while ($row = $dou->fetch_array($query)) {


        $url = $dou->rewrite_special_url('article_category',$cat_id, $row ['cat_id']);

        $where = ' WHERE parent_id != 0 and parent_id = '."'".$row['cat_id']."'";

        $sql = "SELECT * FROM " . $dou->table($categoryTable) . $where . " ORDER BY sort  asc" . $limit;

        $querysub = $dou->query($sql);

        $sublist = array();
        while ($rowsub = $dou->fetch_array($querysub)) {

            $tmp['title'] = $rowsub['cat_name'];
            $tmp['description'] = $rowsub['description'];
            $tmp['url'] = $url .'&cid='.$rowsub['cat_id'];
            $sublist[] = $tmp;
        }

        $article_list[] = array(
            'url' => $url,
            'title' => $row['cat_name'],
            'description' => $row['description'],
            'child' => $sublist
        );

    }


    return $article_list;
}

function listTwo($categoryTable,$articleTable){
    global $smarty,$_REQUEST,$dou,$cat_id;

    $where = ' WHERE cat_id = '."'".$_REQUEST['sid']."'";

    $cat_name = $dou->get_one("SELECT cat_name FROM " . $dou->table($categoryTable) . $where);



    $cat_list = array(
        'title' => $cat_name,
        'backUrl' => $dou->rewrite_special_url('special_list_two',$cat_id)

    );

    $where = ' WHERE parent_id != 0 and parent_id = '."'".$_REQUEST['sid']."'";

    $sql = "SELECT * FROM " . $dou->table($categoryTable) . $where . " ORDER BY sort  asc";

    $query = $dou->query($sql);

    $smarty->assign('article_list_sid',get_special_article_list($categoryTable,$articleTable,$cat_id,$_REQUEST['sid']));


    $sublist = array();
    $index = 1;
    while ($row = $dou->fetch_array($query)) {
        $tmp['cat_id'] = $row['cat_id'];
        $tmp['title'] = $row['cat_name'];
        $tmp['index'] = $index++;
        $sublist[] = $tmp;
    }
    $cat_list['child'] =$sublist;

    $smarty->assign('cat_list',$cat_list);

}



function get_special_article_list($categoryTable,$articleTable,$cat_id,$special_id)
{
    global $dou;

    if ($special_id == -1) {
        $dou->dou_msg($GLOBALS ['_LANG'] ['page_wrong'], ROOT_URL);
    } else {
        $where = ' WHERE cat_id IN (' . $special_id . $dou->dou_child_id_special($categoryTable, $special_id) . ')' ;
    }
    /* 获取文章列表 */
    $sql = "SELECT id, title, content, image, cat_id, add_time, click, description,ctype,keywords,custom_url FROM " . $dou->table($articleTable) . $where . " ORDER BY add_time  DESC";


    $query = $dou->query($sql);
    while ($row = $dou->fetch_array($query)) {
        $url = $dou->rewrite_special_url('special', $cat_id,$row ['id']);
        $add_time = date("Y-m-d", $row ['add_time']);
        $add_time_short = date("m-d", $row ['add_time']);
        $image = $row ['image'] ? ROOT_URL . $row ['image'] : '';

        // 如果描述不存在则自动从详细介绍中截取
        $description = $row ['description'] ? $row ['description'] : $dou->dou_substr($row ['content'], 200, false);

        $article_list[$row['cat_id']] [] = array(
            "id" => $row ['id'],
            "cat_id" => $row ['cat_id'],
            "title" => $row ['title'],
            "image" => $image,
            "add_time" => $add_time,
            "add_time_short" => $add_time_short,
            "click" => $row ['click'],
            "description" => $description,
            "ctype" => $row ['ctype'],
            "keywords" => $row ['keywords'],
            "url" => $row['custom_url'] ? $row['custom_url'] : $url
        );
    }


    return $article_list;
}