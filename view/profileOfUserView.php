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
                                <span class="text-warning font-weight-bold mr-2" onclick="profileOfUserReload()">',$userObject->name,'</span>
                                <span class="badge badge-warning">Member</span>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="location.href=',"'../controller/signOut.php'",';">Đăng xuất</button>
                        </li>
                    </ul>
                </div>	  	    
            </nav>
            <script>var kindAccount = 1;</script>
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
                                <span class="text-warning font-weight-bold mr-2" onclick="profileOfUserReload()">',$userObject->name,'</span>
                                <span class="badge badge-warning">Staff</span>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="location.href=',"'../controller/signOut.php'",';">Đăng xuất</button>
                        </li>
                    </ul>
                </div>	  	    
            </nav>
            <script>var kindAccount = 2;</script>
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
                                <span class="text-warning font-weight-bold mr-2" onclick="profileOfUserReload()">',$userObject->name,'</span>
                                <span class="badge badge-warning">Admin</span>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" onclick="location.href=',"'../controller/signOut.php'",';">Đăng xuất</button>
                        </li>
                    </ul>
                </div>	  	    
            </nav>
            <script>var kindAccount = 3;</script>
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
    function profileOfUserReload() {
        if(window.confirm("- Họ và tên: <?php echo $userObject->name ?> \n- ID: <?php echo $userObject->id ?> \n- Username: <?php echo $userObject->username ?> \n- Số điện thoại: <?php echo $userObject->phone_number ?> \n- Email: <?php echo $userObject->email ?> \n- Địa chỉ: <?php echo $userObject->address ?> \n- Quyền truy cập: Member \nBạn có muốn thay đổi thông tin cá nhân/ mật khẩu?")) {
            location.reload();
        }
    }
	function profileOfUser(str) {
	  	var xhttp;	  	 
        xhttp = new XMLHttpRequest();
        // Phân luồng xử lý
        if (str == "formPersonalInformation" || str == "formPassword") {
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("profileOfUserForm").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "../../controller/profileOfUserController.php?kindAction="+str, true);
            xhttp.send();
        }
        else if (str == "changePersonalInformation") {
            // Kiểm tra xem có trường dữ liệu nào bị bỏ trống hay không
            if (!document.getElementById("nameForm").value || !document.getElementById("phoneNumberForm").value || !document.getElementById("emailForm").value || !document.getElementById("addressForm").value){
                window.alert("Không được bỏ trống bất kỳ trường dữ liệu nào")
            }
            // Kiểm tra định dạng, độ dài của trường dữ liệu có hợp lệ không
            else {
                var name = document.getElementById("nameForm");
                var phoneNumber = document.getElementById("phoneNumberForm");
                var email = document.getElementById("emailForm");
                var address = document.getElementById("addressForm");
                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9])+$/; 
                if (name.value.length < 6 || name.value.length > 40) {
                    window.alert("Họ và tên có độ dài từ 6-40 ký tự");
                }
                else if (phoneNumber.value.length != 10) {
                    window.alert("Số điện thoại bao gồm 10 chữ số");
                }
                else if (phoneNumber.value.length != 10) {
                    window.alert("Số điện thoại bao gồm 10 chữ số");
                }
                else if (!filter.test(email.value)) { 
                    window.alert("Địa chỉ email hợp lệ phải có định dạng *@*.*");
	            }
	            else if (email.value.length > 40) {
		            window.alert("Email có độ dài không quá 40 ký tự");		
                }
                else if (address.value.length > 200) {
		            window.alert("Địa chỉ có độ dài không quá 200 ký tự");		
                }
                else {
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            window.alert("Thay đổi thông tin cá nhân thành công!");
                            // Định hướng về trang chủ tùy theo loại tài khoản
                            if (kindAccount == 1) {
                                window.location.replace("generalAndMember/homeView.php");
                            }
                            else if (kindAccount == 2) {
                                window.location.replace("staff/manageNewsView.php");
                            }
                            else {
                                window.location.replace("admin/manageAccountView.php");
                            }
                        }
                    };
                    xhttp.open("GET", "../../controller/profileOfUserController.php?kindAction="+str+"&name="+name.value+"&phoneNumber="+phoneNumber.value+"&email="+email.value+"&address="+address.value, true);
                    xhttp.send();
                }
            }
        }
        else {
            // Kiểm tra xem có trường dữ liệu nào bị bỏ trống hay không
            if (!document.getElementById("newPasswordForm").value || !document.getElementById("retypeNewPasswordForm").value){
                window.alert("Không được bỏ trống bất kỳ trường dữ liệu nào")
            }
            // Kiểm tra định dạng, độ dài của trường dữ liệu có hợp lệ không
            else {
                var newPassword = document.getElementById("newPasswordForm");
                var retypeNewPassword = document.getElementById("retypeNewPasswordForm");
                if (newPassword.value.length < 6 || newPassword.value.length > 40) {
                    window.alert("Mật khẩu mới có độ dài từ 6-40 ký tự");
                }
                else if (newPassword.value != retypeNewPassword.value) {
                    window.alert("Nhập lại mật khẩu không chính xác");
                }
                else {
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            window.alert("Thay đổi mật khẩu thành công. Hãy đăng nhập lại");
                            window.location.replace("generalAndMember/SignInView.php"); // Yêu cầu người dùng đăng nhập lại
                        }
                    };
                    xhttp.open("GET", "../../controller/profileOfUserController.php?kindAction="+str+"&newPassword="+newPassword.value, true);
                    xhttp.send();
                }
            }
        }	  		  		  	
	}
	</script>
	<!-- Nội dung trang thông tin cá nhân -->
	<div class="container-fluid marginTop pt-5">
		<div class="form-group">
			<label class="text-primary font-weight-bold" for="profileOfUserSelect">Chọn tác vụ:</label>
			<select class="form-control" id="profileOfUserSelect" name="profileOfUserSelect" onchange="profileOfUser(this.value)">				
		    	<option value="formPersonalInformation" selected="selected">Thay đổi thông tin cá nhân</option>
		    	<option value="formPassword">Thay đổi mật khẩu</option>
		  	</select>
		</div>
		<script type="text/javascript"> profileOfUser("formPersonalInformation"); </script>
    	<div class="container" id="profileOfUserForm"></div>
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