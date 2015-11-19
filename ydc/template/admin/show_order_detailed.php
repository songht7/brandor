<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<title>无标题文档</title>
 <style>
 body,td{font:normal 12px Verdana;color:#333333}
 input,textarea,select,td{font:normal 12px Verdana;color:#333333;border:1px solid #999999;background:#ffffff}
 table{border-collapse:collapse;}
 td{padding:3px}
 input{height:20;}
 textarea{width:80%;height:50px;overflow:auto;}
 form{display:inline}
 </style>
</head>

<body>

<div class="Incident">
	<p>编辑订单</p>
</div>
<div class="status">
	<P>订单信息填写:</P>
</div>
<div class="content">
	<form name="theForm" id="demo" action="./index.php?a=order&m=edit_order&order_id=<?php echo $product[0]['order_id'];?>" method="post" enctype='multipart/form-data'>
	<div class="pathA">
    	<div class="leftA">
            <div class="leftAlist">
			    <input type="hidden" name="user_id" value="<?php echo $product[0]['user_id'];?>">
			    <input type="hidden" name="order_id" value="<?php echo $product[0]['order_id'];?>">
    			<table>
    				<tr>
    					<td colspan=2>订单信息</td>
    					<td colspan=2>客户信息</td>
    				</tr>
    				<tr>
    					<td>订单编号:</td>
    					<td><?php echo $product[0]['order_sn'];?></td>
    					<td>客户姓名:</td>
    					<td><?php echo $product[0]['user_family_name'];?><?php echo $product[0]['user_given_name'];?></td>
    				</tr>
    				<tr>
    					<td>订单状态:</td>
    					<td>
    						<select name="type">
    							<option value="0" <?php if($product[0]['type']==0){ echo "selected";}?>>未确认</option>
    							<option value="1" <?php if($product[0]['type']==1){ echo "selected";}?>>确认</option>
    							<option value="2" <?php if($product[0]['type']==2){ echo "selected";}?>>付款</option>
    							<option value="3" <?php if($product[0]['type']==3){ echo "selected";}?>>备货</option>
    							<option value="4" <?php if($product[0]['type']==4){ echo "selected";}?>>发货</option>
    							<option value="5" <?php if($product[0]['type']==5){ echo "selected";}?>>确认收货</option>
    							<option value="6" <?php if($product[0]['type']==6){ echo "selected";}?>>退货</option>
    						</select>
    					</td>
    					<td>地址:</td>
    					<td><?php echo $product[0]['address'];?></td>
    				</tr>
    					<td>配送时间:</td>
    					<td><input style="border:#9DB7CE solid 1px;" name="send_date" type="text" <?php if($product[0]['type']==0){echo "readonly";}?> value="<?php echo $product[0]['send_date'];?>" /></td>
    					<td>邮编:</td>
    					<td><?php echo $product[0]['postcode'];?></td>
    				</tr>
    				<tr>
    					<td>配送方式:</td>
    					<td><input style="border:#9DB7CE solid 1px;" name="send_type" type="text" <?php if($product[0]['type']==0){echo "readonly";}?> value="<?php echo $product[0]['send_type'];?>" /></td>
    					<td>电话:</td>
    					<td><?php echo $product[0]['phone'];?><br /><?php echo $product[0]['mobile_phone'];?></td>
    				</tr>
    				<tr>
    					<td>支付时间:</td>
    					<td><input style="border:#9DB7CE solid 1px;" name="pay_date" type="text" <?php if($product[0]['type']==0){echo "readonly";}?> value="<?php echo $product[0]['pay_date'];?>" /></td>
    					<td rowspan=4>备注:</td>
    					<td rowspan=4><input style="border:#9DB7CE solid 1px;" name="remark" type="text" <?php if($product[0]['type']==0){echo "readonly";}?> value="<?php echo $product[0]['remark'];?>" /></td>
    				</tr>
    				<tr>
    					<td>支付方式:</td>
    					<td><input style="border:#9DB7CE solid 1px;" name="pay_type" type="text" <?php if($product[0]['type']==0){echo "readonly";}?> value="<?php echo $product[0]['pay_type'];?>" /></td>
    				</tr>
    				<tr>
    					<td>下单时间:</td>
    					<td><?php echo $product[0]['add_time'];?></td>
    				</tr>
    				<tr>
    					<td>快递单号:</td>
    					<td><input style="border:#9DB7CE solid 1px;" name="invoice_no" type="text" <?php if($product[0]['type']==0){echo "readonly";}?> value="<?php echo $product[0]['invoice_no'];?>" /></td>
    				</tr>
    			</table>
            </div>
            <div class="leftAlist">
    			<table>
    				<tr>
    					<td>名称:</td>
    					<td>库存:</td>
    					<td>订货数量:</td>
    					<td>商品价格:</td>
    					<td>最后价格:</td>
    				</tr>
<?php $qll_price=0; if(!empty($product_d)){foreach($product_d as $k=>$v){?>
    				<tr>
    					<td><?php echo $v['goods_name'];?><input type="hidden" value="<?php echo $v['order_detail_id'];?>" name="detail[<?php echo $v['order_detail_id'];?>][order_detail_id]"></td>
    					<td><?php echo $v['inventory'];?></td>
    					<td><input style="border:#9DB7CE solid 1px;" name="detail[<?php echo $v['order_detail_id'];?>][qty]" type="text" <?php if($product[0]['type']==0){echo "readonly";}?> value="<?php echo $v['qty'];?>" /></td>
    					<td><?php echo $v['width'];?></td>
    					<td><input style="border:#9DB7CE solid 1px;" name="detail[<?php echo $v['order_detail_id'];?>][tprice]" type="text" <?php if($product[0]['type']==0){echo "readonly";}?> value="<?php echo $v['tprice'];?>" /></td>
    				</tr>
<?php $qll_price+=$v['qty']*$v['tprice'];}}?>
    				<tr>
    					<td colspan=4>总价:</td>
    					<td><?php echo $qll_price;?></td>
    				</tr>
    			</table>
            </div>
            <div class="leftAlist">
            	<?php if($product[0]['type']==0){echo "";}else{?><input name="" type="submit" id="button" value="添加" /><?php }?>
            </div>
        </div>  
	</div>
	</form>	
</div>
</body>
</html>
			
 
 