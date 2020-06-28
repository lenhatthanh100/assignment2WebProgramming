<?php
$username = $password = $retypePassword = $name = $email = $address = "";
$phoneNumber = null;
$errUsername = $errPassword = $errRetypePassword = $errName = $errPhoneNumber = $errEmail = $errAddress = "";
$validUsername = $validPassword = $validRetypePassword = $validName = $validPhoneNumber = $validEmail = $validAddress = false;
$returnMess = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra dữ liệu xem có hợp lệ không
    if (empty($_POST["usernameForm"])) {
        $errUsername = "Không được bỏ trống tên đăng nhập";
    }
    else {
        $username = $_POST["usernameForm"];
        if (strlen($username)<6 or strlen($username)>20) {
            $errUsername = "Tên đăng nhập có độ dài từ 6-20 ký tự";
        } else {
            $validUsername = true;
        }
        
    }
    if (empty($_POST["passwordForm"])) {
        $errPassword = "Không được bỏ trống mật khẩu";
    }
    else {
        $password = $_POST["passwordForm"];
        if (strlen($password)<6 or strlen($password)>20) {
            $errPassword = "Mật khẩu có độ dài từ 6-20 ký tự";
        } else {
            $validPassword = true;
        }
    }
    if (empty($_POST["retypePasswordForm"])) {
        $errRetypePassword = "Không được bỏ trống phần này";
    }
    else {
        $retypePassword = $_POST["retypePasswordForm"];
        if ($retypePassword != $password) {
            $errRetypePassword = "Không chính xác, hãy nhập lại";
        } else {
            $validRetypePassword = true;
        }
    }
    if (empty($_POST["nameForm"])) {
        $errName = "Không được bỏ trống họ và tên";
    }
    else {
        $name = $_POST["nameForm"];
        if (strlen($name)<6 or strlen($name)>40) {
            $errName = "Họ và tên có độ dài từ 6-40 ký tự";
        } else {
            $validName = true;
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
        elseif (strlen($email)>40) {
            $errEmail = "Email có độ dài không quá 40 ký tự";
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
        if (strlen($address)>200) {
            $errAddress = "Địa chỉ có độ dài không quá 200 ký tự";
        }
        else {
            $validAddress = true;
        }        
    }
    
    if ($validUsername and $validPassword and $validRetypePassword and $validName and $validPhoneNumber and $validEmail and $validAddress) {
        include '../model/signUpModel.php';                
    }
}
?>