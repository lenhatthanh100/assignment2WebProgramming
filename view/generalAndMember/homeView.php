<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Trang chủ</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>	
</head>
<body>
	<!-- Import thêm navbar -->
	<?php
	if(isset($_COOKIE["user"])) {
		$userObject = unserialize($_COOKIE["user"]);
		// Trường hợp tài khoản member
		if ($userObject->kind_account == 1) {
			include 'navbarMember.php';
		}
		// Trường hợp tài khoản staff, admin dùng URL để truy cập
		else {
			header("location:../404.php");
		}	
	}
	// Trường hợp chưa đăng nhập
	else {
		include 'navbarGeneral.php';
	}	
	?>
	<!-- Nội dung trang chủ -->
	<div>
		<!-- Carousel -->
		<div id="demo" class="container carousel slide marginTop" data-ride="carousel">
			<!-- Indicators -->
			<ul class="carousel-indicators">
		    	<li data-target="#demo" data-slide-to="0" class="active"></li>
		    	<li data-target="#demo" data-slide-to="1"></li>
		    	<li data-target="#demo" data-slide-to="2"></li>
		  	</ul>		  
			<!-- The slideshow -->
		  	<div class="carousel-inner">
			    <div class="carousel-item active scaleImage">
			      	<img src="../img/carousel_team.png" alt="carousel_team">
			    </div>
			    <div class="carousel-item scaleImage">
			     	<img src="../img/carousel_landmark2.jpg" alt="carousel_landmark2">
			    </div>
			    <div class="carousel-item scaleImage">
			      	<img src="../img/carousel_vinfast.jpg" alt="carousel_vinfast">
			    </div>
			</div>		  
			<!-- Left and right controls -->
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
	    		<span class="carousel-control-prev-icon"></span>
	  		</a>
			<a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>
		<!-- Nội dung -->
		<div class="container mt-3">
			<div class="row">
				<!-- Tầm nhìn, sứ mệnh và giá trị cốt lõi -->
				<div class="col-md-4 tableHome scaleTrangChu">
			  		<h2>GIÁ TRỊ CỐT LÕI</h2>
					<p class="text-dark">Vingroup định hướng phát triển thành một Tập đoàn Công nghệ - Công nghiệp – Thương mại Dịch vụ hàng đầu khu vực Những sản phẩm của Vingroup phải luôn mang giá trị cốt lõi.</p>
					<img src="../img/tamNhin.jpg" class="img-thumbnail" alt="tamNhin">
				</div>
				<!-- Đội ngũ nhân viên -->
				<div class="col-md-4 tableHome scaleTrangChu">
			  		<h2>ĐỘI NGŨ NHÂN SỰ</h2>
			  		<p class="text-dark">Trải qua chặng đường dài trưởng thành và phát triển, chính những con người Vingroup đã làm nên những giá trị tốt đẹp, đóng góp vào thành công của Tập đoàn hôm nay.</p>
			  		<img src="../img/nhanSu.jpg" class="img-thumbnail" alt="nhanSu">
				</div>
				<!-- Đối với khách hàng -->
				<div class="col-md-4 tableHome scaleTrangChu">
			  		<h2>ĐỐI VỚI KHÁCH HÀNG</h2>
					<p class="text-dark">Tạo nên những sản phẩm, dịch vụ có chất lượng tối ưu, mang lại sự hài lòng cho khách hàng ở mức độ cao nhất. Gây dựng niềm tin lâu bền chính là phương hướng mà VinGroup hướng đến.</p>
					<img src="../img/khachHang.png" class="img-thumbnail" alt="khachHang">
				</div>
			</div>
		</div>
	</div>
	<!-- Import thêm footer -->
    <?php
	if(isset($_COOKIE["user"])) {
		$userObject = unserialize($_COOKIE["user"]);
		// Trường hợp tài khoản member
		if ($userObject->kind_account == 1) {
			include 'footerMember.php';
		}
		// Trường hợp tài khoản staff, admin dùng URL để truy cập
		else {
			header("location:../404.php");
		}
	}
	// Trường hợp chưa đăng nhập
	else {
		include 'footerGeneral.php';
	}	
	?>
</body>
</html>