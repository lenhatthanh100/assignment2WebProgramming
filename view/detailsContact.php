<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Thông tin cá nhân</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>	
</head>
<body>
	<!-- Import thêm navbar. Trang này rất đặc biệt vì dùng chung cho cả 3 loại tài khoản member, staff, admin. Không chỉnh sửa gì trong mục navbar này -->
	<?php
	if(isset($_COOKIE["user"])) {
		$userObject = unserialize($_COOKIE["user"]);
		// Trường hợp tài khoản member
		if ($userObject->kind_account == 1) {
            echo '
            <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top nav-pills">
                <a class="navbar-brand" href="generalAndMember/homeView.php">
                <img class="logo" src="img/logo.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item mx-4">
                            <a class="nav-link titleOfNavbar" href="generalAndMember/homeView.php">Trang chủ</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link titleOfNavbar" href="generalAndMember/introduceView.php">Giới thiệu</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link titleOfNavbar" href="generalAndMember/newsView.php">Tin tức, sự kiện</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link titleOfNavbar" href="generalAndMember/serviceView.php">Dịch vụ, sản phẩm</a>
                        </li>	      
                        <li class="nav-item mx-4">
                            <a class="nav-link titleOfNavbar" href="generalAndMember/contactView.php">Liên hệ</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link titleOfNavbar" href="generalAndMember/notificationView.php">Thông báo</a>
                        </li>
                        <li class="nav-item ml-5">
                            <div class="mb-2">                
                                <span class="text-warning font-weight-bold mr-2" onclick="profileOfUser()">',$userObject->name,'</span>
                                <span class="badge badge-warning">Member</span>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="location.href=',"'../controller/signOut.php'",';">Đăng xuất</button>
                        </li>
                    </ul>
                </div>	  	    
            </nav>
            ';
		}
		// Trường hợp tài khoản staff
		else if ($userObject->kind_account == 2) {
            echo '
            <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top nav-pills">
                <a class="navbar-brand" href="manageNewsView.php">
                <img class="logo" src="img/logo.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item mx-5">
                            <a class="nav-link titleOfNavbar" href="staff/manageNewsView.php">Quản lý tin tức, sự kiện</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link titleOfNavbar" href="staff/manageServiceView.php">Quản lý dịch vụ, sản phẩm</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link titleOfNavbar" href="staff/manageNotificationView.php">Quản lý thông báo</a>
                        </li>
                        <li class="nav-item ml-5 pl-5">
                            <div class="mb-2">                
                                <span class="text-warning font-weight-bold mr-2" onclick="profileOfUser()">',$userObject->name,'</span>
                                <span class="badge badge-warning">Staff</span>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="location.href=',"'../controller/signOut.php'",';">Đăng xuất</button>
                        </li>
                    </ul>
                </div>	  	    
            </nav>
            ';
        }
        // Trường hợp tài khoản admin
        else {
            echo '
            <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top nav-pills">
                <a class="navbar-brand" href="../img/manageAccountView.php">
                <img class="logo" src="img/logo.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item mx-5">
                            <a class="nav-link titleOfNavbar" href="admin/manageAccountView.php">Quản lý tài khoản</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link titleOfNavbar" href="admin/createAccountForStaffView.php">Tạo tài khoản cho nhân viên</a>
                        </li>
                        <li class="nav-item ml-5 pl-5">
                            <div class="mb-2">                
                                <span class="text-warning font-weight-bold mr-2" onclick="profileOfUser()">',$userObject->name,'</span>
                                <span class="badge badge-warning">Admin</span>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="location.href=',"'../controller/signOut.php'",';">Đăng xuất</button>
                        </li>
                    </ul>
                </div>	  	    
            </nav>
            ';
        }
	}
	// Trường hợp chưa đăng nhập dùng URL truy cập
	else {
		header("location:404.php");
	}	
	?>	
	<!-- Dùng AJAX thay đổi danh sách thông báo -->
	<script>
	function profileOfUser(str) {
	  	var xhttp;	  	 
        xhttp = new XMLHttpRequest();
        // Phân luồng xử lý
        // if (str == "formPersonalInformation" || str == "formPassword")
	  	xhttp.onreadystatechange = function() {
	    	if (this.readyState == 4 && this.status == 200) {
	      		document.getElementById("profileOfUserForm").innerHTML = this.responseText;
	    	}
	  	};
	  	xhttp.open("GET", "../../controller/profileOfUserController.php?kindAction="+str, true);
	  	xhttp.send();	  		  	
	}
	</script>
	<!-- Nội dung trang thông tin cá nhân -->
	<div class="container-fluid marginTop pt-5">
    <?php
        if(isset($_COOKIE["user"])) {
            $userObject = unserialize($_COOKIE["user"]);
            
            // Trường hợp tài khoản member
            if ($userObject->kind_account == 1) {
                include '../controller/generalAndMember/memberDetailsContactController.php';
            }
            // Trường hợp tài khoản staff
            else if ($userObject->kind_account == 2) {
                include '../controller/staff/staffDetailsContactController.php';
            }

        }
        // Trường hợp chưa đăng nhập dùng URL truy cập
        else {
            header("location:404.php");
        }	
    ?>
    </div>
	<!-- Import thêm footer. Trang này rất đặc biệt vì dùng chung cho cả 3 loại tài khoản member, staff, admin. Không chỉnh sửa gì trong mục navbar này-->
    <?php
	if(isset($_COOKIE["user"])) {
		$userObject = unserialize($_COOKIE["user"]);
		// Trường hợp tài khoản member
		if ($userObject->kind_account == 1) {
            echo '
            <div class="container-fluid mt-5 bg-secondary px-3 py-3">
                <div class="row">
                    <div class="col-md-3">
                        <p class="font-weight-bold">Tập đoàn Vingroup (Vingroup JSC)</p>
                        <p>© Bản quyền Vingroup 2019</p>
                    </div>
                    <div class="col-md-5">
                        <p class="font-weight-bold">Kết nối với chúng tôi</p>
                        <ul>
                            <li>
                                <p>Địa chỉ:Số 7 Đường Bằng Lăng 1, Phường Việt Hưng, Quận Long Biên, Hà Nội</p>
                            </li>
                            <li>
                                <p>Điện thoại:+84 (24) 3974 9999</p>
                            </li>
                            <li>
                                <p>Fax:+84 (24) 3974 8888</p>
                            </li> 
                            <li>
                                <a href="https://www.facebook.com/vingroup.net/" target="_blank"><p class="text-dark">Facebook</p></a>
                            </li>		  		
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            <li>
                                <a href="generalAndMember/homeView.php"><p class="text-dark">Trang chủ</p></a>
                            </li>
                            <li>
                                <a href="generalAndMember/introduceView.php"><p class="text-dark">Giới thiệu</p></a>
                            </li>
                            <li>
                                <a href="generalAndMember/newsView.php"><p class="text-dark">Tin tức, sự kiện</p></a>
                            </li>
                            <li>
                                <a href="generalAndMember/serviceView.php"><p class="text-dark">Dịch vụ, sản phẩm</p></a>
                            </li>
                            <li>
                                <a href="generalAndMember/contactView.php"><p class="text-dark">Liên hệ</p></a>
                            </li>
                            <li>
                                <a href="generalAndMember/notificationView.php"><p class="text-dark">Thông báo</p></a>
                            </li>
                            <li>
                                <a href="../controller/signOut.php"><p class="text-dark">Đăng xuất</p></a>
                            </li>
                        </ul>
                    </div>
                </div>		
            </div>
            ';
		}
		// Trường hợp tài khoản staff
		else if ($userObject->kind_account == 2) {
            echo '
            <div class="container-fluid mt-5 bg-secondary px-3 py-3">
                <div class="row">
                    <div class="col-md-3">
                        <p class="font-weight-bold">Tập đoàn Vingroup (Vingroup JSC)</p>
                        <p>© Bản quyền Vingroup 2019</p>
                    </div>
                    <div class="col-md-5">
                        <p class="font-weight-bold">Kết nối với chúng tôi</p>
                        <ul>
                            <li>
                                <p>Địa chỉ:Số 7 Đường Bằng Lăng 1, Phường Việt Hưng, Quận Long Biên, Hà Nội</p>
                            </li>
                            <li>
                                <p>Điện thoại:+84 (24) 3974 9999</p>
                            </li>
                            <li>
                                <p>Fax:+84 (24) 3974 8888</p>
                            </li> 
                            <li>
                                <a href="https://www.facebook.com/vingroup.net/" target="_blank"><p class="text-dark">Facebook</p></a>
                            </li>		  		
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            <li>
                                <a href="staff/manageNewsView.php"><p class="text-dark">Quản lý tin tức, sự kiện</p></a>
                            </li>
                            <li>
                                <a href="staff/manageServiceView.php"><p class="text-dark">Quản lý dịch vụ, sản phẩm</p></a>
                            </li>
                            <li>
                                <a href="staff/manageNotificationView.php"><p class="text-dark">Quản lý thông báo</p></a>
                            </li>
                            <li>
                                <a href="../controller/signOut.php"><p class="text-dark">Đăng xuất</p></a>
                            </li>
                        </ul>
                    </div>
                </div>		
            </div>
            ';
        }
        // Trường hợp tài khoản admin
        else {
            echo '
            <div class="container-fluid mt-5 bg-secondary px-3 py-3">
                <div class="row">
                    <div class="col-md-3">
                        <p class="font-weight-bold">Tập đoàn Vingroup (Vingroup JSC)</p>
                        <p>© Bản quyền Vingroup 2019</p>
                    </div>
                    <div class="col-md-5">
                        <p class="font-weight-bold">Kết nối với chúng tôi</p>
                        <ul>
                            <li>
                                <p>Địa chỉ:Số 7 Đường Bằng Lăng 1, Phường Việt Hưng, Quận Long Biên, Hà Nội</p>
                            </li>
                            <li>
                                <p>Điện thoại:+84 (24) 3974 9999</p>
                            </li>
                            <li>
                                <p>Fax:+84 (24) 3974 8888</p>
                            </li> 
                            <li>
                                <a href="https://www.facebook.com/vingroup.net/" target="_blank"><p class="text-dark">Facebook</p></a>
                            </li>		  		
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            <li>
                                <a href="admin/manageAccountView.php"><p class="text-dark">Quản lý tài khoản</p></a>
                            </li>
                            <li>
                                <a href="admin/createAccountForStaffView.php"><p class="text-dark">Tạo tài khoản cho nhân viên</p></a>
                            </li>
                            <li>
                                <a href="../controller/signOut.php"><p class="text-dark">Đăng xuất</p></a>
                            </li>
                        </ul>
                    </div>
                </div>		
            </div>
            ';
        }
	}
	// Trường hợp chưa đăng nhập dùng URL truy cập
	else {
		header("location:404.php");
	}	
	?>
</body>
</html>