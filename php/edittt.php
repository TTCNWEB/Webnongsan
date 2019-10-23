<head>
	<TITLE>Chỉnh sửa thông tin</TITLE>
</head>
<body>
	<?
		$error="";
		//id là mã của thông tin người cần chỉnh sửa thông tin
		//ID là mã nhận được từ trang web trước gửi qua để truy vấn CSDL in thông tin cũ ra web
		$id=$_REQUEST['ID'];
		$link=mysqli_connect("localhost","root","") or die("Khong the ket noi den CSDL MYSQL");
		mysqli_select_db($link,"dulieu"); //dulieu là tên bảng CSDL
		mysqli_set_charset($link,"utf8");
		$result=mysqli_query($link,"SELECT * FROM thongtin WHERE ID='$id'");
		while($row=mysqli_fetch_array($result))
				{
					$ten=$row{"Ten"};
					$diachi=$row{"DiaChi"};
					$email=$row{"Email"};
					$sodt=$row{"SoDT"};
				}
	?>
	<table width="400" border="1" align="center">
		<tr>
			<form method="POST">
			<td>
				<table>
					<caption><strong>Chỉnh sửa thông tin</strong></caption>
						<tr>
							<td>Họ tên:</td>
							<td><input type="text" id="a" name="ten" value="<?php echo $ten ?>"></td>
						</tr>
						<tr>
							<td>Địa chỉ:</td>
							<td><input type="text" id="a" name="diachi" value="<?php echo $diachi ?>"></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input type="text" id="a" name="email" value="<?php echo $email ?>"></td>
						</tr>
						<tr>
							<td>Số điện thoại:</td>
							<td><input type="text" id="a" name="sodt" value="<?php echo $sodt ?>"></td>
						</tr>
						<tr>
							<td>Xác nhận mật khẩu:</td>
							<td><input type="text" id="a" name="pass" ></td>
						</tr>		
						<tr>
							<td><input type="submit" id="b" name="submit" value="Thay đổi"></td>
						</tr>
						<td><span style="color:red;" ><?php echo $error; ?></span></td>
					</tr>
				</table>
			</td>
			</form>

		</tr>
	</table>
	<?php
		$error="";
		$id=$_REQUEST['ID'];
		echo 'ID người được sửa thông tin: '.$id;
		if(isset($_POST['submit']))
		{
			$ten=isset($_POST['ten'])?(String)trim($_POST['ten']):'';
			$namsinh=isset($_POST['namsinh'])?(String)trim($_POST['namsinh']):'';
			$diachi=isset($_POST['diachi'])?(String)trim($_POST['diachi']):'';
			$email=isset($_POST['email'])?(String)trim($_POST['email']):'';
			$sodt=isset($_POST['sodt'])?(String)trim($_POST['sodt']):'';
			$pass=isset($_POST['pass'])?(String)trim($_POST['pass']):'';
			if ($ten==''||$sodt==''||$diachi=='' || $email=='' || $pass=='')
	        	$error= 'Bạn chưa nhập đầy đủ thông tin';
			else{
				$link=mysqli_connect("localhost","root","") or die("Khong the ket noi den CSDL MYSQL");
				mysqli_select_db($link,"dulieu");
				mysqli_set_charset($link,"utf8");
				$checkpass=mysqli_query($link,"SELECT password FROM account WHERE ID='$id'");
				$check=mysqli_query($link,"SELECT * FROM thongtin WHERE ID='$id'");
				$row=mysqli_num_rows($check);
				if($row==1 && $checkpass==$pass)
				{
					$sql="UPDATE thongtin SET Ten='$ten', DiaChi='$diachi' ,Email='$email' ,SoDT='$sodt' WHERE ID='$id'";
					mysqli_query($link,$sql);
					header('Location: ..');	
				}
				else{
					$error='Không có ID cần sửa';
				}
			}
		}
		
	?>
</body>