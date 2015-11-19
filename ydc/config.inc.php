<?php

/*
 *  常规系统设定 
 * 
 */

$page_width = 20;
$sysDelay = 2; 										//系统延迟的秒数
$shop_name = 'YIDECHENG'; 										//商店名称
$cookie_pre = ''; 									//定义cookie的头部信息
$cookie_life_time = 60*60*24; 							//cookie存活的时间&session


/*
 * 系统目录信息
 * 
 */



/*
 * 网站信息 
 * 
 */
define('DOMAIN_NAME','127.0.0.1');


//define('DOMAIN_NAME','10.0.1.40');
define('PORT','80');
date_default_timezone_set('Asia/Shanghai');




/*
 * 电邮设置,基本常用几个用户组 
 * 
 */



/*
 * 数据库设定
 * 
 */

$table_pre ='ydc_'; //
$dbms='mysql';     //数据库类型 
$host='bdm-004.hichina.com'; //数据库主机名
$dbName='bdm0040224_db';    //使用的数据库
$user='bdm0040224';      //数据库连接用户名
$password='brandor0975';          //对应的密码



include('common.php');

?>
