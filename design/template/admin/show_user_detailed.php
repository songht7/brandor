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
	<p><?php if($act=='add'){echo '新增';}else{echo '编辑';}?>会员</p>
</div>
<div class="status">
	<P>会员信息填写:</P>
</div>
<div class="content">
	<form name="theForm" id="demo" action="./index.php?a=user&m=edit_user&id=<?php echo $product[0]['user_id'];?>" method="post" enctype='multipart/form-data'>
	<input type="hidden" name="act" value="<?php echo $act;?>">
	<div class="pathA">
    	<div class="leftB">
            <div class="leftAlist">
            	username:<br /><input style="border:#9DB7CE solid 1px;" name="user_name" type="text" value="<?php echo $product[0]['user_name'];?>" />
            </div>
            <div class="leftAlist">
            	email:<br /><input style="border:#9DB7CE solid 1px;" name="user_email" type="text" value="<?php echo $product[0]['user_email'];?>" />
            </div>
            <div class="leftAlist">
            	password:<br /><input style="border:#9DB7CE solid 1px;" name="password" type="password" value="" />
            </div>
            <div class="leftAlist">
            	conformpassword:<br /><input style="border:#9DB7CE solid 1px;" name="cf_password" type="password" value="" />
            </div>
            <div class="leftAlist">
            	i8n:<br /><select style="border:#9DB7CE solid 1px;" name="i8n">
    							<option <?php if($product[0]['i8n']=="en_us"){ echo " selected ";}?> value="en_us">English</option>
    							<option <?php if($product[0]['i8n']=="zh_cn"){ echo " selected ";}?> value="zh_cn">简体中文</option>
    							<option <?php if($product[0]['i8n']=="zh_tw"){ echo " selected ";}?> value="zh_tw">繁体中文</option>
    						</select>
            </div>
            <input name="" type="submit" id="button" value="添加" style="margin-left:80%;" />
        </div>
  </div>
	</form>	
</div>
	<script>
		
	</script>
</body>
</html>
