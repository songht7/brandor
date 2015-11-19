<!DOCTYPE html>
<!--[if lte IE 6 ]><html class="ie ielt9 ielt8 ielt7 ie6" lang="zh-CN"><![endif]-->
<!--[if IE 7 ]><html class="ie ielt9 ielt8 ie7" lang="zh-CN"><![endif]-->
<!--[if IE 8 ]><html class="ie ielt9 ie8" lang="zh-CN"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="zh-CN"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="zh-CN"><!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>HTML5无刷修改url</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="keywords" content="艺德诚" />
		<meta name="description" content="" />
		<meta name="author" content="Songht" />
		<meta name="copyright" content="All content (c) Copyright Songht" />
	
		<link rel="stylesheet" type="text/css" href="./css/base.css" />
		<script type="text/javascript" src="./script/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="./script/html5.js"></script>
		<script type="text/javascript" src="./script/modernizr-2.6.2.js"></script>
		<script type="text/javascript">
			//urlbase="http://127.0.0.1:8011/test/pushState/";
			title="";
			$(function(){
				alert(history.pushState);
				var eleMenus = $(".mLink").bind("click", function(event){
					var query = this.href.split("?")[1];
					if (history.pushState && query && !$(this).hasClass("clMenuOn")){
						$.post("loadPage.php",{loadTo:query},function(data){
							if(data.error==true){
								$("#PageMain").html(data.title+","+data.pageMain);
								title = data.title;
							}else{
								$("#BrowserError").html("加载失败！");
							}
						},"JSON");
						// history处理
						document.title = "HTML5无刷修改url - "+title;
						if (event && /\d/.test(event.button)) {
							history.pushState({ title: title }, title, location.href.split("?")[0] + "?" + query);
						}
					}
					event.preventDefault();
					//return false;
				});

				var fnHashTrigger = function(target) {
					var query = location.href.split("?")[1], eleTarget = target || null;
					if (typeof query == "undefined") {
						if (eleTarget = eleMenus.get(0)) {
							// 如果没有查询字符，则使用第一个导航元素的查询字符内容
							history.replaceState(null, document.title, location.href.split("#")[0] + "?" + eleTarget.href.split("?")[1]) + location.hash;	
							fnHashTrigger(eleTarget);
						}
					} else {
						eleMenus.each(function() {
							if (eleTarget === null && this.href.split("?")[1] === query) {
								eleTarget = this;
							}
						});
						
						if (!eleTarget) {
							// 如果查询序列没有对应的导航菜单，去除查询然后执行回调
							history.replaceState(null, document.title, location.href.split("?")[0]);	
							fnHashTrigger();
						} else {
							$(eleTarget).trigger("click");
						}
					}
				};
				if (history.pushState) {
					window.addEventListener("popstate", function() {
						fnHashTrigger();
					});
					// 默认载入
					fnHashTrigger();
				}
			});
		</script> 
	</head>
	<body>
		<div id="Wrapper">
			<h1 style="font-size:30px;padding:0 0 15px;color:#000">html5无刷新改变url</h1>
			<a href="loadPage.php?home" class="mLink">Home</a>
			<a href="loadPage.php?about" class="mLink">About</a>
			<div id="PageMain"></div>
			<div id="BrowserError"></div>
		</div>
	</body>
</html>