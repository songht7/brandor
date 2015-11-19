<?php
	$data['success']=false;
	if(isset($_POST['loadTo'])&&$_POST['loadTo']=="frontpage"){
		$data['title']="frontpage";
		$data['pageMain']='<div id="MainCont" class="frontpage">
								<div id="SlideShow">
									<div id="SlideMain">
										<ul class="slideImg clearfix">
											<li class="ssList active"><a href="javascript:void(0)"><img src="../images/ydc/home01.jpg" alt="" width="1280" height="697" onload="resize()" /></a></li>
											<li class="ssList" style="display: none;"><a href="javascript:void(0)"><img src="../images/ydc/home02.jpg" width="1280" height="697"  alt=""/></a></li>
											<li class="ssList" style="display: none;"><a href="javascript:void(0)"><img src="../images/ydc/home03.jpg" width="1280" height="697" alt=""/></a></li>
										</ul>
										<ul class="slideBt clearfix">
											<li class="ssListb current">1</li>
											<li class="ssListb ">2</li>
											<li class="ssListb ">3</li>
										</ul>
									</div>
								</div>
								<script type=text/javascript>
									$(function(){
										slide=setInterval("slideSow()",5000);
										
										$(".slideBt").mouseover(function(){
											clearInterval(slide);
										});
										$(".slideBt").mouseleave(function(){
											slide=setInterval("slideSow()",5000);
										});
										$(".ssListb").click(function(){
											var _index=$(this).index();
											$(".ssListb").removeClass("current");
											$(this).addClass("current");
											$(".ssList").animate({"opacity":"hide"},3000).removeClass("active");
											$(".ssList").eq(_index).animate({"opacity":"show"},2500).addClass("active");
										});
									});
									function slideSow(){
										var leng=$(".slideImg > li").length;
										var t=$(".slideBt > .current");
										var _index=t.index();
										if(_index==(leng-1)){
											$(".ssListb").eq(0).click();
										}
										else{
											t.next().click();
										}
									}
									
								</script>
							</div>
						';
		$data['success']=true;
	}
	if(isset($_POST['loadTo'])&&$_POST['loadTo']=="brand"){
		$data['title']="brand";
		$data['pageMain']='<div id="MainCont" class="brand">
							<div class="active">
								<span class="brandInfo pageTxt">brandInfo</span>
								<img src="../images/ydc/brand.jpg" alt="brand" width="1280" height="713"  onload="resize()" />
							</div>
							</div>';
		$data['success']=true;
	}
	if(isset($_POST['loadTo'])&&$_POST['loadTo']=="philosopht"){
		$data['title']="philosopht";
		$data['pageMain']='<div id="MainCont" class="philosopht">
								<div id="PhiBox">
									<div class="phiRow phiRow01 active">
										<div class="phi01 pageTxt"><a href="javascript:void(0)" onclick="changeImg(this,\'phiRow02\')">传承</a></div>
										<img src="../images/ydc/phi01.jpg" alt="" width="1800" height="1200" onload="resize()" />
									</div>
									<div class="phiRow phiRow02 hide">
										<div class="phi02 pageTxt"><a href="javascript:void(0)" onclick="changeImg(this,\'phiRow03\')">再造</a></div>
										<img src="../images/ydc/phi02.jpg" alt="" width="1800" height="1200" onload="resize()" />
									</div>
									<div class="phiRow phiRow03 hide">
										<div class="phi03 pageTxt"><a href="javascript:void(0)" onclick="changeImg(this,\'phiRow01\')">极简</a></div>
										<img src="../images/ydc/phi03.jpg" alt="" width="1800" height="1200" onload="resize()"/>
									</div>
								</div>
							</div>
							<script>
							function changeImg(obj,next){
								$(obj).parent().parent().animate({"opacity":"hide"},1500).removeClass("active");
								$("."+next).animate({"opacity":"show"},1500).addClass("active");
							}
							</script>
							';
		$data['success']=true;
	}
	if(isset($_POST['loadTo'])&&$_POST['loadTo']=="gift"){
		$data['title']="gift";
		$data['pageMain']='<div id="MainCont" class="gift"><div class="active"><img src="../images/ydc/home02.jpg" alt="" width="1800" height="1200" onload="resize()" /></div></div>';
		$data['success']=true;
	}
	if(isset($_POST['loadTo'])&&$_POST['loadTo']=="contact"){
		$data['title']="contact";
		$data['pageMain']='<div id="MainCont" class="contact">
							<div class="contBox">
								联系我们！！<br/><br/><br/><br/><br/><br/>联系我们!
							</div>
							</div>';
		$data['success']=true;
	}
	/*
	if(isset($_POST['loadTo'])&&$_POST['loadTo']=="shop"){
		$data['title']="shop";
		$data['pageMain']='<div id="MainCont" class="shop"><div class="active"><img src="../images/ydc/home02.jpg" alt="" onload="resize()" /></div></div>';
		$data['success']=true;
	}*/
	print_r(json_encode($data));
?>