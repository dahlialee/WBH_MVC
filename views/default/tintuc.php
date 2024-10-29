<div id="content">
	<div class="container-fluid" background-position= "center" !important;>
		<div class="row">
			<div class="col-sm-12 all-product" id="prdCtn">
				<h3 class="content-menu">
					<?php echo 'Tin tức'; ?>
				</h3>
                <?php
				for ($i=0; $i < count($data); $i++){
					?>

				    <div class='product-container' onclick="Display_PrdDetail1('<?php echo $data[$i]['matt'] ?>')">
						<a data-toggle='modal' href='tintuc/PrdDetail1/<?php echo $data[$i]['matt'] ?>' data-target='#modal-id'>
							<div style="text-align: center;" class='product-img'>
								<img src='public/images/<?php echo $data[$i]['hinhanh'] ?>'  height="200" wight="200">
							</div>
							<div class='product-info'>
								<h4><b><?php echo $data[$i]['tentt']; ?></b></h4>
								<b class='price'><a data-toggle='modal' href="tintuc/PrdDetail1/<?php echo $data[$i]['matt'] ?>" style="color: brown;" data-target='#modal-id'><span>(xem thêm)</span></a></b>
							</div>
						</a>
                    </div>
                <?php } ?>
			</div>
		</div>
	</div>	
</div>
<!-- <div class="container-fluid text-center" style="padding: 15px;">
	<div class="row">
		<div class="col-sm-12">
			<button id="loadmoreBtn" onclick="loadmore(8)" class="snip1582">Load more</button>
		</div>
	</div>
</div> -->
