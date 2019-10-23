<head>
	<title>Đổi mật khẩu</title>
</head>
<body>
	<?php
	$error="";
	if(isset($_POST['submit']))
	{
		$oldpass=isset($_POST['oldpass'])?(String)trim($_POST['oldpass']):'';
		$newpass=isset($_POST['newpass'])?(String)trim($_POST['newpass']):'';
		$newpass2=isset($_POST['newpass2'])?(String)trim($_POST['newpass2']):'';
		if($oldpass=='' || $newpass=='' || $newpass2=='')
			$error='Bạn chưa nhập đầy đủ thông tin';
		else
		{
			$link=mysqli_connect("localhost","root","") or die("Khong the ket noi CSDL");
			mysqli_select_db($link,"dulieu");
			mysqli_set_charset($link,"utf8");
			$result=mysqli_query($link,"SELECT * FROM account");
			$count=0;
			while($row=mysqli_fetch_array($result))
			{
				$checkpass=$row{"password"};
				if($checkpass==$oldpass){
					if($newpass==$newpass2){
						$sql="UPDATE thongtin SET password='$newpass' WHERE ID='$id'";
						mysqli_query($link,$sql);
						$count=1;
					}
					else $error='Bạn chưa xác nhận đúng mật khẩu.';
					
				}
			}
			if($count==0) $error='Mật khẩu cũ không chính xác.';
			else $error='Đổi mật khẩu thành công.;'
		}
	}
	?>
	<table width="500" border="1" align="center">
		<tr>
			<form method="POST">
				<td>
				<table align="center">
					<caption><strong>Đổi mật khẩu</strong></caption>
					<tr>
						<td>Mật khẩu cũ:</td>
						<td><input type="password" name="oldpass"></td>
					</tr>
					<tr>
						<td>Mật khẩu mới:</td>
						<td><input type="password" name="newpass"></td>
					</tr>
					<tr>
						<td>Xác nhận mật khẩu</td>
						<td><input type="password" name="newpass2"></td>
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="SUBMIT"></td>
					</tr>
					<tr>
						<td><span style="color:red;" ><?php echo $error; ?></span></td>
					</tr>
				</table>
				</td>
			</form>
		</tr>
	</table>
</body>