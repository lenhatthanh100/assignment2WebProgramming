<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Dịch vụ, sản phẩm</title>
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
	<!-- Thanh tìm kiếm -->
	<nav class="navbar navbar-expand-sm bg-light navbar-dark marginTop mr-0">
		<form class="form-inline ml-auto" action="/action_page.php">
			<input class="form-control mr-sm-2" type="text" placeholder="Search">
			<button class="btn btn-success" type="submit">Search</button>
		</form>
	</nav>
	<!-- Sản phẩm nổi bật -->
	<br>
	<div class="container">
  		<h3><span class="badge badge-danger">Sản phẩm nổi bật</span></h3>
  		<div class="row mt-3">
			<div class="col-md-4 px-3">
		  		<div class="gallery pb-3 scaleDichVuSanPham">
					<img src="../img/sanPhamNoiBat1.jpg" class="img-thumbnail scaleImageFullWidth" alt="sanPhamNoiBat1">
					<div class="desc"><p class="font-weight-bold mb-0">VINFAST LUX SA2.0</p></div>
					<p class="font-italic mx-2">Lux SA 2.0 được thiết kết bởi nhà thiết kế nổi tiếng của Ý Ital Design, Torino Design, Pininfarina, lấy cảm hứng và bản quyền thiết kế của BMW X5. Gầm xe cao mạnh mẽ, trang bị động cơ 2.0 Turbo công suất 228 MP.</p>
			  		<div class="text-center">
			  			<button type="button" class="btn btn-success position-absolute bottom-center" onclick="window.location.href='contactView.php'">LIÊN HỆ NGAY</button>
			  		</div>
				</div>			
			</div>
		  	<div class="col-md-4 px-3">
		  		<div class="gallery pb-3 scaleDichVuSanPham">
			  		<img src="../img/sanPhamNoiBat2.jpg" class="img-thumbnail scaleImageFullWidth" alt="sanPhamNoiBat2">
			  		<div class="desc"><p class="font-weight-bold mb-0">VSMART ACTIVE 3</p></div>
			  		<p class="font-italic mx-2">Ra mắt vào đầu năm 2020, Vsmart Active 3 (4GB/64GB) là một smartphone có hiệu năng ổn định, thời lượng pin cả ngày dài và còn nhiều tính năng đặc biệt khác nữa, hứa hẹn sẽ mang đến cho bạn một thiết bị công nghệ chẳng những thời trang còn rất hiện đại.</p>
			  		<div class="text-center">
			  			<button type="button" class="btn btn-success position-absolute bottom-center" onclick="window.location.href='contactView.php'">LIÊN HỆ NGAY</button>
			  		</div>
				</div>			
		  	</div>
		  	<div class="col-md-4 px-3">
		  		<div class="gallery pb-3 scaleDichVuSanPham">
			  		<img src="../img/sanPhamNoiBat3.jpg" class="img-thumbnail scaleImageFullWidth" alt="sanPhamNoiBat3">
			  		<div class="desc"><p class="font-weight-bold mb-0">VINHOME GARDENIA</p></div>
			  		<p class="font-italic mx-2">Lấy cảm hứng từ hình tượng hoa nhài tây với sắc trắng tinh khôi và hương thơm thanh khiết, Vinhomes Gardenia mở ra một phong cách sống mới mà bạn hằng mong ước bấy lâu. Một cuộc sống trong lành, ngập tràn những xúc cảm tươi mới và trải nghiệm cân bằng, thư thái.</p>
			  		<div class="text-center">
			  			<button type="button" class="btn btn-success position-absolute bottom-center" onclick="window.location.href='contactView.php'">LIÊN HỆ NGAY</button>
			  		</div>
				</div>			
		  	</div>
		</div>
  	</div>
  	<!-- Danh mục sản phẩm -->
  	<div class="container mt-5">
  		<h3><span class="badge badge-warning">Danh mục sản phẩm</span></h3>  		
		<!-- Nav tabs -->
		<ul class="nav nav-tabs mt-3">
			<li class="nav-item">
			    <a class="nav-link active" data-toggle="pill" href="#vinsmart">VSMART</a>
			</li>
			<li class="nav-item">
			    <a class="nav-link" data-toggle="pill" href="#vinfast">VINFAST</a>
			</li>
			<li class="nav-item">
			    <a class="nav-link" data-toggle="pill" href="#vinhome">VINHOMES</a>
			</li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- VINSMART -->
		  	<div class="tab-pane container active" id="vinsmart">
		  		<div class="row mt-3">
			  		<div class="col-md-4 px-3">
			  			<div class="gallery pb-3 scaleDichVuSanPhamVinsmart">
				  			<img src="../img/sanPhamVinsmart1.jpg" class="img-thumbnail scaleImageFullWidth" alt="sanPhamVinsmart1">
				  			<div class="desc"><p class="font-weight-bold mb-0">VSMART JOY 3</p></div>
				  			<p class="font-italic mx-2">Đặc điểm nổi bật của Vsmart Joy 3 (4GB/64GB). Vsmart Joy 3 4GB/64GB là một phiên bản mới, được nâng cấp nhẹ về RAM và bộ nhớ trong so với 2 mẫu smartphone cùng tên trước đó, mang đến thêm một sự lựa chọn hấp dẫn ở phân khúc giá rẻ cho người dùng.</p>
				  			<div class="text-center">
				  				<button type="button" class="btn btn-success position-absolute bottom-center" onclick="window.location.href='contactView.php'">LIÊN HỆ NGAY</button>
				  			</div>
						</div>			
			  		</div>
			  		<div class="col-md-4 px-3">
			  			<div class="gallery pb-3 scaleDichVuSanPhamVinsmart">
							<img src="../img/sanPhamVinsmart2.jpg" class="img-thumbnail scaleImageFullWidth" alt="sanPhamVinsmart2">	
							<div class="desc"><p class="font-weight-bold mb-0">VSMART STAR 3</p></div>
				  			<p class="font-italic mx-2">Chiếc điện thoại Vsmart Star 3 nổi bật với thiết kế giọt nước tràn viền, camera kép ở mặt lưng đi kèm mức giá bán vô cùng phải chăng cho người dùng Việt.</p>
				  			<div class="text-center">
				  				<button type="button" class="btn btn-success position-absolute bottom-center" onclick="window.location.href='contactView.php'">LIÊN HỆ NGAY</button>
				  			</div>
						</div>			
					</div>
			  		<div class="col-md-4 px-3">
			  			<div class="gallery pb-3 scaleDichVuSanPhamVinsmart">
							<img src="../img/sanPhamVinsmart3.jpg" class="img-thumbnail scaleImageFullWidth" alt="sanPhamVinsmart3">
							<div class="desc"><p class="font-weight-bold mb-0">VSMART BEE 3</p></div>
							<p class="font-italic mx-2">Đặc điểm nổi bật của Vsmart Bee 3. Vsmart Bee 3 là một chiếc smartphone với mức giá siêu rẻ được ra đời để phục vụ người dùng. Máy sở hữu hiệu năng đủ dùng cùng camera chất lượng tốt, màn hình lớn thoải mái và hệ điều hành VOS được tối ưu dành riêng cho người Việt.</p>
							<div class="text-center">
					  			<button type="button" class="btn btn-success position-absolute bottom-center" onclick="window.location.href='contactView.php'">LIÊN HỆ NGAY</button>
							</div>
						</div>			
			  		</div>
				</div>
			</div>
		  	<!-- VINFAST -->
		  	<div class="tab-pane container fade" id="vinfast">
		  		<div class="row mt-3">
			  		<div class="col-md-4 px-3">
			  			<div class="gallery pb-3 scaleDichVuSanPhamVinfast">
				  			<img src="../img/sanPhamVinfast1.png" class="img-thumbnail scaleImageFullWidth" alt="sanPhamVinfast1">
				  			<div class="desc"><p class="font-weight-bold mb-0">VINFAST LUX SA2.0</p></div>
				  			<p class="font-italic mx-2">VinFast LUX SA2.0 là chiếc xe thể thao đa dụng 4 cửa, cỡ trung hạng sang với số chỗ ngồi 5-7, sản xuất bởi VinFast thuộc tập đoàn Vingroup, dựa trên BMW X5.</p>
				  			<div class="text-center">
				  				<button type="button" class="btn btn-success position-absolute bottom-center" onclick="window.location.href='contactView.php'">LIÊN HỆ NGAY</button>
				  			</div>
						</div>			
			  		</div>
			  		<div class="col-md-4 px-3">
			  			<div class="gallery pb-3 scaleDichVuSanPhamVinfast">
				  			<img src="../img/sanPhamVinfast2.png" class="img-thumbnail scaleImageFullWidth" alt="sanPhamVinfast2">		
				  			<div class="desc"><p class="font-weight-bold mb-0">VINFAST LUX A2.0</p></div>
							<p class="font-italic mx-2">Lux A2.0 sở hữu một thiết kế đẳng cấp mang tinh thần và bản sắc của đất nước Việt Nam nhưng đủ sức hút để khuất phục cả cộng đồng quốc tế.</p>
				  			<div class="text-center">
				  				<button type="button" class="btn btn-success position-absolute bottom-center" onclick="window.location.href='contactView.php'">LIÊN HỆ NGAY</button>
				  			</div>
						</div>			
			  		</div>
			  		<div class="col-md-4 px-3">
			  			<div class="gallery pb-3 scaleDichVuSanPhamVinfast">
				  			<img src="../img/sanPhamVinfast3.png" class="img-thumbnail scaleImageFullWidth" alt="sanPhamVinfast3">
				  			<div class="desc"><p class="font-weight-bold mb-0">VINFAST FADIL</p></div>
							<p class="font-italic mx-2">Kích thước nhỏ gọn với khả năng vận hành mạnh mẽ cùng các tính năng an toàn vượt trội khiến Fadil trở thành chiếc xe đáng ao ước nhất phân khúc.</p>
				  			<div class="text-center">
				  				<button type="button" class="btn btn-success position-absolute bottom-center" onclick="window.location.href='contactView.php'">LIÊN HỆ NGAY</button>
							</div>
						</div>			
					</div>
				</div>
			</div>
			<!-- VINHOME -->
			<div class="tab-pane container fade" id="vinhome">
		  		<div class="row mt-3">
					<div class="col-md-4 px-3">
						<div class="gallery pb-3 scaleDichVuSanPhamVinhome">
							<img src="../img/sanPhamVinhome1.jpg" class="img-thumbnail scaleImageFullWidth" alt="sanPhamVinhome1">
							<div class="desc"><p class="font-weight-bold mb-0">VINHOMES SYMPHONY</p></div>
							<p class="font-italic mx-2">Lấy cảm hứng từ những bản nhạc giao hưởng đong đầy xúc cảm, Vinhomes Symphony nâng cao cuộc sống của những cư dân hiện đại bằng những chuẩn mực sống mới. Một nơi trở về ngay giữa lòng phố mà tách biệt với “phố phường bận rộn”.</p>
							<div class="text-center">
				  				<button type="button" class="btn btn-success position-absolute bottom-center" onclick="window.location.href='contactView.php'">LIÊN HỆ NGAY</button>
							</div>
						</div>			
					</div>
					<div class="col-md-4 px-3">
			  			<div class="gallery pb-3 scaleDichVuSanPhamVinhome">
				  			<img src="../img/sanPhamVinhome2.png" class="img-thumbnail scaleImageFullWidth" alt="sanPhamVinhome2">		
				  			<div class="desc"><p class="font-weight-bold mb-0">VINHOMES GRAND PARK</p></div>
				  			<p class="font-italic mx-2">“Thành phố thông minh Công viên” Vinhomes Grand Park có tổng diện tích 271ha, toạ lạc tại phường Long Bình và Long Thạnh Mỹ, quận 9 - cửa ngõ phía Đông của Thành phố Hồ Chí Minh. Trong tương lai, Vinhomes Grand Park sẽ trở thành trung tâm của mạng lưới Đô thị Sáng Tạo theo quy hoạch phát triển của Thành phố.</p>
				  			<div class="text-center">
				  				<button type="button" class="btn btn-success position-absolute bottom-center" onclick="window.location.href='contactView.php'">LIÊN HỆ NGAY</button>
				  			</div>
						</div>			
					</div>
					<div class="col-md-4 px-3">
			  			<div class="gallery pb-3 scaleDichVuSanPhamVinhome">
							<img src="../img/sanPhamVinhome3.jpg" class="img-thumbnail scaleImageFullWidth" alt="sanPhamVinhome3">
				  			<div class="desc"><p class="font-weight-bold mb-0">VINHOMES GREEN VILLAS</p></div>
				  			<p class="font-italic mx-2">Là siêu phẩm mới nhất nằm trong Bộ sưu tập Biệt thự mang thương hiệu Vinhomes được ra mắt đầu tiên trong năm 2019, Vinhomes Green Villas đón chào những chủ nhân tương lai, hình thành cộng đồng cư dân tinh hoa gắn kết, cùng chia sẻ những giá trị sống đẳng cấp và văn minh.</p>
				  			<div class="text-center">
				  				<button type="button" class="btn btn-success position-absolute bottom-center" onclick="window.location.href='contactView.php'">LIÊN HỆ NGAY</button>
				  			</div>
						</div>			
			  		</div>
				</div>
			</div>
		</div>
		<!-- Pagination -->
		<ul class="pagination justify-content-center mt-5">
			<li class="page-item"><a class="page-link" href="#">Previous</a></li>
			<li class="page-item active"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item"><a class="page-link" href="#">Next</a></li>
		</ul>
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