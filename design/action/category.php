<?php

class category extends init
{
	function __construct()
	{
		parent::__construct();
		
		/**
		 * 获得请假类型数组表,将请假类型表的请假类型，转换成对应的不同类型
		 */
		
		//var_dump($_COOKIE);
	}

	function show_category_detail(){
			$this->isset_cookie();
			if(isset($_GET['id'])){
				
				$id=$_GET['id'];
				$sql="select * from ".$this->table_name('category')." where cat_id='{$id}'";
				$product=getFetchAll($sql,$this->conn);
				
				$sql="select * from ".$this->table_name('img')." where type_id='{$id}' and type='C' order by i8n asc";
				$img=getFetchAll($sql,$this->conn);
				if(!empty($img)){
					foreach($img as $k=>$v){
						$imgs[$v['img_id'].'-'.$v['i8n']]=$v;
					}
				}
				//pr($img);
				$sql="select * from ".$this->table_name('category_i8n')." where cat_id='{$id}' order by i8n asc";
				$products=getFetchAll($sql,$this->conn);
				if(!empty($products)){
					foreach($products as $k=>$v){
						$v['detail_arr']=explode('":;"',$v['cat_detail']);
						$pro[$v['i8n']]=$v;
					}
				}
				
				$tmpPath = $this->sysVar['template'].'admin/show_category_detailed.php';
				include($tmpPath);
			}else {
				js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
			}
		}
		
	function edit_category(){
			$this->isset_cookie();
			if(isset($_GET['id'])){
				$id=addslashes($_GET['id']);
				$sql="update ".$this->table_name('category')." set edit_by='".$_SESSION[$this->shop_name]['h_id']."'  where cat_id='{$id}'";
				$a=mysql_query($sql,$this->conn);
				
				require_once(MANAGE_MOD.'uploaded_file.php');
				$path="/data/category_doc/";
				$doc_src=uploaded_m_file($this->table_name('img'),'original_src','file_url',$path);
				if(!empty($_POST['edit_doc'])){
					foreach($_POST['edit_doc'] as $k=>$v){
						$sql="select * from ".$this->table_name('img')." where img_id='".$_POST['img_id'][$k]."' ";
						$img_b=getFetchAll($sql,$this->conn);
						if(!empty($img_b)){
							if($v==1){
								$img_sql=" , original_src='".$doc_src[$k]."' ";
								@unlink('.'.$img_b[0]['original_src']);
							}else{
								$img_sql="";
							}
							$sql="update ".$this->table_name('img')." set original_link='".$_POST['original_link'][$k]."',is_show='".$_POST['is_showi'][$k]."',edit_by='".$_SESSION[$this->shop_name]['h_id']."' ".$img_sql." where img_id='".$_POST['img_id'][$k]."' ";
						}else{
							if($v==1){
								$img_sql=",original_link";
								$img_sql1=",'".$doc_src[$k]."'";
							}else{
								$img_sql="";
								$img_sql1="";
							}
							$sql="insert into ".$this->table_name('img')."(type_id,type,original_link".$img_sql.",is_show,add_by ,add_time,edit_by) values('".$id."','C','".$_POST['original_link'][$k]."'".$img_sql1.",'".$_POST['is_showi'][$k]."','".$_SESSION[$this->shop_name]['h_id']."','".$d."','".$_SESSION[$this->shop_name]['h_id']."')";
								
						}
						$c=mysql_query($sql,$this->conn);
						
					}
				}
				
				if($a){
					if(!empty($_POST['detail'])){
						foreach($_POST['detail'] as $k=>$v){
							$art_detail=addslashes(implode('":;"',$v));
							$sql="update ".$this->table_name('category_i8n')." set cat_detail='".$art_detail."'  where cat_i8n_id='".$_POST['iid'][$k]."'";
							$b=mysql_query($sql,$this->conn);
						}
					}
					
					js_redir('index.php?a=admin&m=main_right');
				}else{
					js_alert('修改失败，请联系系统管理员');
				}
			}
			else {
					js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
				}
		}
	
	function dates_inbetween($date1, $date2){

	    $day = 60*60*24;
//pr($date1);
	    $date1 = strtotime($date1);
	    $date2 = strtotime($date2);
//pr($date1);die;
	    $days_diff = round(($date2 - $date1)/$day); // Unix time difference devided by 1 day to get total days in between

	    $dates_array = array();

	    $dates_array[] = date('Y-m-d',$date1);
	    
	    for($x = 1; $x < $days_diff; $x++){
	        $dates_array[] = date('Y-m-d',($date1+($day*$x)));
	    }

	    $dates_array[] = date('Y-m-d',$date2);

	    return $dates_array;
	}
}