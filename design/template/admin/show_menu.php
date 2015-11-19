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
	<p>菜单管理</p>
    
</div>
<div class="status1">
    <div class="statuslist">
    	<input name="" type="button" id="button" value="添加新菜单" onclick="javascript:parent.mainFrame.location.href='index.php?a=menu&m=show_menu_detailed'"/>
    </div>
</div>
<div class="content">

	<table class="mytable1" cellspacing="0" >
    	<tr bgcolor="#2188CA" style=" font-weight:bold; color:#FFFFFF;">
            <td class="td1" width="10%">名称</td>
            <td class="td1" width="10%">位置</td>
            <td class="td1" width="10%">排序</td>
        	<td class="td1" width="10%">连接</td>
            <td class="td1" width="10%">编辑人</td>
            <td class="td1" width="10%">编辑时间</td>
            <td class="td1" width="5%">是否显示</td>
            <td class="td1" width="20%">操作</td>
        </tr>
        <?php
        $sum_i=1;
        if(!empty($products))
        foreach($products as $product){
        	?>
      		<tr<?php if($sum_i%2!=1){?>  class="tr2"<?php }?>  >
	            <td class="td1"><?php for($i=1;$i<=$product['level'];$i++){echo '-';} echo $product['menu_name'];?></td>
      			<td class="td1"><?php echo $product['type'];?></td>
      			<td class="td1"><?php echo $product['order_by'];?></td>
      			<td class="td1"><?php echo $product['link'];?></td>
      			<td class="td1"><?php echo $product['edit_by'];?></td>
      			<td class="td1"><?php echo $product['edit_time'];?></td>
	            <td class="td1"><?php 
	            		switch($product['is_show']){
	            			case 1:
	            				echo '显示';
	            				break;
	            			case 0:
	            				echo '不显示';
	            				break;
	            		}
	            		
	            		?></td>
	            <td class="td1">
	            	<a href="index.php?a=menu&m=show_menu_detailed&productid=<?php echo $product['menu_id'];?>">编辑</a>
<?php if($product['has_children']==0){?>| <a href="index.php?a=menu&m=del_menu&id=<?php echo $product['menu_id'];?>" onclick="return confirm('确定将此产品删除?')">删除</a><?php }?>
	            </td>
        	</tr>
      	<?php
      		$sum_i++;
        }
        ?>
    </table>
    <div class="num_bar">

	<br />
	总项目数<b><?=$Total;?></b>
	</div>

</div>
</body>
</html>
