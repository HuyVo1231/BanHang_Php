<?php
session_start();
include("../config/config.php");
if (isset($_POST['login'])) {
    $taikhoan = $_POST['username'];
    $matkhau = md5($_POST['password']);
    $sql = "select * from tbl_admin WHERE username = '" . $taikhoan . "' AND password = '" . $matkhau . "'";
    $row = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($row);
    if ($count == 1) {
        $_SESSION['login'] = $taikhoan;
        header("location:index.php");
    } else {
        echo '<p style = "color:red;text-align:center">Mật khẩu không chính xác.</p>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập ADMIN</title>
    <style>
    .body {
        font-size: 20px;
    }

    #dangnhap {
        color: white;
        font-size: 25px;
    }

    .wrapper-login {
        border: 5px solid #99CCFF;
        width: 20%;
        margin: 0 auto;
        border-radius: 8px;
    }

    body {
        background-image: url("../../img/backgroundlogin.png");
    }

    .tkmk {
        font-size: 20px;
        color: white;
    }
    </style>
</head>

<body>

    <div class="wrapper-login">
        <form action="" autocomplete="off" method="POST">
            <table style="text-align:center; border-collapse:collapse;">
                <tr>
                    <td id="dangnhap" colspan="2">Đăng nhập Admin</td>
                </tr>
                <tr>
                    <td class="tkmk">Tài khoản:</td>
                    <td class="inp"> <input type="text" name="username" placeholder="Nhập tài khoản"></td>
                </tr>
                <tr>
                    <td class="tkmk">Mật khẩu:</td>
                    <td class="inp"> <input type="password" name="password" placeholder="Nhập mật khẩu"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="login" value="Đăng nhập"></td>
                </tr>
            </table>
        </form>
    </div>



</body>

</html>