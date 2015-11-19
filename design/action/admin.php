<?php

class admin extends init
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
		
		$this->getTemplate('admin/main',false);
	}
	function main_top()
	{
		$this->isset_cookie();	
		$this->getTemplate('admin/top',false);
	}
	
	function main_right()
	{
		$this->isset_cookie();	
		$this->getTemplate('admin/right',false);
	}
	
	function main_left()
	{
		$this->isset_cookie();	
		$this->getTemplate('admin/left',false);
	}
}