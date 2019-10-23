
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ĐĂNG NHẬP</title>

</head>
<body align="middle" background="anh2.jpg">
    <form name="f1" method="post">
	<p align="center">
	<FONT color=black size=50 face=".VNTimeH" >ĐĂNG NHẬP</FONT>
		<table align="center">
			<tr><td>User name: </td></tr>
            <tr><td><input type="text" name="l_user" size="20" ></td></tr>
			<tr><td> Password: </td></tr>
            <tr><td><input type="Password" name="l_pass" size="20"></td></tr>
			<tr><td><input type="submit" name="l_login" value="ĐĂNG NHẬP"></td></tr>
		</table>
	</p>
    </form>
	<?php
        $link = mysqli_connect("localhost", "root","") or die ("Khong the ket noi den CSDL MySQL");
        mysqli_select_db($link,"nongsan" );
        mysqli_set_charset($link,"utf8");
        
         if(isset($_POST['l_login']))
        {
            $user=mysqli_real_escape_string($link,$_POST['l_user']);
            $pass=mysqli_real_escape_string($link,$_POST['l_pass']);
            if ($user==null||$pass==null) {
                echo"<script type='text/javascript'>alert('Hãy điền tài khoản và mật khẩu');</script>";
            }
            else{
                $sql="SELECT * from taikhoan where username='$user' and pass='$pass'";
                $query=mysqli_query($link,$sql);
                $row=mysqli_num_rows($query);
                if($row==0)
                {
               
                    echo"<script type='text/javascript'>alert('Tài khoản hoặc mật khẩu không chính xác');</script>";
                
                }
                else 
                {
                    session_start();
                    $_SESSION['name']=$user;
                    //header('location:chucnang.php');
                    echo"<script type='text/javascript'>alert('Đăng nhập thành công');</script>";
                    
                }
            }
        }
        ?>
</body>
</html>