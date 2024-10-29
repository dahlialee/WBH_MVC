<div class="container-fluid form" style="padding: 20px">
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-6">
			<legend>Thông tin giao hàng</legend>
			<i>Giao hàng tận nhà chỉ áp dụng ở Hà Nội</i>
			<div class="form-group">
				<label for="">Tên: </label>
				<input type="text" class="form-control" id="ten" name="ten" value="">
			</div>
			<div class="form-group">
				<label for="">Số điện thoại: </label>
				<input type="number" class="form-control" name="sodt" id="order_tel" value="">
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
			
		</div>
		<div class="col-sm-4">
			<h4><?php echo $title; ?></h4>
			<hr style="border: 1px solid #337ab7;">
			<form action="client/order" method="GET">
				<table class="table" style="font-size: 14px; background-color: #eaeaea">
					<thead>
						<tr>
							<th>Ảnh</th>
							<th>Tên sản phẩm</th>
							<th>Đơn giá</th>
							<th>Số lượng</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><img src="public/images/<?php echo $data['anhchinh']; ?>" class='sanpham' data-masp='<?php echo $data['masp'] ?>' style="width: 80px"></td>
							<td><?php echo $data['tensp'] ?></td>
							<td class="prices" data-price='<?php echo $data['gia'] ?>'><?php echo $data['gia'] ?></td>
							<td><input type="number" class="num" data-type='buynow' name="num[]"  value="1" class="form-control" style="width: 80px;" min='1'></td>
						</tr>
						<tr>
							<td colspan="3" style="text-align: right;">
								<h3><b>Tổng tiền: </b><span id='totalPrice' style="color: red; font-size: 28px;"></span> VND</h3>
							</td>
							<td>
								<a id='orderCompleteBtn' class="btn btn-primary btn-lg pull-right">Xác nhận</a><br><br>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>
<script>
	var price = 0;
	$('.prices').each(function(){
		price += parseInt($(this).data('price').replace(/\s/g,''));
	})
	price = price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
	$('#totalPrice').text(price);
	countPrice();
</script>