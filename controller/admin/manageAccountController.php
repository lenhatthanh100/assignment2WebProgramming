<?php
	$kindAccount = null;
	$resultJson = null;
	$userObjectArr = null;
	if ($_GET['kindAccount'] == 'member') {
		$kindAccount = 1;
		echo "<p class='text-success'>Số lượng tài khoản thành viên: ";
	}
	else {
		$kindAccount = 2;
		echo "<p class='text-success'>Số lượng tài khoản nhân viên: ";
	}
	include '../../model/admin/manageAccountModel.php';
	$userObjectArr = json_decode($resultJson);
	echo count($userObjectArr),"</p>";
	echo 
	"<table class='table table-hover'>
	    <thead>
	      	<tr>
	        	<th>Id</th>
	        	<th>Username</th>
	        	<th>Họ và tên</th>
	        	<th>Số điện thoại</th>
	        	<th>Email</th>
	        	<th>Địa chỉ</th>
	      	</tr>
	    </thead>
	    <tbody>";
	foreach ($userObjectArr as $account) {
  		echo 
	  		"<tr>
	        	<td>",$account->id,"</td>
	        	<td>",$account->username,"</td>
	        	<td>",$account->name,"</td>
	        	<td>",$account->phone_number,"</td>
	        	<td>",$account->email,"</td>
	        	<td>",$account->address,"</td>
	      </tr>";
	}
	echo 
		"</tbody>
  	</table>"
?>