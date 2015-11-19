<?php

/**
 * OA系统
 * 
 * 网站初始化基类
 * 
 * 所有动作所需要的元素的初始化配置
 *
 * BuildTime 2010-3-30
 *
 * @since Ver 0.1
 * @package /
 * @author YuanHao <yuanhao@thinksky.org>
 * @copyright Copyright (c) 2010  by FerryGame.Com
 * @license GNU General Public License (GPL)
 * @website http://ferrygame.com
 */
 

class init {
	
	/**
	 * 数据库PDO对象
	 * @var object 
	 */
	protected $dbh;
	
	public $tab_name;
	
	public $s_name;
	public $lang;
	public $shop_name;
	public $dbconfig;
	
	public $conn;
	/**
	 * 系统配置文件
	 * @var Array 
	 */
	
	public $sysConfig = 'config.inc.php';
	
	/**
	 * 电邮相关配置
	 * @var array
	 */
	protected  $mailAddress;
	
	/**
	 * 系统参数
	 * @var Array
	 */
	protected $sysVar;

	/**
	 * 初始化系统基类，加载所有系统开销所需要的各种配置
	 * 包括数据库配置，常用路径的地址
	 * 
	 * @param $sysConfig 系统配置信息
	 * @return 
	 */
	
	function __construct() 
	{
		
		/**
		 * 载入系统配置
		 */
		
		include($this->sysConfig);
		//echo $this->sysConfig ;
		//$this->mailAddress = $config['mail'];
		
		if(isset($_GET['lang'])) {
			$url=explode("&lang=",$_SERVER['REQUEST_URI']);
			js_redir($url[0]);
		}
		include('languages/'.$_SESSION['lang'].'/common.php');
		$this->lang=$_LANG;
		
		
		$this->tab_name = $table_pre;
		
		$this->sysVar = array(
		'template' => MANAGE_TEMPLATE,
		'lib' => MANAGE_LIB,
		'mod' => MANAGE_MOD,
		'port'=> PORT,
		'pageWidth' => $page_width,
		'sysDelay' => $sysDelay,
		'cookie_pre' => $cookie_pre,
		'cookieLifeTime' =>3600,
			);
		$this->s_name=$cookie_life_time;
		$this->shop_name=$shop_name;
		//过期时间
		$this->sysVar['cookieLifeTime'] = time()+24*60*60;
		//$this->sysVar['doorAction'] = $config['doorAction'];
		
		//这边的数据库的名字和连接信息在config.inc.php中定义
		$this->conn = mysql_connect($host,$user,$password);
		mysql_select_db($dbName);
		mysql_query('set names utf8',$this->conn);
		
		$this->dbconfig=$this->inside_config();
	}
	function table_name($name){
		$ls= $this->tab_name.$name;
		return $ls;
	}
	/**
	 * 写入cookie信息
	 * 
	 * @param $cookie_value
	 * @param $cookie_name
	 */
	
	function writeCookie($cookie_value,$cookie_name)
	{
		
		
		
		//$isCookie = cookie($cookie_name,$cookie_value,$this->sysVar['cookieLifeTime'],DOMAIN_NAME);
		//echo $this->sysVar['cookieLifeTime'];
		
		try{
			
			setCookie($this->shop_name."[".$cookie_name."]",$cookie_value,$this->sysVar['cookieLifeTime'],'/',DOMAIN_NAME);
			
		}catch(Exception $e) {
			print $e->getMessage();
			exit;
		}
		
		
		
		return true;
	}
	
	/**
	 * 写入session信息
	 * 
	 * @param $session_value
	 * @param $session_name
	 */ 
	 
	function writeSession($session_value,$session_name,$session_time=0)
	{ 
		if($session_time!=0){
			$sessiont=$session_time;
		}else{
			$sessiont=$this->s_name;
		}
		try {
			session_set_cookie_params($sessiont);
			@session_start(); 
			$_SESSION[$this->shop_name][$session_name]=$session_value; 
			session_write_close();
		}catch(Exception $e) {
			print $e->getMessage();
			exit;
		} 
		
		return true;
	}
	
