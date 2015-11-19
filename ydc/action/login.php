<?php
/**
 * 用户登录
 *
 *
 * 
 *
 * PHP version 5
 *
 * @category   
 * @package    
 * @author     Yuan Hao <yuanhao@thinksky.org>
 * @copyright  
 * @license    
 * @version    0.1
 * @link
 *       
 */

class login extends init
{

	function __construct()
	{
		parent::__construct();
		
	}
	
	/**
	 * 
	 * 用户登录界面显示
	 * 
	 */
	function login()
	{
		$this->getTemplate('login',false);
	}
	
	/**
	 * 
	 * 用户登录提交
	 * 
	 */
	function loginPost()
	{
		if(
			isset($_POST['t_username']) &&
			isset($_POST['t_password'])
		){
			/**
			 * $this->specifyChar 类中自带的字符过滤
			 */
			$t_username=$this->specifyChar($_POST['t_username']);
			$t_password=md5($this->specifyChar($_POST['t_password']));
			$sql="select *,count(*) as num from ".$this->table_name('administrator_had')." where h_name='".$t_username."' and h_password='".$t_password."' ";
			$sod=getFetchAll($sql,$this->conn);
			/*pr($sql);die;*/
			if($sod[0]['num']=='1'&&($sod[0]['power']==0||$sod[0]['power']==2)){
				$this->writeSession($sod[0]['h_name'],"userName");
				$this->writeSession($sod[0]['h_id'],"h_id");
				if($_POST['get_c']=='on'){
					$this->writeCookie($sod[0]['h_name'],"userName");
					$this->writeCookie($sod[0]['h_id'],"h_id");
				}
				$this->writeCookie('zh_tw',"b_lang");
				$this->writeSession('zh_tw',"b_lang");
				/*pr($_POST);
				pr($_COOKIE);
				pr($_SESSION);die;*/
				echo "<script>parent.location.href='index.php?a=admin&m=index';</script>";
				exit;		
			}else{
				js_alert_redir('密码错误,请重新再试','index.php?a=login&m=login');
				exit;
			}
		}else{
			js_alert_redir('不能为空,请重新再试','index.php?a=login&m=login');
			exit;
		}
	}
	
	function logOff(){
		$this->writeCookie("","userName");
		$this->destorySession();
		echo "<script>parent.location.href='index.php?a=login&m=login';</script>";
	}
	
}
