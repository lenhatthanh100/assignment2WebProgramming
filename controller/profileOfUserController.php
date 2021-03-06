<?php
    $userObject = unserialize($_COOKIE["user"]);    
    $kindAction = null; //1->formPersonalInformation, 2->formPassword, 3->changePersonalInformation, 4->changePassword

    // Phân loại tác vụ
    if ($_GET['kindAction'] == 'formPersonalInformation') {
        $kindAction = 1;        
    }
    else if ($_GET['kindAction'] == 'formPassword') {
        $kindAction = 2;        
    }
    else if ($_GET['kindAction'] == 'changePersonalInformation') {
        $kindAction = 3;        
    }
    else {
        $kindAction = 4;
    }   

    // Phân luồng xử lý
    if ($kindAction == 1 or $kindAction == 2){
        // Hiển thị form để người dùng nhập dữ liệu
        if ($kindAction == 1) {        
            echo '
            <h2><span class="badge badge-success mb-3 ml-3">Thay đổi thông tin cá nhân</span></h2>
            <p class="text-warning font-italic mb-3 ml-3">Bạn chỉ được phép thay đổi họ và tên, số điện thoại, email, địa chỉ.</p>
            <form class="form-horizontal" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-2 font-weight-bold" for="nameForm">Họ và tên</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nameForm" id="nameForm" placeholder="Nhập họ và tên">
                    </div>			    
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 font-weight-bold" for="phoneNumberForm">Số điện thoại</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="phoneNumberForm" id="phoneNumberForm" placeholder="Nhập số điện thoại">
                    </div>			    
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 font-weight-bold" for="emailForm">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="emailForm" id="emailForm" placeholder="Nhập địa chỉ email">
                    </div>			    
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 font-weight-bold" for="addressForm">Địa chỉ</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="addressForm" id="addressForm" placeholder="Số nhà, tên đường, xã/phường, quận/huyện, tỉnh/thành phố">
                    </div>			    
                </div>
                <div class="form-group ml-3">
                    <button type="button" class="btn btn-success" value="changePersonalInformation" onclick="profileOfUser(this.value)">OK</button>
                </div>			  
            </form>
            ';
        }
        else {
            echo '
            <h2><span class="badge badge-success mb-3 ml-3">Thay đổi mật khẩu</span></h2>
            <form class="form-horizontal" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-3 font-weight-bold" for="newPasswordForm">Mật khẩu mới</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="newPasswordForm" id="newPasswordForm" placeholder="Nhập mật khẩu mới">
                    </div>			    
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 font-weight-bold" for="retypeNewPasswordForm">Nhập lại mật khẩu mới</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="retypeNewPasswordForm" id="retypeNewPasswordForm" placeholder="Nhập lại mật khẩu mới">
                    </div>			    
                </div>
                <div class="form-group ml-3">
                    <button type="button" class="btn btn-success" value="changePassword" onclick="profileOfUser(this.value)">OK</button>
                </div>
            </form>
            ';
        }
    }       
    else if ($kindAction == 3) {        
        $name = $_GET['name'];
        $phoneNumber = $_GET['phoneNumber'];
        $email = $_GET['email'];
        $address = $_GET['address'];
        $id = $userObject->id;
        $resultJson = null;
        include '../model/profileOfUserModel.php'; // Gửi dữ liệu sang model xử lý
        $userObject = json_decode($resultJson);
        setcookie ("user", serialize($userObject), time() + (86400 * 30), "/");   // Tạo cookie lưu tài khoản user đã đăng nhập thành công
    }
    else {
        $newPassword = $_GET['newPassword'];
        $id = $userObject->id;
        include '../model/profileOfUserModel.php'; // Gửi dữ liệu sang model xử lý
        setcookie("user", "", time() - 3600, "/"); // Xóa cookie sau khi đổi mật khẩu
    }    
?>