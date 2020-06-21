<?php
$username = $password = $email = $address = "";
$phoneNumber = null;
$errUsername = $errPassword = $errPhoneNumber = $errEmail = $errAddress = "";
$validUsername = $validPassword = $validPhoneNumber = $validEmail = $validAddress = false;
$returnMess = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra dữ liệu xem có hợp lệ không
    if (empty($_POST["usernameForm"])) {
        $errUsername = "Không được bỏ trống tên đăng nhập";
    }
    else {
        $username = $_POST["usernameForm"];
        if (strlen($username)<6) {
            $errUsername = "Tên đăng nhập dài tối thiểu 6 ký tự";
        } else {
            $validUsername = true;
        }
        
    }
    if (empty($_POST["passwordForm"])) {
        $errPassword = "Không được bỏ trống mật khẩu";
    }
    else {
        $password = $_POST["passwordForm"];
        if (strlen($password)<6) {
            $errPassword = "Mật khẩu dài tối thiểu 6 ký tự";
        } else {
            $validPassword = true;
        }
    }
    if (empty($_POST["emailForm"])) {
        $errEmail = "Không được bỏ trống email";
    }
    else {
        $email = $_POST["emailForm"];
        if (!preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9])+$/",$email)) {
            $errEmail = "Địa chỉ email hợp lệ phải có định dạng *@*.*";
        }
        else {
            $validEmail = true;			
        }	
    }
    if (empty($_POST["phoneNumberForm"])) {
        $errPhoneNumber = "Không được bỏ trống số điện thoại";
    }
    else {
        $phoneNumber = $_POST["phoneNumberForm"];
        if (strlen($phoneNumber) != 10){
            $errPhoneNumber = "Số điện thoại bao gồm 10 chữ số";
        }
        else {
            $validPhoneNumber = true;
        }
    }
    if (empty($_POST["addressForm"])) {
        $errAddress = "Không được bỏ trống địa chỉ";
    }
    else {
        $address = $_POST["addressForm"];
        $validAddress = true;
    }

    // Insert vào database, import model để xử lý
    if ($validUsername == true and $validPassword == true) {
        $username = $_POST["usernameForm"];
        $password = $_POST["passwordForm"];
        $phoneNumber = $_POST["phoneNumberForm"];
        $email = $_POST["emailForm"];
        $address = $_POST["addressForm"];
        $returnMess = "Đăng ký thành công";        
    }
}
?>