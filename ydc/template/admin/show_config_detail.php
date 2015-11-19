<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery.js"></script>
    
<title>无标题文档</title>
</head>

<body>
<div class="content">
	<form name="theForm" id="demo" action="./index.php?a=config&m=edit_config&id=<?php echo $id;?>" method="post" enctype='multipart/form-data'>
	<input type="hidden" name="act" value="<?php echo $act;?>">
	<div class="pathA">
    	<div class="leftA">
			<div class="leftAlist" >
				<span>HOME IMAGE 首页图片</span>
            </div>
			<div class="leftAlist" >
				<INPUT TYPE="file" NAME="file_url" id="f1" onclick="document.getElementById('edit_doc').value=1">( Suggested size 建议尺寸: 1800 x 1200 )
				<input type="hidden" name="edit_doc" id="edit_doc" value="0">
				<input type="hidden" name="img_id" id="img_id" value="<?php echo $img['img_id'];?>">
            </div>
			<div class="leftAlist" >
				<img src=".<?php if(!empty($img['original_src'])){echo $img['original_src'];}else{echo '/img/no_img.jpg';}?>" />
            </div>
        </div>
        <div class="leftA">
            <input name="" type="submit" id="submit" value="DONE 完成" />
        </div>
	</div>
	</form>	
</div>
</body>
</html>