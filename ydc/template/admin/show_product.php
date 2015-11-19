<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<title>无标题文档</title>
<script type="text/javascript">
	$(function(){
		$('.show_show').click(function (){
			var thisdiv=$(this);
			$.post("./index.php?a=product&m=change_show",{id:$(this).attr('value')},function(data){
				if(data.say=='ok'){
				//	alert(data.is_show);
					thisdiv.attr('class','show_show');
					thisdiv.addClass('show_show'+data.is_show);
				
				}
			},'json');
		});
		$('.show_order').click(function (){
			$(this).hide().next().show();
			$(this).next().selectRange('100','100');
		});
		$('.show_order_text').blur(function(){
			var thisdiv=$(this);
			var val=$(this).attr('value');
			var id=$(this).prev().attr('value')
			if(val!=null){
				$.post("./index.php?a=product&m=change_order",{id:id,val:val},function(data){
					if(data.say=='ok'){
						thisdiv.prev().html(data.val);
						thisdiv.attr('value',data.val);
					}
				},'json');
			}
			$(this).hide().prev().show();
		});
	});
	$.fn.selectRange = function(start, end) {
		return this.each(function() {
			if (this.setSelectionRange) {
				this.focus();
				this.setSelectionRange(start, end);
			} else if (this.createTextRange) {
				var range = this.createTextRange();
				range.collapse(true);
				range.moveEnd('character', end);
				range.moveStart('character', start);
				range.select();
			}
		});
	};
</script>
</head>
<body>
<div class="content">

	<table class="mytable" cellspacing="0" >
    	<tr bgcolor="#e1e1e1" >
        	<td class="th" width="60%">标题</td>
        	<td class="th" width="10%">排序</td>
        	<td class="th" width="10%">显示</td>
            <td class="th" width="10%">操作</td>
        </tr>
        <?php
        $sum_i=1;
        if(!empty($products))
        foreach($products as $product){
        	?>
      		<tr >
      			<td class="td1"><?php echo $product['goods_name'];?></td>
      			<td class="td1"><div class="show_order" value="<?php echo $product['goods_id'];?>"><?php echo $product['order_by'];?></div><input type="text" class="show_order_text hide" value="<?php echo $product['order_by'];?>" /></td>
	            <td class="td1"><div class="show_show show_show<?php echo $product['is_show'];?>" value="<?php echo $product['goods_id'];?>"></div></td>
	            <td class="td1">
	            	<a href="index.php?a=product&m=show_product_detail&id=<?php echo $product['goods_id'];?>&c_id=<?php echo $id;?>">编辑</a><br />
	            	<a href="index.php?a=product&m=del_product&id=<?php echo $product['goods_id'];?>" onclick="return confirm('确定将此产品删除?')">删除</a>
	            </td>
        	</tr>
      	<?php
      		$sum_i++;
        }
        ?>
    </table>

    <div class="page">
	    <div class="page_left">
	    	<input name="" type="button" id="button" value="+ 添加" onclick="javascript:parent.mainFrame.location.href='index.php?a=product&m=show_product_detail&c_id=<?php echo $id;?>'"/>
	    </div>
	    <div class="page_right">
<!--page-->
<?php
		$space='3';
		$first='2';
		$last=$Totalpage-1;
		$sl='';
		if($page>1){
			$sl.= '<a href="index.php?a=product&&m=index&id='.$id.'&page='.($page-1).'&perpagenum='.$perpagenum.'"><</a>';
		}
		if($Totalpage<10){
			for($i=1;$i<=$Totalpage;$i++){
				$sl.= '<a href="index.php?a=product&m=index&id='.$id.'&page='.$i.'&perpagenum='.$perpagenum.'"';
				if($page==$i){
					$sl.='class="active"';
				}
				$sl.= '>'.$i.'</a>';
			}
		}else{
			if($page>$space){
				$sl.= '<a href="index.php?a=product&m=index&id='.$id.'&page=1&perpagenum='.$perpagenum.'">1</a><a >...</a>';
			}else{
				$sl.= '<a href="index.php?a=product&m=index&id='.$id.'&page=1&perpagenum='.$perpagenum.'"';
				if($page==1){
					$sl.='class="active"';
				}
				$sl.= '>1</a>';
			}
			if(($page-$space)>1){
				$first=$page-$space;
			}
			if(($page+$space)<$Totalpage){
				$last=$page+$space;
			}
			for($i=$first;$i<=$last;$i++){
				$sl.= '<a href="index.php?a=product&m=index&id='.$id.'&page='.$i.'&perpagenum='.$perpagenum.'"';
				if($page==$i){
					$sl.='class="active"';
				}
				$sl.= '>'.$i.'</a>';
			}
			if($page<($Totalpage-$space)){
				$sl.= '<a >...</a><a href="index.php?a=product&m=index&id='.$id.'&page='.$Totalpage.'&perpagenum='.$perpagenum.'">'.$Totalpage.'</a>';
			}else{
				$sl.= '<a href="index.php?a=product&m=index&id='.$id.'&page='.$Totalpage.'&perpagenum='.$perpagenum.'"';
				if($page==$perpagenum){
					$sl.='class="active"';
				}
				$sl.= '>'.$Totalpage.'</a>';
			}
		}
		if($page<$Totalpage){
			$sl.= '<a href="index.php?a=product&&m=index&id='.$id.'&page='.($page+1).'&perpagenum='.$perpagenum.'">></a>';
		}
			
		echo $sl;
?>
<!--page end-->
	    </div>
	    <div class="clear"></div>
	</div>
</div>
</body>
</html>
