<?php
/*
 * 加载常用类库
 * 
 */
	/*关闭魔术引号（加速）*/
if (get_magic_quotes_gpc()) {
    function stripslashes_deep($value)
    {
        $value = is_array($value) ?
                    array_map('stripslashes_deep', $value) :
                    stripslashes($value);

        return $value;
    }

    $_POST = array_map('stripslashes_deep', $_POST);
    $_GET = array_map('stripslashes_deep', $_GET);
    $_COOKIE = array_map('stripslashes_deep', $_COOKIE);
    $_REQUEST = array_map('stripslashes_deep', $_REQUEST);
}
//include(MANAGE_LIB.'/page.class.php'); 
//include(MANAGE_LIB.'/fckeditor/fckeditor.php');

/*
* 系统常量
* 
*/

	define('DEFAULT_ACTION','main');
	define('DEFAULT_ACTION_PATH','action/');


/*
 * 系统目录信息
 * 
 */

	define('MANAGE_TEMPLATE','template/');

	define('MANAGE_LIB','lib/');
	define('MANAGE_MOD','mod/'); 


/**
 * 初始化系统类
 */	
 	 //判断语言
	session_start();
	if(isset($_GET['lang'])) {
			$_SESSION['lang'] = $_GET['lang'];
		}
	else if(empty($_SESSION['lang'])){
		$_SESSION['lang']="en_us";
	}
	include 'default.php';

//include_once 'common.php';

/**
 * 对应的过程名
 * @var unknown_type
 */
	if(isset($_GET['a'])) {
		$action = $_GET['a'];
	}else {
		$action = null;
	}
/**
 * 对应的模块名
 * @var unknown_type
 */
	if(isset($_GET['m'])) {
		$mod = $_GET['m'];
	}else {
		$mod = null;
	}

	if($action != null) {
		$include_act = DEFAULT_ACTION_PATH.$action.'.php';
	}else {
		$include_act = DEFAULT_ACTION_PATH.DEFAULT_ACTION.'.php';
		$action = DEFAULT_ACTION;
	}


//echo $include_act;exit;
	include($include_act);


//自动产生初始化类

	$actEval = "\$act = new ".$action."();";

	if(isset($mod)) {
		eval($actEval);
		$actEval = "\$act ->".$mod."();";
		eval($actEval);
	}else {
		eval($actEval);
	}
	
//echo $actEval;