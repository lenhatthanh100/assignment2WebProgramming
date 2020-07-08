<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Tin tức, sự kiện</title>
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
	<script>document.getElementById("newsView").setAttribute("class","nav-link titleOfNavbar active")</script>
	<!-- Dùng AJAX để hiện danh sách bài viết và truy cập nội dung chi tiết cho từng bài -->
	<script>
	function news(str) {
	  	var xhttp;
        xhttp = new XMLHttpRequest();
        // Phân luồng xử lý
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if (str.indexOf("showDetailedNews") != -1) {
					window.scrollTo(0, 0);
				}
				document.getElementById("news").classList.remove("loader");	// Xóa class để dừng icon loading
				document.getElementById("news").innerHTML = this.responseText;
			}
			else {
				// Xóa nội dung và thêm class để tạo icon loading
				document.getElementById("news").innerHTML = "";
				document.getElementById("news").classList.add("loader");
			}
		};
		xhttp.open("GET", "../../controller/generalAndMember/newsController.php?kindAction="+str, true);
		xhttp.send();
	}	
	</script>
	<!-- Nội dung tin tức -->
	<div class="container">
		<div  class="marginTop" id="news">
		</div>
	</div>
	<script>news("showNewsList");</script>
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
