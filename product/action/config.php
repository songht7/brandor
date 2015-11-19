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
			$sql="select * from ".$this->table_name('config')."  ".
			$products=getFetchAll($sql,$this->conn);
			$tmpPath = $this->sysVar['template'].'admin/show_config.php';
			include($tmpPath);
		}
	function show_config_detail(){
			$this->isset_cookie();
			if(isset($_GET['id'])){
				$act='edit';
				
				$id=$_GET['id'];
				$sql="select * from ".$this->table_name('config')." where con_id='{$id}'";
				$product=getFetchAll($sql,$this->conn);
				$sql="select * from ".$this->table_name('img')." where type_id='{$id}' and type='CON'";
				$img=getFetchRow($sql,$this->conn);
				//pr($product);
				$sql="select * from ".$this->table_name('goods_i8n')." where goods_id='{$id}' order by i8n asc";
				$products=getFetchAll($sql,$this->conn);
			}else{
				$act='add';
			}
			$tmpPath = $this->sysVar['template'].'admin/show_config_detail.php';
			include($tmpPath);
		}
		
	function edit_config(){
			$this->isset_cookie();
			$d=date("Y-m-d H:i:s");
			
			require_once(MANAGE_MOD.'uploaded_file.php');
			$path="/data/config_doc/";
			$doc_src=uploaded_file($this->table_name('img'),'original_src','file_url',$path);
			
			if($_GET['id']!=''){
				$id=$_GET['id'];
				
				$sql="update ".$this->table_name('config')." set con_name='".$_POST['con_name']."' where con_id='{$id}'";
				$a=mysql_query($sql,$this->conn);
				
				if($_POST['edit_doc']==1){
					$img_id=$_POST['img_id'];
					$sql="select * from ".$this->table_name('img')." where img_id='{$img_id}'";
					$product=getFetchAll($sql,$this->conn);
					if(!empty($product)){
						foreach($product as $k=>$v){
							@unlink('.'.$v['original_src']);
						}
					}
					$sql="delete from ".$this->table_name('img')." where img_id='{$img_id}'";
					$a=mysql_query($sql,$this->conn);

				}
				if(!empty($doc_src)){
					$sql="insert into ".$this->table_name('img')."(type_id,type,img_title,order_by,original_src,add_by ,add_time,edit_by) values('".$id."','CON','".$_POST['img_name']."','".$_POST['img_by']."','{$doc_src}','".$_SESSION[$this->shop_name]['h_id']."','".$d."','".$_SESSION[$this->shop_name]['h_id']."')";
					$b=mysql_query($sql,$this->conn);
				}
				
				if($a){
					
					js_redir('index.php?a=admin&m=main_right');
				}else{
					js_alert('修改失败，请联系系统管理员');
				}
			}else{
				js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
			}
		}
	
}