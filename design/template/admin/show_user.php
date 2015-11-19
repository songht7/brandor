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
	<p>会员管理</p>
    
</div>
<div class="status1">
    <div class="statuslist">
    	<input name="" type="button" id="button" value="添加会员" onclick="javascript:parent.mainFrame.location.href='index.php?a=user&m=show_user_detailed'"/>
    </div>
</div>
<div class="content">

	<table class="mytable1" cellspacing="0" >
    	<tr bgcolor="#2188CA" style=" font-weight:bold; color:#FFFFFF;">
        	<td class="td1" width="10%"><a href="index.php?a=user&m=index&perpagenum=<?php echo $perpagenum;?>&page=<?php echo $page;?>&by=<?php echo $bys;?>&order=user_id&type=a">ID</a></td>
            <td class="td1" width="10%"><a href="index.php?a=user&m=index&perpagenum=<?php echo $perpagenum;?>&page=<?php echo $page;?>&by=<?php echo $bys;?>&order=user_name&type=a">昵称</a></td>
            <td class="td1" width="10%"><a href="index.php?a=user&m=index&perpagenum=<?php echo $perpagenum;?>&page=<?php echo $page;?>&by=<?php echo $bys;?>&order=user_email&type=a">email</a></td>
            <td class="td1" width="10%"><a href="index.php?a=user&m=index&perpagenum=<?php echo $perpagenum;?>&page=<?php echo $page;?>&by=<?php echo $bys;?>&order=login_times&type=a">登录次数</a></td>
            <td class="td1" width="10%"><a href="index.php?a=user&m=index&perpagenum=<?php echo $perpagenum;?>&page=<?php echo $page;?>&by=<?php echo $bys;?>&order=last_login&type=a">最后登录时间</a></td>
            <td class="td1" width="10%"><a href="index.php?a=user&m=index&perpagenum=<?php echo $perpagenum;?>&page=<?php echo $page;?>&by=<?php echo $bys;?>&order=confirm&type=a">是否验证</a></td>
            <td class="td1" width="10%"><a href="index.php?a=user&m=index&perpagenum=<?php echo $perpagenum;?>&page=<?php echo $page;?>&by=<?php echo $bys;?>&order=confirm_time&type=a">验证时间</a></td>
            <td class="td1" width="10%"><a href="index.php?a=user&m=index&perpagenum=<?php echo $perpagenum;?>&page=<?php echo $page;?>&by=<?php echo $bys;?>&order=add_time&type=a">注册时间</a></td>
            <td class="td1" width="20%">操作</td>
        </tr>
        <?php
        $sum_i=1;
        if(!empty($products))
        foreach($products as $product){
        	?>
        	<tr <?php if($sum_i%2!=1){?>  class="tr2"<?php }?>>
        		<td class="td1"><?php echo $product['user_id'];?></td>
            <td class="td1"><?php echo $product['user_name'];?></td>
            <td class="td1"><?php echo $product['user_email'];?></td>
            <td class="td1"><?php echo $product['login_times'];?></td>
            <td class="td1"><?php echo $product['last_login'];?></td>
            <td class="td1"><?php echo $product['confirm'];?></td>
            <td class="td1"><?php echo $product['confirm_time'];?></td>
            <td class="td1"><?php echo $product['add_time'];?></td>
            <td class="td1"><a href="index.php?a=user&m=show_user_detailed&id=<?php echo $product['user_id'];?>">编辑</a> 
            		| <a href="index.php?a=user&m=address_book&id=<?php echo $product['user_id'];?>">地址簿</a>
            		| <a href="index.php?a=user&m=favorite&id=<?php echo $product['user_id'];?>">收藏</a>
            		<?php if(false){}else{?>| <a href="index.php?a=user&m=del_user&id=<?php echo $product['user_id'];?>" onclick="return confirm('确定将此产品删除?')">删除</a><?php }?></td>
        	</tr>

      	<?php
      		$sum_i++;
        }
        ?>
    </table>
    <div class="num_bar">
    		<select onchange='if (this.selectedIndex!=0) parent.mainFrame.location.href=this.value' >
    			<option <?php if($perpagenum=="20"){ echo "selected=selected";}?> value="index.php?a=user&m=index&perpagenum=20">20</option>
    			<option <?php if($perpagenum=="40"){ echo "selected=selected";}?> value="index.php?a=user&m=index&perpagenum=40">40</option>
    			<option <?php if($perpagenum=="60"){ echo "selected=selected";}?> value="index.php?a=user&m=index&perpagenum=60">60</option>
    		</select>
<?php
	$sl.= "<select onchange='if (this.selectedIndex!=0) parent.mainFrame.location.href=this.value' >";
	for($i=1;$i<=$Totalpage;$i++){
		$sl.= "<option value='index.php?a=user&m=index&page=".$i."&perpagenum=".$perpagenum."'";
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