	/**
	 * 得到session信息
	 * 
	 * @param $session_name
	 */ 
	function getSession($session_name)
	{ 
		try {
			session_start(); 
			if(isset($_SESSION[$this->shop_name][$session_name])) { 
				 return $_SESSION[$this->shop_name][$session_name];
			}else {
				 return false;
			}
			session_write_close();
		}catch(Exception $e) {
			print $e->getMessage();
			exit;
		} 
		
		
	}
	
	/**
	 * 删除session信息
	 * 
	 * 
	 */ 
	function destorySession()
	{ 
		try {
			session_start();
			session_unset();
			session_destroy();
		}catch(Exception $e) {
			print $e->getMessage();
			exit;
		}  
	}
	
	/**
	 * 
	 * 设置模板
	 * 
	 * @param $tmpName 		模板名
	 * @param $isContent	输出模板到页面，还是输出到字符串 
	 * @return boolen
	 */
	function getTemplate($tmpName,$isContent=false)
	{
		if(!$isContent) {
			$tmpPath = $this->sysVar['template'].$tmpName.'.php';
			include_once($tmpPath);
			return true;
		}else {
			
		}
		
		
	}
	function isset_cookie(){
			if(!isset($_COOKIE[$this->shop_name]['userName'])&&empty($_SESSION[$this->shop_name]['userName'])){
				js_redir('index.php?a=login&m=login');
			}
		}
	/**
	 * 转义字符
	 * 
	 * @param $specChar		需要被转义的字符
	 * @return unknown_type
	 */
	public function specifyChar($specChar)
	{
		return addslashes(htmlspecialchars($specChar));
	}
	
	/**
	 * 
	 * @param $revUser 收件用户群
	 * @param $subject 邮件标题
	 * @param $tmpName 所使用的邮件模板
	 */
	function mailTo($revUser,$subject,$tmpName,$content,$debug=false)
	{
		
		include($this->sysVar['mod'].'mail/smtp.php');
		
		$mail = new ferrySmtp($this->sysVar['lib'].'mailer/class.phpmailer.php');
		
		$mail->MailTemplate($tmpName,$content);
		
		if($debug) {
			return $mail->mail_content;
		}else {
			$mail->Send($revUser,$subject);
		}
		
		
		return true;
	}
	
