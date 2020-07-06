<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Quản lý tin tức, sự kiện</title>
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
	<!-- Dùng AJAX thay đổi danh sách bài viết -->
	<script>	
	function manageNews(str) {
		// Hiển thị danh sách bài viết hoặc form tạo bài viết mới	  
		if (str == "showNewsList" || str == "showAddNewsForm") {
			var xhttp;	  	 
	  		xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("manageNewsViewContainer").innerHTML = this.responseText;
				}
			};
			xhttp.open("POST", "../../controller/staff/manageNewsController.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("kindAction="+str);
		}
		// Tạo bài viết mới
	  	else if (str == "addNews") {			
			// Kiểm tra xem có trường dữ liệu nào bị bỏ trống hay không
			if (!document.getElementById("titleForm").value || !document.getElementById("linkImageForm").value || !document.getElementById("shortContentForm").value || !document.getElementById("longContentForm").value) {
				alert("Không được bỏ trống bất kỳ trường dữ liệu nào");
				return false;
			}
			// Kiểm tra dữ liệu người dùng nhập vào
			else if (document.getElementById("titleForm").value.length > 300) {
				alert("Tiêu đề bài viết chứa tối đa 300 ký tự");
				return false;
			}
			else if (document.getElementById("shortContentForm").value.length > 2000) {
				alert("Nội dung rút gọn chứa tối đa 2000 ký tự");
				return false;
			}
			// Nếu dữ liệu hợp lệ
			else {
				var title = document.getElementById("titleForm").value;
				var linkImage = document.getElementById("linkImageForm").value;
				var shortContent = document.getElementById("shortContentForm").value;
				var longContent = document.getElementById("longContentForm").value;
				var xhttp;	  	 
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						window.alert('Tạo bài viết thành công');
						document.getElementById('manageNewsSelect').value='showNewsList';
						manageNews('showNewsList');
					}
				};
				xhttp.open("POST", "../../controller/staff/manageNewsController.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("kindAction="+str+"&idCreater="+idCreater+"&title="+title+"&linkImage="+linkImage+"&shortContent="+shortContent+"&longContent="+longContent+"&timeCreate="+(new Date()).toLocaleString());
			}	
		}
		// Xóa bài viết
		else {
			if (window.confirm('Xác nhận xóa bài viết?')) {
				var xhttp;	  	 
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						manageNews('showNewsList');
					}
				};
				xhttp.open("POST", "../../controller/staff/manageNewsController.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("kindAction="+str);
			}			
		}	  		  		  	
	}
	</script>
	<!-- Nội dung quản lý tin tức, sự kiện -->
	<div class="container-fluid marginTop pt-5">
		<div class="form-group">
			<label class="text-primary font-weight-bold" for="manageNewsSelect">Chọn tác vụ:</label>
			<select class="form-control" id="manageNewsSelect" name="manageNewsSelect" onchange="manageNews(this.value)">				
		    	<option value="showNewsList" selected="selected">Danh sách bài viết</option>
		    	<option value="showAddNewsForm">Tạo bài viết mới</option>
		  	</select>
		</div>
		<script type="text/javascript"> manageNews("showNewsList"); </script>
    	<div id="manageNewsViewContainer"></div>
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