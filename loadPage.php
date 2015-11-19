<?php
	//$data['error']=false;
	if(isset($_POST['loadTo'])&&$_POST['loadTo']=="home"){
		$data['title']="Home";
		$data['pageMain']="Home Page";
		$data['error']=true;
	}
	if(isset($_POST['loadTo'])&&$_POST['loadTo']=="about"){
		$data['title']="About";
		$data['pageMain']="About Us";
		$data['error']=true;
	}
	print_r(json_encode($data));
?>