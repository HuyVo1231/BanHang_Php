<?php
if (isset($_POST['dangky'])) {
    $tenkhach = $_POST['username'];
    $matkhau = $_POST['password'];
    $repassword = $_POST['repassword'];

    $sql = "SELECT * FROM tbl_dangky where tenkhach = '" . $tenkhach . "'";
    $query = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($query);
    if ($tenkhach && $matkhau && $repassword) {
        if ($num == 1) {
            echo ' <p class="wrapper_res"  style = "color:red">Đã tồn tại tên. Vui lòng đặt tên khác</p>';
        } else {
            if ($matkhau == $repassword) {
                $sql_insert = "INSERT INTO tbl_dangky(tenkhach,matkhau) VALUE ('" . $tenkhach . "','" . $matkhau . "')";
                $query_insert = mysqli_query($conn, $sql_insert);
                if ($query_insert) {
                    echo '<p class="wrapper_res" style = "color:green">Bạn đã đăng ký thành công. </p>';
                    $_SESSION['dangky'] = $tenkhach;
                    $_SESSION['id_khachhang'] = mysqli_insert_id($conn);
                    header("location:index.php");
                }
            } else {
                echo '<p class="wrapper_res" style = "color:red">Mật khẩu không giống nhau. </p>';
            }
        }
    }
}
?>


<div class="wrapper_res">
    <div class="wrapper_res d-flex justify-content-center">
        <form class=w-50 action="" autocomplete="off" method="POST" id="form2">
            <!-- Email input -->
            <h2 class="fw-bold mb-2 text-uppercase">Đăng ký</h2>
            <p class="text-black-50 mb-5">Nhập tài khoản và mật khẩu ở phía dưới!</p>
            <div class="form-outline mb-4 form-group">
                <input type="text" id="form2Example1" class="form-control" placeholder="Nhập tài khoản" name="username" />
                <span class="form-message"></span>
                <label class="form-label" for="form2Example1"></label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4 form-group">
                <input type="password" id="form2Example2" class="form-control" placeholder="Nhập mật khẩu" name="password" />
                <span class="form-message"></span>
                <label class="form-label" for="form2Example2"></label>
            </div>

            <div class="form-outline mb-4 form-group">
                <input type="password" id="form2Example3" class="form-control" placeholder="Nhập lại mật khẩu" name="repassword" />
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
            <button type="submit" class="btn btn-primary btn-block mb-4" name="dangky">Sign in</button>

            <!-- Register buttons -->
        </form>
    </div>
</div>