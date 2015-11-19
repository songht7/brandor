<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(function(){
	$(".first").click(function(){
		$(".first").removeClass('mainRed').next().hide();
		$(this).addClass('mainRed').next().show();
		$(".second").removeClass('mainRed');
	});
	$(".second").click(function(){
		$(".second").removeClass('mainRed');
		$(this).addClass('mainRed');
	});
});
</script>
<title>无标题文档</title>
</head>

<body>
<div class="title">
	<a class="first" onclick="javascript:parent.mainFrame.location.href='index.php?a=category&m=show_category_detail&id=9'" href="javascript:void(0);" >首页</a>
</div>
<div class="title">
	<a class="first" onclick="javascript:parent.mainFrame.location.href='index.php?a=category&m=show_category_detail&id=1'" href="javascript:void(0);" >品牌设计</a>
	<div class="title sub_title">
		<a class="second" onclick="javascript:parent.mainFrame.location.href='index.php?a=product&m=index&id=1'" href="javascript:void(0);" >- 列表</a>
	</div>
</div>
<div class="title">
	<a class="first" onclick="javascript:parent.mainFrame.location.href='index.php?a=category&m=show_category_detail&id=5'" href="javascript:void(0);" >新闻动态</a>
	<div class="title sub_title">
		<a class="second" onclick="javascript:parent.mainFrame.location.href='index.php?a=product&m=index&id=5'" href="javascript:void(0);" >- 列表</a>
	</div>
</div>
<div class="title">
	<a class="first" onclick="javascript:parent.mainFrame.location.href='index.php?a=category&m=show_category_detail&id=6'" href="javascript:void(0);" >品牌专栏</a>
	<div class="title sub_title">
		<a class="second" onclick="javascript:parent.mainFrame.location.href='index.php?a=product&m=index&id=6'" href="javascript:void(0);" >- 列表</a>
	</div>
</div>
<div class="title">
	<a class="first" onclick="javascript:parent.mainFrame.location.href='index.php?a=category&m=show_category_detail&id=7'" href="javascript:void(0);" >礼品活动</a>
	<div class="title sub_title">
		<a class="second" onclick="javascript:parent.mainFrame.location.href='index.php?a=product&m=index&id=7'" href="javascript:void(0);" >- 列表</a>
	</div>
</div>
<div class="title">
	<a class="first" onclick="javascript:parent.mainFrame.location.href='index.php?a=category&m=show_category_detail&id=8'" href="javascript:void(0);" >关于我们</a>
	<div class="title sub_title">
		<a class="second" onclick="javascript:parent.mainFrame.location.href='index.php?a=product&m=index&id=8'" href="javascript:void(0);" >- 列表</a>
	</div>
</div>
<div class="title">
	<a class="first" onclick="javascript:parent.mainFrame.location.href='index.php?a=news&m=show_news_detail&id=18'" href="javascript:void(0);" >联系我们</a>
</div>
<?php if($_SESSION[$this->shop_name]['h_id']==5){?>
<div class="title">
	<a class="first" onclick="javascript:parent.mainFrame.location.href='index.php?a=config&m=index'" href="javascript:void(0);" >config</a>
</div>
<?php }?>
</body>
</html>