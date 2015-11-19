<?php

class news extends init
{
	function __construct()
	{
		parent::__construct();
		
		/**
		 * 获得请假类型数组表,将请假类型表的请假类型，转换成对应的不同类型
		 */
		
	}
	function show_news_detail(){
			$this->isset_cookie();
			if(isset($_GET['id'])){
				$id=$_GET['id'];
				$sql="select * from ".$this->table_name('article')." where art_id='{$id}'";
				$product=getFetchAll($sql,$this->conn);
				
				$sql="select * from ".$this->table_name('img')." where type_id='{$id}' and type='A' order by i8n asc";
				$img=getFetchAll($sql,$this->conn);
				if(!empty($img)){
					foreach($img as $k=>$v){
						$imgs[$v['img_id'].'-'.$v['i8n']]=$v;
					}
				}
				
				$sql="select * from ".$this->table_name('article_i8n')." where art_id='{$id}' order by i8n asc";
				$products=getFetchAll($sql,$this->conn);
				if(!empty($products)){
					foreach($products as $k=>$v){
						$v['detail_arr']=explode('":;"',$v['art_detail']);
						$pro[$v['i8n']]=$v;
					}
				}
				//pr($pro);
				$tmpPath = $this->sysVar['template'].'admin/show_news_detailed.php';
				include($tmpPath);
			}else{
				js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
			}
		}
		
	function edit_news(){
			$this->isset_cookie();
			if(isset($_GET['id'])){
				$id=$_GET['id'];
				$d=date("Y-m-d H:i:s");
				$sql="update ".$this->table_name('article')." set edit_by='".$_SESSION[$this->shop_name]['h_id']."'  where art_id='{$id}'";
				$a=mysql_query($sql,$this->conn);
				
				require_once(MANAGE_MOD.'uploaded_file.php');
				$path="/data/news_doc/";
				$doc_src=uploaded_m_file($this->table_name('img'),'original_src','file_url',$path);
				if(!empty($_POST['edit_doc'])){
					foreach($_POST['edit_doc'] as $k=>$v){
						if($v==1){
							$sql="select * from ".$this->table_name('img')." where img_id='".$_POST['img_id'][$k]."' ";
							$img_b=getFetchAll($sql,$this->conn);
							if(!empty($img_b)){
								@unlink('.'.$img_b[0]['original_src']);
								
								$sql="update ".$this->table_name('img')." set original_src='".$doc_src[$k]."',edit_by='".$_SESSION[$this->shop_name]['h_id']."' where img_id='".$_POST['img_id'][$k]."' ";
								$c=mysql_query($sql,$this->conn);
							}else{
								$p=explode('-',$k);
								$sql="insert into ".$this->table_name('img')."(type_id,type,original_src,add_by ,add_time,edit_by,i8n) values('".$id."','A','".$doc_src[$k]."','".$_SESSION[$this->shop_name]['h_id']."','".$d."','".$_SESSION[$this->shop_name]['h_id']."','".$p[1]."')";
								$c=mysql_query($sql,$this->conn);
							}
						}
					}
				}
				
				if($a){
					if(!empty($_POST['detail'])){
						foreach($_POST['detail'] as $k=>$v){
							$art_detail=addslashes(implode('":;"',$v));
							$sql="update ".$this->table_name('article_i8n')." set art_detail='".$art_detail."'  where art_i8n_id='".$_POST['iid'][$k]."'";
							$b=mysql_query($sql,$this->conn);
						}
					}
					//$this->index();
					js_redir('index.php?a=admin&m=main_right');
				}else{
					js_alert('修改失败，请联系系统管理员');
				}
			}else{
				js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
			}
		}
}