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
	<!-- Dùng AJAX để hiện danh sách sản phẩm và truy cập nội dung chi tiết cho từng sản phẩm -->
	<script>
	function product(str) {
	  	var xhttp; 	 
        xhttp = new XMLHttpRequest();
        // Phân luồng xử lý
		xhttp.onreadystatechange = function() {			
			if (this.readyState == 4 && this.status == 200) {
				if (str.indexOf("showDetailedProduct") != -1) {
					window.scrollTo(0, 0);
				}				
				document.getElementById("productList").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "../../controller/generalAndMember/serviceController.php?kindAction="+str, true);
		xhttp.send();
	}
	product("showProductList&brandProduct=Vsmart");
	</script>
	<!-- Thanh tìm kiếm -->
	<nav class="navbar navbar-expand-sm bg-light navbar-dark marginTop mr-0">
		<form class="form-inline ml-auto" action="/action_page.php">
			<input class="form-control mr-sm-2" type="text" placeholder="Search">
			<button class="btn btn-success" type="submit">Search</button>			
		</form>		
	</nav>	
  	<!-- Danh mục sản phẩm -->
  	<div class="container mt-3">
	  <h3><span class="badge badge-warning">Danh mục sản phẩm</span></h3>
		<ul class="nav nav-tabs text-info mt-3">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="pill" onclick=(product("showProductList&brandProduct=Vsmart"))>VSMART</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="pill" onclick=(product("showProductList&brandProduct=Vinfast"))>VINFAST</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="pill" onclick=(product("showProductList&brandProduct=Vinhomes"))>VINHOMES</a>
			</li>
		</ul>
		<div class="tab-content" id="productList">
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