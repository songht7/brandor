<?php
/**
 * 用户登录
 *
 *
 * 
 *
 * PHP version 5
 *
 * @category   
 * @package    
 * @author     Yuan Hao <yuanhao@thinksky.org>
 * @copyright  
 * @license    
 * @version    0.1
 * @link
 *       
 */

class main extends init
{

	function __construct()
	{
		parent::__construct();
		js_redir('index.php?a=home&m=index');
	}
}