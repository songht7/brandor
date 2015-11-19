<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script src="lib/ckeditor/ckeditor.js"></script>
<title>无标题文档</title>
</head>

<body>
<div class="status r_top">
	<p class="active">繁體</p>
</div>
<?php if($id=='20'){?>
<div class="content">
	<form name="theForm" id="demo" action="./index.php?a=news&m=edit_news&id=<?php echo $id;?>" method="post" enctype='multipart/form-data'>
	<div class="pathA zh_tw">
    	<div class="leftA">
            
    		<input name="iid[zh_tw]" type="hidden" value="<?php if(!empty($pro['zh_tw']['art_i8n_id'])){echo $pro['zh_tw']['art_i8n_id'];}?>" />
    		
            <div class="leftAlist hide">
            	<p>微信</p>
            	<textarea name="detail[zh_tw][]" ><?php if(!empty($pro['zh_tw']['detail_arr'][0])){echo $pro['zh_tw']['detail_arr'][0];}?></textarea>
            </div>
            <?php if(!empty($imgs)){?>
            <div class="leftAlist" >
				<span>上部图片</span>
            </div>
			<?php foreach($imgs as $k=>$v){if($v['i8n']=='zh_tw'&&$v['point']==1){?>
			<div class="leftAlist" >
				<INPUT TYPE="file" NAME="file_url[<?php echo $v['img_id'];?>-zh_tw]" id="f1" onclick="document.getElementById('edit_doc_zh_tw<?php echo $v['img_id'];?>').value=1">( 建议尺寸: 950 x 450 )
				<input type="hidden" name="edit_doc[<?php echo $v['img_id'];?>-zh_tw]" id="edit_doc_zh_tw<?php echo $v['img_id'];?>" value="0">
				<input type="hidden" name="img_id[<?php echo $v['img_id'];?>-zh_tw]" value="<?php echo $v['img_id'];?>">
            </div>
			<div class="leftAlist" >
				<img src=".<?php if(!empty($v['original_src'])){echo $v['original_src'];}else{echo '/img/no_img.jpg';}?>" />
            </div>
			<?php }}?>
			<div class="leftAlist" >
				<span>背景图片</span>
            </div>
			<?php foreach($imgs as $k=>$v){if($v['i8n']=='zh_tw'&&$v['point']==0){?>
			<div class="leftAlist" >
				<INPUT TYPE="file" NAME="file_url[<?php echo $v['img_id'];?>-zh_tw]" id="f1" onclick="document.getElementById('edit_doc_zh_tw<?php echo $v['img_id'];?>').value=1">( 建议尺寸: 950 x 450 )
				<input type="hidden" name="edit_doc[<?php echo $v['img_id'];?>-zh_tw]" id="edit_doc_zh_tw<?php echo $v['img_id'];?>" value="0">
				<input type="hidden" name="img_id[<?php echo $v['img_id'];?>-zh_tw]" value="<?php echo $v['img_id'];?>">
            </div>
			<div class="leftAlist" >
				<img src=".<?php if(!empty($v['original_src'])){echo $v['original_src'];}else{echo '/img/no_img.jpg';}?>" />
            </div>
			<?php }}?>
			<?php }?>
            <div class="leftAlist">
            	<p>聯系方式</p>
				<textarea id="TextArea2" name="detail[zh_tw][]" class="ckeditor"><?php if(!empty($pro['zh_tw']['detail_arr'][1])){echo $pro['zh_tw']['detail_arr'][1];}?></textarea>
            	<script type="text/javascript">
					CKEDITOR.replace('TextArea2');
				</script>
            </div>
        </div>
        <div class="leftA">
            <input name="" type="submit" id="submit" value="DONE 完成" />
        </div>
	</div>
	</form>	
</div>

<?php }else{?>

<?php }?>
</body>
</html>