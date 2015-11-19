<?php

class config extends init
{
	function __construct()
	{
		parent::__construct();
		
		/**
		 * 获得请假类型数组表,将请假类型表的请假类型，转换成对应的不同类型
		 */
		
		//var_dump($_COOKIE);
	}
	
	function index(){
			$this->isset_cookie();
			
			$sql="select * from ".$this->table_name('config')." ";
			$config=getFetchAll($sql,$this->conn);
		//	pr($config);die;
			$tmpPath = $this->sysVar['template'].'admin/show_config_detail.php';
			include($tmpPath);
		}
	function edit_config(){
			$this->isset_cookie();
			$d=date("Y-m-d H:i:s");
			//pr($_POST);die;
				if(!empty($_POST)){
					foreach($_POST as $k=>$v){
						$sql="update ".$this->table_name('config')." set type='".$v."' where con_name='{$k}'";
						$a=mysql_query($sql,$this->conn);
					}
				}
				if($a){
					js_redir('index.php?a=admin&m=main_right');
				}else{
					js_alert('修改失败，请联系系统管理员');
				}
		
		}
	
}