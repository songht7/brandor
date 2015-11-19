<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/javascript.js"></script>
<script type="text/javascript" src="js/yanzheng.js"></script>
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
	<p>个人收藏列表</p>
</div>
<div class="status">
	<P><?php echo $product[0]['user_name'];?>的个人收藏列表:</P>
</div>
<div class="content">
	<div class="pathA">
    	<div class="leftB">
            <div class="leftAlist">
			    <table class="mytable1" cellspacing="0" >
					<tr bgcolor="#2188CA" style=" font-weight:bold; color:#FFFFFF;"><th>货号</th>
						<th>商品名</th>
						<th>标签</th>
						<th>收藏时间</th>
						</tr>
	<?php if(!empty($products)){foreach($products as $k=>$v){?>
					<tr><td><?php echo $v['goods_sn'];?></td>
						<td>
							<?php echo $v['goods_name'];?>
						</td>
						<td><?php echo $v['tag'];?></td>
						<td><?php echo $v['los'];?></td>
						</tr>
	<?php }}?>
			    </table>
            </div>
        </div>
  </div>
</div>
</body>
</html>
