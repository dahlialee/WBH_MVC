<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="container-fluid form" style="margin-top: -23px; padding: 20px">
		<div class="row">
			<div class="col-sm-12">
				<div class="main-prd" >
					<img src="public/images/<?php echo $data['hinhanh'] ?>" class="main-prd-img" wight="1000">
					<div class="basic-info">
						<h2><?php echo $data['tentt'] ?></h2>
						
					</div>
				</div>

				<div style="clear: both;"></div>

				<div class="introduce-prd"> 
					<h3>Nội dung</h3>
					<p><?php echo $data['noidung'] ?></p>
					
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>