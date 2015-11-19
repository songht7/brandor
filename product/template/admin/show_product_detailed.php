<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="lib/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="lib/ckfinder/ckfinder.js"></script>
<title>无标题文档</title>
<script type="text/javascript">
$(function(){
	$('.r_top p').click(function(){
		$('.pathA').addClass('hide');
		$('.r_top p').removeClass('active');
		$(this).addClass('active');
		if($(this).html()=="ENGLISH"){
			$('.en_us').removeClass('hide');
		}else if($(this).html()=="简体"){
			$('.zh_tw').removeClass('hide');
		}
	});
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
</head>

<body>
<div class="status r_top">
	<P class="active">繁体</P>
</div>

<div class="content">
	<form name="theForm" id="demo" action="./index.php?a=product&m=edit_product&id=<?php echo $id;?>" method="post" enctype='multipart/form-data'>
	<input type="hidden" name="act" value="<?php echo $act;?>">
	<input type="hidden" name="c_id" value="<?php echo $c_id;?>">
	<input type="hidden" name="order_by" value="<?php if(!empty($product[0]['order_by'])){echo $product[0]['order_by'];}else{echo 50;}?>" />
	
	<div class="pathA zh_tw ">
    	<div class="leftA">
    		<input name="iid[zh_tw]" type="hidden" value="<?php if(!empty($pro['zh_tw']['goods_i8n_id'])){echo $pro['zh_tw']['goods_i8n_id'];}?>" />
			<div class="leftAlist" >
				<span>标题</span>
            </div>
            <div class="leftAlist">
            	<input name="title[zh_tw][]" type="text" class="text" value="<?php if(!empty($pro['zh_tw']['title'][0])){echo $pro['zh_tw']['title'][0];}?>" />
            </div>
            <?php if($c_id==21){?>
            <div class="leftAlist">
            	<input name="title[zh_tw][]" type="text" class="text" value="<?php if(!empty($pro['zh_tw']['title'][1])){echo $pro['zh_tw']['title'][1];}?>" />
            </div>
            <?php }?>
			<div class="leftAlist" >
				<span>预览图片</span>
            </div>
			<div class="leftAlist " >
			<?php if(!empty($imgs_p['zh_tw'])){?>
				<INPUT TYPE="file" NAME="file_url[<?php echo $imgs_p['zh_tw']['img_id'];?>-zh_tw-0]" id="f1" onclick="document.getElementById('edit_doc_zh_tw<?php echo $imgs_p['zh_tw']['img_id'];?>').value=1" class="">( 建议尺寸: 220 x 130 )
				<input type="hidden" name="edit_doc[<?php echo $imgs_p['zh_tw']['img_id'];?>-zh_tw-0]" id="edit_doc_zh_tw<?php echo $imgs_p['zh_tw']['img_id'];?>" value="0">
				<input type="hidden" name="img_id[<?php echo $imgs_p['zh_tw']['img_id'];?>-zh_tw-0]" value="<?php echo $imgs_p['zh_tw']['img_id'];?>">
			<?php }else{?>
				<INPUT TYPE="file" NAME="file_url[b1-zh_tw-0]" id="f1" onclick="document.getElementById('edit_doc_zh_twb1').value=1" class="">( 建议尺寸: 220 x 130 )
				<input type="hidden" name="edit_doc[b1-zh_tw-0]" id="edit_doc_zh_twb1" value="0">
				<input type="hidden" name="img_id[b1-zh_tw-0]" value="b1">
			<?php }?>
            	<br />
            	<br />
				<img src=".<?php if(!empty($imgs_p['zh_tw']['original_src'])){echo $imgs_p['zh_tw']['original_src'];}else{echo '/img/no_img.jpg';}?>" class="" />
				<div class="clear"></div>
            </div>
            
			<div class="leftAlist" id="File">
            	<p>项目图片</p>
            </div>
			<div class="leftAlist " >
            <?php if(!empty($imgs)){foreach($imgs as $k=>$v){if($v['i8n']=='zh_tw'&&$v['point']=='1'){?>
				<INPUT TYPE="file" NAME="file_url[<?php echo $v['img_id'];?>-zh_tw-1]" id="f1" onclick="document.getElementById('edit_doc_zh_tw<?php echo $v['img_id'];?>').value=1" class="">( 建议尺寸: 950 x 450 )
				<input type="hidden" name="edit_doc[<?php echo $v['img_id'];?>-zh_tw-1]" id="edit_doc_zh_tw<?php echo $v['img_id'];?>" value="0">
				<input type="hidden" name="img_id[<?php echo $v['img_id'];?>-zh_tw-1]" value="<?php echo $v['img_id'];?>">
            	<br />
            	<br />
				<img src=".<?php echo $v['original_src'];?>" class="" />
			<?php }}}else{?>
				<INPUT TYPE="file" NAME="file_url[b2-zh_tw-1]" id="f1" onclick="document.getElementById('edit_doc_zh_twb2').value=1" class="">( 建议尺寸: 950 x 450 )
				<input type="hidden" name="edit_doc[b2-zh_tw-1]" id="edit_doc_zh_twb2" value="0">
				<input type="hidden" name="img_id[b2-zh_tw-1]" value="b2">
            	<br />
            	<br />
				<img src="./img/no_img.jpg" class="" />
			<?php }?>
				<div class="clear"></div>
            </div>
            <?php if($c_id==21){?>
            <div class="leftAlist">
            	<p>商品</p>
            	<textarea name="detail[zh_tw][]" ><?php if(!empty($pro['zh_tw']['detail_arr'][0])){echo $pro['zh_tw']['detail_arr'][0];}?></textarea>
            </div>
            <div class="leftAlist">
            	<p>设计</p>
            	<textarea name="detail[zh_tw][]" ><?php if(!empty($pro['zh_tw']['detail_arr'][1])){echo $pro['zh_tw']['detail_arr'][1];}?></textarea>
            </div>
            <div class="leftAlist">
            	<p>品质</p>
            	<textarea name="detail[zh_tw][]" ><?php if(!empty($pro['zh_tw']['detail_arr'][2])){echo $pro['zh_tw']['detail_arr'][2];}?></textarea>
            </div>
            <div class="leftAlist">
            	<p>品类</p>
            	<input name="detail[zh_tw][]" type="text" value="<?php if(!empty($pro['zh_tw']['detail_arr'][3])){echo $pro['zh_tw']['detail_arr'][3];}?>" />
            </div>
            <div class="leftAlist">
            	<p>品种</p>
            	<input name="detail[zh_tw][]" type="text" value="<?php if(!empty($pro['zh_tw']['detail_arr'][4])){echo $pro['zh_tw']['detail_arr'][4];}?>" />
            </div>
            <div class="leftAlist">
            	<p>产地</p>
            	<input name="detail[zh_tw][]" type="text" value="<?php if(!empty($pro['zh_tw']['detail_arr'][5])){echo $pro['zh_tw']['detail_arr'][5];}?>" />
            </div>
            <div class="leftAlist">
            	<p>包装</p>
            	<input name="detail[zh_tw][]" type="text" value="<?php if(!empty($pro['zh_tw']['detail_arr'][6])){echo $pro['zh_tw']['detail_arr'][6];}?>" />
            </div>
            <div class="leftAlist">
            	<p>规格</p>
            	<textarea id="TextArea1" name="detail[zh_tw][]" ><?php if(!empty($pro['zh_tw']['detail_arr'][7])){echo $pro['zh_tw']['detail_arr'][7];}?></textarea>
            	<script type="text/javascript">
					CKEDITOR.replace('TextArea1');
				</script>
            </div>
            <div class="leftAlist">
            	<p>详细图片上传</p>
            	<textarea id="TextArea2" name="detail[zh_tw][]" ><?php if(!empty($pro['zh_tw']['detail_arr'][8])){echo $pro['zh_tw']['detail_arr'][8];}?></textarea>
            	<script type="text/javascript">
					CKEDITOR.replace('TextArea2',{
						filebrowserBrowseUrl :  'lib/ckfinder/ckfinder.html',  
						filebrowserImageBrowseUrl :  'lib/ckfinder/ckfinder.html?Type=Images',  
						filebrowserFlashBrowseUrl :  'lib/ckfinder/ckfinder.html?Type=Flash',  
						filebrowserUploadUrl :  'lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',  
						filebrowserImageUploadUrl  :  'lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',  
						filebrowserFlashUploadUrl  :  'lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'  
					});
				</script>
            </div>
            <?php }else{?>
            <div class="leftAlist">
            	<p>文字详细描述</p>
            	<textarea id="TextArea1" name="detail[zh_tw][]" ><?php if(!empty($pro['zh_tw']['detail_arr'][0])){echo $pro['zh_tw']['detail_arr'][0];}?></textarea>
            	<script type="text/javascript">
					CKEDITOR.replace('TextArea1');
				</script>
            </div>
            <div class="leftAlist">
            	<p>文字备注描述</p>
            	<textarea id="TextArea3" name="detail[zh_tw][]" ><?php if(!empty($pro['zh_tw']['detail_arr'][1])){echo $pro['zh_tw']['detail_arr'][1];}?></textarea>
            	<script type="text/javascript">
					CKEDITOR.replace('TextArea3');
				</script>
            </div>
            <div class="leftAlist">
            	<p>详细图片上传</p>
            	<textarea id="TextArea2" name="detail[zh_tw][]" ><?php if(!empty($pro['zh_tw']['detail_arr'][2])){echo $pro['zh_tw']['detail_arr'][2];}?></textarea>
            	<script type="text/javascript">
					CKEDITOR.replace('TextArea2',{
						filebrowserBrowseUrl :  'lib/ckfinder/ckfinder.html',  
						filebrowserImageBrowseUrl :  'lib/ckfinder/ckfinder.html?Type=Images',  
						filebrowserFlashBrowseUrl :  'lib/ckfinder/ckfinder.html?Type=Flash',  
						filebrowserUploadUrl :  'lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',  
						filebrowserImageUploadUrl  :  'lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',  
						filebrowserFlashUploadUrl  :  'lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'  
					});
				</script>
            </div>
            <?php }?>
			
        </div>
        <div class="leftA">
        	<div style="line-height:18px;position: absolute;" >显示</div>
        	<div style="left: 29px;position: absolute;" class="show_show show_show<?php if(!empty($product[0]['is_show'])){echo $product[0]['is_show'];}else{echo 0;}?>" value="you_show" ><input class="you_show" type="hidden" name="is_show" value="<?php if(!empty($product[0]['is_show'])){echo $product[0]['is_show'];}else{echo 0;}?>"></div>
            <input name="" type="submit" id="submit" value="DONE 完成" />
        </div>
        
	</div>
	</form>	
</div>

	<script type="text/javascript">
		$(function(){
			var k='a';
			var i=1;
			var key;
			var lang;
			$(".add").click(function(){
				key=k+i;
				lang=$(this).attr('key');
				var addFile = '<div class="leftAlist r_detail" ><div class="r_row"><div class="r_title">Photo 图片</div><INPUT TYPE="file" NAME="file_url['+key+'-'+lang+'-1]" id="f1" onclick="document.getElementById(\'edit_doc_'+lang+''+key+'\').value=1">( Suggested size 建议尺寸: 717 x 506 )<input type="hidden" name="edit_doc['+key+'-'+lang+'-1]" id="edit_doc_'+lang+''+key+'" value="0"><input type="hidden" name="img_id['+key+'-'+lang+'-1]" value="'+key+'"><a href="javascript:void(0);" class="del">DELETE 删除</a></div><div class="r_row"><div class="r_title">Sequence 排序</div><input type="text" class="r_text" name="order_by['+key+'-'+lang+'-1]" value="50"></div></div>';
				$(this).parent().parent().parent().append(addFile);
				i++;
			});
			
			$('.del').live('click',function(){
				$(this).parent().parent().detach();
			});
			$('.delv').live('click',function(){
				$(this).next().attr('value','del');
				$(this).parent().parent().hide();
			});
		});
		
	</script>
</body>
</html>