<?php

	

	

	

	// $con=mysql_connect('bdm-004.hichina.com','bdm0040224','brandor0975');

	// mysql_select_db('bdm0040224_db');
	$con=mysql_connect('127.0.0.1','','');

	mysql_select_db('ydc_company');

	mysql_query('set names utf8',$con);



	function pr($os){

		echo "<pre>";

		print_r($os);

		echo "</pre>";

	}

	function getall($sql){

		$dd=mysql_query($sql);

		while($row=mysql_fetch_assoc($dd)){

			$aso[]=$row;

		}

		return $aso;

	}

	

?>

