<?php
/**
 * 
 * @author songht
 *
 */
class home extends init
{
	function __construct()
	{
		parent::__construct();
		$tmp = MANAGE_TEMPLATE.'main.php';
		
	}
	function index(){
			$title="首页";
			$base=$this->base();
			$sql="select * from ".$this->table_name("img")." where type_id='29' and type='C' and is_show='1' ";
			$bg=getFetchAll($sql,$this->conn);
			
			$sql="select c.*,i.cat_name,img.original_src from ".$this->table_name("category")." as c "
				." left join ".$this->table_name("category_i8n")." as i on i.cat_id=c.cat_id "
				." left join ".$this->table_name("img")." as img on img.type_id=c.cat_id "
				." where c.cat_id in (26,27,28) and img.type='C' and img.point='0' order by order_by asc";/*7,*/
			$cat=getFetchAll($sql,$this->conn);
			
			$sql="select g.*,i.goods_name,img.original_src from ".$this->table_name("goods")." as g "
				." left join ".$this->table_name("goods_i8n")." as i on i.goods_id=g.goods_id "
				." left join ".$this->table_name("img")." as img on img.type_id=g.goods_id "
				." where g.cat_id in (21) and g.is_show='1' and img.type='P' and img.point='0' order by order_by desc";/* limit 0,4*/
			$goods=getFetchAll($sql,$this->conn);
			
			$sql="select g.*,i.goods_name,img.original_src from ".$this->table_name("goods")." as g "
				." left join ".$this->table_name("goods_i8n")." as i on i.goods_id=g.goods_id "
				." left join ".$this->table_name("img")." as img on img.type_id=g.goods_id "
				." where g.cat_id in (25) and g.is_show='1' and img.type='P' and img.point='0' order by order_by desc";/* limit 0,8*/
			$goods_l=getFetchAll($sql,$this->conn);
			//pr($goods);die;
			$tmpPath = $this->sysVar['template'].'html/index.xxx';
			include($tmpPath);
		}
	function contact(){
			$base=$this->base();
			$where=" a.art_id=20 ";
			$where2=" and type_id=20 ";
			$sql="select * from ".$this->table_name("article_i8n")." as ai ".
				" left join ".$this->table_name("article")." as a on a.art_id=ai.art_id ".
				" where ".$where;
			$share=getFetchRow($sql,$this->conn);
			
			$sql="select * from ".$this->table_name("img")." ".
				" where type='A' ".$where2." ";
			$img=getFetchAll($sql,$this->conn);
			
			
			$title=$share['art_name'];
			$tmpPath = $this->sysVar['template'].'html/contact.xxx';
			include($tmpPath);
		}
	
	function category(){
			$base=$this->base();
			$id=addslashes($_GET['id']);
			$sql="select c.*,i.cat_name from ".$this->table_name("category")." as c "
				." left join ".$this->table_name("category_i8n")." as i on i.cat_id=c.cat_id "
				." where c.cat_id in (".$id.") ";
			$cat=getFetchRow($sql,$this->conn);
			
			$title=$cat['cat_name'];
			
			$sql="select * from ".$this->table_name("img")." where type_id='".$id."' and point='1' and type='C' and is_show='1' ";
			$bg=getFetchAll($sql,$this->conn);
			
			$sql="select g.*,i.goods_name,img.original_src from ".$this->table_name("goods")." as g "
				." left join ".$this->table_name("goods_i8n")." as i on i.goods_id=g.goods_id "
				." left join ".$this->table_name("img")." as img on img.type_id=g.goods_id "
				." where g.cat_id in (".$id.") and g.is_show='1' and img.type='P' and img.point='0' order by order_by desc ";
			$goods=getFetchAll($sql,$this->conn);
			
			$tmpPath = $this->sysVar['template'].'html/category.xxx';
				
			include($tmpPath);
		}
	
	function goods(){
			$base=$this->base();
			$id=addslashes($_GET['id']);
			$sql="select g.*,i.goods_name,i.goods_detail from ".$this->table_name("goods")." as g "
				." left join ".$this->table_name("goods_i8n")." as i on i.goods_id=g.goods_id "
				." where g.goods_id in (".$id.") ";
			$goods=getFetchRow($sql,$this->conn);
			if(!empty($goods)){
				$goods['title']=explode('<br />',$goods['goods_name']);
				$goods['detail_arr']=explode('":;"',$goods['goods_detail']);
				$pro=$goods;
			}
			
			$cat_id=$goods['cat_id'];
			
			$sql="select c.*,i.cat_name from ".$this->table_name("category")." as c "
				." left join ".$this->table_name("category_i8n")." as i on i.cat_id=c.cat_id "
				." where c.cat_id in (".$cat_id.") ";
			$cat=getFetchRow($sql,$this->conn);
			
			$sub_type=$cat['sub_type'];
			$title=$cat['cat_name'];
			
			$sql="select * from ".$this->table_name("img")." where type_id='".$id."' and point='1' and type='P'";
			$bg=getFetchRow($sql,$this->conn);
			
			$sql="SELECT g.goods_id FROM ".$this->table_name('goods')." as g "
				." left join ".$this->table_name("img")." as img on img.type_id=g.goods_id "
				." WHERE g.cat_id=".$cat_id." and img.type='P' and img.point='0' and g.is_show='1' AND ((g.goods_id>".$id." and g.order_by='".$goods['order_by']."')or g.order_by<'".$goods['order_by']."') order by g.order_by desc,g.goods_id asc LIMIT 1";
			$prev=getFetchRow($sql,$this->conn);
			
			$sql="SELECT g.goods_id FROM ".$this->table_name('goods')." as g "
				." left join ".$this->table_name("img")." as img on img.type_id=g.goods_id "
				." WHERE g.cat_id=".$cat_id." and img.type='P' and img.point='0' and g.is_show='1' AND ((g.goods_id<".$id." and g.order_by='".$goods['order_by']."')or g.order_by>'".$goods['order_by']."') order by g.order_by asc,g.goods_id desc LIMIT 1";
			$next=getFetchRow($sql,$this->conn);
			
			$tmpPath = $this->sysVar['template'].'html/goods.xxx';
				
			include($tmpPath);
		}
	
}