	function c_tree($cat_id=0){
		$sql="select c.*,i.cat_name, COUNT(s.cat_id) AS has_children ".
			" from ".$this->table_name('category')." as c ".
			"left join ".$this->table_name('category')." as s on s.parent_id=c.cat_id ".
			"left join ".$this->table_name('category_i8n')." as i on i.cat_id=c.cat_id ".
			" where i.i8n='".$_SESSION[$this->shop_name]['b_lang']."' ".
			" GROUP BY c.cat_id ".
			" order by c.parent_id asc,c.order_by asc";
		$cate=getFetchAll($sql,$this->conn);
		
		$options=$this->cat_options($cat_id,$cate);
		$children_level = 99999; //大于这个分类的将被删除
	    if ($is_show_all == false)
	    {
	        foreach ($options as $key => $val)
	        {
	            if ($val['level'] > $children_level)
	            {
	                unset($options[$key]);
	            }
	            else
	            {
	                if ($val['is_show'] == 0&&false)
	                {
	                    unset($options[$key]);
	                    if ($children_level > $val['level'])
	                    {
	                        $children_level = $val['level']; //标记一下，这样子分类也能删除
	                    }
	                }
	                else
	                {
	                    $children_level = 99999; //恢复初始值
	                }
	            }
	        }
	    }

	    /* 截取到指定的缩减级别 */
	    if ($level > 0)
	    {
	        if ($cat_id == 0)
	        {
	            $end_level = $level;
	        }
	        else
	        {
	            $first_item = reset($options); // 获取第一个元素
	            $end_level  = $first_item['level'] + $level;
	        }

	        /* 保留level小于end_level的部分 */
	        foreach ($options AS $key => $val)
	        {
	            if ($val['level'] >= $end_level)
	            {
	                unset($options[$key]);
	            }
	        }
	    }
	    return $options;
	}
	/*排序分类树*/
	function cat_options($spec_cat_id, $arr)
	{
	    static $cat_options = array();

	    if (isset($cat_options[$spec_cat_id]))
	    {
	        return $cat_options[$spec_cat_id];
	    }
	    if (!isset($cat_options[0]))
	    {
	        $level = $last_cat_id = 0;
	        $options = $cat_id_array = $level_array = array();

	            while (!empty($arr))
	            {
	                foreach ($arr AS $key => $value)
	                {
	                    $cat_id = $value['cat_id'];
	                    if ($level == 0 && $last_cat_id == 0)
	                    {
	                        if ($value['parent_id'] > 0)
	                        {
	                            break;
	                        }

	                        $options[$cat_id]          = $value;
	                        $options[$cat_id]['level'] = $level;
	                        $options[$cat_id]['id']    = $cat_id;
	                        $options[$cat_id]['name']  = $value['cat_name'];
	                        unset($arr[$key]);

	                        if ($value['has_children'] == 0)
	                        {
	                            continue;
	                        }
	                        $last_cat_id  = $cat_id;
	                        $cat_id_array = array($cat_id);
	                        $level_array[$last_cat_id] = ++$level;
	                        continue;
	                    }

	                    if ($value['parent_id'] == $last_cat_id)
	                    {
	                        $options[$cat_id]          = $value;
	                        $options[$cat_id]['level'] = $level;
	                        $options[$cat_id]['id']    = $cat_id;
	                        $options[$cat_id]['name']  = $value['cat_name'];
	                        unset($arr[$key]);

	                        if ($value['has_children'] > 0)
	                        {
	                            if (end($cat_id_array) != $last_cat_id)
	                            {
	                                $cat_id_array[] = $last_cat_id;
	                            }
	                            $last_cat_id    = $cat_id;
	                            $cat_id_array[] = $cat_id;
	                            $level_array[$last_cat_id] = ++$level;
	                        }
	                    }
	                    elseif ($value['parent_id'] > $last_cat_id)
	                    {
	                        break;
	                    }
	                }

	                $count = count($cat_id_array);
	                if ($count > 1)
	                {
	                    $last_cat_id = array_pop($cat_id_array);
	                }
	                elseif ($count == 1)
	                {
	                    if ($last_cat_id != end($cat_id_array))
	                    {
	                        $last_cat_id = end($cat_id_array);
	                    }
	                    else
	                    {
	                        $level = 0;
	                        $last_cat_id = 0;
	                        $cat_id_array = array();
	                        continue;
	                    }
	                }

	                if ($last_cat_id && isset($level_array[$last_cat_id]))
	                {
	                    $level = $level_array[$last_cat_id];
	                }
	                else
	                {
	                    $level = 0;
	                }
	            }
	      
	        $cat_options[0] = $options;
	    }
	    else
	    {
	        $options = $cat_options[0];
	    }

	    if (!$spec_cat_id)
	    {
	        return $options;
	    }
	    else
	    {
	        if (empty($options[$spec_cat_id]))
	        {
	            return array();
	        }

	        $spec_cat_id_level = $options[$spec_cat_id]['level'];

	        foreach ($options AS $key => $value)
	        {
	            if ($key != $spec_cat_id)
	            {
	                unset($options[$key]);
	            }
	            else
	            {
	                break;
	            }
	        }

	        $spec_cat_id_array = array();
	        foreach ($options AS $key => $value)
	        {
	            if (($spec_cat_id_level == $value['level'] && $value['cat_id'] != $spec_cat_id) ||
	                ($spec_cat_id_level > $value['level']))
	            {
	                break;
	            }
	            else
	            {
	                $spec_cat_id_array[$key] = $value;
	            }
	        }
	        $cat_options[$spec_cat_id] = $spec_cat_id_array;

	        return $spec_cat_id_array;
	    }
	}
	
	/*获取配置文件内容*/
	function inside_config(){
		$dbconfig='';
		$sql="select * from ".$this->table_name("config")." where type='1' order by order_by asc";
		$products=getFetchAll($sql,$this->conn);
		if(!empty($products)){
			foreach($products as $k=>$v){
				$dbconfig[$v['con_name']]=$v['con_value'];
			}
		}
		
		return $dbconfig;
	}
	function get_all_goods(){
		$sql="select * from ".$this->table_name("goods")." as a left join ".$this->table_name('goods_i8n')." as i on i.goods_id=a.goods_id where i.i8n='".$_SESSION[$this->shop_name]['b_lang']."' order by a.order_by asc";
		$products=getFetchAll($sql,$this->conn);
		return $products;
	}
	function get_all_article(){
		$sql="select * from ".$this->table_name("article")." as a left join ".$this->table_name('article_i8n')." as i on i.art_id=a.art_id where i.i8n='".$_SESSION[$this->shop_name]['b_lang']."' order by a.order_by asc";
		$products=getFetchAll($sql,$this->conn);
		return $products;
	}
	
