<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
	<div class="container-fluid form" style="margin-top: -23px; padding: 20px">
		<div class="row">
			<div class="col-sm-12">
				<div class="main-prd">
					<img src="public/images/<?php echo $data['anhchinh'] ?>" class="main-prd-img">
					<div class="basic-info">
						<h2><?php echo $data['tensp'] ?></h2>
						<span class="main-prd-price"><?php echo $data['gia'] ?> VND</span>
						<h4><b>Thông tin cơ bản</b></h4>
						<ul>
							<li>Kích thước: <?php echo $data['kichthuoc'] ?></li>
							<li>Ngày sản xuất: <?php echo $data['nsx'] ?></li>
							<li>Hạn sử dụng: <?php echo($data['hsd'])?> </li>
							<li>Lượt mua: <?php echo $data['luotmua'] ?></li>
							<li><span class="km">Khuyến mãi: <?php echo $data['khuyenmai'] ?> %</span></li>
							<br><a class="btn btn-primary" href="client/buynow/<?php echo $data['masp'] ?>">Mua ngay</a>
						</ul>
					</div>
				</div>

				<div style="clear: both;"></div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>