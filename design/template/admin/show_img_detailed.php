<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/javascript.js"></script>
<script type="text/javascript" src="js/yanzheng.js"></script>
	
    <script src="./lib/webcel/src/js/jscal2.js"></script>
    <script src="./lib/webcel/src/js/lang/cn.js"></script>
	<link type="text/css" rel="stylesheet" href="./lib/webcel/src/css/jscal2.css" />
    <link type="text/css" rel="stylesheet" href="./lib/webcel/src/css/border-radius.css" />
    <link id="skinhelper-compact" type="text/css" rel="stylesheet" href="./lib/webcel/src/css/reduce-spacing.css" />
    
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
	<p>添加新产品</p>
</div>
<div class="status">
	<P>产品信息填写:</P>
</div>
<div class="content">
	<form name="theForm" id="demo" action="./index.php?a=img&m=edit_img&f_id=<?php echo $product[0]['i_id'];?>" method="post" enctype='multipart/form-data'>
	<div class="pathA">
    	<div class="leftA"><div class="leftAlist">
            	img名称:<input style="border:#9DB7CE solid 1px;" name="title" type="text" value="<?php echo $product[0]['title'];?>" />
            </div>
            <div class="leftAlist" style="display:none;">
            	img路径:<input style="border:#9DB7CE solid 1px;" name="url" type="text" value="<?php echo $product[0]['url'];?>" />
            </div>
    		<div>
            	<img src=".<?php echo $product[0]['img_src'];?>" />
            </div>
            <div>
            	img图片:<input name="file_url" type="file" onchange="javascript:document.getElementById('edit_doc').value='1'" />
            	<input style="border:#9DB7CE solid 1px;" name="edit_doc" id="edit_doc" type="hidden" value="0" />
            </div>
    		<div class="leftAlist" style="height:auto;">
            	简介:
    			<textarea style="border:#9DB7CE solid 1px;" name="detail" ><?php echo $product[0]['detail'];?></textarea>
            	<br />
            	<input name="" type="submit" id="button" value="添加" />
            </div>
            
        </div>  
      
        
  </div>
	</form>	

    	
        
</div>

 <style>
 td{font:normal 12px Verdana;color:#333333;border:1px;background:transparent}
 td{padding:0}
 tr{height:10px;}
 .DynarchCalendar-titleCont{width:100px;margin:0 auto;}
 </style>
</body>
</html>
			
 
 