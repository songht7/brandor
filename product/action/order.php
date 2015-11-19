<?php

class order extends init
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
			$perpagenum = 20;//定义每页显示几条	
			$sql="select count(*) as c from ".$this->table_name('order')." ";
			$total=getFetchAll($sql,$this->conn);
			$Total=$total[0]['c'];
			$Totalpage = ceil($Total/$perpagenum);
			$startnum = ($page-1)*$perpagenum;
			$sql="SELECT o.*,m.*
					FROM ".$this->table_name('order')." as o
					left join ".$this->table_name('user')." as m
					on o.user_id=m.user_id
					order by o.order_id desc 
					limit $startnum,$perpagenum";
			$orders=getFetchAll($sql,$this->conn);
			$tmpPath = $this->sysVar['template'].'admin/show_order.php';
			include($tmpPath);
		}
	function show_order_detailed(){
			$this->isset_cookie();
			if(isset($_GET['id'])){
				$id=$_GET['id'];
				$sql="SELECT o.*,m.*
						FROM ".$this->table_name('order')." as o
						left join ".$this->table_name('user')." as m
						on o.user_id=m.user_id
						where o.order_id='{$id}' ";
				$product=getFetchAll($sql,$this->conn);
				//pr($product);echo 1;
				$sql_d="SELECT od.*,p.*,i.*
						FROM ".$this->table_name('order_detail')." as od
						left join ".$this->table_name('goods')." as p
						on p.goods_id=od.goods_id
						left join ".$this->table_name('goods_i8n')." as i
						on p.goods_id=i.goods_id
						where od.order_id='".$id."' and i.i8n='".$_SESSION[$this->shop_name]['b_lang']."' ";
				$product_d=getFetchAll($sql_d,$this->conn);
				/*pr($product_d);
				die;*/
				$tmpPath = $this->sysVar['template'].'admin/show_order_detailed.php';
				include($tmpPath);
			}
			else {
					js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
				}
		}
		
	function edit_order(){
			$this->isset_cookie();
			if(isset($_GET['order_id'])){
				
//order
				$orderid							=$_GET['order_id'];
				$remark								=$_POST['remark'];
				$paytype							=$_POST['pay_type'];
				$paydate							=$_POST['pay_date'];
				$sendtype							=$_POST['send_type'];
				$senddate							=$_POST['send_date'];
				$type								=$_POST['type'];
//orderdetail
				$detail								=$_POST['detail'];
				
				$sql_o="update ".$this->table_name('order')." 
						set type='{$type}',
							remark='{$remark}',
							pay_type='{$paytype}',
							pay_date='{$paydate}',
							send_type='{$sendtype}',
							send_date='{$senddate}'
						where order_id='{$orderid}'";
				$o=mysql_query($sql_o,$this->conn);
				//echo $sql_o;
				if($o){
					if(!empty($detail)){
						foreach($detail as $k=>$v){
							$sql_od="update ".$this->table_name('order_detail')." set tprice='".$v['tprice']."',qty='".$v['qty']."' where order_detail_id='".$v['order_detail_id']."' ";
							//pr($sql_od);
							$od=mysql_query($sql_od,$this->conn);
							if(!$od){
								js_alert('订单明细修改失败，请联系系统管理员');
							}
						}

					}
					die;
					$this->index();
				}else{
					js_alert('订单修改失败，请联系系统管理员');
				}
			}
			else {
					js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
				}
		}
	
	function del_order(){
			$this->isset_cookie();
			if(isset($_GET['id'])){
				$id=$_GET['id'];
				$sql="delete from ".$this->table_name('order')." where order_id='{$id}'";
				$a=mysql_query($sql,$this->conn);
				$sql="delete from ".$this->table_name('order_detail')." where order_id='{$id}'";
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
	function edit_order_type(){
			$this->isset_cookie();
			if(isset($_GET['id'])){
//order
				$orderid=$_GET['id'];
				$type=$_GET['type'];
				$sql_o="update ".$this->table_name('order')." 
						set type='{$type}'
						where orderid='{$orderid}'";
				$o=mysql_query($sql_o,$this->conn);
			//	echo $sql_o;die;
				if($o){
					$this->index();
				}else{
					js_alert('订单修改失败，请联系系统管理员');
				}
			}
			else {
					js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
				}
		}
}