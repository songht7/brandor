$(function(){
if(typeof(eleId)==undefined||eleId==""||eleId==undefined){var eleId="slideShow";}
var obj=$("."+eleId).find(".slideMain");
	if(typeof(auto)=='undefined'||auto==true){
		slide=setInterval("slideSow()",3000);
		$(document).on("mouseover",".slidePrint",function(){
			clearInterval(slide);
		});
		$(document).on("mouseleave",".slidePrint",function(){
			slide=setInterval("slideSow()",3000);
		});
	}
	var liLength=obj.find('.slideImg > li').length;
	obj.find('.slideImg > li:gt(0)').hide();
	var active="";
	var _div="<div class=\"slidePrint\" class=\"clearfix\">"
				+"<a href=\"javascript:void(0)\" class=\"move prev\">prev</a>"
				+"<ul class=\"slideBt clearfix\">";
				for(var r=1;r<=liLength;r++){
					if(r==1){active="current";}else{active="";}
					_div+="<li class=\"ssListb "+active+" \">"+r+"</li>";
				}
			_div+="</ul>"
				+"<a href=\"javascript:void(0)\" class=\"move next\">next</a>"
			+"</div>";
	if(liLength>1){
		obj.append(_div);
	}else{
		if($("body").hasClass('pro')){
			$(".slideMain").css({"height":"463px"});
		}else{
			$(".slideShow,.slideMain").css({"height":"463px"});
		}
	}

		$(document).on('click', '.move', function(event) {
			var slength = obj.find(".ssList").length;
			var _index=obj.find(".slideBt > .current").index();
			if($(this).hasClass('next')){
				if(_index==(slength-1)){
					obj.find(".ssListb").eq(0).click();
				}
				else{
					obj.find(".slideBt > .current").next().click();
				}
			}else{
				if(_index==0){
					obj.find(".ssListb").eq((slength-1)).click();
				}
				else{
					obj.find(".slideBt > .current").prev().click();
				}
			}
			event.preventDefault();
		});
		$(document).on("click",".ssListb",function(){
			if(!$(".ssList").is(":animated")){
				var _index=$(this).index();
				$(".ssListb").removeClass("current");
				$(this).addClass("current");
				$(".ssList").animate({"opacity":"hide"},1000).removeClass("active");
				$(".ssList").eq(_index).animate({"opacity":"show"},1500).addClass("active");
			}
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
