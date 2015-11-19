<?php include("./header.php");?>
	<script type="text/javascript">
		$(function(){
			//resize()
			$(window).resize(function(){
				resize();
			});
		});
		function resize(){
			var winWidth=$(window).width();
			var winHeight=$(window).height()-112;
			$("#Main").css("top","112px");
			var imgActualWidth=$("#Main").find(".active").find("img").attr("width");
			var imgActualHeight=$("#Main").find(".active").find("img").attr("height");
			if(winWidth<=1050){winWidth=1050;}
			$("#Header").css({"width":winWidth});

			var widthratio = winWidth/imgActualWidth;
			var heightratio = winHeight/imgActualHeight;
			
			var widthdiff = heightratio*imgActualWidth;
			var heightdiff = widthratio*imgActualHeight;

			if(heightdiff<=winHeight){
				$("#Main").find("img").css({"width":"auto","height":winHeight});
				var mW=$("#Main").find(".active").find("img").width();
				if(mW-winWidth>0){
					var _left=(mW-winWidth)/2;
					//$("#MainCont").css({"top":"-"+_top+"px"});
					$("html,body").animate({"scrollLeft":_left+"px"},1);
				}
				$("#Main,#MainCont,#SlideShow,#SlideMain").css({"height":winHeight+"px"});
			}else{
				$("#Main").find("img").css({"width":winWidth,"height":"auto"});
				//$("#Main").css({"height":winHeight});
				var mh=$("#Main").find(".active").find("img").height();
				if(mh-winHeight>0){
					var _top=(mh-winHeight)/2;
					//$("#MainCont").css({"top":"-"+_top+"px"});
					$("html,body").animate({"scrollTop":_top+"px"},1);
				}
				$("#Main,#MainCont,#SlideShow,#SlideMain").css({"height":mh+"px"});
			}
			//$("body").css({"min-width":mW});
		}
	</script>

<?php include("menu.php");?>

	<div id="Main">

	</div>
</body>
</html>