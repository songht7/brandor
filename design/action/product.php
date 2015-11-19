<?php

class product extends init
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
			if(!empty($_GET['id'])){
				$id=$_GET['id'];
				$where=" and a.cat_id='".$id."' ";
			}
			if(!empty($_GET['page'])){
				$page=$_GET['page'];
			}else{
				$page=1;
			}
			$perpagenum = 8;//定义每页显示几条	
			
			$sql="select count(*) as c from ".$this->table_name('goods')." as a left join ".$this->table_name('goods_i8n')." as i on i.goods_id=a.goods_id where i.i8n='".$_SESSION[$this->shop_name]['b_lang']."' ".$where." ";
			$total=getFetchAll($sql,$this->conn);
			$Total=$total[0]['c'];
			$Totalpage = ceil($Total/$perpagenum);
			$startnum = ($page-1)*$perpagenum;
			$sql="select a.*,i.goods_name,i.goods_overview,i.goods_detail from ".$this->table_name('goods')." as a left join ".$this->table_name('goods_i8n')." as i on i.goods_id=a.goods_id ".
						" where i.i8n='".$_SESSION[$this->shop_name]['b_lang']."' ".$where." order by a.goods_id desc limit $startnum,$perpagenum";
			$products=getFetchAll($sql,$this->conn);
			$tmpPath = $this->sysVar['template'].'admin/show_product.php';
			include($tmpPath);
		}
	function change_show(){
			$this->isset_cookie();
			if(!empty($_POST)){
				$id=$_POST['id'];
				$data['id']=$id;
				$sql="select is_show from ".$this->table_name('goods')." where goods_id='{$id}'";
				//pr($sql);
				$product=getFetchRow($sql,$this->conn);
				if($product['is_show']=='1'){
					$is_show=0;
				}else{
					$is_show=1;
				}
				$sql="update ".$this->table_name('goods')." set is_show='".$is_show."' where goods_id='{$id}'";
				$a=mysql_query($sql,$this->conn);
				
				if($a){
					$data['say']="ok";
					$data['is_show']=$is_show;
				}else{
					$data['say']="error";
				}
				die(json_encode($data));
			}else{
				$data['say']="error";
				die(json_encode($data));
			}
		}
	function change_order(){
			$this->isset_cookie();
			if(!empty($_POST)){
				$id=$_POST['id'];
				$valbase=$_POST['val'];
				$val=addslashes(str_replace(' ','',$valbase));
				$data['id']=$id;
				if(!empty($val)){
					$sql="update ".$this->table_name('goods')." set order_by='".$val."' where goods_id='{$id}'";
					$a=mysql_query($sql,$this->conn);
				}else{
					$sql="select order_by from ".$this->table_name('goods')." where goods_id='{$id}'";
					$product=getFetchRow($sql,$this->conn);
					$val=$product['order_by'];
				}
				
				if($a){
					$data['say']="ok";
					$data['val']=$val;
				}else{
					$data['say']="error";
				}
				die(json_encode($data));
			}else{
				$data['say']="error";
				die(json_encode($data));
			}
		}
	function show_product_detail(){
			$this->isset_cookie();
			$c_id=$_GET['c_id'];
			if(isset($_GET['id'])){
				$act='edit';
				
				$id=$_GET['id'];
				$sql="select * from ".$this->table_name('goods')." where goods_id='{$id}'";
				$product=getFetchAll($sql,$this->conn);
				
				$sql="select * from ".$this->table_name('img')." where type_id='{$id}' and type='P'";
				$img=getFetchAll($sql,$this->conn);
				if(!empty($img)){
					foreach($img as $k=>$v){
						if($v['point']==0){
							$imgs_p[$v['i8n']]=$v;
						}else{
							$imgs[$v['img_id'].'-'.$v['i8n'].'-'.$v['point']]=$v;
						}
					}
				}
				//pr($imgs);die;
				$sql="select * from ".$this->table_name('goods_i8n')." where goods_id='{$id}' order by i8n asc";
				$products=getFetchAll($sql,$this->conn);
				if(!empty($products)){
					foreach($products as $k=>$v){
						$v['title']=explode('<br />',$v['goods_name']);
						$v['detail_arr']=explode('":;"',$v['goods_detail']);
						$pro[$v['i8n']]=$v;
					}
				}
			}else{
				$act='add';
				//js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
			}
			$tmpPath = $this->sysVar['template'].'admin/show_product_detailed.php';
			include($tmpPath);
		}
		
	function edit_product(){
			$this->isset_cookie();
			$d=date("Y-m-d H:i:s");
			$c_id=$_POST['c_id'];
			require_once(MANAGE_MOD.'uploaded_file.php');
			$path="/data/product_doc/";
			$doc_src=uploaded_m_file($this->table_name('img'),'original_src','file_url',$path);
			//pr($doc_src);die;
			if($_GET['id']!=''&&$_POST['act']=='edit'){
				$id=$_GET['id'];
				
				$sql="update ".$this->table_name('goods')." set is_show='".$_POST['is_show']."',edit_by='".$_SESSION[$this->shop_name]['h_id']."' where goods_id='{$id}'";
				$a=mysql_query($sql,$this->conn);
				
				if(!empty($_POST['edit_doc'])){
					foreach($_POST['edit_doc'] as $k=>$v){
						$sql="select * from ".$this->table_name('img')." where img_id='".$_POST['img_id'][$k]."' ";
						$img_b=getFetchAll($sql,$this->conn);
						if(!empty($img_b)&&$_POST['acti'][$k]=='del'){
							@unlink('.'.$img_b[0]['original_src']);
							$sql="delete from ".$this->table_name('img')." where img_id='".$_POST['img_id'][$k]."' ";
							$c=mysql_query($sql,$this->conn);
						}else if(!empty($img_b)){
							if($v==1){$src=",original_src='".$doc_src[$k]."'";@unlink('.'.$img_b[0]['original_src']);}else{$src="";}
							if(isset($_POST['is_showi'][$k])){$where=" ,is_show='".$_POST['is_showi'][$k]."'";}else{$where="";}
							$sql="update ".$this->table_name('img')." set order_by='".$_POST['order_by'][$k]."',edit_by='".$_SESSION[$this->shop_name]['h_id']."'".$where.$src." where img_id='".$_POST['img_id'][$k]."' ";
							$c=mysql_query($sql,$this->conn);
						}else{
							if($v==1){
								$p=explode('-',$k);
								if(!empty($_POST['is_show'][$k])){$where=$_POST['is_show'][$k];}else{$where="1";}
								$sql="insert into ".$this->table_name('img')."(type_id,order_by,is_show,type,original_src,add_by ,add_time,edit_by,point,i8n) values('".$id."','".$_POST['order_by'][$k]."','".$where."','P','".$doc_src[$k]."','".$_SESSION[$this->shop_name]['h_id']."','".$d."','".$_SESSION[$this->shop_name]['h_id']."','".$p[2]."','".$p[1]."')";
								$c=mysql_query($sql,$this->conn);
							}
						}
					}
				}
				if($a){
					if(!empty($_POST['detail'])){
						foreach($_POST['detail'] as $k=>$v){
							$title=addslashes(implode('<br />',$_POST['title'][$k]));
							$overview=addslashes($_POST['overview'][$k]);
							$art_detail=addslashes(implode('":;"',$v));
							$sql="update ".$this->table_name('goods_i8n')." set goods_name='".$title."',goods_overview='".$overview."',goods_detail='".$art_detail."'  where goods_i8n_id='".$_POST['iid'][$k]."'";
							
							$b=mysql_query($sql,$this->conn);
						}
					}
					js_redir('index.php?a=product&m=index&id='.$c_id);
				}else{
					js_alert('修改失败，请联系系统管理员');
				}
			}else if($_POST['act']=='add'){
				
				$sql="insert into ".$this->table_name('goods')."(cat_id,is_show,order_by,add_by,add_time,edit_by) values ('".$c_id."','".$_POST['is_show']."','50','".$_SESSION[$this->shop_name]['h_id']."','".$d."','".$_SESSION[$this->shop_name]['h_id']."') ";
				$a=mysql_query($sql,$this->conn);
				$id=mysql_insert_id();
				
				if(!empty($_POST['edit_doc'])){
					foreach($_POST['edit_doc'] as $k=>$v){
						$sql="select * from ".$this->table_name('img')." where img_id='".$_POST['img_id'][$k]."' ";
						$img_b=getFetchAll($sql,$this->conn);
						if(!empty($img_b)&&$_POST['acti'][$k]=='del'){
							@unlink('.'.$img_b[0]['original_src']);
							$sql="delete from ".$this->table_name('img')." where img_id='".$_POST['img_id'][$k]."' ";
							$c=mysql_query($sql,$this->conn);
						}else if(!empty($img_b)){
							if($v==1){$src=",original_src='".$doc_src[$k]."'";@unlink('.'.$img_b[0]['original_src']);}else{$src="";}
							if(isset($_POST['is_showi'][$k])){$where=" ,is_show='".$_POST['is_showi'][$k]."'";}else{$where="";}
							$sql="update ".$this->table_name('img')." set order_by='".$_POST['order_by'][$k]."',edit_by='".$_SESSION[$this->shop_name]['h_id']."'".$where.$src." where img_id='".$_POST['img_id'][$k]."' ";
							$c=mysql_query($sql,$this->conn);
						}else{
							if($v==1){
								$p=explode('-',$k);
								if(!empty($_POST['is_show'][$k])){$where=$_POST['is_show'][$k];}else{$where="1";}
								$sql="insert into ".$this->table_name('img')."(type_id,order_by,is_show,type,original_src,add_by ,add_time,edit_by,point,i8n) values('".$id."','".$_POST['order_by'][$k]."','".$where."','P','".$doc_src[$k]."','".$_SESSION[$this->shop_name]['h_id']."','".$d."','".$_SESSION[$this->shop_name]['h_id']."','".$p[2]."','".$p[1]."')";
								$c=mysql_query($sql,$this->conn);
							}
						}
					}
				}
				
				if($a){
					if(!empty($_POST['detail'])){
						foreach($_POST['detail'] as $k=>$v){
							$title=addslashes(implode('<br />',$_POST['title'][$k]));
							$overview=addslashes($_POST['overview'][$k]);
							$art_detail=addslashes(implode('":;"',$v));
							$sql="insert into ".$this->table_name('goods_i8n')."(goods_id,goods_name,goods_overview,goods_detail,i8n) values('".$id."','".$title."','".$overview."','".$art_detail."','".$k."')";
							$b=mysql_query($sql,$this->conn);
						}
					}
					
					js_redir('index.php?a=product&m=index&id='.$c_id);
				}else{
					js_alert('添加失败，请联系系统管理员');
				}
			}else{
				js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
			}
		}
	
	function del_product(){
			$this->isset_cookie();
			if(isset($_GET['id'])){
				$id=$_GET['id'];
				$sql="delete from ".$this->table_name('goods')." where goods_id='{$id}'";
				$a=mysql_query($sql,$this->conn);
				$sql="delete from ".$this->table_name('goods_i8n')." where goods_id='{$id}'";
				$a=mysql_query($sql,$this->conn);
				
				$sql="select * from ".$this->table_name('img')." where type_id='{$id}' and type='P'";
				$product=getFetchAll($sql,$this->conn);
				if(!empty($product)){
					foreach($product as $k=>$v){
						@unlink('.'.$v['original_src']);
					}
				}
				$sql="delete from ".$this->table_name('img')." where type_id='{$id}' and type='P'";
				$a=mysql_query($sql,$this->conn);
				
				if($a)
				$this->index();
				else
				js_alert('删除失败，请联系系统管理员');
			}else{
				js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
			}
	}
	
}