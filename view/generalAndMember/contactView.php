<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Liên hệ</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script src="checkDataForContact.js"></script>
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
		echo 
		"<script> 
			if (window.confirm('Bạn chưa đăng ký thành viên? Đăng ký ngay để nhận hàng trăm ưu đãi từ Vingroup!')) {
			window.location.replace('signUpView.php');
		} </script>";
	}	
	?>
	<!-- Địa chỉ -->
	<div class="container-fluid marginTop">		
		<div class="row mt-5">
		  <div class="col-md-8">
		  	<img src="../img/map.jpg" class="img-thumbnail" alt="map">
		  </div>
		  <div class="col-md-4 mt-5">
		  	<h2 class="mt-3 font-weight-bold colorLienHe">Tập đoàn Vingroup</h2>
			<span class="mt-3 badge badge-warning">TRỤ SỞ CHÍNH</span>
			<ul class="mt-3">
				<li>
					<p><span class="font-weight-bold">Địa chỉ:</span> Số 7 Đường Bằng Lăng 1, Phường Việt Hưng, Quận Long Biên, Hà Nội</p>
				</li>
				<li>
					<p><span class="font-weight-bold">Điện thoại:</span> +84 (24) 3974 9999</p>
				</li>
				<li>
					<p><span class="font-weight-bold">Fax:</span> +84 (24) 3974 8888</p>
				</li>
			</ul>
		  </div>
		</div>
	</div>
	<!-- Tin nhắn -->
	<div class="container mt-5">
		<h3><span class="badge badge-pill badge-success text-center">Gửi tin nhắn tới chúng tôi</span></h3>
		<br>
		<p class="mt-3 text-secondary font-italic">Vui lòng điền đầy đủ thông tin theo yêu cầu để chúng tôi có thể hỗ trợ quý khách tốt nhất</p>
		<form class="mt-3">
			<div class="form-group">
			  <label for="HoTenForm"><span class="font-weight-bold">Họ và tên</span><span class="text-danger">*</span></label>
			  <input type="text" class="form-control" id="HoTenForm" placeholder="Nguyễn Văn A">
			</div>
			<div class="form-group">
			  <label for="SdtForm"><span class="font-weight-bold">SĐT</span><span class="text-danger">*</span></label>
			  <input type="number" class="form-control" id="SdtForm" placeholder="0123456789">
			</div>
			<div class="form-group">
			  <label for="EmailForm"><span class="font-weight-bold">Email</span><span class="text-danger">*</span></label>
			  <input type="text" class="form-control" id="EmailForm" placeholder="examples@gmail.com">
			</div>
			<p><span class="font-weight-bold">Thương hiệu quan tâm</span><span class="text-danger">*</span></p>
			<div class="form-check-inline">
			  <label class="form-check-label">
			    <input type="radio" class="form-check-input" id="Vsmart" name="thuongHieu" value="Vsmart">Vsmart
			  </label>
			</div>
			<div class="form-check-inline">
			  <label class="form-check-label">
			    <input type="radio" class="form-check-input" id="Vinfast" name="thuongHieu" value="Vinfast">Vinfast
			  </label>
			</div>
			<div class="form-check-inline">
			  <label class="form-check-label">
			    <input type="radio" class="form-check-input" id="Vinhome" name="thuongHieu" value="Vinhome">Vinhome
			  </label>
			</div>			
			<br><br>
			<div class="form-group">
			  <label for="SanPhamForm"><span class="font-weight-bold">Sản phẩm quan tâm</span><span class="text-danger">*</span></label>
			  <input type="text" class="form-control" id="SanPhamForm" placeholder="Vinfast Lux SA2.0">
			</div>
			<div class="form-group">
			  <label for="AboutForm"><span class="font-weight-bold">Nội dung tin nhắn</span></label>
			  <textarea class="form-control" rows="5" id="AboutForm" placeholder="Tôi cần..."></textarea>
			</div>
			<br>
			<input type="button" class="btn btn-success" value="Submit" onclick="validateData()">
			<input type="reset" class="btn btn-info" value="Reset">
		</form>
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