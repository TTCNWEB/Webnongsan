<!DOCTYPE html>
<html>
<head>
	<title>ĐĂNG KÍ</title>
	<meta charset="utf-8"/>
</head>
<body aglign="center">
	<form name="f1" method="post">
	<p align="center">
	<FONT color=black size=50 face=".VNTimeH" >ĐĂNG KÍ</FONT>
		<table align="center">
			<tr>
				<td>User name: </td>
				<td><input type="text" name="s_user" size="20" ></td>
			</tr>
			<tr>
				<td> Password: </td>
				<td><input type="Password" name="s_pass" size="20"></td>
			</tr>
			<tr>
				<td>Họ tên: </td>
				<td><input type="text" name="s_hoten" size="20">
			</tr>
			<tr>
				<td>Ngày sinh(năm/tháng/ngày): </td>
				<td><input type="text" name="s_ngaysinh" size="20">
			</tr>
			<tr>
				<td>Số điện thoại: </td>
				<td><input type="text" name="s_sdt" size="20">
			</tr>
			<tr>
				<td>Địa chỉ: </td>
				<td><input type="text" name="s_diachi" size="20">
			</tr>
		</table>
		<p align="center"><input type="submit" name="s_signup" value="ĐĂNG Kí"></td></p>
	</p>
    </form>

    <?php 
		$link = mysqli_connect("localhost", "root","") or die ("Khong the ket noi den CSDL MySQL");
        mysqli_set_charset($link,"utf8");
        mysqli_select_db($link,"nongsan" );	

        if (isset($_POST['s_signup'])) {
        	$user=mysqli_real_escape_string($link,$_POST['s_user']);
        	$pass=mysqli_real_escape_string($link,$_POST['s_pass']);
        	$hoten=mysqli_real_escape_string($link,$_POST['s_hoten']);
        	$ngaysinh=mysqli_real_escape_string($link,$_POST['s_ngaysinh']);
        	$sdt=mysqli_real_escape_string($link,$_POST['s_sdt']);
        	$diachi=mysqli_real_escape_string($link,$_POST['s_diachi']);

        	if ($user==NULL||$pass==NULL||$hoten==NULL||$ngaysinh==NULL||$sdt==NULL|$diachi==NULL) {
        		echo"<script type='text/javascript'>alert('Hãy điền đầy đủ thông tin');</script>";
        	}
        	else{
        			$sqll= "INSERT INTO taikhoan(username,pass) VALUES('$user','$pass')";
					$r = mysqli_query($link,$sqll);
					if (!$r) {
						die('Could not contect: ' .mysqli_error());
					}
        			$sql = "INSERT INTO thongtin(hoten,ngaysinh,sdt,diachi) VALUES('$hoten','$ngaysinh','$sdt','$diachi')";
        			$rs = mysqli_query($link,$sql);
        			if (!$rs) {
						die('Could not contect: ' .mysqli_error());
					}
				
				}
				$result= mysqli_query($link,"SELECT * FROM thongtin");
				echo '<table border="1" width="100%" style="font-size:25px">';
                echo '<caption >Thông tin</caption>';

                echo '<tr align="center"><td>tid</td><td>Họ Tên</td><td>Ngày sinh</td><td>SDT</td><td>Địa Chỉ</td></tr>';
                while ($row=mysqli_fetch_array($result,MYSQLI_BOTH)) {
                    echo'<tr align="center"><td>'.$row['tid'].'</td><td>'.$row['hoten'].'</td><td>'.$row['ngaysinh'].'</td><td>'.$row['sdt'].'</td><td>'.$row['diachi'].'</td></tr>';
                }
                echo'</table>';
        }
    

    ?>p
</body>
</html>