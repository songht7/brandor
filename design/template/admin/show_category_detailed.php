<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(function(){
		$('.show_show').click(function (){
			var val=$(this).find('input').attr('value');
			var val2=1;
			if(val==1){val2=0;}
			if($(this).attr('value')=='you_show'){
				$('.you_show').parent().removeClass('show_show'+val);
				$('.you_show').parent().addClass('show_show'+val2);
				$('.you_show').attr('value',val2);
			}else{
				$(this).removeClass('show_show'+val);
				$(this).addClass('show_show'+val2);
				$(this).find('input').attr('value',val2);
			}
			
		});
});
</script>
<title>无标题文档</title>
</head>

<body>
<div class="status r_top">
	<P class="active">繁体</P>
</div>
<div class="content">
	<form name="theForm" id="demo" action="./index.php?a=category&m=edit_category&id=<?php echo $product[0]['cat_id'];?>" method="post" enctype='multipart/form-data'>
	
	<div class="pathA zh_tw ">
    	<div class="leftA">
			<?php if(!empty($imgs)){?>
			<div class="leftAlist" >
				<span>轮播图片</span>
            </div>
			<?php foreach($imgs as $k=>$v){if($v['i8n']=='zh_tw'&&$v['point']==1){?>
			<div class="leftAlist r_detail" >
				<div class="show_show show_show<?php if(isset($v['is_show'])){echo $v['is_show'];}else{echo 1;}?> r_show" >
					<input type="hidden" name="is_showi[<?php echo $v['img_id'];?>-zh_tw]" value="<?php if(isset($v['is_show'])){echo $v['is_show'];}else{echo 1;}?>">
				</div>
				<div class="r_row">
					<INPUT TYPE="file" NAME="file_url[<?php echo $v['img_id'];?>-zh_tw]" id="f1" onclick="document.getElementById('edit_doc_zh_tw<?php echo $v['img_id'];?>').value=1">( 建议尺寸: 950 x 450 )
					<input type="hidden" name="edit_doc[<?php echo $v['img_id'];?>-zh_tw]" id="edit_doc_zh_tw<?php echo $v['img_id'];?>" value="0">
					<input type="hidden" name="img_id[<?php echo $v['img_id'];?>-zh_tw]" value="<?php echo $v['img_id'];?>">
				</div>
				<div class="r_row">
					<div class="r_title">链接</div>
					<input type="text" class="r_text" name="original_link[<?php echo $v['img_id'];?>-zh_tw]" value="<?php echo $v['original_link'];?>">
					<img src=".<?php if(!empty($v['original_src'])){echo $v['original_src'];}else{echo '/img/no_img.jpg';}?>" />
				</div>
            </div>
			<?php }}?>
			<?php }?>
			<?php if(!empty($imgs)&&$id!=9&&$id!=1){?>
			<div class="leftAlist" >
				<span>封面图片</span>
            </div>
			<?php foreach($imgs as $k=>$v){if($v['i8n']=='zh_tw'&&$v['point']==0){?>
			<div class="leftAlist" >
				<INPUT TYPE="file" NAME="file_url[<?php echo $v['img_id'];?>-zh_tw]" id="f1" onclick="document.getElementById('edit_doc_zh_tw<?php echo $v['img_id'];?>').value=1">( 建议尺寸: 220 x 130 )
				<input type="hidden" name="edit_doc[<?php echo $v['img_id'];?>-zh_tw]" id="edit_doc_zh_tw<?php echo $v['img_id'];?>" value="0">
				<input type="hidden" name="img_id[<?php echo $v['img_id'];?>-zh_tw]" value="<?php echo $v['img_id'];?>">
            </div>
			<div class="leftAlist" >
				<img src=".<?php if(!empty($v['original_src'])){echo $v['original_src'];}else{echo '/img/no_img.jpg';}?>" />
            </div>
			<?php }}?>
			<?php }?>
			<?php if($id==1&&false){?>
			<div class="leftAlist" >
				<span>标签</span>
            </div>
			<div class="leftAlist" >
				<textarea name="detail[zh_tw][]"><?php echo $pro['zh_tw']['detail_arr'][0];?></textarea>
				<input type="hidden" name="iid[zh_tw]" value="<?php echo $pro['zh_tw']['cat_i8n_id'];?>">
            </div>
			<?php }?>
        </div>
        <div class="leftA">
            <input name="" type="submit" id="submit" value="DONE 完成" />
        </div>
	</div>
	</form>	
</div>
</body>
</html>