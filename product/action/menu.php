<?php

class menu extends init
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
			$sql="select count(*) as c from ".$this->table_name('menu')." as a left join ".$this->table_name('menu_i8n')." as i on i.menu_id=a.menu_id where i.i8n='".$_SESSION[$this->shop_name]['b_lang']."' ";
			$total=getFetchAll($sql,$this->conn);
			$Total=$total[0]['c'];
			
			$products=$this->m_tree(0,$_SESSION[$this->shop_name]['b_lang']);
			
			$tmpPath = $this->sysVar['template'].'admin/show_menu.php';
			include($tmpPath);
		}
	function show_menu_detailed(){
			$this->isset_cookie();
			
			$mm=$this->m_tree(0,$_SESSION[$this->shop_name]['b_lang']);
			require_once('lib/fckeditor/fckeditor.php');
			
			if(isset($_GET['productid'])){
				$act="edit";
				
				$productid=$_GET['productid'];
				
				$sql="select * from ".$this->table_name('menu')." where menu_id='{$productid}'";
				$product=getFetchAll($sql,$this->conn);
				
				$sql="select * from ".$this->table_name('img')." where type_id='{$productid}' and type='M' order by order_by asc";
				$img=getFetchAll($sql,$this->conn);
				//pr($product);
				$sql="select * from ".$this->table_name('menu_i8n')." where menu_id='{$productid}' order by i8n asc";
				$products=getFetchAll($sql,$this->conn);
				
				preg_match_all('#id=(.*)#i',$product['0']['link'],$title); 
				preg_match_all('#type=(.*)#i',$product['0']['link'],$title2); 
				$type=$product['0']['link_type'];
				//pr($title2);
				if($type=="article"){
					$dat=$this->get_all_article();
					if(!empty($dat)){foreach($dat as $k=>$v){
						$selected="";
						if($title['1'][0]==$v['art_id']){$selected=" selected ";}
						$data['data'].='<option '.$selected.' value="index.php?a=home&m=article&aid='.$v['art_id'].'">'.$v['art_name'].'</option>';
					}}
				}else if($type=="category"){
					$dat=$this->c_tree();
					$data['data']='<option value="index.php?a=home&m=category">all category</option>';
					if(!empty($dat)){foreach($dat as $k=>$v){
						$selected="";
						$space="";
						for($i=0;$i<$v['level'];$i++){$space.="-";}
						if($title['1'][0]==$v['cat_id']){$selected=" selected ";}
						if($title2['1'][0]==$v['cat_name']){$selected=" selected ";}
						
						if($v['type']=='A'){
							$data['data'].='<option '.$selected.' value="index.php?a=home&m=category&cid='.$v['cat_id'].'">'.$space.$v['cat_name'].'</option>';
						}else if($v['type']=='G'){
							$data['data'].='<option '.$selected.' value="index.php?a=home&m=wines&type='.$v['cat_name'].'">'.$space.$v['cat_name'].'</option>';
						}
					}}
				}else if($type=="goods"){
					$dat=$this->get_all_goods();
					if(!empty($dat)){foreach($dat as $k=>$v){
						$selected="";
						if($title['1'][0]==$v['goods_id']){$selected=" selected ";}
						$data['data'].='<option '.$selected.' value="index.php?a=home&m=goods&gid='.$v['goods_id'].'">'.$v['goods_name'].'</option>';
					}}
				}
			}else{
				$act="add";
			}
			$tmpPath = $this->sysVar['template'].'admin/show_menu_detailed.php';
			include($tmpPath);
		}
		
	function edit_menu(){
			$this->isset_cookie();
			
			require_once(MANAGE_MOD.'uploaded_file.php');
			$path="/data/menu_doc/";
			$doc_src=uploaded_m_file($this->table_name('img'),'original_src','file_url',$path);
			if($_POST['p_link']=='0'){
				$links=$this->specifyChar($_POST['goods_sn']);
			}else{
				$links=$this->specifyChar($_POST['goods_sn1']);
			}
				
			if(isset($_GET['productid'])&&$_POST['act']=='edit'){
				$productid=$_GET['productid'];
				
				$sql="update ".$this->table_name('menu')." set parent_id='".$_POST['p_id']."',type='".$_POST['parent_id']."',link_type='".$_POST['p_link']."',link='".$links."',is_show='".$_POST['is_show']."',order_by='".$_POST['order_by']."',edit_by='".$_SESSION[$this->shop_name]['h_id']."' where menu_id='{$productid}'";
				$a=mysql_query($sql,$this->conn);
				
				if(!empty($doc_src)){
					foreach($doc_src as $k=>$v){
						if($v!=""){
							$sql="insert into ".$this->table_name('img')."(type_id,type,img_title,original_src,order_by,add_by ,add_time,edit_by) values('".$productid."','M','".$this->specifyChar($_POST['img_name'][$k])."','{$v}','".$_POST['img_by'][$k]."','".$_SESSION[$this->shop_name]['h_id']."','".$d."','".$_SESSION[$this->shop_name]['h_id']."')";
							$b=mysql_query($sql,$this->conn);
						}
					}
				}
				if(!empty($_POST['edit_by'])){
					foreach($_POST['edit_by'] as $k=>$v){
						$sql="update ".$this->table_name('img')." set order_by='".$v."',img_title='".$this->specifyChar($_POST['edit_name'][$k])."' where img_id='".$k."' ";
						$c=mysql_query($sql,$this->conn);
					}
				}
				
				if($a){
					
					$sql="update ".$this->table_name('menu_i8n')." set menu_name='".$_POST['title']."',menu_detail='".$_POST['info']."' where menu_i8n_id='".$_POST['iid']."'";
					$b=mysql_query($sql,$this->conn);
					$sql="update ".$this->table_name('menu_i8n')." set menu_name='".$_POST['title_c']."',menu_detail='".$_POST['info_c']."' where menu_i8n_id='".$_POST['iid_c']."'";
					$b=mysql_query($sql,$this->conn);
					$sql="update ".$this->table_name('menu_i8n')." set menu_name='".$_POST['title_t']."',menu_detail='".$_POST['info_t']."' where menu_i8n_id='".$_POST['iid_t']."'";
					$b=mysql_query($sql,$this->conn);
					
					$this->index();
				}else{
					js_alert('修改失败，请联系系统管理员');
				}
			}else if($_POST['act']=='add'){
				$d=date("Y-m-d H:i:s");
				
				$sql="insert into ".$this->table_name('menu')."(parent_id,type,link_type,link,is_show,order_by,add_by,add_time,edit_by) values ('".$_POST['p_id']."','".$_POST['parent_id']."','".$_POST['p_link']."','".$links."','".$_POST['is_show']."','".$_POST['order_by']."','".$_SESSION[$this->shop_name]['h_id']."','".$d."','".$_SESSION[$this->shop_name]['h_id']."') ";
				$a=mysql_query($sql,$this->conn);
				$id=mysql_insert_id();
				
				if(!empty($doc_src)){
					foreach($doc_src as $k=>$v){
						if($v!=""){
							$sql="insert into ".$this->table_name('img')."(type_id,type,img_title,original_src,order_by,add_by ,add_time,edit_by) values('".$id."','M','".$this->specifyChar($_POST['img_name'][$k])."','{$v}','".$_POST['img_by'][$k]."','".$_SESSION[$this->shop_name]['h_id']."','".$d."','".$_SESSION[$this->shop_name]['h_id']."')";
							$b=mysql_query($sql,$this->conn);
						}
					}
				}
				
				if($a){
					
					$sql="insert into ".$this->table_name('menu_i8n')."(menu_id,menu_name,menu_detail,i8n) values('".$id."','".$_POST['title']."','".$_POST['info']."','en_us')";
					$b=mysql_query($sql,$this->conn);
					$sql="insert into ".$this->table_name('menu_i8n')."(menu_id,menu_name,menu_detail,i8n) values('".$id."','".$_POST['title_c']."','".$_POST['info_c']."','zh_cn')";
					$b=mysql_query($sql,$this->conn);
					$sql="insert into ".$this->table_name('menu_i8n')."(menu_id,menu_name,menu_detail,i8n) values('".$id."','".$_POST['title_t']."','".$_POST['info_t']."','zh_tw')";
					$b=mysql_query($sql,$this->conn);
					
					$this->index();
				}else{
					js_alert('添加失败，请联系系统管理员');
				}
			}else{
				js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
			}
		}
	
	function del_menu(){
			$this->isset_cookie();
			if(isset($_GET['id'])){
				$id=$_GET['id'];
				$sql="delete from ".$this->table_name('menu')." where menu_id='{$id}'";
				$a=mysql_query($sql,$this->conn);
				$sql="delete from ".$this->table_name('menu_i8n')." where menu_id='{$id}'";
				$a=mysql_query($sql,$this->conn);
				
				$sql="select * from ".$this->table_name('img')." where type_id='{$id}' and type='M'";
				$product=getFetchAll($sql,$this->conn);
				if(!empty($product)){
					foreach($product as $k=>$v){
						@unlink('.'.$v['original_src']);
					}
				}
				$sql="delete from ".$this->table_name('img')." where type_id='{$id}' and type='M'";
				$a=mysql_query($sql,$this->conn);
				
				if($a)
				$this->index();
				else
				js_alert('删除失败，请联系系统管理员');
			}else{
				js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
			}
	}
	function del_picture(){
			$this->isset_cookie();
			if(!empty($_POST)){
				$id=$_POST['id'];
				$data['id']=$id;
				$sql="select * from ".$this->table_name('img')." where img_id='{$id}'";
				$product=getFetchAll($sql,$this->conn);
				if(!empty($product)){
					foreach($product as $k=>$v){
						@unlink('.'.$v['original_src']);
					}
				}
				$sql="delete from ".$this->table_name('img')." where img_id='{$id}'";
				$a=mysql_query($sql,$this->conn);
				
				if($a){
					$data['say']="ok";
				}else{
					$data['say']="error";
				}
				die(json_encode($data));
			}else{
				$data['say']="error";
				die(json_encode($data));
			}
	}
	function get_p_link(){
			$this->isset_cookie();
			if(!empty($_POST)){
				$type=$_POST['p_link'];
				$data['data']='';
				if($type=="article"){
					$dat=$this->get_all_article();
					if(!empty($dat)){foreach($dat as $k=>$v){
						$data['data'].='<option value="index.php?a=home&m=article&id='.$v['art_id'].'">'.$v['art_name'].'</option>';
					}}
				}else if($type=="category"){
					$dat=$this->c_tree();
					$data['data']='<option value="index.php?a=home&m=category">all category</option>';
					if(!empty($dat)){foreach($dat as $k=>$v){
						$space="";
						for($i=0;$i<$v['level'];$i++){$space.="-";}
						if($v['type']=='A'){
							$data['data'].='<option value="index.php?a=home&m=category&cid='.$v['cat_id'].'">'.$space.$v['cat_name'].'</option>';
						}else if($v['type']=='G'){
							$data['data'].='<option value="index.php?a=home&m=wines&type='.$v['cat_name'].'">'.$space.$v['cat_name'].'</option>';
						}
						
					}}
				}else if($type=="goods"){
					$dat=$this->get_all_goods();
					if(!empty($dat)){foreach($dat as $k=>$v){
						$data['data'].='<option value="index.php?a=home&m=goods&id='.$v['goods_id'].'">'.$v['goods_name'].'</option>';
					}}
				}
				
				
				
				$data['type']=$type;
				$data['say']="success";
				die(json_encode($data));
			}else{
				$data['say']="error";
				die(json_encode($data));
			}
	}
	function get_img(){
			$this->isset_cookie();
			if(!empty($_POST)){
				$id=$_POST['id'];
				$data['id']=$id;
				$sql="select * from ".$this->table_name('img')." where type_id='{$id}' and type='M'";
				$img=getFetchAll($sql,$this->conn);
				if($img){
					$data['img']=$img;
					foreach($img as $k=>$v){
						$html.='
		    			<tr>
		    				<td><a href="javascript:void(0)" class="del" id="'.$v['img_id'].'" onclick="ajax_del(this)">-</a></td>
		            		<td valign="center" align="center" height="100" width="100"><img style="max-width:100px;max-height:100px;" src=".'.$v['original_src'].'" /></td>
		            		<td>排序:<br /><INPUT TYPE="text" style="width:20px;" NAME="edit_by['.$v['img_id'].']" value="'.$v['order_by'].'"></td>
		            		<td>图片名:<br /><INPUT TYPE="text" style="width:145px;" NAME="edit_name['.$v['img_id'].']" value="'.$v['img_title'].'"></td>
		            	';
		            	if($v['point']==0){
							$html.='
		            		<td><a href="javascript:void(0)" class="del" id="'.$v['img_id'].'" onclick="set_top(this)">设为封面</a></td>
		            		';
		            	}else{
							$html.='
		            		<td>当前封面</td>
		            		';
		            	}
		            	$html.='
		            	</tr>
		            	';
	            	}
	            	$data['html']=$html;
					$data['say']="ok";
				}else{
					$data['say']="error";
				}
				die(json_encode($data));
			}else{
				$data['say']="error";
				die(json_encode($data));
			}
	}
	function set_top(){
			$this->isset_cookie();
			if(!empty($_POST)){
				$id=$_POST['id'];
				$data['id']=$id;
				$sql="select type_id from ".$this->table_name('img')." where img_id='{$id}'";
				//pr($sql);
				$product=getFetchRow($sql,$this->conn);
				
				$sql="update ".$this->table_name('img')." set point='0' where type_id='".$product['type_id']."' and type='M'";
				$a=mysql_query($sql,$this->conn);
				//pr($sql);
				$sql="update ".$this->table_name('img')." set point='1' where img_id='{$id}'";
				//pr($sql);
				$a=mysql_query($sql,$this->conn);
				
				if($a){
					$data['say']="ok";
				}else{
					$data['say']="error";
				}
				die(json_encode($data));
			}else{
				$data['say']="error";
				die(json_encode($data));
			}
	}
}