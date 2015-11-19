<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
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
	<p>新闻管理</p>
    
</div>
<div class="status1">
    <div class="statuslist">
    	<input name="" type="button" id="button" value="添加新闻" onclick="javascript:parent.mainFrame.location.href='index.php?a=news&m=add_news_page'"/>
    </div>
</div>
<div class="content">

	<table class="mytable1" cellspacing="0" >
    	<tr bgcolor="#2188CA" style=" font-weight:bold; color:#FFFFFF;">
        	<td class="td1" width="10%"><a href="index.php?a=news&m=index&perpagenum=<?php echo $perpagenum;?>&page=<?php echo $page;?>&by=<?php echo $bys;?>&order=art_id&type=a">ID</a></td>
            <td class="td1" width="30%"><a href="index.php?a=news&m=index&perpagenum=<?php echo $perpagenum;?>&page=<?php echo $page;?>&by=<?php echo $bys;?>&order=art_name&type=i">标题</a></td>
            <td class="td1" width="20%"><a href="index.php?a=news&m=index&perpagenum=<?php echo $perpagenum;?>&page=<?php echo $page;?>&by=<?php echo $bys;?>&order=cat_name&type=ci">分类</a></td>
            <td class="td1" width="20%"><a href="index.php?a=news&m=index&perpagenum=<?php echo $perpagenum;?>&page=<?php echo $page;?>&by=<?php echo $bys;?>&order=add_time&type=a">时间</a></td>
            <td class="td1" width="20%">操作</td>
        </tr>
        <?php
        $sum_i=1;
        if(!empty($products))
        foreach($products as $product){
        	?>
        	<tr <?php if($sum_i%2!=1){?>  class="tr2"<?php }?> ">
        		<td class="td1"><?php echo $product['art_id'];?></td>
            <td class="td1"><?php echo $product['art_name'];?></td>
            <td class="td1"><?php echo $product['cat_name'];?></td>
            <td class="td1"><?php echo $product['add_time'];?></td>
            <td class="td1"><a href="index.php?a=news&m=show_news_detail&id=<?php echo $product['art_id'];?>">编辑</a> 
            		| <a href="index.php?a=news&m=del_news&id=<?php echo $product['art_id'];?>" onclick="return confirm('确定将此产品删除?')">删除</a></td>
        	</tr>

      	<?php
      		$sum_i++;
        }
        ?>
    </table>
    <div class="num_bar">
    		<select onchange='if (this.selectedIndex!=0) parent.mainFrame.location.href=this.value' >
    			<option <?php if($perpagenum=="20"){ echo "selected=selected";}?> value="index.php?a=news&m=index&perpagenum=20">20</option>
    			<option <?php if($perpagenum=="40"){ echo "selected=selected";}?> value="index.php?a=news&m=index&perpagenum=40">40</option>
    			<option <?php if($perpagenum=="60"){ echo "selected=selected";}?> value="index.php?a=news&m=index&perpagenum=60">60</option>
    		</select>
<?php
	$sl.= "<select onchange='if (this.selectedIndex!=0) parent.mainFrame.location.href=this.value' >";
	for($i=1;$i<=$Totalpage;$i++){
		$sl.= "<option value='index.php?a=news&m=index&page=".$i."&perpagenum=".$perpagenum."'";
		if($_GET['page']==$i){
			$sl.="selected=selected";
		}
		$sl.= ">".$i."</option>";
	}
	$sl.= "</select>";
	echo $sl;
?>
	<br />
	总项目数<b><?=$Total;?></b>	总页数<b><?=$Totalpage;?></b>
	</div>

</div>
</body>
</html>
