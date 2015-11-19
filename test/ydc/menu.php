<script type="text/javascript">
	//urlbase="http://127.0.0.1:8011/test/pushState/";
	title="";
	run=0;
	slide="";
	$(function(){
		var eleMenus = $(".mLink").bind("click", function(event){
			clearInterval(slide);
			var query = this.href.split("?")[1];
			var obj=$(this);
			var oldCont=$("#Main").find("#MainCont").attr("class");
			if (history.pushState && query && !obj.hasClass("clMenuOn") && !$("#MainCont").is(":animated")){
				if(run==0||run=="t"){
					$.post("loadPage.php",{loadTo:query},function(data){
						if(data.success==true){
							if($("#MainCont").length>0){
								$("#Main").append(data.pageMain);
								$("#Main").find("."+oldCont).css({"z-index":"1"}).animate({"opacity":"hide"},2000);
								$("#Main").find("."+data.title).animate({"opacity":"show"},2000,function(){
									$("#Main").find("."+oldCont).remove();
									if(data.title=="contact"){
										var mh=$("#Main").find("."+data.title).height();
										$("#Main").css("height",mh+"px");
									}
								});
							}else{
								$("#Main").html(data.pageMain);
								$("#MainCont").animate({"opacity":"show"},1500);
								if(data.title=="contact"){
									var mh=$("#Main").find("."+data.title).height();
									$("#Main").css("height",mh+"px");
								}
							}
							run="t";
							$(".mLink").removeClass("clMenuOn");
							obj.addClass("clMenuOn");
							// history处理
							title = obj.text().replace(/\d+$/, "")=="" ? data.title : obj.text().replace(/\d+$/, "");
							if(title!=""){
								title=" - "+title;
							}
							document.title = "藝德誠"+title;
							if (event && /\d/.test(event.button)) {
								history.pushState({ title: title }, title, location.href.split("?")[0] + "?" + query);
							}
						}else{
							$("#Main").html("<div style='padding:30px 0 0;text-align:center;font-size:30px;'>加載失敗！</div>");
						}
					},"JSON");
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
				if(run==0){
					isBrowser();
				}
				fnHashTrigger();
			});
			// 默认载入
			fnHashTrigger();
		}
	});
	function isBrowser(){//去除webkit对于popstate的bug
	    var Sys={};
	    var ua=navigator.userAgent.toLowerCase();
	    var s;
	    (s=ua.match(/msie ([\d.]+)/))?Sys.ie=s[1]:
	    (s=ua.match(/firefox\/([\d.]+)/))?Sys.firefox=s[1]:
	    (s=ua.match(/chrome\/([\d.]+)/))?Sys.chrome=s[1]:
	    (s=ua.match(/opera.([\d.]+)/))?Sys.opera=s[1]:
	    (s=ua.match(/version\/([\d.]+).*safari/))?Sys.safari=s[1]:0;
	    if(Sys.chrome||Sys.safari){
	        run=1;
	    }
	}

</script> 
</head>
<body id="HomePage">
	<div id="Header">
		<div class="headBox clearfix">
			<div id="Menu">
				<ul class="clearfix">
					<li class="logoBox"><a href="loadPage.php?frontpage" class="mLink" id="Logo"><img src="../images/ydc/logo.png" width="221" height="42" alt="藝德誠"/></a></li>
					<li class="first"><a href="loadPage.php?brand" class="mLink brand">Brand</a></li>
					<li><a href="loadPage.php?philosopht" class="mLink philosopht">Philosopht</a></li>
					<li><a href="loadPage.php?gift" class="mLink gift">Gift</a></li>
					<li><a href="loadPage.php?contact" class="mLink contact">Contact</a></li>
					<li class="last"><a href="javascript:void(0)" onclick="window.open('http://www.baidu.com')" target="_blank" class="mLink shop">Shop</a></li>
				</ul>
			</div>
			<div class="pageInfo"><img src="../images/ydc/pageInfo.png" width="136" height="18" alt="品，悦，礼，享" /></div>
		</div>
	</div>