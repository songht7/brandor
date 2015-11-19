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
	<p>留言管理</p>
</div>
<div class="status">
	<P>留言信息编辑:</P>
</div>
<div class="content">
	<form name="theForm" id="demo" action="./index.php?a=message&m=reply_message&id=<?php echo $product[0]['id'];?>" method="post" enctype='multipart/form-data'>
	<div class="pathA">
    	
            
            <div class="leftAlist">
            	留言内容:<?php echo $product[0]['content'];?>
            
        
        <div style="clear:both;"></div>
      
            	<br />
            	回复：
            	<?php
								$a=new FCKeditor("content");
								$a->Value=$reply[0]['content'];
								$a->Create();
							?>
            	<br />
            	<input name="" type="submit" id="button" value="添加" />
            </div>

  </div>
	</form>	

    	
        
</div>

</body>
</html>
			
 
 