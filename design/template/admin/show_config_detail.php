<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery.js"></script>
    
<title>无标题文档</title>
</head>

<body>
<div class="content">
	<form name="theForm" id="demo" action="./index.php?a=config&m=edit_config" method="post" enctype='multipart/form-data'>
	<div class="pathA">
    	<div class="leftA">
			<?php if(!empty($config)){foreach($config as $k=>$v){?>
			<div class="leftAlist" >
				<?php echo $v['con_name'];?>
				<input type="text" name="<?php echo $v['con_name'];?>" value="<?php echo $v['con_value'];?>">
            </div>
            <?php }}?>
        </div>
        <div class="leftA">
            <input name="" type="submit" id="submit" value="DONE 完成" />
        </div>
	</div>
	</form>	
</div>
</body>
</html>