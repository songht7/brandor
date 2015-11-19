<?php

class user extends init
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
			$page=$_GET['page'];
			if(!isset($_GET['page'])){
				$page=1;
			}
			$perpagenum=$_GET['perpagenum'];
			if(!isset($_GET['perpagenum'])){
				$perpagenum = 20;//定义每页显示几条	
			}
			$order=$_GET['type'].'.'.$_GET['order'];
			if(!isset($_GET['order'])){
				$order = 'a.user_id';//排序	
			}
			
			$by=$_GET['by'];
			if(!isset($_GET['by'])){
				$by = 'desc';//排序	
			}
			if($by=="asc"){
				$bys="desc";
			}else{
				$bys="asc";
			}
			
			
			$sql="select count(*) as c from ".$this->table_name('user')." ";
			$total=getFetchAll($sql,$this->conn);
			$Total=$total[0]['c'];
			$Totalpage = ceil($Total/$perpagenum);
			$startnum = ($page-1)*$perpagenum;
			$sql="select * from ".$this->table_name('user')." as a order by ".$order." $by limit $startnum,$perpagenum";
			$products=getFetchAll($sql,$this->conn);
			//pr($products);
			$tmpPath = $this->sysVar['template'].'admin/show_user.php';
			include($tmpPath);
		}
		
	function show_user_detailed(){
			$this->isset_cookie();
			require_once('lib/fckeditor/fckeditor.php');
			if(isset($_GET['id'])){
				$act='edit';
				$id=$_GET['id'];
				$sql="select * from ".$this->table_name('user')." where user_id='{$id}'";
				$product=getFetchAll($sql,$this->conn);
				//pr($product);
			}else{
				$act='add';
				//js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
			}
			$tmpPath = $this->sysVar['template'].'admin/show_user_detailed.php';
			include($tmpPath);
		}
		
	function edit_user(){
			$this->isset_cookie();
			if(isset($_GET['id'])&&$_POST['act']=='edit'){
				$id=$_GET['id'];
				if(!empty($_POST['password'])){
					$psd=" password='".md5($_POST['password'])."',";
				}
				
				$sql="update ".$this->table_name('user')." set ".
							" user_name='".$_POST['user_name']."',".
							" user_email='".$_POST['user_email']."',".
							" user_family_name='".$_POST['user_family_name']."',".
							" user_given_name='".$_POST['user_given_name']."',".
							$psd.
							" age='".$_POST['age']."',".
							" brithday='".$_POST['brithday']."',".
							" address='".$_POST['address']."',".
							" phone='".$_POST['phone']."',".
							" mobile_phone='".$_POST['mobile_phone']."',".
							" postcode='".$_POST['postcode']."',".
							" country='".$_POST['country']."',".
							" state='".$_POST['state']."',".
							" city='".$_POST['city']."',".
							" i8n='".$_POST['i8n']."',".
							" edit_by='".$_SESSION[$this->shop_name]['h_id']."' ".
						" where user_id=".$id." ";
				//pr($sql);die;
				$a=mysql_query($sql,$this->conn);
				if($a){
					$this->index();
				}else{
					js_alert('修改失败，请联系系统管理员');
				}
			}else if($_POST['act']=='add'){
				$d=date("Y-m-d H:i:s");
				$sql="insert into ".$this->table_name('user')."(".
							"user_name,user_email,user_family_name,user_given_name,password,age,brithday,address,phone,mobile_phone,postcode,country,state,city,i8n,add_by,add_time,edit_by ".
						") values(".
							"'".$_POST['user_name']."','".$_POST['user_email']."','".$_POST['user_family_name']."','".$_POST['user_given_name']."','".md5($_POST['password'])."','".$_POST['age']."','".$_POST['brithday']."','".$_POST['address']."','".$_POST['phone']."','".$_POST['mobile_phone']."','".$_POST['postcode']."','".$_POST['country']."','".$_POST['state']."','".$_POST['city']."','".$_POST['i8n']."','".$_SESSION[$this->shop_name]['h_id']."','".$d."','".$_SESSION[$this->shop_name]['h_id']."'".
						")";
				$a=mysql_query($sql,$this->conn);
				$art_id=mysql_insert_id();
				$sql="insert into ".$this->table_name('address')." (user_id,address,district,city,code,consignee,consignee_tel,type)values(".$art_id.",'".$_POST['address']."','".$_POST['state']."','".$_POST['city']."','".$_POST['postcode']."','".$_POST['user_family_name']." ".$_POST['user_given_name']."','".$_POST['phone']."','1')";
				$b=mysql_query($sql,$this->conn);
				if($a){
					$this->index();
				}else{
					js_alert('添加失败，请联系系统管理员');
				}
			}else{
				js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
			}
		}
	
	function del_user(){
			$this->isset_cookie();
			if(isset($_GET['id'])){
				$id=$_GET['id'];
				$sql="delete from ".$this->table_name('article')." where art_id='{$id}'";
				$a=mysql_query($sql,$this->conn);
				if($a)
				$this->index();
				else
				js_alert('删除失败，请联系系统管理员');
			}
			else {
					js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
				}
		}
	function address_book(){
			$this->isset_cookie();
			if(isset($_GET['id'])){
				$id=$_GET['id'];
				$sql="select * from ".$this->table_name('user')." where user_id='{$id}'";
				$product=getFetchAll($sql,$this->conn);
				$sql="select * from ".$this->table_name('address')." where user_id='".$id."' ";
				$products=getFetchAll($sql,$this->conn);
				//pr($products);
				$tmpPath = $this->sysVar['template'].'admin/show_address_detailed.php';
				include($tmpPath);
			}else{
				js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
			}
	}
	function favorite(){
			$this->isset_cookie();
			if(isset($_GET['id'])){
				$id=$_GET['id'];
				$sql="select * from ".$this->table_name('user')." where user_id='{$id}'";
				$product=getFetchAll($sql,$this->conn);
				$sql="select *,f.add_time as los from ".$this->table_name('favorite')." as f ".
					"left join ".$this->table_name('goods')." as g on f.goods_id=g.goods_id ".
					"left join ".$this->table_name('goods_i8n')." as i on f.goods_id=i.goods_id  where f.user_id='".$id."' and i.i8n='".$_SESSION[$this->shop_name]['b_lang']."' ";
				$products=getFetchAll($sql,$this->conn);
				//pr($products);
				$tmpPath = $this->sysVar['template'].'admin/show_favorite_detailed.php';
				include($tmpPath);
			}else{
				js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
			}
	}
}