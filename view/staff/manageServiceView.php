<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Quản lý dịch vụ, sản phẩm</title>
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
		// Trường hợp tài khoản staff
		if ($userObject->kind_account == 2) {
			include 'navbarStaff.php';
			echo '<script>var idCreater=',$userObject->id,'</script>';
		}
		// Trường hợp tài khoản member, admin dùng URL để truy cập
		else {
			header("location:../404.php");
		}
	}
	// Trường hợp chưa đăng nhập dùng URL để truy cập
	else {
		header("location:../404.php");
	}
	?>
	<!-- Dùng AJAX thay đổi danh sách sản phẩm -->
	<script>document.getElementById("manageServiceView").setAttribute("class","nav-link titleOfNavbar active")</script>
	<script>
	function manageProduct(str) {
		// Hiển thị danh sách sản phẩm hoặc form thêm sản phẩm mới
		if (str == "showProductList" || str == "showAddProductForm") {
			var xhttp;
	  		xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("manageProductViewContainer").innerHTML = this.responseText;
				}
			};
			xhttp.open("POST", "../../controller/staff/manageServiceController.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("kindAction="+str);
		}
		// Thêm sản phẩm mới
	  	else if (str == "addProduct") {
			// Kiểm tra xem có trường dữ liệu nào bị bỏ trống hay không
			if ((!document.getElementById("Vsmart").checked && !document.getElementById("Vinfast").checked && !document.getElementById("Vinhomes").checked) || !document.getElementById("nameProductForm").value || !document.getElementById("linkImageForm").value || !document.getElementById("shortContentForm").value || !document.getElementById("longContentForm").value) {
				alert("Không được bỏ trống bất kỳ trường dữ liệu nào");
				return false;
			}
			// Kiểm tra dữ liệu người dùng nhập vào
			else if (document.getElementById("nameProductForm").value.length > 100) {
				alert("Tiêu đề bài viết chứa tối đa 100 ký tự");
				return false;
			}
			else if (document.getElementById("shortContentForm").value.length > 2000) {
				alert("Nội dung rút gọn chứa tối đa 2000 ký tự");
				return false;
			}
			// Nếu dữ liệu hợp lệ
			else {
				var nameProduct = document.getElementById("nameProductForm").value;
				var linkImage = document.getElementById("linkImageForm").value;
				var shortContent = document.getElementById("shortContentForm").value;
				var longContent = document.getElementById("longContentForm").value;
				var xhttp;
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						window.alert('Tạo bài viết thành công');
						document.getElementById('manageProductSelect').value='showProductList';
						manageProduct('showProductList');
					}
				};
				xhttp.open("POST", "../../controller/staff/manageServiceController.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				if (document.getElementById("Vsmart").checked) {
					xhttp.send("kindAction="+str+"&idCreater="+idCreater+"&brandProduct=Vsmart"+"&nameProduct="+nameProduct+"&linkImage="+linkImage+"&shortContent="+shortContent+"&longContent="+longContent+"&timeCreate="+(new Date()).toLocaleString());
				}
				else if (document.getElementById("Vinfast").checked) {
					xhttp.send("kindAction="+str+"&idCreater="+idCreater+"&brandProduct=Vinfast"+"&nameProduct="+nameProduct+"&linkImage="+linkImage+"&shortContent="+shortContent+"&longContent="+longContent+"&timeCreate="+(new Date()).toLocaleString());
				}
				else {
					xhttp.send("kindAction="+str+"&idCreater="+idCreater+"&brandProduct=Vinhomes"+"&nameProduct="+nameProduct+"&linkImage="+linkImage+"&shortContent="+shortContent+"&longContent="+longContent+"&timeCreate="+(new Date()).toLocaleString());
				}
			}
		}
		// Xóa sản phẩm
		else {
			if (window.confirm('Xác nhận xóa sản phẩm?')) {
				var xhttp;
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						manageProduct('showProductList');
					}
				};
				xhttp.open("POST", "../../controller/staff/manageServiceController.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("kindAction="+str);
			}
		}
	}
	</script>
	<!-- Nội dung quản lý dịch vụ, sản phẩm -->
	<div class="container-fluid marginTop pt-5">
		<div class="form-group">
			<label class="text-primary font-weight-bold" for="manageProductSelect">Chọn tác vụ:</label>
			<select class="form-control" id="manageProductSelect" name="manageProductSelect" onchange="manageProduct(this.value)">
		    	<option value="showProductList" selected="selected">Danh sách sản phẩm</option>
		    	<option value="showAddProductForm">Thêm sản phẩm mới</option>
		  	</select>
		</div>
		<script type="text/javascript"> manageProduct("showProductList"); </script>
    	<div id="manageProductViewContainer"></div>
    </div>
	<!-- Import thêm footer -->
    <?php
	if(isset($_COOKIE["user"])) {
		$userObject = unserialize($_COOKIE["user"]);
		// Trường hợp tài khoản staff
		if ($userObject->kind_account == 2) {
			include 'footerStaff.php';
		}
		// Trường hợp tài khoản member, admin dùng URL để truy cập
		else {
			header("location:../404.php");
		}
	}
	// Trường hợp chưa đăng nhập dùng URL để truy cập
	else {
		header("location:../404.php");
	}
	?>
</body>
</html>
