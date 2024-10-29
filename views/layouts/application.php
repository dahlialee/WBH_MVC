<?php
if(isset($_COOKIE['user']) && !isset($_SESSION['user'])){
	header('location: user/rememberLogin');
}
?>
<html lang="en">
<head>
	<title> AUGUST - Tiệm bánh tháng 8! </title>
	<meta charset="utf-8">
	<base href="/WBH_MVC/">
	<!-- <link rel="SHORTCUT ICON"  href=> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="public/css/style.css">

	<!-- File css -> file js -> file jquery -->
	<!-- Put script after jquery -->
	<link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
	<script src="public/jquery/jquery-latest.js"></script>
	<script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="public/script/script.js"></script>

	<!-- font used in this site -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet"> -->
	<link rel="stylesheet" type="text/css" href="public/animate.css">

</head>
<body>
	<header id='header'>
		<a href=""><img src="public/images/logo.png"><h2 class="logo">AUGUST</h2></a>
		<ul class="header-menu">
			<?php
			if((!isset($_SESSION['user']))){ ?>
			<!-- if(($_SESSION['user']) == ""){ ?> -->
			<li><a href="index/signin" id="s-s" data-stt='nosignin'>Đăng nhập</a><div class='mn-ef'></div></li>
			<li><a href="index/signup">Đăng ký</a><div class='mn-ef'></div></li>
			<?php } else { ?>
			<li><a onclick="$('#user-setting').toggle()" id="s-s">Chào <?php echo $_SESSION['user']['ten'] ?></a><div class='mn-ef'></div></li>
			<div id='user-setting'>
				<ul>
					<a href="user/logout"><li>Đăng xuất</li></a>
					<a href="user/viewinfo"><li onclick="$('#user-setting').toggle()">Thông tin tài khoản</li></a>
					<a href="user/vieweditpassword"><li>Đổi mật khẩu</li></a>
				</ul>
			</div>
			<?php }
			?>
			<li><a href="client/viewcart"><i class="glyphicon glyphicon-shopping-cart"></i> Giỏ hàng</a><div class="mn-ef"></div></li>
		</ul>
		<div class="header-detail">
			<p>54 Triều Khúc, Thanh Xuân, Hà Nội<br>
				<i>8h - 22h Hằng ngày, kể cả Ngày lễ và Chủ nhật</i>
			</p>
		</div>
	</header>

	<nav class="navbar navbar-default" role="navigation" id="nav">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand logomini" href="">AUGUST</a>
				<div id="custom-search-input">
					<div class="input-group col-md-12" style="background-color: white;">
						<input type="text" class="form-control input-lg" placeholder="Bạn tìm gì?" id='src-v' />
						<span class="input-group-btn">
							<button class="btn btn-info btn-lg" type="button">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</span>
					</div>
				</div>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="dropdown menu-name">
						<a class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;">Danh mục sản phẩm <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="product/List/All">Tất cả sản phẩm</a></li>
							<?php 
							require_once 'vendor/Model.php';
							require_once 'models/admin/categoryModel.php';
							$md = new categoryModel;
							$data = $md->getAllCtgrs();
							for ($i=0; $i < count($data); $i++) { 
								$shortname = preg_replace('/\s+/', '', ucfirst($data[$i]['tendm']));
								?>
								<li><a href="product/List/<?php echo $shortname ?>"><?php echo $data[$i]['tendm'] ?></a></li>
							<?php } ?>
						</ul>
					</li>
					<li class="menu-name" id="dgg"><a href="product/List/OnSale">Đang giảm giá</a></li>
					<li class="menu-name" id="spm"><a href="product/List/Newest">Sản phẩm mới</a></li>
					<li class="menu-name" id="mntq"><a href="product/List/BestSelling">Mua nhiều tuần qua</a></li>
					<li class="menu-name" id="mntq"><a href="tintuc">Tin tức</a></li>
					
				</ul>
				<div style="cursor: pointer;"><a href="client/viewcart" style="color: brown"><i class="glyphicon glyphicon-shopping-cart navbar-right btn-lg" id="cart_count"> 
					<?php if(isset($_SESSION['cart'])){echo count($_SESSION['cart']);} else echo "0"; ?>
				</i></a></div>
				<div class="navbar-form navbar-right searchbox-desktop">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Bạn tìm gì?" id='srch-val'>
					</div>
					<span class="btn btn-primary" id="searchBtn">Tìm</span>
				</div>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>

	<div id="bodyContainer">
		<?php echo $content; ?>
	</div>


	<div class="modal fade" id="modal-id" data-remote="" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content" id="modal-sanpham">


				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8" style="text-align: center; padding: 20px 0;">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.218869870955!2d105.79549687400771!3d20.983861889321556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc6c44959d5%3A0xd7edcdb815622dd1!2zNTQgUC4gVHJp4buBdSBLaMO6YywgVGhhbmggWHXDom4gTmFtLCBUaGFuaCBYdcOibiwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1713334313603!5m2!1svi!2s" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
				<div class="col-lg-4" id="contact">
					<h3>Contact</h3>
					<i class="glyphicon glyphicon-map-marker"></i><span> Triều Khúc, Thanh Xuân, Hà Nội</span><br>
					<i class="glyphicon glyphicon-earphone"></i><span> 0376 390 962 </span><br>
					<i class="glyphicon glyphicon-envelope"></i><span> Dahlia@gmail.com</span><br>
					<h4 style="line-height: 26px">Nhận email thông báo của chúng tôi khi có sản phẩm mới hay chương trình:</h4>
					<form action="" method="POST" class="form-inline" role="form">
						<div class="form-group">
							<label class="sr-only" for="">label</label>
							<input type="email" class="form-control" id="" placeholder="your_email@example.com">
						</div>
						<span class="btn btn-primary" onclick="alert('Bạn sẽ nhận được thông báo của chúng tôi khi có ưu đãi mới!')">Gửi</span>
					</form>
				</div>
				<div class="col-lg-12" id="copyright-txt">
					<b>All right reverse, &#169; copyright of August.com</b>
				</div>
			</div>
		</div>
	</footer>
	<div class="goTop">
		<a href="#header">
			<h5 style="color: white" class="glyphicon glyphicon-menu-up"></h5>
		</a>
	</div>
</body>
</html>

