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
	<a class="first" onclick="javascript:parent.mainFrame.location.href='index.php?a=category&m=show_category_detail&id=29'" href="javascript:void(0);" >Home</a>
</div>
<div class="title">
	<a class="first" onclick="javascript:parent.mainFrame.location.href='index.php?a=category&m=show_category_detail&id=21'" href="javascript:void(0);" >PRODUCTS</a>
	<div class="title sub_title">
		<a class="second" onclick="javascript:parent.mainFrame.location.href='index.php?a=product&m=index&id=21'" href="javascript:void(0);" >- LIST</a>
	</div>
</div>
<div class="title">
	<a class="first" onclick="javascript:parent.mainFrame.location.href='index.php?a=category&m=show_category_detail&id=25'" href="javascript:void(0);" >SPECIAL ORDER</a>
	<div class="title sub_title">
		<a class="second" onclick="javascript:parent.mainFrame.location.href='index.php?a=product&m=index&id=25'" href="javascript:void(0);" >- LIST</a>
	</div>
</div>
<div class="title">
	<a class="first" onclick="javascript:parent.mainFrame.location.href='index.php?a=category&m=show_category_detail&id=26'" href="javascript:void(0);" >BRAND</a>
	<div class="title sub_title">
		<a class="second" onclick="javascript:parent.mainFrame.location.href='index.php?a=product&m=index&id=26'" href="javascript:void(0);" >- LIST</a>
	</div>
</div>
<div class="title">
	<a class="first" onclick="javascript:parent.mainFrame.location.href='index.php?a=category&m=show_category_detail&id=27'" href="javascript:void(0);" >COLUMN</a>
	<div class="title sub_title">
		<a class="second" onclick="javascript:parent.mainFrame.location.href='index.php?a=product&m=index&id=27'" href="javascript:void(0);" >- LIST</a>
	</div>
</div>
<div class="title">
	<a class="first" onclick="javascript:parent.mainFrame.location.href='index.php?a=category&m=show_category_detail&id=28'" href="javascript:void(0);" >NEWS</a>
	<div class="title sub_title">
		<a class="second" onclick="javascript:parent.mainFrame.location.href='index.php?a=product&m=index&id=28'" href="javascript:void(0);" >- LIST</a>
	</div>
</div>
<div class="title">
	<a class="first" onclick="javascript:parent.mainFrame.location.href='index.php?a=news&m=show_news_detail&id=20'" href="javascript:void(0);" >CONTACT</a>
</div>

</body>
</html>