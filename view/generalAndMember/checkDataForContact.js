function validateHoTen()
{
	hoTen = document.getElementById("HoTenForm");
	if (hoTen.value.length < 5 || hoTen.value.length > 50)
	{
		alert("Ghi rõ họ tên, bao gồm từ 5- 50 ký tự");
		return false;
	}
	return true;
}
function validateSdt()
{
	sdt = document.getElementById("SdtForm");
	if (sdt.value.length != 10)
	{
		alert("SĐT bao gồm từ 10 chữ số");
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
        alert("Địa chỉ email hợp lệ phải có định dạng <sth>@<sth>.<sth>");
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
function validateAbout()
{
	about = document.getElementById("AboutForm");
	if (about.value.length > 1000)
	{
		alert("Nội dung tin nhắn không vượt quá 1000 ký tự");
		return false;
	}
	return true;
}	
function validateData()
{	
	if (!document.getElementById("HoTenForm").value || !document.getElementById("SdtForm").value || !document.getElementById("EmailForm").value || (!document.getElementById("Vsmart").checked && !document.getElementById("Vinfast").checked && !document.getElementById("Vinhome").checked) || !document.getElementById("SanPhamForm").value)
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
	else if (!validateSanPham())
	{
		
	}
	else if (!validateAbout())
	{
		
	}
	else
	{
		alert("Cảm ơn bạn, chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất!");		
		location.reload();
	}
}