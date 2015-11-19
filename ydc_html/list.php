<?php include("./header.php");?>

<script src="../script/slide.js"></script>

<?php include("./menu.php");?>
<div id="Main">
	<div class="slideShow">
		<div class="slideMain">
			<ul class="slideImg clearfix">
				<li class="ssList active"><a href="javascript:void(0)"><img src="../images/bls/imgs/img01.jpg" alt="" width="978" height="463" /></a></li>
				<li class="ssList" style="display: none;"><a href="javascript:void(0)"><img src="../images/bls/imgs/img02.jpg" width="978" height="463"  alt=""/></a></li>
				<li class="ssList" style="display: none;"><a href="javascript:void(0)"><img src="../images/bls/imgs/img03.jpg" width="978" height="463" alt=""/></a></li>
			</ul>
		</div>
	</div>

	<div class="contBox">

		<div class="pageRow">
			<div class="ctgListBox">
				<!-- 列表标题 -->
				<div class="ctgTitle case">案例 branding case</div>
				<div class="ctgTitle brand">何为品牌 whan is a brand</div>
				<div class="ctgTitle method">博朗狮 brandor method</div>
				<div class="ctgTitle news">博朗狮 brandor news</div>
				<div class="ctgTitle about">博朗狮 about brandor</div>
				<!-- /列表标题 -->

				<div class="ctgList clearfix">
					<!--全部案例-->
					<?php $r=1; for($i=0;$i<12;$i++){ ?>
					<div class="ctgBlock <?php if($r%4==0){ ?> blockRight <?php } ?>">
						<a href="detail.php" class="ctgImg"><img class="pic" src="../images/bls/imgs/img04.jpg" width="222" height="131" alt="<div class='pro_title_block'><p>华润慈善基金</p><p>abc</p></div>"/></a>
					</div>
					<?php $r++;} ?>
					<!-- / -->
				</div>

			</div>
		</div>

	</div>
</div>
<?php include("./footer.php");?>