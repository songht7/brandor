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
	<p>分类管理</p>
    
</div>
<div class="status1">
    <div class="statuslist">
    	<input name="" type="button" id="button" value="添加新分类" onclick="javascript:parent.mainFrame.location.href='index.php?a=category&m=add_category_page'"/>
    </div>
</div>
<div class="content">

	<table class="mytable1" cellspacing="0" >
    	<tr bgcolor="#2188CA" style=" font-weight:bold; color:#FFFFFF;">
            <td class="td1" width="30%">标题</td>
            <td class="td1" width="10%">状态</td>
            <td class="td1" width="10%">属于</td>
            <td class="td1" width="10%">排序</td>
            <td class="td1" width="20%">操作</td>
        </tr>
        <?php
        $sum_i=1;
        if(!empty($products))
        foreach($products as $product){
        	?>
      		<tr<?php if($sum_i%2!=1){?>  class="tr2"<?php }?>>
            <td class="td1"><?php for($i=1;$i<=$product['level'];$i++){echo '-';} echo $product['cat_name'];?></td>
            <td class="td1"><?php if($product['is_show']==1){echo 'show';}else{echo 'not show';}?></td>
            <td class="td1"><?php 
            		switch($product['type']){
            			case 'A':
            				echo '文章';
            				break;
            			case 'G':
            				echo '商品';
            				break;
            		}
            		?></td>
            <td class="td1"><?php echo $product['order_by'];?></td>
            <td class="td1">
            	<a href="index.php?a=category&m=show_category_detailed&productid=<?php echo $product['cat_id'];?>">编辑</a>
<?php if($product['type']=='G'){?>| <a href="index.php?a=category&m=show_category_detailed&productid=<?php echo $product['cat_id'];?>">属性列表</a><?php }?>
<?php if($product['has_children']==0){?>| <a href="index.php?a=category&m=del_category&id=<?php echo $product['cat_id'];?>" onclick="return confirm('确定将此分类删除?')">删除</a><?php }?></td>
        	</tr>
      	<?php
      		$sum_i++;
        }
        ?>
    </table>
    <div class="num_bar">
	总项目数<b><?=$Total;?></b>
	</div>
</div>
</body>
</html>
