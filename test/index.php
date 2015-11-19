<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="favicon.ico">
	<meta name="keywords" content="艺德诚,BRANDOR,茶" />
	<meta name="description" content="" />
	<title>BRANDOR</title>

	<link rel="stylesheet" href="./css/home.css">
	<script type="text/javascript" src="./script/jquery-1.7.1.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$(window).resize(function(){
				resize();
			});

			var winWidth=$(window).width();
			if(winWidth<=960){winWidth=960;}
			mBlockWidth=winWidth/3-1;
			//if(mBlockWidth<=240){mBlockWidth=250;}
			$("#MenuBox").css({"width":winWidth});
			$(".mBlock").css({"width":mBlockWidth});

			$(".imgRow.active").find(".conBg").css({"width":winWidth,"height":"auto"});
			$(".mBlock").hover(function(){
				obj=$(this);
				if(!obj.hasClass("active")){
					slide=setTimeout("slideShow(obj)",300);
				}
			},function(){
				clearTimeout(slide);
			});
		});
		function slideShow(obj){
			var _index=obj.index();
			$(".mBlock").removeClass("active");
			obj.addClass("active");
			$(".imgRow").animate({"opacity":"hide"},1500).removeClass("active").eq(_index).animate({"opacity":"show"},1500).addClass("active");
		}
		function resize(){
			var winWidth=$(window).width();
			var winHeight=$(window).height();
			var imgActualWidth=$("#Main").find(".active").find("img").attr("width");
			var imgActualHeight=$("#Main").find(".active").find("img").attr("height");
			//if(winWidth<=960){winWidth=960;}
			$("#Header").css({"width":winWidth});
			mBlockWidth=winWidth/3-1;
			//if(mBlockWidth<=240){mBlockWidth=250;}
			$("#MenuBox").css({"width":winWidth});
			$(".mBlock").css({"width":mBlockWidth});
			$(".imgRow.active").find(".conBg").css({"width":winWidth,"height":"auto"});

			var widthratio = winWidth/imgActualWidth;
			var heightratio = winHeight/imgActualHeight;
			
			var widthdiff = heightratio*imgActualWidth;
			var heightdiff = widthratio*imgActualHeight;

			if(heightdiff<=winHeight){
				$("#Main").find("img").css({"width":"auto","height":winHeight});
				var mW=$("#Main").find(".active").find("img").width();
				if(mW-winWidth>0){
					var _left=(mW-winWidth)/2;
					$(".imgRow").css({"left":"-"+_left+"px"});
					//$("html,body").animate({"scrollLeft":_left+"px"},1);
				}
				//$(".mBlock").eq(0).html(mW+"-"+winWidth+"="+_left);
				$("#Main,.imgRow").css({"height":winHeight,"width":winWidth,"top":"0"});
			}else{
				$("#Main").find("img").css({"width":winWidth,"height":"auto"});
				//$("#Main").css({"height":winHeight});
				var mh=$("#Main").find(".active").find("img").height();
				if(mh-winHeight>0){
					var _top=(mh-winHeight)/2;
					$(".imgRow").css({"top":"-"+_top+"px"});
					//$("html,body").animate({"scrollTop":_top+"px"},1);
				}
				//$(".mBlock").eq(1).html(mh+"-"+winHeight+"="+_top);
				$("#Main").css({"height":winHeight+"px","width":winWidth});
				$(".imgRow").css({"height":mh,"width":winWidth,"left":"0"});
			}
			//$("body").css({"min-width":mW});
		}
	</script>
</head>
<body id="HomePage">
	<!--<div id="Header">
		<a href="index.php" id="Logo"><img src="./images/logo_brandor.png" width="207" height="48" alt=""/></a>
	</div>-->
	<div id="Main">
		<div class="imgRow active"><img class="conBg" src="./images/imgs/homeImg101.jpg" width="1800" height="1100" onload="resize()" alt=""/></div>
		<div class="imgRow hide"><img class="conBg" src="./images/imgs/homeImg201.jpg" width="1800" height="1100" alt=""/></div>
		<div class="imgRow hide"><img class="conBg" src="./images/imgs/homeImg301.jpg" width="1800" height="1100" alt=""/></div>
	</div>
	<div id="MenuBox">
		<div id="Menu" class="clearfix">
			<div class="mBlock active"><a href="ydc/index.php" class="menuLink ydc" target="_blank">艺德诚</a></div>
			<div class="mBlock"><a href="gift/index.php" class="menuLink gift" target="_blank">gift</a></div>
			<div class="mBlock"><a href="brandor/index.php" class="menuLink brandor" target="_blank">BRANDOR</a></div>
		</div>
		<div id="Footer" valign="center">
			Copyright 2012-2013 brandor.net Incoprated. All rights reserved. 粤ICP备12060513号
		</div>
	</div>
</body>
</html>