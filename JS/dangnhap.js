function IsInvalidEmail(the_email) {
	var at = the_email.indexOf("@");
	var dot = the_email.lastIndexOf(".");
	var space = the_email.indexOf(" ");
 
	if ((at != -1) && //có ký tự @
	(at != 0) && //ký tự @ không nằm ở vị trí đầu
	(dot != -1) && //có ký tự .
	(dot > at + 1) && (dot < the_email.length - 1) //phải có ký tự nằm giữa @ và . cuối cùng
	&& 
	(space == -1)) //không có khoẳng trắng 
	{
		return true;
	} else {
		return false;
	}
 }
function dangnhap() {
	var email	= document.frmLogin.txtEmail.value;
	var pass = document.frmLogin.txtPassword.value;
	if(IsInvalidEmail(email) && pass != "") {
		alert("đăng nhập thành công");
		return true;
		
	} 
	var obj = document.getElementById("divloi");
		obj.innerHTML = "Bạn đã nhập sai email hoặc mật khẩu!";
		obj.setAttribute("style", "Color: red;")
	return false;
	
	
}

