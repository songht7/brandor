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
		<div class="pageRow rowBlock">
			<div class="ctgBlock">
				<a href="list.php" class="ctgLink ctgLink1"><span>博朗狮动态 Brandor News</span></a>
				<a href="list.php" class="ctgImg">
					<img class="pic" src="../images/bls/imgs/img04.jpg" width="222" height="131" />
				</a>
			</div>
			<div class="ctgBlock">
				<a href="list.php" class="ctgLink ctgLink2"><span>博朗狮品牌 What`s a Brand?</span></a>
				<a href="list.php" class="ctgImg">
					<img class="pic" src="../images/bls/imgs/img04.jpg" width="222" height="131" />
				</a>
			</div>
			<div class="ctgBlock">
				<a href="list.php" class="ctgLink ctgLink3"><span>博朗狮方法 Brandor Method</span></a>
				<a href="list.php" class="ctgImg">
					<img class="pic" src="../images/bls/imgs/img04.jpg" width="222" height="131" />
				</a>
			</div>
			<div class="ctgBlock ctgLast">
				<a href="list.php" class="ctgLink ctgLink4"><span>博朗狮能力 About Brandor</span></a>
				<a href="list.php" class="ctgImg">
					<img class="pic" src="../images/bls/imgs/img04.jpg" width="222" height="131" />
				</a>
			</div>
			<div class="clearn"></div>
		</div>


		<div class="pageRow">
			<div class="ctgListBox">
				<div class="ctgTitle case">案例 branding case</div>
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