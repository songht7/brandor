$(function(){
	$(".ctgTabs").on("click",".ctgLink",function(){
		var obj=$(this);
		if(!obj.hasClass('active')){
			var _index=obj.index();
			$(".ctgLink").removeClass('active');
			obj.addClass('active');
			$(".ctgTabBox").find('.ctgTabBlock').hide().eq(_index).show();
		}
	});
    $(".ctgImg").hover(function() {
        var obj=$(this);
        var ctgTitleBlock="";
        var ctgTitle=obj.find(".pic").attr("alt");
        if(ctgTitle!=""&&ctgTitle!=undefined&&ctgTitle!=null){
            var ctgTitleBlock='<div class="ctgProTitle">'+ctgTitle+"</div>";
        }
        if(obj.find('.linkOver').length==0){
            var linkOver='<div class="linkOver"><img src="../images/bls/imgs/black.png"/>'+ctgTitleBlock+'</div>';
            obj.append(linkOver);
        }
        if(obj.prev().hasClass('ctgLink')){
            obj.prev().addClass('active');
        }
        obj.find(".linkOver").show();
    }, function() {
        var obj=$(this);
        if(obj.prev().hasClass('ctgLink')){
            obj.prev().removeClass('active');
        }
        $(".linkOver").hide();
        $(".ctgInfo").find('a').show();
    });
    if($(".proBtn").length>0){
        resize();
        $(window).resize(function(event) {
            resize();
        });
    }
    if($(".goTop").length>0){
        $(".goTop").click(function(){
            $("html,body").animate({scrollTop:0},"fast");
        });
        $(window).scroll(function(){
            var scrollPos;
            if (window.pageYOffset) {
                scrollPos = window.pageYOffset; } 
            else if (document.compatMode && document.compatMode != 'BackCompat') { 
                scrollPos = document.documentElement.scrollTop; }
            else if (document.body) { scrollPos = document.body.scrollTop; }
            if(scrollPos>=50){
                $(".goTop").show();
            }
            if(scrollPos<50){
                $(".goTop").hide();
            }
        });
    }
});
function resize(){
    var winWidth=$(window).width();
    var margin=(winWidth-1024)/4;
    var half=(winWidth-1024)/2;
    var right=margin-36;
    // var prevPro_right=right-$(".prevPro").width();
    // var nextPro_right=right-$(".nextPro").width();
    // var goTop_right=right-$(".goTop").width();
    // if(prevPro_right<0){
    //     prevPro_right=0;
    // }
    // if(nextPro_right<0){
    //     nextPro_right=0;
    // }
    // if(goTop_right<0){
    //     goTop_right=0;
    // }
    $(".prevPro").css({"left":right});
    $(".nextPro").css({"right":right});
    $(".goTop").css({"right":right});
}