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
				document.getElementById("news").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", "../../controller/generalAndMember/newsController.php?kindAction="+str, true);
		xhttp.send();
	}
	news("showNewsList");
	</script>
	<!-- Nội dung tin tức -->
	<div class="container marginTop" id="news">	
				
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