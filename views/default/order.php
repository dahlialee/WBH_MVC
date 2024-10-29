<div class="container-fluid">
	<form action="" method="POST" role="form" style="padding: 20px 0;">
		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-6">
				<legend>Thông tin giao hàng</legend>
				<i>Giao hàng tận nhà chỉ áp dụng ở Hà Nội</i>
				<div class="form-group">
				<label for="">Tên: </label>
				<input type="text" class="form-control" id="ten" name="ten" value="">
			</div>
			<div class="form-group">
				<label for="">Số điện thoại: </label>
				<input type="number" class="form-control" name="sdt" id="order_tel" value="">
			</div>
			<div class="form-group">
				<label for="">Quận: </label>
				<select class="form-control" name="quan" id="quan">
					<option  value="Thanh Xuân">Thanh Xuân</option>
					<option  value="Ba Đình">Ba Đình</option>
					<option  value="Cầu Giấy">Cầu Giấy</option>
					<option  value="Hai Bà Trưng">Hai Bà Trưng</option>
					<option  value="Hoàn Kiếm">Hoàn Kiếm</option>
					<option  value="Hoàng Mai">Hoàng Mai</option>
					<option  value="Long Biên">Long Biên</option>
					<option  value="Hà Đông">Hà Đông</option>
					<option  value="Tây Hồ">Tây Hồ</option>
					<option  value="Nam Từ Liêm">Nam Từ Liêm</option>
					<option  value="Bắc Từ Liêm">Bắc Từ Liêm</option>
					<option  value="Đống Đa">Đống Đa</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Địa chỉ cụ thể: </label>
				<input type="text" class="form-control" name="dc" id="addr"  value="">
			</div>
				<a id="orderCompleteBtn" class="btn btn-primary btn-lg pull-right" onclick="register()">Xác nhận</a><br><br>
			</div>

			<div class="col-lg-4">
				<h4>Thông tin đơn hàng</h4>
				<table class="table" style="font-size: 14px; background-color: #eaeaea">
					<tbody>
						<?php for($i = 0; $i < count($data); $i++){ ?>
						<tr>
							<td><img src="public/images/<?php echo $data[$i]['anhchinh']; ?>"  class='sanpham' data-masp='<?php echo $data[$i]['masp'] ?>' style="width: 50px"></td>
							<td><?php echo $data[$i]['tensp'] ?></td>
							<td class="prices" data-price='<?php echo $data[$i]['gia'] ?>'><?php echo $data[$i]['gia']." x "; ?><input type="number" name="num[]" class="num" value="<?php echo $data[$i]['num'] ?>" style="width: 40px"></td>
						</tr>
						<?php } ?>
						<tr>
							<td colspan="4" style="text-align: right;">
								<h3><b>Tổng tiền: <span style="color: red"></b><span id='totalPrice' style="color: red; font-size: 28px;"><?php echo number_format($title, 0, ',', ' ') ?></span></span> VND</h3>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</form>
</div>
