<?php

class img extends init
{
	function __construct()
	{
		parent::__construct();
		
		/**
		 * 获得请假类型数组表,将请假类型表的请假类型，转换成对应的不同类型
		 */
		
		
		
		/*sql
CREATE TABLE `aich_img` (
`i_id` int( 11 ) NOT NULL AUTO_INCREMENT COMMENT 'imgid',
`title` varchar( 255 ) NOT NULL COMMENT 'imgtitle',
`img_src` varchar( 255 ) NOT NULL COMMENT 'img图片路径',
`detail` varchar( 255 ) DEFAULT NULL COMMENT 'img详细描述',
`createdate` datetime NOT NULL COMMENT '创建时间',
`updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
`url` varchar( 255 ) DEFAULT NULL COMMENT 'img连接路径',
`type` int( 11 ) NOT NULL COMMENT '是否显示：1，显示；0，不显示',
PRIMARY KEY ( `i_id` )
) ENGINE = MYISAM DEFAULT CHARSET = utf8;
		*/
		//var_dump($_COOKIE);
	}
	
	function index(){
			isset_cookie();
			$page=$_GET['page'];
			if(!isset($_GET['page'])){
				$page=1;
			}
			$perpagenum = 20;//定义每页显示几条	
			$sql="select count(*) as c from aich_img";
			$total=getFetchAll($sql,$this->conn);
			$Total=$total[0]['c'];
			$Totalpage = ceil($Total/$perpagenum);
			$startnum = ($page-1)*$perpagenum;
			$sql="SELECT * FROM aich_img order by i_id desc limit $startnum,$perpagenum";
			$orders=getFetchAll($sql,$this->conn);
			$tmpPath = $this->sysVar['template'].'admin/show_img.php';
			include($tmpPath);
		}
	
		
	function add_img_page(){
			isset_cookie();
			require_once('lib/fckeditor/fckeditor.php');
			$tmpPath = $this->sysVar['template'].'admin/add_img_page.php';
			include($tmpPath);
		}
	
	function add_img_post(){
			isset_cookie();
			if(isset($_POST['title'])){
				$title=$this->specifyChar($_POST['title']);
				$url=$this->specifyChar($_POST['url']);
				$edit_doc=$this->specifyChar($_POST['edit_doc']);
		        $detail=$this->specifyChar($_POST['detail']);
		        $c_t=date("Y-m-d H:i:s");
		        if($edit_doc=="1"){
					require_once(MANAGE_MOD.'uploaded_file.php');
					$path="/data/img_doc/";
					$doc_src=uploaded_file('aich_product','doc_src','file_url',$path);
				}else{
					$doc_src="";
				}
				$sql="insert into aich_img(title,url,img_src,detail,createdate,type) values('{$title}','{$url}','{$doc_src}','{$detail}','{$c_t}',0)";
				$a=mysql_query($sql,$this->conn);
				if($a)
				$this->index();
				else
				js_alert('添加失败，请联系系统管理员');
				}
			else {
					js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
				}
		}

	function show_img_detailed(){
			isset_cookie();
			if(isset($_GET['id'])){
				require_once('lib/fckeditor/fckeditor.php');
				$id=$_GET['id'];
				$sql="SELECT * FROM aich_img where i_id='{$id}'";
				$product=getFetchAll($sql,$this->conn);
				$tmpPath = $this->sysVar['template'].'admin/show_img_detailed.php';
				include($tmpPath);
			}
			else {
					js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
				}
		}
		
	function edit_img(){
			isset_cookie();
			if(isset($_GET['f_id'])){
				$f_id=$_GET['f_id'];
				$title=$this->specifyChar($_POST['title']);
				$url=$this->specifyChar($_POST['url']);
				$edit_doc=$this->specifyChar($_POST['edit_doc']);
		        $detail=$this->specifyChar($_POST['detail']);
		        if($edit_doc=="1"){
					require_once(MANAGE_MOD.'uploaded_file.php');
					$path="/data/img_doc/";
					$doc_src=uploaded_file('aich_product','doc_src','file_url',$path);
					$sql_i="img_src='{$doc_src}',";
				}else{
					$sql_i="";
				}
				
				$sql_o="update aich_img ".
						"set title='{$title}', ".
							"url='{$url}',".$sql_i." ".
							"detail='{$detail}' ".
						"where i_id='{$f_id}' ";
				$o=mysql_query($sql_o,$this->conn);
				//echo $sql_o;
				if($o){
					$this->index();
				}else{
					js_alert('订单flash失败，请联系系统管理员');
				}
			}else{
				js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
			}
		}
	function edit_img_type(){
			isset_cookie();
			if(isset($_GET['id'])){
				$f_id=$_GET['id'];
		        $type=$_GET['type'];
		       
				$sql_o="update aich_img  ".
						"set type='{$type}' ".
						"where i_id='{$f_id}'";
				$o=mysql_query($sql_o,$this->conn);
				if($o){
					$this->index();
				}else{
					js_alert('订单flash失败，请联系系统管理员');
				}
			}else{
				js_alert_redir('登录错误请重新再试','index.php?a=main&m=login');
			}
		}
	
	function del_img(){
			isset_cookie();
			if(isset($_GET['id'])){
				$id=$_GET['id'];
				$sql="delete from aich_img where i_id='{$id}'";
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