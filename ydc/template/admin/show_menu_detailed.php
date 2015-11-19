<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/javascript.js"></script>
<script type="text/javascript" src="js/yanzheng.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
    
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
	<p><?php if($act=='add'){echo '新增';}else{echo '编辑';}?>菜单</p>
</div>
<div class="status">
	<P>菜单信息填写:</P>
</div>
<div class="content">
	<form name="theForm" id="demo" action="./index.php?a=menu&m=edit_menu&productid=<?php echo $product[0]['menu_id'];?>" method="post" enctype='multipart/form-data'>
	<input type="hidden" name="act" value="<?php echo $act;?>">
	<div class="pathA">
    	<div class="leftA">
            <div class="leftAlist">
            	名称:<input style="border:#9DB7CE solid 1px;" name="title" type="text" value="<?php echo $products[0]['menu_name'];?>" />
    			<input name="iid" type="hidden" value="<?php echo $products[0]['menu_i8n_id'];?>" />
            </div>
    		<div>
            	详细:
            	<?php
								$a=new FCKeditor("info");
								$a->Value=$products[0]['menu_detail'];
								$a->Create();
							?>
            	<br />
            </div>
            <div class="leftAlist" id="File">
    			连接种类:<select name="p_link" style="border:#9DB7CE solid 1px;" id="p_link"  >
            					<option <?php if($type=='0'){echo "selected";}?> value="0">自定义连接</option>
            					<option <?php if($type=='category'){echo "selected";}?> value="category">分类</option>
            					<option <?php if($type=='article'){echo "selected";}?> value="article">文章</option>
            					<option <?php if($type=='goods'){echo "selected";}?> value="goods">商品</option>
            				</select>
            	连接:<input name="goods_sn" id="lucy_text" type="text" style="border:#9DB7CE solid 1px;<?php if($type!='0'){echo "display:none;";}?>" value="<?php echo $product[0]['link'];?>" /><img id="lucy_loading" src="img/loading2.gif" style="display:none;" />
    					<select name="goods_sn1" id="lucy_select" style="border:#9DB7CE solid 1px;<?php if($type=='0'){echo "display:none;";}?>">
    						<?php echo $data['data'];?>
    					</select>
            	<br />	
            	上级菜单:<select name="p_id" style="border:#9DB7CE solid 1px;"  >
            					<option value="0">顶级</option>
    <?php if(!empty($mm)){foreach($mm as $k=>$v){?>
            					<option <?php if($v['menu_id']==$product[0]['parent_id']){?> selected <?php }?>value="<?php echo $v['menu_id'];?>"><?php for($i=0;$i<$v['level'];$i++){echo "&nbsp;";};?><?php echo $v['menu_name'];?></option>
	<?php }}?>
            				</select>
            	<br />
            	排序:<input name="order_by" type="text" style="border:#9DB7CE solid 1px;" value="<?php echo $product[0]['order_by'];?>" />
            	位置:<select name="parent_id" style="border:#9DB7CE solid 1px;"  >
            					<option value="top" <?php if($product[0]['type']=="top"){echo "selected=selected";} ?>>顶部</option>
            					<option value="middle" <?php if($product[0]['type']=="middle"){echo "selected=selected";} ?>>中间</option>
            					<option value="middle2" <?php if($product[0]['type']=="middle2"){echo "selected=selected";} ?>>中间2</option>
            					<option value="mobile_up_down" <?php if($product[0]['type']=="mobile_up_down"){echo "selected=selected";} ?>>手机上下</option>
            					<option value="down" <?php if($product[0]['type']=="down"){echo "selected=selected";} ?>>底部</option>
            				</select>
            	是否显示:<select name="is_show" style="border:#9DB7CE solid 1px;"  >
            					<option value="0" <?php if($product[0]['is_show']=="0"){echo "selected=selected";} ?>>not show</option>
            					<option value="1" <?php if($product[0]['is_show']=="1"){echo "selected=selected";} ?>>show</option>
            				</select>
            	<br />
				<span>文档/图片:</span><br /><INPUT TYPE="file" NAME="file_url[]" id="f1">排序:<INPUT TYPE="text" NAME="img_by[]" value="50">图片名:<INPUT TYPE="text" NAME="img_name[]" value=""><a href="javascript:void(0)" class="add">+</a>
            </div>
        </div>
        <div class="leftA">
            <div class="leftAlist">
            	名称:<input style="border:#9DB7CE solid 1px;" name="title_c" type="text" value="<?php echo $products[1]['menu_name'];?>" />
    			<input name="iid_c" type="hidden" value="<?php echo $products[1]['menu_i8n_id'];?>" />
            </div>
    		<div>
            	详细:
            	<?php
								$a=new FCKeditor("info_c");
								$a->Value=$products[1]['menu_detail'];
								$a->Create();
							?>
            	<br />
            </div>
            <div class="leftAlist">
	            <table id="img_list"></table>
            </div>
        </div>
        <div class="leftA">
            <div class="leftAlist">
            	名称:<input style="border:#9DB7CE solid 1px;" name="title_t" type="text" value="<?php echo $products[2]['menu_name'];?>" />
    			<input name="iid_t" type="hidden" value="<?php echo $products[2]['menu_i8n_id'];?>" />
            </div>
    		<div>
            	详细:
            	<?php
								$a=new FCKeditor("info_t");
								$a->Value=$products[2]['menu_detail'];
								$a->Create();
							?>
            	<br />
            </div>
            <div class="leftAlist">
	    		
            	<input name="" type="submit" id="button" value="添加"  style="margin-left:80%;" />
            </div>
        </div>
	</div>
	</form>	

    	
        
