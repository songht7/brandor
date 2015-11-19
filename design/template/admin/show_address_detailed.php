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
	<p>添加新闻</p>
</div>
<div class="status">
	<P>新闻信息填写:</P>
</div>
<div class="content">
	<div class="pathA">
    	<div class="leftB">
            <div class="leftAlist">
			    <table class="mytable1" cellspacing="0" >
					<tr bgcolor="#2188CA" style=" font-weight:bold; color:#FFFFFF;"><th>收货人姓名</th>
						<th>收货人地址</th>
						<th>收货人电话</th>
						<th>地址属性</th>
						</tr>
	<?php if(!empty($products)){foreach($products as $k=>$v){?>
					<tr><td><?php echo $v['consignee'];?></td>
						<td>
							<?php echo ''.$v['district'].' '.$v['city'].'<br />'.$v['address'].' '.$v['code'];?>
						</td>
						<td><?php echo $v['consignee_tel'];?></td>
						<td><?php echo $v['type'];?></td>
						</tr>
	<?php }}?>
			    </table>
            </div>
        </div>
  </div>
</div>
</body>
</html>
