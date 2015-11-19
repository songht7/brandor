<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/javascript.js"></script>
<title>无标题文档</title>
<script>
	function edit_sum(i){
		sum=document.getElementById('sum_'+i).value;
		//document.getElementById('checkout_'+i).href="./index.php?a=order&m=checkout&pid="+i+"&sum="+sum;
		document.getElementById('checkout2_'+i).value=i+'_'+sum;
		}
</script>
</head>

<body>
<div class="Incident">
	<p>订单</p>
    
</div><!--
<div class="status1">
    <div class="statuslist">
    	<input name="" type="button" id="button" value="添加招聘" onclick="javascript:parent.mainFrame.location.href='index.php?a=recruitment&m=add_recruitment_page'"/>
    </div>
</div>-->
<div class="content">

	<table class="mytable1" cellspacing="0" >
    	<tr bgcolor="#2188CA" style=" font-weight:bold; color:#FFFFFF;">
        	<td class="td1" width="10%">订单号</td>
            <td class="td1" width="12%">生成时间</td>
            <td class="td1" width="10%">会员名</td>
            <td class="td1" width="15%">总金额</td>
            <td class="td1" width="13%">操作</td>
        </tr>
        <?php
        $sum_i=1;
        if(!empty($orders))
        foreach($orders as $order){
        	?>
      		<tr<?php if($sum_i%2!=1){?>  class="tr2"<?php }?>>
      		<td class="td1"><?php echo $order['order_sn'];?></td>
            <td class="td1"><?php echo $order['add_time'];?></td>
            <td class="td1"><?php if($order['user_name']==""){echo "匿名";}else{ echo $order['user_name'];}?></td>
            <td class="td1"><?php echo $order['amount_price'];?></td>
            <td class="td1">
            	<a href="index.php?a=order&m=show_order_detailed&id=<?php echo $order['order_id'];?>">编辑</a> | 
            	
            <?php if($order['type']==2){?>
            	<a href="index.php?a=order&m=edit_order_type&id=<?php echo $order['order_id'];?>&type=1">恢复</a> | 
            <?php }else if($order['type']==1){?>
            	<a href="index.php?a=order&m=edit_order_type&id=<?php echo $order['order_id'];?>&type=2">作废</a> | 
            <?php }else if($order['type']==3){?>
            	<a href="index.php?a=order&m=edit_order_type&id=<?php echo $order['order_id'];?>&type=0">恢复</a> | 
            <?php }else if($order['type']==0){?>
            	<a href="index.php?a=order&m=edit_order_type&id=<?php echo $order['order_id'];?>&type=3">作废</a> | 
            <?php }?>
            	<a href="index.php?a=order&m=del_order&id=<?php echo $order['order_id'];?>" onclick="return confirm('确定将此订单删除?')">删除</a>
            </td>
        	</tr>
      	<?php
      		$sum_i++;
        }
        ?>
    </table>
    <?php
	for($i=1;$i<=$Totalpage;$i++){
		if($_GET['page']==$i){
			echo "<b>";
			}
		echo "<a href='index.php?a=order&m=index&page=".$i."'>[".$i."]</a>";
		if($_GET['page']==$i){
			echo "</b>";
			}
		}
	?>
	<br />
	总项目数<b><?=$Total;?></b>	总页数<b><?=$Totalpage;?></b>

</div>
</body>
</html>