	//base function
	
	function base(){
		/*底部菜单*/
		$sql="select * from ".$this->table_name("menu")." as a left join ".$this->table_name('menu_i8n')." as i on i.menu_id=a.menu_id where a.type='down' and i.i8n='".$_SESSION['lang']."' and a.is_show='1' order by a.order_by asc";
		$products['down']=getFetchAll($sql,$this->conn);
		/*左侧推荐分享文章*/
		$sql="select * from ".$this->table_name("article_i8n")." as ai ".
				" left join ".$this->table_name("article")." as a on a.art_id=ai.art_id ".
				" left join ".$this->table_name("img")." as im on a.art_id=im.type_id ".
				" where ai.i8n='".$_SESSION['lang']."' and a.cat_id='12' and im.type='A' order by a.edit_time desc LIMIT 0, 2";
		$products['share']=getFetchAll($sql,$this->conn);
		/*系统参数*/
		$products['config']=$this->dbconfig;
		if($products['config']['show']!='show'){
			echo '404';die;
		}
		//pr($this->dbconfig);
		/*左侧文章对应菜单变化文字*/
		$sql="select * from ".$this->table_name("menu")." as a left join ".$this->table_name('menu_i8n')." as i on i.menu_id=a.menu_id and i.i8n='".$_SESSION['lang']."' and a.is_show='1' order by a.order_by asc";
		$products['left']=getFetchAll($sql,$this->conn);
		
		
		
		return $products;
	//	pr($products);die;
	}
	function url_rewrite($url){
		
		if($this->dbconfig['url_rewrite']=='true'){
			//echo $url;
			$a1=explode("?",$url);
			$s1=str_replace(".php","",$a1[0]);
			if(strpos($a1[1],"&amp;")){
				$a2=explode("&amp;",$a1[1]);
			}else{
				$a2=explode("&",$a1[1]);
			}
			if(!empty($a2)){
				$turl=$s1;
				foreach($a2 as $k=>$v){
					$a3=explode("=",$v);
					$turl.="-".$a3[0]."-".$a3[1];
					
				}
				$turl.=".htm";
			}else{
				$turl=$s1.".htm";
			}
			
			$new_url= $turl;
		}else{
			$new_url= $url;
		}
		
		return $new_url;
	}
	/**
	*发送邮件
	*$maildetail 标题内容 (收件人地址$maildetail['user_email'],收件人姓名$maildetail['user_name'],邮件台头$maildetail['subject'],邮件详细$maildetail['body'])
	*/
	function for_sm($maildetail){
		
				$con=$this->inside_config();
				include("./lib/phpmailer/class.phpmailer.php");
				
				$mail = new PHPMailer();
				$mail->CharSet="utf-8";
				$mail->IsSMTP();
				$mail->SMTPSecure="ssl";
				$mail->Host = "smtp.gmail.com"; // SMTP servers
				$mail->Port = 465;
				$mail->SMTPAuth = true; // turn on SMTP authentication
				$mail->IsHTML(true);//开启html格式
				
				$mail->Username = $con['out_put_email']; // SMTP username
				$mail->Password = $con['out_put_password']; // SMTP password
				//$mail->SMTPDebug  = 2; 
				
				$mail->From = $con['company_email']; //从哪里发来
				$mail->FromName = $con['company_name']; //从哪里发来
				
				$mail->AddAddress($maildetail['user_email'],$maildetail['user_name']); //收件人地址
				$mail->AddReplyTo($con['company_email'],$con['company_name']); //对方可回复对象.
				
				$mail->Subject = $maildetail['subject'];
				$mail->Body = $maildetail['body']; //邮件正文
				//$data['con']=$mail;
				return $mail->Send();
	}
	/*发送邮件 end*/
}