</div>
 <script type="text/javascript">
		$(function(){
			var f=2;
			$(".add").click(function(){
				var addFile = '<div><INPUT TYPE="file" NAME="file_url[]" id="f'+f+'">排序:<INPUT TYPE="text" NAME="img_by[]" value="50">图片名:<INPUT TYPE="text" NAME="img_name[]" value=""><a href="javascript:void(0)" class="del" onclick="del(this)">-</a></div>';
				$("#File").append(addFile);
				f++;
			});
			$("#p_link").change(function(){
				if(this.value==0){
					$("#lucy_text").show();
					$("#lucy_select").hide();
				}else{
					$("#lucy_text").hide();
					$("#lucy_loading").show();
					var p_link=this.value;
					var url="./index.php?a=menu&m=get_p_link";
					var data={p_link:p_link};
					$.post(url,data,ajax_p_link_success,'json')

				}
			});
			get_img("<?php echo $product[0]['menu_id'];?>");
		});
		function del(t){
			$(t).parent().detach();
		}
		function ajax_del(t){
			if(confirm('delete this picture?')){
				var id=$(t).attr('id');
				var url="./index.php?a=menu&m=del_picture";
				var data={id:id};
				$.post(url,data,ajax_del_success,'json')
			}else{
				return false;
			}
			
		}
		var ajax_del_success = function (data){
			alert(data.say);
			$("#"+data.id).parent().detach();
		}
		var ajax_p_link_success = function (data){
			//alert(data.say);
			$("#lucy_loading").hide();
			$("#lucy_select").html(data.data).show();
			
		}
		function set_top(t){
			if(confirm('是否将此图片设置为封面？')){
				var id=$(t).attr('id');
				var url="./index.php?a=menu&m=set_top";
				var data={id:id};
				$.post(url,data,set_top_success,'json')
			}else{
				return false;
			}
		}
		var set_top_success = function (data){
			alert(data.say);
			get_img("<?php echo $product[0]['menu_id'];?>");
		}
		var get_img=function(id){
			var url="./index.php?a=menu&m=get_img";
			var data={id:id};
			$.post(url,data,get_img_success,'json')
		}
		var get_img_success=function(data){
			$('#img_list').html(data.html);
		}
	</script>
	<style>
		.add,.del{padding:0 5px}
	</style>
</body>
</html>