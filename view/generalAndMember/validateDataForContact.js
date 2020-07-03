// Kiểm tra dữ liệu ở phía client side
function validateHoTen()
{
	hoTen = document.getElementById("HoTenForm");
	if (hoTen.value.length < 6 || hoTen.value.length > 40)
	{
		alert("Họ và tên có độ dài từ 6-40 ký tự");
		return false;
	}
	return true;
}
function validateSdt()
{
	sdt = document.getElementById("SdtForm");
	if (sdt.value.length != 10)
	{
		alert("Số điện thoại bao gồm 10 chữ số");
		return false;
	}
	return true;
}
function validateEmail()
{
	email = document.getElementById("EmailForm");
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9])+$/; 
    if (!filter.test(email.value)) 
    { 
        alert("Địa chỉ email hợp lệ phải có định dạng *@*.*");
        return false;
	}
	else if (email.value.length > 40)
	{
		alert("Email có độ dài không quá 40 ký tự");
		return false;
	}
    return true;
}
function validateDiaChi()
{
	diaChi = document.getElementById("DiaChiForm");
	if (diaChi.value.length > 200)
	{
		alert("Địa chỉ có độ dài không quá 200 ký tự");
		return false;
	}
	return true;
}
function validateSanPham()
{
	sanPham = document.getElementById("SanPhamForm");
	if (sanPham.value.length > 100)
	{
		alert("Tên sản phẩm không vượt quá 100 ký tự");
		return false;
	}
	return true;
}
function validateTieuDe()
{
	tieuDe = document.getElementById("TieuDeForm");
	if (tieuDe.value.length > 100)
	{
		alert("Tiêu đề có độ dài không quá 100 ký tự");
		return false;
	}
	return true;
}
function validateNoiDung()
{
	noiDung = document.getElementById("NoiDungForm");
	if (noiDung.value.length > 2000)
	{
		alert("Nội dung tin nhắn không vượt quá 2000 ký tự");
		return false;
	}
	return true;
}	
function validateDataGeneral()
{	
	if (!document.getElementById("HoTenForm").value || !document.getElementById("SdtForm").value || !document.getElementById("EmailForm").value || !document.getElementById("DiaChiForm").value || (!document.getElementById("Vsmart").checked && !document.getElementById("Vinfast").checked && !document.getElementById("Vinhomes").checked) || !document.getElementById("SanPhamForm").value || !document.getElementById("TieuDeForm").value)
	{
		alert("Không được bỏ trống các trường dữ liệu *");
	}
	else if (!validateHoTen())
	{
		
	}
	else if (!validateSdt())
	{
		
	}
	else if (!validateEmail())
	{
		
	}
	else if (!validateDiaChi())
	{
		
	}
	else if (!validateSanPham())
	{
		
	}
	else if (!validateTieuDe())
	{
		
	}
	else if (!validateNoiDung())
	{
		
	}
	else
	{
		// Dùng AJAX để gửi dữ liệu đi sau khi đã được kiểm duyệt
		var xhttp = new XMLHttpRequest();
	  	xhttp.onreadystatechange = function() {
	    	if (this.readyState == 4 && this.status == 200) {
	      		window.alert("Cảm ơn bạn, chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất!");
	      		window.location.replace('serviceView.php');      		      		
	    	}
	  	};
	  	xhttp.open("POST", "../../controller/generalAndMember/contactController.php", true);
	  	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  	if (document.getElementById("Vsmart").checked) {
	  		xhttp.send("idQuestioner="+idQuestioner+"&nameQuestioner="+document.getElementById("HoTenForm").value+"&phoneNumber="+document.getElementById("SdtForm").value+"&email="+document.getElementById("EmailForm").value+"&address="+document.getElementById("DiaChiForm").value+"&brand=Vsmart"+"&product="+document.getElementById("SanPhamForm").value+"&title="+document.getElementById("TieuDeForm").value+"&question="+document.getElementById("NoiDungForm").value+"&timeQuestion="+(new Date()).toLocaleString());
	  	}
	  	else if (document.getElementById("Vinfast").checked) {
	  		xhttp.send("idQuestioner="+idQuestioner+"&nameQuestioner="+document.getElementById("HoTenForm").value+"&phoneNumber="+document.getElementById("SdtForm").value+"&email="+document.getElementById("EmailForm").value+"&address="+document.getElementById("DiaChiForm").value+"&brand=Vinfast"+"&product="+document.getElementById("SanPhamForm").value+"&title="+document.getElementById("TieuDeForm").value+"&question="+document.getElementById("NoiDungForm").value+"&timeQuestion="+(new Date()).toLocaleString());
	  	}
	  	else {
			xhttp.send("idQuestioner="+idQuestioner+"&nameQuestioner="+document.getElementById("HoTenForm").value+"&phoneNumber="+document.getElementById("SdtForm").value+"&email="+document.getElementById("EmailForm").value+"&address="+document.getElementById("DiaChiForm").value+"&brand=Vinhomes"+"&product="+document.getElementById("SanPhamForm").value+"&title="+document.getElementById("TieuDeForm").value+"&question="+document.getElementById("NoiDungForm").value+"&timeQuestion="+(new Date()).toLocaleString());
	  	}	
	}	
}
function validateDataMember()
{	
	if ((!document.getElementById("Vsmart").checked && !document.getElementById("Vinfast").checked && !document.getElementById("Vinhomes").checked) || !document.getElementById("SanPhamForm").value || !document.getElementById("TieuDeForm").value)
	{
		alert("Không được bỏ trống các trường dữ liệu *");
	}	
	else if (!validateSanPham())
	{
		
	}
	else if (!validateTieuDe())
	{
		
	}
	else if (!validateNoiDung())
	{
		
	}
	else
	{
		// Dùng AJAX để gửi dữ liệu đi sau khi đã được kiểm duyệt
		var xhttp = new XMLHttpRequest();
	  	xhttp.onreadystatechange = function() {
	    	if (this.readyState == 4 && this.status == 200) {
				window.alert("Cảm ơn bạn, chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất!");
	      		window.location.replace('notificationView.php');      		      		
	    	}
	  	};
	  	xhttp.open("POST", "../../controller/generalAndMember/contactController.php", true);
	  	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  	if (document.getElementById("Vsmart").checked) {
	  		xhttp.send("idQuestioner="+idQuestioner+"&nameQuestioner="+document.getElementById("HoTenForm").innerHTML+"&phoneNumber="+document.getElementById("SdtForm").innerHTML+"&email="+document.getElementById("EmailForm").innerHTML+"&address="+document.getElementById("DiaChiForm").innerHTML+"&brand=Vsmart"+"&product="+document.getElementById("SanPhamForm").value+"&title="+document.getElementById("TieuDeForm").value+"&question="+document.getElementById("NoiDungForm").value+"&timeQuestion="+(new Date()).toLocaleString());
	  	}
	  	else if (document.getElementById("Vinfast").checked) {
	  		xhttp.send("idQuestioner="+idQuestioner+"&nameQuestioner="+document.getElementById("HoTenForm").innerHTML+"&phoneNumber="+document.getElementById("SdtForm").innerHTML+"&email="+document.getElementById("EmailForm").innerHTML+"&address="+document.getElementById("DiaChiForm").innerHTML+"&brand=Vinfast"+"&product="+document.getElementById("SanPhamForm").value+"&title="+document.getElementById("TieuDeForm").value+"&question="+document.getElementById("NoiDungForm").value+"&timeQuestion="+(new Date()).toLocaleString());
	  	}
	  	else {
			xhttp.send("idQuestioner="+idQuestioner+"&nameQuestioner="+document.getElementById("HoTenForm").innerHTML+"&phoneNumber="+document.getElementById("SdtForm").innerHTML+"&email="+document.getElementById("EmailForm").innerHTML+"&address="+document.getElementById("DiaChiForm").innerHTML+"&brand=Vinhomes"+"&product="+document.getElementById("SanPhamForm").value+"&title="+document.getElementById("TieuDeForm").value+"&question="+document.getElementById("NoiDungForm").value+"&timeQuestion="+(new Date()).toLocaleString());	  		
	  	}	
	}
}