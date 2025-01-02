<?php
if (isset($_POST['dangnhap'])) {
    $taikhoan = $_POST['username'];
    $matkhau = $_POST['password'];
    if ($taikhoan && $matkhau) {
        $sql = "SELECT * FROM TBL_DANGKY WHERE tenkhach = '" . $taikhoan . "' and matkhau = '" . $matkhau . "'";
        $row = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($row);
        $fetch = mysqli_fetch_array($row);
        if ($count > 0) {
            $_SESSION['dangky'] = $fetch['tenkhach'];
            $_SESSION['id_khachhang'] = $fetch['id_dangky'];
            header("location:index.php");
        } else {
            echo ' <p class="wrapper_res" style = "color:red">Bạn đã nhập sai tài khoản hoặc mật khẩu</p>';
        }
    } else {
        echo ' <p class="wrapper_res" style = "color:red">Vui lòng nhập đầy đủ thông tin.</p>';
    }
}
?>

<div class="wrapper_res d-flex justify-content-center">
    <form class=w-50 action="" autocomplete="off" method="POST" class="form" id="form-1">
        <!-- Email input -->
        <h2 class="fw-bold mb-2 text-uppercase">Đăng nhập</h2>
        <p class="text-black-50 mb-5">Nhập tài khoản và mật khẩu ở phía dưới!</p>
        <div class="form-outline mb-4 form-group">
            <input type="text" id="form1Example1" class="form-control" placeholder="Nhập tài khoản" name="username" />
            <span class="form-message"></span>
            <label class="form-label" for="form2Example1"></label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4 form-group">
            <input type="password" id="form1Example2" class="form-control" placeholder="Nhập mật khẩu" name="password" />
            <span class="form-message"></span>
            <label class="form-label" for="form2Example2"></label>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                </div>
            </div>

            <div class="col">
                <!-- Simple link -->
                <a href="index.php?quanly=doimatkhau">Forgot password?</a>
            </div>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4" name="dangnhap">Sign in</button>

        <!-- Register buttons -->
        <div class="text-center">
            <p>Not a member? <a href="index.php?quanly=dangky">Register</a></p>
        </div>
    </form>
</div>