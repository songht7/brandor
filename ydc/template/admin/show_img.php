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
	<p>IMG</p>
    
</div>
<div class="status1">
    <div class="statuslist">
    	<input name="" type="button" id="button" value="添加新img" onclick="javascript:parent.mainFrame.location.href='index.php?a=img&m=add_img_page'"/>
    </div>
</div>
<div class="content">

	<table class="mytable1" cellspacing="0" >
    	<tr bgcolor="#2188CA" style=" font-weight:bold; color:#FFFFFF;">
        	<td class="td1" width="10%">id号</td>
            <td class="td1" width="15%">时间</td>
            <td class="td1" width="20%">img名称</td>
            <td class="td1" width="20%">路径</td>
            <td class="td1" width="15%">状态</td>
            <td class="td1" width="20%">操作</td>
        </tr>
        <?php
        $sum_i=1;
        if(!empty($orders))
        foreach($orders as $order){
        	?>
      		<tr<?php if($sum_i%2!=1){?>  class="tr2"<?php }?> onmouseover="changebg(this)" onmouseout="backbg(this)">
      			<td class="td1"><?php echo $order['i_id'];?></td>
            <td class="td1"><?php echo $order['updatedate'];?></td>
            <td class="td1"><?php echo $order['title'];?></td>
            <td class="td1"><?php echo $order['url'];?></td>
            <td class="td1"><?php if($order['type']==0){echo "不显示";}else{echo "显示";}?></td>
            <td class="td1">
            		<a href="index.php?a=img&m=show_img_detailed&id=<?php echo $order['i_id'];?>">编辑</a> | 
            	<?php if($order['type']==0){?>
            		<a href="index.php?a=img&m=edit_img_type&id=<?php echo $order['i_id'];?>&type=1">设为首页显示</a> | 
            	<?php }else{?>
            		<a href="index.php?a=img&m=edit_img_type&id=<?php echo $order['i_id'];?>&type=0">设为首页不显示</a> | 
            	<?php }?>
            		<a href="index.php?a=img&m=del_img&id=<?php echo $order['i_id'];?>" onclick="return confirm('确定将此flash删除?')">删除</a></td>
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
